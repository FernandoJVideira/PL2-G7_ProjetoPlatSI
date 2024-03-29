<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use common\models\AuthItem;
use common\models\Loja;
use common\models\Morada;
use common\models\User;
use common\models\Utilizador;
use app\models\UtilizadorSearch;
use backend\models\SignupForm;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UtilizadorController implements the CRUD actions for Utilizador model.
 */
class UtilizadorController extends BaseAuthController
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['Admin', 'Gestor', 'Funcionario'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ]
            ]
        ]);
    }

    /**
     * Lists all Utilizador models.
     *
     * @return string
     */
    public function actionIndex($role)
    {
        if(!Yii::$app->user->can('view'.$role))
        {
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }

        $searchModel = new UtilizadorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $role);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Utilizador model.
     * @param int $idUser Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUser)
    {
        $role = Utilizador::getPerfil($idUser);

        if(Yii::$app->user->id != $idUser)
            if(!Yii::$app->user->can('view'.$role))
            {
                $this->showMessage('Não tem permissões para aceder a esta página.');
            }

        $model = $this->findModel($idUser);

        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Creates a new Utilizador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($role)
    {
        if(!Yii::$app->user->can('create'.$role))
        {
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }

        $signupForm = new SignupForm();

        if ($this->request->isPost) {
            $signupForm->load($this->request->post());
            $loja = ($this->request->post()['SignupForm']['id_loja'] ?? null);
            $role = $this->request->post('SignupForm')['role'];
            if($signupForm->signup($role, $loja)){
                Yii::$app->session->setFlash('success', 'Utilizador criado com sucesso.');
                return $this->redirect(['index', 'role' => $role]);
            }
            if(!isset($this->request->post('Utilizador')['id_loja']) && $loja == null)
                $erro = 'loja';
            else
                $erro = null;
        }
        $lojas = Loja::find()->all();
        $roles = AuthItem::find()->where('type = 1')->all();

        return $this->render('create', [
            'model' => $signupForm,
            'lojas' => $lojas,
            'roles' => $roles,
            'erro' => $erro ?? null,
        ]);
    }

    /**
     * Updates an existing Utilizador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUser Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUser)
    {

        $role = Utilizador::getPerfil($idUser);
        if(Yii::$app->user->id != $idUser)
            if(!Yii::$app->user->can('update'.$role))
            {
                $this->showMessage('Não tem permissões para aceder a esta página.');
            }
        $erro = null;
        $model = $this->findModel($idUser);
        if ($this->request->isPost) {
            if($role == 'Gestor' || $role == 'Funcionario'){
                if(isset($this->request->post('Utilizador')['id_loja']) && $this->request->post('Utilizador')['id_loja'] != null){
                    $model->id_loja = $this->request->post('Utilizador')['id_loja'];
                }
                else
                    $erro = 'loja';
                if ($model->load($this->request->post()) && $model->save()){

                    return $this->redirect(['view', 'idUser' => $model->idUser, 'role' => Utilizador::getPerfil($idUser)]);
                }
            }
            else
                if ($model->load($this->request->post()) && $model->save()){

                    return $this->redirect(['view', 'idUser' => $model->idUser, 'role' => Utilizador::getPerfil($idUser)]);
                }

        }

        $lojas = Loja::find()->all();
        $roles = AuthItem::find()->where('type = 1')->all();

        return $this->render('update', [
            'model' => $model,
            'lojas' => $lojas,
            'roles' => $roles,
            'erro' => $erro ?? null,
        ]);
    }

    /**
     * Deletes an existing Utilizador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUser Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUser)
    {
        $role = Utilizador::getPerfil($idUser);

        if(!Yii::$app->user->can('delete'.$role) || $idUser == Yii::$app->user->id)
        {
            $this->showMessage('Não tem permissões para concluir esta ação.');
        }

        $model = $this->findModel($idUser)->getUser()->one();
        $model->updateAttributes(['status' => User::STATUS_DELETED]);
        $model->save();
        return $this->redirect(['index', 'role' => Utilizador::getPerfil($idUser)]);

    }

    /**
     * Finds the Utilizador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUser Id User
     * @return Utilizador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUser)
    {
        if (($model = Utilizador::findOne(['idUser' => $idUser])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
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
class UtilizadorController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Utilizador models.
     *
     * @return string
     */
    public function actionIndex($role)
    {//fazer função dinamica
        if(Yii::$app->user->can('View'.$role) || $role == 'Cliente'){
            $searchModel = new UtilizadorSearch();
            $dataProvider = $searchModel->search($this->request->queryParams, $role);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }
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
        if(Yii::$app->user->can('view'.$role) || $role == 'Cliente'){
            return $this->render('view', [
                'model' => $this->findModel($idUser),
            ]);
        }
        else{
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

    }

    /**
     * Creates a new Utilizador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $signupForm = new SignupForm();

        if ($this->request->isPost) {

            $signupForm->load($this->request->post());
            $role = $signupForm->role;
            $signupForm->signup($role);

        } else {
            $signupForm->loadDefaultValues();
        }
        $lojas = Loja::find()->all();
        $roles = AuthAssignment::find()->distinct()->all();

        return $this->render('create', [
            'model' => $signupForm,
            'lojas' => $lojas,
            'roles' => $roles,
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
        $model = $this->findModel($idUser);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUser' => $model->idUser, 'role' => Utilizador::getPerfil($idUser)]);
        }

        $lojas = Loja::find()->all();

        return $this->render('update', [
            'model' => $model,
            'lojas' => $lojas,
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

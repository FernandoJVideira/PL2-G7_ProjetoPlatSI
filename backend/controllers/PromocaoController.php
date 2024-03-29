<?php

namespace backend\controllers;

use common\models\Promocao;
use common\models\PromocaoSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PromocaoController implements the CRUD actions for Promocao model.
 */
class PromocaoController extends BaseAuthController
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
     * Lists all Promocao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('viewPromocao')){
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }
        $searchModel = new PromocaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promocao model.
     * @param int $idPromocao Id Promocao
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPromocao)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPromocao),
        ]);
    }

    /**
     * Creates a new Promocao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('createPromocao')){
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }

        $model = new Promocao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                try {
                    $message = ["codigo" => $model->codigo, "nome_promo" => $model->nome_promo, "percentagem" => $model->percentagem, "data_limite" => $model->data_limite];
                    $mqtt = new \PhpMqtt\Client\MqttClient(Yii::$app->params['mosquitto'], 1883, 'backend');
                    $mqtt->connect();
                    $mqtt->publish('promo', json_encode($message), 1);
                    $mqtt->disconnect();
                }catch (\Exception $e){
                }

                return $this->redirect(['view', 'idPromocao' => $model->idPromocao]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Promocao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPromocao Id Promocao
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPromocao)
    {
        if(!Yii::$app->user->can('updatePromocao')){
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }

        $model = $this->findModel($idPromocao);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPromocao' => $model->idPromocao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Promocao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPromocao Id Promocao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPromocao)
    {
        if(!Yii::$app->user->can('deletePromocao')){
            $this->showMessage('Não tem permissões para aceder a esta página.');
        }
        
        $this->findModel($idPromocao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Promocao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPromocao Id Promocao
     * @return Promocao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPromocao)
    {
        if (($model = Promocao::findOne(['idPromocao' => $idPromocao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use common\models\Stock;
use backend\models\StockSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends BaseAuthController
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
                    [
                        'actions' => ['update'],
                        'allow' => false,
                        'roles' => ['Funcionario'],
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
     * Lists all Stock models.
     *
     * @return string
     */
    public function actionIndex($idLoja = null)
    {
        $session = Yii::$app->session;
        $id = \common\models\Utilizador::findOne(Yii::$app->user->id)->id_loja ?? $idLoja;

        if($idLoja == null){
            $this->showMessage('Não foi possível encontrar a loja');
            if (isset($session['idLoja']))
                unset($session['idLoja']);
        }

        if($id != null && $idLoja != $id)
            $this->showMessage('Não tem permissões para aceder a esta página');

        $session->set('idLoja', $idLoja);

        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $idLoja);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Stock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Stock();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->id_loja = Yii::$app->session->get('idLoja');
                if(Stock::find()->where(['id_produto' => $model->id_produto, 'id_loja' => $model->id_loja])->exists()){
                    $updateModel = Stock::find()->where(['id_produto' => $model->id_produto, 'id_loja' => $model->id_loja])->one();
                    if(empty($model->quant_stock) && empty($model->quant_req)){
                        $model->addError('quant_req', 'Este campo é obrigatório');
                        $model->addError('quant_req', 'Este campo é obrigatório');
                        return $this->render('create', [
                            'model' => $model,
                        ]);
                    }

                    $updateModel->quant_stock += $model->quant_stock;
                    $updateModel->quant_req += $model->quant_req;
                    $updateModel->save();
                }
                else if($model->quant_stock == null){
                    $model->quant_stock = 0;
                    $model->save();
                }
                if(isset($_GET['idCarrinho'])){
                    $this->redirect(Url::to(['encomenda/view', 'idCarrinho' => $_GET['idCarrinho']]));
                }
                else{
                    $this->redirect(Url::to(['stock/index', 'idLoja' => $model->id_loja]));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Stock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idStock Id Stock
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idStock)
    {
        $model = $this->findModel($idStock);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->id_loja = Yii::$app->session->get('idLoja');
            $model->quant_req -= $model->quant_stock;
            $model->quant_stock = $model->getOldAttribute('quant_stock') + $model->quant_stock;
            if(!$model->save()){
                $model->quant_req = $model->getOldAttribute('quant_req');
                $model->quant_stock = $model->getOldAttribute('quant_stock');
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
            if(isset($_GET['idCarrinho'])){
                $this->redirect(Url::to(['encomenda/view', 'idCarrinho' => $_GET['idCarrinho']]));
            }
            else{
                $this->redirect(Url::to(['stock/index', 'idLoja' => $model->id_loja]));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Stock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idStock Id Stock
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idStock)
    {
        $this->findModel($idStock)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idStock Id Stock
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idStock)
    {
        if (($model = Stock::findOne(['idStock' => $idStock])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\CarrinhoSearch;
use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use common\models\Produto;
use common\models\Utilizador;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;

/**
 * CarrinhoController implements the CRUD actions for Carrinho model.
 */
class CarrinhoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
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
     * Lists all Carrinho models.
     *
     * @return string
     */

    public function actionIndex()
    {
        $searchModel = new CarrinhoSearch();
        $additional = 1;

        $dataProvider = $searchModel->search($this->request->queryParams, $additional);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carrinho model.
     * @param int $idCarrinho Id Carrinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        $utilizador = Utilizador::findOne(\Yii::$app->user->id);
        $carrinho = $utilizador->carrinhoAtivo;

        if ($carrinho == null) {
            \Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        $linhas = $carrinho->linhaCarrinhos;

        /*$provider = new ArrayDataProvider([
            'allModels' => $linhas,
            'pagination' => [
                'pageSize' => 20,
                'pageParam' => 'page-linhacarrinhos',
            ],
        ]);*/

        return $this->render('view', [
            'model' => $carrinho,
            //'provider' => $provider,
        ]);
    }

    /**
     * Updates an existing Carrinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCarrinho Id Carrinho
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCarrinho)
    {
        $model = $this->findModel($idCarrinho);

        $model->updateAttributes(
            [
                'estado' => 'emProcessamento',
                'data_criacao' => date('Y-m-d H:i:s')
            ]
        );

        \Yii::$app->session->setFlash('success', 'Compra efetuada com sucesso!');
        return $this->redirect(['site/index']);
    }

    /**
     * Deletes an existing Carrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCarrinho Id Carrinho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($idCarrinho)
    {
        $this->findModel($idCarrinho)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCarrinho Id Carrinho
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCarrinho)
    {
        if (($model = Carrinho::findOne(['idCarrinho' => $idCarrinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

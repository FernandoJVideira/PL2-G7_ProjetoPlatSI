<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\CarrinhoSearch;
use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use common\models\Produto;
use common\models\Utilizador;
use common\models\Loja;
use common\models\Stock;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use function PHPUnit\Framework\isEmpty;

/**
 * CarrinhoController implements the CRUD actions for Carrinho model.
 */

//FIXME: Alterar verificações para usar o AuthController

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

        if (\Yii::$app->user->isGuest) {
            \Yii::$app->session->setFlash('error', 'Não tem sessão iniciada! Inicie sessão para aceder ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        $utilizador = Utilizador::findOne(\Yii::$app->user->id);
        $carrinho = $utilizador->carrinhoAtivo;
        $unavailableItems = [];

        if ($carrinho == null || $carrinho->linhaCarrinhos == null) {
            \Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        return $this->render('view', [
            'model' => $carrinho,
            //'unavailableProducts' => $unavailableItems,
        ]);
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

    public function actionCheckout($idCarrinho, $idLoja)
    {
        $carrinho = Carrinho::findOne(['idCarrinho' => $idCarrinho]);

        if ($carrinho->numlinhas == 0) {
            \Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        $carrinho->id_loja = $idLoja;
        $carrinho->estado = 'emProcessamento';
        $carrinho->data_criacao = date('Y-m-d H:i:s');

        $this->verificarStock($carrinho);

        ($carrinho->save()) ? (\Yii::$app->session->setFlash('success', 'Compra efetuada com sucesso!')) : (\Yii::$app->session->setFlash('error', 'Erro ao enviar carrinho para checkout!'));
        $this->redirect(['site/index']);
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

    private function verificarStock($carrinho)
    {
        foreach ($carrinho->linhaCarrinhos as $linhaCarrinho) {
        $stocks = $linhaCarrinho->produto->getStockLoja($carrinho->id_loja);

            if($stocks->quant_stock > $linhaCarrinho->quantidade){
                $linhaCarrinho->estado = 1;
                $stocks->quant_stock -= $linhaCarrinho->quantidade;
                $linhaCarrinho->save();
                $stocks->save();
            }
        }
    }
}

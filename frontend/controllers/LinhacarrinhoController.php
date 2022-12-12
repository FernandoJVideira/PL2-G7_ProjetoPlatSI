<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhacarrinhoController implements the CRUD actions for Linhacarrinho model.
 */
class LinhacarrinhoController extends Controller
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
     * Lists all Linhacarrinho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LinhacarrinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Linhacarrinho model.
     * @param int $idLinha Id Linha
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLinha)
    {
        $model = $this->findModel($idLinha);
        $produto = $model->produto;

        return $this->redirect('/produto/view?idProduto=' . $produto->idProduto);
    }

    /**
     * Creates a new Linhacarrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idProduto)
    {
        //verificar se existe carrinho aberto
        $carrinho = Carrinho::find()->where(['id_user' => \Yii::$app->user->identity->id])->andWhere(['estado' => 'aberto'])->one();

        if ($carrinho == null) {
            $carrinho = new Carrinho();
            $carrinho->id_user = \Yii::$app->user->identity->id;
            $carrinho->estado = 0;
            $carrinho->save();
        } else {
            $carrinho = $carrinho;
        }

        //verificar se existe linha de carrinho com o produto
        $verifyLinha = Linhacarrinho::find()->where(['id_carrinho' => $carrinho->idCarrinho])->andWhere(['id_produto' => $idProduto])->one();

        if ($verifyLinha == null) {
            $model = new Linhacarrinho();
            $model->id_carrinho = $carrinho->idCarrinho;
            $model->id_produto = $idProduto;
            $model->quantidade = 1;

            if ($model->save()) {
                return $this->redirect(['carrinho/view']);
            } else {
                \Yii::$app->session->setFlash('error', 'Não foi possível adicionar o produto ao carrinho, tente mais tarde.');
            }
        } else {
            $this->redirect(['linhacarrinho/add', 'idLinha' => $verifyLinha['idLinha']]);
        }
    }

    public function actionUpdateQuantity($idLinha, $quantity)
    {
        $linha = $this->findModel($idLinha);
        $linha->produto->quantidade = $quantity;
        $linha->save();
    }

    /**
     * Deletes an existing Linhacarrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLinha Id Linha
     * @return \yii\web\Response
     *@throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLinha)
    {

        $linha = $this->findModel($idLinha);
        $carrinho = $linha->carrinho;

        $linha->delete();
        if (count($carrinho->linhaCarrinhos) == 0) {
            $carrinho->delete();
            \Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            return $this->redirect(['site/index']);
        }
        return $this->redirect(['carrinho/view']);
    }

    public function actionAdd($idLinha)
    {
        $linha = $this->findModel($idLinha);
        $linha->quantidade += 1;

        if ($linha->save()) {
            return $this->redirect(['carrinho/view']);
        } else {
            \Yii::$app->session->setFlash('error', 'Não foi possível adicionar o produto ao carrinho, tente mais tarde.');
        }

        return $this->redirect(['carrinho/view']);
    }

    public function actionRemove($idLinha)
    {
        $linha = $this->findModel($idLinha);
        $linha->quantidade -= 1;

        if ($linha->quantidade == 0) {
            $linha->delete();
            return $this->redirect(['carrinho/view']);
        }

        if ($linha->save()) {
            return $this->redirect(['carrinho/view']);
        } else {
            \Yii::$app->session->setFlash('error', 'Placeholder');
        }
    }

    /**
     * Finds the Linhacarrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLinha Id Linha
     * @return Linhacarrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLinha)
    {
        if (($model = Linhacarrinho::findOne(['idLinha' => $idLinha])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

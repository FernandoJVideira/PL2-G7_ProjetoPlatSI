<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\CarrinhoSearch;
use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use common\models\Produto;
use common\models\Promocao;
use common\models\Utilizador;
use common\models\Loja;
use common\models\Stock;
use Yii;
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
     * Displays a single Carrinho model.
     * @param int $idCarrinho Id Carrinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if(\Yii::$app->user->isGuest){
            $cart_id = Yii::$app->request->cookies->getValue('cart_id');
            $carrinho = Carrinho::find()->where(['idCarrinho' => $cart_id])->andWhere(['estado' => 'aberto'])->one();
        }else{
            $carrinho = Carrinho::find()->where(['id_user' => Yii::$app->user->identity->id])->andWhere(['estado' => 'aberto'])->one();
        }

        if ($carrinho == null) {
            Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        return $this->render('view', [
            'model' => $carrinho,
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

    public function actionCheckout($idCarrinho, $idLoja, $idMorada = null)
    {
        $carrinho = Carrinho::findOne(['idCarrinho' => $idCarrinho]);

        if ($carrinho->numlinhas == 0) {
            Yii::$app->session->setFlash('error', 'Não existem itens no carrinho! Adicione produtos ao carrinho.');
            $this->redirect(['site/index']);
            return null;
        }

        if ($carrinho->id_user == null) {
            $this->redirect(['site/login']);
            return null;
        }else{

            foreach ($carrinho->linhaCarrinhos as $linha){

                if($linha->quantidade < 0 || $linha->quantidade > 10){
                    Yii::$app->session->setFlash('error', 'A quantidade de produtos no carrinho não pode ser inferior a 0 ou superior a 10.');
                    $this->redirect(['carrinho/view' , 'idCarrinho' => $idCarrinho]);
                    return null;
                }
            }

            $carrinho->id_loja = $idLoja;
            $carrinho->id_morada = $idMorada;
            $carrinho->id_user = Yii::$app->user->identity->id;
            $carrinho->estado = 'emProcessamento';
            $carrinho->data_criacao = date('Y-m-d H:i:s');

            $carrinho->verificarStock();

            ($carrinho->save()) ? (Yii::$app->session->setFlash('success', 'Compra efetuada com sucesso!')) : (Yii::$app->session->setFlash('error', 'Erro ao enviar carrinho para checkout!'));
            $this->redirect(['site/index']);
        }
    }

    public function actionPromo($idCarrinho)
    {
        $codigoPromo = Yii::$app->request->post('codigoPromo');

        $carrinho = Carrinho::findOne(['idCarrinho' => $idCarrinho]);
        $promo = Promocao::findOne(['codigo' => $codigoPromo]);

        if ($promo == null || strtotime($promo->data_limite) < strtotime('now')) {
            Yii::$app->session->setFlash('error', 'Código de promoção inválido!');
            $this->redirect(['carrinho/view']);
            return null;
        }

        if($carrinho->promocao)
        {
            Yii::$app->session->setFlash('error', 'Já existe uma promoção aplicada ao carrinho!');
            $this->redirect(['carrinho/view']);
            return null;
        }

        $carrinho->id_promocao = $promo->idPromocao;
        $carrinho->save();

        $this->redirect(['carrinho/view']);
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

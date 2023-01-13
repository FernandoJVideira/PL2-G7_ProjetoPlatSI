<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Carrinho;
use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use common\models\Produto;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\Response;

class CarrinhoController extends ActiveController
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'authenticator' => [
                    'class' => CustomAuth::className(),
                    'auth' => ['backend\modules\api\components\CustomAuth', 'authCustom']
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'create' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        return true;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public $modelClass = 'common\models\Carrinho';

    public function actionIndex(){
        $carrinho = $this->clearCarrinho();

        if ($carrinho == null) {
            return "no carrinho";
        }

        $linhas = $carrinho->getLinhacarrinhos()->all();
        $linhas = array_map(function ($linha) {
            return [
                "id" => $linha->idLinha,
                "nome" => $linha->produto->nome,
                "iva" => $linha->produto->categoria->iva->iva,
                "quantidade" => $linha->quantidade,
                "preco" => (float)$linha->produto->preco,
                ];
        }, $linhas);
        $linhas = array_merge([[
            'total' => $carrinho->totalcomdesconto,
            'iva' => $carrinho->iva,
            'subtotal' => $carrinho->total,
            'desconto' => $carrinho->desconto,
        ]], [$linhas]);

        return $linhas;
    }

    public function actionCarrinho()
    {
        $data = $this->getData();

        if($data == null){
            throw new HttpException(200, 'Invalid request', 400);
        }

        $carrinho = $this->clearCarrinho();

        if(isset($data['dados']) && isset($data['linhas'])){
            if ($carrinho == null)
                $carrinho = $this->newCarrinho($data['dados']['idPromocao'] ?? null, $data['dados']['idMorada'] ?? null, $data['dados']['idLoja'] ?? null);

            foreach ($data['linhas'] as $item){
                if(isset($item['idProduto']))
                    $this->newLinhaCarrinho($carrinho->idCarrinho, $item['idProduto'], $item['quantidade'] ?? null);
            }
        }

        if($carrinho->linhaCarrinhos == null){
            $carrinho->delete();
            return null;
        }
    }

    public function actionProduto_add(){
        $data = $this->getData();

        if($data == null && !isset($data['idProduto'])){
            throw new HttpException(200, 'Invalid request', 400);
        }

        if (Produto::findOne($data['idProduto']) == null) {
            throw new HttpException(200, 'Invalid request', 400);
        }

        $carrinho = $this->clearCarrinho();

        if ($carrinho == null)
            $carrinho = $this->newCarrinho();

        $linha = $this->newLinhaCarrinho($carrinho->idCarrinho, $data['idProduto'], $data['quantidade'] ?? null);

        return $linha;
    }

    public function actionProduto_remove($id){
        if (Produto::findOne($id) == null) {
            throw new HttpException(200, 'Invalid request', 400);
        }

        $carrinho = $this->clearCarrinho();

        if ($carrinho == null) {
            return null;
        }

        $linha = Linhacarrinho::find()->where(['id_carrinho' => $carrinho->idCarrinho])->andWhere(['id_produto' => $id])->one();

        if($linha == null){
            return null;
        }

        $linha->delete();

        $this->clearCarrinho();

        return $linha;
    }

    private function clearCarrinho()
    {
        $carrinho = Carrinho::find()->where(['id_user' => $this->user->id])->andWhere(['estado' => 'aberto'])->one();

        if(isset($carrinho) && $carrinho->linhaCarrinhos == null){
            $carrinho->delete();
            return null;
        }
        return $carrinho;
    }

    private function getData()
    {
        return json_decode(Yii::$app->request->getRawBody(), true);
    }

    private function newCarrinho($idPromocao = null, $idMorada = null, $idLoja = null)
    {
        $carrinho = new Carrinho();
        $carrinho->estado = 'aberto';
        $carrinho->id_user = $this->user->id;
        $carrinho->id_promocao = $idPromocao;
        $carrinho->id_morada = $idMorada;
        $carrinho->id_loja = $idLoja;
        $carrinho->save();
        return $carrinho;
    }

    private function newLinhaCarrinho($idCarrinho, $idProduto, $quantidade = 1)
    {
        $linha = Linhacarrinho::find()->where(['id_carrinho' => $idCarrinho])->andWhere(['id_produto' => $idProduto])->one();
        if($linha == null){
            $linha = new Linhacarrinho();
            $linha->estado = 0;
            $linha->id_carrinho = $idCarrinho;
            $linha->id_produto = $idProduto;
        }
        $linha->quantidade = $quantidade;
        $linha->save();

        return $linha;
    }

    public function actionCheckout(){
        $carrinho = $this->clearCarrinho();

        if ($carrinho == null)
            return null;
        if($carrinho->id_loja == null || $carrinho->id_morada == null || $carrinho->id_user == null)
            return null;

        $carrinho->estado = 'emProcessamento';
        $carrinho->data_criacao = date('Y-m-d H:i:s');

        $carrinho->verificarStock();

        $carrinho->save();

        return $carrinho;
    }

}
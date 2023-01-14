<?php

namespace backend\controllers;

use common\models\Loja;
use common\models\Metodopagamento;
use common\models\Seccao;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class GestaoController extends BaseAuthController
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
                        'roles' => ['Admin', 'Gestor'],
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

    public function actionIndex()
    {
        if (!Yii::$app->user->can('gestaoLoja'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $loja = Loja::findOne($_GET['idLoja']);

        $metpagamento = Metodopagamento::find();
        $metpagamentoProvider = new ActiveDataProvider([
            'query' => $metpagamento,
        ]);
        $seccao = Seccao::find();
        $seccaoProvider = new ActiveDataProvider([
            'query' => $seccao,
        ]);

        $metpagamentoLoja = $loja->getMetodoPagamentoIdMetodos()->all();
        $metpagamentoLoja = array_map(function ($metPagamento) {
            return $metPagamento->idMetodo;
        }, $metpagamentoLoja);
        $seccoesLoja = $loja->getseccaoIdSeccaos()->all();
        $seccoesLoja = array_map(function ($seccao) {
            return $seccao->idSeccao;
        }, $seccoesLoja);

        return $this->render('index', [
            'seccaoProvider' => $seccaoProvider,
            'seccoesLoja' => $seccoesLoja,
            'metpagamentoProvider' => $metpagamentoProvider,
            'metpagamentoLoja' => $metpagamentoLoja,]);
    }

    public function actionCreate()
    {
        if (!Yii::$app->user->can('gestaoLoja'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        try {
            $loja = Loja::findOne($_GET['idLoja']);
            if (isset($_GET['idSeccao'])){
                $seccao = Seccao::findOne($_GET['idSeccao']);
                $loja->link('seccaoIdSeccaos', $seccao);
                try {
                    $message = ["loja" => $loja->descricao, "seccao" => $seccao->nome];
                    $mqtt = new \PhpMqtt\Client\MqttClient(Yii::$app->params['mosquitto'], 1883, 'backend');
                    $mqtt->connect();
                    $mqtt->publish('seccao', json_encode($message), 1);
                    $mqtt->disconnect();
                }catch (\Exception $e){
                }
            }
            elseif(isset($_GET['idMetodo'])){
                $metodo = Metodopagamento::findOne($_GET['idMetodo']);
                $loja->link('metodoPagamentoIdMetodos', $metodo);
            }
        }
        catch (\Exception $e) {
            $this->showMessage('Erro', 'Não foi possível adicionar a seccao/metodo de pagamento');
            dd($e);
        }
        return $this->redirect(['index', 'idLoja' => $_GET['idLoja']]);
    }

    public function actionDelete()
    {
        if (!Yii::$app->user->can('gestaoLoja'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        try {
            $loja = Loja::findOne($_GET['idLoja']);
            if (isset($_GET['idSeccao'])) {
                $seccao = Seccao::findOne($_GET['idSeccao']);
                $loja->unlink('seccaoIdSeccaos', $seccao, true);
            }
            elseif(isset($_GET['idMetodo'])) {
                $metodo = Metodopagamento::findOne($_GET['idMetodo']);
                $loja->unlink('metodoPagamentoIdMetodos', $metodo, true);
            }
        }
        catch (\Exception $e) {
            $this->showMessage('Erro', 'Não foi possível remover a seccao/metodo de pagamento');
        }
        return $this->redirect(['index', 'idLoja' => $_GET['idLoja']]);
    }

}
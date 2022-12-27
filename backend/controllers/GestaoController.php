<?php

namespace backend\controllers;

use common\models\Loja;
use common\models\Metodopagamento;
use common\models\Seccao;
use yii\data\ActiveDataProvider;

class GestaoController extends BaseAuthController
{
    public function actionIndex()
    {
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
        try {
            $loja = Loja::findOne($_GET['idLoja']);
            if (isset($_GET['idSeccao'])){
                $seccao = Seccao::findOne($_GET['idSeccao']);
                $loja->link('seccaoIdSeccaos', $seccao);
            }
            elseif(isset($_GET['idMetodo'])){
                $metodo = Metodopagamento::findOne($_GET['idMetodo']);
                $loja->link('metodoPagamentoIdMetodos', $metodo);
            }
        }
        catch (\Exception $e) {
            $this->showMessage('Erro', 'Não foi possível adicionar a seccao/metodo de pagamento');
        }
        return $this->redirect(['index', 'idLoja' => $_GET['idLoja']]);
    }

    public function actionDelete()
    {
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
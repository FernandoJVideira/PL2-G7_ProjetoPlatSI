<?php

use backend\models\Encomenda;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Encomenda de ' . $model->user->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">
    <p>
        <?php
        $form = ActiveForm::begin([
            'action' => Url::to(['fatura/create', 'idCarrinho' => $model->idCarrinho]),
            'method' => 'post',
        ]);

        echo '<button type="submit" class="btn btn-primary" ' .(!$model->getEstadoLinhas() || $model->estado == 'fechado' ? 'disabled': ''). '>Fechar encomenda</button>';
        ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'estado',
            [
                'attribute' => 'data_criacao',
                'format' => ['date', 'php:d-m-Y H:i:s'],
            ],
            [
                'label' => 'Morada',
                'attribute' => 'id_morada',
                'value' => $model->morada->rua . ', ' . $model->morada->cod_postal,
            ],
            [
                'label' => 'Loja',
                'attribute' => 'id_loja',
                'value' => $model->loja->descricao,
            ],
            [
                'label' => 'Utilizador',
                'attribute' => 'id_user',
                'value' => $model->user->nome,
            ],
            [
                'label' => 'Codigo Promocional',
                'attribute' => 'id_promocao',
                'value' => $model->promocao->codigo ?? 'N/A',
            ],
        ],
    ]);
        if($model->getEstadoLinhas() && $model->estado != 'fechado')
            echo $form->field(new \common\models\Fatura(), 'id_metodo')->dropDownList(ArrayHelper::map($model->loja->getMetodoPagamentoIdMetodos()->all(),'idMetodo','metodoPagamento'), ['id' => 'idMetodo', 'name' => 'idMetodo'])->label('Metodo de pagamento');

        ActiveForm::end();

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'estado',
                'value' => 'Estado',
            ],
            [
                'label' => 'Produto',
                'attribute' => 'id_produto',
                'value' => 'produto.nome',
            ],
            'quantidade',
            [
                'label' => 'Preço',
                'attribute' => 'preco',
                'value' => function($model){
                    return $model->produto->preco . '€';
                }
            ],
            [
                'label' => 'Total',
                'attribute' => 'total',
                'value' => function($model){
                    return $model->produto->preco * $model->quantidade . '€';
                }
            ],
        ],
    ]);
    ?>
</div>

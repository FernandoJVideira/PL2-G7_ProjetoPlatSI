<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->title = $model->idCarrinho;
//$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">
    <div class="card w-75 mx-auto">
        <div class="card-body">

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
                'label' => 'Código Promocional',
                'attribute' => 'id_promocao',
                'value' => $model->promocao->codigo ?? 'N/A',
            ],
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
    </div>
</div>
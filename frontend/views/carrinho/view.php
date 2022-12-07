<?php

use common\models\Linhacarrinho;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $provider,
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Produto',
                'value' => function (Linhacarrinho $linha) {
                    return Html::a($linha->produto->nome, Url::to(['produto/view', 'idProduto' => $linha->produto->idProduto]));
                },
                'format' => 'html'
            ],
            [
                'label' => 'Quantidade',
                'value' => function (Linhacarrinho $linha) {
                    return $linha->quantidade;
                },
            ],
            [
                'label' => 'Preço Unitário',
                'value' => function (Linhacarrinho $linha) {
                    return $linha->produto->preco_unit . " €";
                },
            ],
            [
                'label' => 'Iva',
                'value' => function (Linhacarrinho $linha) {
                    return $linha->produto->categoria->iva->iva . " %";
                },
                'footer' => 'Preço total:'
            ],
            [
                'label' => 'Preço Final',
                'value' => function (Linhacarrinho $linha) {
                    return $linha->total . " €";
                },
                'footer' => $model->total . " €"
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete'),
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'delete') {
                        $url = Url::to(['linhacarrinho/delete', 'idLinha' => $model->idLinha]);
                        return $url;
                    }
                }
            ],
        ],
    ]);
    ?>

    <?= Html::a('Checkout', ['/carrinho/update?idCarrinho=' . $model->idCarrinho], ['class' => 'btn btn-primary']) ?>
</div>
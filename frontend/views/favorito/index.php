<?php

use common\models\Favorito;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\FavoritoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Favoritos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorito-index">

    <div class="d-flex justify-content-center mt-4 mb-3"><h1><?= Html::encode($this->title) ?></h1></div>

    <div class="card w-75 mx-auto">
        <div class="card-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'emptyText' => 'Nenhum favorito encontrado',
        'columns' => [

            [
                'attribute' => 'id_produto',
                'value' => function (Favorito $model) {
                    return Html::a($model->produto->nome, Url::to(['site/detalhes', 'id' => $model->produto->idProduto]), ['class' => 'text-dark']);
                },
                'format' => 'html',
                'headerOptions' => ['style' => 'width: 50em;'],
            ],
            [
                    'attribute'=>'Preço',
                    'value' => function (Favorito $model) {
                        return $model->produto->preco_unit . '€';
                    },
                    'format' => 'html',
                    'headerOptions' => ['style' => 'width: 10em;'],
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="fa fa-trash"></span>', ['favorito/create?fav=true&idProduto=' . $model->id_produto], [
                            'title' => 'Remover dos favoritos',
                            'data-confirm' => 'Tem certeza que deseja remover este produto dos favoritos?',
                            'data-method' => 'post',
                        ]);
                    },
                ],
                'headerOptions' => ['style' => 'width: 5em;'],
            ],
        ],
    ]); ?>
        </div>
    </div>
</div>
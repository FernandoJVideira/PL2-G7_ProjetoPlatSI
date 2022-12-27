<?php

use common\models\Carrinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CarrinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carrinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carrinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCarrinho',
            'estado',
            'data_criacao',
            'id_morada',
            'id_loja',
            //'id_user',
            //'id_promocao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carrinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCarrinho' => $model->idCarrinho]);
                 }
            ],
        ],
    ]); ?>


</div>

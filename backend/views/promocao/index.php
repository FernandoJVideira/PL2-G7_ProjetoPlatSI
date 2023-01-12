<?php

use common\models\Promocao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PromocaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Promoções';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocao-index">

    <div class="card w-75 mx-auto">
        <div class="card-body">

    <p>
        <?= Html::a('Registar Promoção', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nome_promo',
            'codigo',
            'percentagem',
            'data_limite',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Promocao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPromocao' => $model->idPromocao]);
                 }
            ],
        ],
    ]); ?>
        </div>
    </div>

</div>

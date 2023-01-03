<?php

use common\models\Promocao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PromocaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Promocaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Promocao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPromocao',
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

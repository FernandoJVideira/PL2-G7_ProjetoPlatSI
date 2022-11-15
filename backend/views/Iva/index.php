<?php

use backend\models\Iva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\IvaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ivas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-index">

  <h1><?= Html::encode($this->title) ?></h1> 

    <p>
        <?= Html::a('Create Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'iva',
            'descricao',
            [
                'attribute'=>'ativo',
                'value'=> 'Ativo',
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}{update}',
                'urlCreator' => function ($action, Iva $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idIva' => $model->idIva]);
                 }
            ],
        ],
    ]); ?>


</div>

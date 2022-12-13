<?php

use common\models\Iva;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\IvaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ivas';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-index">

    <!--<h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Criar Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
    </p>

    <br><br> 
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> ivas',
        'emptyText' => 'Não foram encontrados ivas',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'Nº',
                'headerOptions' => ['style' => 'color:#337ab7'],
            ],
            'iva',
            'descricao',
            [
                'attribute'=>'ativo',
                'value'=> 'Ativo',
                'filter'=>array("1"=>"Ativo","0"=>"Inativo"),
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

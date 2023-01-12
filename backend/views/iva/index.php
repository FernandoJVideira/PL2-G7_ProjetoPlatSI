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
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar Iva', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> ivas',
                'emptyText' => 'Não foram encontrados ivas',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
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
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{update}',
                        'urlCreator' => function ($action, Iva $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'idIva' => $model->idIva]);
                         }
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>

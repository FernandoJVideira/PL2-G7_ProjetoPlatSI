<?php

use common\models\Carrinho;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EncomendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carrinhos';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->nullDisplay = 'N\A';
?>
<div class="carrinho-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'emptyText' => 'Não foram encontradas encomendas',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'attribute' => 'estado',
                        'filter'=>array("emProcessamento" => "Em Processamento", "fechado" => "Fechado"),
                    ],
                    [
                        'attribute' => 'data_criacao',
                        'filter' => \yii\jui\DatePicker::widget([
                            'model' => $searchModel,
                            'options' => ['class' => 'form-control'],
                            'attribute' => 'data_criacao',
                            'clientOptions' => [
                                'autoClose' => true,
                                'yearRange' => '2000:' . date('Y'),
                            ],
                            'language' => 'pt',
                            'dateFormat' => 'yyyy-MM-dd',
                        ]),
                        'format' => ['date', 'php: yy-m-d H:i:s'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{view}&nbsp;&nbsp;{fatura}',
                        'buttons' => [
                            'view' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', ['view', 'idCarrinho' => $model->idCarrinho], ['title' => 'Ver encomenda']);
                            },
                            'fatura' => function ($url, $model, $key) {
                                if($model->estado == 'fechado')
                                    return Html::a('<i class="fa fa-file" aria-hidden="true"></i>', ['fatura/view', 'idCarrinho' => $model->idCarrinho], ['title' => 'Ver fatura']);
                                else
                                    return '';
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

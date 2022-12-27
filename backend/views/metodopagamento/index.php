<?php

use common\models\Metodopagamento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MetodopagamentoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Métodos de pagamento';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodopagamento-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar método de pagamento', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => false,
                'emptyText' => 'Nenhum método de pagamento encontrado',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'metodoPagamento',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{delete}',
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'buttons' => [
                            'delete' => function($url, $model){
                                return Html::a('<i class="fas fa-trash"></i>', ['delete', 'idMetodo' => $model->idMetodo],
                                    [
                                        'class' => $model->getLojaIdLojas()->count() > 0 ? 'btn disabled' : 'btn btn-danger',
                                        'method' => 'post',
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pertende eliminar o método de pagamento?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>

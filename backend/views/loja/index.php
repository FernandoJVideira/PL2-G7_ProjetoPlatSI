<?php

use common\models\Loja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LojaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lojas';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loja-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar Loja', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> lojas',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'descricao',
                    'email:email',
                    'telefone',
                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{view}&nbsp;{update}&nbsp;{delete}',
                        'urlCreator' => function ($action, Loja $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'idLoja' => $model->idLoja]);
                         },
                         'buttons' => [
                            'delete' => function($url, $model){
                                            return Html::a('<i class="fas fa-trash"></i>', ['delete', 'idLoja' => $model->idLoja],
                                                    [
                                                        'class' => '',
                                                        'method' => 'post',
                                                        'data' => [
                                                                'confirm' => 'Tem a certeza que pertende eliminar a loja?',
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

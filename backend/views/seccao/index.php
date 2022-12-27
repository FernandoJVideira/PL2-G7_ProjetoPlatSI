<?php

use common\models\Seccao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\SeccaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Seccões';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccao-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar secção', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => false,
                'emptyText' => 'Não foram encontradas secções',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'nome',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{delete}',
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'buttons' => [
                            'delete' => function($url, $model){
                                return Html::a('<i class="fas fa-trash"></i>', ['delete', 'idSeccao' => $model->idSeccao],
                                    [
                                        'class' => $model->getLojaIdLojas()->count() > 0 ? 'btn disabled' : 'btn btn-danger',
                                        'method' => 'post',
                                        'data' => [
                                            'confirm' => 'Tem a certeza que pertende eliminar a secção?',
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

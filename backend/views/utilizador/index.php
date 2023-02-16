<?php

use common\models\Utilizador;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UtilizadorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Utilizadores('.$_GET['role'].')';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizador-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar '. $_GET['role'], ['create', 'role' => $_GET['role']], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index', 'role' => $_GET['role']], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> utilizadores',
                'summaryOptions' => ['class' => 'summary'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'nome',
                    'nif',
                    'telemovel',
                    [
                            'label' => 'Username',
                            'attribute' => 'username',
                            'value' => 'user.username',
                    ],
                    [
                        'label' => 'Email',
                        'attribute' => 'email',
                        'value' => 'user.email',
                    ],
                    //'id_user',
                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{view}&nbsp;&nbsp;{delete}',
                        'urlCreator' => function ($action, Utilizador $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'idUser' => $model->idUser, 'role' => $_GET['role']]);
                         },
                         'buttons' => [
                                 'delete' => function($url, $model){
                                            if($model->id_user == Yii::$app->user->id)
                                                return null;
                                            else
                                                return Html::a('<i class="fas fa-trash"></i>', ['delete', 'idUser' => $model->idUser],
                                                    [
                                                        'method' => 'post',
                                                        'data' => [
                                                                'confirm' => 'Tem a certeza que pertende eliminar o utilizador?',
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

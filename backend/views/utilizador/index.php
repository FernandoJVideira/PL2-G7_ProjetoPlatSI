<?php

use backend\models\AuthAssignment;
use common\models\Utilizador;
use yii\helpers\ArrayHelper;
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
    <p>
        <?= Html::a('Criar '. $_GET['role'], ['create', 'role' => $_GET['role']], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> utilizadores',
        'summaryOptions' => ['class' => 'summary'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, Utilizador $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idUser' => $model->idUser, 'role' => $_GET['role']]);
                 },
                 'buttons' => [
                    'delete' => function($url, $model){
                                    if($model->idUser == Yii::$app->user->id)
                                        return null;
                                    else
                                        return Html::a('<i class="fas fa-trash"></i>', ['delete', 'idUser' => $model->idUser],
                                            [
                                                'class' => '',
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

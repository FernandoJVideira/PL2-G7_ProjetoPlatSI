<?php

use yii\grid\GridView;
use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = $model->user->username;
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utilizador-view">
    <p>
        <?= Html::a('Actualizar', ['update', 'idUser' => $model->idUser, 'role' => \common\models\Utilizador::getPerfil($model->idUser)], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'idUser' => $model->idUser], [
            'class' => 'btn btn-danger'.($model->idUser == Yii::$app->user->id ? ' disabled' : ''),
            'data' => [
                'confirm' => 'Tem a certeza que pertende eliminar o utilizador?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= \yii\widgets\DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'nif',
            'telemovel',
            [
                'label' => 'Loja',
                'attribute' => 'id_loja',
                'value' => $model->loja->descricao ?? 'Não definido',
                'visible' => $model->id_loja != null,
            ],
        ],
    ]) ?>
    <?= DetailView::widget([
        'model' => $user ?? $model->user,
        'buttons1' => '{update}',
        'panel' => [
            'heading' => 'Informações de Login',
            'type' => DetailView::TYPE_INFO,
        ],
        'formOptions' => ['action' => ['user/update', 'id' => $model->id_user], 'method' => 'post'],
        'attributes' => [
            [
                'label' => 'Username',
                'attribute' => 'username',
            ],
            [
                'label' => 'Email',
                'attribute' => 'email',
            ],
        ],
    ]) ?>
    <?php $gridViewDataProvider = new \yii\data\ArrayDataProvider([
        'allModels' => $model->moradas,
        'sort' => [
            'attributes' => ['idMorada'],
        ],
        'pagination' => ['pageSize' => 10]
    ]);
    echo Html::a('Adicionar', ['morada/create', 'idUser' => $model->idUser, 'role' => \common\models\Utilizador::getPerfil($model->idUser)], ['class' => 'btn btn-primary']);

    echo GridView::widget([
        'dataProvider' => $gridViewDataProvider,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> morada(s)',
        'columns' => [
            'rua',
            'cod_postal',
            'cidade',
            'pais',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => $model->getMoradas()->count() > 1 ?'{update} {delete}': '{update}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', ['morada/update', 'idMorada' => $model->idMorada]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i>', ['morada/delete', 'idMorada' => $model->idMorada], [
                            'data' => [
                                'confirm' => 'Tem a certeza que pertende eliminar a morada?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ]
    ])

    ?>
</div>

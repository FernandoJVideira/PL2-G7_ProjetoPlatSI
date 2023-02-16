<?php

use yii\grid\GridView;
use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = 'Perfil';
\yii\web\YiiAsset::register($this);
?>
<div class="utilizador-view">
    <div class="mt-3" style="text-align: center"><h1><?= Html::encode($this->title) ?></h1></div>
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <?= Html::a('Actualizar', ['update', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="card-body">
                <?php \yii\widgets\DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nome',
                        'nif',
                        'telemovel',
                    ],
                ]) ?>
                <dl class="row">
                    <dt class="col-sm-3 lead"><strong>Nome:</strong></dt>
                    <dd class="col-sm-9 lead"><?= $model->nome ?></dd>

                    <dt class="col-sm-3 lead"><strong>NIF:</strong></dt>
                    <dd class="col-sm-9 lead"><?= $model->nif ?>
                    </dd>
                    <dt class="col-sm-3 lead"><strong>Telemóvel:</strong></dt>
                    <dd class="col-sm-9 lead">
                        <?= $model->telemovel ?>
                    </dd>
                </dl>
                <hr>
            </div>
        </div>
    <br>
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <?= Html::a('Actualizar', ['user/update', 'id' => $model->idUser], ['class' => 'btn btn-primary']); ?>
            <?= Html::a('Alterar password', ['user/password', 'id' => $model->idUser], [
                'class' => 'btn btn-dark',
                'style' => 'float:right',
            ]) ?>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $user ?? $model->user,
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
        </div>
    </div>


    <br>
    <div class="card w-75 mx-auto">
        <div class="card-header">
            <?= Html::a('Adicionar', ['morada/create', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']); ?>
        </div>
        <div class="card-body">
            <?php $gridViewDataProvider = new \yii\data\ArrayDataProvider([
                'allModels' => $model->moradas,
                'sort' => [
                    'attributes' => ['idMorada'],
                ],
                'pagination' => ['pageSize' => 10]
            ]);

            echo GridView::widget([
                'dataProvider' => $gridViewDataProvider,
                'summary' => false,
                'columns' => [
                    'rua',
                    'cod_postal',
                    'cidade',
                    'pais',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => $model->getMoradas()->count() > 1 ?'{update}&nbsp;&nbsp;{delete}': '{update}',
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
    </div>
</div>
<?php

use yii\grid\GridView;
use yii\helpers\Html;
use kartik\detail\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = $model->user->username;
\yii\web\YiiAsset::register($this);
?>
<div class="utilizador-view">
    <div class="">
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

                    <dt class="col-sm-3 lead"><strong>Nif:</strong></dt>
                    <dd class="col-sm-9 lead"><?= $model->nif ?>
                    </dd>
                    <dt class="col-sm-3 lead"><strong>Telemóvel:</strong></dt>
                    <dd class="col-sm-9 lead">
                        <?= $model->telemovel ?>
                    </dd>
                    <?php if($model->id_loja != null){ ?>
                        <dt class="col-sm-3 lead"><strong>Loja:</strong></dt>
                        <dd class="col-sm-9 lead"><?= $model->loja->descricao ?></dd>
                    <?php } ?>


                </dl>
                <hr>
                <div class="">
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
                </div>
            </div>
        </div>
    </div>
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
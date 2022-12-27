<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $seccaoProvider */
/** @var array $seccoesLoja */
/** @var array $metpagamentoProvider */
/** @var array $metpagamentoLoja */

$this->title = 'Gestão Geral da Loja: ' . (\common\models\Loja::findOne($_GET['idLoja'])->descricao ?? 'loja');

?>
<div class="gestao-index">
    <div class="row">
        <div class="col d-flex justify-content-center">
        <?php if(isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Admin'])){ ?>
            <div class="w-25" style="margin-bottom: 1em">
                <?php
                $form = ActiveForm::begin(['action' => 'index', 'method' => 'GET']);
                echo $form->field(new \common\models\Loja, 'idLoja')->dropDownList(ArrayHelper::map(\common\models\Loja::find()->where('ativo = 1')->all(),'idLoja','descricao'), ['onchange' => 'this.form.submit()', 'id' => 'idLoja', 'name' => 'idLoja', 'options' => [ ($_GET['idLoja'] ?? null) => ['Selected'=>'selected']]])->label(false);
                ActiveForm::end();
                ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mx-auto w-50">
                <div class="card-header">
                    Secções
                </div>
                <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $seccaoProvider,
                        'summary' => false,
                        'emptyText' => 'Não existem secções',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn',
                                'header' => 'Nº',
                                'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                                'contentOptions' => ['style' => 'text-align: center;'],
                            ],
                            'nome',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'headerOptions' => [
                                    'style' => 'width: 5em',
                                ],
                                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                                'template' => '{switch}',
                                'buttons' => [
                                    'switch' => function ($url, $model, $key) use ($seccoesLoja) {
                                        if(array_search($key, $seccoesLoja) !== false)
                                            return Html::a('<button style="width: 6em;" type="button" class="btn btn-danger">Remover</button>', ['delete', 'idLoja' => $_GET['idLoja'], 'idSeccao' => $model->idSeccao], [
                                                'title' => 'Remover',
                                                'data' => [
                                                    'confirm' => 'Tem a certeza que pretende remover esta seccao?',
                                                    'method' => 'post',
                                                ],
                                            ]);
                                        else
                                            return Html::a('<button style="width: 6em;" type="button" class="btn btn-success">Adicionar</button>', ['create', 'idLoja' => $_GET['idLoja'], 'idSeccao' => $model->idSeccao]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mx-auto w-50"  style="height:auto;min-width: 400px;">
                <div class="card-header">
                    Métodos de Pagamento
                </div>
                <div class="card-body" >
                    <?= GridView::widget([
                        'dataProvider' => $metpagamentoProvider,
                        'summary' => false,
                        'emptyText' => 'Não existem métodos de pagamento',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn',
                                'header' => 'Nº',
                                'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                                'contentOptions' => ['style' => 'text-align: center;'],
                            ],
                            'metodoPagamento',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'headerOptions' => [
                                    'style' => 'width: 5em',
                                ],
                                'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                                'template' => '{switch}',
                                'buttons' => [
                                    'switch' => function ($url, $model, $key) use ($metpagamentoLoja) {
                                        if(array_search($key, $metpagamentoLoja) !== false)
                                            return Html::a('<button style="width: 6em;" type="button" class="btn btn-danger">Remover</button>', ['delete', 'idLoja' => $_GET['idLoja'], 'idMetodo' => $model->idMetodo], [
                                                'title' => 'Remover',
                                                'data' => [
                                                    'confirm' => 'Tem a certeza que pretende remover este método de pagamento?',
                                                    'method' => 'post',
                                                ],
                                            ]);
                                        else
                                            return Html::a('<button style="width: 6em;" type="button" class="btn btn-success">Adicionar</button>', ['create', 'idLoja' => $_GET['idLoja'], 'idMetodo' => $model->idMetodo]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

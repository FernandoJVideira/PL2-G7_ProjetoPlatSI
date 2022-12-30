<?php

use common\models\Stock;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Gestão de stock: ' . (\common\models\Loja::findOne($_GET['idLoja'])->descricao ?? 'loja');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <?php if(isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Admin'])){ ?>
                <div class="w-25" style="margin-bottom: 1em">
                    <?php
                    $form = ActiveForm::begin(['action' => 'index', 'method' => 'GET']);
                    echo $form->field(new \common\models\Loja, 'idLoja')->dropDownList(ArrayHelper::map(\common\models\Loja::find()->where('ativo = 1')->all(),'idLoja','descricao'), ['onchange' => 'this.form.submit()', 'id' => 'idLoja', 'name' => 'idLoja', 'options' => [ ($_GET['idLoja'] ?? null) => ['Selected'=>'selected']]])->label(false);
                    ActiveForm::end();
                    ?>
                </div>
            <?php } ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                            'label' => 'Stock',
                            'attribute' => 'quant_stock',
                            'value' => function ($model) {
                                return $model['quant_stock'] ?? 0;
                            },
                    ],
                    [
                            'label' => 'Requisitado',
                            'attribute' => 'quant_req',
                            'value' => function ($model) {
                                return $model['quant_req'] ?? 0;
                            },
                    ],
                    [
                        'label' => 'Produto',
                        'attribute' => 'nome',
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{create}&nbsp;&nbsp;{update}',
                        'headerOptions' => [
                                'style' => 'width: 5em',
                                ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'buttons' => [
                                'create' => function ($url, $model, $key) {
                                    return Html::a('<i class="fas fa-plus"></i>', ['create', 'idProduto' => $model['idProduto']]);
                                },
                                'update' => function($url, $model){
                                    if($model['quant_req'] == 0 || isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Funcionario']))
                                        return null;
                                    else
                                        return Html::a('<i class="fas fa-check"></i>', ['update', 'idStock' => $model['idStock']]);
                                    }
                        ],

                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

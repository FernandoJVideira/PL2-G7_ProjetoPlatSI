<?php

use common\models\Produto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ProdutoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar Produto', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> produtos',
                'emptyText' => 'Não foram encontrados produtos',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'nome',
                    'descricao:ntext',
                    'referencia',
                    [
                        'attribute'=>'preco_unit',
                        'value'=> 'Preco',
                    ],
                    [
                            'attribute' => 'dataCriacao',
                            'filter' => \yii\jui\DatePicker::widget([
                                'model' => $searchModel,
                                'options' => ['class' => 'form-control'],
                                'attribute' => 'dataCriacao',
                                'clientOptions' => [
                                    'autoClose' => true,
                                    'yearRange' => '2000:' . date('Y'),
                                ],
                                'language' => 'pt',
                                'dateFormat' => 'yyyy-MM-dd',
                            ]),
                            'format' => ['date', 'php: yy-m-d'],
                    ],
                    [
                        'attribute'=>'ativo',
                        'value'=> 'Ativo',
                        'filter'=>array("1"=>"Ativo","0"=>"Inativo"),
                    ],
                    [
                        'label' => 'Categoria',
                        'attribute'=>'id_categoria',
                        'value'=> 'categoria.nome',
                        'filter'=> \yii\helpers\ArrayHelper::map(\common\models\Categoria::find()->all(), 'idCategoria', 'nome'),
                        ],
                    [
                        'class' => ActionColumn::className(),
                        //'options' => ['class' => 'd-flex justify-content-center'],
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{view}&nbsp;&nbsp;{update}',
                        'urlCreator' => function ($action, Produto $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'idProduto' => $model->idProduto]);
                         }
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>

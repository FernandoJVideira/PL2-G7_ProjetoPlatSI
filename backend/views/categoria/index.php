<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CategoriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <p>
                <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?><?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
            </p>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> categorias',
                'emptyText' => 'Não foram encontradas categorias',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Nº',
                        'headerOptions' => ['style' => 'color:#007bff; width: 4em; text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;'],
                    ],
                    'nome',
                    [
                        'attribute'=>'ativo',
                        'value'=> 'Ativo', //vai buscar a action
                        'filter'=>array("1"=>"Ativo","0"=>"Inativo"),
                    ],
                    [
                        'label' => 'Iva',
                        'attribute'=>'descricao',
                        'value'=> 'iva.descricao',//vai buscar a action
                    ],
                    [
                        'attribute'=>'id_categoria',
                        'value'=> 'categoria.nome',//vai buscar a action
                        'filter'=>Categoria::find()->select(['nome', 'idCategoria'])->indexBy('idCategoria')->where(['id_categoria'=>null])->column(),
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'headerOptions' => [
                            'style' => 'width: 5em',
                        ],
                        'contentOptions' => ['style'=>'vertical-align: middle; text-align: center;'],
                        'template' => '{update}',
                        'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'idCategoria' => $model->idCategoria]);
                         }
                    ],
                ],
            ]); ?>
        </div>
    </div>


</div>

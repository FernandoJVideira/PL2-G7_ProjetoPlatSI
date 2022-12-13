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

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Limpar pesquisa',['index'], ['class' => 'btn btn-primary', 'style' => 'float:right']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <br><br> 
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> categorias',
        'emptyText' => 'Não foram encontradas categorias',
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'Nº',
                'headerOptions' => ['style' => 'color:#337ab7'],
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
                'template' => '{update}',
                'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCategoria' => $model->idCategoria]);
                 }
            ],
        ],
    ]); ?>


</div>

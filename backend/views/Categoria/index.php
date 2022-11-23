<?php

use backend\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CategoriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <br><br> 
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            [
                'attribute'=>'ativo',
                'value'=> 'Ativo', //vai buscar a action 
            ],
            [
                'attribute'=>'id_iva',
                'value'=> 'IdIva',//vai buscar a action 
            ],
            [
                'attribute'=>'id_categoria',
                'value'=> 'IdCategoria',//vai buscar a action 
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}{update}',
                'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCategoria' => $model->idCategoria]);
                 }
            ],
        ],
    ]); ?>


</div>

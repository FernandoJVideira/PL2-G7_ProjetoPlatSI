<?php

use common\models\Fatura;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\FaturaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFatura',
            'nomeUtilizador',
            'nifUtilizador',
            'nomeEmpresa',
            'nifEmpresa',
            //'descricaoLoja',
            //'dataCriacao',
            //'id_metodo',
            //'id_utilizador',
            //'id_loja',
            //'id_carrinho',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fatura $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idFatura' => $model->idFatura]);
                 }
            ],
        ],
    ]); ?>


</div>

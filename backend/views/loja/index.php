<?php

use common\models\Loja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LojaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lojas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Loja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLoja',
            'id_empresa',
            'descricao',
            'email:email',
            'telefone',
            //'ativo',
            //'id_morada',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Loja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idLoja' => $model->idLoja]);
                 }
            ],
        ],
    ]); ?>


</div>

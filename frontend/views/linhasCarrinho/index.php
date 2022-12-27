<?php

use common\models\Linhacarrinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\LinhacarrinhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Linhacarrinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linhacarrinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Linhacarrinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLinha',
            'estado',
            'quantidade',
            'id_carrinho',
            'id_produto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Linhacarrinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idLinha' => $model->idLinha]);
                 }
            ],
        ],
    ]); ?>


</div>

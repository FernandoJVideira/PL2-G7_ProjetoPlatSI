<?php

use common\models\Favorito;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\FavoritoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Favoritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorito-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'id_produto',
                'value' => function (Favorito $model) {
                    return Html::a($model->produto->nome, Url::to(['produto/view', 'idProduto' => $model->produto->idProduto]));
                },
                'format' => 'html'
            ],

            [
                'class' => ActionColumn::class,
                'template' => '{delete}'
            ],
        ],
    ]); ?>
</div>
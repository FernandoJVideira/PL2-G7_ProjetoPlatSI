<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idProduto',
            'nome',
            'descricao:ntext',
            [
                'attribute' => 'preco_unit',
                'value' => $model->preco_unit . '€'
            ],
            'imagem',
            [
                'attribute' => 'id_categoria',
                'value' => $model->categoria->nome
            ],
        ],
    ]) ?>

</div>
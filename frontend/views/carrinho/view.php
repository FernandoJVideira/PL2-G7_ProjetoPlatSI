<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->title = $model->idCarrinho;
$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCarrinho' => $model->idCarrinho], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCarrinho' => $model->idCarrinho], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCarrinho',
            'estado',
            'data_criacao',
            'id_morada',
            'id_loja',
            'id_user',
            'id_promocao',
        ],
    ]) ?>

</div>

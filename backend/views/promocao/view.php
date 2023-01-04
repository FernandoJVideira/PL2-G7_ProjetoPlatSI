<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Promocao $model */

$this->title = $model->nome_promo;
$this->params['breadcrumbs'][] = ['label' => 'Promocaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promocao-view">

    <p>
        <?= Html::a('Update', ['update', 'idPromocao' => $model->idPromocao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPromocao' => $model->idPromocao], [
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
            'idPromocao',
            'nome_promo',
            'percentagem',
            'data_limite',
            'codigo',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Promocao $model */

$this->title = $model->idPromocao;
$this->params['breadcrumbs'][] = ['label' => 'Promocaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promocao-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'codigo',
            'percentagem',
            'data_limite',
        ],
    ]) ?>

</div>

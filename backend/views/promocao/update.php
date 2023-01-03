<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Promocao $model */

$this->title = 'Update Promocao: ' . $model->idPromocao;
$this->params['breadcrumbs'][] = ['label' => 'Promocaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPromocao, 'url' => ['view', 'idPromocao' => $model->idPromocao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promocao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

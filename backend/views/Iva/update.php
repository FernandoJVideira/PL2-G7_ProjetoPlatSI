<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Iva $model */

$this->title = 'Update Iva: ' . $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idIva, 'url' => ['view', 'idIva' => $model->idIva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="iva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'items' => $items
    ]) ?>

</div>

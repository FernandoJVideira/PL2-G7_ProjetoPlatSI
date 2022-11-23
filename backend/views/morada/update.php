<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Morada $model */

$this->title = 'Actualizar Morada';
//$this->params['breadcrumbs'][] = ['label' => 'Moradas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idMorada, 'url' => ['view', 'idMorada' => $model->idMorada]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="morada-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

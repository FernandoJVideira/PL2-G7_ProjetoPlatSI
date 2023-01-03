<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PromocaoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="promocao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPromocao') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'percentagem') ?>

    <?= $form->field($model, 'data_limite') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

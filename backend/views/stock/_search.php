<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\StockSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idStock') ?>

    <?= $form->field($model, 'quant_stock') ?>

    <?= $form->field($model, 'quant_req') ?>

    <?= $form->field($model, 'id_produto') ?>

    <?= $form->field($model, 'id_loja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

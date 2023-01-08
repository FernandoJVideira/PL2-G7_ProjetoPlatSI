<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EncomendaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carrinho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCarrinho') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'data_criacao') ?>

    <?= $form->field($model, 'id_morada') ?>

    <?= $form->field($model, 'id_loja') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'id_promocao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

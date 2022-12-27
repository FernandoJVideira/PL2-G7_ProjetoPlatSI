<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\LinhacarrinhoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="linhacarrinho-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLinha') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'id_carrinho') ?>

    <?= $form->field($model, 'id_produto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

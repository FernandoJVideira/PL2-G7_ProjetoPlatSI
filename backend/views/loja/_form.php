<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */
/** @var common\models\Morada $morada */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="loja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($morada, 'rua')->textInput() ?>

    <?= $form->field($morada, 'cidade')->textInput() ?>

    <?= $form->field($morada, 'cod_postal')->textInput() ?>

    <?= $form->field($morada, 'pais')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
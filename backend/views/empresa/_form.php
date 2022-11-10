<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */
/** @var common\models\Morada $morada */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($morada, 'rua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($morada, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($morada, 'cod_postal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($morada, 'pais')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
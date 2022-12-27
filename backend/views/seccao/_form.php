<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Seccao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="seccao-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-body">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="iva-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'iva')->textInput() ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'ativo')->dropDownList(['1' => 'Ativo', '0' => 'Inativo']) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

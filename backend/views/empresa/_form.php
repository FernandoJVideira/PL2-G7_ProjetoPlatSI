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

    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'descricao_social')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'rua')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'cidade')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'cod_postal')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'pais')->textInput(['maxlength' => true]) ?>
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
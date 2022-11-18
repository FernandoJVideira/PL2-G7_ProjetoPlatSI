<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Morada $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="morada-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'rua')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'cod_postal')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="utilizador-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row px-xl-5">
        <div class="card mx-auto" style="width: 50rem;">
            <div class="card-body">
                <div class=" mx-auto">
                    <div class="p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'telemovel')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end();?>

</div>

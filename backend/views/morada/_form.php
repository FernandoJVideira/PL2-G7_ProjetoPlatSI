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
        <div class="card mx-auto" style="width: 50rem;">
            <div class="card-body">
                <div class=" mx-auto">
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
                                <?php $this->beginContent('@backend/views/layouts/_paises.php', ['id' => 'morada-pais', 'name' => 'Morada[pais]', 'selected' => $model->pais]) ?><?php $this->endContent();?>
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
    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Alterar Password';

?>

<div class="user-change-password">

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row px-xl-5">
            <div class="card mx-auto" style="width: 50rem;">
                <div class="card-body">
                    <div class=" mx-auto">
                        <div class="p-30 mb-5">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <?= $form->field($model, 'currentPassword')->passwordInput() ?>
                                </div>
                                <div class="col-md-6 form-group">
                                </div>
                                <div class="col-md-6 form-group">
                                    <?= $form->field($model, 'newPassword')->passwordInput() ?>
                                </div>
                                <div class="col-md-6 form-group">
                                    <?= $form->field($model, 'newPasswordRepeat')->passwordInput() ?>
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

</div>

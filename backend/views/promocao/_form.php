<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var common\models\Promocao $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerJsFile('@web/js/script.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="promocao-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row px-xl-5">
        <div class="card mx-auto" style="width: 50rem;">
            <div class="card-body">
                <div class=" mx-auto">
                    <div class="p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'id' => 'code']) ?>
                            </div>
                            <div class="col-md-6 d-flex align-items-center form-group pt-3">
                                <?= Html::button('Gerar Código', ['class' => 'btn btn-primary', 'id' => 'gerarCodigo']) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'nome_promo')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'percentagem')->textInput() ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'data_limite')->widget(DatePicker::className(), [
                                    'language' => 'pt',
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options' => ['class' => 'form-control'],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

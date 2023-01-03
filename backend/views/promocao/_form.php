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

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'id' => 'code']) ?>
    
    <?= Html::button('Gerar Código', ['class' => 'btn btn-primary', 'id' => 'gerarCodigo']) ?>

    <?= $form->field($model, 'percentagem')->textInput() ?>

    <?= $form->field($model, 'data_limite')->widget(DatePicker::className(), [
        'language' => 'pt',
        'dateFormat' => 'dd-MM-yyyy',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

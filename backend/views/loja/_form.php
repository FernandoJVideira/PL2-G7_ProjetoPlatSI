<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */
/** @var common\models\Morada $morada */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="loja-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'id_empresa')->dropDownList(ArrayHelper::map($empresa, 'idEmpresa', 'descricao_social')) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'telefone')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'rua')->textInput() ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'cidade')->textInput() ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($morada, 'cod_postal')->textInput() ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?php $this->beginContent('@backend/views/layouts/_paises.php', ['id' => 'morada-pais', 'name' => 'Morada[pais]', 'selected' => $morada->pais]) ?><?php $this->endContent();?>
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
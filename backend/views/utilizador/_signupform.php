<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\SignupForm $model */
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
                                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'telemovel')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'nif')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?php $this->beginContent('@backend/views/layouts/_paises.php', ['id' => 'signupform-pais', 'name' => 'SignupForm[pais]', 'selected' => $model->pais]) ?><?php $this->endContent();?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group" style="display: none">
                                <?= $form->field($model, 'role')->hiddenInput(['value' => $_GET['role']]) ?>
                            </div>
                            <?php if ($_GET['role'] != 'Admin' && $_GET['role'] != 'Cliente'){ ?>
                                    <div class="col-md-6 form-group 1">
                                        <?= $form->field($model, 'id_loja')->dropDownList( [null => ''] +\yii\helpers\ArrayHelper::map( $lojas, 'idLoja', 'descricao'), ['options' => [ $model->id_loja ?? \common\models\Utilizador::findOne(Yii::$app->user->id)->id_loja ?? null => ['Selected'=>'selected']]])->label('Loja') ?>
                                        <?php if(isset($erro)){
                                            echo '<div class="help-block">Tem de ser selecionada uma loja!</div>';
                                        } ?>
                                    </div>
                                <?php } ?>
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


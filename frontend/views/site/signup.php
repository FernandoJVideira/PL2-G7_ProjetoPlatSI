<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <!-- Checkout Start -->
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Dados pessoais</span></h5>
                <div class="p-30 mb-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'nome')->label('Nome')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Nome']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'username')->label('Username')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Username']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'email')->label('E-mail')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'E-mail']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'password')->label('Password')->passwordInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Password']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'telemovel')->label('Telemóvel')->textInput(['maxlength' => 9, 'class' => 'form-control', 'placeholder' => 'Telemóvel']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'nif')->label('Nif')->textInput(['maxlength' => 9, 'class' => 'form-control', 'placeholder' => 'Nif']) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'morada')->label('Morada')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Morada']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?php $this->beginContent('@backend/views/layouts/_paises.php', ['id' => 'signupform-pais', 'name' => 'SignupForm[pais]', 'selected' => $model->pais]) ?><?php $this->endContent();?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'cidade')->label('Cidade')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Cidade']) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <?= $form->field($model, 'codigo_postal')->label('Código Postal')->textInput(['maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'Código Postal']) ?>
                        </div>
                    </div>
                    <?= Html::submitButton('Registar', ['class' => 'btn btn-block btn-primary font-weight-bold py-3']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    <!-- Checkout End -->
</div>

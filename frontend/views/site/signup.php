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
                            <label>Pais</label>
                            <select class="custom-select form-control" name="SignupForm[pais]" id="signupform-pais">
                                <option value="Aland Islands">Ilhas Aland</option>
                                <option value="Albania">Albânia</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Austria">Áustria</option>
                                <option value="Belarus">Bielo-Rússia</option>
                                <option value="Belgium">Bélgica</option>
                                <option value="Bosnia and Herzegovina">Bósnia e Herzegovina</option>
                                <option value="Bulgaria">Bulgária</option>
                                <option value="Croatia">Croácia</option>
                                <option value="Czech Republic">República Checa</option>
                                <option value="Denmark">Dinamarca</option>
                                <option value="Estonia">Estônia</option>
                                <option value="Faroe Islands">ilhas Faroe</option>
                                <option value="Finland">Finlândia</option>
                                <option value="France">França</option>
                                <option value="Germany">Alemanha</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Grécia</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Holy See (Vatican City State)">Santa Sé (Estado da Cidade do Vaticano)</option>
                                <option value="Hungary">Hungria</option>
                                <option value="Iceland">Islândia</option>
                                <option value="Ireland">Irlanda</option>
                                <option value="Isle of Man">Ilha de Man</option>
                                <option value="Italy">Itália</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Kosovo">Kosovo</option>
                                <option value="Latvia">Letônia</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lituânia</option>
                                <option value="Luxembourg">Luxemburgo</option>
                                <option value="Macedonia, the Former Yugoslav Republic of">Macedônia, Antiga República Iugoslava da</option>
                                <option value="Malta">Malta</option>
                                <option value="Moldova, Republic of">Moldávia, República da</option>
                                <option value="Monaco">Mônaco</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Netherlands">Países Baixos</option>
                                <option value="Norway">Noruega</option>
                                <option value="Poland">Polônia</option>
                                <option value="Portugal" selected>Portugal</option>
                                <option value="Romania">Romênia</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Serbia">Sérvia</option>
                                <option value="Serbia and Montenegro">Sérvia e Montenegro</option>
                                <option value="Slovakia">Eslováquia</option>
                                <option value="Slovenia">Eslovênia</option>
                                <option value="Spain">Espanha</option>
                                <option value="Svalbard and Jan Mayen">Svalbard e Jan Mayen</option>
                                <option value="Sweden">Suécia</option>
                                <option value="Switzerland">Suíça</option>
                                <option value="Ukraine">Ucrânia</option>
                                <option value="United Kingdom">Reino Unido</option>
                            </select>
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

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
        <div class="col-lg-8">
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
                    <div class="col-md-6 form-group">
                    <?php if($model->GetPerfil($model->idUser) != 'Cliente' && $model->GetPerfil($model->idUser) != 'Admin' ) {?>
                    <?= $form->field($model, 'id_loja')->dropDownList( [null => ''] +\yii\helpers\ArrayHelper::map( $lojas, 'idLoja', 'descricao'), ['options' => [ $model->id_loja => ['Selected'=>'selected']]])->label('Loja') ?>
                        <?php if(isset($erro)){
                            echo '<div class="help-block">Tem de ser selecionada uma loja!</div>';
                        } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>



    <?php ActiveForm::end();?>

</div>

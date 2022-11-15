<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'preco_unit')->textInput() ?>

    <?= $form->field($model, 'imagem')->textInput()     //fileInput() ?>

    <!-- <summary class="fa fa-info" title="0-> Não Ativo , 1-> Ativo"></summary> -->
    
    <?= $form->field($model, 'ativo')->dropDownList($items) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map($categoria,'idCategoria','nome'),['prompt'=>'--Selecionar Categoria--'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

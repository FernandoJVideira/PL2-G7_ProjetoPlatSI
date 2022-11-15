<?php

use backend\models\Categoria;
use backend\models\Iva;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Categoria $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'ativo')->dropDownList($items) ?>

    <?= $form->field($model, 'id_iva')->dropDownList(ArrayHelper::map($ivas,'idIva','descricao'),['prompt'=>'Não quero'])?> 
    
    <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map($id_categoria,'idCategoria','nome'),['prompt'=>'Não quero'])?>
   
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

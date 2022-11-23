<?php

use PhpParser\Node\Expr\AssignOp\Concat;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'preco_unit')->textInput() ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>
    <?php if($model->imagem){ ?><?= $strUpdate . " ( ". $model->imagem . " ). ";?><?php } ?>

    <br>
    <br>

    <?= $form->field($model, 'ativo')->dropDownList($items) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map($categoria,'idCategoria','nome'),['prompt'=>'--Selecionar Categoria--'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

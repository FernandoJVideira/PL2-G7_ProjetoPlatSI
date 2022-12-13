<?php

use common\models\Categoria;
use common\models\Iva;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'ativo')->dropDownList(['1' => 'Ativo', '0' => 'Inativo']) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'id_iva')->dropDownList(ArrayHelper::map($ivas,'idIva','descricao'))?>
                    </div>
                    <div class="col-md-6 form-group">
                        <?= $form->field($model, 'id_categoria')->dropDownList(isset($categorias) ? ArrayHelper::map($categorias,'idCategoria','nome') :[],['prompt'=>'Não quero'])?>
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

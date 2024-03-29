<?php

use common\models\Produto;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-form mx-auto">


    <?php $form = ActiveForm::begin(); ?>

    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-body">
            <?php if(Yii::$app->controller->action->id == 'update'){ ?>
                    <?= $form->field($model, 'quant_stock')->textInput(['placeholder' => 'Valor máximo: ' . $model->quant_req, 'value' => $model->quant_req])->label('Quantidade recebida') ?>
            <?php }else{ ?>
                    <?= $form->field($model, 'quant_req')->textInput(['value' => $_GET['quantidade'] ?? 0])->label('Quantidade a requisitar') ?>
                    <?= $form->field($model, 'id_produto')->dropDownList(\yii\helpers\ArrayHelper::map(Produto::find()->where('ativo = 1')->all(),'idProduto','nome'),['prompt'=>'--Selecionar Produto--', 'value' => $_GET['idProduto'] ?? null])  ?>
            <?php } ?>
        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>

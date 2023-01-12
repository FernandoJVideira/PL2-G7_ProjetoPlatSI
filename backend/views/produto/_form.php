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
                                <?= $form->field($model, 'preco_unit')->textInput() ?>
                            </div>
                            <div class="col-lg-12 form-group">
                                <?= $form->field($model, 'descricao')->textarea(['rows' => 3, 'maxlength'=>150, 'style' => 'resize:none; word-wrap:break-word;']) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'id_categoria')->dropDownList(ArrayHelper::map($categorias,'idCategoria','nome'),['prompt'=>'--Selecionar Categoria--'])  ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?= $form->field($model, 'ativo')->dropDownList(['1' => 'Ativo', '0' => 'Inativo']) ?>
                            </div>
                            <div class="col-md-6 form-group">
                                <?php
                                $image = $form->field($model, 'imagem')->fileInput();
                                if($model->imagem) {
                                    $image = $form->field($model, 'imagem')->fileInput()->label('Imagem Atual: <img src="../../../common/Images/' . $model->imagem . '" width="100px" height="100px" />');
                                    $image->enableClientValidation = false;
                                }
                                else{
                                    $image = $form->field($model, 'imagem')->fileInput();
                                }

                                echo $image;
                                ?>
                            </div>
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

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = 'Update Produto: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'idProduto' => $model->idProduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produto-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> --> 

    <?= $this->render('_form', [
        'model' => $model,'items' => $items, 'categoria'=>$categoria, "strUpdate" => $strUpdate
    ]) ?>

</div>

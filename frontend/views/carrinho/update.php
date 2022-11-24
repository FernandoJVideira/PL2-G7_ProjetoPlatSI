<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->title = 'Update Carrinho: ' . $model->idCarrinho;
$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCarrinho, 'url' => ['view', 'idCarrinho' => $model->idCarrinho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carrinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

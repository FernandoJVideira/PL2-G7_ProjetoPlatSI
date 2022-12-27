<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Linhacarrinho $model */

$this->title = 'Update Linhacarrinho: ' . $model->idLinha;
$this->params['breadcrumbs'][] = ['label' => 'Linhacarrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLinha, 'url' => ['view', 'idLinha' => $model->idLinha]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linhacarrinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

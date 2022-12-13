<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = 'Receber Stock: ' . $model->produto->nome;
?>
<div class="stock-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

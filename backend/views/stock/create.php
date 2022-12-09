<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Stock $model */

$this->title = 'Requisitar Stock';
//$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Morada $model */

$this->title = 'Criar Morada';
//$this->params['breadcrumbs'][] = ['label' => 'Moradas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="morada-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

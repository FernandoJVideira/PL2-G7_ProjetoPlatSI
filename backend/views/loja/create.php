<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */

$this->title = 'Create Loja';
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loja-create">

    <?= $this->render('_form', [
        'model' => $model,
        'morada' => $morada,
    ]) ?>

</div>
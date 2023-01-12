<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Promocao $model */

$this->title = 'Registar Promoção';
$this->params['breadcrumbs'][] = ['label' => 'Promocaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocao-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

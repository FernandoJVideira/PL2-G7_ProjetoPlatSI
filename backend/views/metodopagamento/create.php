<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Metodopagamento $model */

$this->title = 'Criar método de pagamento';
//$this->params['breadcrumbs'][] = ['label' => 'Metodopagamentos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodopagamento-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

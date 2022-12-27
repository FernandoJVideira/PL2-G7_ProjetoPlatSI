<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */
/** @var common\models\Morada $morada */
/** @var \backend\models\Empresa $empresa */

$this->title = 'Atualizar loja: ' . $model->descricao;
//$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idLoja, 'url' => ['view', 'idLoja' => $model->idLoja]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loja-update">

    <?= $this->render('_form', [
        'model' => $model,
        'morada' => $morada,
        'empresa' => $empresa,
    ]) ?>

</div>
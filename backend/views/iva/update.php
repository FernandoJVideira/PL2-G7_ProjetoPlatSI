<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Actualizar Iva: ' . $model->descricao;
//$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->descricao , 'url' => ['view', 'idIva' => $model->idIva]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="iva-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>

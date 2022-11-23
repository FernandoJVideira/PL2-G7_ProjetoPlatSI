<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */

$this->title = 'Atualizar Empresa: ' . $model->descricao_social;
//$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idEmpresa, 'url' => ['view', 'idEmpresa' => $model->idEmpresa]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empresa-update">

    <?= $this->render('_form', [
        'model' => $model,
        'morada' => $morada,
    ]) ?>

</div>
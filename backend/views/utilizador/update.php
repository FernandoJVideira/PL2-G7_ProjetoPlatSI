<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = 'Actualizar Utilizador: ' . $model->user->username;
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadors', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idUser, 'url' => ['view', 'idUser' => $model->idUser]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="utilizador-update">

    <?= $this->render('_form', [
        'model' => $model,
        'lojas' => $lojas,
        'roles' => $roles,
        'erro' => $erro ?? null,

    ]) ?>

</div>

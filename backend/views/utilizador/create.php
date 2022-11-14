<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = 'Criar Utilizador';
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizador-create">

    <?= $this->render('_form', [
        'model' => $model,
        'lojas' => $lojas,
        'roles' => $roles,
    ]) ?>

</div>

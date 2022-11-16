<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = 'Criar '.$_GET['role'];
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="utilizador-create">

    <?= $this->render('_signupform', [
        'model' => $model,
        'lojas' => $lojas,
        'roles' => $roles,
        'erro' => $erro ?? null,
    ]) ?>

</div>

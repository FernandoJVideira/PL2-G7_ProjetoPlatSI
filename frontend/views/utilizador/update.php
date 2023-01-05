<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = 'Atualizar Utilizador: ' . $model->nome;
?>
<div class="utilizador-update">

    <div class="row d-flex justify-content-center mt-4 mb-3"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

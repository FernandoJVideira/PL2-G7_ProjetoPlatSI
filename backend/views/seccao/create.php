<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Seccao $model */

$this->title = 'Criar Seccao';
//$this->params['breadcrumbs'][] = ['label' => 'Seccaos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccao-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

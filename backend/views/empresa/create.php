<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Morada $morada */
/** @var backend\models\Empresa $model */

$this->title = 'Create Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'morada' => $morada,
    ]) ?>

</div>
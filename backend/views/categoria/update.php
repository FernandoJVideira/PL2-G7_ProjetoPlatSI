<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = 'Actualizar Categoria: ' . $model->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'idCategoria' => $model->idCategoria]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'ivas' => $iva,
        'categorias' => $categorias,
    ]) ?>

</div>

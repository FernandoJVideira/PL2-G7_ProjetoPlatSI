<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Categoria $model */

$this->title = 'Update Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCategoria, 'url' => ['view', 'idCategoria' => $model->idCategoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'ivas' => $iva, 'id_categoria' => $id_categoria,'items' => $items
    ]) ?>

</div>

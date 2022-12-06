<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */
/** @var backend\models\Categoria $categorias */

$this->title = 'Criar Produto';
//$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> --> 

    <?= $this->render('_form', [
        'model' => $model,
        'categorias'=> $categorias
    ]) ?>

</div>

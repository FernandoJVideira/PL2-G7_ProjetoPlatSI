<?php

use backend\models\Categoria;
use backend\models\Iva;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Categoria $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCategoria' => $model->idCategoria], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            [
                'attribute'=>'ativo',
                'value'=> $model->ativo == 1? 'Activo':'Inativo'
            ],
            [
                'attribute'=>'Iva',
                'value'=> Categoria::get_Nome_Id_Iva($model->id_iva)
            ],
            [
                'attribute'=>'id_categoria',
                'value'=> Categoria::get_Nome_Id_Categoria($model->id_categoria)
            ],
        ],
    ]) ?>

    <?= Html::a('Voltar ao Index', ['index'], ['class' => 'btn btn-primary']) ?>

</div>

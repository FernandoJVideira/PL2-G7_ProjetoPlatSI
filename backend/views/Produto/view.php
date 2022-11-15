<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Categoria;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idProduto' => $model->idProduto], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'descricao:ntext',
            'preco_unit',
            'dataCriacao',
            'imagem',
            [
                'attribute'=>'ativo',
                'value'=> $model->ativo == 1? 'Ativo':'Inativo'
            ],
            [
                'attribute'=>'id_categoria',
                'value'=> Categoria::get_Nome_Id_Categoria($model->id_categoria)
            ],
        ],
    ]) ?>

    <?= Html::a('Voltar ao Index', ['index'], ['class' => 'btn btn-primary']) ?>
</div>

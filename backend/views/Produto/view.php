<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Categoria;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = $model->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div style="display:flex;">

        <div style="flex:100">
            <?= Html::a('Actualizar', ['update', 'idProduto' => $model->idProduto], ['class' => 'btn btn-primary']) ?>
        </div>
        
    </div>
   

    <br><br>


    <div style="text-align: center;">
        <img style="height:250px;width:300px" class="img-responsive" src="../../../common/Images/<?= $model->imagem ?>" alt="<?= $model->imagem ?>">
    </div>


    <br><br>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'descricao:ntext',
            [
                    'attribute' => 'preco_unit',
                    'value' => $model->preco_unit . " €"
            ],
            [
                    'attribute' => 'dataCriacao',
                    'format' => ['date', 'php: yy-m-d'],],
            [
                'attribute' => 'ativo',
                'value' => 'Ativo'
            ],
            [
                'attribute' => 'id_categoria',
                'value' => $model->categoria->nome
            ],
        ],
    ]) ?>

    
</div>
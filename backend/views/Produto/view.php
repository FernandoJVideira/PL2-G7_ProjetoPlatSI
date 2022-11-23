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

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div style="display:flex;">

        <div style="flex:100">
            <?= Html::a('Update', ['update', 'idProduto' => $model->idProduto], ['class' => 'btn btn-primary']) ?>
        </div>
        <div >
            <?= Html::a('Voltar ao Index', ['index'], ['class' => 'btn btn-primary']) ?>
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
            'preco_unit',
            'dataCriacao',
            [
                'attribute' => 'ativo',
                'value' => $model->ativo == 1 ? 'Ativo' : 'Inativo'
            ],
            [
                'attribute' => 'id_categoria',
                'value' => Categoria::get_Nome_Id_Categoria($model->id_categoria)
            ],
        ],
    ]) ?>

    
</div>
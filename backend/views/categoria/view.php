<?php

use common\models\Categoria;
use common\models\Iva;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categoria $model */

$this->title = $model->nome;
//$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categoria-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div style="display:flex;">
    
    <div style="flex:100">
        <?= Html::a('Actualizar', ['update', 'idCategoria' => $model->idCategoria], ['class' => 'btn btn-primary']) ?>
    </div>
    </div>

    <br><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            [
                'attribute'=>'ativo',
                'value'=> $model->Ativo
            ],
            [
                'attribute'=>'Iva',
                'value'=> $model->iva->descricao
            ],
            [
                'attribute'=>'id_categoria',
                'value'=> $model->categoria->nome ?? 'Sem Categoria'
            ],
        ],
    ]) ?>

    

</div>


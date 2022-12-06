<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Iva $model */

$this->title = $model->descricao;
//$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="iva-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div style="display:flex;">
    
    <div style="flex:100">
        <?= Html::a('Actualizar', ['update', 'idIva' => $model->idIva], ['class' => 'btn btn-primary']) ?>
    </div>
    </div>

    <br><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                    'attribute'=>'iva',
                    'value'=> $model->iva.'%',
            ],
            'descricao',
            [
                'attribute'=>'ativo',
                'value' => $model->Ativo,
            ],
        ],
    ]) ?>

    

</div>
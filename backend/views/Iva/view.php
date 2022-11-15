<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Iva $model */

$this->title = $model->descricao;
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="iva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idIva' => $model->idIva], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iva',
            'descricao',
            [
                'attribute'=>'ativo',
                'value'=> $model->ativo == 1? 'Ativo':'Inativo'
            ],
        ],
    ]) ?>

    <?= Html::a('Voltar ao Index', ['index'], ['class' => 'btn btn-primary']) ?>

</div>

<?php

use common\models\Morada;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */
/** @var common\models\Morada $morada */

$this->title = $model->idLoja;
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$getMorada = $model->getMorada();
$morada = $morada->rua . " , " . $morada->cod_postal . " , "   . $morada->cidade . " , "  . $morada->pais;
\yii\web\YiiAsset::register($this);
?>
<div class="loja-view">

    <h1><?= Html::encode($model->descricao) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idLoja' => $model->idLoja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idLoja' => $model->idLoja], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idLoja',
            'id_empresa',
            'descricao',
            'email:email',
            'telefone',
            [
                'attribute' => "id_morada",
                'value' =>  $morada
            ]

        ],
    ]) ?>

</div>
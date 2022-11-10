<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */

$this->title = $model->descricao_social;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$getMorada = $model->getMorada();
$morada = $morada->rua . " , " . $morada->cod_postal . " , "   . $morada->cidade . " , "  . $morada->pais;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">

    <p>
        <?= Html::a('Update', ['update', 'idEmpresa' => $model->idEmpresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEmpresa' => $model->idEmpresa], [
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
            'idEmpresa',
            'descricao_social',
            'email:email',
            'telefone',
            'nif',
            [
                'attribute' => "id_morada",
                'value' =>  $morada
            ]
        ],
    ]) ?>

</div>
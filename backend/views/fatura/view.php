<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Fatura $model */

$this->title = 'Fatura de ' . $model->nomeUtilizador;
//$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fatura-view">
    <p>
        <?= Html::a('Update', ['update', 'idFatura' => $model->idFatura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idFatura' => $model->idFatura], [
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
            'idFatura',
            'nomeUtilizador',
            'nifUtilizador',
            'nomeEmpresa',
            'nifEmpresa',
            'descricaoLoja',
            'dataCriacao',
            'id_metodo',
            'id_utilizador',
            'id_loja',
            'id_carrinho',
        ],
    ]) ?>

</div>

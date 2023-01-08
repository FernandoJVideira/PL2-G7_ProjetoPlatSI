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

<?php

use common\models\Morada;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */

$this->title = $model->descricao;
//$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="loja-view">
    <p>
        <?= Html::a('Atualizar', ['update', 'idLoja' => $model->idLoja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'idLoja' => $model->idLoja], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pretende apagar esta loja?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => "id_empresa",
                'value' => $model->empresa->descricao_social,
            ],
            'descricao',
            'email:email',
            'telefone',
            [
                'attribute' => "id_morada",
                'value' =>  $model->morada->rua . " , " . $model->morada->cod_postal . " , "   . $model->morada->cidade . " , "  . $model->morada->pais
            ]

        ],
    ]) ?>

</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Empresa $model */

$this->title = $model->descricao_social;
//$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$getMorada = $model->getMorada();
$morada = $morada->rua . " , " . $morada->cod_postal . " , "   . $morada->cidade . " , "  . $morada->pais;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'idEmpresa' => $model->idEmpresa], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
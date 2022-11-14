<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Utilizador $model */

$this->title = $model->user->username;
//$this->params['breadcrumbs'][] = ['label' => 'Utilizadores', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="utilizador-view">

    <p>
        <?= Html::a('Update', ['update', 'idUser' => $model->idUser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUser' => $model->idUser], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem a certeza que pertende eliminar o utilizador?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'nif',
            'telemovel',
            [
                'label' => 'Loja',
                'attribute' => 'id_loja',
                'value' => isset($model->loja->descricao)? $model->loja->descricao : 'Não definido',
                'visible' => $model->id_loja != null,
            ],
        ],
    ]) ?>

</div>

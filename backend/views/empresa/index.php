<?php

use backend\models\Empresa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\EmpresaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresa';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">
    <?php //echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> empresas',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'descricao_social',
            'email:email',
            'telefone',
            'nif',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Empresa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idEmpresa' => $model->idEmpresa]);
                }
            ],
        ],
    ]); ?>


</div>
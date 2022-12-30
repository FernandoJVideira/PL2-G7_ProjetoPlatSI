<?php

use common\models\Carrinho;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EncomendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Gestão de encomendas de ' . (\common\models\Loja::findOne($_GET['idLoja'] ?? null)->descricao ?? 'loja');
//$this->params['breadcrumbs'][] = $this->title;

if(!isset($_GET['EncomendaSearch']['estado']))
    Yii::$app->response->redirect(['encomenda/index', 'EncomendaSearch[estado]' => 'emProcessamento', 'idLoja' => $_GET['idLoja']]);


?>
<div class="carrinho-index">
    <div class="card w-75 mx-auto">
        <div class="card-body">
            <?php if(isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Admin'])){ ?>
                <div class="w-25" style="margin-bottom: 1em">
                    <?php
                    $form = ActiveForm::begin(['action' => 'index', 'method' => 'GET']);
                    echo $form->field(new \common\models\Loja, 'idLoja')->dropDownList(ArrayHelper::map(\common\models\Loja::find()->where('ativo = 1')->all(),'idLoja','descricao'), ['onchange' => 'this.form.submit()', 'id' => 'idLoja', 'name' => 'idLoja', 'options' => [ ($_GET['idLoja'] ?? null) => ['Selected'=>'selected']]])->label(false);
                    ActiveForm::end();
                    ?>
                </div>
            <?php } ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'A mostrar <b>{begin}-{end}</b> de <b>{totalCount}</b> encomendas',
        'emptyText' => 'Não foram encontradas encomendas',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'attribute' => 'estado',
                    'filter'=>array("emProcessamento" => "Em Processamento", "fechado" => "Fechado"),
            ],
            [
                'attribute' => 'data_criacao',
                'filter' => \yii\jui\DatePicker::widget([
                    'model' => $searchModel,
                    'options' => ['class' => 'form-control'],
                    'attribute' => 'data_criacao',
                    'clientOptions' => [
                        'autoClose' => true,
                        'yearRange' => '2000:' . date('Y'),
                    ],
                    'language' => 'pt',
                    'dateFormat' => 'yyyy-MM-dd',
                ]),
                'format' => ['date', 'php: yy-m-d H:i:s'],
            ],
            [
                'label' => 'Utilizador',
                'attribute' => 'id_user',
                'value' => 'user.nome',
                'filter' => \yii\jui\AutoComplete::widget([
                    'model' => $searchModel,
                    'attribute' => 'id_user',
                    'clientOptions' => [
                        'source' => ArrayHelper::map(\common\models\User::find()->all(), 'id', 'nome'),
                    ],
                    'options' => [
                        'class' => 'form-control',
                    ],
                ]),
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Carrinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCarrinho' => $model->idCarrinho]);
                 }
            ],
        ],
    ]); ?>
        </div>
    </div>


</div>

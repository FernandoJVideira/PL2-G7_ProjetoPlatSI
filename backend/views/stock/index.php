<?php

use common\models\Stock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Gestão de stock';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">
    <?php if(isset(Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)['Admin'])){ ?>
    <p>
    <form method="GET" action="index">
        <label for="store">Lojas:</label>
        <select id="idLoja" name="idLoja" onchange="this.form.submit()">
            <?php foreach (\common\models\Loja::find()->where('ativo = 1')->all() as $store) { ?>
                <option value="<?= $store->idLoja ?>" <?= $store->idLoja == ($_GET['idLoja'] ?? null) ? 'selected' : '' ?>><?= $store->descricao ?></option>
            <?php } ?>
        </select>
        </select>
    </form>
    </p>
    <?php } ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'Nº',
                'headerOptions' => ['style' => 'color:#337ab7'],
            ],
            [
                    'label' => 'Stock',
                    'attribute' => 'quant_stock',
                    'value' => function ($model) {
                        return $model['quant_stock'] ?? 0;
                    },
            ],
            [
                    'label' => 'Requisitado',
                    'attribute' => 'quant_req',
                    'value' => function ($model) {
                        return $model['quant_req'] ?? 0;
                    },
            ],
            [
                'label' => 'Produto',
                'attribute' => 'nome',
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{create} {update}',
                'headerOptions' => [
                        'style' => 'width: 5%',
                        ],
                'contentOptions' => [
                        'class' => 'd-flex justify-content-between',
                        ],
                'buttons' => [
                        'create' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-plus"></i>', ['create', 'idProduto' => $model['idProduto']]);
                        },
                        'update' => function($url, $model){
                            if($model['quant_req'] == 0)
                                return null;
                            else
                                return Html::a('<i class="fas fa-check"></i>', ['update', 'idStock' => $model['idStock']]);
                            }
                ],

            ],
        ],
    ]); ?>
</div>


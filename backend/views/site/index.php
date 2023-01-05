<?php

use common\widgets\Alert;
use yii\helpers\Html;

$this->title = 'Backoffice - ' . Yii::$app->name;
//$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <?= Alert::widget() ?>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $count_clientes,
                'text' => 'Clientes Registados',
                'icon' => 'fas fa-users',
                'linkText' => 'Ver clientes ',
                'linkUrl' => ['utilizador/index?role=Cliente'],
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $count_carrinhos,
                'text' => 'Compras Concluidas',
                'icon' => 'fa fa-shopping-bag',
                'linkText' => 'Ver encomendas',
                'linkUrl' => ['encomenda/index', 'idLoja' => $idLoja],
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $most_sold_product ?? 'Sem dados',
                'text' => 'Produto mais vendido nos ultimos 7 dias',
                'icon' => 'fa fa-shopping-basket',
                'linkText' => 'Ver encomendas',
                'linkUrl' => ['encomenda/index', 'idLoja' => $idLoja],
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $encomendas_pendentes,
                'text' => 'Encomendas em processamento',
                'icon' => 'fa fa-cart-plus',
                'linkText' => 'Ver encomendas',
                'linkUrl' => ['encomenda/index', 'idLoja' => $idLoja],
            ]) ?>
        </div>
        <?php if(count($emFalta) > 0){  ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Encomendas com produtos em falta</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; foreach ($emFalta as $item) { ?>
                            <tr>
                                <td><?= ++$i ?>.</td>
                                <td><?= $item->user->nome ?></td>
                                <td><?= $item->data_criacao ?></td>
                                <td><?= Html::a('<button style="width: 6em;" type="button" class="btn btn-warning">Resolver</button>', ['encomenda/view', 'idCarrinho' => $item->idCarrinho])?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
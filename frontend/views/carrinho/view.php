<?php

use common\models\Linhacarrinho;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

//$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Produtos</th>
                        <th>Preço</th>
                        <th>Iva</th>
                        <th>Quantidade</th>
                        <th>Total</th>
                        <th>Remover</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php foreach ($model->linhaCarrinhos as $linhaCarrinho) { ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?= $linhaCarrinho->produto->nome ?></td>
                            <td class="align-middle"><?= $linhaCarrinho->produto->preco_unit . "€" ?></td>
                            <td class="align-middle"><?= $linhaCarrinho->produto->categoria->iva->iva . "%" ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?= $linhaCarrinho->total . "€" ?></td>
                            <td class="align-middle"><?= Html::a('<button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>', Url::to(['linhacarrinho/delete', 'idLinha' => $linhaCarrinho->idLinha]), [
                                                            'title' => Yii::t('app', 'delete'),
                                                            'data' => [
                                                                'confirm' => 'Are you sure you want to delete this item?',
                                                                'method' => 'post',
                                                            ],
                                                        ]); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6><?= $model->totalnoiva . "€" ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Tax</h6>
                        <h6 class="font-weight-medium"><?= $model->totaliva . "€" ?></h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5><?= $model->total . "€" ?></h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
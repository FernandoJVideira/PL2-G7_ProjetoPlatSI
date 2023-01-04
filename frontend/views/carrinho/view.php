<?php

use common\models\Linhacarrinho;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use kartik\dialog\Dialog;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

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
                    <?php foreach ($model->linhaCarrinhos as $linhaCarrinho) {
                    ?>
                        <tr>
                            <td class="align-middle"><?= $linhaCarrinho->produto->nome ?></td>
                            <td class="align-middle"><?= $linhaCarrinho->produto->preco_unit . "€" ?></td>
                            <td class="align-middle"><?= $linhaCarrinho->produto->categoria->iva->iva . "%" ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <?= Html::a('<button class="btn btn-sm btn-primary btn-minus"><i class="fa fa-minus"></i></button>', Url::to(['linhacarrinho/remove', 'idLinha' => $linhaCarrinho->idLinha])) ?>
                                    </div>
                                    <input type="text" readonly class="form-control form-control-sm bg-secondary border-0 text-center" value=<?= $linhaCarrinho->quantidade ?>>
                                    <div class="input-group-btn">
                                        <?= Html::a('<button class="btn btn-sm btn-primary btn-plus"><i class="fa fa-plus"></i></button>', Url::to(['linhacarrinho/add', 'idLinha' => $linhaCarrinho->idLinha])) ?>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?= $linhaCarrinho->total . "€" ?></td>
                            <td class="align-middle"><?= Html::a('<button class="btn-sm btn-danger"><i class="fa fa-times"></i></button>', Url::to(['linhacarrinho/delete', 'idLinha' => $linhaCarrinho->idLinha]), [
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
        <div class="col-lg-4" style="padding-top: 10px">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Carrinho</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6><?= $model->total . "€" ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Iva</h6>
                        <h6 class="font-weight-medium"><?= $model->iva . "€" ?></h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5><?= $model->total . "€" ?></h5>
                    </div>
                    <p>
                    <form method="GET" action="checkout">
                        <input type="hidden" name="idCarrinho" value="<?= $model->idCarrinho ?>" />
                        <label for="store">Lojas:</label>
                        <select id="idLoja" name="idLoja">
                            <?php foreach (\common\models\Loja::find()->where('ativo = 1')->all() as $store) { ?>
                                <option value="<?= $store->idLoja ?>" <?= $store->idLoja == ($_GET['idLoja'] ?? null) ? 'selected' : '' ?>><?= $store->descricao ?></option>
                            <?php } ?>
                        </select>
                        <br>
                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <label for="store">Morada:</label>
                            <!--- <input type="text" id="morada" name="morada" value="<?= $_GET['morada'] ?? '' ?>" required>--->
                            <select id="idMorada" name="idMorada">
                                <?php foreach (\common\models\Morada::find()->where('id_user =' . Yii::$app->user->id)->all() as $morada) { ?>
                                  <option value="<?= $morada->idMorada ?>"><?= $morada->rua ?></option>
                                <?php } ?>
                            </select>
                        <?php }?>
                        <button type="submit" id="btn-alert" class="btn btn-block btn-primary font-weight-bold my-3 py-3"/>Encomendar</button>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
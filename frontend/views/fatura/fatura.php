<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="STYLESHEET" href="invoice.css" type="text/css" />
</head>
<body>
<div id="body">
    <div id="section_header">
    </div>
    <div id="content">
        <div class="page" style="font-size: 7pt">
            <table style="width: 100%;" class="header">
                <tr>
                    <td><h1 style="text-align: left"><?= $model->nomeEmpresa ?> - Fatura</h1></td>
                    <td><h1 style="text-align: right">#<?= $model->idFatura ?></h1></td>
                </tr>
            </table>
            <table style="width: 100%; font-size: 8pt;">
                <tr>
                    <td><h4><?= $model->loja->descricao ?></h4></td>
                    <td><h4><?= $model->nomeUtilizador ?></h4></td>
                </tr>
                <tr>
                    <td><?= $model->loja->morada->rua ?></td>
                    <td><?= $model->carrinho->morada->rua ?></td>
                </tr>
                <tr>
                    <td><?= $model->loja->morada->cod_postal ?>, <?= $model->loja->morada->cidade ?></td>
                    <td><?= $model->carrinho->morada->cod_postal ?>, <?= $model->carrinho->morada->cidade ?></strong></td>
                </tr>
                <tr>
                    <td><?= $model->loja->morada->pais ?></td>
                    <td><?= $model->carrinho->morada->pais ?></td>
                </tr>
            </table>
            <table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 8pt;">
                <tr>
                    <td><strong><?= $model->loja->telefone ?></strong> <strong><?= $model->loja->email ?></strong></td>
                    <td><strong><?= $model->utilizador->user->email ?></strong></td>
                </tr>
            </table>
            <table class="change_order_items" style="width: 100%; border-bottom: 1px solid black">
                <tbody>
                <tr>
                    <th>Item</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Iva</th>
                    <th colspan="2">Preço unitario</th>
                    <th>Total</th>
                </tr>
                <?php $i = 0; foreach ($model->linhafaturas as $item){ ?>
                    <tr class="even_row">
                        <td style="text-align: center"><?= ++$i; ?></td>
                        <td style="text-align: center"><?= $item->produto->nome ?></td>
                        <td style="text-align: center"><?= $item->quantidade ?></td>
                        <td style="text-align: center"><?= $item->iva ?>%</td>
                        <td style="text-align: right; border-right-style: none;"><?= $item->preco_unit ?></td>
                        <td class="change_order_unit_col" style="border-left-style: none;">€</td>
                        <td style="text-align: center" ><?= $item->preco_unit * $item->quantidade . " €"?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <br>
                <tr>
                    <td colspan="3" style="text-align: right;"></td>
                    <td colspan="2" style="text-align: right;"><strong>SUB-TOTAL:</strong></td>
                    <td class="change_order_total_col"><strong><?= $model->carrinho->total ?> €</strong></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right;"></td>
                    <td colspan="2" style="text-align: right;"><strong>IVA:</strong></td>
                    <td class="change_order_total_col"><strong><?= $model->carrinho->iva?> €</strong></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right;"></td>
                    <td colspan="2" style="text-align: right;"><strong>Desconto:</strong></td>
                    <td class="change_order_total_col"><strong><?= $model->carrinho->desconto?> €</strong></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right;"></td>
                    <td colspan="2" style="text-align: right;"><strong>TOTAL:</strong></td>
                    <td class="change_order_total_col"><strong><?= $model->carrinho->totalcomdesconto ?> €</strong></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
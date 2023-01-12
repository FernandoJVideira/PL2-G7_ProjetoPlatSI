<?php

namespace backend\models;

use common\models\Linhacarrinho;
use common\models\Stock;
use yii\db\ActiveRecord;

class Encomenda extends ActiveRecord
{
    public static function getLinhaCarrinho($id_produto, $id_loja)
    {
        $linhaCarrinho = Linhacarrinho::find()
            ->joinWith('carrinho')
            ->where(['id_produto' => $id_produto])
            ->andWhere(['id_loja' => $id_loja])
            ->all();

        $stock = Stock::find()->where(['id_produto' => $id_produto, 'id_loja' => $id_loja])->one();

        if($stock == null){
            return 0;
        }
        $total_encomenda = 0;
        foreach ($linhaCarrinho as $linha) {
            $total_encomenda += $linha->quantidade;
        }

        if($total_encomenda <= $stock->quant_stock)
            return 1;
        else if($total_encomenda <= $stock->quant_req)
            return 2;
        else
            return 0;
    }

}
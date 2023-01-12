<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $idStock
 * @property int $quant_stock
 * @property int|null $quant_req
 * @property int|null $id_produto
 * @property int|null $id_loja
 *
 * @property Loja $loja
 * @property Produto $produto
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto'], 'required', 'message' => 'Este campo é obrigatório'],
            [['quant_stock', 'quant_req', 'id_produto', 'id_loja'], 'integer', 'message' => 'Este campo deve ser um número'],
            [['quant_stock', 'quant_req'], 'integer', 'min' => 0, 'tooSmall' => 'Insira um valor superior a 0'],
            ['quant_stock', 'validateTest'],
            [['id_loja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['id_loja' => 'idLoja']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_produto' => 'idProduto']],
        ];
    }

    public function validateTest() {
        if($this->quant_stock - $this->getOldAttribute('quant_stock') > $this->getOldAttribute('quant_req')) {
            $this->addError('quant_stock','O valor requisitado foi ' . $this->getOldAttribute('quant_req'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idStock' => 'Id Stock',
            'quant_stock' => 'Quantidade em stock',
            'quant_req' => 'Quantidade Requisitada',
            'id_produto' => 'Produto',
            'id_loja' => 'Loja',
        ];
    }

    /**
     * Gets query for [[Loja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoja()
    {
        return $this->hasOne(Loja::class, ['idLoja' => 'id_loja']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::class, ['idProduto' => 'id_produto']);
    }

}

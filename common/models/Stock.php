<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $idStock
 * @property int|null $id_produto
 * @property int|null $id_loja
 * @property int|null $quant_stock
 * @property int|null $quant_req
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
            [['idStock'], 'required'],
            [['idStock', 'id_produto', 'id_loja', 'quant_stock', 'quant_req'], 'integer'],
            [['idStock'], 'unique'],
            [['id_loja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['id_loja' => 'idLoja']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_produto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idStock' => 'Id Stock',
            'id_produto' => 'Id Produto',
            'id_loja' => 'Id Loja',
            'quant_stock' => 'Quant Stock',
            'quant_req' => 'Quant Req',
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

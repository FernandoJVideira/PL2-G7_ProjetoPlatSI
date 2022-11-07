<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhacarrinho".
 *
 * @property int $idLinha
 * @property int|null $estado
 * @property int|null $id_carrinho
 * @property int|null $id_produto
 * @property int|null $quantidade
 *
 * @property Carrinho $carrinho
 * @property Produto $produto
 */
class Linhacarrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhacarrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLinha'], 'required'],
            [['idLinha', 'estado', 'id_carrinho', 'id_produto', 'quantidade'], 'integer'],
            [['idLinha'], 'unique'],
            [['id_carrinho'], 'exist', 'skipOnError' => true, 'targetClass' => Carrinho::class, 'targetAttribute' => ['id_carrinho' => 'idCarrinho']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_produto' => 'idProduto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLinha' => 'Id Linha',
            'estado' => 'Estado',
            'id_carrinho' => 'Id Carrinho',
            'id_produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Carrinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinho()
    {
        return $this->hasOne(Carrinho::class, ['idCarrinho' => 'id_carrinho']);
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

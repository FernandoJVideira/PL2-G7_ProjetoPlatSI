<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhacarrinho".
 *
 * @property int $idLinha
 * @property int|null $estado
 * @property int $quantidade
 * @property int|null $id_carrinho
 * @property int|null $id_produto
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
        return 'linhaCarrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado', 'quantidade', 'id_carrinho', 'id_produto'], 'integer'],
            [['quantidade'], 'required'],
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
            'quantidade' => 'Quantidade',
            'id_carrinho' => 'Id Carrinho',
            'id_produto' => 'Id Produto',
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

    public function getTotalNoIva()
    {
        return $this->produto->preco_unit * $this->quantidade;
    }

    public function getTotal()
    {
        return ($this->produto->preco_unit + ($this->produto->preco_unit * ($this->produto->categoria->iva->iva / 100))) * $this->quantidade;
    }

    public function getEstado(){
        return $this->estado ? 'Concluído' : 'Pendente';
    }
}

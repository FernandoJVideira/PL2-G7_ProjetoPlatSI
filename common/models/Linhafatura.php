<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhafatura".
 *
 * @property int $idLinha
 * @property int|null $quantidade
 * @property float|null $preco_unit
 * @property int|null $id_categoria
 * @property float|null $iva
 * @property int|null $id_fatura
 * @property int|null $id_produto
 *
 * @property Categoria $categoria
 * @property Fatura $fatura
 * @property Produto $produto
 */
class Linhafatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linhafatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLinha'], 'required'],
            [['idLinha', 'quantidade', 'id_categoria', 'id_fatura', 'id_produto'], 'integer'],
            [['preco_unit', 'iva'], 'number'],
            [['idLinha'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['id_categoria' => 'idCategoria']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::class, 'targetAttribute' => ['id_produto' => 'idProduto']],
            [['id_fatura'], 'exist', 'skipOnError' => true, 'targetClass' => Fatura::class, 'targetAttribute' => ['id_fatura' => 'idFatura']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLinha' => 'Id Linha',
            'quantidade' => 'Quantidade',
            'preco_unit' => 'Preco Unit',
            'id_categoria' => 'Id Categoria',
            'iva' => 'Iva',
            'id_fatura' => 'Id Fatura',
            'id_produto' => 'Id Produto',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['idCategoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[Fatura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFatura()
    {
        return $this->hasOne(Fatura::class, ['idFatura' => 'id_fatura']);
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

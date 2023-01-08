<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocao".
 *
 * @property int $idPromocao
 * @property float $percentagem
 * @property string $data_limite
 * @property string $codigo
 * @property string $nome_promo
 *
 * @property Carrinho[] $carrinhos
 */
class Promocao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percentagem', 'data_limite', 'codigo', 'nome_promo'], 'required'],
            ['percentagem', 'in', 'range' => range(1,100)],
            [['data_limite'], 'date', 'format' => 'yyyy-MM-dd'],
            [['codigo'], 'string','min' => 5, 'max' => 5 , 'tooShort' => 'O código tem de ter 5 caracteres', 'tooLong' => 'O código tem de ter 5 caracteres'],
            [['codigo'], 'unique'],
            [['nome_promo'], 'string','min' => 3, 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPromocao' => 'Id Promoção',
            'percentagem' => 'Percentagem',
            'data_limite' => 'Data Limite',
            'codigo' => 'Codigo',
            'nome_promo' => 'Nome',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['id_promocao' => 'idPromocao']);
    }
}

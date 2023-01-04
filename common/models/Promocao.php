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
            [['percentagem'], 'number'],
            [['data_limite'], 'safe'],
            [['codigo'], 'string', 'max' => 5],
            [['nome_promo'], 'string', 'max' => 50],
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

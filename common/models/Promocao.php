<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocao".
 *
 * @property int $idPromocao
 * @property float $percentagem
 * @property string $data_limite
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
            [['percentagem', 'data_limite'], 'required'],
            [['percentagem'], 'number'],
            [['data_limite'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPromocao' => 'Id Promocao',
            'percentagem' => 'Percentagem',
            'data_limite' => 'Data Limite',
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

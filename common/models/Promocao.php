<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocao".
 *
 * @property int $idPromocao
 * @property float|null $percentagem
 * @property string|null $data_limite
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
            [['idPromocao'], 'required'],
            [['idPromocao'], 'integer'],
            [['percentagem'], 'number'],
            [['data_limite'], 'safe'],
            [['idPromocao'], 'unique'],
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

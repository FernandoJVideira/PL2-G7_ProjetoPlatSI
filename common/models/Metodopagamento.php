<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "metodopagamento".
 *
 * @property int $idMetodo
 * @property string|null $metodoPagamento
 * @property int|null $ativo
 *
 * @property Fatura[] $faturas
 * @property Loja[] $lojaIdLojas
 * @property LojaMetodopagamento[] $lojaMetodopagamentos
 */
class Metodopagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metodopagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMetodo'], 'required'],
            [['idMetodo', 'ativo'], 'integer'],
            [['metodoPagamento'], 'string', 'max' => 255],
            [['idMetodo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMetodo' => 'Id Metodo',
            'metodoPagamento' => 'Metodo Pagamento',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['id_metodo' => 'idMetodo']);
    }

    /**
     * Gets query for [[LojaIdLojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaIdLojas()
    {
        return $this->hasMany(Loja::class, ['idLoja' => 'loja_idLoja'])->viaTable('loja_metodopagamento', ['metodoPagamento_idMetodo' => 'idMetodo']);
    }

    /**
     * Gets query for [[LojaMetodopagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaMetodopagamentos()
    {
        return $this->hasMany(LojaMetodopagamento::class, ['metodoPagamento_idMetodo' => 'idMetodo']);
    }
}

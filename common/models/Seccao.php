<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seccao".
 *
 * @property int $idSeccao
 * @property string $nome
 *
 * @property Loja[] $lojaIdLojas
 * @property LojaSeccao[] $lojaSeccaos
 * @property Senhadigital[] $senhadigitals
 */
class Seccao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seccao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSeccao' => 'Id Seccao',
            'nome' => 'Nome',
        ];
    }

    /**
     * Gets query for [[LojaIdLojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaIdLojas()
    {
        return $this->hasMany(Loja::class, ['idLoja' => 'loja_idLoja'])->viaTable('loja_seccao', ['seccao_idSeccao' => 'idSeccao']);
    }

    /**
     * Gets query for [[LojaSeccaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaSeccaos()
    {
        return $this->hasMany(LojaSeccao::class, ['seccao_idSeccao' => 'idSeccao']);
    }

    /**
     * Gets query for [[Senhadigitals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSenhadigitals()
    {
        return $this->hasMany(Senhadigital::class, ['id_seccao' => 'idSeccao']);
    }
}

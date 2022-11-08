<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "senhadigital".
 *
 * @property int $idSenha
 * @property int|null $id_seccao
 * @property int|null $numeroAtual
 * @property int|null $ultimoNumero
 *
 * @property Seccao $seccao
 */
class Senhadigital extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'senhadigital';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_seccao', 'numeroAtual', 'ultimoNumero'], 'integer'],
            [['id_seccao'], 'exist', 'skipOnError' => true, 'targetClass' => Seccao::class, 'targetAttribute' => ['id_seccao' => 'idSeccao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSenha' => 'Id Senha',
            'id_seccao' => 'Id Seccao',
            'numeroAtual' => 'Numero Atual',
            'ultimoNumero' => 'Ultimo Numero',
        ];
    }

    /**
     * Gets query for [[Seccao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccao()
    {
        return $this->hasOne(Seccao::class, ['idSeccao' => 'id_seccao']);
    }
}

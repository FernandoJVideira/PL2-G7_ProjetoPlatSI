<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loja_seccao".
 *
 * @property int $idLojaSeccao
 * @property int $loja_idLoja
 * @property int $seccao_idSeccao
 * @property int|null $numeroAtual
 * @property int|null $ultimoNumero
 *
 * @property Loja $lojaIdLoja
 * @property Seccao $seccaoIdSeccao
 */
class LojaSeccao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loja_seccao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loja_idLoja', 'seccao_idSeccao'], 'required'],
            [['loja_idLoja', 'seccao_idSeccao', 'numeroAtual', 'ultimoNumero'], 'integer'],
            [['loja_idLoja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['loja_idLoja' => 'idLoja']],
            [['seccao_idSeccao'], 'exist', 'skipOnError' => true, 'targetClass' => Seccao::class, 'targetAttribute' => ['seccao_idSeccao' => 'idSeccao']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLojaSeccao' => 'Id Loja Seccao',
            'loja_idLoja' => 'Loja Id Loja',
            'seccao_idSeccao' => 'Seccao Id Seccao',
            'numeroAtual' => 'Numero Atual',
            'ultimoNumero' => 'Ultimo Numero',
        ];
    }

    /**
     * Gets query for [[LojaIdLoja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaIdLoja()
    {
        return $this->hasOne(Loja::class, ['idLoja' => 'loja_idLoja']);
    }

    /**
     * Gets query for [[SeccaoIdSeccao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccaoIdSeccao()
    {
        return $this->hasOne(Seccao::class, ['idSeccao' => 'seccao_idSeccao']);
    }
}

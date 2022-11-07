<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $idEmpresa
 * @property string|null $descricao_social
 * @property string|null $email
 * @property string|null $telefone
 * @property string|null $nif
 * @property int|null $id_morada
 *
 * @property Loja[] $lojas
 * @property Morada $morada
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEmpresa'], 'required'],
            [['idEmpresa', 'id_morada'], 'integer'],
            [['descricao_social', 'email', 'telefone', 'nif'], 'string', 'max' => 255],
            [['idEmpresa'], 'unique'],
            [['id_morada'], 'exist', 'skipOnError' => true, 'targetClass' => Morada::class, 'targetAttribute' => ['id_morada' => 'idMorada']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEmpresa' => 'Id Empresa',
            'descricao_social' => 'Descricao Social',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'nif' => 'Nif',
            'id_morada' => 'Id Morada',
        ];
    }

    /**
     * Gets query for [[Lojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojas()
    {
        return $this->hasMany(Loja::class, ['id_empresa' => 'idEmpresa']);
    }

    /**
     * Gets query for [[Morada]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMorada()
    {
        return $this->hasOne(Morada::class, ['idMorada' => 'id_morada']);
    }
}

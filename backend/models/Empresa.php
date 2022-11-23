<?php

namespace backend\models;

use common\models\Loja;
use common\models\Morada;
use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $idEmpresa
 * @property string $descricao_social
 * @property string $email
 * @property string $telefone
 * @property string $nif
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
            [['descricao_social', 'email', 'telefone', 'nif'], 'required', 'message' => 'Este campo é obrigatório'],
            [['id_morada'], 'integer'],
            [['descricao_social'], 'string', 'max' => 255],
            [['email', 'telefone'], 'string', 'max' => 50],
            [['nif'], 'string', 'max' => 9],
            [['email'], 'unique'],
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

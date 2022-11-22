<?php

namespace common\models;

use backend\models\Empresa;
use Yii;

/**
 * This is the model class for table "morada".
 *
 * @property int $idMorada
 * @property string $rua
 * @property string $cidade
 * @property string $cod_postal
 * @property string $pais
 * @property int|null $id_user
 *
 * @property Empresa[] $empresas
 * @property Loja[] $lojas
 * @property Utilizador $user
 */
class Morada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'morada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rua', 'cidade', 'cod_postal', 'pais'], 'required'],
            [['id_user'], 'integer'],
            [['rua'], 'string', 'max' => 255],
            [['cidade', 'pais'], 'string', 'max' => 20],
            [['cod_postal'], 'string', 'max' => 12],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['id_user' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMorada' => 'Id Morada',
            'rua' => 'Rua',
            'cidade' => 'Cidade',
            'cod_postal' => 'Cod Postal',
            'pais' => 'Pais',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::class, ['id_morada' => 'idMorada']);
    }

    /**
     * Gets query for [[Lojas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojas()
    {
        return $this->hasMany(Loja::class, ['id_morada' => 'idMorada']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Utilizador::class, ['idUser' => 'id_user']);
    }

    public function countMoradasUser($idUser){
        return Morada::find()->where(['id_user' => $idUser])->count();
    }
}

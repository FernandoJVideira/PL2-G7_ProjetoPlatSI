<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "utilizador".
 *
 * @property int $idUser
 * @property string|null $nome
 * @property string|null $telemovel
 * @property int|null $id_loja
 * @property int|null $id_user
 *
 * @property Carrinho[] $carrinhos
 * @property Favorito[] $favoritos
 * @property Loja $loja
 * @property Morada[] $moradas
 * @property User $user
 */
class Utilizador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilizador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUser'], 'required'],
            [['idUser', 'id_loja', 'id_user'], 'integer'],
            [['nome', 'telemovel'], 'string', 'max' => 255],
            [['idUser'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_loja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['id_loja' => 'idLoja']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'nome' => 'Nome',
            'telemovel' => 'Telemovel',
            'id_loja' => 'Id Loja',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['id_user' => 'idUser']);
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos()
    {
        return $this->hasMany(Favorito::class, ['id_user' => 'idUser']);
    }

    /**
     * Gets query for [[Loja]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoja()
    {
        return $this->hasOne(Loja::class, ['idLoja' => 'id_loja']);
    }

    /**
     * Gets query for [[Moradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMoradas()
    {
        return $this->hasMany(Morada::class, ['id_user' => 'idUser']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}

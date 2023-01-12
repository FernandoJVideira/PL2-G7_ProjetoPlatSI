<?php

namespace common\models;

use Yii;
use backend\models\AuthAssignment;


/**
 * This is the model class for table "utilizador".
 *
 * @property int $idUser
 * @property string $nome
 * @property string $nif
 * @property string $telemovel
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
            [['nome', 'nif', 'telemovel'], 'required', 'message' => 'Este campo é obrigatório'],
            [['id_loja', 'id_user'], 'integer'],
            [['nome'], 'string','min' => 2, 'max' => 255],
            [['nif'], 'string','min'=> 9, 'max' => 9],
            [['nif'], 'integer', 'message' => 'O nif deve ser um número!'],
            [['telemovel'], 'string', 'min' => 9, 'max' => 13],
            [['telemovel'], 'integer', 'message' => 'O telemóvel deve ser um número!'],
            [['nif'], 'unique'],
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
            'nif' => 'Nif',
            'telemovel' => 'Telemovel',
            'id_loja' => 'Loja',
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

    public function getCarrinhoAtivo()
    {
        return $this->hasOne(Carrinho::class, ['id_user' => 'idUser'])->andOnCondition(['estado' => 'aberto']);
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

    public static function getPerfil($id)
    {
        $model = AuthAssignment::find()->where(['user_id' => $id])->one();
        if(!empty($model)){
            return $model->item_name;
        }
        return null;
    }

    public static function getCount(){
        return AuthAssignment::find()->where(['item_name' => 'Cliente'])->innerJoin('user', 'auth_assignment.user_id = user.id')->andWhere('status ='. \common\models\User::STATUS_ACTIVE)->count();
    }

}

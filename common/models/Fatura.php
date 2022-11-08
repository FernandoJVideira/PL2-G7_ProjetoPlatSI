<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fatura".
 *
 * @property int $idFatura
 * @property string $nomeUtilizador
 * @property string $nifUtilizador
 * @property string $nomeEmpresa
 * @property string $nifEmpresa
 * @property string $descricaoLoja
 * @property string|null $dataCriacao
 * @property int|null $id_metodo
 * @property int|null $id_utilizador
 * @property int|null $id_loja
 * @property int|null $id_carrinho
 *
 * @property Carrinho $carrinho
 * @property Linhafatura[] $linhafaturas
 * @property Metodopagamento $metodo
 */
class Fatura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFatura', 'nomeUtilizador', 'nifUtilizador', 'nomeEmpresa', 'nifEmpresa', 'descricaoLoja'], 'required'],
            [['idFatura', 'id_metodo', 'id_utilizador', 'id_loja', 'id_carrinho'], 'integer'],
            [['dataCriacao'], 'safe'],
            [['nomeUtilizador'], 'string', 'max' => 255],
            [['nifUtilizador', 'nifEmpresa'], 'string', 'max' => 9],
            [['nomeEmpresa', 'descricaoLoja'], 'string', 'max' => 50],
            [['idFatura'], 'unique'],
            [['id_carrinho'], 'exist', 'skipOnError' => true, 'targetClass' => Carrinho::class, 'targetAttribute' => ['id_carrinho' => 'idCarrinho']],
            [['id_metodo'], 'exist', 'skipOnError' => true, 'targetClass' => Metodopagamento::class, 'targetAttribute' => ['id_metodo' => 'idMetodo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFatura' => 'Id Fatura',
            'nomeUtilizador' => 'Nome Utilizador',
            'nifUtilizador' => 'Nif Utilizador',
            'nomeEmpresa' => 'Nome Empresa',
            'nifEmpresa' => 'Nif Empresa',
            'descricaoLoja' => 'Descricao Loja',
            'dataCriacao' => 'Data Criacao',
            'id_metodo' => 'Id Metodo',
            'id_utilizador' => 'Id Utilizador',
            'id_loja' => 'Id Loja',
            'id_carrinho' => 'Id Carrinho',
        ];
    }

    /**
     * Gets query for [[Carrinho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinho()
    {
        return $this->hasOne(Carrinho::class, ['idCarrinho' => 'id_carrinho']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['id_fatura' => 'idFatura']);
    }

    /**
     * Gets query for [[Metodo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetodo()
    {
        return $this->hasOne(Metodopagamento::class, ['idMetodo' => 'id_metodo']);
    }
}

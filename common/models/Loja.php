<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loja".
 *
 * @property int $idLoja
 * @property int|null $id_empresa
 * @property string $descricao
 * @property string $email
 * @property string $telefone
 * @property int|null $ativo
 * @property int|null $id_morada
 *
 * @property Carrinho[] $carrinhos
 * @property Empresa $empresa
 * @property LojaMetodopagamento[] $lojaMetodopagamentos
 * @property LojaSeccao[] $lojaSeccaos
 * @property Metodopagamento[] $metodoPagamentoIdMetodos
 * @property Morada $morada
 * @property Seccao[] $seccaoIdSeccaos
 * @property Stock[] $stocks
 * @property Utilizador[] $utilizadors
 */
class Loja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'ativo', 'id_morada'], 'integer'],
            [['descricao', 'email', 'telefone'], 'required'],
            [['descricao'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['telefone'], 'string', 'max' => 12],
            [['email'], 'unique'],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::class, 'targetAttribute' => ['id_empresa' => 'idEmpresa']],
            [['id_morada'], 'exist', 'skipOnError' => true, 'targetClass' => Morada::class, 'targetAttribute' => ['id_morada' => 'idMorada']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLoja' => 'Id Loja',
            'id_empresa' => 'Id Empresa',
            'descricao' => 'Descricao',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'ativo' => 'Ativo',
            'id_morada' => 'Id Morada',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['id_loja' => 'idLoja']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::class, ['idEmpresa' => 'id_empresa']);
    }

    /**
     * Gets query for [[LojaMetodopagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaMetodopagamentos()
    {
        return $this->hasMany(LojaMetodopagamento::class, ['loja_idLoja' => 'idLoja']);
    }

    /**
     * Gets query for [[LojaSeccaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLojaSeccaos()
    {
        return $this->hasMany(LojaSeccao::class, ['loja_idLoja' => 'idLoja']);
    }

    /**
     * Gets query for [[MetodoPagamentoIdMetodos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetodoPagamentoIdMetodos()
    {
        return $this->hasMany(Metodopagamento::class, ['idMetodo' => 'metodoPagamento_idMetodo'])->viaTable('loja_metodopagamento', ['loja_idLoja' => 'idLoja']);
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

    /**
     * Gets query for [[SeccaoIdSeccaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeccaoIdSeccaos()
    {
        return $this->hasMany(Seccao::class, ['idSeccao' => 'seccao_idSeccao'])->viaTable('loja_seccao', ['loja_idLoja' => 'idLoja']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['id_loja' => 'idLoja']);
    }

    /**
     * Gets query for [[Utilizadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadors()
    {
        return $this->hasMany(Utilizador::class, ['id_loja' => 'idLoja']);
    }
}

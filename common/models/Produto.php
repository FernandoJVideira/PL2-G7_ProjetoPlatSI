<?php

namespace common\models;

use Yii;
use common\models\Categoria;

/**
 * This is the model class for table "produto".
 *
 * @property int $idProduto
 * @property string $nome
 * @property string $descricao
 * @property float $preco_unit
 * @property string|null $dataCriacao
 * @property string $imagem
 * @property int|null $ativo
 * @property int|null $id_categoria
 *
 * @property Categoria $categoria
 * @property Favorito[] $favoritos
 * @property Linhacarrinho[] $linhacarrinhos
 * @property Linhafatura[] $linhafaturas
 * @property Stock[] $stocks
 */
class Produto extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {   
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'preco_unit', 'imagem','id_categoria'], 'required'],
            [['descricao'], 'string'],
            [['preco_unit'], 'number'],
            [['dataCriacao'], 'safe'],
            [['ativo', 'id_categoria'], 'integer'],  
            [['nome'], 'string', 'max' => 255],
            //[['imagem'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],//TODO: validar extenção
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['id_categoria' => 'idCategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProduto' => 'Id Produto',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'preco_unit' => 'Preço',
            'dataCriacao' => 'Data Criacao',
            'imagem' => 'Imagem',
            'ativo' => 'Ativo',
            'id_categoria' => 'Categoria',
        ];
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::class, ['idCategoria' => 'id_categoria']);
    }

    /**
     * Gets query for [[Favoritos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavoritos($id_user)
    {
        return $this->hasMany(Favorito::class, ['id_produto' => 'idProduto'])->where(['id_user' => $id_user]);
    }

    /**
     * Gets query for [[Linhacarrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhacarrinhos()
    {
        return $this->hasMany(Linhacarrinho::class, ['id_produto' => 'idProduto']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['id_produto' => 'idProduto']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['id_produto' => 'idProduto']);
    }

    public function getAtivo()
    {
        return $this->ativo ? 'Ativo' : 'Inativo';
    }

    public function getPreco(){
        return $this->preco_unit;
    }

    public function getIdCategoria(){
        $Categoria = Categoria::findOne($this->id_categoria);
        return $Categoria->nome;
    }

    public function getStockLoja($idLoja)
    {
        return $this->hasMany(Stock::class, ['id_produto' => 'idProduto'])->where(['id_loja' => $idLoja])->one();
    }
}

<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "categoria".
 *
 * @property int $idCategoria
 * @property string $nome
 * @property int|null $ativo
 * @property int|null $id_iva
 * @property int|null $id_categoria
 *
 * @property Categoria $categoria
 * @property Categoria[] $categorias
 * @property Iva $iva
 * @property Linhafatura[] $linhafaturas
 * @property Produto[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['ativo', 'id_iva', 'id_categoria'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::class, 'targetAttribute' => ['id_categoria' => 'idCategoria']],
            [['id_iva'], 'exist', 'skipOnError' => true, 'targetClass' => Iva::class, 'targetAttribute' => ['id_iva' => 'idIva']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => 'Id Categoria',
            'nome' => 'Nome',
            'ativo' => 'Estado',
            'id_iva' => 'Iva',
            'id_categoria' => 'Categoria Originária',
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
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::class, ['id_categoria' => 'idCategoria']);
    }

    /**
     * Gets query for [[Iva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIva()
    {
        return $this->hasOne(Iva::class, ['idIva' => 'id_iva']);
    }

    /**
     * Gets query for [[Linhafaturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhafaturas()
    {
        return $this->hasMany(Linhafatura::class, ['id_categoria' => 'idCategoria']);
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::class, ['id_categoria' => 'idCategoria']);
    }

    public static function get_Nome_Id_Categoria($id_categoria){
        if($id_categoria){
            $sub_categoria = Categoria::findOne($id_categoria);
            $nome = $sub_categoria->nome;
            return $nome;
        }

        $nome = "N/A";
        return $nome;
    }

    public static function get_Nome_Id_Iva($id_iva){
        if($id_iva){
            $Iva = Iva::findOne($id_iva);
            $nome = $Iva->descricao;
            return $nome;
        }

        $nome = "N/A";
        return $nome;
    }

    public function getAtivo()
    {
        return $this->ativo ? 'Ativo' : 'Inativo';
    }

    public function getIdCategoria(){
        $Categoria = Categoria::findOne($this->id_categoria);
        return $Categoria->nome;
    }

    public function getIdIva(){
        $Iva = Iva::findOne($this->id_iva);
        return $Iva->descricao;
    }
}

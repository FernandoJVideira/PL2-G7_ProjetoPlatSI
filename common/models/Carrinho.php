<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $idCarrinho
 * @property string|null $estado
 * @property string|null $data_criacao
 * @property int|null $id_morada
 * @property int|null $id_loja
 * @property int|null $id_user
 * @property int|null $id_promocao
 *
 * @property Fatura[] $faturas
 * @property LinhaCarrinho[] $linhaCarrinhos
 * @property Loja $loja
 * @property Promocao $promocao
 * @property Utilizador $user
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado'], 'required'],
            [['estado'], 'in', 'range'=> ['aberto', 'emProcessamento', 'fechado']],
            [['data_criacao'], 'datetime', 'format' => 'yyyy-MM-dd HH:mm:ss'],
            [['id_morada', 'id_loja', 'id_user', 'id_promocao'], 'integer'],
            [['id_morada'], 'exist', 'targetClass' => Morada::class, 'targetAttribute' => ['id_morada' => 'idMorada']],
            [['id_promocao'], 'exist', 'skipOnError' => true, 'targetClass' => Promocao::class, 'targetAttribute' => ['id_promocao' => 'idPromocao']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizador::class, 'targetAttribute' => ['id_user' => 'idUser']],
            [['id_loja'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::class, 'targetAttribute' => ['id_loja' => 'idLoja']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCarrinho' => 'Id Carrinho',
            'estado' => 'Estado',
            'data_criacao' => 'Data de Criação',
            'id_morada' => 'Id Morada',
            'id_loja' => 'Id Loja',
            'id_user' => 'Id User',
            'id_promocao' => 'Id Promocao',
        ];
    }

    /**
     * Gets query for [[Faturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturas()
    {
        return $this->hasMany(Fatura::class, ['id_carrinho' => 'idCarrinho']);
    }

    public function getMorada()
    {
        return $this->hasOne(Morada::class, ['idMorada' => 'id_morada']);
    }

    /**
     * Gets query for [[LinhaCarrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLinhaCarrinhos()
    {
        return $this->hasMany(Linhacarrinho::class, ['id_carrinho' => 'idCarrinho']);
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
     * Gets query for [[Promocao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromocao()
    {
        return $this->hasOne(Promocao::class, ['idPromocao' => 'id_promocao']);
    }

    public function getEstadoLinhas(){
        $estado = true;
        foreach ($this->linhaCarrinhos as $linhaCarrinho) {
            if($linhaCarrinho->estado == 0){
               $estado = false;
            }
        }
        return $estado;
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

    public function getTotal()
    {
        $total = 0;

        foreach ($this->linhaCarrinhos as $linha) {
            $total += $linha->total;
        }

        return round($total ,2);
    }

    public function getIva()
    {

        $valorIva = 0;

        foreach ($this->linhaCarrinhos as $linha) {
            $valorIva += $linha->total - ($linha->total - ($linha->total / (1 + (100 / $linha->produto->categoria->iva->iva))));
        }

        return round($valorIva, 2);
    }

    public function getTotalComDesconto()
    {
        $total = $this->getTotal();
        return round($total - ($total * (($this->promocao->percentagem ?? 0)/ 100)), 2);
    }

    public function getDesconto(){
        $total = $this->getTotal();
        return round($total * (($this->promocao->percentagem ?? 0) / 100),2);
    }

    public function getNumLinhas()
    {
        return count($this->linhaCarrinhos);
    }

    public static function getCount(){
        return Carrinho::find()->where(['estado' => 'fechado'])->count();
    }

    public function verificarStock()
    {
        foreach ($this->linhaCarrinhos as $linhaCarrinho) {
            $stocks = $linhaCarrinho->produto->getStockLoja($this->id_loja);
            if($stocks != null && $stocks->quant_stock >= $linhaCarrinho->quantidade){
                $linhaCarrinho->estado = 1;
                $stocks->quant_stock -= $linhaCarrinho->quantidade;
                $stocks->save();
            }
            else{
                $linhaCarrinho->estado = 0;
            }
            $linhaCarrinho->save();
        }
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "iva".
 *
 * @property int $idIva
 * @property float $iva
 * @property string $descricao
 * @property int|null $ativo
 *
 * @property Categoria[] $categorias
 */
class Iva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'iva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iva', 'descricao', 'ativo'], 'required', 'message' => 'Este campo é obrigatório'],
            [['iva'], 'unique', 'message' => 'Este valor já existe'],
            [['iva'], 'in', 'range' => range(1, 100), 'message' => 'Este campo deve ser um número'],
            [['ativo'], 'in', 'range' => [0, 1]],
            [['descricao'], 'string', 'min' => 3, 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idIva' => 'Id Iva',
            'iva' => 'Iva [1-100%]',
            'descricao' => 'Descrição',
            'ativo' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasMany(Categoria::class, ['id_iva' => 'idIva']);
    }

    public function getAtivo()
    {
        return $this->ativo ? 'Ativo' : 'Inativo';
    }
}

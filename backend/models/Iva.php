<?php

namespace backend\models;

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
            [['iva', 'descricao'], 'required'],
            [['iva'], 'number'],
            [['ativo'], 'integer'],
            [['descricao'], 'string', 'max' => 255],
            [['iva'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idIva' => 'Id Iva',
            'iva' => 'Iva',
            'descricao' => 'Descricao',
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

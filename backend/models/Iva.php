<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "iva".
 *
 * @property int $idIva
 * @property float|null $iva
 * @property string|null $descricao
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
            [['idIva'], 'required'],
            [['idIva', 'ativo'], 'integer'],
            [['iva'], 'number'],
            [['descricao'], 'string', 'max' => 255],
            [['idIva'], 'unique'],
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
            'ativo' => 'Ativo',
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
}

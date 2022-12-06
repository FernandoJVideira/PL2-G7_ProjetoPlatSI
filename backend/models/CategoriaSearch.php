<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;



/**
 * CategoriaSearch represents the model behind the search form of `backend\models\Categoria`.
 */
class CategoriaSearch extends Categoria
{
    /**
     * {@inheritdoc}
     */

    public $descricao;

    public function rules()
    {
        return [
            [['idCategoria', 'ativo', 'id_iva', 'id_categoria'], 'integer'],
            [['nome', 'descricao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Categoria::find()->innerJoinWith('iva');
        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['nome', 'ativo', 'descricao', 'id_categoria']],
        ]);

        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idCategoria' => $this->idCategoria,
            'categoria.ativo' => $this->ativo,
            'id_iva' => $this->id_iva,
            'id_categoria' => $this->id_categoria,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}

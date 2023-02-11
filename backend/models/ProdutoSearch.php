<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form of `common\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['idProduto', 'ativo', 'id_categoria'], 'integer'],
            [['nome', 'descricao', 'dataCriacao', 'imagem'], 'safe'],
            [['preco_unit'], 'number'],
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
        $query = Produto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['nome', 'descricao', 'referencia','preco_unit', 'dataCriacao', 'ativo', 'id_categoria']],
        ]);

        $this->load($params);
        //dd($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idProduto' => $this->idProduto,
            'preco_unit' => $this->preco_unit,
            'produto.ativo' => $this->ativo,
            'id_categoria' => $this->id_categoria,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'imagem', $this->imagem])
            ->andFilterWhere(['like', 'dataCriacao', $this->dataCriacao]);

        return $dataProvider;
    }
}

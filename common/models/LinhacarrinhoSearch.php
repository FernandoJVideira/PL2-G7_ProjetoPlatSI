<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Linhacarrinho;

/**
 * LinhacarrinhoSearch represents the model behind the search form of `common\models\Linhacarrinho`.
 */
class LinhacarrinhoSearch extends Linhacarrinho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLinha', 'estado', 'quantidade', 'id_carrinho', 'id_produto'], 'integer'],
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
        $query = Linhacarrinho::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idLinha' => $this->idLinha,
            'estado' => $this->estado,
            'quantidade' => $this->quantidade,
            'id_carrinho' => $this->id_carrinho,
            'id_produto' => $this->id_produto,
        ]);

        return $dataProvider;
    }
}

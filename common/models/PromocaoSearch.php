<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Promocao;

/**
 * PromocaoSearch represents the model behind the search form of `common\models\Promocao`.
 */
class PromocaoSearch extends Promocao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPromocao'], 'integer'],
            [['percentagem'], 'number'],
            [['codigo', 'nome_promo'], 'safe'],
            [['data_limite'], 'date', 'format' => 'php:Y-m-d'],
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
        $query = Promocao::find();

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
            'idPromocao' => $this->idPromocao,
            'percentagem' => $this->percentagem,
            'data_limite' => $this->data_limite,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nome_promo', $this->nome_promo]);

        return $dataProvider;
    }
}

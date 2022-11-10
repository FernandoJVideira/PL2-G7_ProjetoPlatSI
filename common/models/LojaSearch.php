<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Loja;

/**
 * LojaSearch represents the model behind the search form of `common\models\Loja`.
 */
class LojaSearch extends Loja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLoja', 'id_empresa', 'ativo', 'id_morada'], 'integer'],
            [['descricao', 'email', 'telefone'], 'safe'],
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
        $query = Loja::find();

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
            'idLoja' => $this->idLoja,
            'id_empresa' => $this->id_empresa,
            'ativo' => $this->ativo,
            'id_morada' => $this->id_morada,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telefone', $this->telefone]);

        return $dataProvider;
    }
}

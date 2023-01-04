<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fatura;

/**
 * FaturaSearch represents the model behind the search form of `common\models\Fatura`.
 */
class FaturaSearch extends Fatura
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFatura', 'id_metodo', 'id_utilizador', 'id_loja', 'id_carrinho'], 'integer'],
            [['nomeUtilizador', 'nifUtilizador', 'nomeEmpresa', 'nifEmpresa', 'descricaoLoja', 'dataCriacao'], 'safe'],
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
        $query = Fatura::find();

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
            'idFatura' => $this->idFatura,
            'dataCriacao' => $this->dataCriacao,
            'id_metodo' => $this->id_metodo,
            'id_utilizador' => $this->id_utilizador,
            'id_loja' => $this->id_loja,
            'id_carrinho' => $this->id_carrinho,
        ]);

        $query->andFilterWhere(['like', 'nomeUtilizador', $this->nomeUtilizador])
            ->andFilterWhere(['like', 'nifUtilizador', $this->nifUtilizador])
            ->andFilterWhere(['like', 'nomeEmpresa', $this->nomeEmpresa])
            ->andFilterWhere(['like', 'nifEmpresa', $this->nifEmpresa])
            ->andFilterWhere(['like', 'descricaoLoja', $this->descricaoLoja]);

        return $dataProvider;
    }
}

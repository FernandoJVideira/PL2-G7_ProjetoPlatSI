<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Carrinho;

/**
 * EncomendaSearch represents the model behind the search form of `common\models\Carrinho`.
 */
class EncomendaSearch extends Carrinho
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCarrinho', 'id_morada', 'id_loja', 'id_user', 'id_promocao'], 'integer'],
            [['data_criacao', 'estado'], 'safe'],
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
    public function search($params, $idLoja)
    {
        $query = Carrinho::find()->where(['id_loja' => $idLoja]);

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

        if ($this->estado == 'aberto')
            $this->estado = null;

        // grid filtering conditions
        $query->andFilterWhere([
            'idCarrinho' => $this->idCarrinho,
            'estado' => $this->estado,
            'id_morada' => $this->id_morada,
            'id_loja' => $this->id_loja,
            'id_user' => $this->id_user,
            'id_promocao' => $this->id_promocao,
        ])->andFilterWhere(['like', 'data_criacao', $this->data_criacao]);

        return $dataProvider;
    }
}

<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Favorito;

/**
 * FavoritoSearch represents the model behind the search form of `common\models\Favorito`.
 */
class FavoritoSearch extends Favorito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idFavorito', 'id_user'], 'integer'],
            ['id_produto', 'safe']
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
        $query = Favorito::find()->where(['id_user' => \Yii::$app->user->id])->joinWith('produto');

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
            'idFavorito' => $this->idFavorito,
            'id_user' => $this->id_user,
        ])->andFilterWhere(['like', 'nome', $this->id_produto]);

        return $dataProvider;
    }
}

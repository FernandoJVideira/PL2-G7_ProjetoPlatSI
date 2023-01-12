<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Stock;

/**
 * StockSearch represents the model behind the search form of `common\models\Stock`.
 */
class StockSearch extends Stock
{
    /**
     * {@inheritdoc}
     */
    public $nome;

    public function rules()
    {
        return [
            [['idStock', 'quant_stock', 'quant_req', 'id_produto', 'id_loja', 'nome'], 'integer'],
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
        $query = Stock::find()
            ->select(['produto.nome','produto.idProduto', 'stock.quant_stock', 'stock.quant_req', 'stock.idStock', 'stock.id_produto'])
            ->rightJoin('produto', 'produto.idProduto = stock.id_produto AND stock.id_loja = :idLoja', [':idLoja' => $idLoja])->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'nome',
                    'quant_stock',
                    'quant_req',
                    'idStock',
                    'id_produto',
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        return $dataProvider;

    }
}

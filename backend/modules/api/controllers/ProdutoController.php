<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\web\HttpException;


class ProdutoController extends ActiveController
{
    public $modelClass = 'common\models\Produto';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view'], $actions['create'], $actions['update'], $actions['delete'], $actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $model = \common\models\Produto::find()->where(['ativo' => 1])->all();
        if(!$model)
            throw new HttpException(404, 'Nenhuma fatura encontrada.');

        return ["produtos" => $model];
    }

    public function actionView($id){
        $produto = $this->modelClass::find()->where(['ativo' => 1])->andWhere(['idProduto' => $id])->one();
        if($produto == null){
            throw new HttpException(404,'Produto nao encontrado.');
        }
        return $produto;
    }

    public function actionCategoria($id){
        $produto = $this->modelClass::find()->where(['id_categoria' => $id])->andWhere(['ativo' => 1])->all();

        return ["produtos" => $produto];
    }

    public function actionNome($nome){
        $produto = $this->modelClass::find()->where(['like', 'nome', $nome])->andWhere(['ativo' => 1])->all();

        return ["produtos" => $produto];
    }
}

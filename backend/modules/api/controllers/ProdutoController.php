<?php

namespace backend\modules\api\controllers;

use Couchbase\HttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Response;

class ProdutoController extends ActiveController
{
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public $modelClass = 'common\models\Produto';

    public function actionView($id){
        $produto = $this->modelClass::findOne($id);
        return $produto;
    }

    public function actionCategoria($id){
        $produto = $this->modelClass::find()->where(['id_categoria' => $id])->andWhere(['ativo' => 1])->all();
        if (empty($produto)){
            throw new \yii\web\HttpException(200, 'Nenhum produto na categoria encontrado', 404);
        }
        return $produto;
    }

    public function actionNome($nome){
        $produto = $this->modelClass::find()->where(['like', 'nome', $nome])->andWhere(['ativo' => 1])->all();
        if (empty($produto)){
            throw new \yii\web\HttpException(200, 'Nenhum produto encontrado', 404);
        }
        return $produto;
    }


}

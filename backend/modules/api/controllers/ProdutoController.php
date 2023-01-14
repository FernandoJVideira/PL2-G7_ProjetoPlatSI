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
        unset($actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function actionView($id){
        $produto = $this->modelClass::findOne($id);
        if($produto == null){
            throw new HttpException(404,'Produto nao encontrado.');
        }
        return $produto;
    }

    public function actionCategoria($id){
        $produto = $this->modelClass::find()->where(['id_categoria' => $id])->andWhere(['ativo' => 1])->all();
        if (empty($produto)){
            throw new \yii\web\HttpException(404, 'Nenhum produto na categoria encontrado');
        }
        return $produto;
    }

    public function actionNome($nome){
        $produto = $this->modelClass::find()->where(['like', 'nome', $nome])->andWhere(['ativo' => 1])->all();
        if (empty($produto)){
            throw new \yii\web\HttpException(404, 'Nenhum produto encontrado');
        }
        return $produto;
    }


}

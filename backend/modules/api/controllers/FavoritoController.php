<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Favorito;
use Yii;
use yii\rest\ActiveController;
use yii\web\HttpException;

class FavoritoController extends ActiveController
{
    public $modelClass = 'common\models\Favorito';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
            'auth' => ['backend\modules\api\components\CustomAuth', 'authCustom'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'],$actions['view'],$actions['update'],  $actions['create'], $actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'delete' || $action === 'view') {
            if ($model) {
                if ($model->id_user != $this->user->id) {
                    throw new HttpException(403,'You are not allowed to access this page.');
                }
            } else {
                throw new HttpException(404, 'The requested page does not exist.');
            }
        }
    }

    public function actionIndex()
    {
        $model = Favorito::find()->where(['id_user' => $this->user->id])->all();

        $this->checkAccess('index', $model);

        return ["favoritos" => $model];
    }

    public function actionCreate($id)
    {
        $model = Favorito::find()->where(['id_user' => $this->user->id, 'id_produto' => $id])->one();
        if($model){
            throw new HttpException(200, 'Produto já adicionado aos favoritos');
        }

        $model = new Favorito();
        $model->id_user = $this->user->id;
        $model->id_produto = intval($id);

        $model->save();

        return $model;
    }

    public function actionDelete($id)
    {
        $model = Favorito::find()->where(['id_user' => $this->user->id, 'id_produto' => $id])->one();
        if(!$model){
            throw new HttpException(404, 'Produto não encontrado nos favoritos');
        }

        $model->delete();

        throw new HttpException(200, 'Produto removed');
    }
}

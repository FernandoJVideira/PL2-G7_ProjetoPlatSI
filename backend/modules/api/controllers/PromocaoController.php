<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class PromocaoController extends ActiveController
{
    public $modelClass = 'common\models\Promocao';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'authenticator' => [
                    'class' => CustomAuth::className(),
                    'auth' => ['backend\modules\api\components\CustomAuth', 'authCustom']
                ],
                'contentNegotiator' => [
                    'class' => 'yii\filters\ContentNegotiator',
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                    ],
                ],
            ]
        );
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'index' || $action === 'view') {
            if (!$model) {
                throw new HttpException(403,'You are not allowed to access this page.');
            }
        }
    }

    public function actionIndex(){
        $this->checkAccess('index', $this->user);

        $promocoes = $this->modelClass::find()->where(['>', 'data_limite', date('Y-m-d H:i:s')])->all();

        return ["promocoes" => $promocoes];
    }

    public function actionValidate($id){
        $this->checkAccess('view', $this->user);
        $promocao = $this->modelClass::find()->where(['>', 'data_limite', date('Y-m-d H:i:s')])->andWhere(['idPromocao' => $id])->one();

        return $promocao ?? throw new HttpException(404,'Promocao not found');
    }
}

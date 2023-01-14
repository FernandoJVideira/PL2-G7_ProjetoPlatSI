<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Morada;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class MoradaController extends ActiveController
{
    public $modelClass = 'common\models\Morada';

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
        unset($actions['index'],$actions['view'],$actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'update') {
            if ($model) {
                if ($model->id_user != $this->user->id) {
                    throw new HttpException(403,'You are not allowed to access this page.');
                }
            } else {
                throw new HttpException(404, 'The requested page does not exist.');
            }
        }

        if($action === 'delete'){
            if($model){
                if($model->id_user != $this->user->id){
                    throw new HttpException(403,'You are not allowed to access this page.');
                }
            }else{
                throw new HttpException(404, 'The requested page does not exist.');
            }
        }
    }

    public function actionDelete()
    {
        $model = Morada::findOne(['id_user' => $this->user->id]);

        $this->checkAccess('delete', $model);

        $model->estado = 0;
        $model->save();
    }

}

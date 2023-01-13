<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Fatura;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use function PHPUnit\Framework\isNull;

class FaturaController extends ActiveController
{

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
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        $behaviors['verbs'] = [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'index' => ['GET'],
                'view' => ['GET'],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'],$actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public $modelClass = 'common\models\Fatura';

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'view') {
            if($model)
            {
                if ($model->id_utilizador != $this->user->id) {
                    throw new ForbiddenHttpException('You are not allowed to access this page.');
                }
            }else{
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }

    public function actionIndex()
    {
        $model = Fatura::find()->where(['id_utilizador' => $this->user->id])->all();
        $faturas = [];

        foreach ($model as $fatura) {
            array_push($faturas, [$fatura, $fatura->linhafaturas]);
        }

        return $this->asJson($faturas);
    }

    public function actionView($id)
    {
        $model = Fatura::findOne($id);

        $this->checkAccess('view', $model);

        return $this->asJson([$model, $model->linhafaturas]);
    }
}

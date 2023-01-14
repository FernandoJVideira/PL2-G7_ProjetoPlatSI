<?php

namespace backend\modules\api\controllers;

use yii\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'contentNegotiator' => [
                    'class' => 'yii\filters\ContentNegotiator',
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                    ],
                ],
            ]
        );
    }
    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            return [
                'name' => $exception->getName(),
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'status' => $exception->statusCode,
                'type' => get_class($exception),
            ];
        }
        return [
            'name' => 'Unknown error',
            'message' => 'Unknown error',
            'code' => 0,
            'status' => 500,
            'type' => 'Unknown error',
        ];
    }
}
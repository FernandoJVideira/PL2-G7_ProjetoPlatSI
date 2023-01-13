<?php

namespace backend\modules\api\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;

class AuthController extends Controller
{
    private $user;

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
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

    public function actionIndex()
    {
        $headers = \Yii::$app->request->headers['Authorization'];
        if($headers){
            $headers = explode(' ', $headers);
            $base = $headers[1];
            $base = base64_decode($base);
            $base = explode(':', $base);
            $username = $base[0];
            $password = $base[1];
            $this->user = User::findByUsername($username);
            if($this->user != null && $this->user->validatePassword($password))
                return $this->asJson(['token' => $this->user->auth_key]);
        }
        throw new \yii\web\HttpException(200, 'Invalid username or password', 401);

    }
}

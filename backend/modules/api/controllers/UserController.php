<?php

namespace backend\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';
    private $user;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth'],
        ];
        return $behaviors;
    }

    /**
     * @throws ForbiddenHttpException
     */

    public function auth($username, $password)
    {
        $this->user = User::findByUsername($username);

        if ($this->user && $this->user->validatePassword($password)) {
            return $this->user;
        }

        throw new ForbiddenHttpException('No authentication'); //403
    }

    public function actionLogin()
    {
        return $this->user;
    }
}

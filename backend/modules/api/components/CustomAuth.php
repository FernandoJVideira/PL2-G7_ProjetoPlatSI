<?php
namespace backend\modules\api\components;
use Yii;
use yii\filters\auth\AuthMethod;

class CustomAuth extends AuthMethod
{
    public $auth;

    public function authenticate($user, $request, $response)
    {
        $strToken = Yii::$app->request->getQueryParam('auth_key');
        if ($this->auth)
        {
            $identity = call_user_func($this->auth, $strToken);
            if ($identity === null) {
                return null;
            }
            return $identity;
        }
        return null;
    }

    public function authCustom($token)
    {
        $user_ = \common\models\User::findIdentityByAccessToken($token);
        if($user_) {
            $this->user=$user_; //Guardar user autenticado
            return $user_;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }
}
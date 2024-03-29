<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\User;
use common\models\Utilizador;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\Utilizador';

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

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'dados' || $action === 'utilizador') {

            if ($model->idUser != $this->user->id) {
                throw new HttpException(403,'You are not allowed to access this page.');
            }
        }
        if ($action === 'user') {
            if ($model->id != $this->user->id) {
                throw new HttpException(403,'You are not allowed to access this page.');
            }
        }
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function actionDados()
    {
        $user = Utilizador::find()->where(["id_user" => $this->user->id])->one();

        $this->checkAccess('dados', $user);

        return [
                "dados" => [
                    "nome" => $user->nome,
                    "nif" => $user->nif,
                    "telemovel" => $user->telemovel,
                    "username" => $user->user->username,
                    "email" => $user->user->email,
                ],
                "moradas" => $user->moradas
        ];
    }

    public function actionUtilizador()
    {
        $utilizador = Utilizador::findOne($this->user->id);
        $user = User::findOne($this->user->id);


        $this->checkAccess('utilizador', $utilizador);

        $data = json_decode(Yii::$app->request->getRawBody(), true);

        $user->username = $data['username'] ?? $user->username;
        $user->email = $data['email'] ?? $user->email;
        if (isset($data['password'])) {
            $user->setPassword($data['password']);
        }
        $utilizador->nome = $data['nome'] ?? $utilizador->nome;
        $utilizador->nif = $data['nif'] ?? $utilizador->nif;
        $utilizador->telemovel = $data['telemovel'] ?? $utilizador->telemovel;

        $utilizador->save();
        $user->save();

        return [
            ["nome" => $utilizador->nome, "nif" => $utilizador->nif, "telemovel" => $utilizador->telemovel],
            ["username" => $user->username, "email" => $user->email],
            $utilizador->moradas
        ];
    }
}

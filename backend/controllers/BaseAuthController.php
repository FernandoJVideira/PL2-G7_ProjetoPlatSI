<?php

namespace backend\controllers;

use common\models\Utilizador;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class BaseAuthController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['login', 'error'],
                            'allow' => true,
                        ],
                        [
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function checkAccess($action, $idUser, $role = null): bool
    {
        if($idUser != null)
            $role = Utilizador::getPerfil($idUser);

        if($role != 'Cliente'){
            if (Yii::$app->user->can($action . $role) || (Yii::$app->user->can($action . 'Own') && Yii::$app->user->id == $idUser)) {
                return true;
            }
        }
        else
            return true;
        return false;
    }

    public function noAccess($string){
        Yii::$app->session->setFlash('error', $string);
        $this->redirect(['site/index']);
        return null;
    }

}
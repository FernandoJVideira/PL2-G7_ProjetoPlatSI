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
                            'controllers' => ['categoria', 'produto', 'iva', 'loja'],
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Admin'],
                        ],
                        [
                            'controllers' => ['empresa'],
                            'actions' => ['index', 'view', 'update'],
                            'allow' => true,
                            'roles' => ['Admin'],
                        ],
                        [
                            'controllers' => ['morada', 'site'],
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                        [
                            'controllers' => ['stock'],
                            'actions' => ['index', 'view', 'create'],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                        [
                            'controllers' => ['stock'],
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => ['Admin','Gestor'],
                        ],
                        [
                            'controllers' => ['user'],
                            'actions' => ['create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                        [
                            'controllers' => ['utilizador'],
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


    public function showMessage($string, $type = 'error'){
        Yii::$app->session->setFlash($type, $string);
        $this->redirect(['site/index']);
        return null;
    }

}
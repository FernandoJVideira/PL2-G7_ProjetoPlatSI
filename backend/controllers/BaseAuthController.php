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
                            'controllers' => [],
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Admin', 'Gestor'],
                        ],
                        [
                            'controllers' => ['empresa'],
                            'actions' => ['update'],
                            'allow' => false,
                            'roles' => ['Gestor'],
                        ],
                        [
                            'controllers' => ['morada', 'site', 'utilizador', 'seccao', 'user', 'stock'],
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['Funcionario'],
                        ],
                        [
                            'controllers' => ['stock'],
                            'actions' => ['update'],
                            'allow' => false,
                            'roles' => ['Funcionario'],
                        ],
                        [
                            'controllers' => ['user'],
                            'actions' => ['create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['Admin','Gestor', 'Funcionario'],
                        ],
                        [
                            'controllers' => ['utilizador', 'encomenda'],
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
        $this->redirect(['site/index'])->send();
    }

}
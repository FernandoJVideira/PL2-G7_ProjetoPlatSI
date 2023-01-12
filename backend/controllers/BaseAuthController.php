<?php

namespace backend\controllers;

use common\models\Utilizador;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class BaseAuthController extends Controller
{
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction' ,
            ]
        ];
    }

    public function showMessage($string, $type = 'error'){
        Yii::$app->session->setFlash($type, $string);
        $this->redirect(['site/index'])->send();
    }
}
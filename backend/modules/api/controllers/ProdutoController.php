<?php

namespace backend\modules\api\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class ProdutoController extends ActiveController
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
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['?'],
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

    public $modelClass = 'common\models\Produto';
}

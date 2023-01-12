<?php

namespace backend\modules\api\controllers;

use common\models\Loja;
use common\models\Seccao;
use common\models\Senhadigital;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Response;

class SeccaoController extends ActiveController
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
                            'actions' => ['index', 'senha'],
                            'allow' => true,
                            'roles' => [],
                        ],
                    ],
                ],
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

    public $modelClass = 'common\models\Seccao';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $this->asJson($actions);
    }

    public function actionIndex($idLoja)
    {
        $seccao = Loja::findOne($idLoja)->getSeccaoIdSeccaos()->all();
        return $this->asJson($seccao);
    }

    public function actionSenha($id)
    {
        $model = Seccao::findOne($id);
        if($model == null){
            return $this->asJson(['status' => 'error', 'message' => 'Seccao não encontrada']);
        }
        $senha = SenhaDigital::find()->where(['id_seccao' => $model->idSeccao])->one();

        if($senha == null){
            $senha = new SenhaDigital();
            $senha->id_seccao = $model->idSeccao;
            $senha->ultimoNumero = 1;
            $senha->save();
            return $this->asJson(['number' => $senha->ultimoNumero]);
        }
        else{
            $senha->ultimoNumero = $senha->ultimoNumero + 1;
            $senha->save();
            return $this->asJson(['number' => $senha->ultimoNumero]);
        }

    }

}

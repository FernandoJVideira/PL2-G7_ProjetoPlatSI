<?php

namespace backend\modules\api\controllers;

use common\models\Loja;
use common\models\LojaSeccao;
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
        return $actions;
    }

    public function actionIndex($id)
    {
        $seccao = Loja::findOne($id)->getLojaSeccaos()->all();
        $seccao = array_map(function ($seccao) {
            return ["id" =>  $seccao->idLojaSeccao, "nome" => $seccao->seccaoIdSeccao->nome, "numeroAtual" => $seccao->numeroAtual, "ultimoNumero" => $seccao->ultimoNumero];
        }, $seccao);
        return $this->asJson($seccao);
    }

    public function actionSenha($id)
    {
        $model = LojaSeccao::findOne($id);
        if($model == null){
            return $this->asJson(['status' => 'error', 'message' => 'Seccao não encontrada']);
        }
        $model->ultimoNumero = $model->ultimoNumero + 1;
        $model->save();
        return $this->asJson(['number' => $model->ultimoNumero]);
    }

}

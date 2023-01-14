<?php

namespace backend\modules\api\controllers;

use common\models\Loja;
use common\models\LojaSeccao;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class SeccaoController extends ActiveController
{
    public $modelClass = 'common\models\Seccao';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'contentNegotiator' => [
                    'class' => 'yii\filters\ContentNegotiator',
                    'formats' => [
                        'application/json' => Response::FORMAT_JSON,
                    ],
                ],
            ]
        );
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function actionIndex($id)
    {
        $loja = Loja::findOne($id);
        if($loja == null){
            throw new HttpException(404,'Loja nao encontrada.');
        }
        $seccao = $loja->lojaSeccaos;
        if(empty($seccao)){
            throw new HttpException(404,'Nao existem seccoes para esta loja.');
        }

        $seccao = array_map(function ($seccao) {
            return ["id" =>  $seccao->idLojaSeccao, "nome" => $seccao->seccaoIdSeccao->nome, "numeroAtual" => $seccao->numeroAtual, "ultimoNumero" => $seccao->ultimoNumero];
        }, $seccao);

        return $seccao;
    }

    public function actionSenha($id)
    {
        $model = LojaSeccao::findOne($id);
        if($model == null){
            throw new HttpException(404,'Senha nao encontrada.');
        }

        $model->ultimoNumero = $model->ultimoNumero + 1;
        $model->save();

        return ['number' => $model->ultimoNumero];
    }

}

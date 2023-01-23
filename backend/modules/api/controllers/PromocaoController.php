<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Carrinho;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class PromocaoController extends ActiveController
{
    public $modelClass = 'common\models\Promocao';

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

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'index' || $action === 'view') {
            if (!$model) {
                throw new HttpException(403,'You are not allowed to access this page.');
            }
        }
    }

    public function actionIndex(){
        $this->checkAccess('index', $this->user);
        $promocoes = $this->modelClass::find()->where(['>', 'data_limite', date('Y-m-d H:i:s')])->all();

        return empty($promocoes) ? throw new HttpException(404,'No Promocao available') : $promocoes;
    }

    public function actionValidate($promo){
        $this->checkAccess('view', $this->user);
        $promocao = $this->modelClass::find()->where(['>', 'data_limite', date('Y-m-d H:i:s')])->andWhere(['codigo' => $promo])->one();
        if($promocao == null){
            throw new HttpException(200,'Promocao not found', 404);
        }

        //get the carrinho
        $carrinho = Carrinho::find()->where(['id_user' => $this->user->id])->andWhere(['estado' => 'aberto'])->one();
        if(empty($carrinho)){
            throw new HttpException(200,'Carrinho not found', 404);
        }

        $carrinho->id_promocao = $promocao->idPromocao;
        $carrinho->save();

        return ["carrinho" => $carrinho,"dados"=>["subTotal" => $carrinho->total, "iva" => $carrinho->iva, "desconto" => $carrinho->desconto, "total" => $carrinho->totalcomdesconto], "linhascarrinho" => $carrinho->linhaCarrinhos];

    }
}

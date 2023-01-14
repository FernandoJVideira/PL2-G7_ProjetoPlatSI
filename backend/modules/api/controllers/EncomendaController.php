<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use yii\rest\ActiveController;
use yii\web\HttpException;


class EncomendaController extends ActiveController
{
    public $modelClass = 'common\models\Carrinho';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'authenticator' => [
                    'class' => CustomAuth::className(),
                    'auth' => ['backend\modules\api\components\CustomAuth', 'authCustom']
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

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'view') {
            if($model)
            {
                if ($model->id_user != $this->user->id) {
                    throw new HttpException(403, 'You are not allowed to access this page.');
                }
            }else{
                throw new HttpException(404, 'The requested page does not exist.');
            }
        }
    }

    public function actionIndex(){
        $carrinho = $this->modelClass::find()->where(['id_user' => $this->user->id])->andWhere(['estado' => 'emProcessamento'])->all();
        if(empty($carrinho)){
            throw new HttpException(404, 'No carrinho found.');
        }
        return $carrinho;
    }

    public function actionView($id){
        $carrinho = $this->modelClass::find()->where(['id_user' => $this->user->id])->andWhere(['estado' => 'emProcessamento'])->andWhere(['idCarrinho' => $id])->one();
        if($carrinho == null){
            throw new HttpException(404, 'No carrinho found.');
        }
        $this->checkAccess('view', $carrinho);

        return [$carrinho, $carrinho->getLinhacarrinhos()->all()];
    }
}

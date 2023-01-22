<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Fatura;
use Dompdf\Dompdf;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;

class FaturaController extends ActiveController
{
    public $modelClass = 'common\models\Fatura';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
            'auth' => ['backend\modules\api\components\CustomAuth', 'authCustom'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index'],$actions['view'], $actions['create'], $actions['update'], $actions['delete']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'view') {
            if($model)
            {
                if ($model->id_utilizador != $this->user->id) {
                    throw new HttpException(403,'You are not allowed to access this page.');
                }
            }else{
                throw new HttpException(403, 'The requested page does not exist.');
            }
        }
    }

    public function actionIndex()
    {
        $model = Fatura::find()->where(['id_utilizador' => $this->user->id])->all();
        if(!$model)
            throw new HttpException(404, 'Nenhuma fatura encontrada.');
        $faturas = [];

        foreach ($model as $fatura) {
            array_push($faturas, [$fatura, $fatura->linhafaturas]);
        }

        return $faturas;
    }

    public function actionView($id)
    {
        $model = Fatura::findOne($id);
        if($model == null)
        {
            throw new HttpException(404, 'Nenhuma fatura encontrada.');
        }

        /*$this->checkAccess('view', $model);


        return ["fatura" => [$model, ["linhasfatura" => $model->linhafaturas]]];*/

        $content = $this->renderPartial('//fatura/fatura', ['model' => $model]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($content);


        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        ob_end_clean();
        // Output the generated PDF to Browser
        //$dompdf->stream("fatura.pdf", array("Attachment" => false));
        //string to base64
        $pdf = $dompdf->output();
        $base64 = base64_encode($pdf);
        return ["fatura" => $base64];

    }
}

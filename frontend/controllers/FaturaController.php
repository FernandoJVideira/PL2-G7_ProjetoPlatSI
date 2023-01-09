<?php

namespace frontend\controllers;

use backend\controllers\BaseAuthController;
use common\models\Carrinho;
use common\models\Fatura;
use frontend\models\FaturaSearch;
//use Dompdf\Dompdf;
use Dompdf\Dompdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionView($idCarrinho)
    {
        if(!Yii::$app->user->isGuest)
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $fatura = Fatura::findOne(['id_carrinho' => $idCarrinho]);

        if($fatura->id_utilizador != Yii::$app->user->id)
        {
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $content = $this->renderPartial('fatura', ['model' => $fatura]);


        $dompdf = new Dompdf();
        $dompdf->loadHtml($content);


        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        ob_end_clean();
        // Output the generated PDF to Browser
        $dompdf->stream("fatura.pdf", array("Attachment" => false));
    }

    /**
     * Finds the Fatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idFatura Id Fatura
     * @return Fatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFatura)
    {
        if (($model = Fatura::findOne(['idFatura' => $idFatura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace frontend\controllers;

use common\models\Carrinho;
use app\models\EncomendaSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EncomendaController implements the CRUD actions for Carrinho model.
 */
class EncomendaController extends Controller
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


    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $searchModel = new EncomendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, Yii::$app->user->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($idCarrinho)
    {
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $carrinho = $this->findModel($idCarrinho);

        if($carrinho->id_user != Yii::$app->user->id)
        {
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Linhacarrinho::find()->where(['id_carrinho' => $idCarrinho]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($idCarrinho),
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCarrinho Id Carrinho
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCarrinho)
    {
        if (($model = Carrinho::findOne(['idCarrinho' => $idCarrinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

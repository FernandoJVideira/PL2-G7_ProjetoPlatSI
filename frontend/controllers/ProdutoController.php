<?php

namespace frontend\controllers;

use common\models\Produto;
use frontend\models\ProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * @inheritDoc
     */
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
            ]
        );
    }

    /**
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param int $idProduto Id Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idProduto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idProduto),
        ]);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idProduto Id Produto
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idProduto)
    {
        if (($model = Produto::findOne(['idProduto' => $idProduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

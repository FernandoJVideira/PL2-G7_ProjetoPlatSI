<?php

namespace frontend\controllers;

use common\models\Linhacarrinho;
use common\models\LinhacarrinhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinhacarrinhoController implements the CRUD actions for Linhacarrinho model.
 */
class LinhacarrinhoController extends Controller
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
     * Lists all Linhacarrinho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LinhacarrinhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Linhacarrinho model.
     * @param int $idLinha Id Linha
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLinha)
    {
        /*if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Faça login para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }*/

        $model = $this->findModel($idLinha);
        $produto = $model->produto;

        return $this->redirect('/produto/view?idProduto=' . $produto->idProduto);
    }

    /**
     * Creates a new Linhacarrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idProduto)
    {
        $model = new Linhacarrinho();

        /*if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Faça login para adicionar produtos aos favoritos.');
            $this->redirect(['site/index']);
            return null;
        }*/

        $model->id_produto = $idProduto;
        $model->id_utilizador = \Yii::$app->user->id;

        if ($model->save()) {
            return $this->redirect(['carrinho/index']);
        }
    }

    /**
     * Updates an existing Linhacarrinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLinha Id Linha
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLinha)
    {
    }

    /**
     * Deletes an existing Linhacarrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLinha Id Linha
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLinha)
    {
        $this->findModel($idLinha)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Linhacarrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLinha Id Linha
     * @return Linhacarrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLinha)
    {
        if (($model = Linhacarrinho::findOne(['idLinha' => $idLinha])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

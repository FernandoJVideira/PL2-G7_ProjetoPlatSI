<?php

namespace frontend\controllers;

use common\models\Favorito;
use common\models\FavoritoSearch;
use common\models\Produto;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoritoController implements the CRUD actions for Favorito model.
 */
class FavoritoController extends Controller
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

    /**
     * Lists all Favorito models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $searchModel = new FavoritoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favorito model.
     * @param int $idFavorito Id Favorito
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idFavorito)
    {
        if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Faça login para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = $this->findModel($idFavorito);
        $produto = $model->produto;

        return $this->redirect('/produto/view?idProduto=' . $produto->idProduto);
    }

    /**
     * Creates a new Favorito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idProduto, $fav = null)
    {
        if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Faça login para adicionar produtos aos favoritos.');
            $this->redirect(['site/index']);
            return null;
        }

        $favorito = Favorito::find()->where(['id_user' => \Yii::$app->user->identity->id])->andWhere(['id_produto' => $idProduto])->one();

        if($favorito != null){
            $this->findModel($favorito->idFavorito)->delete();
        }
        else{
            $model = new Favorito();
            $model->id_produto = $idProduto;
            $model->id_user = \Yii::$app->user->id;
            $model->save();
        }
        if($fav != null)
            return $this->redirect(['favorito/index']);
        return $this->redirect(['site/detalhes', 'id' => $idProduto]);

    }

    /**
     * Deletes an existing Favorito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idFavorito Id Favorito
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idFavorito)
    {
        $this->findModel($idFavorito)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favorito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idFavorito Id Favorito
     * @return Favorito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFavorito)
    {
        if (!\Yii::$app->user->can('favoritos')) {
            \Yii::$app->session->setFlash('error', 'Faça login para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        if (($model = Favorito::findOne(['idFavorito' => $idFavorito])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

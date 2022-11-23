<?php

namespace backend\controllers;

use common\models\Loja;
use common\models\LojaSearch;
use common\models\Morada;
use backend\models\Empresa;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * LojaController implements the CRUD actions for Loja model.
 */
class LojaController extends BaseAuthController
{
    /**
     * Lists all Loja models.
     *
     * @return string
     */
    public function actionIndex()
    {

        if (!\Yii::$app->user->can('viewLoja')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $searchModel = new LojaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loja model.
     * @param int $idLoja Id Loja
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLoja)
    {
        if (!\Yii::$app->user->can('viewLoja')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = $this->findModel($idLoja);
        $morada = $model->morada;
        $empresa = $model->empresa;

        return $this->render('view', [
            'model' => $model,
            'morada' => $morada,
            'empresa' => $empresa,
        ]);
    }

    /**
     * Creates a new Loja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        if (!\Yii::$app->user->can('createLoja')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = new Loja();
        $modelMorada = new Morada();
        $empresa = Empresa::find()->all();

        if ($this->request->isPost) {

            if ($modelMorada->load($this->request->post()) && $modelMorada->save()) {

                $model->id_morada = $modelMorada->idMorada;

                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'idLoja' => $model->idLoja]);
                }
            }
        } else {
            $model->loadDefaultValues();
            $modelMorada->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'morada' => $modelMorada,
            'empresa' => $empresa,
        ]);
    }

    /**
     * Updates an existing Loja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLoja Id Loja
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLoja)
    {

        if (!\Yii::$app->user->can('updateLoja')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = $this->findModel($idLoja);
        $modelMorada = Morada::findOne($model->id_morada);
        $empresa = Empresa::find()->all();


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLoja' => $model->idLoja]);
        }

        return $this->render('update', [
            'model' => $model,
            'morada' => $modelMorada,
            'empresa' => $empresa,
        ]);
    }

    /**
     * Deletes an existing Loja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLoja Id Loja
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLoja)
    {
        if (!\Yii::$app->user->can('deleteLoja')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $store = $this->findModel($idLoja);
        $store->ativo = 0;
        $store->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLoja Id Loja
     * @return Loja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLoja)
    {
        if (($model = Loja::findOne(['idLoja' => $idLoja])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

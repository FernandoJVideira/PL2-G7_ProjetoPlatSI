<?php

namespace backend\controllers;

use common\models\Metodopagamento;
use backend\models\MetodopagamentoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MetodopagamentoController implements the CRUD actions for Metodopagamento model.
 */
class MetodopagamentoController extends BaseAuthController
{
    /**
     * Lists all Metodopagamento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('viewMetodoPagamento'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $searchModel = new MetodopagamentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Metodopagamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('createMetodoPagamento'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = new Metodopagamento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->ativo = 1; //TODO: Retirar da base de dados
                if ($model->save()) {
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Metodopagamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idMetodo Id Metodo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idMetodo)
    {
        if(!Yii::$app->user->can('updateMetodoPagamento'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = $this->findModel($idMetodo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idMetodo' => $model->idMetodo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Metodopagamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idMetodo Id Metodo
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idMetodo)
    {
        if(!Yii::$app->user->can('deleteMetodoPagamento'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $this->findModel($idMetodo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Metodopagamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idMetodo Id Metodo
     * @return Metodopagamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idMetodo)
    {
        if (($model = Metodopagamento::findOne(['idMetodo' => $idMetodo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

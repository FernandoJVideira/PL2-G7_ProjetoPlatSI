<?php

namespace backend\controllers;

use backend\models\Empresa;
use backend\models\EmpresaSearch;
use common\models\Morada;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends BaseAuthController
{

    /**
     * Lists all Empresa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('viewEmpresa')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
     * @param int $idEmpresa Id Empresa
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEmpresa)
    {
        if (!\Yii::$app->user->can('viewEmpresa')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = $this->findModel($idEmpresa);
        $modelMorada = Morada::findOne($model->id_morada);

        return $this->render('view', [
            'model' => $model,
            'morada' => $modelMorada,
        ]);
    }

    /**
     * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEmpresa Id Empresa
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEmpresa)
    {
        if (!\Yii::$app->user->can('updateDadosEmpresa')) {
            \Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            $this->redirect(['site/index']);
            return null;
        }

        $model = $this->findModel($idEmpresa);
        $morada = $model->morada;

        if ($this->request->isPost) {

            if ($morada->load($this->request->post()) && $morada->save()) {

                $model->id_morada = $morada->idMorada;

                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'idEmpresa' => $model->idEmpresa]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'morada' => $morada,
        ]);
    }

    /**
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEmpresa Id Empresa
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEmpresa)
    {
        if (($model = Empresa::findOne(['idEmpresa' => $idEmpresa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

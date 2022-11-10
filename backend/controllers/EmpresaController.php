<?php

namespace backend\controllers;

use backend\models\Empresa;
use backend\models\EmpresaSearch;
use common\models\Morada;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
     * Lists all Empresa models.
     *
     * @return string
     */
    public function actionIndex()
    {
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
        $model = $this->findModel($idEmpresa);
        $modelMorada = Morada::findOne($model->id_morada);

        return $this->render('view', [
            'model' => $model,
            'morada' => $modelMorada,
        ]);
    }

    /**
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Empresa();
        $morada = new Morada();

        if ($this->request->isPost) {

            if ($morada->load($this->request->post()) && $morada->save()) {

                $model->id_morada = $morada->idMorada;

                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'idEmpresa' => $model->idEmpresa]);
                }
            }
        } else {
            $model->loadDefaultValues();
            $morada->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'morada' => $morada,
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
        $model = $this->findModel($idEmpresa);
        $morada = Morada::findOne($model->id_morada);

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
     * Deletes an existing Empresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEmpresa Id Empresa
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEmpresa)
    {
        $this->findModel($idEmpresa)->delete();

        return $this->redirect(['index']);
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

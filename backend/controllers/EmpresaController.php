<?php

namespace backend\controllers;

use backend\models\Empresa;
use backend\models\EmpresaSearch;
use common\models\Morada;
use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends BaseAuthController
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['Admin', 'Gestor'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => false,
                        'roles' => ['Gestor'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ]
            ]
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
        if (!Yii::$app->user->can('viewEmpresa'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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
        if (!Yii::$app->user->can('updateDadosEmpresa'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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

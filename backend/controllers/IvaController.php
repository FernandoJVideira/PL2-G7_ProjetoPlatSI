<?php

namespace backend\controllers;

use common\models\Iva;
use backend\models\IvaSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IvaController implements the CRUD actions for Iva model.
 */
class IvaController extends BaseAuthController
{
    /**
     * Lists all Iva models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('viewIva'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $searchModel = new IvaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Iva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('createIva'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = new Iva();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Iva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idIva Id Iva
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idIva)
    {
        if(!Yii::$app->user->can('updateIva'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = $this->findModel($idIva);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Finds the Iva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idIva Id Iva
     * @return Iva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idIva)
    {
        if (($model = Iva::findOne(['idIva' => $idIva])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

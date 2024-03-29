<?php

namespace backend\controllers;

use common\models\Seccao;
use backend\models\SeccaoSearch;
use Yii;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeccaoController implements the CRUD actions for Seccao model.
 */
class SeccaoController extends BaseAuthController
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
     * Lists all Seccao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->can('viewSeccao'))
            $this->showMessage('Não tem permissões para aceder a esta página.');


        $searchModel = new SeccaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Seccao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->can('createSeccao'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = new Seccao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Seccao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idSeccao Id Seccao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idSeccao)
    {
        if(!Yii::$app->user->can('deleteSeccao'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        try {
            $this->findModel($idSeccao)->delete();
        } catch (\Throwable $e) {
            $this->showMessage( 'A seccao não pode ser eliminada porque existem lojas associadas');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seccao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idSeccao Id Seccao
     * @return Seccao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSeccao)
    {
        if (($model = Seccao::findOne(['idSeccao' => $idSeccao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

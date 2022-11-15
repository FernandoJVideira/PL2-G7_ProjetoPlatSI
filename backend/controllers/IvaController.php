<?php

namespace backend\controllers;

use backend\models\Iva;
use backend\models\IvaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IvaController implements the CRUD actions for Iva model.
 */
class IvaController extends Controller
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
     * Lists all Iva models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IvaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Iva model.
     * @param int $idIva Id Iva
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idIva)
    {
        return $this->render('view', [
            'model' => $this->findModel($idIva),
        ]);
    }

    /**
     * Creates a new Iva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Iva();

        $items = ["Inativo" , "Ativo" ];

        if ($this->request->isPost) {

            if($model->ativo == "Inativo"){
                $model->ativo = 0;
            }else{
                $model->ativo = 1;
            }
            if ($model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['view', 'idIva' => $model->idIva]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model, 'items' => $items
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
        $model = $this->findModel($idIva);

        $items = ["Inativo" , "Ativo" ];

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            if($model->ativo == "Inativo"){
                $model->ativo = 0;
            }else{
                $model->ativo = 1;
            }

            return $this->redirect(['view', 'idIva' => $model->idIva]);
        }

        return $this->render('update', [
            'model' => $model, 'items' => $items
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

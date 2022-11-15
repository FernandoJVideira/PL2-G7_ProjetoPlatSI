<?php

namespace backend\controllers;

use backend\models\Categoria;
use backend\models\CategoriaSearch;
use backend\models\Iva;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller
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
     * Lists all Categoria models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CategoriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categoria model.
     * @param int $idCategoria Id Categoria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCategoria)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCategoria),
        ]);
    }

    /**
     * Creates a new Categoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Categoria();
        
        $iva = Iva::find()->where(['ativo' => 1])->all();

        $items = ["Inativo" , "Ativo" ];
        
        $id_categoria = Categoria::find()->where(['id_categoria'=>null])->all();

        if ($this->request->isPost) {

            if($model->ativo == "Inativo"){
                $model->ativo = 0;
            }else{
                $model->ativo = 1;
            }

            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCategoria' => $model->idCategoria]);
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('create', [
            'model' => $model, 'ivas' => $iva ,'id_categoria' =>$id_categoria, 'items' => $items
        ]);

        //sub cat -> cat where id_cat null
    }

    /**
     * Updates an existing Categoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idCategoria Id Categoria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idCategoria)
    {
        $model = $this->findModel($idCategoria);

        $items = ["Inativo" , "Ativo" ];
        
        $iva = Iva::find()->where(['ativo' => 1])->all();

        $id_categoria = Categoria::find()->where(['id_categoria'=>null])->all(); 

        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            if($model->ativo == "Inativo"){
                $model->ativo = 0;
            }else{
                $model->ativo = 1;
            }

            return $this->redirect(['view', 'idCategoria' => $model->idCategoria]);
        }

        return $this->render('update', [
            'model' => $model, 'iva'=>$iva , 'id_categoria' => $id_categoria, 'items' => $items
        ]);
    }

    /**
     * Finds the Categoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCategoria Id Categoria
     * @return Categoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCategoria)
    {
        if (($model = Categoria::findOne(['idCategoria' => $idCategoria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

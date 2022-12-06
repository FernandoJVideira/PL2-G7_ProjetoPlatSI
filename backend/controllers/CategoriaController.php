<?php

namespace backend\controllers;

use common\models\Categoria;
use backend\models\CategoriaSearch;
use common\models\Iva;
use Yii;
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
        Yii::$app->user->can('viewCategoria');

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
        Yii::$app->user->can('viewCategoria');

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
        Yii::$app->user->can('createCategoria');

        $model = new Categoria();
        
        $iva = Iva::find()->where(['ativo' => 1])->all();

        $categorias = Categoria::find()->where(['id_categoria'=>null])->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idCategoria' => $model->idCategoria]);
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('create', [
            'model' => $model,
            'ivas' => $iva,
            'categorias' => $categorias
        ]);

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
        Yii::$app->user->can('updateCategoria');

        $model = $this->findModel($idCategoria);

        $iva = Iva::find()->where(['ativo' => 1])->all();

        $categorias = Categoria::find()->where(['id_categoria'=>null])->andWhere(['not',['idCategoria'=>$idCategoria]])->andWhere(['ativo'=>1])->all();

        $main = Categoria::find()->where(['not',['id_categoria'=>null]])->andWhere(['ativo'=>1])->groupBy('id_categoria')->all();

        if(isset($main)){
            if(array_search($idCategoria, array_column($main, 'id_categoria')) !== false){
                $categorias = null;
            }
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCategoria' => $model->idCategoria]);
        }

        return $this->render('update', [
            'model' => $model,
            'iva'=>$iva ,
            'categorias' => $categorias
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

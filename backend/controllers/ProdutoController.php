<?php

namespace backend\controllers;

use backend\models\Categoria;
use common\models\Produto;
use backend\models\ProdutoSearch;
use common\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;




/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
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
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param int $idProduto Id Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idProduto)
    {
        $a = Produto::find($idProduto);
   
        return $this->render('view', [
            'model' => $this->findModel($idProduto),
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Produto();
        $categoria = Categoria::find()->where(['ativo' => 1])->all(); // Vai buscar Todos os que estão ativos;
        $items = ["Inativo" , "Ativo" ];
        $strUpdate = "";
        foreach($categoria as $cat){
            if($cat->id_categoria !== null){
                $cat->nome .= " (Sub-Categoria)";
            }   
        }
       
        $modelUplaod = new UploadForm();
        if ($this->request->isPost) {
            //Image Path 
                //$this->imagem->saveAs('uploads/' . $this->imagem->baseName . '.' . $this->imagem->extension);
                //$model->imagem = 'uploads/'.$this->imagem->basename.'.'.$this->imagem->extension;
                if($model->ativo == "Inativo"){
                    $model->ativo = 0;
                }else{
                    $model->ativo = 1;
                }

                if ($model->load($this->request->post())) {
                        $modelUplaod->imageFile = UploadedFile::getInstance($model,'imagem');
                        if ($modelUplaod->upload()) {
                            $model->imagem = $modelUplaod->imageFile->name;
                            $model->dataCriacao = date("Y-m-d H:i:s");
                            $model->save();  
                            return $this->redirect(['view', 'idProduto' => $model->idProduto]);
                        }
                        
                    
                }
        } else {    
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,'categoria' => $categoria ,"items" => $items, "strUpdate" => $strUpdate
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idProduto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idProduto)
    {
        $model = $this->findModel($idProduto);

        $categoria = Categoria::find()->where(['ativo' => 1])->all(); 

        $items = ["Inativo" , "Ativo" ];
        $strUpdate = "Imagem Atual";

        foreach($categoria as $cat){
            if($cat->id_categoria !== null){
                $cat->nome .= " (Sub-Categoria)";
            }
        }
        $modelUplaod = new UploadForm();
        if ($this->request->isPost && $model->load($this->request->post())) {

            if($model->ativo == "Inativo"){
                $model->ativo = 0;
            }else{
                $model->ativo = 1;
            }

            $modelUplaod->imageFile = UploadedFile::getInstance($model,'imagem');
            if ($modelUplaod->upload()) {
                $model->imagem = $modelUplaod->imageFile->name;
                
                $model->save();  
                return $this->redirect(['view', 'idProduto' => $model->idProduto]);
            }
        }

        return $this->render('update', [
            'model' => $model,'categoria' => $categoria,'items' => $items, "strUpdate" => $strUpdate
        ]);
    }


    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idProduto Id Produto
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idProduto)
    {
        if (($model = Produto::findOne(['idProduto' => $idProduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

/*     public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    } */
}

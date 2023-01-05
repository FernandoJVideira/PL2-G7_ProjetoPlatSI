<?php

namespace backend\controllers;

use common\models\Categoria;
use common\models\Produto;
use backend\models\ProdutoSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;




/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends BaseAuthController
{
    /**
     * @inheritDoc
     */

    public static string $path = '../../common/Images/';

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
        $categorias = Categoria::find()->where(['ativo' => 1])->orderBy('nome')->all();

        foreach($categorias as $cat){
            if($cat->id_categoria !== null){
                $cat->nome .= " (Sub-Categoria)";
            }
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if(!file_exists(self::$path))
                    mkdir(self::$path);
                $imagem = UploadedFile::getInstance($model, 'imagem');
                $nomeImagem = Yii::$app->security->generateRandomString() . '.' . $imagem->extension;
                if($imagem->saveAs(self::$path . $nomeImagem)){
                    $model->imagem = $nomeImagem;
                    $model->save(false);
                    return $this->redirect(['view', 'idProduto' => $model->idProduto]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'categorias' => $categorias
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

        $categorias = Categoria::find()->where(['ativo' => 1])->orderBy('nome')->all();


        foreach($categorias as $cat){
            if($cat->id_categoria !== null){
                $cat->nome .= " (Sub-Categoria)";
            }
        }

        if ($this->request->isPost && $model->load($this->request->post())) {
            $imagem = UploadedFile::getInstance($model, 'imagem');
            if($imagem == null){
                $model->imagem = $model->getOldAttribute('imagem');
            }
            else{
                $nomeImagem = Yii::$app->security->generateRandomString() . '.' . $imagem->extension;
                if($imagem->saveAs(self::$path . $nomeImagem))
                    $model->imagem = $nomeImagem;
            }
            $model->save();
            return $this->redirect(['view', 'idProduto' => $model->idProduto]);

        }

        return $this->render('update', [
            'model' => $model,
            'categorias' => $categorias
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
}

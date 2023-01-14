<?php

namespace backend\controllers;

use common\models\Categoria;
use common\models\Produto;
use backend\models\ProdutoSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends BaseAuthController
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
        if(!Yii::$app->user->can('viewProduto'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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
        if(!Yii::$app->user->can('viewProduto'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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
        if(!Yii::$app->user->can('createProduto'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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
                    $model->save();
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
        if(!Yii::$app->user->can('updateProduto'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

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
            if ($model->oldAttributes['ativo'] == 1 && $model->ativo == 0) {
                try {
                    $message = ["idProduto" => $model->idProduto];
                    $mqtt = new \PhpMqtt\Client\MqttClient(Yii::$app->params['mosquitto'], 1883, 'backend');
                    $mqtt->connect();
                    $mqtt->publish('produtos_indisponiveis', json_encode($message), 1);
                    $mqtt->disconnect();
                }catch (\Exception $e){
                }
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

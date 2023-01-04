<?php

namespace backend\controllers;

use common\models\Carrinho;
use common\models\Fatura;
use backend\models\FaturaSearch;
//use Dompdf\Dompdf;
use Dompdf\Dompdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
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
     * Lists all Fatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FaturaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fatura model.
     * @param int $idFatura Id Fatura
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCarrinho)
    {
        $content = $this->renderPartial('fatura', ['model' => $this->findModel(Fatura::findOne(['id_carrinho' => $idCarrinho])->idFatura)]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($content);


        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        ob_end_clean();
        // Output the generated PDF to Browser
        $dompdf->stream("fatura.pdf", array("Attachment" => false));
    }

    /**
     * Creates a new Fatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idCarrinho)
    {
        $model = new Fatura();
        $carrinho = Carrinho::findOne($idCarrinho);

        if ($carrinho == null) {
            //TODO: set flash
            //TODO: caso esteja emProcessamento, redirecionar para o carrinho
            return $this->redirect(['index']);
        }
        else if($carrinho->estado == 'fechado') {
            return $this->redirect(['fatura', 'idFatura' => Fatura::findOne(['id_carrinho' => $idCarrinho])->idFatura]);
        }

        $model->nomeUtilizador = $carrinho->user->nome;
        $model->nifUtilizador = $carrinho->user->nif;
        $model->nomeEmpresa = $carrinho->loja->empresa->descricao_social;
        $model->nifEmpresa = $carrinho->loja->empresa->nif;
        $model->descricaoLoja = $carrinho->loja->descricao;
        //$model->dataCriacao = date('Y-m-d H:i:s');
        $model->id_metodo = $this->request->post()['idMetodo'];
        $model->id_utilizador = $carrinho->id_user;
        $model->id_loja = $carrinho->id_loja;
        $model->id_carrinho = $carrinho->idCarrinho;

        $model->save();

        foreach ($carrinho->linhaCarrinhos as $linhaCarrinho) {
            $linhaFatura = new \common\models\Linhafatura();
            $linhaFatura->quantidade = $linhaCarrinho->quantidade;
            $linhaFatura->preco_unit = $linhaCarrinho->produto->preco_unit;
            $linhaFatura->iva = $linhaCarrinho->produto->categoria->iva->iva;
            $linhaFatura->id_categoria = $linhaCarrinho->produto->id_categoria;
            $linhaFatura->id_fatura = $model->idFatura;
            $linhaFatura->id_produto = $linhaCarrinho->id_produto;
            $linhaFatura->save();
        }

        $carrinho->estado = 'fechado';
        $carrinho->save();

        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Linhacarrinho::find()->where(['id_carrinho' => $idCarrinho]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('//encomenda/view', [
            'model' => Carrinho::findOne($idCarrinho),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Fatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idFatura Id Fatura
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idFatura)
    {
        $model = $this->findModel($idFatura);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFatura' => $model->idFatura]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idFatura Id Fatura
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idFatura)
    {
        $this->findModel($idFatura)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idFatura Id Fatura
     * @return Fatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFatura)
    {
        if (($model = Fatura::findOne(['idFatura' => $idFatura])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use backend\models\Encomenda;
use common\models\Carrinho;
use backend\models\EncomendaSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * EncomendaController implements the CRUD actions for Carrinho model.
 */
class EncomendaController extends BaseAuthController
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
                        'roles' => ['Admin', 'Gestor', 'Funcionario'],
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
     * Lists all Carrinho models.
     *
     * @return string
     */
    public function actionIndex($idLoja = null)
    {
        if (!Yii::$app->user->can('viewHistoricoDeEncomendas'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $session = Yii::$app->session;
        $id = \common\models\Utilizador::findOne(Yii::$app->user->id)->id_loja ?? $idLoja;

        if($idLoja == null){
            $this->showMessage('Não foi possível encontrar a loja');
            if (isset($session['idLoja']))
                unset($session['idLoja']);
        }

        if($id != null && $idLoja != $id)
            $this->showMessage('Não tem permissões para aceder a esta página');

        $session->set('idLoja', $idLoja);
        $searchModel = new EncomendaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $idLoja);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carrinho model.
     * @param int $idCarrinho Id Carrinho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idCarrinho)
    {
        if (!Yii::$app->user->can('updateStatusEncomenda'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $dataProvider = new ActiveDataProvider([
            'query' => \common\models\Linhacarrinho::find()->where(['id_carrinho' => $idCarrinho]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', [
            'model' => $this->findModel($idCarrinho),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Carrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idCarrinho Id Carrinho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionConcluir($idCarrinho)
    {
        if (!Yii::$app->user->can('updateStatusEncomenda'))
            $this->showMessage('Não tem permissões para aceder a esta página.');

        $carrinho = $this->findModel($idCarrinho);

        if(!$carrinho->getEstadoLinhas()){
            $this->showMessage('Não é possível concluir a encomenda, pois ainda existem produtos em falta');
            return $this->redirect(['site/index']);
        }
        elseif ($carrinho->estado == 'fechado'){
            $this->showMessage('Não é possível concluir a encomenda, pois já se encontra concluída');
            return $this->redirect(['site/index']);
        }

        $carrinho->estado = 'fechado';
        $carrinho->save();
        return $this->redirect(['index', 'idLoja' => $carrinho->id_loja]);
    }

    public function actionLinha($idLinha){
        $linha = \common\models\Linhacarrinho::findOne($idLinha);
        $stock = \common\models\Stock::findOne(['id_produto' => $linha->id_produto, 'id_loja' => $linha->carrinho->id_loja]);

        $stock->quant_stock -= $linha->quantidade;
        $linha->estado = 1;
        $linha->save();
        $stock->save();

        return $this->redirect(['view', 'idCarrinho' => $linha->id_carrinho]);
    }

    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idCarrinho Id Carrinho
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCarrinho)
    {
        if (($model = Carrinho::findOne(['idCarrinho' => $idCarrinho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

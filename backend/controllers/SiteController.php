<?php

namespace backend\controllers;

use app\models\User;
use backend\models\AuthAssignment;
use common\models\Carrinho;
use common\models\LoginForm;
use common\models\Produto;
use common\models\Utilizador;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends BaseAuthController
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'logout'],
                        'allow' => true,
                        'roles' => [],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['Admin','Gestor', 'Funcionario'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $idLoja = \common\models\Utilizador::findOne(Yii::$app->user->id)->id_loja ?? null;

        $count_clientes = Utilizador::getCount();

        $countCarrinhos = Carrinho::getCount();

        $produto = Produto::getTop();

        if($idLoja != null){
            $encomendas_pendentes = Carrinho::find()->where(['estado' => 'emProcessamento'])->andWhere(['id_loja' => $idLoja])->count();
            $carrinhos = Carrinho::find()->where(['estado' => 'emProcessamento'])->andWhere(['id_loja' => $idLoja])->all();
        }
        else{
            $encomendas_pendentes = Carrinho::find()->where(['estado' => 'emProcessamento'])->count();
            $carrinhos = Carrinho::find()->where(['estado' => 'emProcessamento'])->all();
        }

        $carrinhos = array_filter($carrinhos, function ($carrinho) {
            return $carrinho->getLinhacarrinhos()->where(['estado' => 0])->count() > 0;
        });
        $emFalta = array_values($carrinhos);

        return $this->render('index', [
            'idLoja' => $idLoja ?? \common\models\Loja::find()->where('ativo = 1')->one()->idLoja,
            'count_clientes' => $count_clientes,
            'count_carrinhos' => $countCarrinhos,
            'most_sold_product' => $produto->nome ?? 'Nenhum produto vendido',
            'encomendas_pendentes' => $encomendas_pendentes,
            'emFalta' => $emFalta
            ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(!Yii::$app->user->can("backend")){
                Yii::$app->user->logout();
                Yii::$app->session->setFlash('error', 'Não tem permissão para aceder a esta área.');
            }
            $this->redirect(['site/index']);
            return null;
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}

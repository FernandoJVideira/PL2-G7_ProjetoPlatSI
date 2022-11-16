<?php

namespace backend\controllers;

use app\models\User;
use backend\models\AuthAssignment;
use common\models\LoginForm;
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
        $count_clientes = AuthAssignment::find()->where(['item_name' => 'Cliente'])->innerJoin('user', 'auth_assignment.user_id = user.id')->andWhere('status ='. \common\models\User::STATUS_ACTIVE)->count();
        return $this->render('index', ['count_clientes' => $count_clientes]);
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

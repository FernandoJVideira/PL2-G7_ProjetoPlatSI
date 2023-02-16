<?php

namespace backend\controllers;

use backend\models\ChangePasswordForm;
use common\models\User;
use app\models\UserSearch;
use common\models\Utilizador;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseAuthController
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
    public function actionUpdate($id)
    {
        $role = Utilizador::getPerfil($id);
        if(Yii::$app->user->id != $id)
            if(!Yii::$app->user->can('update'.$role))
            {
                $this->showMessage('Não tem permissões para aceder a esta página.');
            }

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['utilizador/view', 'idUser' => \common\models\Utilizador::findOne($model->id)->id_user, 'role' => $role]);
        }
        $user = $model;
        $utilizador = Utilizador::findOne(['idUser' => $id]);
        return $this->render('//utilizador/view', [
            'model' => $utilizador,
            'user' => $user,
        ]);
    }

    public function actionPassword()
    {
        $model = new ChangePasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePassword()) {
            Yii::$app->session->setFlash('success', 'Password alterada com sucesso!');
            return $this->redirect(['index']);
        }

        return $this->render('changepassword', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

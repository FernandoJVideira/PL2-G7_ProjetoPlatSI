<?php

namespace frontend\controllers;

use common\models\User;
use common\models\Utilizador;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function actionUpdate($id)
    {
        $role = Utilizador::getPerfil($id);
        if(Yii::$app->user->id != $id)
        {
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
        }

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['utilizador/view', 'idUser' => \common\models\Utilizador::findOne($model->id)->id_user]);
        }
        $user = $model;
        $utilizador = Utilizador::findOne(['idUser' => $id]);
        return $this->render('//utilizador/view', [
            'model' => $utilizador,
            'user' => $user,
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
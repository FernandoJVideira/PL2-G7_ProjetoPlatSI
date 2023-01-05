<?php

namespace frontend\controllers;

use common\models\AuthItem;
use common\models\Loja;
use common\models\User;
use common\models\Utilizador;
use common\models\UtilizadorSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * UtilizadorController implements the CRUD actions for Utilizador model.
 */
class UtilizadorController extends Controller
{
    /**
     * Displays a single Utilizador model.
     * @param int $idUser Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUser)
    {
        if(Yii::$app->user->id != $idUser){
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $model = $this->findModel($idUser);

        return $this->render('view', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing Utilizador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUser Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUser)
    {
        if(Yii::$app->user->id != $idUser){
            Yii::$app->session->setFlash('error', 'Não tem permissões para aceder a esta página.');
            return $this->redirect(['site/index']);
        }

        $model = $this->findModel($idUser);

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save())
                return $this->redirect(['view', 'idUser' => $model->idUser]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Utilizador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUser Id User
     * @return Utilizador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUser)
    {
        if (($model = Utilizador::findOne(['idUser' => $idUser])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use common\models\Morada;
use common\models\Utilizador;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MoradaController implements the CRUD actions for Morada model.
 */
class MoradaController extends BaseAuthController
{

    public function actionUpdate($idMorada)
    {
        if(!$this->checkAccess('delete', null, 'Morada'))
            $this->noAccess('Não tem permissões para aceder a esta página.');

        $model = $this->findModel($idMorada);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {

            if($model->id_user == null)
                $this->showMessage('Morada atualizada com sucesso.', 'success');
            else{
                $idUser = $model->id_user;
                return $this->redirect(['utilizador/view', 'idUser' => $idUser, 'role' => Utilizador::getPerfil($idUser)]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Morada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idMorada Id Morada
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idMorada)
    {
        if(!$this->checkAccess('delete', null, 'Morada'))
            $this->noAccess('Não tem permissões para aceder a esta página.');


        $morada = $this->findModel($idMorada);
        $idUser = $morada->id_user;

        if($morada->id_user == null || $morada->countMoradasUser($morada->id_user) == 1)
            $this->noAccess('Não tem permissões para concluir esta ação.');


        $morada->delete();

        return $this->redirect(['utilizador/view', 'idUser' => $idUser, 'role' => Utilizador::getPerfil($idUser)]);
    }

    /**
     * Finds the Morada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idMorada Id Morada
     * @return Morada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idMorada)
    {
        if (($model = Morada::findOne(['idMorada' => $idMorada])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

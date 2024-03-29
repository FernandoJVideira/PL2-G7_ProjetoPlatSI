<?php

namespace backend\controllers;

use common\models\Morada;
use common\models\Utilizador;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MoradaController implements the CRUD actions for Morada model.
 */
class MoradaController extends BaseAuthController
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

    public function actionUpdate($idMorada)
    {
        $model = $this->findModel($idMorada);

        if(Utilizador::getPerfil($model->id_user) != 'Cliente')
            if(Yii::$app->user->id != $model->id_user)
                if(!Yii::$app->user->can('updateMorada'))
                    $this->showMessage('Não tem permissões para aceder a esta página.');



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

        $morada = $this->findModel($idMorada);
        $idUser = $morada->id_user;

        if(Utilizador::getPerfil($morada->id_user) != 'Cliente')
            if(Yii::$app->user->id != $idUser)
                if(!Yii::$app->user->can('updateMorada'))
                    $this->showMessage('Não tem permissões para aceder a esta página.');


        if($morada->id_user == null || $morada->countMoradasUser($morada->id_user) == 1)
            $this->showMessage('Não tem permissões para concluir esta ação.');


        $morada->estado = 0;
        $morada->save();

        return $this->redirect(['utilizador/view', 'idUser' => $idUser, 'role' => Utilizador::getPerfil($idUser)]);
    }

    public function actionCreate($idUser)
    {
        if(Utilizador::getPerfil($idUser) != 'Cliente')
            if(Yii::$app->user->id != $idUser)
                if(!Yii::$app->user->can('createMorada'))
                    $this->showMessage('Não tem permissões para aceder a esta página.');

        $model = new Morada();

        if ($this->request->isPost) {
            if($idUser != null){
                $model->id_user = $idUser;
                if($model->load($this->request->post()) && $model->save()){
                    return $this->redirect(['utilizador/view', 'idUser' => $idUser, 'role' => Utilizador::getPerfil($idUser)]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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

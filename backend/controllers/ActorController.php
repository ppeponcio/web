<?php

namespace backend\controllers;

use Yii;
use app\models\Actor;
use app\models\ActorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * ActorController implements the CRUD actions for Actor model.
 */
class ActorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Actor models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(Yii::$app ->user->can('ver-actor')){
          $searchModel = new ActorSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

          return $this->render('index', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
          ]);
        }else{
          throw new ForbiddenHttpException;

        }
    }

    /**
     * Displays a single Actor model.
     * @param integer $idPelicula
     * @param integer $idPersona
     * @return mixed
     */
    public function actionView($idPelicula, $idPersona)
    {

      if(Yii::$app ->user->can('ver-actor')){
        return $this->render('view', [
            'model' => $this->findModel($idPelicula, $idPersona),
        ]);
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Creates a new Actor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

      if(Yii::$app ->user->can('crear-actor')){
        $model = new Actor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPelicula' => $model->idPelicula, 'idPersona' => $model->idPersona]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Updates an existing Actor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPelicula
     * @param integer $idPersona
     * @return mixed
     */
    public function actionUpdate($idPelicula, $idPersona)
    {

      if(Yii::$app ->user->can('editar-actor')){
        $model = $this->findModel($idPelicula, $idPersona);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPelicula' => $model->idPelicula, 'idPersona' => $model->idPersona]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Deletes an existing Actor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPelicula
     * @param integer $idPersona
     * @return mixed
     */
    public function actionDelete($idPelicula, $idPersona)
    {

      if(Yii::$app ->user->can('borrar-actor')){
        $this->findModel($idPelicula, $idPersona)->delete();

        return $this->redirect(['index']);
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Finds the Actor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPelicula
     * @param integer $idPersona
     * @return Actor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPelicula, $idPersona)
    {
        if (($model = Actor::findOne(['idPelicula' => $idPelicula, 'idPersona' => $idPersona])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

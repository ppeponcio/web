<?php

namespace backend\controllers;

use Yii;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(Yii::$app ->user->can('ver-persona')){
        $searchModel = new PersonaSearch();
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
     * Displays a single Persona model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      if(Yii::$app ->user->can('ver-persona')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
      }else{
        throw new ForbiddenHttpException;

      }
    }

    /**
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app ->user->can('crear-persona')){
        $model = new Persona();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPersona]);
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
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app ->user->can('editar-persona')){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPersona]);
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
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if(Yii::$app ->user->can('borrar-persona')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
      }else{
        throw new ForbiddenHttpException;

      }
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

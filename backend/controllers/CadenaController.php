<?php

namespace backend\controllers;

use Yii;
use app\models\Cadena;
use app\models\CadenaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * CadenaController implements the CRUD actions for Cadena model.
 */
class CadenaController extends Controller
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
     * Lists all Cadena models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(Yii::$app ->user->can('ver-cadena')){
        $searchModel = new CadenaSearch();
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
     * Displays a single Cadena model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

      if(Yii::$app ->user->can('ver-cadena')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Creates a new Cadena model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app ->user->can('crear-cadena')){
        $model = new Cadena();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCadena]);
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
     * Updates an existing Cadena model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

      if(Yii::$app ->user->can('editar-cadena')){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idCadena]);
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
     * Deletes an existing Cadena model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if(Yii::$app ->user->can('borrar-cadena')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
      }else{
        throw new ForbiddenHttpException;

      }

    }

    /**
     * Finds the Cadena model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cadena the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cadena::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

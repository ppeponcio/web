<?php

namespace backend\controllers;

use Yii;
use app\models\Precio;
use app\models\PrecioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * PrecioController implements the CRUD actions for Precio model.
 */
class PrecioController extends Controller
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
     * Lists all Precio models.
     * @return mixed
     */
    public function actionIndex()
    {
      if(Yii::$app ->user->can('ver-precio')){
        $searchModel = new PrecioSearch();
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
     * Displays a single Precio model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      if(Yii::$app ->user->can('ver-precio')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
      }else{
        throw new ForbiddenHttpException;

      }
    }

    /**
     * Creates a new Precio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      if(Yii::$app ->user->can('crear-precio')){
        $model = new Precio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPrecio]);
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
     * Updates an existing Precio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      if(Yii::$app ->user->can('editar-precio')){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPrecio]);
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
     * Deletes an existing Precio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      if(Yii::$app ->user->can('borrar-precio')){
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
      }else{
        throw new ForbiddenHttpException;

      }
    }

    /**
     * Finds the Precio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Precio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Precio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

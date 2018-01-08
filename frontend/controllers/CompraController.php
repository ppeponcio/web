<?php

namespace frontend\controllers;

use Yii;
use app\models\form\CompraForm;
use app\models\Compra;
use app\models\Presentacion;
use app\models\CompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['create', 'delete','view','index'],
              'rules' => [
                  [
                      'actions' => ['create'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                  [
                      'actions' => ['delete'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                  [
                      'actions' => ['view'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                  [
                      'actions' => ['index'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($idPresentacion)
     {
        $timedate = new \DateTime('now');
        $time = $timedate->format('H:i:s');
        $today = $timedate->format('Y-m-d');
         if ((($presentacion = Presentacion::findOne($idPresentacion)) !== null) && ($presentacion->fecha>$today || (($presentacion->fecha==$today) && ($presentacion->idHorario0->horaInicio>=$time)))) {
           $model = new CompraForm();
           $model->compra = new Compra;
           $model->compra->loadDefaultValues();
           $model->setAttributes(Yii::$app->request->post());
           //veo que se pase el parametro
           $model->compra->idPresentacion=Yii::$app->getRequest()->getQueryParam('idPresentacion');

           if (Yii::$app->request->post() && $model->save()) {
               Yii::$app->getSession()->setFlash('success', 'Compra has been created.');
               return $this->redirect(['index']);
           }
           return $this->render('create', ['model' => $model]);
         } else {
             throw new NotFoundHttpException('The requested page does not exist.');
         }

     }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

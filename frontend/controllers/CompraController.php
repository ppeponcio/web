<?php
namespace frontend\controllers;

use app\models\form\CompraForm;
use app\models\Compra;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;

class CompraController extends Controller
{
    public function actionCreate()
    {
        $model = new CompraForm();
        $model->compra = new Compra;
        $model->compra->loadDefaultValues();
        $model->setAttributes(Yii::$app->request->post());

        if (Yii::$app->request->post() && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Compra has been created.');
            return $this->redirect(['create']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = new CompraForm();
        $model->compra = $this->findModel($id);
        $model->setAttributes(Yii::$app->request->post());

        if (Yii::$app->request->post() && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Compra has been updated.');
            return $this->redirect(['update', 'id' => $model->compra->idCompra]);
        }
        return $this->render('update', ['model' => $model]);
    }

    protected function findModel($id)
    {
        if (($model = Compra::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }
}

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Pelicula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelicula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tituloPelicula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracion')->textInput() ?>

    <?= $form->field($model, 'sinopsis')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaEstreno')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2017-01-01'],'dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'idGenero')->dropDownList($model->comboGenero)?>

    <?= $form->field($model, 'idDirector')->dropDownList($model->comboDirector)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

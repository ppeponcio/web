<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPelicula')->dropDownList($model->comboPelicula)?>

    <?= $form->field($model, 'idSala')->dropDownList($model->comboSala)?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => '2017-01-01'],'dateFormat' => 'yyyy-MM-dd']) ?>

    <?= $form->field($model, 'idHorario')->dropDownList($model->comboHorario)?>

    <?= $form->field($model, 'idIdioma')->dropDownList($model->comboIdioma)?>

    <?= $form->field($model, 'idFormato')->dropDownList($model->comboFormato)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

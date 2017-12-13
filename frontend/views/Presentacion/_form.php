<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPelicula')->textInput() ?>

    <?= $form->field($model, 'idSala')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'idHorario')->textInput() ?>

    <?= $form->field($model, 'idIdioma')->textInput() ?>

    <?= $form->field($model, 'idFormato')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

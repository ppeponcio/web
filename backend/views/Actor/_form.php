<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Actor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPelicula')->dropDownList($model->comboPelicula)?>

    <?= $form->field($model, 'idPersona')->dropDownList($model->comboPersona)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fila */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fila-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreFila')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idSala')->dropDownList($model->comboSala)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

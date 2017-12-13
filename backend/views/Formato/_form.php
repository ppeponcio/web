<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Formato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreFormato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idPrecio')->dropDownList($model->comboPrecio)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

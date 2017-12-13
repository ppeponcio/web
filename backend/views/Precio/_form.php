<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Precio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="precio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombrePrecio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valorPrecio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

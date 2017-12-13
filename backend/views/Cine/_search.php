<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCine') ?>

    <?= $form->field($model, 'nombreCine') ?>

    <?= $form->field($model, 'direccionCine') ?>

    <?= $form->field($model, 'idCadena') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

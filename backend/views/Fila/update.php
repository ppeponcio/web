<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fila */

$this->title = 'Update Fila: ' . $model->idFila;
$this->params['breadcrumbs'][] = ['label' => 'Filas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFila, 'url' => ['view', 'id' => $model->idFila]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fila-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

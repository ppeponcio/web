<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Precio */

$this->title = 'Update Precio: ' . $model->idPrecio;
$this->params['breadcrumbs'][] = ['label' => 'Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPrecio, 'url' => ['view', 'id' => $model->idPrecio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="precio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

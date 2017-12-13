<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cine */

$this->title = 'Update Cine: ' . $model->idCine;
$this->params['breadcrumbs'][] = ['label' => 'Cines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCine, 'url' => ['view', 'id' => $model->idCine]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

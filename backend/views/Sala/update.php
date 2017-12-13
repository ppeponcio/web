<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sala */

$this->title = 'Update Sala: ' . $model->idSala;
$this->params['breadcrumbs'][] = ['label' => 'Salas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSala, 'url' => ['view', 'id' => $model->idSala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

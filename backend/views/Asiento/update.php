<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asiento */

$this->title = 'Update Asiento: ' . $model->idAsiento;
$this->params['breadcrumbs'][] = ['label' => 'Asientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAsiento, 'url' => ['view', 'id' => $model->idAsiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

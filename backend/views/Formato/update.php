<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formato */

$this->title = 'Update Formato: ' . $model->idFormato;
$this->params['breadcrumbs'][] = ['label' => 'Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFormato, 'url' => ['view', 'id' => $model->idFormato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

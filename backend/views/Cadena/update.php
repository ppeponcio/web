<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cadena */

$this->title = 'Update Cadena: ' . $model->idCadena;
$this->params['breadcrumbs'][] = ['label' => 'Cadenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCadena, 'url' => ['view', 'id' => $model->idCadena]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cadena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

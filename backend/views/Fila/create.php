<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fila */

$this->title = 'Create Fila';
$this->params['breadcrumbs'][] = ['label' => 'Filas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fila-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

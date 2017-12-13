<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Asiento */

$this->title = 'Create Asiento';
$this->params['breadcrumbs'][] = ['label' => 'Asientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cadena */

$this->title = 'Create Cadena';
$this->params['breadcrumbs'][] = ['label' => 'Cadenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

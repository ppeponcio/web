<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fila */

$this->title = $model->idFila;
$this->params['breadcrumbs'][] = ['label' => 'Filas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fila-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idFila], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idFila], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idFila',
            'idSala0.nombreSala',
            'nombreFila',

        ],
    ]) ?>

</div>

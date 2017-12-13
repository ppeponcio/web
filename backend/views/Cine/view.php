<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cine */

$this->title = $model->idCine;
$this->params['breadcrumbs'][] = ['label' => 'Cines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cine-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCine], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCine], [
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
            'idCadena0.nombreCadena',
            'nombreCine',
            'direccionCine',

        ],
    ]) ?>

</div>

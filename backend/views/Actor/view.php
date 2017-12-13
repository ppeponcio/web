<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Actor */

$this->title = $model->idPelicula;
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPelicula' => $model->idPelicula, 'idPersona' => $model->idPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPelicula' => $model->idPelicula, 'idPersona' => $model->idPersona], [
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
          'idPelicula0.tituloPelicula',
          [
                'label' => 'Actor',
                'attribute' => 'idPersona0.fullName',
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */

$this->title = $model->idPresentacion;
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPresentacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPresentacion], [
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
          //'idPresentacion',
          'idPelicula0.tituloPelicula',
          'idSala0.nombreSala',
          'fecha',
          'idHorario0.nombreHorario',
          'idIdioma0.nombreIdioma',
          'idFormato0.nombreFormato',
        ],
    ]) ?>

</div>

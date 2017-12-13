<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cadena */

$this->title = $model->idCadena;
$this->params['breadcrumbs'][] = ['label' => 'Cadenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadena-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCadena], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCadena], [
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
            //'idCadena',
            'nombreCadena',
            'numeroContacto',
        ],
    ]) ?>

</div>

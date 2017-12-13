<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formato */

$this->title = $model->idFormato;
$this->params['breadcrumbs'][] = ['label' => 'Formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formato-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idFormato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idFormato], [
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
            //'idFormato',
            'nombreFormato',
            'idPrecio0.nombrePrecio',
        ],
    ]) ?>

</div>

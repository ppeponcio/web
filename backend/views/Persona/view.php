<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->idPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPersona], [
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
            //'idPersona',
            'nombrePersona',
            'apellidoPersona',
            [
                  'label' => 'Rol',
                  'attribute' => 'director',
                  'filter' => [
                      '1' => 'Director',
                      '0' => 'Actor'
                  ],
                  // translate lookup value
                  'value' => function ($model) {
                    $director = [
                      '1' => 'Director',
                      '0' => 'Actor'
                    ];
                    return $director[$model->director];
                  }
              ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Idioma */

$this->title = $model->idIdioma;
$this->params['breadcrumbs'][] = ['label' => 'Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idioma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idIdioma], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idIdioma], [
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
            //'idIdioma',
            'nombreIdioma',
            [
                  'label' => 'Subtitulos',
                  'attribute' => 'subtitulos',
                  'filter' => [
                      '1' => 'Si ',
                      '0' => 'No'
                  ],
                  // translate lookup value
                  'value' => function ($model) {
                    $idioma = [
                      '1' => 'Si',
                      '0' => 'No'
                    ];
                    return $idioma[$model->subtitulos];
                  }
              ],
        ],
    ]) ?>

</div>

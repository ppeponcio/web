<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IdiomaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Idiomas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idioma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Idioma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

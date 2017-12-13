<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

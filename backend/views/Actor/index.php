<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Actor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPelicula0.tituloPelicula',
            [
                  'label' => 'Actor',
                  'attribute' => 'idPersona0.fullName',
              ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

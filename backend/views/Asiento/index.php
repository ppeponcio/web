<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idAsiento',
            'idFila0.nombreFila',
            'nombreSiento',
            //'idFila',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

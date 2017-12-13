<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CadenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadenas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cadena-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cadena', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idCadena',
            'nombreCadena',
            'numeroContacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

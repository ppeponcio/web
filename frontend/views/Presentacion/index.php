<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresentacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Presentacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Presentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPresentacion',
            'idPelicula0.tituloPelicula',
            'idSala0.nombreSala',
            'fecha',
            'idHorario0.nombreHorario',
            'idIdioma0.nombreIdioma',
            'idFormato0.nombreFormato',
            //'idPelicula0.poster',
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {compra}',
              'buttons' => [
                'compra' => function($url, $model, $key) {
                    return Html::a(
                      'Comprar',
                      ['compra/create', 'idPresentacion' => $key],
                      [
                          'title' => 'Download',
                          'data-pjax' => '0',
                      ]
                    );
                }
              ]
            ],
        ],
    ]); ?>
</div>

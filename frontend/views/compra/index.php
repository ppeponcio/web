<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--
    <p>
        <?= Html::a('Create Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idCompra',
            'idPresentacion0.idPelicula0.tituloPelicula',
            'idPresentacion0.idIdioma0.nombreIdioma',
            'idPresentacion0.fecha',
            'idPresentacion0.idHorario0.nombreHorario',
            'idPresentacion0.idSala0.nombreSala',
            ['attribute' => 'Tickets',
             'value' => function($model){
                $items = [];
                foreach($model->tickets as $ticket){
                    $items[] = $ticket->idAsiento0->idFila0->nombreFila.$ticket->idAsiento0->nombreSiento;
                }
                return implode(', ', $items);
             }],
            //'cantidad',
            'subtotalCompra',
            //'idUsuario',

            // 'createdAt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

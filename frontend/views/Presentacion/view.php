<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Presentacion */

$this->title = $model->idPresentacion;
$this->params['breadcrumbs'][] = ['label' => 'Presentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presentacion-view">
  <!--
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPresentacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPresentacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
  -->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idPresentacion',
            ['label' => 'Titulo',
              'attribute' => 'idPelicula0.tituloPelicula',
            ],
            'idPelicula0.sinopsis',
            //'idPelicula0.path',
            ['label' => 'Sala',
              'attribute' => 'idSala0.nombreSala',
            ],
            [
                'label' => 'Poster',
                'attribute'=>'idPelicula0.path',
                'value'=> '/'.$model->idPelicula0->path,
                'format' => ['image',['width'=>'120']],
            ],
            ['label' => 'Cadena',
              'attribute' => 'idSala0.idCine0.idCadena0.nombreCadena',
            ],
            ['label' => 'Cine',
              'attribute' => 'idSala0.idCine0.nombreCine',
            ],
            ['label' => 'Direccion',
              'attribute' => 'idSala0.idCine0.direccionCine',
            ],
            'fecha',
            ['label' => 'Horario',
              'attribute' => 'idHorario0.nombreHorario',
            ],
            ['label' => 'Idioma',
              'attribute' => 'idIdioma0.nombreIdioma',
            ],
            ['label' => 'Subitulada',
            'format'=>'raw',
              'value' => function($model, $key) { return $model->idIdioma0->subtitulos == 0 ? 'No' : 'Si';},
            ],
            ['label' => 'Formato',
              'attribute' => 'idFormato0.nombreFormato',
            ],
            ['label' => 'Precio',
              'attribute' => 'idFormato0.idPrecio0.valorPrecio',
            ],
        ],
    ]) ?>

</div>

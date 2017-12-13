<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Tampico Cines',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
      if(Yii::$app->user->can('ver-actor')){
          $menuItems[] = ['label' => 'Actores', 'url' => ['/actor/index']];
      }
      if(Yii::$app->user->can('ver-asiento')){
          $menuItems[] = ['label' => 'Asientos', 'url' => ['/asiento/index']];
      }
      if(Yii::$app->user->can('ver-cadena')){
        $menuItems[] = ['label' => 'Cadena Cines', 'url' => ['/cadena/index']];
      }
      if(Yii::$app->user->can('ver-cine')){
          $menuItems[] = ['label' => 'Cines', 'url' => ['/cine/index']];
      }
      if(Yii::$app->user->can('ver-fila')){
          $menuItems[] = ['label' => 'Filas de Asientos', 'url' => ['/fila/index']];
      }
      if(Yii::$app->user->can('ver-formato')){
          $menuItems[] = ['label' => 'Formatos', 'url' => ['/formato/index']];
      }
      if(Yii::$app->user->can('ver-genero')){
          $menuItems[] = ['label' => 'Generos', 'url' => ['/genero/index']];
      }
      if(Yii::$app->user->can('ver-idioma')){
          $menuItems[] = ['label' => 'Idiomas', 'url' => ['/idioma/index']];
      }
      if(Yii::$app->user->can('ver-pelicula')){
          $menuItems[] = ['label' => 'Peliculas', 'url' => ['/pelicula/index']];
      }
      if(Yii::$app->user->can('ver-persona')){
          $menuItems[] = ['label' => 'Personas', 'url' => ['/persona/index']];
      }
      if(Yii::$app->user->can('ver-presentacion')){
          $menuItems[] = ['label' => 'Presentaciones', 'url' => ['/presentacion/index']];
      }
      if(Yii::$app->user->can('ver-precio')){
          $menuItems[] = ['label' => 'Precios', 'url' => ['/precio/index']];
      }
      if(Yii::$app->user->can('ver-sala')){
        $menuItems[] = ['label' => 'Salas de Cine', 'url' => ['/sala/index']];
      }

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

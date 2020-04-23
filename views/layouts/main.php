<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    //'class' => 'navbar-inverse navbar-fixed-top', 
                    'class' => 'navbar navbar-expand-lg navbar-dark bg-dark fixed-top',
                ],
            ]);
            ?>

            <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                        [
                        'label' => 'Home',
                        'url' => ['site/index'],
                    ],
                        [
                        'label' => 'DataTables',
                        'items' => [
                                ['label' => 'Basic Table', 'url' => ['/site/basic']],
                                ['label' => 'Scrollable Table', 'url' => ['/site/scroll']],
                                ['label' => 'Ajax DataTable', 'url' => ['/site/ajax']],
                                ['label' => 'Search Options Column Search', 'url' => ['/site/datatable']],
                                ['label' => 'Buttons', 'url' => ['/site/buttons']],
                        ]
                    ],
                    [
                        'label' => 'Prodcuts',
                        'items' => [
                                ['label' => 'Basic Table', 'url' => ['/product/index']],
                                ['label' => 'DataTables', 'url' => ['/product/index2']],
//                                ['label' => 'Ajax DataTable', 'url' => ['/site/ajax']],
//                                ['label' => 'Search Options Column Search', 'url' => ['/site/datatable']],
//                                ['label' => 'Buttons', 'url' => ['/site/buttons']],
                        ]
                    ],
                        [
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'visible' => Yii::$app->user->isGuest
                    ],
                ],
//                'options' => ['class' => 'navbar-pills'],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?php //echo date('Y')     ?></p>
    
                <p class="pull-right"><?php //Yii::powered()     ?></p>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>

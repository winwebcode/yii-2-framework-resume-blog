<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this)
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <? $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '@web/img/favicon.ico']); ?>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <?php $this->head() ?>
    </head>
    <body id="page-top">
<?php $this->beginBody() ?>

<!-- Navigation-->
<!--menu-->
<nav class="navbar navbar-expand-lg navbar-light bg-light h4">
    <a class="navbar-brand h4" href="<?= Url::to(['/admin']);?>">Админка</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Записи
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item h4" href="<?= Url::to(['/admin/post']);?>">Все записи</a>
                    <a class="dropdown-item h4" href="<?= Url::to(['/admin/post/create']);?>">Создать запись</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item h4" href="<?= Url::to(['/admin/category/']);?>">Управление категориями</a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">123 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>
<!--menu-->


<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block">
            <?= Html::img('@web/img/profile.jpg', ['alt' => '', 'class' => 'img-fluid img-profile rounded-circle mx-auto mb-2']); ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a target="_blank" class="nav-link js-scroll-trigger" href="<?= Url::to(['/blog']);?>">Управление </a></li>
            <li class="nav-item"><?= Html::a('Резюме', '/', ['class' =>'nav-link js-scroll-trigger']); ?></li>
            <li class="nav-item"><a target="_blank" class="nav-link js-scroll-trigger" href="<?= Url::to(['/site/contact-admin']);?>">Обратная связь</a></li>
            <?php if(Yii::$app->user->isGuest):?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= Url::to(['/site/login']);?>"><i class="fa fa-lock"></i>Авторизоваться</a></li>
            <?php else:?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= Url::to(['/site/logout']);?>"><i class="fa fa-user"></i><?= Yii::$app->user->identity['username'] . ' (Выйти)';?></a></li>
            <?php endif;?>
            <li class="nav-item"><a target="_blank" class="nav-link js-scroll-trigger" href="<?= Url::to(['/blog/']);?>">Посмотреть блог</a></li>

        </ul>
    </div>
</nav>

    <?= $content;?>

<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>



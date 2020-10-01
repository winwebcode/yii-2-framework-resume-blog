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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

<!--    <meta name="description" content="" />-->
<!--    <meta name="author" content="" />-->
<!--    <title>Resume - Start Bootstrap Theme</title>-->
    <? $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/yiiblog/web/img/favicon.ico']); ?>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block">
                <?= Html::img('@web/img/profile.jpg', ['alt' => '', 'class' => 'img-fluid img-profile rounded-circle mx-auto mb-2']); ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><?= Html::a('Главная', '/yiiblog/web/', ['class' =>'nav-link js-scroll-trigger']); ?></li>

        </ul>
    </div>
</nav>
<!-- Page Content-->
<div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">

                <span class="text-primary"></span>
            </h1>
            <div class="subheading mb-5">
                <?= $content ?>
                <?php
                //debuger($posts);
                //echo count($posts[0]->postAuthorID);
                //debuger($posts);

               foreach ($posts as $post) {
                    echo $post->post_title. '<br>';
                   $postauthor = $post->postAuthorID;
                    foreach ($postauthor as $loginauthor) {
                        echo $loginauthor->login; echo '1';
                    }
                }
                //print_r($posts);

                ?>

            </div>
            <p class="lead mb-5">           </p>
            <div class="social-icons">
                <a class="social-icon" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-github"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-twitter"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </section>
    <hr class="m-0" />



</div>
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
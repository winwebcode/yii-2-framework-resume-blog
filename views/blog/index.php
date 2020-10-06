<?php
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
/* @var $this yii\web\View */
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">
                <small>Блог</small>
            </h1>

            <!-- Blog Post -->
            <?php if (!empty($post_content)) :?>
            <?php foreach ($post_content as $posts) :?>
            <div class="card mb-4">
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title"><?= $posts->post_name;?></h2>
                    <p class="card-text"><?= $posts->post_content; ?></p>
                    <a class="btn btn-primary" href="<?= Url::to(['blog/view', 'postname' => $posts->post_name]); ?>">Читать далее</a>
                </div>
                <div class="card-footer text-muted">
                    <?= $posts->created_at;?>
                    <!--<a href="#">Author</a>-->
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>


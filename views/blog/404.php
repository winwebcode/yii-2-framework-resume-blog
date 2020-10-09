<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
?>

<!-- Page Content -->
<div class="container ">
    <div class="d-flex justify-content-center">

        <?php echo Html::img('@web/img/404.png', ['alt' => '', 'class' => '']); ?>
    </div><br><br>
    <div class="alert alert-danger">
        <h4>Уважаемый, <?php echo $username;?>, запрашиваемая вами страница недоступна или удалена. <?= Html::a('Вернуться на главную', '/'); ?></h4>
    </div>
</div>
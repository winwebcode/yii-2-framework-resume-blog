<?php
use yii\helpers\Html;
use yii\helpers\Url;
//debuger($getAvatar);
//echo Html::img("$getAvatar->avatar", ['alt' => '', 'class' => 'img-fluid img-profile rounded-circle mx-auto mb-2', 'height' => 80, 'width'=> 80]);
?>
<a href="<?= Url::to(['/site/upload']);?>">
    <?= Html::img("$getAvatar->avatar", ['alt' => '', 'class' => 'img-fluid img-profile rounded-circle mx-auto mb-2', 'height' => 80, 'width'=> 80]);?>
</a>

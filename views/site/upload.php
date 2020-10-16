<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<?
if(Yii::$app->session->hasFlash('success')) {?>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>


    <?php
} else { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
    <?php
}
?>

<div class="post-form container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?//= $form->field($getAvatar, 'avatar')->input($getAvatar->avatar); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end() ?>


</div>








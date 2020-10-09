<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'created_at')->textInput(['value' => Yii::$app->formatter->asDatetime($model->created_at, 'php:y-m-d H:i:s')]) */?>
    <?/*= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::classname(), [
        'dateFormat' => 'php:y-m-d H:i:s',
    ]) */?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

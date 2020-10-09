<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form container">

    <?php $form = ActiveForm::begin();
debuger($getCategory);
   foreach ($getCategory as $category) {
        //$items = [$category->category_id => $category->category_name];
$items[] = $category->category_name;
    }
    ?>

    <?= $form->field($model, 'post_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descriptions')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'category_id')->dropDownList([$getCategory->category_name]); ?>
    <?= $form->field($model, 'category_id')->dropDownList([$items]); ?>

    <?/*= $form->field($model, 'created_at')->widget(\yii\jui\DatePicker::classname(), [
        'dateFormat' => 'php:y-m-d H:i:s',
    ]) */?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

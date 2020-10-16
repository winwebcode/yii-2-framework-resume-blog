<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form container">
<?//php debuger($show_category);?>
    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'category_id')->textInput() ?>

    <?/*= $form->field($model, 'parent_category_id')->textInput() */?>

    <?php //category_id - значения options, category_name для именований?>
    <?= $form->field($model, 'parent_category_id')->dropDownList(ArrayHelper::map($show_category, 'category_id', 'category_name')) ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

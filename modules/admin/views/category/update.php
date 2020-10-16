<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Обновить категорию: ' . $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update container">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'show_category' => $show_category,
    ]) ?>

</div>

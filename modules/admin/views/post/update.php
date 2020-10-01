<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = 'Update Post: ' . $model->id_posts;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_posts, 'url' => ['view', 'id' => $model->id_posts]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

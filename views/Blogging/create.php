<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogging */

$this->title = 'Create Blogging';
$this->params['breadcrumbs'][] = ['label' => 'Bloggings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogging-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BloggingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bloggings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blogging-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blogging', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'post_id',
            'post_author_id',
            'post_date',
            'post_content:ntext',
            'post_title:ntext',
            'post_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

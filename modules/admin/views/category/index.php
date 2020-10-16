<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index container">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id',
            //'parent_category_id',
           [
                'attribute' => 'parent_category_id',
                'value' => function($dataProvider) {

                    if (!empty($dataProvider->parent_category_id)) {
                        $num = $dataProvider->parent_category_id;
                        $cat_names = Category::find()->where(['category_id' => $num])->all();
                        foreach ($cat_names as $cat_name) {
                        }

                    return $cat_name->category_name;
                    }
                    else {
                        return 'Верхняя категория';
                    }
                },
                //'format' => 'html', //enable html
            ],
            'category_name',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

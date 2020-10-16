<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view container">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        //'cat_name' => $cat_name,
        'attributes' => [
            'category_id',
            //'parent_category_id',
           [
                'attribute' => 'parent_category_id',
                'value' => function($model) {
                    if (!empty($model->parent_category_id)) {
                        $num = $model->parent_category_id;
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
        ],
    ]) ?>

</div>

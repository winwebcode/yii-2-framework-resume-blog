<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property int|null $parent_category_id
 * @property string $category_name
 * @property string|null $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    public function getPost()
    {
        return $this->hasMany(Post::className(), ['parent_category' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'category_name'], 'required'],
            [['category_id', 'parent_category_id'], 'integer'],
            [['name'], 'string', 'max' => 70],
            [['description'], 'string', 'max' => 3000],
            [['category_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'parent_category_id' => 'Parent Category ID',
            'category_name' => 'Category Name',
            'description' => 'Description',
        ];
    }
}

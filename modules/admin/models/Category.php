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

  /*  public function getCategory()
    {
        return $this->hasOne(Category::className(), ['parent_category_id' => 'category_name']);
    }*/

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['parent_category_id'], 'integer'],
            [['description'], 'string', 'max' => 3000],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'ID категории',
            'parent_category_id' => 'ID род. категория',
            'category_name' => 'Имя категории',
            'description' => 'Описание',
        ];
    }
}

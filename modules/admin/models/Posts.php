<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id_posts
 * @property string $title
 * @property string $article
 * @property string $postname
 * @property string|null $keywords
 * @property string|null $description
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'article', 'postname'], 'required'],
            [['article', 'keywords', 'description'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['postname'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_posts' => 'Id Posts',
            'title' => 'Title',
            'article' => 'Article',
            'postname' => 'Postname',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }
}

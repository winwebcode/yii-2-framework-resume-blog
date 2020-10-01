<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id_posts
 * @property string $post_title
 * @property string $post_content
 * @property string $post_name
 * @property string|null $keywords
 * @property string|null $descriptions
 * @property string $created_at
 */
class Post extends \yii\db\ActiveRecord
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
            [['post_title', 'post_content', 'post_name', 'created_at'], 'required'],
            [['post_content', 'keywords', 'descriptions'], 'string'],
            [['created_at'], 'safe'],
            [['post_title'], 'string', 'max' => 200],
            [['post_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_posts' => 'Id Posts',
            'post_title' => 'Post Title',
            'post_content' => 'Post Content',
            'post_name' => 'Post Name',
            'keywords' => 'Keywords',
            'descriptions' => 'Descriptions',
            'created_at' => 'Created At',
        ];
    }
}

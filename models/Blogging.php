<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $post_id
 * @property int $post_author_id
 * @property string $post_date
 * @property string $post_content
 * @property string $post_title
 * @property string $post_name
 */
class Blogging extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_author_id', 'post_date', 'post_content', 'post_title', 'post_name'], 'required'],
            [['post_author_id'], 'integer'],
            [['post_date'], 'safe'],
            [['post_content', 'post_title'], 'string'],
            [['post_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_author_id' => 'Post Author ID',
            'post_date' => 'Post Date',
            'post_content' => 'Post Content',
            'post_title' => 'Post Title',
            'post_name' => 'Post Name',
        ];
    }
}

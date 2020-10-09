<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\StringHelper;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\SluggableBehavior;

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
            [['post_title', 'post_content'], 'required'],
            [['post_content', 'keywords', 'descriptions'], 'string'],
            [['created_at'], 'safe'],
            [['post_title'], 'string', 'max' => 200],
            [['post_name'], 'string', 'max' => 100],
            [['post_name'], 'unique'],
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

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
            //generate postname use title
            'PostNameBehavior' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'post_title', // поле тайтла
                 'slugAttribute' => 'post_name', // поле URL
            ],

        ];
    }
}

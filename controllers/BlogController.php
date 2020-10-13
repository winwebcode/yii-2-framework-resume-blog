<?php

namespace app\controllers;

use app\models\Blog;
use app\modules\admin\models\Category;
use app\modules\admin\models\Post;
use Yii;

class BlogController extends AppController
{
    public $layout = "blog";
    public function actionIndex()
    {
        $post_content = Blog::find()->all();
        $this->setMeta('Resume Blog', 'keywords', 'description');
        return $this->render('index', compact('post_content'));
    }

    public function actionView($postname)
    {

        /*ЧПУ - имя поста*/
        $post_content = Blog::findOne(['post_name' => $postname]);
        $this->setMeta($post_content->post_title, $post_content->keywords, $post_content->descriptions);
        $username = $this->getUserName();

        if(empty($post_content)) {
            //throw new \yii\web\HttpException(404, 'Такой страницы у нас ещё нет.');
            $this->setMeta( "Ошибка 404", "Ошибка 404", "Ошибка 404");
            return $this->render('404', compact('username'));
        } else {
            return $this->render('single_post', compact('post_content', 'username'));
        }
    }

    public function getUserName()
    {
        if (Yii::$app->user->isGuest) {
            $username = "Гость";
        } else {
            $username = Yii::$app->user->identity['username'];
        }

        return $username;
    }
}

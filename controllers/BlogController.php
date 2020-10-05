<?php

namespace app\controllers;

use app\models\Blog;

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
        return $this->render('single_post', compact('post_content'));
    }

}

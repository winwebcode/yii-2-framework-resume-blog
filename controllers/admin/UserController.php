<?php

namespace app\controllers\admin;


use app\controllers\AppController;

class UserController extends AppController
{
    public function actionIndex()
    {
        //return 'Zdarova, Admin';
        return $this->render('index');
    }

    public function actionBlogPost()
    {
        //url - admin/user/blog-post
        return '123';
    }
}
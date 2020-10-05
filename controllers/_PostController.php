<?php


namespace app\controllers;

use app\models\Blog;
use Yii;

class PostController extends AppController
{

    public function actionTest()
    {
        $names = ['111', '222', '333'];
        $yiiapp=Yii::$app;
        //$this->debug($names);
        return $this->render('test', ['names'=>$names, 'yiiapp'=>Yii::$app]);
    }

    public function actionShow()
    {
        return $this->render('show');
    }

    public function actionArticles()
    {
        $getArticle = Blog::find()->all();
        return $this->render('show', compact('getArticle'));
    }

    public function actionBlogpost()
    {
        $this->actionArticles();
        $getArticle = Blog::findOne(['post_title' => $_POST]);
        return $this->render('show', compact('getArticle'));
    }

}
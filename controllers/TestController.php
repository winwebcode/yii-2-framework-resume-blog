<?php


namespace app\controllers;

class TestController extends AppController
{
    public $layout = 'simple';
    public function actionInform()
    {
        $this->view->title = 'Test';
        $this->view->registerMetaTag(['name'=>'keywords', 'content' => 'keys1, 2, 3']);
        $this->view->registerMetaTag(['name'=>'description', 'content' => 'descr...']);
        $message = 'Цена бензина в 2021 году -';
        $price = mt_rand(50,80) . ' р.';
        return $this->render('inform', ['message' =>$message, 'price' => $price]);
        //return '3 2 1';
    }

}
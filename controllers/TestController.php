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

    public function actionBubble()
    {

        $num = ['1','9','6', '8', '4'];
        do {
            $swaped = false;

            for ($i = 1; $i < count($num); $i++) {
                if ($num[$i - 1] > $num[$i]) {
                    $a = $num[$i - 1];
                    $num[$i - 1] = $num[$i];
                    $num[$i] = $a;
                    $swaped = true;
                }
            }
        } while ($swaped != false) ;
        return $this->render('inform', compact('swaped', 'num'));
    }
}
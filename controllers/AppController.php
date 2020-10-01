<?php


namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    //public $layout = 'resume';
    /*function __construct()
    {
        $bundle = $this->getAssetManager()->getBundle('app\modules\user\assets\AppAsset');
    }*/

    //seo meta tags
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    //print code
    public function debug($arr)
    {
        echo '<pre>' . print_r($arr,true) . '</pre>';
    }
}



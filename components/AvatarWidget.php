<?php


namespace app\components;

use app\models\User;
use yii\jui\Widget;
use Yii;

class AvatarWidget extends Widget
{

    public function init()
    {
        parent::init();
        /*if ($this->name === null) {
            $this->name = 'Гость';
        }*/
    }

    public function run()
    {
        if (Yii::$app->user->isGuest) {
            return false;
        }
        else {
            $username = Yii::$app->user->identity['username'];
        }
        $getAvatar = User::findOne(['username' => $username]);
        return $this->render('avatar', compact('getAvatar'));
    }
}

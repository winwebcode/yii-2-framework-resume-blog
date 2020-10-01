<?php


namespace app\models;


class UserTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

}
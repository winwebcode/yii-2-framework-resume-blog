<?php
/*
 * set useFileTransport' => false in web.php
 * edit params.php in dir config
 * */

namespace app\models;
use yii\base\Model;
use Yii;

class EmailForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $text;
    public $verifyCode;


    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'subject' => 'Заголовок',
            'text' => 'Сообщение',
            'verifyCode' => 'Verification Code',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'text', 'subject'], 'required', 'message' => 'Поле не может быть пустым'],
            [['name', 'email', 'text', 'subject'], 'trim'],
            ['email', 'email'],
            ['name', 'string', 'length' => [3,20]],
            ['name', 'validateCheckName'],
          //  ['verifyCode', 'captcha'],
        ];
    }

    public function validateCheckName($attr, $params)
    {
        if (in_array($this->$attr, ['admin', 'administrator'])) {
            $this->addError($attr, 'Такое имя не может быть задано');
        }
    }

    public function sendEmail($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->text)
                ->send();

            return true;
        }
        return false;
    }

}
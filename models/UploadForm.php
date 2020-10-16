<?php


namespace app\models;

use yii\web\UploadedFile;
use app\controllers\AppController;
use yii\base\Model;

class UploadForm extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $pathAvatar;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('@app/web/uploads/avatars/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->pathAvatar = "/web/uploads/avatars/$this->imageFile";
            return true;
        } else {
            return false;
        }
    }
}
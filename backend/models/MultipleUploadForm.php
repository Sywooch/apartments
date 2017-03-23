<?php


namespace backend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class MultipleUploadForm extends Model
{
    public $files;

    public function rules()
    {
        return [
            [['files'], 'file', 'extensions' => 'png ,jpg', 'maxFiles' => 10, 'skipOnEmpty' => false],
        ];
    }
}
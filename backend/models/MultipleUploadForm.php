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
            [['files'], 'file', 'extensions' => 'png ,jpg, JPEG', 'maxFiles' => 20, 'skipOnEmpty' => false],
        ];
    }
}
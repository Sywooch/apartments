<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;


class Image extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'image';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Фото',
            'apartment_id' => 'Квартира',
        ];
    }


    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }


    protected function getHash()
    {
        return md5($this->apartment_id . '-' . $this->id);
    }


    public function getPath()
    {
        return Yii::getAlias('@frontend/web/images/' . $this->getHash() . '.jpg');
    }


    public function getUrl()
    {
        return Yii::getAlias('@frontendWebroot/images/' . $this->getHash() . '.jpg');
    }

    public function afterDelete()
    {
        unlink($this->getPath());
        parent::afterDelete();
    }
}

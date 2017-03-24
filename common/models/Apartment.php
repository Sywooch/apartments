<?php

namespace common\models;

use Yii;

class Apartment extends \yii\db\ActiveRecord
{
//    public $address;
//    public $longitude;
//    public $latitude;

    public static function tableName()
    {
        return 'apartment';
    }

    public function rules()
    {
        return [
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'description_ua', 'description_en', 'coordinates', 'price_2', 'price_night', 'price_day', 'price_5', 'price_10', 'type', 'area'], 'required'],
            [['description_ru', 'description_ua', 'description_en', 'coordinates', 'latitude', 'longitude'], 'string'],
            [['stock'], 'integer'],
            [['price_2', 'price_night', 'price_day', 'price_5', 'price_10', 'apartment_area'], 'number'],
            [['title_ru', 'title_ua', 'title_en', 'area', 'room_count', 'bed_count', 'floor'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ru' => 'Заголовок (RU)',
            'title_ua' => 'Заголовок (UA)',
            'title_en' => 'Заголовок (EN)',
            'description_ru' => 'Описание (RU)',
            'description_ua' => 'Описание (UA)',
            'description_en' => 'Описание (EN)',
            'coordinates' => 'Местоположение',
            'stock' => 'Акционная',
            'price_2' => 'Цена за 2 часа',
            'price_night' => 'Цена за ночь',
            'price_day' => 'Цена за сутки',
            'price_5' => 'Цена от 5 суток',
            'price_10' => 'Цена от 10 суток',
            'room_count' => 'Количество комнат',
            'bed_count' => 'Количество спальных мест',
            'type' => 'Тип жилья',
            'area' => 'Район',
            'floor' => 'Этаж',
            'apartment_area' => 'Площадь',
        ];
    }

    public function getFacilities()
    {
        return $this->hasMany(Facilities::className(), ['apartment_id' => 'id']);
    }
}

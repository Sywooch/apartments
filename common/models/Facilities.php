<?php

namespace common\models;

use Yii;


class Facilities extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'facilities';
    }

    public function rules()
    {
        return [
            [['apartment_id', 'elevator', 'internet', 'animals', 'kitchen', 'gym', 'intercom', 'fireplace', 'waggon', 'heating', 'wifi', 'disabled', 'iron', 'drying_machine', 'family', 'parking', 'washer_machine', 'hair_dryer', 'tv', 'conditioner', 'cable_tv', 'smoke', 'separate_entrance'], 'integer'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Квартира',
            'elevator' => 'Лифт',
            'internet' => 'Интернет',
            'animals' => 'Можно с животными',
            'kitchen' => 'Кухня',
            'gym' => 'Спортивный зал',
            'intercom' => 'Домофон',
            'fireplace' => 'Камин',
            'waggon' => 'Вахтер',
            'heating' => 'Отопление',
            'wifi' => 'Wi-Fi',
            'disabled' => 'Подходит людям с ограниченными возможностями',
            'iron' => 'Утюг',
            'drying_machine' => 'Сушильная машина',
            'family' => 'Подходит для детей/семей',
            'parking' => 'Парковка',
            'washer_machine' => 'Стиральная машина',
            'hair_dryer' => 'Фен',
            'tv' => 'Телевизор',
            'conditioner' => 'Кондиционер',
            'cable_tv' => 'Кабельное телевидение',
            'smoke' => 'Можно курить',
            'separate_entrance' => 'Отдельный вход',
        ];
    }

    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }
}

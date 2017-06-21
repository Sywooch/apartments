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
            [['apartment_id', 'elevator', 'internet', 'wifi', 'iron', 'drying_machine', 'washer_machine', 'tv',
                'conditioner', 'smoke', 'separate_entrance', 'plazm_tv', 'fridge', 'balcony', 'door', 'gas', 'boiler',
                'laptop', 'jacuzzi', 'pool'], 'integer'],
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
            'wifi' => 'Wi-Fi',
            'iron' => 'Утюг',
            'drying_machine' => 'Сушильная машина',
            'washer_machine' => 'Стиральная машина',
            'tv' => 'Телевизор',
            'conditioner' => 'Кондиционер',
            'smoke' => 'Можно курить',
            'separate_entrance' => 'Отдельный вход',
            'plazm_tv' => 'Плазменный телевизор',
            'fridge' => 'Холодильник',
            'balcony' => 'Балкон',
            'door' => 'Бронедверь',
            'gas' => 'Газовая плита',
            'boiler' => 'Бойлер',
            'laptop' => 'Место для работы на ноутбуке',
            'jacuzzi' => 'Джакузи',
            'pool' => 'Бассейн'
        ];
    }

    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }
}

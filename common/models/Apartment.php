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
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'description_ua', 'description_en', 'coordinates',
                'price_2', 'price_night', 'price_day', 'price_5', 'price_10', 'type', 'area', 'guests', 'owner', 'phone',
                'room_count', 'floor'], 'required'],
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
            'guests' => 'Количество гостей',
            'apartment_area' => 'Площадь',
            'owner' => 'Владелец квартиры',
            'phone' => 'Телефон владельца квартиры'
        ];
    }

    public function getFacilities()
    {
        return $this->hasOne(Facilities::className(), ['apartment_id' => 'id']);
    }

    public function getTotal($apartment_id)
    {
        $test = Image::find()
            ->where(['apartment_id' => $apartment_id])
            ->groupBy(['id'])
            ->count();
        return $test;
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['apartment_id' => 'id']);
    }
    
    public function SingleApartment($id)
    {
        return Apartment::find()
            ->joinWith(['facilities'])
            ->where('apartment.id='.$id)
            ->one();
    }

    public function Map()
    {
        $map = Apartment::find()->all();
        $map_items = [];
        if(isset($map) && !empty($map)){
            foreach ($map as $item){
                $map_items[] = [
                    'position' => [$item->latitude, $item->longitude],
                    'title' => substr($item->coordinates, 0, -55),
                    'content' => '<a href="/detail?id='.$item->id.'" target="_blank"><h3>'.$item->title_ru.'</h3></a><p>'.substr($item->coordinates, 0, -55).'</p>',
                    'options' => ["icon" => "'/frontend/web/img/marker.png'"],
                    'label' => [
                        'text' => $item->price_day.' ₴',
                        'color' => 'white',
                        'fontWeight' => 700,
                        'fontSize' => '18px',
                        'fontFamily' => 'Helvetica'
                    ]
                ];
            }
        }
        return $map_items;
    }

    public function SingleMap($apartment_id)
    {
        $map = Apartment::findOne(['id' => $apartment_id]);
        $map_item[] = [
            'position' => [$map->latitude, $map->longitude],
            'options' => ["icon" => "'/frontend/web/img/marker.png'"],
            'label' => [
                'text' => $map->price_day.' ₴',
                'color' => 'white',
                'fontWeight' => 700,
                'fontSize' => '18px',
                'fontFamily' => 'Helvetica'
            ]
        ];
        return $map_item;
    }

    public function ApartmentRating($data)
    {
        $total = 0;
        $price = 0;
        $clean = 0;
        $place = 0;
        $communication = 0;
        $count = 0;

        if(isset($data)){
            foreach ($data as $item){
                $price += $item->rating_price;
                $clean += $item->rating_clean;
                $place += $item->rating_place;
                $communication += $item->rating_communication;
                $count ++;
            }
        }

        if($count != 0){
            $price = round($price / $count);
            $clean = round($clean / $count);
            $place = round($place / $count);
            $communication = round($communication / $count);
            $total = round(($price + $clean + $place + $communication) / 4, 1);
        }

        return array(
            'rating_total' => $total,
            'rating_price' => $price,
            'rating_clean' => $clean,
            'rating_place' => $place,
            'rating_communication' => $communication
        );
    }

    public function plural($number, $words) {
        $cases = [2, 0, 1, 1, 1, 2];
        return $words[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];
    }
}

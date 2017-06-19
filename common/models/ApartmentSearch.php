<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Apartment;


class ApartmentSearch extends Apartment
{
    public $min_price;
    public $max_price;
    public $elevator;
    public $internet;
    public $animals;
    public $kitchen;
    public $gym;
    public $intercom;
    public $fireplace;
    public $waggon;
    public $heating;
    public $wifi;
    public $disabled;
    public $iron;
    public $drying_machine;
    public $family;
    public $parking;
    public $washer_machine;
    public $hair_dryer;
    public $tv;
    public $conditioner;
    public $cable_tv;
    public $smoke;
    public $separate_entrance;
    public $apartment_id;
    public $image;

    public function rules()
    {
        return [
            [['id', 'description_ua', 'description_en', 'stock', 'room_count', 'bed_count', 'floor'], 'integer'],
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'coordinates', 'type', 'area', 'min_price', 'max_price', 'apartment_id', 'elevator',
            'internet', 'animals', 'kitchen', 'gym', 'intercom', 'fireplace', 'waggon', 'heating', 'wifi', 'disabled', 'iron', 'drying_machine', 'family', 'parking', 'washer_machine', 'hair_dryer',
            'tv', 'conditioner', 'cable_tv', 'smoke', 'separate_entrance', 'image'], 'safe'],
            [['price_2', 'price_night', 'price_day', 'price_5', 'price_10', 'apartment_area'], 'number'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Apartment::find()->orderBy('id DESC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (is_array($this->type)) {
            $query->andFilterWhere(['in', 'type', $this->type]);
        }
        else {
            $query->andFilterWhere([
                'type' => $this->type
            ]);
        }

        if (is_array($this->area)) {
            $query->andFilterWhere(['in', 'area', $this->area]);
        }
        else {
            $query->andFilterWhere([
                'area' => $this->area
            ]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'description_ua' => $this->description_ua,
            'description_en' => $this->description_en,
            'stock' => $this->stock,
            'price_2' => $this->price_2,
            'price_night' => $this->price_night,
            'price_day' => $this->price_day,
            'price_5' => $this->price_5,
            'price_10' => $this->price_10,
            'room_count' => $this->room_count,
            'bed_count' => $this->bed_count,
            'floor' => $this->floor,
            'apartment_area' => $this->apartment_area,
        ]);

        $query->joinWith(['facilities', 'image']);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'coordinates', $this->coordinates])
//            ->orFilterWhere(['like', 'type', $this->type])
//            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['>=', 'price_day', $this->min_price])
            ->andFilterWhere(['<=', 'price_day', $this->max_price])
            ->andFilterWhere(['like', 'facilities.elevator', $this->elevator])
            ->andFilterWhere(['like', 'facilities.internet', $this->internet])
            ->andFilterWhere(['like', 'facilities.animals', $this->animals])
            ->andFilterWhere(['like', 'facilities.kitchen', $this->kitchen])
            ->andFilterWhere(['like', 'facilities.gym', $this->gym])
            ->andFilterWhere(['like', 'facilities.intercom', $this->intercom])
            ->andFilterWhere(['like', 'facilities.fireplace', $this->fireplace])
            ->andFilterWhere(['like', 'facilities.waggon', $this->waggon])
            ->andFilterWhere(['like', 'facilities.heating', $this->heating])
            ->andFilterWhere(['like', 'facilities.wifi', $this->wifi])
            ->andFilterWhere(['like', 'facilities.disabled', $this->disabled])
            ->andFilterWhere(['like', 'facilities.iron', $this->iron])
            ->andFilterWhere(['like', 'facilities.drying_machine', $this->drying_machine])
            ->andFilterWhere(['like', 'facilities.family', $this->family])
            ->andFilterWhere(['like', 'facilities.parking', $this->parking])
            ->andFilterWhere(['like', 'facilities.washer_machine', $this->washer_machine])
            ->andFilterWhere(['like', 'facilities.hair_dryer', $this->hair_dryer])
            ->andFilterWhere(['like', 'facilities.tv', $this->tv])
            ->andFilterWhere(['like', 'facilities.conditioner', $this->conditioner])
            ->andFilterWhere(['like', 'facilities.cable_tv', $this->cable_tv])
            ->andFilterWhere(['like', 'facilities.smoke', $this->smoke])
            ->andFilterWhere(['like', 'facilities.separate_entrance', $this->separate_entrance]);

        return $dataProvider;
    }
}

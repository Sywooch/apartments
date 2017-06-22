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
    public $tv;
    public $iron;
    public $plazm_tv;
    public $fridge;
    public $balcony;
    public $door;
    public $smoke;
    public $drying_machine;
    public $separate_entrance;
    public $internet;
    public $washer_machine;
    public $gas;
    public $wifi;
    public $boiler;
    public $laptop;
    public $conditioner;
    public $jacuzzi;
    public $pool;
    public $apartment_id;
    public $image;
    public $comment;

    public function rules()
    {
        return [
            [['id', 'description_ua', 'description_en', 'stock', 'room_count', 'bed_count', 'floor'], 'integer'],
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'coordinates', 'type', 'area', 'min_price', 'max_price', 'apartment_id',
                'tv', 'iron', 'plazm_tv', 'fridge', 'balcony', 'door', 'smoke', 'drying_machine', 'separate_entrance', 'internet',
                'washer_machine', 'gas', 'wifi', 'boiler', 'laptop', 'conditioner', 'jacuzzi', 'pool', 'image', 'comment'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
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

        if (!empty($this->comment)){
            $query->andWhere('apartment.id = comments.apartment_id');
        }

        if (!empty($this->image)){
            $model = new Apartment();
            $query->andWhere($model->getTotal(7).' > 3');
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

        $query->joinWith(['facilities', 'comments']);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'coordinates', $this->coordinates])
//            ->orFilterWhere(['like', 'type', $this->type])
//            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['>=', 'price_day', $this->min_price])
            ->andFilterWhere(['<=', 'price_day', $this->max_price])
            ->andFilterWhere(['like', 'facilities.tv', $this->tv])
            ->andFilterWhere(['like', 'facilities.iron', $this->iron])
            ->andFilterWhere(['like', 'facilities.plazm_tv', $this->plazm_tv])
            ->andFilterWhere(['like', 'facilities.fridge', $this->fridge])
            ->andFilterWhere(['like', 'facilities.balcony', $this->balcony])
            ->andFilterWhere(['like', 'facilities.door', $this->door])
            ->andFilterWhere(['like', 'facilities.smoke', $this->smoke])
            ->andFilterWhere(['like', 'facilities.drying_machine', $this->drying_machine])
            ->andFilterWhere(['like', 'facilities.separate_entrance', $this->separate_entrance])
            ->andFilterWhere(['like', 'facilities.internet', $this->internet])
            ->andFilterWhere(['like', 'facilities.washer_machine', $this->washer_machine])
            ->andFilterWhere(['like', 'facilities.gas', $this->gas])
            ->andFilterWhere(['like', 'facilities.wifi', $this->wifi])
            ->andFilterWhere(['like', 'facilities.boiler', $this->boiler])
            ->andFilterWhere(['like', 'facilities.laptop', $this->laptop])
            ->andFilterWhere(['like', 'facilities.conditioner', $this->conditioner])
            ->andFilterWhere(['like', 'facilities.jacuzzi', $this->jacuzzi])
            ->andFilterWhere(['like', 'facilities.pool', $this->pool]);

        return $dataProvider;
    }
}

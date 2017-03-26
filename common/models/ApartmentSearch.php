<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Apartment;

/**
 * ApartmentSearch represents the model behind the search form about `common\models\Apartment`.
 */
class ApartmentSearch extends Apartment
{

    public $min_price;
    public $max_price;
    public $elevator;
    public $apartment_id;

    public function rules()
    {
        return [
            [['id', 'description_ua', 'description_en', 'stock', 'room_count', 'bed_count', 'floor'], 'integer'],
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'coordinates', 'type', 'area', 'min_price', 'max_price', 'elevator', 'apartment_id'], 'safe'],
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
                'pageSize' => 1,  
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

        $query->joinWith(['facilities']);

        $query->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'coordinates', $this->coordinates])
//            ->orFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['>=', 'price_day', $this->min_price])
            ->andFilterWhere(['<=', 'price_day', $this->max_price])
            ->andFilterWhere(['like', 'facilities.elevator', $this->elevator]);

        return $dataProvider;
    }
}

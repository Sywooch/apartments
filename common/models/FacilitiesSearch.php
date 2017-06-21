<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Facilities;


class FacilitiesSearch extends Facilities
{

    public function rules()
    {
        return [
            [['id', 'apartment_id', 'internet', 'wifi', 'iron', 'drying_machine', 'washer_machine', 'tv', 'conditioner', 'smoke', 'separate_entrance'], 'integer'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Facilities::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        $query->andFilterWhere([
//            'id' => $this->id,
//            'apartment_id' => $this->apartment_id,
//            'elevator' => $this->elevator,
//            'internet' => $this->internet,
//            'animals' => $this->animals,
//            'kitchen' => $this->kitchen,
//            'gym' => $this->gym,
//            'intercom' => $this->intercom,
//            'fireplace' => $this->fireplace,
//            'waggon' => $this->waggon,
//            'heating' => $this->heating,
//            'wifi' => $this->wifi,
//            'disabled' => $this->disabled,
//            'iron' => $this->iron,
//            'drying_machine' => $this->drying_machine,
//            'family' => $this->family,
//            'parking' => $this->parking,
//            'washer_machine' => $this->washer_machine,
//            'hair_dryer' => $this->hair_dryer,
//            'tv' => $this->tv,
//            'conditioner' => $this->conditioner,
//            'cable_tv' => $this->cable_tv,
//            'smoke' => $this->smoke,
//            'separate_entrance' => $this->separate_entrance,
//        ]);

        return $dataProvider;
    }
}

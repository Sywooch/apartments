<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Facilities;

/**
 * FacilitiesSearch represents the model behind the search form about `common\models\Facilities`.
 */
class FacilitiesSearch extends Facilities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'apartment_id', 'elevator', 'internet', 'animals', 'kitchen', 'gym', 'intercom', 'fireplace', 'waggon', 'heating', 'wifi', 'disabled', 'iron', 'drying_machine', 'family', 'parking', 'washer_machine', 'hair_dryer', 'tv', 'conditioner', 'cable_tv', 'smoke', 'separate_entrance'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Facilities::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'apartment_id' => $this->apartment_id,
            'elevator' => $this->elevator,
            'internet' => $this->internet,
            'animals' => $this->animals,
            'kitchen' => $this->kitchen,
            'gym' => $this->gym,
            'intercom' => $this->intercom,
            'fireplace' => $this->fireplace,
            'waggon' => $this->waggon,
            'heating' => $this->heating,
            'wifi' => $this->wifi,
            'disabled' => $this->disabled,
            'iron' => $this->iron,
            'drying_machine' => $this->drying_machine,
            'family' => $this->family,
            'parking' => $this->parking,
            'washer_machine' => $this->washer_machine,
            'hair_dryer' => $this->hair_dryer,
            'tv' => $this->tv,
            'conditioner' => $this->conditioner,
            'cable_tv' => $this->cable_tv,
            'smoke' => $this->smoke,
            'separate_entrance' => $this->separate_entrance,
        ]);

        return $dataProvider;
    }
}

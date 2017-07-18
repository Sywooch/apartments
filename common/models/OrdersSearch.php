<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;


class OrdersSearch extends Orders
{

    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['user_id', 'apartment_id'], 'safe'],
            [['total_price'], 'number'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Orders::find()->orderBy('date DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            self::tableName() . '.status' => $this->status,
            'total_price' => $this->total_price,
        ]);

        $query->joinWith(['apartment', 'user']);

        $query->andFilterWhere(['like', 'user.surname', $this->user_id])
            ->orFilterWhere(['like', 'user.name', $this->user_id])
            ->orFilterWhere(['like', 'apartment.title_ru', $this->apartment_id]);

        return $dataProvider;
    }
}

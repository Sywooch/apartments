<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Image;


class ImageSearch extends Image
{

    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Image::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'apartment_id' => $this->apartment_id,
        ]);

        return $dataProvider;
    }
}
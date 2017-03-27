<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comments;


class CommentsSearch extends Comments
{

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['apartment_id', 'user_id'], 'safe'],
            [['comment'], 'string', 'max' => 255],

        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Comments::find()->orderBy('id DESC');

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

        $query->joinWith(['apartment', 'user']);

        $query->andFilterWhere([
            'id' => $this->id,
//            'apartment_id' => $this->apartment_id,
//            'user_id' => $this->user_id,
//            'comment' => $this->comment,
        ]);

        $query->andFilterWhere(['like', 'apartment.title_ru', $this->apartment_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}

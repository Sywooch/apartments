<?php

namespace common\models;

use Yii;


class Comments extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['apartment_id', 'user_id', 'comment', 'city'], 'required'],
            [['apartment_id', 'user_id', 'rating', 'rating_price', 'rating_clean', 'rating_communication', 'rating_place'], 'integer'],
            [['comment', 'city'], 'string', 'max' => 255],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Квартира',
            'user_id' => 'Пользователь',
            'city' => 'Город',
            'date' => 'Дата',
            'comment' => 'Комментарий',
            'rating' => 'Общая оценка',
            'rating_price' => 'Цена/качество',
            'rating_clean' => 'Чистота',
            'rating_communication' => 'Общение',
            'rating_place' => 'Расположение'
        ];
    }


    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function CommentsCount($id)
    {
       return Comments::find()
            ->where(['apartment_id' => $id, 'status' => 1])
            ->count();
    }

    public function AllApartmentComments($id)
    {
        return Comments::find()
            ->where(['apartment_id' => $id, 'status' => 1])
            ->orderBy('date DESC')
            ->all();
    }
}

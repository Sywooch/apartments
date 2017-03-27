<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $apartment_id
 * @property integer $user_id
 * @property integer $comment
 *
 * @property Apartment $apartment
 * @property User $user
 */
class Comments extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['apartment_id', 'user_id', 'comment'], 'required'],
            [['apartment_id', 'user_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
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
            'comment' => 'Комментарий',
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
}

<?php

namespace common\models;

use Yii;


class Orders extends \yii\db\ActiveRecord
{

    const StatusZero = 0;
    const StatusOne = 1;
    const StatusTwo = 2;

    public static function tableName()
    {
        return 'orders';
    }


    public function rules()
    {
        return [
            [['apartment_id', 'date_start', 'date_end', 'total_price'], 'required'],
            [['apartment_id', 'user_id', 'status'], 'integer'],
            [['date_start', 'date_end', 'order_date'], 'safe'],
            [['total_price'], 'number'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Квартира',
            'date_start' => 'Дата въезда',
            'date_end' => 'Дата выезда',
            'user_id' => 'Пользователь',
            'guest_count' => 'Количество гостей',
            'status' => 'Статус',
            'total_price' => 'Общая стоимость',
            'date' => 'Дата заказа'
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

    public function DateFormat($date)
    {
        $lang = Yii::$app->language;
        if ($lang == 'ru'):
            $months = array( 1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря' );
        elseif($lang == 'uk'):
            $months = array( 1 => 'Січня', 'Лютого', 'Березня', 'Квітня', 'Травня', 'Червня', 'Липня', 'Серпня', 'Вересня', 'Жовтня', 'Листопада', 'Грудня' );
        endif;

        return date('d '.$months[date('n', strtotime($date))].' Y' , strtotime($date));
    }

    public function DateTimeFormat($date)
    {
        $months = array( 1 => 'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря' );

        return date('d '.$months[date('n', strtotime($date))].' Y H:i:s' , strtotime($date));
    }

    public function getStatusName()
    {
        $values = array(
            self::StatusZero => 'В ожидании',
            self::StatusOne => 'Принят',
            self::StatusTwo => 'Отклонен'
        );
        if(isset($values[$this->status])) {
            return $values[$this->status];
        }
    }
}

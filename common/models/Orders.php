<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Orders".
 *
 * @property integer $id
 * @property integer $apartment_id
 * @property string $date_start
 * @property string $date_end
 * @property integer $user_id
 * @property string $description
 * @property string $order_date
 * @property integer $status
 * @property double $total_price
 *
 * @property Apartment $apartment
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apartment_id', 'date_start', 'date_end'], 'required'],
            [['apartment_id', 'user_id', 'status'], 'integer'],
            [['date_start', 'date_end', 'order_date'], 'safe'],
            [['total_price'], 'number'],
            [['description'], 'string', 'max' => 255],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::className(), 'targetAttribute' => ['apartment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apartment_id' => 'Apartment ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'user_id' => 'User ID',
            'description' => 'Description',
            'order_date' => 'Order Date',
            'status' => 'Status',
            'total_price' => 'Total Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartment::className(), ['id' => 'apartment_id']);
    }
}

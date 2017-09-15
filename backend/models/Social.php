<?php

namespace backend\models;

use Yii;


class Social extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'social';
    }


    public function rules()
    {
        return [
            [['vk', 'facebook', 'twitter', 'google', 'instagram'], 'string', 'max' => 255],
            [['vk_status', 'f_status', 't_status', 'g_status', 'i_status'], 'integer']
        ];
    }

}

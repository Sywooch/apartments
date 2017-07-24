<?php

namespace frontend\models;

use Yii;
use yii\base\Model;


class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    public function rules()
    {
        return [
            [['name', 'email', 'body'], 'required'],
            [['name'], 'nameValidate'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => Yii::t('app', 'Verification Code'),
            'name' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Email'),
            'body' => Yii::t('app', 'Сообщение'),
        ];
    }

    public function nameValidate($attribute){
        if(preg_match("#[\W]+#",$this->name)) {
            $this->addError($attribute, Yii::t('app', 'Имя не может содержать специальные символы'));
        }
    }

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => 'ArendaZP'])
            ->setSubject('Обратная связь')
            ->setTextBody('Вопрос от '.$this->email.': '.$this->body)
            ->send();
    }
}

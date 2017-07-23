<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;


class SignupForm extends Model
{
    public $username;
    public $name;
    public $surname;
    public $email;
    public $password;
    public $confirm_password;
    public $status = 5;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой логин уже существует.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'min' => 2],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже существует.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirm_password', 'required'],
            ['confirm_password', 'matchPassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Логин'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'confirm_password' => Yii::t('app', 'Пароль подтверждения'),
            'status' => Yii::t('app', 'Статус'),
            'created_at' => Yii::t('app', 'Зарегистрирован'),
        ];
    }

    public function matchPassword($attribute)
    {
        if ($this->password != $this->confirm_password) {
            $this->addError($attribute, "Не верный пароль подтверждения");
        }
    }


    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = $this->status;
        
        return $user->save() ? $user : null;
    }
}

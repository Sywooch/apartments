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
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже .'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Email',
            'password' => 'Пароль',
            'status' => 'Статус',
            'created_at' => 'Зарегистрирован',
        ];
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
        
        return $user->save() ? $user : null;
    }
}

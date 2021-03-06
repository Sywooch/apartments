<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_VERIFIED = 5;
    const STATUS_ACTIVE = 10;

    public $photo;
    public $newPassword;
    public $currentPassword;
    public $newPasswordConfirm;


    public static function tableName()
    {
        return '{{%user}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_VERIFIED]],
            [['newPassword', 'currentPassword', 'newPasswordConfirm'], 'required', 'on' => 'changePwd'],
            [['photo'], 'required', 'on' => 'changeAvatar'],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['email'], 'required', 'on' => 'changeEmail'],
            [['photo'], 'file', 'extensions' => 'png, jpg'],
            [['currentPassword'], 'validateCurrentPassword'],
            [['newPassword', 'newPasswordConfirm'], 'string', 'min' => 6],
            [['newPassword', 'newPasswordConfirm'], 'filter', 'filter' => 'trim'],
            [['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword', 'message' => Yii::t('app', 'Пароли не совпадают!')],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'name' => 'Имя',
            'photo' => Yii::t('app', 'Аватар'),
            'surname' => 'Фамилия',
            'status' => 'Статус',
            'email' => 'Email',
            'created_at' => 'Зарегистрирован',
            'currentPassword' => Yii::t('app', 'Текущий пароль'),
            'newPassword' => Yii::t('app', 'Новый пароль'),
            'newPasswordConfirm' => Yii::t('app', 'Подтверждение нового пароля'),
        ];
    }

    public function validateCurrentPassword()
    {
        if (!$this->verifyPassword($this->currentPassword))
        {
            $this->addError("currentPassword", Yii::t('app', 'Текущий пароль не верный!'));
        }
    }

    public function verifyPassword($password)
    {
        $dbpassword = static::findOne(['username' => Yii::$app->user->identity->username])->password_hash;
        return Yii::$app->security->validatePassword($password, $dbpassword);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}

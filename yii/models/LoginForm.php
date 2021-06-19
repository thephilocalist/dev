<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\db\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @poperty Users|null $user This property is read-only
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = $this->getUser();

        if (!$this->hasErrors()) {
            $user = $this->getUser();
            
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->_user, 0);/* 
            Yii::$app->user->login($this->_user, 3600 * 24 * 30);
            
            return Yii::$app->user; */
        }

        return false;
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->select('*')->where(['username' => $this->username, 'role' => 0])->one();
        }

        return $this->_user;
    }
}

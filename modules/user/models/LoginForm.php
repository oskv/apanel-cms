<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;
use app\modules\user\models\User;

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
		if(!$this->hasErrors()){
			$user = $this->getUser();

			if(!$user || ! Yii::$app->getSecurity()->validatePassword($this->password, $user->password)){
				$this->addError($attribute, 'Incorrect username or password.');
			}
		}
	}


	public function login()
	{
		if($this->validate()){
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
		} else{
			return false;
		}
	}

	public function getUser()
	{
		if($this->_user === false){
			$this->_user = User::findByUsername($this->username);
		}

		return $this->_user;
	}
}

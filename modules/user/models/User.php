<?php

namespace app\modules\user\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
	public $roleId;
	public $password_repeat;
	public $password_old;

	public static $statusList = array(
		1 => 'Зарегистрирован',
		2 => 'Заблокирован'
	);

	public static function tableName()
	{
		return 'user';
	}

	public function init()
	{
		parent::init();
		$this->dt_created = date("Y.m.d - H:i:s");
		$this->status = 1;
	}

	public function rules()
	{
		return [
			[ ['roleId', 'password_repeat'], 'safe'],
			[ ['username','email', 'status'], 'required'],
			['email', 'email'],
			[ ['email', 'username'], 'unique'],
			[ ['password','password_repeat'], 'required', 'on' => 'add'],
			['password', 'string', 'min' => 6],
			['password', 'compare']

		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Логин',
			'password' => 'Пароль',
			'dt_created' => 'Создан',
			'email' => 'E-mail',
			'status' => 'Статус',
			'password_repeat' => 'Повторите пароль',
			'roleId' => 'Группа'
		];
	}

	public static function findIdentity($id)
	{
		return static::findOne($id);
	}

	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getAuthKey()
	{
		return $this->auth_key;
	}

	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	public static function findByUsername($username)
	{
		return self::findOne(['username' => $username]);
	}

	public function getStatusStr()
	{
		return User::getStatusName($this->status);
	}

	public function getRoleId()
	{
		$roleId = null;
		$auth = Yii::$app->authManager;
		$userRoles = $auth->getAssignments($this->id);
		if(!empty($userRoles)){
			$role = $auth->getRole(key($userRoles));
			$roleId = $role->name;
		}
		return $roleId;
	}

	public function getRoleName()
	{
		$roleName = 'не установлено';
		$auth = Yii::$app->authManager;
		$userRoles = $auth->getAssignments($this->id);
		if(!empty($userRoles)){
			$role = $auth->getRole(key($userRoles));
			$roleName = $role->description;
		}
		return $roleName;
	}

	public static function getStatusName($id){
		return User::$statusList[$id];
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = Yii::$app->getSecurity()->generateRandomString();
				$this->access_token = Yii::$app->getSecurity()->generateRandomString();
				$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
			}else{
				if(empty($this->password)){
					$this->password = $this->password_old;
				}else{
					$this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
				}
			}
			return true;
		}
		return false;
	}

	public function afterSave($insert, $changedAttributes)
	{
		$auth = Yii::$app->authManager;
		$role = $auth->getRole($this->roleId);
		$auth->revokeAll( $this->id );
		if(!empty($role)){
			$auth->assign($role,  $this->id);
		}
	}
}

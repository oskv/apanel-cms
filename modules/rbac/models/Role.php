<?php
namespace app\modules\rbac\models;

use yii\base\Model;
use Yii;

class Role extends Model
{
	public $id;
	public $name;

	public function rules()
	{
		return [
			[ ['name'], 'safe'],
			[['id'], 'safe', 'on' => 'roles-add'],
			[ ['name', 'id'], 'required'],
			['name', 'string', 'max' => 255]
		];
	}

	public static function getAll()
	{
		$roles = array();
		$auth = Yii::$app->authManager;
		foreach($auth->getRoles() as $k=>$data){
			$role = new Role();
			$role->id = $k;
			$role->name = $data->description;
			$roles[] = $role;
		}
		return $roles;
	}
}
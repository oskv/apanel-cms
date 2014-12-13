<?php
namespace app\modules\rbac\models;

use yii\base\Model;
use Yii;

class Permission extends Model
{
	public $id;
	public $name;
	public $accessRoles;

	public function rules()
	{
		return [
			[ ['name', 'accessRoles'], 'safe'],
			[['id'], 'safe', 'on' => 'roles-add'],
			[ ['name', 'id'], 'required'],
			['name', 'string', 'max' => 255]
		];
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Название',
			'access' => 'Доступно'
		);
	}
}
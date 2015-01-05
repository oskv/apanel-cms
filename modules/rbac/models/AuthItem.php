<?php
namespace app\modules\rbac\models;

use Yii;
use yii\db\ActiveRecord;

class AuthItem extends ActiveRecord
{
	public static function tableName()
	{
		return 'auth_item';
	}
}
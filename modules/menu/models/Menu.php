<?php

namespace app\modules\menu\models;

use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{
	public static function tableName()
	{
		return 'menu';
	}

	public function rules()
	{
		return [
			[ ['name'], 'safe'],
			[ ['name'], 'required'],
			['name', 'string', 'max' => 255]
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название'
		];
	}
}

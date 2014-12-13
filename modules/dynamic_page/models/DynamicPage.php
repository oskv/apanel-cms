<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $dt_created
 * @property integer $display
 * @property integer $public
 */

namespace app\modules\dynamic_page\models;

use yii\db\ActiveRecord;

class DynamicPage extends ActiveRecord
{
	public static function tableName()
	{
		return 'dynamic_page';
	}

	public function init()
	{
		parent::init();
		$this->dt_created = date("Y.m.d - H:i:s");
		$this->display = 1;
		$this->public = 1;
	}

	public function rules()
	{
		return [
			[ ['name','text','display', 'public', 'translit'], 'safe'],
			[ ['name', 'translit'], 'required'],
			[ ['name', 'translit'], 'string', 'max' => 255]
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название',
			'text' => 'Текст',
			'dt_created' => 'Дата добавления',
			'display' => 'Отображать',
			'public' => 'Публиковать',
			'translit' => 'Транслит'
		];
	}

	static function findByUrl($url)
	{
		return self::findOne(['translit' => $url]);
	}
}

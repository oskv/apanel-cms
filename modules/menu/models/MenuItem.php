<?php

namespace app\modules\menu\models;

use yii\db\ActiveRecord;

class MenuItem extends ActiveRecord
{
	public static function tableName()
	{
		return 'menu_item';
	}

	public function rules()
	{
		return [
			[ ['id_menu', 'id_parent', 'name', 'url', 'display', 'position'], 'safe'],
			[ ['id_menu', 'name', 'position'], 'required'],
			[ ['id_menu', 'id_parent', 'id_parent', 'position'], 'integer'],
			['name', 'string', 'max' => 255]
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'id_menu' => 'ID меню',
			'id_parent' => 'ID родителя',
			'url' => 'Ссылка',
			'name' => 'Название',
			'display' => 'Отображать',
			'position' => 'Порядок'
		];
	}

	public static function getTree($idMenu){
		$tree = null;
		$assocItems = array();

		$items = self::find()
			->where(['id_menu' => $idMenu])
			->orderBy('position')
			->all();
		for($i=0;$i<count($items);$i++){
			$assocItems[$items[$i]['id']] = array('parent'=>$items[$i]['id_parent'], 'elem'=> $items[$i]);
		}
		foreach ($assocItems as $id => $node) {
			if(isset($node['parent'])){
				if($node['parent']){
					$assocItems[$node['parent']]['sub'][] =& $assocItems[$id];
				} else{
					$tree[] = &$assocItems[$id];
				}
			}
		}
		return $tree;
	}

	public static function getTreeSelectArr($idMenu, $item = 0){
		$itemTree = self::getTree($idMenu);
		return array_merge(	array('id0' => 'Корневой уровень'),
			self::generateTreeSelectArr($itemTree, $item, 0));
	}

	private static function generateTreeSelectArr($items, $item = 0, $level){
		$arr = array();
		$devider = null;

		for($j = 0; $j < $level; $j++){
			$devider.=' - ';
		}

		for($i = 0; $i < count($items); $i++){
			if($items[$i]['elem']->id != $item){
				$arr['id'.$items[$i]['elem']->id] = $devider.$items[$i]['elem']->name;
				if(isset($items[$i]['sub'])){
					$arr = array_merge($arr, self::generateTreeSelectArr($items[$i]['sub'], $item, $level + 1));
				}
			}
		}
		return $arr;
	}
}

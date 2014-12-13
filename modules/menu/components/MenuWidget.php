<?php
namespace app\modules\menu\components;

use app\modules\menu\models\MenuItem;
use yii\base\Widget;
use yii\bootstrap\Nav;

class MenuWidget extends Widget
{
	public $idMenu;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$items = MenuItem::find()
			->where(['id_menu' => $this->idMenu])
			->orderBy('position')
			->all();

		return Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $this->getItemsArr($items, 0)
		]);
	}

	private function getItemsArr($items, $parent){
		$resultItems = [];
		for($i=0; $i<count($items);$i++){
			if($items[$i]->id_parent == $parent){
				$item = [
					'label' => $items[$i]->name,
					'url'=> [$items[$i]->url]
				];
				if($this->existChilds($items, $items[$i]->id)){
					$item['items'] = $this->getItemsArr($items, $items[$i]->id);
				}
				$resultItems[] = $item;
			}
		}
		return $resultItems;
	}

	private function existChilds($items, $id){
		for($i=0; $i<count($items);$i++){
			if($items[$i]->id_parent == $id){
				return true;
			}
		}
		return false;
	}
}
<?php
if($model->id){
	$this->title = 'Пункт меню : изменить';
}else{
	$this->title = 'Пункт меню : добавить';
}
echo $this->render('@app/views/admin/content-add', [
	'model' => $model,
	'fields' => [
		'checkboxgroup' => 	['type' => 'checkboxgroup', 'items' => ['display']],
		'id_parent' => 		['type' => 'dropdownlist', 'items' => $itemList],
		'name' => 			['type' => 'text'],
		'url' => 			['type' => 'text'],
		'position' => 		['type' => 'text']
	]
]);
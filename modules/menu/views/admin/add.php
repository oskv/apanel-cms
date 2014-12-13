<?php
if($model->id){
	$this->title = 'Меню : изменить';
	$afterContent = $this->render('items_list', ['items'=>$menuItemsTree, 'menuModel'=>$model]);
}else{
	$this->title = 'Меню : добавить';
	$afterContent = null;
}
echo $this->render('@app/views/admin/content-add', [
	'model' => $model,
	'fields' => [
		'name' => ['type' => 'text']
	],
	'afterContent' => $afterContent
]);
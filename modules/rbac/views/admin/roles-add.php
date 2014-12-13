<?php
$fields = [	'id' => ['type' => 'text'],
			'name' => ['type' => 'text']];

if($model->id){
	$this->title = 'Роли : изменить';
	$fields['id'] = ['type' => 'disabled'];
}else{
	$this->title = 'Роли: добавить';
	$fields['id'] = ['type' => 'text'];
}
echo $this->render('@app/views/admin/content-add', [
	'model' => $model,
	'fields' => $fields
]);
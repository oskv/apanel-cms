<?php
if($model->id){
	$this->title = 'Динамические страницы : изменить';
}else{
	$this->title = 'Динамические страницы : добавить';
}
echo $this->render('@app/views/admin/content-add', [
	'model' => $model,
	'fields' => [
		'checkboxgroup' => ['type' => 'checkboxgroup', 'items' => ['display', 'public']],
		'name' => ['type' => 'text'],
		'text' => ['type' => 'textarea'],
		'dt_created' => ['type' => 'disabled'],
		'translit' => ['type' => 'text']
	]
]);
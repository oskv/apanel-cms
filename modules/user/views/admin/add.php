<?php
use app\modules\user\models\User;

if($model->id){
	$this->title = 'Пользователи : изменить';
}else{
	$this->title = 'Пользователи : добавить';
}
echo $this->render('@app/views/admin/content-add', [
	'model' => $model,
	'fields' => [
		'username' => 			['type' => 'text'],
		'email' => 				['type' => 'text'],
		'password' => 			['type' => 'password'],
		'password_repeat' => 	['type' => 'password'],
		'status' => 			['type' => 'dropdownlist', 'items' => User::$statusList],
		'roleId' => 			['type' => 'dropdownlist', 'items' => $rolesArr],
		'dt_created' => ['type' => 'disabled']
	]
]);
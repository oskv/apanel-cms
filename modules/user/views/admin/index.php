<?php
$this->title = 'Пользователи : список';

$contentHead = $this->render('@app/views/admin/content-list-head', [
	'addBtn' => true,
	'actionsGroup' => true
]);

echo $this->render('@app/views/admin/content-list', [
	'contentHead' => $contentHead,
	'models' => $models,
	'data' => [
		'checker' 		=> ['class' => 'text-center', 'type' => 'checker'],
		'id' 			=> ['title' => $model->getAttributeLabel('id'), 'class' => 'text-center'],
		'username' 		=> ['title' => $model->getAttributeLabel('username'), 'class' => 'text-center'],
		'roleName' 		=> ['title' => $model->getAttributeLabel('role'), 'class' => 'text-center'],
		'statusStr' 	=> ['title' => $model->getAttributeLabel('status'), 'class' => 'text-center'],
		'dt_created' 	=> ['title' => $model->getAttributeLabel('dt_created'), 'class' => 'text-center'],
		'controls' 		=> ['title' => '', 'class' => 'text-center', 'type' => 'controls', 'elements' => ['edit','delete']]
	]
]);
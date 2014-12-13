<?php
$this->title = 'Меню : список';

$contentHead = $this->render('@app/views/admin/content-list-head', [
	'addBtn' => true,
	'actionsGroup' => true
]);

echo $this->render('@app/views/admin/content-list', [
	'contentHead' => $contentHead,
	'models' => $models,
	'data' => [
		'checker' 		=> ['class' => 'text-center', 'type' => 'checker'],
		'id' 			=> ['title' => 'ID', 'class' => 'text-center'],
		'name' 			=> ['title' => 'Название', 'class' => 'text-center'],
		'controls' 		=> ['title' => '', 'class' => 'text-center', 'type' => 'controls', 'elements' => ['edit','delete']]
	]
]);
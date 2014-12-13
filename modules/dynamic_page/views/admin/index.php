<?php
$this->title = 'Динамические страницы : список';

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
		'translit' 			=> ['title' => 'Транслит', 'class' => 'text-center'],
		'dt_created' 	=> ['title' => 'Дата добавления', 'class' => 'text-center'],
		'display' 		=> ['title' => 'Отображать', 'type' => 'status', 'class' => 'text-center'],
		'public' 		=> ['title' => 'Публиковать', 'type' => 'status', 'class' => 'text-center'],
		'controls' 		=> ['title' => '', 'class' => 'text-center', 'type' => 'controls', 'elements' => ['edit','delete']]
	]
]);
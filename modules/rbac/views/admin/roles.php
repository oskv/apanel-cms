<?php
$this->title = 'Роли (групы): список';

$contentHead = $this->render('@app/views/admin/content-list-head', [
	'addBtn' => ['url' =>  'roles-add'],
	'actionsGroup' => [ 'url' => 'roles-delete-selected']
]);

echo $this->render('@app/views/admin/content-list', [
	'contentHead' => $contentHead,
	'models' => $models,
	'data' => [
		'checker' 		=> ['class' => 'text-center', 'type' => 'checker'],
		'name' 			=> ['title' => 'Название', 'class' => 'text-center'],
		'controls' 		=> ['title' => '', 'class' => 'text-center', 'type' => 'controls',
			'elements' => ['edit','delete'],
			'action' => [	'edit' => 'roles-edit',
							'delete' => 'roles-delete']
		]
	]
]);
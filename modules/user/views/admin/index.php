<?php
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Пользователи : список';

/*$contentHead = $this->render('@app/views/admin/content-list-head', [
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
]);*/

$content = GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
	'columns' => [
		[
			'class' => 'yii\grid\CheckboxColumn',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		[
			'attribute' => 'id',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		[
			'attribute' => 'username',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		[
			'attribute' => 'status',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'content' => function ($data) {
				return $data->getStatusStr();
			}
		],
		[
			'attribute' => 'roleId',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'content' => function ($data) {
				return $data->getRoleName();
			}
		],
		[
			'attribute' => 'dt_created',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'format' => ['date', 'php:d-m-Y H:i']
		],
		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{edit} {delete}',
			'buttons' => [
				'edit' => function ($url, $model, $key) {
					return '<a href="'.$url.'" class="btn btn-primary btn-xs">
											<span class="glyphicon glyphicon-edit"></span>Изменить
									</a>';
				},
				'delete' => function ($url, $model, $key) {
					return '<a href="'.$url.'" confirm-dialog-type="href" confirm-dialog class="btn btn-danger btn-xs">
										<span class="glyphicon glyphicon-remove-circle"></span>Удалить
									</a>';
				}
			],
			'contentOptions' => ['class' => 'text-center']
		]
	]
]);
?>

<div class="panel panel-default panel-list-content">
	<div class="panel-heading">
		<? echo $this->render('@app/views/admin/content-list-head', [
			'addBtn' => true,
			'actionsGroup' => true
		]);?>
	</div>

	<div class="panel-body">
		<?
		$form = ActiveForm::begin(['id' => 'contentList', 'method' => 'GET']);
		echo $content;
		ActiveForm::end(); ?>
	</div>
</div>

<?= $this->render('@app/views/admin/dialog-confirm', [
	'title' 		=> 'Подтвердите действие',
	'text' 			=> 'Удалить?',
	'okTitle' 		=> 'Да',
	'cancelTitle' 	=> 'Отмена'
]);
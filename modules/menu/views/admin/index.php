<?php
use yii\widgets\ActiveForm;
use yii\grid\GridView;


$this->title = 'Меню : список';

$content = GridView::widget([
	'dataProvider' => $dataProvider,
	'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
	'columns' => [
		[
			'class' => 'yii\grid\CheckboxColumn',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		'id',
		'name',
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
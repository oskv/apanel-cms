<?php
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Динамические страницы : список';

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
			'attribute' => 'name',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		[
			'attribute' => 'translit',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center']
		],
		[
			'attribute' => 'dt_created',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'format' => ['date', 'php:d-m-Y H:i']
		],
		[
			'attribute' => 'display',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'content' => function ($data) {
				$class = $data['display'] ? 'glyphicon-ok' : 'glyphicon-remove';
				return '<span class="glyphicon '.$class.'"></span>';
			}
		],
		[
			'attribute' => 'public',
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
			'content' => function ($data) {
				$class = $data['public'] ? 'glyphicon-ok' : 'glyphicon-remove';
				return '<span class="glyphicon '.$class.'"></span>';
			}
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
		<? echo $this->render('@app/views/admin/content-list-head', ['addBtn' => true,'actionsGroup' => true]);?>
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
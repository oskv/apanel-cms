<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Операции: список';

$rolesColums = [];
foreach($roles as $role){
	$rolesColums[] = [
		'attribute' => $role->name,
		'headerOptions' => ['class' => 'text-center'],
		'contentOptions' => ['class' => 'text-center'],
		'content' => function($model, $key, $index, $column){
			$auth = Yii::$app->authManager;
			$role = $auth->getRole($column->attribute);
			$permission = $auth->getPermission($model->name);
			$class = $auth->hasChild($role, $permission) ? 'glyphicon-ok' : 'glyphicon-remove';
			return '<span class="glyphicon '.$class.'"></span>';
		}
	];
}

$content = GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
	'columns' => array_merge([
			[
				'class' => 'yii\grid\CheckboxColumn',
				'headerOptions' => ['class' => 'text-center'],
				'contentOptions' => ['class' => 'text-center']
			],
			'name',
			'description'
		],
		$rolesColums,
		[
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{edit} {delete}',
				'buttons' => [
					'edit' => function ($url, $model, $key) {
						$url = Url::toRoute(['permissions-edit', 'id' =>$key]);
						return '<a href="'.$url.'" class="btn btn-primary btn-xs">
												<span class="glyphicon glyphicon-edit"></span>Изменить
										</a>';
					},
					'delete' => function ($url, $model, $key) {
						$url = Url::toRoute(['permissions-delete', 'id' => $key ]);
						return '<a href="'.$url.'" confirm-dialog-type="href" confirm-dialog class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-remove-circle"></span>Удалить
										</a>';
					}
				],
				'contentOptions' => ['class' => 'text-center']
			]
		])
]);
?>

<div class="panel panel-default panel-list-content">
	<div class="panel-heading">
		<?= $this->render('@app/views/admin/content-list-head', [
			'addBtn' => ['url' =>  'permissions-add'],
			'actionsGroup' => [ 'url' => 'permissions-delete-selected']
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

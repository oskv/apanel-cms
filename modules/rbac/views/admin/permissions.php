<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Операции: список';
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
			$form = ActiveForm::begin([
				'id' => 'contentList'
			]) ?>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center">
							<div class="checker" apanel-ckecker apanel-ckecker-set=".row-checker">
								<input type="checkbox" />
							</div>
						</th>
						<th >
							ID
						</th>
						<th>
							Название
						</th>
						<?php foreach($roles as $role){?>
							<th class="text-center"><?php echo $role->description;?></th>
						<?php }?>
						<th></th>
					</tr>
				</thead>

				<tbody>
				<?php foreach($permissions as $permission){?>
					<tr>
						<td class="text-center">
							<div class="checker row-checker" apanel-ckecker>
								<?php echo Html::checkbox("Permission[".$permission->name."][id]"); ?>
							</div>
						</td>
						<td>
							<?php echo $permission->name;?>
						</td>
						<td>
							<?php echo $permission->description;?>
						</td>
						<?php foreach($roles as $role){?>
							<td class="text-center">
								<span class="glyphicon
									<?= $auth->hasChild($role, $permission) ? 'glyphicon-ok' : 'glyphicon-remove'?>">
								</span>
							</td>
						<?php }?>
						<td class="text-center">
							<a href="<?php echo Url::toRoute(['permissions-edit', 'id' => $permission->name]); ?>" class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-edit"></span>Изменить
							</a>

							<a href="<?php echo Url::toRoute(['permissions-delete', 'id' => $permission->name ]); ?>"
							   confirm-dialog-type="href"
							   confirm-dialog
							   class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove-circle"></span>Удалить
							</a>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>

			<? ActiveForm::end(); ?>
		</div>
	</div>

<?= $this->render('@app/views/admin/dialog-confirm', [
	'title' 		=> 'Подтвердите действие',
	'text' 			=> 'Удалить?',
	'okTitle' 		=> 'Да',
	'cancelTitle' 	=> 'Отмена'
]);

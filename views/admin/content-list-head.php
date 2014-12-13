<?
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
	<div class="col-md-5">
		<?= Html::encode($this->title); ?>
	</div>
	<div class="col-md-7 text-right">
		<? if(isset($addBtn)){
			$addUrl = isset($addBtn['url']) ? $addBtn['url'] : 'add';
			?>
			<a href="<?php echo Url::toRoute([$addUrl]); ?>" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-plus"></span>
				Добавить
			</a>
		<? } ?>

		<? if(isset($actionsGroup)){
			$delSelUrl = isset($actionsGroup['url']) ? $actionsGroup['url'] : 'delete-selected';
			?>
			<div class="btn-group">
				<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
					Действия <span class="caret"></span>
				</button>
				<ul class="dropdown-menu pull-right text-left" role="menu">
					<li>
						<a class="confirm-dialog"
						   confirm-dialog
						   confirm-dialog-type="script"
						   data-script="$('#contentList').attr('action','<?= Url::toRoute([$delSelUrl]); ?>').submit();">
							<span class="glyphicon glyphicon-remove-circle"></span>
							Удалить выбранные
						</a>
					</li>
				</ul>
			</div>
		<?}?>
	</div>
</div>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<div class="panel panel-default panel-list-content">
	<div class="panel-heading">
		<? if(isset($contentHead)){
			echo $contentHead;
		}?>
	</div>

	<div class="panel-body">
		<?
		$form = ActiveForm::begin([
			'id' => 'contentList'
		]) ?>
		<table class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<? foreach($data as $item){
					$type = isset($item['type']) ? $item['type'] : null;
					?>
					<th class="text-center">
						<? switch($type){
							case 'checker':
								?>
								<div class="checker" apanel-ckecker apanel-ckecker-set=".row-checker">
									<input type="checkbox" />
								</div>
								<?
								break;
							default:
								if(isset($item['title'])){
									echo Html::encode($item['title']);
								}
						} ?>
					</th>
				<? } ?>
			</tr>
			</thead>

			<tbody>
				<? for($i=0;$i<count($models);$i++){ ?>
					<tr>
					<? foreach($data as $k => $item){
						$type = isset($item['type']) ? $item['type'] : null;
						$class = isset($item['class']) ? $item['class'] : null;

						?><td class="<?= $class; ?>">
						<? switch($type){
							case 'checker':
								?>
								<div class="checker row-checker" apanel-ckecker>
									<?php echo Html::activeCheckbox($models[$i],"[".$models[$i]->id."]id", ['label' => '']); ?>
								</div>
								<?
								break;

							case 'status':
								?><span class="glyphicon <?php echo $models[$i][$k] ?  'glyphicon-ok' : 'glyphicon-remove';?> "></span><?
								break;

							case 'controls':
								if(in_array('edit', $item['elements'])){
									$editAction = isset($item['action']['edit']) ? $item['action']['edit'] : 'edit';
									?>
									<a href="<?php echo Url::toRoute([$editAction, 'id' => $models[$i]->id ]); ?>" class="btn btn-primary btn-xs">
										<span class="glyphicon glyphicon-edit"></span>Изменить
									</a>
								<?}

								if(in_array('delete', $item['elements'])){
									$deleteAction = isset($item['action']['delete']) ? $item['action']['delete'] : 'delete';
									?>
									<a href="<?php echo Url::toRoute([$deleteAction, 'id' => $models[$i]->id ]); ?>"
									   confirm-dialog-type="href"
									   confirm-dialog
									   class="btn btn-danger btn-xs">
										<span class="glyphicon glyphicon-remove-circle"></span>Удалить
									</a>
								<?}
								break;
							default:
								echo $models[$i][$k];
						} ?>
						</td>
					<? } ?>
					</tr>
				<? } ?>
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

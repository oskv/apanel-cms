<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\TinymceAsset;
use yii\helpers\StringHelper;

TinymceAsset::register($this);

$modelClassName = StringHelper::basename($model->className())
?>
<div class="panel panel-<? echo $model->id ? 'primary' : 'success'; ?> content-add">
	<div class="panel-heading">
		<h3 class="panel-title"><?= Html::encode($this->title); ?></h3>
	</div>

	<?$form = ActiveForm::begin([
		'options' => ['class' => 'bs-example form-horizontal']
	]);?>
	<fieldset>
		<div class="panel-body">

			<? foreach($fields as $key => $field){
				$type = isset($field['type']) ? $field['type'] : null;
				$class = isset($field['class']) ? $field['class'] : null;
			?>
			<div class="form-group col-sm-12 <?=$class;?> <? if($model->hasErrors($key)) echo 'has-error'; ?>">
				<? switch($type){
					case 'checkboxgroup': ?>
						<div class="btn-group" data-toggle="buttons">
							<? for($j = 0; $j < count($field['items']); $j++){?>
								<label class="btn btn-info <?if($model[$field['items'][$j]]){ echo 'active';}?>">
									<?= Html::checkbox( $modelClassName.'['.$field['items'][$j].']',
														$model[$field['items'][$j]]); ?>
									<?= $model->getAttributeLabel($field['items'][$j]); ?>
								</label>
							<? } ?>
						</div>
						<? break;
					case 'dropdownlist':?>
						<?= Html::activeLabel( $model, $key, ['class'=> 'control-label', 'for'=>'input'.$key] );?>
						<?= Html::activeDropDownList( $model, $key, $field['items'], ['class'=> 'form-control', 'id'=>'input'.$key] );
						break;
					case 'textarea':?>
						<?= Html::activeLabel( $model, $key, ['class'=> 'control-label', 'for'=>'input'.$key] );?>
							<?= Html::activeTextarea( $model, $key, ['class'=> 'form-control', 'id'=>'input'.$key, 'rich-txt'=>'', 'rows'=>"10"] );
						break;
					case 'disabled':?>
						<?= Html::activeLabel( $model, $key, ['class'=> 'control-label', 'for'=>'input'.$key] );?>
						<?= Html::activeTextInput( $model, $key, ['class'=> 'form-control', 'id'=>'input'.$key, 'disabled'=>''] );
						break;
					case 'password':?>
						<?= Html::activeLabel( $model, $key, ['class'=> 'control-label', 'for'=>'input'.$key] );?>
						<?= Html::activePasswordInput( $model, $key, ['class'=> 'form-control', 'id'=>'input'.$key, 'placeholder'=> $model->getAttributeLabel($key)] );
						break;
					case 'text':
					default: ?>
						<?= Html::activeLabel( $model, $key, ['class'=> 'control-label', 'for'=>'input'.$key] );?>
						<?= Html::activeTextInput( $model, $key, ['class'=> 'form-control', 'id'=>'input'.$key, 'placeholder'=> $model->getAttributeLabel($key)] )?>
				<? } ?>
				<?= Html::error($model, $key, ['class'=>'err-msg']); ?>
			</div>
			<? } ?>

			<div class="form-group col-sm-12">
				<?= isset($afterContent) ?  $afterContent : null; ?>
			</div>

			<div class="form-group col-sm-12">
				<?= Html::submitButton('Сохранить',['class'=>"btn btn-success"]); ?>
			</div>
		</div>
	</fieldset>
	<? ActiveForm::end(); ?>
</div>

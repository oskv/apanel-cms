<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//var_dump($roles);
if($model->id){
	$this->title = 'Операции : изменить';
}else{
	$this->title = 'Операции: добавить';
}?>
<div class="panel panel-<? echo $model->id ? 'primary' : 'success'; ?> content-add">
	<div class="panel-heading">
		<h3 class="panel-title"><?= Html::encode($this->title); ?></h3>
	</div>

	<?$form = ActiveForm::begin([
		'options' => ['class' => 'bs-example form-horizontal']
	]);?>
	<fieldset>
		<div class="panel-body">
			<div class="form-group col-sm-12 <? if($model->hasErrors('id')) echo 'has-error'; ?>">
				<?= Html::activeLabel( $model, 'id', ['class'=> 'control-label', 'for'=>'inputid'] );?>
				<?if($model->id){
					echo Html::activeTextInput( $model, 'id', ['class'=> 'form-control', 'id'=>'inputid', 'placeholder'=> $model->getAttributeLabel('id'), 'disabled' => ''] );
				}else{
					echo Html::activeTextInput($model, 'id', ['class' => 'form-control', 'id' => 'inputid' , 'placeholder'=> $model->getAttributeLabel('id')]);
				}?>
			</div>

			<div class="form-group col-sm-12 <? if($model->hasErrors('name')) echo 'has-error'; ?>">
				<?= Html::activeLabel( $model, 'name', ['class'=> 'control-label', 'for'=>'inputname'] );?>
				<?= Html::activeTextInput( $model, 'name', ['class'=> 'form-control', 'id'=>'inputname', 'placeholder'=> $model->getAttributeLabel('name')] );?>
			</div>

			<div class="form-group col-sm-12">
				<?= Html::activeLabel($model, 'access', ['class'=>"control-label"] ); ?>
				<div class="btn-group col-sm-12" data-toggle="buttons">
					<? foreach($roles as $role){
						$checked = !empty($permission) && $auth->hasChild($role, $permission); ?>
						<label class="btn btn-info <?if($checked){ echo 'active';}?>">
							<?= Html::checkbox( 'Permission[accessRoles]['.$role->name.']', $checked); ?>
							<?= $role->description; ?>
						</label>
					<? } ?>
				</div>
			</div>

			<div class="form-group col-sm-12">
				<?= Html::submitButton('Сохранить',['class'=>"btn btn-success"]); ?>
			</div>
		</div>
	</fieldset>
	<? ActiveForm::end(); ?>
</div>

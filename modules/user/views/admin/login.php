<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добро пожаловать';?>

<div class="admin-login row">
	<div class="login-content col-md-4 col-md-offset-4">
		<div class="row">
			<div class="col-md-12 form-horizontal well">
				<?php $form = ActiveForm::begin([
					'options' => ['class' => 'bs-example form-horizontal']
				]);?>

				<?php if( $model->hasErrors() ){
					$err = $form->errorSummary($model)?>
					<div class="alert alert-dismissable alert-warning">
						<h4>Warning!</h4>
						<?php echo $err; ?>
					</div>
				<?php }?>

				<fieldset>
					<legend>Добро пожаловать</legend>
					<div class="form-group">
						<div class="input-icon col-md-12">
							<span class="glyphicon glyphicon-user"></span>
							<?= Html::activeTextInput( $model, 'username', ['class'=> 'form-control', 'placeholder'=> $model->getAttributeLabel('username')] )?>
						</div>
					</div>

					<div class="form-group">
						<div class="input-icon col-md-12">
							<span class="glyphicon glyphicon-lock"></span>
							<?= Html::activePasswordInput( $model, 'password', ['class'=> 'form-control', 'placeholder'=> $model->getAttributeLabel('password')] );?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="checkbox col-md-5">
								<?= Html::activeCheckbox($model,'rememberMe'); ?>
							</div>
							<button type="submit" class="btn btn-primary  col-md-5 pull-right">
								Войти <span class="glyphicon glyphicon glyphicon-log-in"></span>
							</button>

						</div>
					</div>

				</fieldset>
				<? ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>
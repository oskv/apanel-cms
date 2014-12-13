<?php
use yii\helpers\Html;
use app\assets\AppAdminAsset;
use app\components\AdminMenuWidget;

AppAdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>

	<body>
	<?php $this->beginBody() ?>
		<div class="wrap container-fluid">
			<?= $this->render('@app/views/admin/top-nav') ?>
			<div class="admin-wrapper row">
				<div class="main-nav col-md-2 hidden-xs hidden-sm navbar-fixed-top">
					<?= AdminMenuWidget::widget() ?>
				</div>

				<div class="admin-content col-md-10 col-md-offset-2 col-xs-12">
					<?= $content; ?>
				</div>
			</div>
		</div>
	<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>

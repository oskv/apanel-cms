<?php
use yii\helpers\Html;
use app\assets\AppAdminLoginAsset;

AppAdminLoginAsset::register($this);
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

	<body class="admin-general">
	<?php $this->beginBody() ?>
		<div class="container-fluid">
			<?php echo $content; ?>
		</div>
	<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>

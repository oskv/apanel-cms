<?php
use yii\helpers\Url;
?>
<nav class="top-nav navbar-default navbar-collapse navbar navbar-fixed-top">
	<a class="navbar-brand" href="<?= Url::toRoute('/admin'); ?>">APanel</a>

	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="glyphicon glyphicon-user"></span>
				<?= \Yii::$app->user->identity->username?> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li><a href="<?= Url::toRoute(['/admin']); ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
				<li class="divider"></li>
				<li><a href="<?= Url::toRoute(['/admin/logout']); ?>"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
			</ul>
		</li>
	</ul>
</nav>
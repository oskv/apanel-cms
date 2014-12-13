<?php
use yii\helpers\Html;

$this->title = $model->name;
?>
<article class="page-content">
	<h1><?= $this->title; ?></h1>
	<div class="txt">
		<? if($model->public){
			echo $model->text;
		}else{?>
			<p class="alert alert-warning">Контент еще не опубликован</p>
		<?}?>
	</div>
</article>
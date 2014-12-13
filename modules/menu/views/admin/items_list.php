<table class="table table-striped table-bordered table-hover menu-items">
	<thead>
	<tr>
		<th class="text-center" colspan="2">
			Пункты меню
			<a href="<?= \yii\helpers\Url::toRoute(['item-add', 'id_menu' => $menuModel->id ]);?>"
			   class="btn btn-success btn-sm pull-right">
				<span class="glyphicon glyphicon-plus"></span>
				Добавить
			</a>
		</th>
	</tr>
	</thead>
	<tbody>
	<?php echo $this->render('items', ['items'=>$items,'level'=>0]); ?>
	</tbody>
</table>
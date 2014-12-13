<?php
use yii\helpers\Url;

if(count($items)){
	for($i = 0; $i < count($items); $i++){
		?><tr class="level-<?php echo $level?>"><?php
		?><td>
		<div class="name"><?php
			for($j = 0; $j < $level; $j++){
				echo ' - ';
			}
			echo $items[$i]['elem']->name;?>
		</div>
		</td>
		<td class="text-center">
			<a href="<?= Url::toRoute(['item-edit', 'id' => $items[$i]['elem']->id ]);?>" class="btn btn-primary btn-xs">
				<span class="glyphicon glyphicon-edit"></span>Изменить
			</a>
			<a href="<?= Url::toRoute(['item-delete', 'id' => $items[$i]['elem']->id ]);?>"
			   confirm-dialog-type="href"
			   confirm-dialog
			   class="btn btn-danger btn-xs">
				<span class="glyphicon glyphicon-remove-circle"></span>Удалить
			</a>
		</td>
		</tr><?php
		if(isset($items[$i]['sub'])){
			echo $this->render('items', ['items' => $items[$i]['sub'], 'level'=>$level+1]);
		}
	}

	echo $this->render('@app/views/admin/dialog-confirm', [
		'title' 		=> 'Подтвердите действие',
		'text' 			=> 'Удалить?',
		'okTitle' 		=> 'Да',
		'cancelTitle' 	=> 'Отмена'
	]);
}

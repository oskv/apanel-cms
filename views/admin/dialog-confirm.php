<div id="confirmDialog" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?= $title; ?></h4>
			</div>
			<div class="modal-body">
				<p><?= $text; ?></p>
			</div>
			<div class="modal-footer">
				<a id="confirmOk" type="button" class="btn btn-primary"><?= $okTitle; ?></a>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?= $cancelTitle; ?></button>
			</div>
		</div>
	</div>
</div>
(function( $ ) {
	/// Custom checkboxes
	$.fn.apanelChecker = function() {
		this.each(function() {
			$(this).click(function(){
				var dataSet = $(this).attr('apanel-ckecker-set'), isCheckedParent = false;
				$(this).toggleClass('checked');
				if($(this).hasClass('checked')){
					isCheckedParent = true;
				}

				if(dataSet){
					$(dataSet).each(function() {
						$(this).find('input').prop('checked', isCheckedParent);
						if(isCheckedParent){
							$(this).addClass('checked');
						}else{
							$(this).removeClass('checked');
						}
					});
				}
			});
		});
	};

	///bootstrap confirm
	$.fn.bootstrap_confirm = function() {
		this.each(function() {
			$(this).click(function(e){
				e.preventDefault();
				$('#confirmDialog').modal('show');

				switch($(this).attr('confirm-dialog-type')){
					case 'href':
						$('#confirmOk').attr('href', $(this).attr('href'));
						break;
					case 'script':
						var script = $(this).attr('data-script');
						$('#confirmOk').click(function(){
							$('#confirmDialog').modal('hide');
							console.log($(this).attr('data-script'));
							eval(script);
						});
						break;
				}
			});
		});
	};

})(jQuery);
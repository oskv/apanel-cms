(function( $ ) {

	$.fn.sk_checker = function() {
		this.each(function() {
			$(this).click(function(){
				var dataSet = $(this).attr('sk_ckecker-data-set'), isCheckedParent = false;
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

})(jQuery);
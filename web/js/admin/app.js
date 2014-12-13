$( document ).ready(function() {
	app.start();
});

var app = {
	start : function(){
		app.initPlugins();
	},

	initPlugins : function(){
		$('[apanel-ckecker]').each(function() {
			$(this).apanelChecker();
		});

		if($('[rich-txt]').length){
			tinymce.init({selector: "[rich-txt]"});
		}

		$('[confirm-dialog]').each(function() {
			$(this).bootstrap_confirm();
		});
	}
};

window.app = app;
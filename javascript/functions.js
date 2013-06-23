function createOPML () {
	$('createOPML').addEvent('submit', function(e) {

		new Event(e).stop();

		var updateDiv = $('download_file').empty();
		
		var ajaxLoadingSpan = $('ajax-loading').addClass('ajax-loading');

		this.send({
			update: updateDiv,
			onComplete: function() {
				ajaxLoadingSpan.removeClass('ajax-loading');
			}
		});
	});
}

window.addEvent('domready', createOPML);
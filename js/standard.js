$(document).ready(function() {
	$('.more').click(function() {
		var id = $(this).attr('id').substring(5);
		$('#short-' + id).hide();
		$('#long-' + id).show();
	});
	$('.less').click(function() {
		var id = $(this).attr('id').substring(5);
		$('#short-' + id).show();
		$('#long-' + id).hide();
	});
	$('.viewer').click(function() {
		var jquery_this = $(this);
		var id = jquery_this.attr('id');
		$('.viewer').removeClass('active');
		if (id == 'all') {
			$('.newsitem:hidden', ".content").show();
		} else {
			$('.newsitem', ".content").hide().filter('.' + id).show();
		}
		jquery_this.addClass('active');
	});
});
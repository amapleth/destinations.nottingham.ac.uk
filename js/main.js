$(document).ready( function() {

	$(".subsect").hide();
	$(".subsubsect").hide();
	$(".subsubsubsect").hide();

	$(".tablerowtoggle").click( function() {
		var rowname = $(this).attr('id');
//		console.log('using '+rowname);
		var subrows = 'subs'+rowname;
//		console.log('toggling '+subrows);
		$("."+subrows).slideToggle(400);
	});

});
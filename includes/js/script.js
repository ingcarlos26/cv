/*

My Custom JS
============

Author:  Brad Hussey
Updated: August 2013
Notes:	 Hand coded for Udemy.com

*/

$(function() {

	$('#alertMe').click(function(e) {

		e.preventDefault();			//small command to prevent default behaviour of a link
		$('#successAlert').slideDown();

	});

	$('a.pop').click(function(e) {

		e.preventDefault();			//small command to prevent default behaviour of a link

	});

	$('a.pop').popover();

	$('[rel="tooltip"]').tooltip();

});
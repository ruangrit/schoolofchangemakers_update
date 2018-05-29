$ = jQuery;

$(document).ready(function() {
    $(window).load(function() {
	  var boldClass = $('.multiselect-container').first().find('.bold');
	  console.log(boldClass);
	  $(boldClass).each(function( index ) {
	    $(this).parents('li').addClass('dropdown-taxonomy-parent');
	  });
    });
});
$ = jQuery;
$(document).ready(function () {

	var problems = Drupal.settings.changemakers.problems;
	var idOfProblemAll = 'edit-field-problem-interest-und-171';
	$.each(problems, function( index, value ) {

		$('#edit-field-problem-interest-und-' + index).addClass('parent_checkbox');
		$('#edit-field-problem-interest-und-' + index).addClass('parent_checkbox_' + index);

		$.each(value, function( index_child, value_child ) {

			$('#edit-field-problem-interest-und-' + value_child).addClass('child_checkbox');
			$('#edit-field-problem-interest-und-' + value_child).addClass('child_checkbox_' + index);
			$('#edit-field-problem-interest-und-' + value_child).attr({'parentid': index});
		});

	});

	//============================= 
    $('.parent_checkbox').change(function () {
        if(this.checked) {
            $('.child_checkbox_'+this.value).prop("checked", true );
        }
        else {
            $('.child_checkbox_'+this.value).prop("checked", false);
            $('#' + idOfProblemAll).prop("checked", false );
        }

    });

    $('.child_checkbox').click(function () {

        if(!this.checked) {
            var parentId = $(this).attr('parentid');
            $('.parent_checkbox_'+parentId).prop("checked", false);
            $('#' + idOfProblemAll).prop("checked", false );
        }
    });
    // Check All
    $('#' + idOfProblemAll).click(function () {
        if(this.checked) {
        	$.each(problems, function( index, value ) {
	            $('.parent_checkbox_'+index).prop("checked", true );
	            $('.parent_checkbox_'+index).trigger('change');
        	});
        }
        else {
        	$.each(problems, function( index, value ) {
	            $('.parent_checkbox_'+index).prop("checked", false);
	            $('.parent_checkbox_'+index).trigger('change');
        	});
        }
    });



});
$ = jQuery;
$(document).ready(function () {

	var problems = Drupal.settings.changemakers.problems;
	var idOfProblemAll = 'edit-field-problem-interest-und-171';
	var problemFieldName = 'problem-interest'

	var skills = Drupal.settings.changemakers.skills;
	var idOfSkillAll = 'edit-field-event-skill-interest-und-173';
	var skillFieldName = 'event-skill-interest'


	loopAddClass(problems, problemFieldName);
	loopAddClass(skills, skillFieldName);

	function loopAddClass(taxonomyList, fieldName) {
		console.log(taxonomyList);

		$.each(taxonomyList, function( index, value ) {

			$('#edit-field-'+ fieldName +'-und-' + index).addClass('parent_checkbox');
			$('#edit-field-'+ fieldName +'-und-' + index).addClass('parent_checkbox_' + index);

			$.each(value, function( index_child, value_child ) {

				$('#edit-field-'+ fieldName +'-und-' + value_child).addClass('child_checkbox');
				$('#edit-field-'+ fieldName +'-und-' + value_child).addClass('child_checkbox_' + index);
				$('#edit-field-'+ fieldName +'-und-' + value_child).attr({'parentid': index});
			});

		});

	}
    // ========= Interest Check ============

    $('#edit-field-target-interest-und').find('input').addClass('child_checkbox');
    $('#edit-field-target-interest-und-172').removeClass('child_checkbox');
    $('#edit-field-target-interest-und-172').click(function () {
    	$('#edit-field-target-interest-und').find('input').prop("checked", this.checked);;
    });

	//============================= 
    $('.parent_checkbox').change(function () {
        if(this.checked) {
            $('.child_checkbox_'+this.value).prop("checked", true );
        }
        else {
            $('.child_checkbox_'+this.value).prop("checked", false);
	        var parentGroup = $(this).parents('.form-checkboxes');
	        var allCheckbox = parentGroup.find('input').first();
            allCheckbox.prop("checked", false );
        }


    });

    $('.child_checkbox').click(function () {

        if(!this.checked) {
            var parentId = $(this).attr('parentid');
            $('.parent_checkbox_'+parentId).prop("checked", false);
	        var parentGroup = $(this).parents('.form-checkboxes');
	        var allCheckbox = parentGroup.find('input').first();
            allCheckbox.prop("checked", false );
        }
    });

    //===========  Check All

    $('#' + idOfProblemAll).click(function () {
    	loopCheckAllChange(problems, this.checked);
    });
    $('#' + idOfSkillAll).click(function () {
    	loopCheckAllChange(skills, this.checked);
    });

    function loopCheckAllChange(taxonomyList, checked) {

    	$.each(taxonomyList, function( index, value ) {
            $('.parent_checkbox_'+index).prop("checked", checked);
            $('.parent_checkbox_'+index).trigger('change');
    	});

    }



});
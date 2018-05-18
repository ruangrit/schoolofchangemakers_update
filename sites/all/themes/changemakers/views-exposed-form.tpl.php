<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
$taxonomy_forums_tid=isset($_POST['taxonomy_forums_tid'])?$_POST['taxonomy_forums_tid']:'';
  // print "<pre>";
  // print_r( $form);
  // print "</pre>";
// if ($form['#form_id'] == 'views_exposed_form') {
//   $form['field_knowledge_problem_tid']['#type'] = 'checkbox';
//   $form['field_knowledge_problem_tid']['#theme'] = 'checkbox';
//   $form['field_knowledge_target_tid']['#type']='checkbox';
//   $form['field_knowledge_target_tid']['#theme']='checkbox';

 
// }

?>


<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>
<div class="views-exposed-form col-xs-12">
  <div class="views-exposed-widgets ">
    <?php foreach ($widgets as $id => $widget): ?>
   		<?php //print_r($id);?>

      <div id="<?php print $widget->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
        <?php if (!empty($widget->label)): ?>
          <label for="<?php print $widget->id; ?>">
            <?php print $widget->label; ?>
          </label>
        <?php endif; ?>
        <?php if (!empty($widget->operator)): ?>
          <div class="views-operator">
            <?php print $widget->operator; ?>
          </div>
        <?php endif; ?>
        <div class="views-widget">
       
       <?php print $widget->widget; ?>
        <?php /*if($id=="filter-field_profile_join_interest_value"):?>
        	<div class="col-sm-10 col-xs-10 col-md-10 col-lg-10">
        	<label><input type="checkbox" id="coach" value="เป็น Coach"> Coach</label>
        	<label><input type="checkbox" id="partner" value="เป็น Coach"> Partner</label>
        	</div>
      	<?php endif;*/?>
       
      
        </div>
        <?php if (!empty($widget->description)): ?>
          <div class="description">
            <?php print $widget->description; ?>
          </div>
        <?php endif; ?>
      </div>
  
    <?php endforeach; ?>
    <?php if (!empty($sort_by)): ?>
      <div class="views-exposed-widget views-widget-sort-by">
        <?php print $sort_by; ?>
      </div>
      <div class="views-exposed-widget views-widget-sort-order">
        <?php print $sort_order; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($items_per_page)): ?>
      <div class="views-exposed-widget views-widget-per-page">
        <?php print $items_per_page; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($offset)): ?>
      <div class="views-exposed-widget views-widget-offset">
        <?php print $offset; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($button)): ?>
    <div class="views-exposed-widget views-submit-button">
      <?php print $button; ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($reset_button)): ?>
      <div class="views-exposed-widget views-reset-button">
        <?php print $reset_button; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php
    /*if(arg(0) == "journal" && arg(1) == "list"){ ?>
    <div  id="journal-filter-design" class="views-exposed-widget views-widget-sort-order">
        <div class="form-item form-item-sort-order form-type-select form-group"> 
          <label class="control-label" for="edit-sort-order">JOURNAL </label>
          <select class="form-control form-select" id="filter-my-journal" >
            <option value="0">All</option>
            <option value="1">My Journal</option>
          </select>
        </div>      
    </div>

  <?php
    } */
   ?>
</div>
<script >
(function($) {
    $(document).ready(function(){
    	var taxonomy_forums_tid = '<?php echo $taxonomy_forums_tid; ?>';    	
    	if(taxonomy_forums_tid!=""){
	    	$('.txt__gray2').attr('href','/node/add/forum?taxonomy-forums-tid='+taxonomy_forums_tid);
	    }
      $("[multiple='multiple']").multiselect();
      //$('[multiple="multiple"]').multiselect();
      // $('#edit-status option[value="1"]').text('Verify');
      // $('#edit-status option[value="0"]').text('Unverify');
   
     /* $('input#coach').click(function(){
      	var checked = $('input#coach')[0].checked;
      	  if(checked==true){
	      	$('#edit-field-profile-join-interest-value').first().val('เป็น Coach');
	      
	      }else{
	      	$('#edit-field-profile-join-interest-value').val('')
	      }
	      	console.log($('#edit-field-profile-join-interest-value').val());
      });
      $('input#partner').click(function(){
      	var checked = $('input#partner')[0].checked;
      	  if(checked==true){
	      	$('#edit-field-profile-join-interest-value').last().val('เป็นผู้สนับสนุนโปรเจค');
	      	
	      }else{
	      	$('#edit-field-profile-join-interest-value').val('');
	      }
	      console.log($('#edit-field-profile-join-interest-value').val());
      });*/

      
      //var role = $('#check_role').val();
      //console.log("role=",role);
      // if(role == 1){
      //    $('#edit-taxonomy-forums-tid-wrapper').css('display','block');
      // }
      // else{
      //    $('#edit-taxonomy-forums-tid-wrapper').css('display','none');
      // }
     
       //$('#edit-taxonomy-forums-tid-wrapper').css({"display": "none !important"});     
       //$('#edit-field-knowledge-target-tid').multiselect();

   	});   

}(jQuery));
</script>
<?php
global $user;
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
print_r($breadcrumb);
?>

     <?php if (!empty($breadcrumb)): ?>
      <div class="breadcrumb--wrap">
      <div class="main--container <?php print $container_class; ?>">
      <?php print $breadcrumb; ?>
      </div></div>
      <?php endif; ?>

<div class=" pagetop--detail col-xs-12">
  <h1 class="headline__thaisan">Online Course</h1>
</div>

<div class="col-xs-12 margin__top20 pad0">
	<div class="col-xs-3 course--select">
        <div class="row">
      

		<ol id="course--lesson">
		<?php if((empty($_GET['field_for_course_tid'])  && empty($_GET['field_course_lession_value'])) || $_GET['field_for_course_tid']=="All"): ?>
            <?php if(!empty($user->roles[5])): ?>
            
            <div class="course--name"><h3 class="headline headline__thaisan"> <i class=" icon-book txt__18"></i> <a href="#" id="coach" >Online Course for Coach</a></h3></div>
              <li><div class="lesson--no">1</div><a href="#" id="lession5" > Hello!</a></li>
              <li><div class="lesson--no">2</div><a href="#" id="lession6" > Are you ready?</a></li>
              <li><div class="lesson--no">3</div><a href="#" id="lession7" > You better be prepared!</a></li>
              <li><div class="lesson--no">4</div><a href="#" id="lession8" >  Let's go (coaching)!</a></li>
              <li><div class="lesson--no">5</div><a href="#" id="lession9" > Hoorah!</a></li>
              <li><div class="lesson--no">6</div><a href="#" id="lession10" > More?</a></li>
            <?php else: ?>
            <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book txt__18"></i> <a href="#" id="cmk" >Online Course for Changemakers</a></h3></div>
            
              <li><a href="#" id="lession1" >Module 1 : Idea evelopment</a></li>
              <li><a href="#" id="lession2" >Module 2 : Model and Plan</a></li>
              <li><a href="#" id="lession3" >Module 3 : Take action</a></li>
              <li><a href="#" id="lession4" >Module 4 : Stepping to the next</a></li>
            <?php endif; ?>
            
            
          <?php elseif($_GET['field_for_course_tid']==580): ?>
            <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book txt__18"></i> <a href="#" id="cmk" >Online Course for Changemakers</a></h3></div>
            <li><a href="#" id="lession1" >Module 1 : Idea development</a></li>
            <li><a href="#" id="lession2" >Module 2 : Model and Plan</a></li>
            <li><a href="#" id="lession3" >Module 3 : Take action</a></li>
            <li><a href="#" id="lession4" >Module 4 : Stepping to the next</a></li>

          <?php elseif($_GET['field_for_course_tid']==581): ?>
            <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book txt__18"></i> <a href="#" id="coach" >Online Course for Coach</a></h3></div>
            <li><div class="lesson--no">1</div><a href="#" id="lession5" > Hello!</a></li>
            <li><div class="lesson--no">2</div><a href="#" id="lession6" > Are you ready?</a></li>
            <li><div class="lesson--no">3</div><a href="#" id="lession7" > You better be prepared!</a></li>
            <li><div class="lesson--no">4</div><a href="#" id="lession8" >  Let's go (coaching)!</a></li>
            <li><div class="lesson--no">5</div><a href="#" id="lession9" > Hoorah!</a></li>
            <li><div class="lesson--no">6</div><a href="#" id="lession10" > More?</a></li>
          <?php elseif(!empty($_GET['field_course_lession_value'])): ?>
            <?php if($_GET['field_course_lession_value']==5 || $_GET['field_course_lession_value']==6 || $_GET['field_course_lession_value']==7 || $_GET['field_course_lession_value']==8 || $_GET['field_course_lession_value']==9 || $_GET['field_course_lession_value']==10   ): ?>
            <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book txt__18"></i> <a href="#" id="coach" >Online Course for Coach</a></h3></div>
            <li><div class="lesson--no">1</div><a href="#" id="lession5" > Hello!</a></li>
            <li><div class="lesson--no">2</div><a href="#" id="lession6" > Are you ready?</a></li>
            <li><div class="lesson--no">3</div><a href="#" id="lession7" > You better be prepared!</a></li>
            <li><div class="lesson--no">4</div><a href="#" id="lession8" >  Let's go (coaching)!</a></li>
            <li><div class="lesson--no">5</div><a href="#" id="lession9" > Hoorah!</a></li>
            <li><div class="lesson--no">6</div><a href="#" id="lession10" > More?</a></li>
            <?php else: ?>
            <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book txt__18"></i> <a href="#" id="cmk" > Online Course for Changemakers</a></h3></div>
              <li><a href="#" id="lession1" >Module 1 : Idea development</a></li>
              <li><a href="#" id="lession2" >Module 2 : Model and Plan</a></li>
              <li><a href="#" id="lession3" >Module 3 : Take action</a></li>
              <li><a href="#" id="lession4" >Module 4 : Stepping to the next</a></li>
            <?php endif; ?>
          <?php endif; ?>
		</ol>
	</div>
    </div>
	<div class="col-xs-9" style="padding-right:0;">
        <div class="course--list col-xs-12">
		<?php foreach ($rows as $id => $row): ?>
		 <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
		    <?php print $row; ?>
		 </div>
		<?php endforeach; ?>
	</div>
    </div></div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		<?php if(empty($_GET['field_for_course_tid']) && empty($_GET['field_course_lession_value'])): ?>
      
      <?php if(!empty($user->roles[5])): ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
      <?php else: ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
      <?php endif; ?>
    <?php elseif(!empty($_GET['field_course_lession_value'])): ?>
    
        <?php if($_GET['field_course_lession_value']==5 || $_GET['field_course_lession_value']==6 || $_GET['field_course_lession_value']==7 || $_GET['field_course_lession_value']==8 || $_GET['field_course_lession_value']==9 || $_GET['field_course_lession_value']==10): ?>
          $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
        <?php elseif($_GET['field_course_lession_value']==1 || $_GET['field_course_lession_value']==2 || $_GET['field_course_lession_value']==3 || $_GET['field_course_lession_value']==4): ?>
          $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
          <?php else: ?>
              <?php if($_GET['field_for_course_tid']==581): ?>
              $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
              <?php else: ?>
              $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
            <?php endif; ?>
      <?php endif; ?>
    <?php else: ?>

      <?php if($_GET['field_for_course_tid']==581): ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
      <?php else: ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
      <?php endif; ?>
    <?php endif; ?>
		
		// $("#edit-field-for-course-tid").val("581").change();
		$("#edit-field-for-course-tid").change(function (e) {

			 $("#edit-field-course-lession-value").val("All").change();
		});
		
		$("#lession1").click(function(event) {
			$("#edit-field-course-lession-value").val("1").change();
			 $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');

		});
		$("#lession2").click(function(event) {
			$("#edit-field-course-lession-value").val("2").change();
			 $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
		});
		$("#lession3").click(function(event) {
			$("#edit-field-course-lession-value").val("3").change();
			 $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
		});
		$("#lession4").click(function(event) {
			$("#edit-field-course-lession-value").val("4").change();
			 $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
		});
		$("#lession5").click(function(event) {
			$("#edit-field-course-lession-value").val("5").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#lession6").click(function(event) {
			$("#edit-field-course-lession-value").val("6").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#lession7").click(function(event) {
			$("#edit-field-course-lession-value").val("7").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#lession8").click(function(event) {
			$("#edit-field-course-lession-value").val("8").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#lession9").click(function(event) {
			$("#edit-field-course-lession-value").val("9").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#lession10").click(function(event) {
			$("#edit-field-course-lession-value").val("10").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
		$("#cmk").click(function(event) {
			$("#edit-field-for-course-tid").val("580").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
		});
		$("#coach").click(function(event) {
			$("#edit-field-for-course-tid").val("581").change();
			$('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
		});
	});
</script>

 

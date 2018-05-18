<?php
global $user;
/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php else: ?>
    
  <div class=" pagetop--detail col-xs-12">
  <h1 class="headline__thaisan">Online Course</h1>
</div>
    
    
<div class="col-xs-12 margin__top20 pad0">
	<div class="col-xs-3 course--select">
        <div class="row">
         <ul id="course-lesson">
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
              <div class="course--name"><h3 class="headline headline__thaisan"><i class=" icon-book-open txt__18"></i> <a href="#" id="coach" >Online Course for Coach</a></h3></div>
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
            </ul>
        </div></div>
        <div class="col-xs-9 " style="padding-right:0;">
     
           <div class="course--content col-xs-12 txt__center">
            <h2 class="headline__thaisan" id="lesstion_title"></h2>
              อยู่ในระหว่างการจัดทำ
           </div>
        
        </div>
      </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    <?php if(empty($_GET['field_for_course_tid']) && empty($_GET['field_course_lession_value'])): ?>
      //alert(1);
      <?php if(!empty($user->roles[5])): ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('581');
      <?php else: ?>
      $('#edit-field-for-course-tid').find('option').remove().end().append('<option value="580" >Changemakers</option><option value="581" >Coach</option>').val('580');
      <?php endif; ?>
    <?php elseif(!empty($_GET['field_course_lession_value'])): ?>
    //alert(2);
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
    // alert(3);
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
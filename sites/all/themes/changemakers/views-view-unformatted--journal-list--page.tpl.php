<?php
global $user;
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

    <?php if(empty($user->roles[6])) :?>
<div class="btn--addjournal ">
      <?php if(changemakers_check_user_login()){ 
      	// $taxonomy_forums_tid= $_POST['taxonomy_forums_tid'];?>
      	<?php if(!empty($user->roles[5])): ?>
      		<a  href="/node/add/journal?type_coach=1" class="txt__gray2 " >
            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
	        	<i class="icon-plus-circled txt__yellow"></i>เพิ่มบันทึกใหม่
	      	</a>
      	<?php else: ?>
			<a  href="/node/add/journal" class="txt__gray2 " >
	            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
	        	<i class="icon-plus-circled txt__yellow"></i>เพิ่มบันทึกใหม่
	      	</a>
      	<?php endif; ?>
  		
      <?php }else{ ?>
        <a href="" data-toggle="modal" data-target="#myLogin" class="txt__gray2 ">
            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
        <i class="icon-plus-circled txt__yellow"></i>เพิ่มบันทึกใหม่
      </a>
      <?php } ?>
</div>
<?php endif; ?>

<?php if(user_access('can_access_my_journal')){ 
  $check_my_journal = changemakers_check_my_journal();
  if($check_my_journal > 0){
  ?>
  <div id="journal-filter-design" class="views-exposed-widget views-widget-filter-field_journal_problem_tid">
        <label for="edit-field-journal-problem-tid">
        JOURNAL        
       </label>
      <select id="filter-my-journal">
        <option value="0">All</option>
        <option value="1">My Journal</option>
      </select>
  </div>
  <?php } ?>
<?php } ?>

<div class="journal--page">

<div class=" page__topmargin col-xs-12">
<div class="row">
<h2 class="headline headline__alte float__left">JOURNAL</h2>


    
    </div></div>
<?php
 ?>
<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>
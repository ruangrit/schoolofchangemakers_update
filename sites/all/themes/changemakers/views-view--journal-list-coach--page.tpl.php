<?php

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

   	    <?php if(empty($user->roles[6])) : ?>
<div class="btn--addjournal">
      <?php if(changemakers_check_user_login()){ 
      	// $taxonomy_forums_tid= $_POST['taxonomy_forums_tid'];?>
  		<a  href="/node/add/journal" class="txt__gray2 " >
            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
        <i class="icon-plus-circled txt__yellow"></i>เพิ่ม Coach Journal
      </a>
      <?php }else{ ?>
        <a href="" data-toggle="modal" data-target="#myLogin" class="txt__gray2 ">
            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
        <i class="icon-plus-circled txt__yellow"></i>เพิ่ม Coach Journal
      </a>
      <?php } ?>
</div>

<?php //print_r(trim(arg(0))); ?>
<?php if(user_access('can_access_my_journal')){ 
  $check_my_journal = changemakers_check_my_journal();
  if($check_my_journal > 0){
    if(trim(arg(0)) == "my-coach-journal"){
  ?>
      <div id="journal-filter-design" class="views-exposed-widget views-widget-filter-field_journal_problem_tid">
            <label for="edit-field-journal-problem-tid">
            JOURNAL        
           </label>
          <select id="filter-my-coach-journal">
            <option value="0">All</option>
            <option selected="selected" value="1">My Coach Journal</option>
          </select>
      </div>
    <?php }else{ ?>
      <div id="journal-filter-design" class="views-exposed-widget views-widget-filter-field_journal_problem_tid">
            <label for="edit-field-journal-problem-tid">
            JOURNAL        
           </label>
          <select id="filter-my-coach-journal">
            <option value="0">All</option>
            <option value="1">My Coach Journal</option>
          </select>
      </div>
    <?php } ?>
  <?php } ?>

  <?php 
      // print "<pre>";
      // print_r($rows);
      // print "</pre>";
      if(empty($rows)){
        ?>
        <div class="col-xs-12 commu--table">
          <div class="row">
            <p>ไม่มีข้อมูล Coach Journal</p>
          </div>
        </div>
        <?php
      }
      ?>
<?php } ?>


<?php endif; ?>
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
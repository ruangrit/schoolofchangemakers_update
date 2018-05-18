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
<?php if(!isset($user->roles[3]) && !isset($user->roles[8])):?>
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
  <?php else:?>
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 campaign--list margin__top30">
      <h3 class="active--campaign">ACTIVE <br> CAMPAIGNS</h3>
      <div class="releted--campaigns">
        <h3>0</h3>
        <p>Related Campaigns</p>      
      </div>
      <div class="project--campaigns">
        <h3>0<?php //print_r(changemaker_halper_campaign_in_project());?></h3>
        <p>Project in these campaigns</p>
      </div>
    </div>
  <?php endif; ?>
<?php 
// print "<pre>";
// print_r(changemakers_helper_campaign_join_project());
// print "</pre>";
?>

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
      <?php //print views_embed_view('active_campaigns', $display_id = 'block'); ?>
      

    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php else: ?>
    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
     <div  class="margin__top30 txt__center col-xs-12 set-non-campaign "><h4 class="headline__thaisan">ไม่มีแคมเปญ</h4><br><br></div>
      <br><br>
     
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
<?php else:?>
<p>You are not authorized to access this page.</p>
<?php endif;?>
<br><br>
<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 campaign--list margin__top30">
  <h3 class="active--campaign">PUBLIC <br> CAMPAIGNS</h3>

</div>

<div class="col-xs-12  lightgray--boxr">
  <div class="row">
    <?php

    $user_data = user_load($user->uid);



    $user_related_campaign = changemakers_get_user_related_campaign_my_campaign($user_data->field_profile_problem_interest['und'], $user_data->field_profile_target_group['und']);

    // print "<pre>";
    // print_r($user_related_campaign);
    // print "</pre>";.
    if(count($user_related_campaign) == 0){
      ?>
      <div  class="margin__top30 txt__center col-xs-12 set-non-campaign "><h4 class="headline__thaisan">ไม่มีแคมเปญที่เกี่ยวข้องกับคุณ</h4><br><br></div>
      <br><br>
      <?php
    }
    foreach ($user_related_campaign as $key => $value) { ?>
        

        
        <div class="col-xs-3 box__pad6">
          <a href="/<?php print $value['path']; ?>">
            <div class="page1-4--box">
                
              <div class="thumb">
                <img  src="<?php print $value['picture'];?>">
              </div>
            
          
                      
                          
              <div class="field--content ">
                  <div class="h4--linelimit__2 title">
                      <h4 class="headline__thaisan">
                          <?php print $value['title'];?>
                      </h4>
                  </div>
                  <div class="detail__small d__inline-block">
                      <div class="txt__gray" style="font-style: italic;">กำลังรับสมัคร</div>
                 
                      <div class="txt__gray margin__top5">Campaign Period</div>
                      <div class="txt__black"><?php print $value['last_update'];?></div>
                  </div>
                  <div class="detail__medium txt__blue margin__top5"><?php print $value['project_related'];?> Projects Selected</div>
              
              </div>
            </div>
            </a>
        </div>
            
    <?php } ?>
  </div>
</div>

<?php print views_embed_view('ended_campaigns', $display_id = 'block'); ?>

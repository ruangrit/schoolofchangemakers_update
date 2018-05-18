<?php 
global $user;

if(isset($user->roles[3]) || isset($user->roles[5])){
  $role = 1;
}else{
  $role = 0;
}


?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
 
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
  <?php else:?>
    <div class="view-empty">
        <div class="btn--newpost">
                <a href="/node/add/forum?taxonomy-forums-tid=7" class="txt__gray2 edit_community">
                <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
            <i class="icon-plus-circled txt__yellow"></i>เพิ่มโพสต์ใหม่
          </a>
        </div>
        <div class="col-xs-12 commu--table">
          <div class="row">
            <p>ไม่มีข้อมูล Community</p>
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

</div>
<script type="text/javascript">  
  (function($) {
    $(document).ready(function(){
     
      var role = '<?php echo $role;?>';
     
      if(role != 1 || role=="undefined"){
         $('#edit-taxonomy-forums-tid-wrapper').css('display','none');
      }
      else{
         $('#edit-taxonomy-forums-tid-wrapper').css('display','block');
      }
      
    });   
}(jQuery));
</script>
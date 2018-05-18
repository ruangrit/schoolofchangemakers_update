<?php 
global $user;


// print '<pre>';
// print_r($user->roles);
// print '</pre>';
$check = 0;
if(isset($user->roles[3]) || isset($user->roles[5])){
  $check = 1;
}


?>
<?php //  if(!isset($user->roles[6]) && !isset($user->roles[9])): ?>
<div class="btn--newpost">
      <?php 
      if($user->uid!=0){
      if(!isset($user->roles[6])){
            if(changemakers_check_user_login()){ 
      	// $taxonomy_forums_tid= $_POST['taxonomy_forums_tid'];?>
        		<a  href="/node/add/forum?taxonomy-forums-tid=1" class="txt__gray2" >
                  <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
              <i class="icon-plus-circled txt__yellow"></i>เพิ่มโพสต์ใหม่
            </a>
      <?php }else{ ?>
            <a href="" data-toggle="modal" data-target="#myLogin" class="txt__gray2">
                  <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
              <i class="icon-plus-circled txt__yellow"></i>เพิ่มโพสต์ใหม่
            </a>
      <?php } 
      }
      }?>
</div>
<?php//endif;?>

<div class="col-xs-12 header-filter-community-page-unformatted">

    <form class="ctools-auto-submit-full-form ctools-auto-submit-processed" action="/community/list/page" method="get" id="community_page" accept-charset="UTF-8">
         <input type="hidden" id="check_role" value="<?php print $check; ?>">
          <!-- THEME DEBUG -->
          <!-- CALL: theme('views_exposed_form') -->
          <!-- BEGIN OUTPUT from 'sites/all/modules/views/theme/views-exposed-form.tpl.php' -->
          <div class="views-exposed-form views-exposed-form-project-page">

              <!-- <div id="edit-taxonomy-forums-tid--5-wrapper" class="views-exposed-widget views-widget-filter-taxonomy_forums_tid">
                  FILTER BY TYPE          
                  <select id="edit-taxonomy-forums-tid--5" onchange="submitFunction()" name="taxonomy_forums_tid" class="form-select">
                    <option value="All">ALL</option>
                    <option value="1">Need</option>
                    <option value="2">Announcement</option>
                    <option value="3">Offer</option>
                  </select>
              </div> -->

  	<!-- <div >
  		
  		<span>
  			<select  class="selectpicker">
  				<option>Need</option>
			    <option>Offer</option>
			    <option>Announcement</option>
			    <option>Idea</option>
			    <option>Q & A</option>
  			</select>
  		</span>
  	</div> -->
              
<!--              
  	<div class="col-xs-2 btn__newpost">
  		<a href="/node/add/forum">-->
            <!--<img class="image_width_icon" src="/sites/all/themes/changemakers/images/plus.png">-->
<!--        <i class="icon-plus-circled txt__yellow"></i>
        </a> เพิ่มโพสต์ใหม่
  	</div>-->
              
    </div>
    <!-- END OUTPUT from 'sites/all/modules/views/theme/views-exposed-form.tpl.php' -->
        
    </form>
              
              
  </div>
  
    
        
  <div class="col-xs-12 commu--table">
    <div class="row">
   <!--  <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead> -->
    
      
       <?php

      /**
       * @file
       * Default simple view template to display a list of rows.
       *
       * @ingroup views_templates
       */
      ?>

      <?php if (!empty($title)): ?>
        <h3><?php print $title; ?></h3>
      <?php endif; ?>
      <?php foreach ($rows as $id => $row):?>
        <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  

<script>

  // var val_prob = getParameterByName('taxonomy_forums_tid');
  // if(val_prob)
  // {
  //    document.getElementById("edit-taxonomy-forums-tid--5").value = val_prob;
  // }
  // else
  // {
  //    document.getElementById("edit-taxonomy-forums-tid--5").value = "All";
  // }


  // function submitFunction() {
  //     document.getElementById("community_page").submit();
  // }
  // function getParameterByName(name) {
  //     name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  //     var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  //         results = regex.exec(location.search);
  //     return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  // }
</script>




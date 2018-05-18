
<style type="text/css">
    #edit-field-journal-project-id-und-0-value{
        display: none;
    }
    #edit-comment-body-und-0-format--2{
        display: none;
    }
    .tabbable .tabs-left .vertical-tabs .clearfix .bootstrap-tabs-processed{
        display: none;
    }
    .img-project{
        width: 100%;
    }
    .btn .btn-default .form-submit .ajax-processed{
        display: none;
    }
    #edit-field-journal-image-und-0-upload-button{
        display: none;
    }
    #edit-field-journal-image-other-und-0-upload-button{
        display: none;
    }
    #edit-field-journal-document-und-0-upload-button{
        display: none;
    }
    .webform-component--nid{
        display: none;
    }
    /*#edit-field-project-related-und:disabled {
        background: #dddddd;
    }*/
/*    #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }*/

</style>
<?php 
global $user;
//load data
// UPDATE table_name
// SET column1=value1,column2=value2,...
// WHERE some_column=some_value;



$node = node_load($nid);


$commu_project = changemakers_get_project_join_community($node->nid);


$data_user_org = user_load($user->uid);
//$data_my_project = user_load($node->uid);

$check_org = 0;
if($user->roles[6]){
    foreach ( $node->field_organization_project['und'] as $key => $value) {
        if( $data_user_org->field_organization['und'][0]['tid'] == $value['tid']){
           $check_org = 1;
        }
    }
}


// print_r($count_view);
// db_update('field_data_field_count_views_project')
//     ->fields(array('field_count_views_project_value' => $count_view))
//     ->condition('entity_id', $node->nid)
//     ->execute();
// print_r($count_view);
// print_r($nid);
//changemakers_update_view($count_view , $nid);



// db_update('field_count_views_project')
//   ->fields(array(
//     'field_count_views_project_value' => $count_view,
//   ))
//   ->condition('entity_id',$nid)
//   ->execute();

//db_query("UPDATE field_data_field_count_views_project SET field_count_views_project_value = '%d' WHERE entity_id = %d", $count_view, $nid );
// 

$data_user_request_join_project = changemakers_get_request_join_project();
$result = changemakers_get_data_from_webform_project($nid);
$fund = changemakers_get_data_from_webform_project_fund($nid);
$checkJoinProject = changemakers_check_join_project($result, $nid);
$checkJoinProject_status = changemakers_check_join_project_status($result, $nid);
$journal_data = changemakers_get_journal($nid);
//user create node
$user_fields = user_load($node->uid);
$user_picture =  $node->picture->uri;

$user_following_project = changemakers_get_following_project($nid);
//$user_request_join_project = changemakers_get_following_project($nid);

$project_join_campaign = changemakers_get_join_campaign($nid);

/*************get form_build_id***************/
$form_build_id = 'form-' . md5(uniqid(mt_rand(), TRUE));

$form_token =  drupal_get_token('webform_client_form_2');

$form_token_fund =  drupal_get_token('webform_client_form_92');

$myData = user_load($user->uid);

$check_follow_project = 0;
for ($i=0; $i < count($myData->field_following_project['und']) ; $i++) { 
    if($myData->field_following_project['und'][$i]['nid'] == $nid){
        $check_follow_project = 1;
    }
}

$check_join_project_status = changemakers_check_join_project_status($result, $nid);
$check_coach_project_status = changemakers_check_team_project_status($nid);
$get_progress_project  = changemakers_get_progress_project($node->field_project_progress['und'][0]['value']);
$checkTeamAssignAdmin = changemakers_get_status_team($nid);
$checkTeamAssignAdmin_org = changemakers_get_status_team_org($nid);
$checkTeamAssignAdmin_journal = changemakers_get_status_journal_team($nid);
$checkTeamUploadDoc = changemakers_get_role_upload_document($nid);
$check_partner_project = changemakers_get_status_team_partner($nid);

// print "<pre>";
// print_r($node->picture->uri);
// print "</pre>";




$select_type = $_GET['type'];


if($_SERVER['REQUEST_URI']!='/'):
?>


<div class="col-xs-12 pagebigtab">
    
    <input type="hidden" id="node_id" value="<?php print $nid; ?>">
    
	<div class="thumb field-name-field-project-image">
        <?php
        $img = explode( '://', $node->field_project_image['und'][0]['uri'] ); 
        $image = image_style_url("large", $node->field_project_image['und'][0]['uri']); 
        $org_image = file_create_url($node->field_project_image['und'][0]['uri']);

        ?>
        <?php if($node->field_project_image['und'][0]['filename']){ ?>
		<a href="<?php print $org_image;?>" rel="lightbox" ><img class="image-width-project" src="<?php print $image; ?>"></a>
        <?php }else{ ?>

        <a href="/sites/all/themes/changemakers/images/project1.jpg" rel="lightbox" ><img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg"></a>
        <?php } ?>
	
    </div>
    
	<div class="pagebigtab--detail  ">
        
        <div class="pagebigtab-detail--name">
            <h1 class="headline__thaisan pagebigtab--name clear"><?php  print $node->title; 
            // print "<pre>";
            // print_r($node);
            // print "</pre>";

            ?></h1>

             <div class="detail__medium clear" >
                 <div class="taglinelimit__1">
                 
                 <?php if(!empty($node->field_problem_topic['und'])){  ?>
                 <span class=" icon-tag"></span> 
                 <?php } ?>
                 <input type="hidden" id="tax_problem" name="tax_problem" value="project">

                <?php 
                // print "<pre>";
                // print_r($node->field_problem_topic['und']);
                // print "</pre>";


                $problem_tax =array();
                for ($i=0; $i < count($node->field_problem_topic['und']) ; $i++) { ?>
                <input type="hidden" id="tax_problem_value[<?php print $i ?>]" name="tax_problem_value[<?php print $i ?>]" value="<?php print $node->field_problem_topic['und'][$i]['tid']; ?>">
                
                <?php
                    if($node->field_problem_topic['und'][$i]['taxonomy_term']->name!= "All" ):

                        $problem_tax[] =$node->field_problem_topic['und'][$i]['taxonomy_term']->name;
                        
                    
                    endif;
                    
                } 
                if(count($problem_tax)<62): ?>
                    <?php print implode(", ", $problem_tax)?>
                <?php else: ?>
                     All

                <?php endif; ?>
                
                 </div>
                 
                 
                
                 <div class="taglinelimit__1">
                <?php if(!empty($node->field_project_target['und'])){ ?>
                 <span class="icon-target"></span> 
                <?php 
                 }
                $target_tax = array();
                for ($i=0; $i < count($node->field_project_target['und']) ; $i++) {   ?>
                
                <input type="hidden" id="tax_target_value[<?php print $i ?>]" name="tax_target_value[<?php print $i ?>]" value="<?php print $node->field_project_target['und'][$i]['tid']; ?>">

                <?php

                    if($node->field_project_target['und'][$i]['taxonomy_term']->name!= "All" ):
                        if($node->field_project_target['und'][$i]['taxonomy_term']->name == "อื่น ๆ (ระบุ)"){
                            $target_tax[] =$node->field_project_target_other['und'][0]['value'];       
                        }else{
                            $target_tax[] =$node->field_project_target['und'][$i]['taxonomy_term']->name; 
                        }
                   
                    endif;
              
                }
                 if(count($target_tax)<12): ?>
                    <?php print implode(", ", $target_tax)?>
                <?php else: ?>
                     All

                <?php endif; ?>
                 </div><br>
            </div>
        </div>
        
        <!--Short Detail-->
        <div class="pagebigtab--detail--box--wrap" style="margin-top:15px; padding-rignt:10px;">
            
                <div class="pagebigtab--detail--box detail--icon--update">
                    <p class="pagebigtab--detail-topic">LAST UPDATE ON</p>
                    <p class="pagebigtab--detail-txt"><?php print changemakers_format_date_thai_short($node->changed); ?></p>
                </div>
                
                <div class="pagebigtab--detail--box detail--icon--verification">
                    <p class="pagebigtab--detail-topic">VERIFICATION</p>
                    <p class="pagebigtab--detail-txt"><?php
                        if($node->field_verification['und'][0]['value'] == 1){
                            print "Verified";
                        }else if($node->field_verification['und'][0]['value'] == 2){
                            print "Not verified";
                        } 
                        elseif($node->field_verification['und'][0]['value'] == 3){
                            print "Unverified";
                        }else{
                             print "Unverified";
                        }

                    ?></p>
                </div>
                
                <div class="pagebigtab--detail--box detail--icon--project">
                    <p class="pagebigtab--detail-topic">PROJECT STAGE</p>
                    <p class="pagebigtab--detail-txt"><?php print $get_progress_project; ?></p>
                </div>
                
                
                <div class="pagebigtab--detail--box detail--icon--update">
                    <p class="pagebigtab--detail-topic">PROJECT STARTED ON</p>
                    <p class="pagebigtab--detail-txt"><?php print changemakers_format_date_thai_short($node->created); ?></p>
                </div>
                
                <div class="pagebigtab--detail--box detail--icon--status">
                    <p class="pagebigtab--detail-topic">PROJECT STATUS</p>
                    <?php
                      // print "<pre>";
                      // print_r($node->field_project_status['und'][0]['value']);
                      // print "</pre>";
                     ?>
                    <p class="pagebigtab--detail-txt"><?php if($node->field_project_status['und'][0]['value'] == 1){
                        print "Active";
                    }
                    else{
                        print "Not Active";
                    }
                    ;?></p>
                </div>
                <?php
                 $result_views = db_select('field_data_field_count_views_project', 'n')
                ->fields('n')
                ->condition('entity_id', $node->nid,'=')
                ->execute()
                ->fetchAssoc();

                ?>
                <div class="pagebigtab--detail--box detail--icon--view" data-pid="<?php echo $node->nid;?>">
                    <p class="pagebigtab--detail-topic">VIEWS</p>
                    <p class="pagebigtab--detail-txt"><?php print $result_views['field_count_views_project_value'];//$node->field_count_views_project['und'][0]['value']; ?></p>
                </div>
            
        </div>

        
        <div class=" pagebigtab--social--wrap txt__center" style="margin-top:15px; ">
        
            <!-- Load Facebook SDK for JavaScript -->
<!--             <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.7&appId=1044418628957648";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


            <div class="fb-share-button" 
            data-href="https://developers.facebook.com/docs/plugins/" 
            data-layout="button_count" 
            data-size="large" 
            data-mobile-iframe="true">
            <a class="fb-xfbml-parse-ignore" 
            target="_blank" 
            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">แชร์</a>
            </div> -->
            <!--Social-->
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>



           <!--  <div class="page-header">
              <h1>Share Dialog</h1>
            </div>

            <p>Click the button below to trigger a Share Dialog</p>

            <div id="shareBtn" class="btn btn-success clearfix">Share</div>

            <p style="margin-top: 50px">
              <hr />
              <a class="btn btn-small"  href="http://changemakers.devfunction.com/project/116">Share Dialog Documentation</a>
            </p> -->


            <!--
            <div class="socialshare--box">
                <a target="_blank" href="https://www.facebook.com/AshokaThailand" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
                
                <div class="socialshare--total"><span class="txt__bold">365</span><br/>Share</div>
            </div>
                
            
            <div class="socialshare--box">
                
                <a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
                <div class="socialshare--total">365<br/>Share</div>    
            </div>
             
                    
            
            <div class="socialshare--box">
    			
    			<a href="#twitter" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
                <div class="socialshare--total">25<br/>Tweets</div>    
            </div>
            -->
                
               <!-- <button class="btn btn--submit pagebigtab__2btn"><i class="icon-link"></i> Join Project</button>
                <button class="btn btn--submit pagebigtab__2btn"><i class="icon-forward"></i>Follow Project</button>
                -->
                
            <!--Sent project-->	
            <?php 
                // print "<pre>";
                // print_r($checkJoinProject_status);
                // print "</pre>";

                // // print "<pre>";
                // // print_r($checkJoinProject);
                // // print "</pre>";

                // print "<pre>";
                // print_r($user->roles[4]);
                // print "</pre>";

                

             ?>        
        <div class="sidebar--line2 margin__topbut10"></div>
        <!--<div class="project--btn--status ">-->
         <?php if($checkJoinProject_status == 1){ ?>
                
                <span class="joinproject-prove"><i class=" icon-group"></i> เป็นสมาชิกเรียบร้อยแล้ว</span>
       
         
  
         <?php } 

         // print_r($checkJoinProject_status);
         // print_r($checkTeamAssignAdmin);
         // print_r($node->uid);

         ?>
            <?php if($checkTeamAssignAdmin == 0 && $checkJoinProject_status == 0 && $user->uid > 0 && $user->uid != $node->uid  && user_access('can_join_project')
            || $checkTeamAssignAdmin == 0 && $checkJoinProject_status == 3 && $user->uid > 0 && $user->uid != $node->uid && user_access('can_join_project') ){ ?>
			
				<form class="webform-client-form webform-client-form-2 pagebigtab__2btn" enctype="multipart/form-data" action="/changemakers/join-project" method="post" id="webform-client-form-2" accept-charset="UTF-8">
					

						<!-- THEME DEBUG -->
						<!-- CALL: theme('webform_form') -->
						<!-- BEGIN OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->
						<div class="form-item webform-component webform-component-number webform-component--uid form-group">
						  
						 <input class="form-control form-text form-number"  value="<?php echo $user->uid; ?>"  type="hidden" id="edit-submitted-uid" name="submitted[uid]" step="any">
						</div>
						<div class="form-item webform-component webform-component-number webform-component--nid form-group">
						 
						 <input class="form-control form-text form-number" value="<?php echo $nid; ?>" type="hidden" id="edit-submitted-nid" name="submitted[nid]" step="any">
						</div>
						<div class="form-item webform-component webform-component-number webform-component--status form-group">
						  
						 <input class="form-control form-text form-number" type="hidden" id="edit-submitted-status" name="submitted[status]" value="0" step="any">
						</div>
						<input type="hidden" name="details[sid]">
						<input type="hidden" name="details[page_num]" value="1">
						<input type="hidden" name="details[page_count]" value="1">
						<input type="hidden" name="details[finished]" value="0">
						<input type="hidden" name="form_build_id" value="<?php echo $form_build_id; ?>">
						<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
						<input type="hidden" name="form_id" value="webform_client_form_2">
						
                        
                        <?php if ($checkJoinProject_status  == 0) { ?>
                            <span class="joinproject-wait">รอการอนุมัติ</span>
                        <?php }else{ ?>
                    
                            <button class="btn btn--submit " type="submit" name="op" value="Submit"><i class="icon-link"></i> 
                            Join Project</button>
                        <?php } ?>
                            
						
						<!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

					
				</form>
			
				<?php if($check_follow_project == 0 && $checkJoinProject_status == 0  || $check_follow_project == 0 && $checkJoinProject_status == 3 ){ ?>
				<form action="/changemakers/following-project" method="post" class="pagebigtab__2btn" >
					<input type="hidden" name="node_id" value="<?php echo $nid;?>">
                    
                    <button class="btn btn--submit "   type="submit" value="submit"><i class="icon-forward"></i>
					Follow Project</button>
				</form>
				<?php } ?>
            
		      <?php } ?>
                
            <?php if($check_follow_project == 1){ ?>    

            <form action="/changemakers/unfollowing-project" method="post"  class="pagebigtab__2btn" >
                    <input type="hidden" name="node_id" value="<?php echo $nid;?>">
                    
                    <button type="submit" value="submit" class="btn btn--delete "><i class="icon-forward"></i> Unfollow Project</button>
            </form>
            
            <?php } ?>
		
	        
        

	</div>
	</div>
    <!--
	<div class="col-xs-3">
		<div class="col-xs-3 padding-header button-float-right">
			<a >
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
			</a>
		</div>
		<div class="col-xs-3 padding-header button-float-right">
			<a >
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/twitter_icon.png"></p>
			</a>
		</div>-->
    
     
		
	
    
	
</div>
<br/><br/><br/>
<?php 
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_ac_fund = explode("?", $actual_link);

 $comments_node = db_select('comment')
              ->fields('comment', array('name','subject'))
              ->condition('nid', $nid, '=')
              ->execute()
              ->fetchAssoc();



   
if($url_ac_fund[1] == "fund=fund"){
    $class_active = "fund";
}
else if($url_ac_fund[1] == "type=participation"){
     $class_active = "participation";
}
else if($url_ac_fund[1] == "type=document" ){
    $class_active = "document";
}
else if(empty($comments_node) || $nid == 2474){
    $class_active = "about";
}elseif(isset($comments_node)){
    $class_active = "timeline";
}


// print "<pre>";
// print_r($comments);
// print "</pre>";
?>
<div class="margin-top-header">    
   <ul class="pagebigtab--nav list-inline col-xs-12" role="tablist">

            <li role="presentation" <?php if($class_active == "timeline"){ print "class ='active'";} ?>  >
            <a href="#timeline" class="pagebigtab--nav--list nav--timeline "  aria-controls="timeline" role="tab" data-toggle="tab">
                TIMELINE<div class="nav--timeline--icon"></div>
            </a>
            </li>


            <li role="presentation">
            <a href="#journal" class="pagebigtab--nav--list nav--journal" aria-controls="journal" role="tab" data-toggle="tab">JOURNAL 
                <div class="nav--journal--icon"></div></a>
            </li>


            <li role="presentation" <?php if($class_active == "document"){ print "class ='active'";} ?>  >
            <a href="#document" class="pagebigtab--nav--list nav--doc " aria-controls="document" role="tab" data-toggle="tab">DOCUMENT 
                <div class="nav--doc--icon"></div></a>
            </li>


            <li role="presentation" <?php if($class_active == "fund"){ print "class ='active'";} ?> >
            <a href="#fund" class="pagebigtab--nav--list nav--fund" aria-controls="fund" role="tab" data-toggle="tab">FUND 
                <div class="nav--fund--icon"></div></a>
            </li>

        
            <?php if($user->uid == $node->uid || user_access('can_manage_participation') ): ?>
            <li role="presentation" <?php if($class_active == "participation"){ print "class ='active'";} ?> >
            <a href="#join" class="pagebigtab--nav--list nav--project"  aria-controls="join" role="tab" data-toggle="tab">PARTICIPATION
                <div class="nav--project--icon"></div></a>
            </li>
            <?php endif;?>
            
            <?php if($checkTeamAssignAdmin_org == 1 || $user->uid == $node->uid || user_access('can_manage_participation') || $checkTeamAssignAdmin == 1 || $checkJoinProject_status == 1 ){ ?>
            <li role="presentation" class="float-right-tab-menu">
            <a href="#team" class=" pagebigtab--nav--list nav--team" aria-controls="team" role="tab" data-toggle="tab">TEAM <div class="nav--team--icon"></div></a>
            </li>
            <?php } ?>


            <li role="presentation" class="float-right-tab-menu  <?php if($class_active == "about"){ print 'active';} ?> ">
            <a href="#about" class=" pagebigtab--nav--list nav--about" aria-controls="about" role="tab" data-toggle="tab">ABOUT <div class="nav--about--icon"></div></a>
            </li>


    </ul>

  	<!-- Tab panes -->
  	<div class="tab-content">
        
    	<div role="tabpanel" class="tab-pane" id="timeline">
            
    		  <div class="col2--viewcontent"> 
                <?php if($user->uid != 0){ ?>
    			<?php /*<div class="tab__yellow pagebigtab--tab--filter" >
                    <input type="hidden" name="filterSelectComment" id="filterSelectComment" value="<?php print $nid; ?>">
                    <input type="hidden" name="selectType" id="selectType" value="<?php print $select_type; ?>" runat="server" clientIdMode="static">
                    <?php if(isset($select_type)){ ?>

                        <select id="filterSelect" onchange="loadComment()" >
                            <option value="ALL">ALL</option>
                            <option value="Project Update">Project Update</option>
                            <option value="Journal">Journal</option>
                        </select>
        
                    <?php }else{ ?>
                        
                        <select id="filterSelect" onchange="loadComment()" runat="server" clientIdMode="static">
            				<option value="ALL">ALL</option>
            				<option value="Project Update">Project Update</option>
            				<option value="Journal">Journal</option>
            			</select>
                    <?php } ?>
        			<div class="col-xs-12 panel-heading">
    			  		<!-- <div class="col-xs-2">
    			  			picture
    			  		</div>
    			  		<div class="col-xs-10">
    			  			<p>
    			  				<b>สิริรัตนา บ่อสร้างทรัพย์</b> 
    			  				<span class="">1 ส.ค. 58 13.30 น.</span>
    			  			</p>
    			  			<p>
    				  			ปลากะโห้เต็มไปหมดเลยค่ะ จะเห็นได้ว่าการเพาะเลี้ยงได้ผลดีอย่างมาก เพียงแต่
    							ปัญหาที่พบตอนนี้ที่เป็นที่น่าหนักใจคือ บ่อร้าวค่ะ ต้องปรับปรุงเป็นการด่วน
    						</p>
    			  		</div> -->
    			  		
    			  	</div>	  
               </div> */ ?>
               <?php }else{ ?>
                <!--<div>
                    <p>กรุณาเข้าสู่ระบบ</p>
                    <button data-toggle="modal" data-target="#myLogin" type="button" class="btn btn--submit pagebigtab__1btn">เข้าสู่ระบบ</button>--
                </div>-->

               <?php } ?>
               
                <?php 
                // print "<pre>";
                // print_r($check_partner_project);
                // print "</pre>";

                if($check_join_project_status == 1 || $check_coach_project_status == 1 || user_access('can_manage_participation') || $user->uid == $node->uid || $checkTeamAssignAdmin != 0  ){ ?>
                <?php if($check_partner_project == 0){ ?>
                <div class="col-xs-12 txt__center">
                <button id="btn_show_comment" class="btn btn--submit" style="margin-top:15px; width:270px;"><i class=" icon-plus-circled"></i> Create Project Update</button>
                </div>
                <?php } ?>
                <?php } ?>

   <?php
        $node_comment = node_load($node->nid);
        $node_view = node_view($node);
        $node_view['comments'] = comment_node_page_additions($node);
        print render($content['comments']);
        // print "<pre>";
        // print_r(comment_num_new($node->nid));
        // print "</pre>";
        if(empty($comments_node)){ ?>

        <div class="margin__top30 txt__center col-xs-12 "><h4 class="headline__thaisan">ยังไม่มีข้อมูลการอัปเดต</h4></div>
    <?php 
        }
    ?>           
             
    <div id="show_comment">           
       
    </div> 
 
                
    </div>		
            
            
            
    		<div class="col2--sidebar " style="position:relative;">
                               
                <?php if(!empty($commu_project)){ ?>
    			<div class="sidebar--wrap  bottom__lightgray col-xs-12" >
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__blue">PROJECT NEED</h3>
                        <div class="sidebar--line"></div>
                    <?php //echo views_embed_view('community_need', $display_id = 'block'); ?>
				  	<?php foreach ($commu_project as $key => $value) { ?>

                        <div class="sidebar--verti--content" >
                            <div class="col-xs-12 border--row">
                            <div class="row">
                            <div class="col-xs-5">
                                <a href="/community/<?php print $value['nid']; ?>" >
                                <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                                    
                                        
                                    <img src="<?php  print $value['picture']; ?> ">
                                </div>
                                </a>
                            </div>
                            <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                          
                            <div class="col-xs-7 row">

                            <a href="/community/<?php print $value['nid']; ?>" class="sample--text__small">
                                <div class=" detail--linelimit__2"><?php print $value['title']; ?></div>            

                            <div class="detail__small ">
                                <span class="link__gray"><span class=" icon-clock txt__gray2"></span> <?php  print $value['date']; ?><br></span>    
                                    
                            </div>
                            </a>                  
                            </div>
                            </div>
                            </div>

                        </div> 
                    <?php } ?>
                    </div>
                </div>
                <?php } ?>
                
                
                <?php if(!empty($project_join_campaign)){ ?>
			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__black">CURRENT CAMPAIGN</h3>
				  	<div class="sidebar--line"></div>
				  	<?php foreach ($project_join_campaign as $key => $value) { ?>
				    <div class="sidebar--verti--content" >
                        <div class="col-xs-12 border--row">
                            <div class="row">
                                
                               
                                <div class="col-xs-5">
                                    <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                                        <div class="field-items">
                                        <div class="field-item even">

                                        <div class="field-content">
                                        <a href="<?php print $value['path']; ?>"><img typeof="foaf:Image" class="img-responsive" src="<?php print $value['picture']; ?>" width="220" height="157" alt=""></a>
                                        </div>                        
                                        </div>
                                        </div>
                                    </div>
                                    <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                                </div>
                                <div class="col-xs-7 row">

                                <a href="<?php print $value['path'];  ?>">
                                                                    <div class=" detail--linelimit__2"><?php print $value['title']; ?></div>            


                                <div class="detail__small link__gray__a">

                                    <div class="detail__small">
                                    <span class="link__gray"><span class=" icon-clock"></span> <?php print $value['date'] ?><br></span>    
                                        Status : <span class="txt__gray">ได้รับการคัดเลือกแล้ว</span>
                                    </div>
                                </div>
                                </a>    
                                </div>
                                
                            </div>
                        </div>	  
			        </div>
                      <?php  } ?>  
					</div>	  
			    </div>
                <?php } ?>
    		</div>
    	</div>

    	<div role="tabpanel" class="tab-pane journal--page" id="journal">

                
	   
            <?php if($user->uid == $node->uid || user_access('can_manage_participation') || $checkJoinProject_status == 1 || $checkTeamAssignAdmin_journal != 0){  ?>
            
            
            
            <button id="show_journal" class="btn btn--submit col-xs-3 col-xs-offset-9" style="margin-top:15px;">
                <i class=" icon-plus-circled"></i> Create Journal
            </button>
            <div id="create_journal" class="col-xs-12">
            <?php 
            // print "<pre>"; 
            // print_r($checkTeamAssignAdmin_journal);
            
                

       

                // $node_form = new stdClass;
                // $node_form->type = 'journal';
                // $node_form->language = LANGUAGE_NONE;
                // print drupal_render(drupal_get_form('journal_node_form',$node_form));

                module_load_include('inc', 'node', 'node.pages');
                $form = node_add('journal');
                print "<br>";
                print drupal_render($form);

                // $form = drupal_get_form('journal_node_form');

                // print drupal_render_children($form);

                // module_load_include('inc', 'node', 'node.pages');   
                // $form_journal = drupal_get_form("journal_node_form");
                // print  drupal_render($form_journal);
                //dpm($rtn);

                //$form_journal = drupal_get_form("journal_node_form");
                // $form_journal = drupal_get_form('project_node_form');
                // print "<pre>";
                // print_r($form_journal);
                // print "</pre>";
                //print drupal_render($form);
                //print drupal_render(drupal_get_form('journal_node_form')); 
                //print drupal_get_form('journal_node_form'); 
                //print drupal_render(drupal_get_form('journal_node_form'));
                //print render(drupal_get_form('journal_node_form')); 


            ?>   
            </div>

            <?php  } ?>
    		
            

            <?php 
            // print '<pre>';
            // print_r($journal_data);
            // print '</pre>';
            if(empty($journal_data)){ 
                print "<div class='margin__top30 txt__center col-xs-12 '><h4 class='headline__thaisan'>ยังไม่มีการอัปเดตบทความ</h4></div>";
            }
            foreach ($journal_data as $value): ?>
            <div class="col-xs-3 box__pad6">
                <div class="page1-4--box">
                    <div class="thumb">

                        <div class="field-content">
                            <a href="<?php print $value['path'];  ?>">
                                <img typeof="foaf:Image" class="img-responsive" src="<?php print $value['journal_pictrue'];?>" width="269" height="150" alt="">
                            </a>
                        </div>
                    </div>

                                
                        <div id="moredetail__over" class="field--content boxover">
                            <a href="<?php print $value['path'];  ?>">
                                <div class="detail__small d__inline-block">
                                    <h4 class="headline__thaisan h4--linelimit__2">
                                    <?php print $value['title']; ?></h4>
                                    
                                    <div class="tag--linelimit__1 link__gray">
                                    <span class="icon-clock txt__gray2"></span><?php print $value['date']; ?>
                                    </div>
                                    <!-- <span class=" icon-group txt__gray2"></span> <a >12</a><br> -->
                                    <?php //$target = explode("All", $value['target']); ?>
                                    <!-- <span class=" icon-eye-outline txt__gray2"></span><?php //print $target[0]; print $target[1];  ?><br> -->
                            
                            
                                 <div id="moredetail__hide">
                                 <div class="moredetail__over__content detail--linelimit__4"><?php print strip_tags($value['content']); ?></div>
                                 </div>
                                
                                </div>
                            </a>
                        </div>
                   
                </div>
            </div>
                
            <?php endforeach; 

            // print '<pre>';
            // print_r($journal_id);
            // print '</pre>';

            ?>

    	</div>
        
    	<div role="tabpanel" class="tab-pane" id="document">
            <div class="col2--viewcontent pagebigtab--bg">
        		<?php 

                    //print render(field_view_field('user', $user, 'field_other_document_project'));
                    //part 1
                    $field_didi =  $node->field_didi['und'][0]['filename'] ;
                    $field_didi_path = $node->field_didi['und'][0]['uri'] ;
                    $field_didi_file_size =  "(".round(($node->field_didi['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_swot =  $node->field_swot['und'][0]['filename'] ;
                    $field_swot_path =  $node->field_swot['und'][0]['uri'] ;
        		  	$field_swot_file_size =  "(".round(($node->field_swot['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_brainstorming =  $node->field_brainstorming['und'][0]['filename'] ;
                    $field_brainstorming_path =  $node->field_brainstorming['und'][0]['uri'] ;
                    $field_brainstorming_file_size =  "(".round(($node->field_brainstorming['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_idea_selection =  $node->field_idea_selection['und'][0]['filename'] ;
                    $field_idea_selection_path =  $node->field_idea_selection['und'][0]['uri'] ;
                    $field_idea_selection_file_size =  "(".round(($node->field_idea_selection['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_theory_of_change =  $node->field_theory_of_change['und'][0]['filename'] ;
                    $field_theory_of_change_path =  $node->field_theory_of_change['und'][0]['uri'] ;
                    $field_theory_of_change_file_size =  "(".round(($node->field_theory_of_change['und'][0]['filesize'] / 1024), 0)." Kb )";


                    //part 2
                    //ep1
        		  	$field_impact_value =  $node->field_impact_value['und'][0]['filename'] ;
                    $field_impact_value_path =  $node->field_impact_value['und'][0]['uri'] ;
        		  	$field_impact_value_file_size =  "(".round(($node->field_impact_value['und'][0]['filesize'] / 1024), 0)." Kb )";

                    //ep2
        		  	$field_drafting_your_business_mod =  $node->field_drafting_your_business_mod['und'][0]['filename'] ;
                    $field_drafting_your_business_mod_path =  $node->field_drafting_your_business_mod['und'][0]['uri'] ;
        		  	$field_drafting_your_business_mod_file_size =  "(".round(($node->field_drafting_your_business_mod['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_value_proposition =  $node->field_value_proposition['und'][0]['filename'] ;
                    $field_value_proposition_path =  $node->field_value_proposition['und'][0]['uri'] ;
                    $field_value_proposition_file_size =  "(".round(($node->field_value_proposition['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_stakeholder_analysis =  $node->field_stakeholder_analysis['und'][0]['filename'] ;
                    $field_stakeholder_analysis_path =  $node->field_stakeholder_analysis['und'][0]['uri'] ;
                    $field_stakeholder_analysis_file_size =  "(".round(($node->field_stakeholder_analysis['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_business_model_canvas =  $node->field_business_model_canvas['und'][0]['filename'] ;
                    $field_business_model_canvas_path =  $node->field_business_model_canvas['und'][0]['uri'] ;
        		  	$field_business_model_canvas_file_size =  "(".round(($node->field_business_model_canvas['und'][0]['filesize'] / 1024), 0)." Kb )";
                    //ep 3
                    $field_build_value_proposition_hy =  $node->field_build_value_proposition_hy['und'][0]['filename'] ;
                    $field_build_value_proposition_hy_path =  $node->field_build_value_proposition_hy['und'][0]['uri'] ;
                    $field_build_value_proposition_hy_file_size =  "(".round(($node->field_build_value_proposition_hy['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_measure_testing_and_data_c =  $node->field_measure_testing_and_data_c['und'][0]['filename'] ;
                    $field_measure_testing_and_data_c_path =  $node->field_measure_testing_and_data_c['und'][0]['uri'] ;
                    $field_measure_testing_and_data_c_file_size =  "(".round(($node->field_measure_testing_and_data_c['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_learn_feedback_analysis =  $node->field_learn_feedback_analysis['und'][0]['filename'] ;
                    $field_learn_feedback_analysis_path =  $node->field_learn_feedback_analysis['und'][0]['uri'] ;
                    $field_learn_feedback_analysis_file_size =  "(".round(($node->field_learn_feedback_analysis['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_decide_criteria_for_making =  $node->field_decide_criteria_for_making['und'][0]['filename'] ;
                    $field_decide_criteria_for_making_path =  $node->field_decide_criteria_for_making['und'][0]['uri'] ;
                    $field_decide_criteria_for_making_file_size =  "(".round(($node->field_decide_criteria_for_making['und'][0]['filesize'] / 1024), 0)." Kb )";
                    
                    //ep4
                    $field_business_plan =  $node->field_business_plan['und'][0]['filename'] ;
                    $field_business_plan_path =  $node->field_business_plan['und'][0]['uri'] ;
                    $field_business_plan_file_size =  "(".round(($node->field_business_plan['und'][0]['filesize'] / 1024), 0)." Kb )";
                    
                    
                    //part 3
                    //ep1
        		  	$field_workplan =  $node->field_workplan['und'][0]['filename'] ;
                    $field_workplan_path =  $node->field_workplan['und'][0]['uri'] ;
        		  	$field_workplan_file_size =  "(".round(($node->field_workplan['und'][0]['filesize'] / 1024), 0)." Kb )";

                    //ep2
                    $field_factsheet =  $node->field_factsheet['und'][0]['filename'] ;
                    $field_factsheet_path =  $node->field_factsheet['und'][0]['uri'] ;
                    $field_factsheet_file_size =  "(".round(($node->field_factsheet['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_visual =  $node->field_visual['und'][0]['filename'] ;
                    $field_visual_path =  $node->field_visual['und'][0]['uri'] ;
                    $field_visual_file_size =  "(".round(($node->field_visual['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_verbal =  $node->field_verbal['und'][0]['filename'] ;
                    $field_verbal_path =  $node->field_verbal['und'][0]['uri'] ;
                    $field_verbal_file_size =  "(".round(($node->field_verbal['und'][0]['filesize'] / 1024), 0)." Kb )";

                    //ep3
        		  	$field_profit_loss_projection =  $node->field_profit_loss_projection['und'][0]['filename'] ;
                    $field_profit_loss_projection_path =  $node->field_profit_loss_projection['und'][0]['uri'] ;
        		  	$field_profit_loss_projection_file_size =  "(".round(($node->field_profit_loss_projection['und'][0]['filesize'] / 1024), 0)." Kb )";

                    //part 4
        		  	$field_aar =  $node->field_aar['und'][0]['filename'] ;
                    $field_aar_path =  $node->field_aar['und'][0]['uri'] ;
        		  	$field_aar_file_size =  "(".round(($node->field_aar['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_scaling_plan = $node->field_scaling_plan['und'][0]['filename'];
                    $field_scaling_plan_path = $node->field_scaling_plan['und'][0]['uri'];
                    $field_scaling_plan_file_size = "(".round(($node->field_scaling_plan['und'][0]['filesize'] / 1024), 0)." Kb )";

                    //     print "<pre>";
                    // print_r($node->field_aar);
                    // print "</pre>";

        		?>
        		<div  class="col-xs-12 ">
                    <?php if(empty($field_didi) && empty($field_swot) && empty($field_brainstorming) && empty($field_idea_selection) 
                        && empty($field_theory_of_change) && empty($field_impact_value) && empty($field_drafting_your_business_mod)
                        && empty($field_value_proposition) && empty($field_stakeholder_analysis) && empty($field_business_model_canvas)
                        && empty($field_build_value_proposition_hy) && empty($field_measure_testing_and_data_c) && empty($field_learn_feedback_analysis)
                        && empty($field_decide_criteria_for_making) && empty($field_business_plan) && empty($field_workplan)
                        && empty($field_factsheet) && empty($field_visual) && empty($field_verbal) && empty($field_profit_loss_projection)
                        && empty($field_aar) && empty($field_scaling_plan)  ){  ?>

                        <div class="margin__top30 txt__center col-xs-12 ">
                            <h4 class="headline__thaisan">ไม่มีข้อมูลเอกสารของโปรเจกต์นี้</h4>
                        </div>

                    <?php  }  ?>
                    
                    <?php if(isset($field_didi) || isset($field_swot) || isset($field_brainstorming) || isset($field_idea_selection) || isset($field_theory_of_change)){ ?>
    			  	<h2 class="headline__thaisan uppercase ">Part I : Idea Development</h2>
    			  	<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <h2 class="headline__thaisan uppercase ">Part I : Idea Development</h2>
                    <?php } ?>
                    <?php if(isset($field_didi) || isset($field_swot)){ ?>
                    
                    <h3 class="headline__thaisan uppercase ">: Starting With You</h3>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <h3 class="headline__thaisan uppercase ">: Starting With You</h3>
                    <?php } ?>
                    
                       

                        <?php if($field_didi){ ?>
                    <div class="col-xs-12 margin__top10">
                            <label class="label__col">DIDI *</label>
                            <div  class="field__2col">
                            <a href="/sites/default/files/<?php echo $field_didi ?>" type="application/msword; length=101888" target="_blank">
                                <div class="btn btn--dowload--file">
                                        <i class="icon-download"></i>
                                    
                                    <?php echo $field_didi ?>
                                    <?php echo $field_didi_file_size;?>
                                    <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                    <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                    <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                </div>
                            </a>
                            <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                            <form action="/changemakers/project_delete_file" name="field_didi" id="field_didi" method="post">
                                <input type="hidden" name="path" value="<?php print $field_didi_path; ?>">
                                <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                <input type="hidden" name="file_index" value="1">
                                <i id="field_didi_icon" class="icon-cancel-circled txt__red"></i>
                            </form>
                            
                            <?php } ?>
                        </div></div>
                        
                        <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__top10">
                         <label class="label__col">DIDI</label>   
           
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document1')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                    </div>
    
                        <?php }else{ ?>
                            
                        <?php } ?>
           

    			  	
                            
    				  	
    				  	<?php if($field_swot){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">SWOT *</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_swot; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_swot ?>
                                        <?php echo $field_swot_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_swot" id="field_swot" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="2">
                                    <i id="field_swot_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            </div>

                    </div>
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">SWOT *</label>
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document2')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
                    </div>
            
                        <?php } ?>
                    
                    

                    <?php if(isset($field_brainstorming) || isset($field_idea_selection) || isset($field_theory_of_change)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Defining Problems</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_part icipation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Defining Problems</h3>
                        </div></div>
                    <?php } ?>
                    
    				
                            
    				  	
    				  	<?php if($field_brainstorming){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">Brainstorming</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_brainstorming; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_brainstorming ?>
                                        <?php echo $field_brainstorming_file_size;?>

                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_brainstorming" id="field_brainstorming" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="3">
                                    <i id="field_brainstorming_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            </div>
                    </div>
    					<?php }else if( $checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">Brainstorming</label>
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document3')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
                    </div>
                        <?php } ?>
                    
                    
    				
    				  	<?php if($field_idea_selection){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">Idea Selection</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_idea_selection ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_idea_selection ?>
                                        <?php echo $field_idea_selection_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if( $checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_idea_selection" id="field_idea_selection" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="4">
                                    <i id="field_idea_selection_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        
    					<?php }else{ ?>
       
                        <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                            <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">Idea Selection</label>
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document4')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                            </div>
                        <?php } ?>
                        <?php } ?>
                    
                
    				
                            
    				  	<?php if($field_theory_of_change){ ?>
                            <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">Theory of Change *</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_theory_of_change ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_theory_of_change; ?>
                                        <?php echo $field_theory_of_change_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_theory_of_change" id="field_theory_of_change" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="5">
                                    <i id="field_theory_of_change_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            </div>
                            </div>
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                            <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">Theory of Change *</label>    
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document5')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
                            </div>
                        <?php } ?>
    			</div>
                
                
    			<div class="col-xs-12 margin__top25">

                    <?php if(isset($field_impact_value) || isset($field_drafting_your_business_mod) || isset($field_value_proposition) || isset($field_business_model_canvas) || isset($field_stakeholder_analysis)
                    || isset($field_build_value_proposition_hy) || isset($field_measure_testing_and_data_c) || isset($field_learn_feedback_analysis) || isset($field_decide_criteria_for_making) || isset($field_business_plan)){ ?>
    			  	<h2 class=" headline__thaisan uppercase ">Part 2 : Model and Plan</h2>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <h2 class=" headline__thaisan uppercase ">Part 2 : Model and Plan</h2>
                    <?php } ?>
                    <?php /*if($user->uid == $node->uid || user_access('can_manage_participation')){ ?>
    			  	<p style="margin-top:5px;"><span class="txt__red">*</span>เอกสารในส่วนนี้ต้องครบเพื่อประโยชน์ในการยืนยันโครงการและมีสิทธิร่วมแคมเปญ</p>
                    <?php } */?>
                    <?php if(isset($field_impact_value)){ ?>
                    <h3 class="headline__thaisan uppercase "> : Impact Value Chain *</h3>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <h3 class="headline__thaisan uppercase ">: Impact Value Chain *</h3>
                    <?php } ?>
    			  	<div class="col-xs-12">
    			  		
    				  	
    				  	<?php if($field_impact_value){ ?>
                        <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Impact Value Chain
                            </label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_impact_value; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_impact_value; ?>
                                        <?php echo $field_impact_value_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                               <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_impact_value" id="field_impact_value" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="6">
                                    <i id="field_impact_value_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            </div>
                        </div>
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>  
                        <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Impact Value Chain
                        </label>     
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document6')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div></div>
                        <?php } ?>
                    </div>
                    

                    <?php if(isset($field_drafting_your_business_mod) || isset($field_value_proposition) || isset($field_stakeholder_analysis) || isset($field_business_model_canvas)){ ?>
                    
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Business Model</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Business Model</h3>
                        </div></div>
                    <?php } ?>
                    
                            
                        
                        <?php if($field_drafting_your_business_mod){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Drafting Your Business Model *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_drafting_your_business_mod ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_drafting_your_business_mod; ?>
                                        <?php echo $field_drafting_your_business_mod_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_drafting_your_business_mod" id="field_drafting_your_business_mod" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="7">
                                    <i id="field_drafting_your_business_mod_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            </div>
                    </div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Drafting Your Business Model *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document7')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                    

                    
                            
                        
                        <?php if($field_value_proposition){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Value Proposition *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_value_proposition ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_value_proposition; ?>
                                        <?php echo $field_value_proposition_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_value_proposition" id="field_value_proposition" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="8">
                                    <i id="field_value_proposition_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Value Proposition *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document8')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                    </div>
                        <?php } ?>
                  

                   
                            
                        
                        <?php if($field_stakeholder_analysis){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Stakeholder Analysis *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_stakeholder_analysis; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_stakeholder_analysis; ?>
                                        <?php echo $field_stakeholder_analysis_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_stakeholder_analysis" id="field_stakeholder_analysis" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="9">
                                    <i id="field_stakeholder_analysis_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?> 
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Stakeholder Analysis *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document9')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                   

    				
    				  	<?php if($field_business_model_canvas){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Business Model Canvas *
                            </label>
    			  		    <div  class="field__2col">
    					  		<a href="/sites/default/files/<?php echo $field_business_model_canvas ?>" type="application/msword; length=101888" target="_blank">
    						  		<div class="btn btn--dowload--file">
    						  			
    						  			<i class="icon-download"></i>
    						  			
    						  			<?php echo $field_business_model_canvas; ?>
    						  			<?php echo $field_business_model_canvas_file_size;?>

    								</div>
    							</a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_business_model_canvas" id="field_business_model_canvas" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="10">
                                    <i id="field_business_model_canvas_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
    					<?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>  
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Business Model Canvas *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document10')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>

                    

                    <?php if(isset($field_build_value_proposition_hy) || isset($field_measure_testing_and_data_c) || isset($field_learn_feedback_analysis) || isset($field_decide_criteria_for_making)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Prototype/Lean</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Prototype/Lean</h3>
                    </div></div>
                    <?php } ?>
                    
                            
                        
                        <?php if($field_build_value_proposition_hy){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Build - Value Proposition/ Hypotheses, MVP *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_build_value_proposition_hy; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_build_value_proposition_hy; ?>
                                        <?php echo $field_build_value_proposition_hy_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_build_value_proposition_hy" id="field_build_value_proposition_hy" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="11">
                                    <i id="field_build_value_proposition_hy_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Build - Value Proposition/ Hypotheses, MVP *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document11')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                 


                        <?php if($field_measure_testing_and_data_c){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Measure - Testing and Data Collection
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_measure_testing_and_data_c; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_measure_testing_and_data_c; ?>
                                        <?php echo $field_measure_testing_and_data_c_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_measure_testing_and_data_c" id="field_measure_testing_and_data_c" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="12">
                                    <i id="field_measure_testing_and_data_c_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Measure - Testing and Data Collection
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document12')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                    

                    
                        <?php if($field_learn_feedback_analysis){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Learn - Feedback, Analysis *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_learn_feedback_analysis; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_learn_feedback_analysis; ?>
                                        <?php echo $field_learn_feedback_analysis_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_learn_feedback_analysis" id="field_learn_feedback_analysis" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="13">
                                    <i id="field_learn_feedback_analysis_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Learn - Feedback, Analysis *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document13')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                    

                    
                        <?php if($field_decide_criteria_for_making){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Decide - Criteria for Making Decision *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_decide_criteria_for_making; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_decide_criteria_for_making; ?>
                                        <?php echo $field_decide_criteria_for_making_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_decide_criteria_for_making" id="field_decide_criteria_for_making" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="14">
                                    <i id="field_decide_criteria_for_making_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                        <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Decide - Criteria for Making Decision *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document14')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div></div>
                        <?php } ?>
              
                    

                    <?php if(isset($field_business_plan)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Business Plan</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Business Plan</h3>
                        </div></div>
                    <?php } ?>
                   
                        <?php if($field_business_plan){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Business Plan *
                            </label>
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_business_plan; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                        <i class="icon-download"></i>
                                        
                                        <?php echo $field_business_plan; ?>
                                        <?php echo $field_business_plan_file_size;?>
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_business_plan" id="field_business_plan" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="15">
                                    <i id="field_business_plan_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                        </div></div>
                        <?php } else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Business Plan *
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document15')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
    			</div>
    			
    			<div class="col-xs-12 margin__top25">
                    <?php if(isset($field_workplan) || isset($field_factsheet) || isset($field_visual) || isset($field_verbal) || isset($field_profit_loss_projection) ){ ?>
    			  	<h2 class="headline__thaisan uppercase ">Part 3 : Take Action</h2>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <h2 class="headline__thaisan uppercase ">Part 3 : Take Action</h2>
                    <?php } ?>
                    <?php if($user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <p style="margin-top:5px;"><span class="txt__red">*</span>เอกสารในส่วนนี้ต้องครบเพื่อประโยชน์ในการยืนยันโครงการและมีสิทธิร่วมแคมเปญ</p>
                    <?php } ?>
                    <?php if(isset($field_workplan)){ ?>
                   
                    <h3 class="headline__thaisan uppercase ">: Team Management</h3>
                   
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                  
                    <h3 class="headline__thaisan uppercase ">: Team Management</h3>
                   
                    <?php } ?>
    			  	
    						
    				  	<?php if($field_workplan){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Workplan *
                            </label>
                        
    			  		    <div  class="field__2col">
    					  		<a href="/sites/default/files/<?php echo $field_workplan ?>" type="application/msword; length=101888" target="_blank">
    						  		
    						  			<div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_workplan ?>
                                            <?php echo $field_workplan_file_size;?>
    							  		<!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
    							  		<!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
    									<input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
    								</div>
    							</a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_workplan" id="field_workplan" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="16">
                                    <i id="field_workplan_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
    						
                        </div></div>
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?> 
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Workplan *
                        </label>     
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document16')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
                    
                    

                    <?php if(isset($field_factsheet) || isset($field_visual) || isset($field_verbal)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Communication for Change</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Communication for Change</h3>
                        </div></div>
                    <?php } ?>
    				
    						
    				  	
    				  	<?php if($field_factsheet){ ?>
                    <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Factsheet *
                            </label>
        			  		<div  class="field__2col">
                            
                            
                            
    					  		<a href="/sites/default/files/<?php echo $field_factsheet ?>" type="application/msword; length=101888" target="_blank">
    						  		<div class="btn btn--dowload--file">
    						  			 <i class="icon-download"></i>
                                        <?php echo $field_factsheet ?>
                                        <?php echo $field_factsheet_file_size;?>
    							  		<!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
    							  		<!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
    									<input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
    								</div>
    							</a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_factsheet" id="field_factsheet" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="17">
                                    <i id="field_factsheet_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                           <!--  <a ><i class="icon-cancel-circled txt__red"></i></a>
                            
                            <button class="btn btn-submit " type="submit" name="op" value="Submit"><i class=" icon-upload"></i> Upload</button> -->
                            
                        </div></div>
    					
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                                Factsheet *
                            </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document17')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>
      

    				
    						
    				  	<?php if($field_visual){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Visual
                        </label>
    			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_visual; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                        <div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_visual ?>
                                            <?php echo $field_visual_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_visual" id="field_visual" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="18">
                                    <i id="field_visual_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            
                        </div></div>
    					
    					<?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Visual
                        </label>    
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document18')); ?>
                            <span class="pagebigtab--detail-topic">.jpg, .png, .pdf  ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>  
                    


                            
                        <?php if($field_verbal){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Verbal
                        </label>
                        <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_verbal; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                        <div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_verbal ?>
                                            <?php echo $field_verbal_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_verbal" id="field_verbal" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="19">
                                    <i id="field_verbal_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            
                        </div>
                    </div>
                        <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Verbal
                        </label>    
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document19')); ?>
                            <span class="pagebigtab--detail-topic">.jpg, .png, .pdf  ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>  
                 
                    

                    <?php if(isset($field_profit_loss_projection)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Financial Management</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Financial Management</h3>
                        </div></div>
                    <?php } ?>
                    
                            
                        <?php if($field_profit_loss_projection){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Profit-Loss Projection
                        </label>
                        <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_profit_loss_projection; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                        <div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_profit_loss_projection ?>
                                            <?php echo $field_profit_loss_projection_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_profit_loss_projection" id="field_profit_loss_projection" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="20">
                                    <i id="field_profit_loss_projection_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            
                        </div>
                    </div>
                        <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            Profit-Loss Projection
                        </label>    
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document20')); ?>
                            <span class="pagebigtab--detail-topic">.jpg, .png, .pdf  ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div></div>
                        <?php } ?>  
    			</div>

                <div class="col-xs-12 margin__top25">
                    <?php if(isset($field_aar) || isset($field_scaling_plan) ){ ?>
                    
                    <h2 class=" headline__thaisan uppercase ">Part 4 : Stepping to the Next</h2>
                    
                    <?php }else if($user->roles[3]){ ?>
                    
                    <h2 class=" headline__thaisan uppercase ">Part 4 : Stepping to the Next</h2>
                    
                    <?php } ?>
                    <?php /*if($user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <p style="margin-top:5px;"><span class="txt__red">*</span>เอกสารในส่วนนี้ต้องครบเพื่อประโยชน์ในการยืนยันโครงการและมีสิทธิร่วมแคมเปญ</p>
                    <?php } */?>
                    <?php if(isset($field_aar)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Assessment</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Assessment</h3>
                        </div></div>
                    <?php } ?>
                  
                            
                        <?php if($field_aar){ ?>
                        <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                AAR *
                            </label>
                        
                            <div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_aar ?>" type="application/msword; length=101888" target="_blank">
                                    
                                        <div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_aar; ?>
                                            <?php echo $field_aar_file_size; ?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_aar" id="field_aar" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="21">
                                    <i id="field_aar_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                            
                            </div></div>
                        <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?> 
                        <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                            AAR *
                        </label>     
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document21')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div></div>
                        <?php } ?>
                  
                    
                    
                    <?php if(isset($field_scaling_plan)){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Scaling Model</h3>
                        </div></div>
                    <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                    <div class=" margin__top20 col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan uppercase ">: Scaling Model</h3>
                        </div></div>
                    <?php } ?>
                 
                            
                        
                        <?php if($field_scaling_plan){ ?>
                        <div class="col-xs-12 margin__topbut10">
                            <label class="label__col">
                                Scaling Plan *
                            </label>
                            <div  class="field__2col">
                            
                            
                            
                                <a href="/sites/default/files/<?php echo $field_scaling_plan ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                         <i class="icon-download"></i>
                                        <?php echo $field_scaling_plan ?>
                                        <?php echo $field_scaling_plan_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>
                                <form action="/changemakers/project_delete_file" name="field_scaling_plan" id="field_scaling_plan" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="file_index" value="22">
                                    <i id="field_scaling_plan_icon" class="icon-cancel-circled txt__red"></i>
                                </form>
                            <?php } ?>
                           <!--  <a ><i class="icon-cancel-circled txt__red"></i></a>
                            
                            <button class="btn btn-submit " type="submit" name="op" value="Submit"><i class=" icon-upload"></i> Upload</button> -->
                            
                            </div></div>
                        
                        <?php }else if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 || $user->uid == $node->uid || user_access('can_manage_participation')){ ?>   
                        <div class="col-xs-12 margin__topbut10">
                        <label class="label__col">
                                Scaling Plan *
                            </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document22')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div></div>
                        <?php } ?>
                </div>
    		</div>
        	
            <div class="col2--sidebar " style="position:relative;">
                <?php if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 ||  user_access('can_manage_participation') || $user->uid == $node->uid ){?>
    			<div class="sidebar--wrap  bottom__lightgray col-xs-12" style="margin-top:0px;">
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__yellow">UPLOAD OTHER DOCUMENT</h3>
				  	<div class="sidebar--line"></div>
                        
                    <div class="col-xs-12 padding__box">
                        
                        
                       
                        <div class="fileUpload--wrap">
                        
                            <?php print render(drupal_get_form('changemakers_form_document_other')); ?>
                            <p class="margin__top5 pagebigtab--detail-topic">.pdf, .jpg ไม่เกิน 2 Mb</p>
                        </div>
                       
                </div>
                </div>
                </div>
                <?php } ?>
                
                <?php $other_document = changemakers_get_other_document($nid); ?>
                <?php 
  
                if(count($other_document) > 0){ ?>
    			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                        <div class="row">
                        
                        
                        
                        <h3 class="headline__thaisan headline--sidebar__yellow">OTHER DOCUMENT</h3>
                
    				  	<div class="sidebar--line"></div>
    				  	<?php foreach ($other_document as $key => $value) { ?>
               
    				    <div class="sidebar--verti--content">


                            <div class="col-xs-12 border--row">
                                <?php print $value['name']; ?> 
                                <div class="detail__small d__inline-block">
                                <span class="icon-clock txt__gray2"></span><?php print $value['date']; ?>  <br>
       
                                </div>
                                <div class="margin__top5">
                                <a href="/sites/default/files/<?php echo $value['name']; ?>" type="application/msword; length=101888" target="_blank">

                                                   
                                        
            						  	<div class="btn btn--dowload--file ">
                                            <i class="icon-download"></i><?php print $value['size']; ?>		
            							</div>
            							    
                                            
                                </a>
                                <?php if($checkTeamUploadDoc == 1 || $checkJoinProject_status == 1 ||  user_access('can_manage_participation') || $user->uid == $node->uid ){?>
                                <form action="/changemakers/project_delete_file" name="other_file" id="other_file" method="post">
                                    <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                    <input type="hidden" name="fid" value="<?php print $value['fid']; ?>">
                                    <input type="hidden" name="file_index" value="23">
                                    
                                    <button type="submit" name="btn_opentextbox" class="btn--delete--otherdoc" value="submit" sty>
                                        <i id="other_file_icon" class="icon-cancel-circled txt__red"></i></button>
                                </form>
                                <?php } ?> 
                             </div> 
    			             </div>
                        </div>
                        <?php            
                        } ?> 
                            	
                        </div>  
    			    </div>
                <?php } ?>
    		</div>    
            
            
        </div>
        
        


    	<div role="tabpanel" class="tab-pane" id="fund">
            <?php if(!empty($fund) || user_access('can_manage_participation') || $user->uid == $node->uid ){ ?>
            <div class="table--content col-xs-12">
            
            <div class="col-xs-12 fund--table--total">
                <div class="col-xs-2 topic">
                จำนวนเงินทั้งหมด (บาท)
                </div>
                <div class="col-xs-10 total">
                <?php 
                $amount = 0;
                foreach ($fund as $key => $value) {
                       $amount +=  (float) $value->data[8][0];// intval($value->data[5][0]);
                } ?>
                <span class="bigger"><?php print number_format($amount,2)."<br>"; ?> </span> บาท

                <?php 
                //$check_join_project_status == 1 ||
                if( user_access('can_manage_participation') || $user->uid == $node->uid ) { ?>    
                <button class="btn btn--submit float__right col-xs-3" style="margin-top:0;" data-toggle="modal" data-target="#myProjectFund"><i class=" icon-plus-circled"></i> Add Fund</button>    
                <?php } ?>
                </div>
            </div>
  
                
            <div class="col-xs-12 fund--table--head fund--tab">
                <div class="col-xs-1"></div>
                <div class="col-xs-2">
                วันที่
                </div>
                <!--                 <div class="column1">
                to Date
                </div> -->
                <div class="col-xs-2">
                ได้รับจาก
                </div>
                <!--                 <div class="column1">
                Fund type
                </div> -->
                <div class="col-xs-2">
                จำนวนเงิน (บาท)
                </div>
                <div class="col-xs-4">
                ทุนนำไปใช้
                </div>
                <div class="col-xs-1"></div>
            </div>    
                
            
            <?php 
            
            foreach ($fund as $key => $value) {  

            //     print "<pre>";
            // print_r($value);
            // print "</pre>";

                ?>
            <div class="table--content--row col-xs-12 fund--tab">
                <div class="col-xs-1"></div>
                <!-- <div class="column1">
                <?php //print changemakers_get_date_thai_short($value->data[1][0]);?>
                </div> -->
                <div class="col-xs-2">
                <?php print changemakers_get_date_thai_short($value->data[1][0]);?>
                </div>
                <div class="col-xs-2">
                <?php print $value->data[3][0];?>
                </div>
            <!--       <div class="column1">
                <?php //print $value->data[4][0];?>
                </div> -->
                <div class="col-xs-2">
                <?php print number_format($value->data[8][0], 2, '.', ',');?> บาท
                </div>
                <div class="col-xs-4">
                <?php print $value->data[9][0];?>
                </div>
                
                <div class="col-xs-1">
                


                
               
                <div class="btn--fund">
                <?php 
                // print '<pre>';
                // print_r($user); 
                // print '</pre>';
                //$check_join_project_status == 1
                // $check_coach_project_status == 1 ||
                if( user_access('can_manage_participation') || $user->uid == $node->uid ){?>
                  <form class=""  method="post" action="/node/92/submission/<?php print $value->sid.'/edit'; ?>" >
                        <button class="btn btn--submit edit-fund" data-sid="<?php echo $value->sid;?>"><i class="icon-edit-alt"></i></button> 
                   </form>
                   
                    <form method="post" action="/changemakers/delete_fund" class="">
                        <input type="hidden" name="nid" value="<?php print $nid;?>">
                        <input type="hidden" name="sid" value="<?php print $value->sid;?>">
                        <button class="btn btn--delete"><i class="icon-trash-empty"></i></button>
                    </form>
                <?php } ?>
                </div>
                
                </div>
            </div>                            
            <?php } ?>    
    	   </div>
           <?php }else{ ?>
              <div class="margin__top30 txt__center col-xs-12 "><h4 class="headline__thaisan">ไม่มีข้อมูล</h4></div>
           <?php } ?>
        </div>

    	<div role="tabpanel" class="tab-pane" id="join">
            <div class="table--content col-xs-12">
                
            
    		
			   
			      	<div class="fund--table--head col-xs-12 participate--table">
                       
 
                        <div class="col-xs-2 txt__center">รูปภาพ</div>
                        <div class="col-xs-2">Username</div>
				        <div class="col-xs-2">Name</div>
				        <div class="col-xs-2 ">Status</div>
				        <div class="col-xs-2"></div>
                        <div class="col-xs-1"></div>
                        
				    </div>
			   
			    
			    	<?php

                    // print "<pre>";
                    // print_r($data_user_request_join_project);
                    // print "</pre>";  
                    foreach( $data_user_request_join_project as $key => $value): ?>
			      	<div class="table--content--row col-xs-12 participate--table">
                        <div class="col-xs-2 txt__center"><div class="display"><img src="<?php print  $value['picture'];?>"></div></div>
			        	<div class="col-xs-2"><?php print  $value['username'];?></div>
                        <div class="col-xs-2"><?php print  $value['name'];?></div>
                        <div class="col-xs-2 "><?php
                            if($value['status'] == 1){ print "เข้าร่วม"; }else{ print "ยังไม่เข้าร่วม"; }  
                            ?>
                        </div>
			        	<?php if($value['status'] == 0): ?>
			        	<div class="project-button-approve-align col-xs-2">
			        		<form action="/changemakers/approved-project"  method="post">
			        			<input type="hidden" name="uid" value="<?php print $value['uid']; ?>">
			        			<input type="hidden" name="nid" value="<?php print $nid; ?>">
			        			<input type="hidden" name="sid" value="<?php print $value['sid']; ?>">
			        			<button type="submit" value="submit" class="btn--submit btn">ให้เข้าร่วมโครงการ</button>
			        		</form>
			        	</div>
			        	<?php else: ?>
			        	<div class="project-button-approve-align col-xs-2">
			        		<form action="/changemakers/leave-project"  method="post">
			        			<input type="hidden" name="uid" value="<?php print $value['uid']; ?>">
			        			<input type="hidden" name="nid" value="<?php print $nid; ?>">
			        			<input type="hidden" name="sid" value="<?php print $value['sid']; ?>">
			        			<button type="submit" value="submit" class="btn--default btn">ออกจากโครงการ</button>
			        		</form>
			        	</div>
			        	<?php endif; ?>
                        <div class="col-xs-1 txt__center">
                            <form action="/changemakers/delete-data-request-project"  method="post">
                                <input type="hidden" name="uid" value="<?php print $value['uid']; ?>">
                                <input type="hidden" name="nid" value="<?php print $nid; ?>">
                                <input type="hidden" name="sid" value="<?php print $value['sid']; ?>">
                                <button type="submit" value="submit" class="btn--default btn">ลบข้อมูล</button>
                            </form>
                        </div>
			      	</div>
			      	<?php endforeach;?>
                
            </div>
			
    	</div>
    	<div role="tabpanel" class="tab-pane" id="about">
            <div class="col-xs-12 ">
                <div class="row padding__topbot15">
                
               
             

                        <div class="float__right ">                        
                            <?php //$check_join_project_status == 1 || 
                            if(user_access('can_manage_participation') || $user->uid == $node->uid ){?>
                           <a href="/node/<?php print $nid.'/edit';?>">
                                <button class="btn btn--default pagebigtab__2btn edit-fund"><i class="icon-edit-alt"></i> Edit Project</button>
                            </a> 
                            <a href="/node/<?php print $nid;?>/delete">
                                <button class="btn btn--delete pagebigtab__2btn edit-fund"><i class="icon-edit-alt"></i> Delete Project</button>
                            </a>
                            <?php } ?>
                    

                    </div>
                </div>
            </div>

            
            <div class="clear margin__top20">
        
                <div class="col-xs-4" style="padding-left:0;">
                    <div class="pagebigtab--update--profile--box ">
                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">อยู่ในระยะ : </div>
                            <div class="col-xs-7"><?php print $get_progress_project; ?></div>
                        </div>
                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">ชื่อทีม : </div>
                            <div class="col-xs-7"><?php print $node->field_project_team_name['und'][0]['value']; ?></div>
                        </div>
                        
                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">สมาชิกในทีม : </div>
                            <div class="col-xs-7">
                 
                                <div class="user--box__small col-xs-12" style="margin-left:0;"> 
                                    <?php if($user->uid == 0){ ?>
                                    <a href="/user/<?php print $user_fields->uid; ?>"  class="views-ajax-processed-processed">
                                
                                    <div class="col2--thumcir__1">
                                        <div class="img--wrap__cir">
                                        <?php if($user_picture){ 
                                            $photo = image_style_url("profile",$user_picture);
                                            ?>
                                            <img width="50" src="<?php  print $photo;?>">
                                        <?php }else{ ?>
                                            <img width="50px" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                                        <?php } ?>
                                        </div>
                                    </div>  
                                
                                    <div class="col2--thumcir__2">
                                        <div class="taglinelimit__1 margin__top10">
                                            <?php print changemaker_check_icon_page(changemakers_get_name_contact(strip_tags($user_fields->name))); ?> <?php print changemakers_get_contact(changemakers_get_name_contact(strip_tags($user_fields->name))); ?>
                                            <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                       <?php //print $user_fields->name;//field_profile_firstname['und'][0]['value']."  ".$user_fields->field_profile_lastname['und'][0]['value']; ?> 
                                        
                                        </div>
                                    </div>
                                    </a>
                                    <?php }else{ ?>
                                    <a href="/user/<?php print $user_fields->uid; ?>" class="views-ajax-processed-processed">
                                
                                    <div class="col2--thumcir__1">
                                        <div class="img--wrap__cir">
                                        <?php if($user_picture){
                                        $photo = image_style_url("profile",$user_picture); ?>
                                            <img width="50" src="<?php  print $photo; ?>">
                                        <?php }else{ ?>
                                            <img width="50px" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                                        <?php } ?>
                                        </div>
                                    </div>  
                                
                                    <div class="col2--thumcir__2 ">
                                        <div class="taglinelimit__1 margin__top10">
                                           <?php print changemaker_check_icon_page(changemakers_get_name_contact(strip_tags($user_fields->name))); ?> <?php print changemakers_get_contact(changemakers_get_name_contact(strip_tags($user_fields->name))); ?>
                                        </div>
                                    </div>
                                    </a>

                                    <?php } ?>
                                    
                                </div>

                                    
               
                                    <?php 
                                        $get_team  = changemakers_get_team($result);

                                    ?>
                
                                    <?php
                                    foreach ($get_team as $key => $value) {
                                    ?>
                                    <div class="user--box__small col-xs-12" style="margin-left:0;"> 
                                        <?php if($user->uid == 0){ ?>
                                        <a href="/user/<?php print $value['uid']; ?>"  class="views-ajax-processed-processed">
                                    
                                        <div class="col2--thumcir__1">
                                            <div class="img--wrap__cir">
                                            <img width="150" src="<?php print $value['picture'];?>">
                                            </div>
                                        </div>  
                                    
                                        <div class="col2--thumcir__2">
                                            <div class="taglinelimit__1 margin__top10">
                                            <!-- <i class="glyphicon icon-profile-verify  member--verify"></i>
                                            <?php //print $value['username'];//."  ".$value['lname']; ?>  -->
                                            <?php print changemaker_check_icon_page(changemakers_get_name_contact(strip_tags($value['username']))); ?> <?php print changemakers_get_contact(changemakers_get_name_contact(strip_tags($value['username']))); ?>
                                            
                                            </div>
                                        </div>
                                        </a>
                                        <?php }else{ ?>
                                        <a href="/user/<?php print $value['uid']; ?>" class="views-ajax-processed-processed">
                                    
                                        <div class="col2--thumcir__1">
                                            <div class="img--wrap__cir">
                                            <img width="150" src="<?php print $value['picture'];?>">
                                            </div>
                                        </div>  
                                    
                                        <div class="col2--thumcir__2">
                                            <div class="taglinelimit__1 margin__top10">
                                                <?php print changemaker_check_icon_page(changemakers_get_name_contact(strip_tags($value['username']))); ?> <?php print changemakers_get_contact(changemakers_get_name_contact(strip_tags($value['username']))); ?>
                                            </div>
                                        </div>
                                        </a>

                                        <?php } ?>
                                        
                                    </div>

                                    <?php }  ?>

                          
                                    <?php
                                    /*
                                    foreach ($get_team_project as $key => $value) {
                                        //print $value['role'];
                                    ?>
                                    
                                        <?php
                                        if($value['role'] != "Organization" && $value['role'] != "Coach"){

                                            print $value['role'];
                                         ?>
                                        <a href="/user/<?php print $value['uid']; ?>" class="views-ajax-processed-processed">
                                        
                                    
                                        <div class="col2--thumcir__1">
                                            <div class="img--wrap__cir">
                                            <img width="150" src="<?php print $value['picture'];?>">
                                            </div>
                                        </div>  
                                    
                                        <div class="col2--thumcir__2">
                                           <?php print $value['fname']."  ".$value['lname']; ?> <i class="glyphicon icon-profile-verify  member--verify"></i>
                                        </div>
                                        </a>
                                        <?php } ?>
                                    
                                    <?php } */ ?>
                              
                                    
                                </div>
                   
                        </div>
                        
                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">วันที่เริ่มโปรเจกต์ : </div>
                            <div class="col-xs-7"><?php print changemakers_get_date_thai_short($node->field_project_date['und'][0]['value']); ?></div>
                        </div>

                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">พื้นที่โปรเจกต์ : </div>
                            <div class="col-xs-7"><?php print $node->field_project_area_province['und'][0]['value'];?> <?php if(taxonomy_term_load($node->field_project_area_district['und'][0]['tid'])->name){ print ":";} ?> <?php print taxonomy_term_load($node->field_project_area_district['und'][0]['tid'])->name;?> </div>
                        </div>

                        <div class="row margin__top10">
                            <div class="col-xs-5 topic__graysmall">เว็บไซต์ : </div>
                            <?php 
                                $link = $node->field_project_website['und'][0]['value'];
                                if (strpos($link, 'http') !== false && strpos($link, 'https') !== false ) {
                                   $link = "http://".$link;
                                }

                            ?>
                            <div class="col-xs-7"><a href="<?php print $link; ?>"> <?php print $link; ?></a></div>
                        </div>
                    
                    </div>
                </div>
                
                
            <div class="col-xs-8 pagebigtab--about">                  
                
                <div class="margin__top20 clear">
                     <p class="txt__gray3" >ที่มาโครงการ</p>
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_project_background['und'][0]['value'];?>
                        </div>
                </div>

                <div class="margin__top20 clear">
						<p class="txt__gray3" >แนวคิดโครงการ</p>
						<div class="block--journal--content margin__left20">
							<?php print $node->body['und'][0]['value'];?>
						</div>
                </div>
                
                
                <div class="row">
                      
                    <?php 
                    // print "<pre>";
                    // print_r($node->field_problem_topic['und']);
                    // print "</pre>";


                    $problem_tax =array();
                    for ($i=0; $i < count($node->field_problem_topic['und']) ; $i++) { ?>
                    <!-- <input type="hidden" id="tax_problem_value[<?php// print $i ?>]" name="tax_problem_value[<?php// print $i ?>]" value="<?php// print $node->field_problem_topic['und'][$i]['tid']; ?>">
                     -->
                    <?php
                        if($node->field_problem_topic['und'][$i]['taxonomy_term']->name!= "All"):
                        $problem_tax[] =$node->field_problem_topic['und'][$i]['taxonomy_term']->name;
                        endif;
                        
                    } 
                    ?>
                    <?php if(count($problem_tax) != 0){ ?>
                <div class="margin__top20 col-xs-12" >
                    <p class="txt__gray3" >Problem Topic</p>
                     <div class="taglinelimit__3 margin__left10 ">
                     <i class=" icon-tag "></i>  
                     <input type="hidden" id="tax_problem" name="tax_problem" value="project">

                    
                        <?php print implode(",", $problem_tax)?>

                     </div>
                </div>
                     <?php } ?>
                      
                </div>
                
                
                <div class="row">
                    <?php 
                    $target_tax = array();
                    for ($i=0; $i < count($node->field_project_target['und']) ; $i++) {   ?>
                    
                    <!-- <input type="hidden" id="tax_target_value[<?php //print $i ?>]" name="tax_target_value[<?php //print $i ?>]" value="<?php //print $node->field_project_target['und'][$i]['tid']; ?>">
 -->
                    <?php

                        if($node->field_project_target['und'][$i]['taxonomy_term']->name!= "All"):
                            if($node->field_project_target['und'][$i]['taxonomy_term']->name == "อื่น ๆ (ระบุ)"){
                                $target_tax[] =$node->field_project_target_other['und'][0]['value'];
                            }else{
                                $target_tax[] =$node->field_project_target['und'][$i]['taxonomy_term']->name;
                            }
                        
                        endif;

                        // print "<pre>";
                        // print_r($target_tax);
                        // print "</pre>";
                  
                    } 
                    ?>
                
                
                    <?php if(count($target_tax) != 0){ ?>
                <div class="margin__top20 col-xs-12" >
                    <div class=" clear" >
                    <p class="txt__gray3" >Target</p>   
                     <div class="taglinelimit__3 margin__left10  margin__top5">
                     <span class="icon-target"></span>
                    
                        <?php print implode(",", $target_tax)?>
 
 
                     </div>
               </div>
               </div>
                     <?php } ?>
                 
                </div>
                
                
                
                <div class="margin__top20 clear">
                    <p class="txt__gray3" >เป้าหมายของโครงการ</p>
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_project_goal['und'][0]['value'];?>
                        </div>
                </div>
                
                <div class="margin__top20 clear">
                            <p class="txt__gray3" >เว็บไซต์</p>  
                            <div class="block--journal--content margin__left20">
                            <?php 
                                $link = $node->field_project_website['und'][0]['value'];
                                $a_link = array();
                                $a_link = explode(':', $link);

                                if ($a_link[0] != "http" && $a_link[0] != "https") {
                                   $link = "http://".$link;
                                }
                            ?>
                            <a href="<?php print $link; ?>"> <?php print $link; ?></a>
                        </div>
                </div>

                <div class="margin__top20 clear">
                    <p class="txt__gray3" >ปัญหา</p>
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_describe_problem['und'][0]['value'];?>
                        </div>
                </div>

                <!-- <div class="margin__top20">
                    <p class="txt__gray3" >แนวคิด</p>
                        <div class="block--journal--content margin__left20">
                            <?php //print $node->field_project_big_idea['und'][0]['value'];?>
                        </div>
                </div> -->
                 <div class="margin__top20 clear">
                     <p class="txt__gray3" >วิธีการแก้ไข</p>       
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_project_solutions['und'][0]['value'];?>
                        </div>
                </div>

                <div class="margin__top20 clear">
                    <p class="txt__gray3" >ผลกระทบทางสังคม</p>
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_project_impact['und'][0]['value'];?>
                        </div>
                </div>

                <div class="margin__top20 clear">
                    <p class="txt__gray3" >แผนความยั่งยืน</p>
                        <div class="block--journal--content margin__left20">
                            <?php print $node->field_project_sustainability_pla['und'][0]['value'];?>
                        </div>
                </div>

    
                
            
            </div>
            
            
            </div>
            
    		<div class="row">
				<div class="col-sm-12 col-xs-12 col-xs-12 col-lg-12">
					<div class="block--journal--view">
						
					</div>
				</div>
			</div>
            
			<?php endif; ?>
            <div class=" col-xs-8 float__right margin__top15">
                <div class="row">
			<?php //print render($content['comments']); ?>	
                </div>
            </div>
        </div>
      
    	<div role="tabpanel" class="tab-pane" id="team">
            <?php 

            // print "<pre>";
            // print_r($user_fields);
            // print "</pre>";

            ?>
        
           <div class="col2--viewcontent">
    		
	    	<div class="user--box box3col" style="margin-left:0;"> 
                
                <div class="user--position">
		    		Project Owner 
                    <?php if($check_join_project_status == 1 || $check_coach_project_status == 1 || user_access('can_manage_participation') || $user->uid == $node->uid ){?>
                      <!--   <a  ><i class="icon-cancel-circled txt__red float__right"></i></a> -->
                    <?php } ?>
			    </div>
		      <?php if($user->uid == 0){ ?>
              <a href="/user/<?php print $user_fields->uid;?>" class="views-ajax-processed-processed">
                    
                    <div class="col2--thumcir__1" >
                        <div class="img--wrap__cir">
                            <?php if($user_picture){ 

                                $photo = image_style_url("profile",$user_picture); 

                                ?>
                                <img width="50" src="<?php  print $photo; ?>">
                            <?php }else{ ?>
                                <img width="50px" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                            <?php } ?>
                        
                        </div>
                    </div>  
                    
                    <div class="col2--thumcir__2 link__gray__a" >
                        <div ><?php print $user_fields->name;//field_profile_firstname['und'][0]['value']; ?>
                            <?php //print $user_fields->field_profile_lastname['und'][0]['value']; ?></div>
                        <div class="detail__small__nopad">
                        <i class="glyphicon icon-profile-verify  member--verify"></i>
                        <?php print $user_fields->name; 

                            // print "<pre>";
                            // print_r(user_access('can_see_phone_number'));
                            // print "</pre>";

                            // print "<pre>";
                            // print_r($check_coach_project_status);
                            // print "</pre>";

                        ?>
                        <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                        <br>
                        <!-- tel: --> 
                        <?php //print $user_fields->field_profile_phone['und'][0]['value']; ?>
                        <?php endif; ?>
                        </div>
                    </div>
              </a>

              <?php }else{ ?>
              <a href="/user/<?php print $user_fields->uid;?>" class="views-ajax-processed-processed">
                    
                    <div class="col2--thumcir__1" >
                        <div class="img--wrap__cir">
                            <?php if($user_picture){ 
                                $photo = image_style_url("profile",$user_picture);
                                ?>
                                <img width="50" src="<?php  print $photo;?>">
                            <?php }else{ ?>
                                <img width="50px" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                            <?php } ?>
                        
                        </div>
                    </div>  
                    
                    <div class="col2--thumcir__2 link__gray__a" >
                        <div ><?php print $user_fields->name;//field_profile_firstname['und'][0]['value']; ?>
                            <?php //print $user_fields->field_profile_lastname['und'][0]['value']; ?></div>
                        <div class="detail__small__nopad">
                        <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                        <?php //print $user_fields->name; 

                            // print "<pre>";
                            // print_r(user_access('can_see_phone_number'));
                            // print "</pre>";

                            // print "<pre>";
                            // print_r($check_coach_project_status);
                            // print "</pre>";

                        ?>
                        <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                        <br>
                        <!--  tel:  -->
                        <?php //print $user_fields->field_profile_phone['und'][0]['value']; ?>
                        <?php endif; ?>
                        </div>
                    </div>
              </a>

              <?php } ?>   
		      
            </div>    
             
               
    		<?php 

    		$user_team = changemakers_get_team($result);

            // print "<pre>";
            // print_r($user_team);
            // print "</pre>";
			foreach ($user_team as $key => $value): ?>

    		  <div class="user--box box3col" style="margin-left:0;"> 
                    
                    <div class="user--position">
    			    	<?php print $value['role']; ?>
    			    </div>
                    <?php if(user_access('can_manage_participation')){ ?>
                    <?php if($user->uid == 0){ ?>
                        <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="50" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2 link__gray__a" >
                            <?php print $value['username']; ?>
                            <?php //print $value['lname']; ?>
                             <div class="detail__small__nopad">

                            <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                            <?php //print $value['username']; ?><br>
                            <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1  ): ?>
                                <!--  tel :  --> <?php //print $value['phone']; ?>
                            <?php endif; ?>
                             </div>
                         </div>
                                
                        </a>
                    <?php }else{ ?>
                        <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="50" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2 link__gray__a" >
                            <?php print $value['username']; ?>
                            <?php //print $value['lname']; ?>
                             <div class="detail__small__nopad">

                            <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                            <?php //print $value['username']; ?><br>
                            <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1  ): ?>
                                <!--  tel :  --> <?php// print $value['phone']; ?>
                            <?php endif; ?>
                             </div>
                         </div>
                                
                        </a>
                    <?php } ?>
                    
                    <?php }else{ ?>
                        <?php if($user->uid == 0){ ?>
                        <a href="/user/<?php print $value['uid']; ?>" class="views-ajax-processed-processed">    
                             <div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
                                        <img width="50" src="<?php print $value['picture'];?>">
                                    </div>
                            </div>
                             <div class="col2--thumcir__2 link__gray__a" >
                                <?php print $value['username']; ?>
                                <?php// print $value['lname']; ?>
                                <div class="detail__small__nopad">
                                    <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                <?php //print $value['username']; ?><br>
                                <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                <!-- tel : --> <?php //print $value['phone']; ?>
                                <?php endif; ?>
                                 </div>
                             </div>
                                    
                        </a>

                        <?php }else{ ?>
                        <a href="/user/<?php print $value['uid']; ?>" class="views-ajax-processed-processed">    
                             <div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
                                        <img width="50" src="<?php print $value['picture'];?>">
                                    </div>
                            </div>
                             <div class="col2--thumcir__2 link__gray__a" >
                                <?php print $value['username']; ?>
                                <?php //print $value['lname']; ?>
                                <div class="detail__small__nopad">
                                    <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                <?php //print $value['username']; ?><br>
                                <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                <!-- tel : --> <?php ///print $value['phone']; ?>
                                <?php endif; ?>
                                 </div>
                             </div>
                                    
                        </a>

                        <?php } ?>
                        
                        <?php
                    }
                    ?>
                </div>
	    		
    		<?php endforeach; ?>
            <?php
            $user_team_projects = changemakers_get_team_project($nid);
            // print "<pre>";
            // print_r($user_team_projects);
            // print "</pre>";
            foreach ($user_team_projects as $key => $value): ?>

              <div class="user--box box3col" style="margin-left:0;"> 
                    
                    <?php if($value['role'] == "Organization"){ ?>
                    <div class="user--position">
                        <?php print $value['role']; ?>
                    </div>
                    <?php if(user_access('can_manage_participation')){ ?>
                        <a class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="50" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2 link__gray__a" >
                           <!--  <?php //print $value['fname']; ?>
                            <?php //print $value['lname']; ?>
                             -->
                            
                             
                            <?php print $value['username']; ?>
                            <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                            <?php// print $value['phone']; ?>
                            <?php endif; ?>
                            
                         </div>
                                
                        </a>
                    <?php }else{ ?>
                        <a  class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="50" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2 link__gray__a" >
                            <?php //print $value['fname']; ?>
                            <?php //print $value['lname']; ?>

                            <?php print $value['username']; ?>
                            <div class="detail__small__nopad">
                                <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                            <?php //print $value['username']; ?><br>
                            <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                            <?php //print $value['phone']; ?>
                            <?php endif; ?>
                             </div>
                         </div>
                                
                        </a>
                        <?php
                    } ?>
                    <?php
                    }else{ ?>
                        <div class="user--position">
                        <?php print $value['role']; ?>
                        </div>
                        <?php if(user_access('can_manage_participation')){ ?>
                            <?php if($user->uid == 0){ ?>
                                <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                                 <div class="col2--thumcir__1" >
                                        <div class="img--wrap__cir">
                                            <img width="50" src="<?php print $value['picture'];?>">
                                        </div>
                                </div>
                                 <div class="col2--thumcir__2 link__gray__a" >
                                    <?php print $value['username']; ?>
                                    <?php// print $value['lname']; ?>
                                    <div class="detail__small__nopad">
                                        <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                    <?php //print $value['username']; ?><br>

                                    <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                    <!-- tel : --> <?php //print $value['phone']; ?>
                                    <?php endif; ?>
                                     </div>
                                 </div>
                                        
                                </a>

                            <?php }else{ ?>
                                <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                                 <div class="col2--thumcir__1" >
                                        <div class="img--wrap__cir">
                                            <img width="50" src="<?php print $value['picture'];?>">
                                        </div>
                                </div>
                                 <div class="col2--thumcir__2 link__gray__a" >
                                    <?php print $value['username']; ?>
                                    <?php //print $value['lname']; ?>
                                    <div class="detail__small__nopad">
                                        <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                    <?php //print $value['username']; ?><br>

                                    <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                    <!-- tel : --> <?php //print $value['phone']; ?>
                                    <?php endif; ?>
                                     </div>
                                 </div>
                                        
                                </a>

                            <?php } ?>
                            
                        <?php }else{ ?>

                            <?php if($user->uid == 0){ ?>
                            <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                             <div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
                                        <img width="50" src="<?php print $value['picture'];?>">
                                    </div>
                            </div>
                             <div class="col2--thumcir__2 link__gray__a" >
                                <?php print $value['username']; ?>
                                <?php //print $value['lname']; ?>
                                <div class="detail__small__nopad">
                                    <i class="glyphicon icon-profile-verify  member--verify"></i>
                                <?php ///print $value['username']; ?><br>
                                <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                <!-- tel : --> <?php //print $value['phone']; ?>
                                <?php endif; ?>
                                 </div></div>
                                    
                            </a>

                            <?php }else{ ?>
                            <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                             <div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
                                        <img width="50" src="<?php print $value['picture'];?>">
                                    </div>
                            </div>
                             <div class="col2--thumcir__2 link__gray__a" >
                                <?php print $value['username']; ?>
                                <?php //print $value['lname']; ?>
                                <div class="detail__small__nopad">
                                    <!-- <i class="glyphicon icon-profile-verify  member--verify"></i> -->
                                <?php //print $value['username']; ?><br>
                                <?php if($user->uid == $node->uid || $check_join_project_status == 1 && user_access('can_see_phone_number') || $checkTeamAssignAdmin == 1  && user_access('can_see_phone_number') || $check_org == 1 ): ?>
                                <!-- tel : --> <?php //print $value['phone']; ?>
                                <?php endif; ?>
                                 </div></div>
                                    
                            </a>

                            <?php } ?>
                            
                            <?php
                        } ?>

                    <?php } ?>
                </div>
                
            <?php endforeach;  ?>



            </div> 
         
          <div class="col2--sidebar " style="position:relative;">
            <?php if($check_join_project_status == 1 || $check_coach_project_status == 1 || user_access('can_manage_participation') || $user->uid == $node->uid ){ ?>
            <!-- <a href="#join"  aria-controls="join" role="tab" data-toggle="tab" aria-expanded="false">
              <button class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class="icon-edit-alt"></i>Edit Team Member</button>
            </a> -->
            <?php } ?>
    			
                <!-- <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__gray"><a >JOIN REQUEST</a></h3>
				  	<div class="sidebar--line"></div>
                    
                <div class="sidebar--padding15">
                    <a href="/users/<?php //print $user_fields->name;?>" class="views-ajax-processed-processed">
                    
		    		<div class="col2--thumcir__1" >
                        <div class="img--wrap__cir">
		    			<img width="150" src="/sites/default/files/pictures/<?php  //print $user_picture;?>">
                        </div>
		    		</div>	
                    
		    		<div class="col2--thumcir__2" >
		    			<?php //print $user_fields->field_profile_firstname['und'][0]['value']; ?>
		    			<?php //print $user_fields->field_profile_lastname['und'][0]['value']; ?>
                        <i class="glyphicon icon-profile-verify  member--verify"></i><br>
                        <span class="detail__small txt__gray"><i class=" icon-clock txt__gray2"></i> 4 m.</span>
                        
                        
		    		</div>
	    		</a>
                        
                <p class="clo-xs-12 clear">
                  ธุรกรรมเดชานุภาพ รองรับอิเหนาโปรเจ็คท์ ธุรกรรมต่อยอดคาร์แชมพูสปา       
                        
                </p>
                    
                <div class="margin__top10" style="text-align:center;">
                           
                        
                  <button class="btn btn--submit pagebigtab__2btn" type="submit" name="op" value="Submit">
                      <i class="icon-ok"></i> อนุมัติ
                  </button>       
                        
                    <button class="btn btn--delete pagebigtab__2btn" type="submit" name="op" value="Submit">
                      <i class="icon-cancel"></i> ปฏิเสธ
                  </button>  
                    
                </div>    
                
                </div>
                </div>
                </div> -->
                
                <?php if(!empty($user_following_project)){ ?>
			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__yellow">PROJECT FOLLOWS</h3>
				  	<div class="sidebar--line"></div>
				  	
                    <?php foreach ($user_following_project as $key => $value) { ?>
                    <?php if($user->uid == 0){ ?>
                        <a>
                            <div class="sidebar--verti--content">
                                <div class="col-xs-12 border--row">
                                
                                    <div  class="views-ajax-processed-processed">
                                        <div class="col2--thumcir__1" >
                                            <div class="img--wrap__cir">
                                            <img width="150" src="<?php print $value['picture']; ?>">
                                            </div>
                                        </div>  
                                        
                                        <div class="col2--thumcir__2" >
                                            
                                               <?php print $value['name'];?>
                                           
                                            <i class="glyphicon icon-profile-verify  member--verify"></i><br>

                                           <!--  <span class="detail__small txt__gray"><i class=" icon-clock txt__gray2"></i> 4 m.</span> -->
                                        </div>
                                     
                                    </div>    
                                </div>
                            </div>  
                         </a>
                    <?php }else{ ?>
                        <a href="/user/<?php print $value['uid'];?>">
                            <div class="sidebar--verti--content">
                                <div class="col-xs-12 border--row">
                                
                                    <div  class="views-ajax-processed-processed">
                                        <div class="col2--thumcir__1" >
                                            <div class="img--wrap__cir">
                                            <img width="150" src="<?php print $value['picture']; ?>">
                                            </div>
                                        </div>  
                                        
                                        <div class="col2--thumcir__2" >
                                            
                                               <?php print $value['name'];?>
                                           
                                            <i class="glyphicon icon-profile-verify  member--verify"></i><br>

                                           <!--  <span class="detail__small txt__gray"><i class=" icon-clock txt__gray2"></i> 4 m.</span> -->
                                        </div>
                                     
                                    </div>    
                                </div>
                            </div>  
                         </a>

                    <?php } ?>
                    
                    <?php                  
                    } ?>   
				</div>  	
			    </div>
                <?php } ?>  
    		</div>     
        </div>
</div>

<!-- Modal Intro-->
<div class="modal fade" id="myProjectFund" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        
        
 
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="headline__thaisan ">ADD FUND</h2><br></div>
            <?php
                $w_nid = 92;
                $wnode = node_load($w_nid);
                $form = drupal_get_form('webform_client_form_' . $w_nid, $wnode, array());
                print render($form); 
            ?>

            <?php /*
            <form class="webform-client-form webform-client-form-92" enctype="multipart/form-data" action="/content/fund" method="post" id="webform-client-form-92" accept-charset="UTF-8"><div>

                <div class="form-item webform-component webform-component-date webform-component--date-fund-project form-group">
                <label class="control-label" for="edit-submitted-date-fund-project">Date Fund Project </label>
                <div class="webform-container-inline webform-datepicker"><div class="form-item form-item-submitted-date-fund-project-day form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-project-day">Day </label>
                <select class="day form-control form-select" id="edit-submitted-date-fund-project-day" name="submitted[date_fund_project][day]"><option value="" selected="selected">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div><div class="form-item form-item-submitted-date-fund-project-month form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-project-month">Month </label>
                <select class="month form-control form-select" id="edit-submitted-date-fund-project-month" name="submitted[date_fund_project][month]"><option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select></div><div class="form-item form-item-submitted-date-fund-project-year form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-project-year">Year </label>
                <select class="year form-control form-select" id="edit-submitted-date-fund-project-year" name="submitted[date_fund_project][year]">
                    <option value="" selected="selected">Year</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select></div>

                <input type="image" src="/sites/all/modules/webform/images/calendar.png" class="webform-calendar webform-calendar-start-2014-05-13 webform-calendar-end-2018-05-13 webform-calendar-day-0 hasDatepicker" alt="Open popup calendar" title="Open popup calendar" id="dp1463128129260">

                </div>
                </div>
                <div class="form-item webform-component webform-component-date webform-component--to-date-fund-project form-group">
                  <label class="control-label" for="edit-submitted-to-date-fund-project">To Date Fund Project </label>
                 <div class="webform-container-inline webform-datepicker"><div class="form-item form-item-submitted-to-date-fund-project-day form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-project-day">Day </label>
                <select class="day form-control form-select" id="edit-submitted-to-date-fund-project-day" name="submitted[to_date_fund_project][day]"><option value="" selected="selected">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div><div class="form-item form-item-submitted-to-date-fund-project-month form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-project-month">Month </label>
                <select class="month form-control form-select" id="edit-submitted-to-date-fund-project-month" name="submitted[to_date_fund_project][month]"><option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select></div><div class="form-item form-item-submitted-to-date-fund-project-year form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-project-year">Year </label>
                <select class="year form-control form-select" id="edit-submitted-to-date-fund-project-year" name="submitted[to_date_fund_project][year]">
                    <option value="" selected="selected">Year</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select></div>


                <input type="image" src="/sites/all/modules/webform/images/calendar.png" class="webform-calendar webform-calendar-start-2014-05-13 webform-calendar-end-2018-05-13 webform-calendar-day-0 hasDatepicker" alt="Open popup calendar" title="Open popup calendar" id="dp1463128129261">

                </div>
                </div>
                <div class="form-item webform-component webform-component-textfield webform-component--fund-source-project form-group">
                  <label class="control-label" for="edit-submitted-fund-source-project">FUND SOURCE Project </label>
                 <input class="form-control form-text" type="text" id="edit-submitted-fund-source-project" name="submitted[fund_source_project]" value="" size="60" maxlength="128">
                </div>
                <div class="form-item webform-component webform-component-textfield webform-component--fund-type-project form-group">
                  <label class="control-label" for="edit-submitted-fund-type-project">FUND TYPE Project </label>
                 <input class="form-control form-text" type="text" id="edit-submitted-fund-type-project" name="submitted[fund_type_project]" value="" size="60" maxlength="128">
                </div>
                <div class="form-item webform-component webform-component-textfield webform-component--fund-amount-project form-group">
                  <label class="control-label" for="edit-submitted-fund-amount-project">FUND AMOUNT Project </label>
                 <input class="form-control form-text" type="text" id="edit-submitted-fund-amount-project" name="submitted[fund_amount_project]" value="" size="60" maxlength="128">
                </div>
                <div class="form-item webform-component webform-component-textfield webform-component--fund-use-project form-group">
                  <label class="control-label" for="edit-submitted-fund-use-project">FUND USE Project </label>
                 <input class="form-control form-text" type="text" id="edit-submitted-fund-use-project" name="submitted[fund_use_project]" value="" size="60" maxlength="128">
                </div>
                <div class="form-item webform-component webform-component-textfield webform-component--nid form-group">

                 <input class="form-control form-text" type="hidden" id="edit-submitted-nid" name="submitted[nid]" value="<?php print $nid; ?>" size="60" maxlength="128">
                </div>
                <input type="hidden" name="details[sid]">
                <input type="hidden" name="details[page_num]" value="1">
                <input type="hidden" name="details[page_count]" value="1">
                <input type="hidden" name="details[finished]" value="0">
                <input type="hidden" name="form_build_id" value="<?php print $form_build_id; ?>">
                <input type="hidden" name="form_token" value="<?php print $form_token_fund; ?>">
                <input type="hidden" name="form_id" value="webform_client_form_92">
                <div class="form-actions"><button class="webform-submit button-primary btn btn-primary form-submit" type="submit" name="op" value="Submit">Submit</button>
                </div>
                <!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

                </div>
            </form>

             */?>

        
        </div> ?>
      
    </div>
</div>
<!-- Modal Update-->
<div class="modal fade" id="myProjectEditFund" role="dialog">
    <div class="modal-dialog modal-lg">    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="headline__thaisan ">EDIT FUND</h2><br></div>
            <?php
                $w_nid = 92;
                $wnode = node_load($w_nid);
                $form = drupal_get_form('webform_client_form_' . $w_nid, $wnode, array());
                print render($form); 
            ?>
        </div>
    </div>
</div>



<script type="text/javascript">

(function($) {
    $(document).ready(function(){

    function sortSelect(selElem) {
        var tmpAry = new Array();
        for (var i=0;i<selElem.options.length;i++) {
            if(selElem.options[i].value != ""){
                tmpAry[i] = new Array();
                tmpAry[i][0] = selElem.options[i].text;
                tmpAry[i][1] = selElem.options[i].value;
            }
        }
        tmpAry.reverse();
        while (selElem.options.length > 0) {
            selElem.options[0] = null;
        }
        for (var i=0;i<tmpAry.length-1;i++) {
            var op = new Option(tmpAry[i][0], tmpAry[i][1]);
            selElem.options[i] = op;
        }
        return;
    }

    // $('input[name="submitted[fund_amount_project]"]').keyup(function(evt)
    //                             {
    //     // if (/\D/g.test(this.value))
    //     // {
    //     //     // Filter non-digits from input value.
    //     //     this.value = this.value.replace(/\D/g, '');
    //     // }
    //     var theEvent = evt || window.event;
    //       var key = theEvent.keyCode || theEvent.which;
    //       key = String.fromCharCode( key );
    //       var regex = /[0-9]|[\b]/;
    //       if( !regex.test(key) ) {
    //         theEvent.returnValue = false;
    //         if(theEvent.preventDefault) theEvent.preventDefault();
    //       }
    // });

    sortSelect(document.getElementById('edit-submitted-date-fund-project-year'));

        $("#create_journal").hide();
        $("#show_journal").click(function(){ 
            $("#create_journal").show();
        });

        $("#field_didi_icon").click(function(){ 
            $("#field_didi").submit();
        });
        $("#field_swot_icon").click(function(){ 
            $("#field_swot").submit();
        });
        $("#field_brainstorming_icon").click(function(){ 
            $("#field_brainstorming").submit();
        });
        $("#field_idea_selection_icon").click(function(){ 
            $("#field_idea_selection").submit();
        });
        $("#field_theory_of_change_icon").click(function(){ 
            $("#field_theory_of_change").submit();
        });
        $("#field_impact_value_icon").click(function(){ 
            $("#field_impact_value").submit();
        });
        $("#field_drafting_your_business_mod_icon").click(function(){ 
            $("#field_drafting_your_business_mod").submit();
        });
        $("#field_value_proposition_icon").click(function(){ 
            $("#field_value_proposition").submit();
        });
        $("#field_stakeholder_analysis_icon").click(function(){ 
            $("#field_stakeholder_analysis").submit();
        });
        $("#field_business_model_canvas_icon").click(function(){ 
            $("#field_business_model_canvas").submit();
        });
        $("#field_build_value_proposition_hy_icon").click(function(){ 
            $("#field_build_value_proposition_hy").submit();
        });
        $("#field_measure_testing_and_data_c_icon").click(function(){ 
            $("#field_measure_testing_and_data_c").submit();
        });
        $("#field_learn_feedback_analysis_icon").click(function(){ 
            $("#field_learn_feedback_analysis").submit();
        });
        $("#field_decide_criteria_for_making_icon").click(function(){ 
            $("#field_decide_criteria_for_making").submit();
        });
        $("#field_business_plan_icon").click(function(){ 
            $("#field_business_plan").submit();
        });
        $("#field_workplan_icon").click(function(){ 
            $("#field_workplan").submit();
        });
        $("#field_factsheet_icon").click(function(){ 
            $("#field_factsheet").submit();
        });
        $("#field_visual_icon").click(function(){ 
            $("#field_visual").submit();
        });
        $("#field_verbal_icon").click(function(){ 
            $("#field_verbal").submit();
        });
        $("#field_profit_loss_projection_icon").click(function(){ 
            $("#field_profit_loss_projection").submit();
        });
        $("#field_aar_icon").click(function(){ 
            $("#field_aar").submit();
        });
        $("#field_visual_icon").click(function(){ 
            $("#field_visual").submit();
        });
        $("#field_scaling_plan_icon").click(function(){ 
            $("#field_scaling_plan").submit();
        });
        $("#other_file_icon").click(function(){ 
            $("#other_file").submit();
        });

        






        

        $("#webform_client_form_92_reset").click(function(){

            //$("input[name*='submitted[nid]']").val("");
            $("#edit-submitted-date-fund-project-day").prop('selectedIndex', 0);
            $("#edit-submitted-date-fund-project-month").prop('selectedIndex', 0);
            $("#edit-submitted-date-fund-project-year").prop('selectedIndex', 0);
            $("input[name*='submitted[fund_amount_project]']").val("");
            $("input[name*='submitted[fund_source_project]']").val("");
            $("textarea[name*='submitted[fund_use]']").val("");
            
        });



        
        $( "#webform-client-form-92" ).submit(function( event ) {
      
            // var month_s = $('#edit-submitted-date-fund-project-month').val();

            // var expireDate = new Date(expireDateArr[2], expireDateArr[0], expireDateArr[1]);
            // var todayDate = new Date();
            // alert(month);
            //  event.preventDefault();
        });


        var active_class = "<?php print $class_active; ?>";

        if(active_class == "fund"){
            $( "#fund" ).addClass( "active" );
        }else if(active_class == "about"){
            $( "#about" ).addClass( "active" );
        }
        else if(active_class == "participation"){
            $( "#join" ).addClass( "active" );
        }
        else if(active_class == "document"){
            $( "#document" ).addClass( "active" );
        }else if(active_class=="timeline"){
            $( "#timeline" ).addClass( "active" );        
        }else{
             $( "#about" ).addClass( "active" );
        }        

        $("input[name*='submitted[nid]']").val("<?php print $nid; ?>");
       
        var pid = $('.detail--icon--view').attr('data-pid');
        $.ajax({
          url: "/changemakers/project_view/"+pid,
          type: "POST",
          dataType: "json",         
          success : function(data) { 
           
            $('.detail--icon--view .pagebigtab--detail-txt').html(data['value']);
            
          }
        });
      

        $('.comment-form').hide();

        var temp=$('#selectType').val();

        
        $( "#btn_show_comment" ).click(function() {
          $('.comment-form').show();
        });


        if(temp != ""){
            $("#filterSelect").val(temp);
        }else{
            $("#filterSelect").val("ALL");
        }
        //document.getElementById("edName").required = true;
        $('#edit-field-journal-project-id-und-0-value').val($('#node_id').val());
        $('#edit-field-project-related-und').val($('#node_id').val());
        $('#edit-field-project-related-und').attr( "readonly", true );
        $('#edit-submitted-date-fund-project-day').prop("required", true);
        $('#edit-submitted-date-fund-project-month').prop("required", true);
        $('#edit-submitted-date-fund-project-year').prop("required", true);
        $('#edit-submitted-to-date-fund-project-day').prop("required", true);
        $('#edit-submitted-to-date-fund-project-month').prop("required", true);
        $('#edit-submitted-to-date-fund-project-year').prop("required", true);
        $('#edit-submitted-fund-type-project').prop("required", true);
        $('#edit-submitted-fund-amount-project').prop("required", true);
        $('#edit-submitted-fund-use-project').prop("required", true);
        $("#edit-submitted-fund-source-project").prop("required", true);

        //$('#myTextarea').prop('required',true);
        // alert("tong1");
        // $("input[name = 'op']").click(function(){
        //     alert("tong");
        // });

        $("input[name*='comment_body[und][0][value]']").attr('required', 'required');


        // $("form[name='comment_project_form']").submit(function(){

        //     $("form").submit();
        // });

        


        //alert(temp);
    });   
}(jQuery));

    
// function loadComment(){
//     var x = document.getElementById("filterSelect").value;
//     var filterSelectComment = document.getElementById("filterSelectComment").value;
//     window.location.href = 'http://changemakers.devfunction.com/project/'+filterSelectComment+'?type='+x;
//     //alert(x);
// }

function submitForm()        
{       
    var form_leave = document.getElementById("form_leave"); 
    form_leave.submit();       
} 

//document.getElementById("filterSelect").value = "Progress";
//document.getElementById('test').value = null;
//document.getElementById("test").value = "Progress";



</script>

<?php
 // db_query("update field_data_field_count_views_project set field_count_views_project_value = ".$count_view." WHERE entity_id = ".$nid);
  //changemakers_update_view($count_view, $node->nid);

// print "<pre>";
// print_r($node);
// print "</pre>";
$count_view = $node->field_count_views_project['und'][0]['value']++;
$node->field_count_views_project['und'][0]['value'] = $count_view;


 ?>

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

</style>
<?php 
global $user;
//load data
$node = node_load($nid);
// $node->field_count_views_project['und'][0]['value'] += 1;
// node_save($node);



$data_user_request_join_project = changemakers_get_request_join_project();
$result = changemakers_get_data_from_webform_project($nid);
$fund = changemakers_get_data_from_webform_project_fund($nid);
$checkJoinProject = changemakers_check_join_project($result, $nid);
$checkJoinProject_status = changemakers_check_join_project_status($result, $nid);
$journal_data = changemakers_get_journal($nid);
//user create node
$user_fields = user_load($node->uid);
$user_picture =  $node->picture->filename;

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
$check_team_project_status = changemakers_check_team_project_status($nid);
$get_progress_project  = changemakers_get_progress_project($node->field_project_progress['und'][0]['value']);






$select_type = $_GET['type'];


if($_SERVER['REQUEST_URI']!='/'):
?>


<div class="col-xs-12 ">
    <div class="row">.
    <input type="hidden" id="node_id" value="<?php print $nid; ?>">
    
	<div class="pagebigtab--wrap--img ">
        <div class="row">
		<img class="image-width-project" src="/sites/default/files/<?php print $node->field_project_image['und'][0]['filename'];?>">
	</div>
    </div>
    
	<div class="pagebigtab--detail  ">
        
        <div class="pagebigtab-detail--name">
        <h1 class="headline__thaisan pagebigtab--name clear"><?php //print $node->title; 

        print "<pre>";
print_r($node);
print "</pre>";
        // print "<pre>";
        // print_r($node);
        // print "</pre>";

        ?></h1>

         <div class="detail__medium clear" >
             <span class=" icon-tag"></span> &nbsp;
             <input type="hidden" id="tax_problem" name="tax_problem" value="project">

            <?php 
            // print "<pre>";
            // print_r($node->field_problem_topic['und']);
            // print "</pre>";



            for ($i=0; $i < count($node->field_problem_topic['und']) ; $i++) { 
            ?>
                <input type="hidden" id="tax_problem_value[<?php print $i ?>]" name="tax_problem_value[<?php print $i ?>]" value="<?php print $node->field_problem_topic['und'][$i]['tid']; ?>">
            <?php
               if($i == count($node->field_problem_topic['und'])-1){ ?>
                    <a href="#" class="link__blue"><?php print $node->field_problem_topic['und'][$i]['taxonomy_term']->name;?></a>
               <?php } 
               else{ ?>
                    <a href="#" class="link__blue"><?php print $node->field_problem_topic['und'][$i]['taxonomy_term']->name.", ";?></a>
               <?php }
            } ?>

            
             
            <span class="icon-target"></span> &nbsp;
            <?php for ($i=0; $i < count($node->field_project_target['und']) ; $i++) {  ?>
                <input type="hidden" id="tax_target_value[<?php print $i ?>]" name="tax_target_value[<?php print $i ?>]" value="<?php print $node->field_project_target['und'][$i]['tid']; ?>">
                <?php
               if($i == count($node->field_project_target['und'])-1){ ?>
                    <a href="#" class="link__blue"><?php print $node->field_project_target['und'][$i]['taxonomy_term']->name;?></a>
               <?php } 
               else{ ?>
                    <a href="#" class="link__blue"><?php print $node->field_project_target['und'][$i]['taxonomy_term']->name.", ";?></a>
               <?php }
            } ?>
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
                            print "Verify";
                        } 
                        else{
                            print "Not Verify";
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
                    <p class="pagebigtab--detail-txt"><?php if($node->field_project_status['und'][0]['value'] == 1){
                        print "Active";
                    }
                    else{
                        print "Not Active";
                    }
                    ;?></p>
                </div>
                <div class="pagebigtab--detail--box detail--icon--view">
                    <p class="pagebigtab--detail-topic">VIEWS</p>
                    <p class="pagebigtab--detail-txt"><?php print $node->field_count_views_project['und'][0]['value']; ?></p>
                </div>
            
        </div>

        
        <div class=" pagebigtab--social--wrap txt__center" style="margin-top:15px; ">
        
        
        <!--Social-->
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_sharing_toolbox"></div>
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
         <?php if($checkJoinProject_status == 1){ ?>
                <br><br>
                <span class="label label-success">เป็นสมาชิกเรียบร้อยแล้ว</span>
       
         
  
         <?php } ?>
            <?php if($checkJoinProject_status == 0 && $user->uid > 0 && $user->uid != $node->uid && $user->roles[8] || $checkJoinProject_status == 0 && $user->uid > 0 && $user->uid != $node->uid && $user->roles[10] || $checkJoinProject_status == 0 && $user->uid > 0 && $user->uid != $node->uid  && $user->roles[4]){ ?>
			
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
						
                        
                        
                            <button class="btn btn--submit " type="submit" name="op" value="Submit"><i class="icon-link"></i> 
                            Join Project</button>
						
						<!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

					
				</form>
			
				<?php if($check_follow_project == 0 && $checkJoinProject_status == 0){ ?>
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
                    
                    <button type="submit" value="submit" class="btn btn--delete "><i class="icon-forward"></i>Unfollow Project</button>
            </form>
            
            <?php } ?>
		
	        
        
        </div>
	
	</div>
    <!--
	<div class="col-xs-3">
		<div class="col-xs-3 padding-header button-float-right">
			<a href="#">
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
			</a>
		</div>
		<div class="col-xs-3 padding-header button-float-right">
			<a href="#">
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/twitter_icon.png"></p>
			</a>
		</div>-->
    
     
		
	</div>
    
	
</div>
<br/><br/><br/>
<div class="margin-top-header">    
   <ul class="pagebigtab--nav list-inline col-xs-12" role="tablist">
            <li role="presentation" class="active">
            <a href="#timeline" class="pagebigtab--nav--list nav--timeline "  aria-controls="timeline" role="tab" data-toggle="tab">
                TIMELINE<div class="nav--timeline--icon"></div>
            </a>
            </li>
       
       
            <li role="presentation">
            <a href="#journal" class="pagebigtab--nav--list nav--journal" aria-controls="journal" role="tab" data-toggle="tab">JOURNAL 
                <div class="nav--journal--icon"></div></a>
            </li>
            
            <li role="presentation">
            <a href="#document" class="pagebigtab--nav--list nav--doc" aria-controls="document" role="tab" data-toggle="tab">DOCUMENT 
                <div class="nav--doc--icon"></div></a>
            </li>
            
            <li role="presentation">
            <a href="#fund" class="pagebigtab--nav--list nav--fund" aria-controls="fund" role="tab" data-toggle="tab">FUND 
                <div class="nav--fund--icon"></div></a>
            </li>
       
            
            <?php if($user->uid == $node->uid || isset($user->roles[3])): ?>
            <li role="presentation">
            <a href="#join" class="pagebigtab--nav--list nav--project"  aria-controls="join" role="tab" data-toggle="tab">PARTICIPATION
                <div class="nav--project--icon"></div></a>
            </li>
            <?php endif;?>
            
       
       
            <li role="presentation" class="float-right-tab-menu">
            <a href="#team" class=" pagebigtab--nav--list nav--team" aria-controls="team" role="tab" data-toggle="tab">TEAM <div class="nav--team--icon"></div></a>
            </li>
       
            <li role="presentation" class="float-right-tab-menu">
            <a href="#about" class=" pagebigtab--nav--list nav--about" aria-controls="about" role="tab" data-toggle="tab">ABOUT <div class="nav--about--icon"></div></a>
            </li>
    </ul>

  	<!-- Tab panes -->
  	<div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="timeline">
            
    		<div class="col2--viewcontent">
    			<div class="tab__yellow pagebigtab--tab--filter" >
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
			  	
			  
   </div> 
   <?php
        $node_comment = node_load($node->nid);
        $node_view = node_view($node);
        $node_view['comments'] = comment_node_page_additions($node_comment);
        print render($content['comments']);
    ?>           
                
    <div id="show_comment">           
       
    </div> 
   
<!--                
   <div class="pagebigtab--update--post  col-xs-12" style="margin-top:20px;">
    <div class="col-xs-11 pagebigtab--update--side">

    </div>
    </div>
 <div class="pagebigtab--update--post  col-xs-12" style="margin-top:20px;">
        
    <div class="col-xs-1 pagebigtab--update--userimg">
        <a href="#"><div class="cir--thumb__50" style="background:#333333;"></div></a>
    </div>
    <div class="col-xs-11 pagebigtab--update--side">
        <a href="#" class="detail__mid pagebigtab--update--username link__blue">David_a</a><br>
        <textarea class="pagebigtab--update--input"></textarea>
                
        <div class="pagebigtab--group--btn">
            <button class="btn btn--default"><i class=" icon-folder-open"></i> Browse</button>
            <span>.jpg, .gif, .png ไม่เกิน 200 kb</span>
            <button class="btn btn--submit" style="float:right;">Submit</button>
        </div>
    </div>
</div>
        -->         
                
                
    <!-- <div class="col-xs-12" style="margin-top:15px;  " >
        <div class="row">
        
            <div class="col-xs-4">
                <div class="pagebigtab--update--profile--box col-xs-12 row">
                <a href="#"><div class="cir--thumb__50" style="background:#333333;"></div></a>
                
                <div class="pagebigtab--update--profile--detail ">
                    <a href="#" class="detail__mid link__blue">David_a <span class="icon-profile-verify member--verify"></span></a><br/>
                    
                    <div class="detail__small"><span class=" icon-clock"></span> 4h.</div>
                </div>
                </div>
            </div>
            <div class="col-xs-8 pagebigtab--update--content">
            <div class="pagebigtab--update--post--arrow"></div>
                ละอ่อนดีมานด์บาร์บีคิว ธุหร่ำโบว์ แคร์เวเฟอร์รีทัชป๊อป สเปก ความหมายเฮอร์ริเคนครัวซอง ไฟลท์แช่แข็ง โนติส หลวงพี่มาร์ชทอมคอนเฟิร์ม เย้วมาร์คแซ็กโซโฟน ทัวริสต์ บอมบ์งั้นรากหญ้า วอฟเฟิลทอมสะกอมเทป ไลท์ จูนเดบิตแรงดูดวันเวย์ กฤษณ์บลูเบอร์รี บ๊วยฟรุตแฟล็ต
            
            
            <div class="comment--action">
                <div class="btn"><i class="icon-heart-empty"></i> 12 Likes</div>
                <div class="btn"><a href="#"><i class="icon-comment"></i> 12 Comments</a></div>
            </div>
            
            
            </div>
            
            
        </div>
    </div>
           <div class="wrap--btn--viewmore col-xs-12" style="margin:20px;">
    <button type="submit" class="btn btn--submit">VIEW MORE <i class="glyphicon glyphicon-play-circle"></i></button>
    </div>   -->   
                
    </div>		
            
            
            
    		<div class="col2--sidebar " style="position:relative;">
                <?php if($check_join_project_status == 1 | $check_team_project_status == 1 || isset($user->roles[3]) || $user->uid == $node->uid ){ ?>
        
                <button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Create Project Update</button>

                <?php } ?>
                
    			<div class="sidebar--wrap  bottom__lightgray col-xs-12" >
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__blue"><a href="#">COMMUNITY NEED</a></h3>
                    <?php echo views_embed_view('community_need', $display_id = 'block'); ?>
				  	
                </div>
                </div>
                
                
                
			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__black"><a href="#">CURRENT CAMPAIGN</a></h3>
				  	<div class="sidebar--line"></div>
				  	
				    <div class="sidebar--verti--content" >
                        <div class="col-xs-12 border--row">
                            <div class="row">
                                <?php foreach ($project_join_campaign as $key => $value) { ?>
                               
                                <div class="col-xs-5">
                                    <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                                        <div class="field-items">
                                        <div class="field-item even">

                                        <div class="field-content">
                                        <a href="/campaign/<?php print $value['node_id'] ?>"><img typeof="foaf:Image" class="img-responsive" src="<?php print $value['picture']; ?>" width="220" height="157" alt=""></a>
                                        </div>                        
                                        </div>
                                        </div>
                                    </div>
                                    <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                                </div>
                                <div class="col-xs-7 row">

                                <a href="#" class="sample--text__small">
                                    <span class="field-content"></span></a><a href="/news/56"><?php print $value['title'] ?></a>                

                                <div class="detail__small link__gray__a">

                                    <div class="detail__small">
                                    <span class="txt__gray"><span class=" icon-clock txt__gray2"></span><?php print $value['date'] ?><br></span>    
                                        Status : <span class="txt__gray">ได้รับการคัดเลือกแล้ว</span>
                                    </div>
                                </div>
                                
                                </div>
                                <?php  } ?>
                            </div>
                        </div>	  
			        </div>
                        
					</div>	  
			    </div>
    		</div>
    	</div>
    	<div role="tabpanel" class="tab-pane journal--page" id="journal">
            <div class="clear"></div>
            <?php if($user->uid == $node->uid || isset($user->roles[3])){  ?>
                

                <?php 

                // $node_form = new stdClass;
                // $node_form->type = 'journal';
                // $node_form->language = LANGUAGE_NONE;
                // print drupal_render(drupal_get_form('journal_node_form',$node_form));

                module_load_include('inc', 'node', 'node.pages');
                $form = node_add('journal');
                print "<br>";
                print drupal_render($form);

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


                } ?>
            

            <?php 
            // print '<pre>';
            // print_r($journal_data);
            // print '</pre>';
            foreach ($journal_data as $value): ?>
            <div class="col-xs-3 box__pad6">
                <div class="page1-4--box">
                    <div class="thumbbox--wrap--img">

                        <div class="field-content">
                            <a href="/journal/<?php print $value['nid']; ?>">
                                <img typeof="foaf:Image" class="img-responsive" src="<?php print $value['journal_pictrue'];?>" width="269" height="150" alt="">
                            </a>
                        </div>        

                                
                        <div id="moredetail__over" class="field--content boxover">
                    
                            <div class="detail__small d__inline-block">
                                <a href="#"></a><h4 class="headline__thaisan"><a href="#"><span class="field-content"></span></a>
                                <a href="/journal/<?php print $value['nid'];  ?>"><?php print $value['title']; ?></a></h4>
                        
                                <span class="icon-clock txt__gray2"></span><?php print $value['date']; ?><br>
                                <span class=" icon-group txt__gray2"></span> <a href="#">12</a><br>
                                <span class=" icon-eye-outline txt__gray2"></span> <a href="#">Target <?php print $value['target']; ?></a><br>
                        
                        
                             <div id="moredetail__hide">
                             <a href="#"><p class="moredetail__over__content"><?php print $value['content']; ?></p></a>
                             </div>
                            
                            </div>
                        </div>
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

                    

                    $field_concern =  $node->field_concern['und'][0]['filename'] ;
                    $field_concern_file_size =  "(".round(($node->field_concern['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$problem_research_plannin =  $node->field_problem_research_planning['und'][0]['filename'] ;
        		  	$problem_research_plannin_file_size =  "(".round(($node->field_problem_research_planning['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_root_cause_analysis =  $node->field_root_cause_analysis['und'][0]['filename'] ;
        		  	$field_root_cause_analysis_file_size =  "(".round(($node->field_root_cause_analysis['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_problem_defined =  $node->field_problem_defined['und'][0]['filename'] ;
        		  	$field_problem_defined_file_size =  "(".round(($node->field_problem_defined['und'][0]['filesize'] / 1024), 0)." Kb )";


        		  	$field_theory_of_change =  $node->field_theory_of_change['und'][0]['filename'] ;
        		  	$field_theory_of_change_file_size =  "(".round(($node->field_theory_of_change['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_business_model_canvas =  $node->field_business_model_canvas['und'][0]['filename'] ;
        		  	$field_business_model_canvas_file_size =  "(".round(($node->field_business_model_canvas['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_gantt_chart =  $node->field_gantt_chart['und'][0]['filename'] ;
        		  	$field_gantt_chart_file_size =  "(".round(($node->field_gantt_chart['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_teams_financial_report =  $node->field_teams_financial_report['und'][0]['filename'] ;
        		  	$field_teams_financial_report_file_size =  "(".round(($node->field_teams_financial_report['und'][0]['filesize'] / 1024), 0)." Kb )";

        		  	$field_teams_bank_account =  $node->field_teams_bank_account['und'][0]['filename'] ;
        		  	$field_teams_bank_account_file_size =  "(".round(($node->field_teams_bank_account['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_contract = $node->field_contract['und'][0]['filename'];
                    $field_contract_file_size = "(".round(($node->field_contract['und'][0]['filesize'] / 1024), 0)." Kb )";

                    $field_project_overview = $node->field_project_overview['und'][0]['filename'];
                    $field_project_overview_file_size = "(".round(($node->field_project_overview['und'][0]['filesize'] / 1024), 0)." Kb )";


                    //     print "<pre>";
                    // print_r($field_concern);
                    // print "</pre>";

        		?>
        		<div  class="col-xs-12 ">
                    <?php if(isset($field_concern) || isset($problem_research_plannin) || isset($field_root_cause_analysis) || isset($field_problem_defined) || isset($field_theory_of_change)){ ?>
    			  	<h3 class="headline--alte">ASSIGNMENT SUBMISSIONS</h3>
    			  	<?php } ?>
                        <div class="col-xs-12 margin__top10">
                       

                        <?php if($field_concern){ ?>
                            <label class="label__col">What's your concern?</label>
                            <div  class="field__2col">
                            <a href="/sites/default/files/<?php echo $field_concern ?>" type="application/msword; length=101888" target="_blank">
                                <div class="btn btn--dowload--file">
                                    
                                        <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                        <i class="icon-download"></i>
                                    
                                    <?php echo $field_concern ?>
                                    <?php echo $field_concern_file_size;?>
                                    <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                    <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                    <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                </div>
                            </a>
                            <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                        </div>
                        
                        <?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                         <label class="label__col">What's your concern?</label>   
           
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document1')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
    
                        <?php }else{ ?>
                            
                        <?php } ?>
                            
                        
                        </div>
                        
                        
                        
                        
    			  		<div class="col-xs-12 margin__top10">
                            
    				  	
    				  	<?php if($problem_research_plannin){ ?>
                            <label class="label__col">Problem Research Planning</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $problem_research_plannin; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $problem_research_plannin ?>
                                        <?php echo $problem_research_plannin_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>

    					
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <label class="label__col">Problem Research Planning</label>
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document2')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
            
                        <?php } ?>
                        </div>
                    
                    
                    
    					<div class="col-xs-12 margin__top10">
                            
    				  	
    				  	<?php if($field_root_cause_analysis){ ?>
                            <label class="label__col">Root Cause Analysis</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_root_cause_analysis; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_root_cause_analysis ?>
                                        <?php echo $field_root_cause_analysis_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>
                    
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <label class="label__col">Root Cause Analysis</label>
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document3')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
                  
                        <?php } ?>
                        </div>
                    
                    
    					<div class="col-xs-12 margin__top10">
                            
    				  	
    				  	<?php if($field_problem_defined){ ?>
                            <label class="label__col">Problem Defined</label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_problem_defined ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_problem_defined ?>
                                        <?php echo $field_problem_defined_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>
    					<?php }else{ ?>
       
                        <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                        <label class="label__col">Problem Defined</label>
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document4')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
                        <?php } ?>
                        </div>
                
                    
                    
    					<div class="col-xs-12 margin__top10">
                            
    				  	<?php if($field_theory_of_change){ ?>
                            <label class="label__col">Theory of Change</label>
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
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>
    					
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <label class="label__col">Theory of Change</label>    
                            <div  class="field__2col">
                                <?php print render(drupal_get_form('changemakers_form_document5')); ?>
                                <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                                <br>
                               <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                            </div>
                 
                        <?php } ?>
                        </div> 
                

    			  	
    			</div>
                
                
    			<div class="col-xs-12 margin__top25">

                    <?php if(isset($field_project_overview) || isset($field_business_model_canvas) || isset($field_gantt_chart)){ ?>
    			  	<h3 class=" headline--alte">PROJECT FRAMEWORK</h3>
                    <?php } ?>
                    <?php if($user->uid == $node->uid || isset($user->roles[3])){ ?>
    			  	<p style="margin-top:5px;"><span class="txt__red">*</span>เอกสารในส่วนนี้ต้องครบเพื่อประโยชน์ในการยืนยันโครงการและมีสิทธิร่วมแคมเปญ</p>
                    <?php } ?>
    			  	<div class="col-xs-12">
    			  		
    				  	
    				  	<?php if($field_project_overview){ ?>
                            <label class="label__col">
                                Project Overview
                            </label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_project_overview; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_project_overview; ?>
                                        <?php echo $field_project_overview_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                               <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>  
                        <label class="label__col">
                            Project Overview
                        </label>     
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document6')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
                        </div>
                    
                    
                        
    					<div class="col-xs-12 margin__top10">
    						
    				  	
    				  	<?php if($field_business_model_canvas){ ?>
                            <label class="label__col">
                                Business Model Canvas
                            </label>
    			  		    <div  class="field__2col">
    					  		<a href="/sites/default/files/<?php echo $field_business_model_canvas ?>" type="application/msword; length=101888" target="_blank">
    						  		<div class="btn btn--dowload--file">
    						  			
    						  				<!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
    						  			
    						  			<?php echo $field_business_model_canvas; ?>
    						  			<?php echo $field_business_model_canvas_file_size;?>
    							  		<!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
    							  		<!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
    									<input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
    								</div>
    							</a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
    						</div>
    					<?php } else if($user->uid == $node->uid || isset($user->roles[3])){ ?>   
                        <label class="label__col">
                            Business Model Canvas
                        </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document7')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
          
                        </div>    
                            
    					<div class="col-xs-12 margin__top10">
    						
                            
    				  	<?php if($field_gantt_chart ){ ?>
                            <label class="label__col">
                                Gantt Chart
                            </label>
        			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_gantt_chart; ?>" type="application/msword; length=101888" target="_blank">
                                    <div class="btn btn--dowload--file">
                                        
                                            <!--<img class="file-icon"  width="25px" alt="Microsoft Office document icon" title="application/msword" src="/sites/all/themes/changemakers/images/download.png"> -->
                                            <i class="icon-download"></i>
                                        
                                        <?php echo $field_gantt_chart; ?>
                                        <?php echo $field_gantt_chart_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            </div>
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>   
                        <label class="label__col">
                            Gantt Chart
                        </label>   
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document8')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
               
                        <?php } ?>
                        </div>
      
    			</div>
    			
    			<div class="col-xs-12 margin__top25">
                    <?php if(isset($field_teams_financial_report) || isset($field_contract) || isset($field_teams_bank_account) ){ ?>
    			  	<h3 class=" headline--alte">FINANCIAL DOCUMENTS</h3>
                    <?php } ?>
                    <?php if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                    <p style="margin-top:5px;"><span class="txt__red">*</span>เอกสารในส่วนนี้ต้องครบเพื่อประโยชน์ในการยืนยันโครงการและมีสิทธิร่วมแคมเปญ</p>
                    <?php } ?>
    			  	<div class="col-xs-12">
    						
    				  	<?php if($field_teams_financial_report){ ?>
                            <label class="label__col">
                                Team's Financial Report
                            </label>
                        
    			  		    <div  class="field__2col">
    					  		<a href="/sites/default/files/<?php echo $field_teams_financial_report ?>" type="application/msword; length=101888" target="_blank">
    						  		
    						  			<div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_teams_financial_report ?>
                                            <?php echo $field_teams_financial_report_file_size;?>
    							  		<!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
    							  		<!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
    									<input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
    								</div>
    							</a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
    						
    					</div>
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?> 
                        <label class="label__col">
                            Team's Financial Report
                        </label>     
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document9')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
                 
                        </div>
                    
                    
    					<div class="col-xs-12 margin__top10">
    						
    				  	
    				  	<?php if($field_contract){ ?>
                            <label class="label__col">
                                Contract
                            </label>
        			  		<div  class="field__2col">
                            
                            
                            
    					  		<a href="/sites/default/files/<?php echo $field_contract ?>" type="application/msword; length=101888" target="_blank">
    						  		<div class="btn btn--dowload--file">
    						  			 <i class="icon-download"></i>
                                        <?php echo $field_contract ?>
                                        <?php echo $field_contract_file_size;?>
    							  		<!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
    							  		<!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
    									<input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
    								</div>
    							</a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                           <!--  <a href="#"><i class="icon-cancel-circled txt__red"></i></a>
                            
                            <button class="btn btn-submit " type="submit" name="op" value="Submit"><i class=" icon-upload"></i> Upload</button> -->
                            
    						</div>
    					
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>   
                        <label class="label__col">
                                Contract
                            </label> 
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document10')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
                   
                            </div>
                    
                    
                    
    					<div class="col-xs-12 margin__top10">
    						
    				  	<?php if($field_teams_bank_account){ ?>
                        <label class="label__col">
                            Team's Bank Account
                        </label>
    			  		<div  class="field__2col">
                                <a href="/sites/default/files/<?php echo $field_teams_bank_account; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                        <div class="btn btn--dowload--file">
                                            <i class="icon-download"></i>
                                            <?php echo $field_teams_bank_account ?>
                                            <?php echo $field_teams_bank_account_file_size;?>
                                        <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                                        <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                                        <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                                    </div>
                                </a>
                                <?php  if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content"><i class="icon-cancel-circled txt__red"></i></a>
                            <?php } ?>
                            
                        </div>
    					
    					<?php }else if($user->uid == $node->uid || isset($user->roles[3])){ ?>
                        <label class="label__col">
                            Team's Bank Account
                        </label>    
                        <div  class="field__2col">
                            <?php print render(drupal_get_form('changemakers_form_document11')); ?>
                            <span class="pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
                            <br>
                           <!--  <button class="btn btn--submit clear" type="submit" name="op" value="Submit"><i class=" icon-upload"></i>Upload</button> -->
                        </div>
                        <?php } ?>
                       
                        </div> 
                    
    			</div>
    		</div>
        	
                
                <div class="col2--sidebar " style="position:relative;">
                    <?php if($check_join_project_status == 1 | $check_team_project_status == 1 || isset($user->roles[3]) || $user->uid == $node->uid ){?>
        			<div class="sidebar--wrap  bottom__lightgray col-xs-12" style="margin-top:0px;">
                        <div class="row">
                        <h3 class="headline__thaisan headline--sidebar__yellow"><a href="#">UPLOAD OTHER DOCUMENT</a></h3>
    				  	<div class="sidebar--line"></div>
                            
                        <div class="col-xs-12 padding__box">
                            <a href="/node/<?php print $nid; ?>/edit?destination=admin/content">
                            <button class="btn btn--submit " type="button" ><i class=" icon-upload"></i>Edit Upload Document</button>
    				        </a>
                        <!-- <label>Document Name</label>
                            
                           
                            <div class="fileUpload--wrap">
                            
                                <div class="fileUpload--field" style="width:219px;"></div>
                                <div class="fileUpload--btn btn btn--default " >
                                <span>Browse</span>
                                
                                </div>
                                <input type="file" class="upload" />
                                
                            </div>
                           
                            <input type="checkbox" > Only Team Member
                            <p class="margin__top5 pagebigtab--detail-topic">.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</p>
                        <div style="text-align:center;" class="margin__top10">
                        <button class="btn btn--submit " type="submit" name="op" value="Submit"><i class=" icon-upload"></i> Upload</button>
                        </div> -->
                    </div>
                    </div>
                    </div>
                    <?php } ?>
                    
                    
    			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                        <div class="row">
                        
                        <?php $other_document = changemakers_get_other_document($nid); ?>
                        <?php 
      
                        if(count($other_document) > 0){ ?>
                        <h3 class="headline__thaisan headline--sidebar__yellow"><a href="#">OTHER DOCUMENT</a></h3>
                        <?php } ?>
    				  	<div class="sidebar--line"></div>
    				  	<?php foreach ($other_document as $key => $value) { ?>


               
    				    <div class="sidebar--verti--content">


                            <div class="col-xs-12 border--row">
                            <a href="/sites/default/files/<?php echo $value['name']; ?>" type="application/msword; length=101888" target="_blank">

                            <?php print $value['name']; ?>                

                            <div class="detail__small link__gray__a">

                                <div class="detail__small">
                                
    						  	<div class="btn btn--dowload--file margin__top10">
                                    <i class="icon-download"></i><?php print $value['size']; ?>		
    							</div>
    							    
                                    
                                </div>
                            </div>
                            </a>
                         </div>	  
    			         </div>

                        <?php            
                        } ?> 
    					</div>	  
    			    </div>
        		</div>    
            
            
        </div>
        
        
    	<!-- <form action="/changemakers/test" method="POST">
			  			<input type="hidden" value="<?php //echo $nid; ?>">
				  		<p class="header-title-project">What's your concern</p>
				  		<div class="col-xs-9">
					  		<button type="button" class="btn btn-default "><input type="file"></button>
					  		<input type="text" name="filename">
						    <span>.pdf, .doc, .docx, .pages, .xlsx, .xls ไม่เกิน 1 Mb</span>
						    <br/>
					    </div>
					    <br/><br/><br/>
					    <div class="col-xs-5">
					    	<button type="submit" name="test" class="btn btn-default border-upload-document">Upload</button>
					    </div>	
				    </form> -->
				    <!-- <form id="test-form" method="post" action="changemakers/formtest">
					  <label for="firstname">Firstname </label>
					  <input id="firstname" type="text" name="firstname">
					  <label for="lastname">Lastname </label>
					  <input id="lastname" type="text" name="lastname">
					  <input id="submit" type="submit" value="Submit">
					</form> -->
    	<div role="tabpanel" class="tab-pane " id="fund">
            <div class="table--content col-xs-12">
            <div class="row">
            <div class="col-xs-12 fund--table--total">
                <div class="col-xs-2 topic">
                TOTAL FUNDED
                </div>
                <div class="col-xs-10 total">
                <?php 
                $amount = 0;
                foreach ($fund as $key => $value) {
                       $amount +=  (float) $value->data[5][0];// intval($value->data[5][0]);
                } ?>
                <span class="bigger"><?php print number_format($amount,2)."<br>"; ?> </span> Bath

                <?php 
                //$check_join_project_status == 1 ||
                if( isset($user->roles[3]) || $user->uid == $node->uid ){ ?>    
                <button class="btn btn--submit float__right col-xs-3" style="margin-top:0;" data-toggle="modal" data-target="#myProjectFund"><i class=" icon-plus-circled"></i> Create Project Update</button>    
                <?php } ?>
                </div>
            </div>
            </div>
                
            <div class="col-xs-12 fund--table--head">
                <div class="col-xs-1">
                Date
                </div>
                <div class="col-xs-1">
                to Date
                </div>
                <div class="col-xs-2">
                Fund source
                </div>
                <div class="col-xs-2">
                Fund type
                </div>
                <div class="col-xs-2">
                Fund Amoung
                </div>
                <div class="col-xs-4">
                Fund Use
                </div>
            </div>    
                
            
            <?php 
            // print "<pre>";
            // print_r($fund);
            // print "</pre>";
            foreach ($fund as $key => $value) { ?>
            <div class="table--content--row col-xs-12">
                <div class="col-xs-1">
                <?php print changemakers_get_date_thai_short($value->data[1][0]);?>
                </div>
                <div class="col-xs-1">
                <?php print changemakers_get_date_thai_short($value->data[2][0]);?>
                </div>
                <div class="col-xs-2">
                <?php print $value->data[3][0];?>
                </div>
                <div class="col-xs-2">
                <?php print $value->data[4][0];?>
                </div>
                <div class="col-xs-2">
                <?php print $value->data[5][0];?>
                </div>
                <div class="col-xs-4">
                <?php print $value->data[6][0];?>
                
                


                
               
                <div class="float__right">
                <?php 
                // print '<pre>';
                // print_r($user); 
                // print '</pre>';
                if($check_join_project_status == 1 | $check_team_project_status == 1 || isset($user->roles[3]) || $user->uid == $node->uid ){?>
                    <form method="post" action="/node/92/submission/<?php print $value->sid; ?>/edit" class="col-xs-6 row" >
                        <button class="btn btn--submit" ><i class="icon-edit-alt"></i></button> 
                    </form>
                   
                    <form method="post" action="/changemakers/delete_fund" class="col-xs-6">
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
        </div>
    	<div role="tabpanel" class="tab-pane" id="join">
            <div class="table--content col-xs-12">
                
            
    		
			   
			      	<div class="fund--table--head col-xs-12">
                        <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-1"></div>
				       	<div class="col-xs-2">User Id</div>
				        <div class="col-xs-3">Name</div>
				        <div class="col-xs-2 txt__center">Status</div>
				        <div class="col-xs-2"></div>
                        </div>
				    </div>
			   
			    
			    	<?php

                    // print "<pre>";
                    // print_r($data_user_request_join_project);
                    // print "</pre>";  
                    foreach( $data_user_request_join_project as $key => $value): ?>
			      	<div class="table--content--row col-xs-12">
                        <div class="col-xs-1"></div>
			        	<div class="col-xs-1"><?php print  $value['uid'];?></div>
                        <div class="col-xs-2"><?php print  $value['username'];?></div>
                        <div class="col-xs-3"><?php print  $value['name'];?></div>
                        <div class="col-xs-2 txt__center"><?php print  $value['status'];?></div>
			        	<?php if($value['status'] == 0): ?>
			        	<div class="project-button-approve-align col-xs-3">
			        		<form action="/changemakers/approved-project"  method="post">
			        			<input type="hidden" name="uid" value="<?php print $value['uid']; ?>">
			        			<input type="hidden" name="nid" value="<?php print $nid; ?>">
			        			<input type="hidden" name="sid" value="<?php print $value['sid']; ?>">
			        			<button type="submit" value="submit" class="btn--submit btn">ให้เข้าร่วมโครงการ</button>
			        		</form>
			        	</div>
			        	<?php else: ?>
			        	<div class="project-button-approve-align col-xs-3">
			        		<form action="/changemakers/leave-project"  method="post">
			        			<input type="hidden" name="uid" value="<?php print $value['uid']; ?>">
			        			<input type="hidden" name="nid" value="<?php print $nid; ?>">
			        			<input type="hidden" name="sid" value="<?php print $value['sid']; ?>">
			        			<button type="submit" value="submit" class="btn--default btn">ออกจากโครงการ</button>
			        		</form>
			        	</div>
			        	<?php endif; ?>
			      	</div>
			      	<?php endforeach;?>
                
                </div>
			
    	</div>
    	<div role="tabpanel" class="tab-pane" id="about">
            <div class="col-xs-12">
            <div class="row padding__topbot15">
            <div class="col2--viewcontent ">
                <h2 class="headline__thaisan">เพิ่มโครงการอัพเดท</h2>
                <p class="margin-top10" >ความเป็นส่วนตัว : <?php if ($node->field_project_privacy['und'][0]['value'] == 1) {
                   ?>
                        เปิดให้ผู้ที่ไม่เป็นสมาชิกดูได้
                   <?php
                }else if($node->field_project_conditions_partici['und'][0]['value'] == 1){
                    ?>
                        สมาชิกที่ขอเข้าร่วมโปรเจคได้ต้องเป็น Verified Member เท่านั้น
                   <?php
                }else if($node->field_project_conditions_partici['und'][0]['value'] == 2){
                    ?>
                        สมาชิกที่เข้าร่วมโปรเจคได้ต้องได้รับเชิญเท่านั้น
                   <?php
                }

                ?>

                    <?php// print "<pre>"; print_r($node); print "</pre>";  ?></p>
            </div>
                
            <div class="col2--sidebar ">
            <?php //$check_join_project_status == 1 || 
            if(isset($user->roles[3]) || $user->uid == $node->uid ){?>
            <a href="http://changemakers.devfunction.com/node/<?php print $nid;?>/edit">
                <button class="btn btn--submit pagebigtab__1btn"><i class="icon-edit-alt"></i> Edit About</button>
            </a>
            <a href="http://changemakers.devfunction.com/node/<?php print $nid;?>/delete">
                <button class="btn btn--submit pagebigtab__1btn"><i class="icon-edit-alt"></i> Delete Project</button>
            </a>
            <?php } ?>
            
            </div>
            </div>
            </div>
            
            
            <div class="clear margin__top20">
        
            <div class="col-xs-4" style="padding-left:0;">
                <div class="pagebigtab--update--profile--box ">
                    <div class="row margin__top10">
                    <div class="col-xs-4">อยู่ในระยะ : </div>
                    <div class="col-xs-8"><?php print $get_progress_project; ?></div>
                    </div>
                    
                    
                    <div class="row margin__top10">
                    <div class="col-xs-4">ชื่อทีม : </div>
                    <div class="col-xs-8"><?php print $node->field_project_team_name['und'][0]['value']; ?></div>
                    </div>
                    
                    <div class="row margin__top10">
                    <div class="col-xs-4">สมาชิกในทีม : </div>
                    <div class="col-xs-8">
                    <?php 
                    $get_team  = changemakers_get_team($result);
                    foreach ($get_team as $key => $value) {
                    ?>
                    <div class="user--box__small col-xs-12" style="margin-left:0;"> 
                        <a href="/users/<php print $value['uid']; ?>" class="views-ajax-processed-processed">
                    
                        <div class="col2--thumcir__1">
                            <div class="img--wrap__cir">
                            <img width="150" src="<?php print $value['picture'];?>">
                            </div>
                        </div>	
                    
                        <div class="col2--thumcir__2">
                           <?php print $value['fname']."  ".$value['lname']; ?> <i class="glyphicon icon-profile-verify  member--verify"></i>
                        </div>
                        </a>
                    </div>
                    <?php } 

                    $get_team_project  = changemakers_get_team_project($nid);
                    foreach ($get_team_project as $key => $value) {
                    ?>
                    <div class="user--box__small col-xs-12" style="margin-left:0;"> 
                        <a href="/users/<php print $value['uid']; ?>" class="views-ajax-processed-processed">
                    
                        <div class="col2--thumcir__1">
                            <div class="img--wrap__cir">
                            <img width="150" src="<?php print $value['picture'];?>">
                            </div>
                        </div>  
                    
                        <div class="col2--thumcir__2">
                           <?php print $value['fname']."  ".$value['lname']; ?> <i class="glyphicon icon-profile-verify  member--verify"></i>
                        </div>
                        </a>
                    </div>
                    <?php } ?>
                        
                    </div>
                    </div>
                    
                    <div class="row margin__top10">
                    <div class="col-xs-4">วันที่เริ่มโครงการ : </div>
                    <div class="col-xs-8"><?php print changemakers_get_date_thai_short($node->field_project_date['und'][0]['value']); ?></div>
                    </div>
                
                </div>
            </div>
                
                
            <div class="col-xs-8 pagebigtab--about">
       
            
             <i class="icon-clock"></i> <?php print changemakers_format_date_thai($node->created);?><br>
             <i class="icon-tag"></i> 
							
							<?php 			
								foreach ($node->field_problem_topic['und'] as $key => $field_problem_topic) :				
									if($key==0):
										print $field_problem_topic['taxonomy_term']->name;
									else:
										print ', '.$field_problem_topic['taxonomy_term']->name;
									endif;
								endforeach;
							?>
							<br>
                <i class="icon-target"></i> : 
							
							<?php 			
								foreach ($node->field_project_target['und'] as $key => $field_project_target) :
									if($key==0):
										print $field_project_target['taxonomy_term']->name;
									else:
										print ', '.$field_project_target['taxonomy_term']->name;
									endif;
								endforeach;
							?>
							<br>

							 <img class="img-project" src="/sites/default/files/<?php print $node->field_project_image['und'][0]['filename'];?>" class="margin__topbot15">
                   
						<p>แนวคิดโครงการ</p>
						<div class="block--journal--content">
							<?php print $node->body['und'][0]['value'];?>
						</div>
                        <br>

                        <p>เว็บไซต์</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_website['und'][0]['value'];?>
                        </div>

                        <p>ปัญหา</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_describe_problem['und'][0]['value'];?>
                        </div>

                        <p>แนวคิด</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_big_idea['und'][0]['value'];?>
                        </div>

                        <p>วิธีการแก้ไข</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_solutions['und'][0]['value'];?>
                        </div>

                        <p>ผลกระทบทางสังคม</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_impact['und'][0]['value'];?>
                        </div>

                        <p>แผนความยั่งยืน</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_sustainability_pla['und'][0]['value'];?>
                        </div>

                        <p>ที่มาที่ไปของโครงการ</p>        
                        <div class="block--journal--content">
                            <?php print $node->field_project_background['und'][0]['value'];?>
                        </div>
            
            </div>
            
            
        </div>
            
    		<div class="row">
				<div class="col-sm-12 col-xs-12 col-xs-12 col-lg-12">
					<div class="block--journal--view">
						
					</div>
				</div>
			</div>
			<?php endif;?>
            <div class=" col-xs-8 float__right margin__top15">
                <div class="row">
			<?php //print render($content['comments']); ?>	
                </div>
            </div>
    	
        </div>
        
        
        
        
    	<div role="tabpanel" class="tab-pane" id="team">
        
           <div class="col2--viewcontent">
    		
	    		<div class="user--box box3col" style="margin-left:0;"> 
                
                <div class="user--position">
		    		Project Owner 
                    <?php if($check_join_project_status == 1 || $check_team_project_status == 1 || isset($user->roles[3]) || $user->uid == $node->uid ){?>
                      <!--   <a href="#" ><i class="icon-cancel-circled txt__red float__right"></i></a> -->
                    <?php } ?>
			    </div>
		          
		      <a href="/users/<?php print $user_fields->name;?>" class="views-ajax-processed-processed">
                    
		    		<div class="col2--thumcir__1" >
                        <div class="img--wrap__cir">
		    			<img width="150" src="/sites/default/files/pictures/<?php  print $user_picture;?>">
                        </div>
		    		</div>	
                    
		    		<div class="col2--thumcir__2" >
		    			<?php print $user_fields->field_profile_firstname['und'][0]['value']; ?>
		    			<?php print $user_fields->field_profile_lastname['und'][0]['value']; ?>
                        <i class="glyphicon icon-profile-verify  member--verify"></i>
		    		</div>
	    		</a>
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
                    <?php if(isset($user->roles[3])){ ?>
                    <a href="/user/<?php print $value['uid'];?>/edit?destination=admin/people" class="views-ajax-processed-processed">    
    			     <div class="col2--thumcir__1" >
                            <div class="img--wrap__cir">
    							<img width="150" src="<?php print $value['picture'];?>">
    			    		</div>
                    </div>
    			     <div class="col2--thumcir__2" >
    			    	<?php print $value['fname']; ?>
    			        <?php print $value['lname']; ?>
                        
                            <i class="glyphicon icon-profile-verify  member--verify"></i>
                        
    			     </div>
                            
                    </a>
                    <?php }else{ ?>
                        <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                             <div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
                                        <img width="150" src="<?php print $value['picture'];?>">
                                    </div>
                            </div>
                             <div class="col2--thumcir__2" >
                                <?php print $value['fname']; ?>
                                <?php print $value['lname']; ?>
                                
                                    <i class="glyphicon icon-profile-verify  member--verify"></i>
                                
                             </div>
                                    
                        </a>
                        <?php
                    }
                    ?>
                </div>
	    		
    		<?php endforeach; ?>
            <?php
            $user_team_projects = changemakers_get_team_project($nid);
            foreach ($user_team_projects as $key => $value): ?>

              <div class="user--box box3col" style="margin-left:0;"> 
                    
                    <div class="user--position">
                        <?php print $value['role']; ?>
                    </div>
                    <?php if(isset($user->roles[3])){ ?>
                        <a href="/user/<?php print $value['uid'];?>/edit?destination=admin/people" class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="150" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2" >
                            <?php print $value['fname']; ?>
                            <?php print $value['lname']; ?>
                            
                                <i class="glyphicon icon-profile-verify  member--verify"></i>
                            
                         </div>
                                
                        </a>
                    <?php }else{ ?>
                        <a href="/user/<?php print $value['uid'];?>" class="views-ajax-processed-processed">    
                         <div class="col2--thumcir__1" >
                                <div class="img--wrap__cir">
                                    <img width="150" src="<?php print $value['picture'];?>">
                                </div>
                        </div>
                         <div class="col2--thumcir__2" >
                            <?php print $value['fname']; ?>
                            <?php print $value['lname']; ?>
                            
                                <i class="glyphicon icon-profile-verify  member--verify"></i>
                            
                         </div>
                                
                        </a>
                        <?php
                    } ?>
                </div>
                
            <?php endforeach;  ?>



            </div> 
         
          <div class="col2--sidebar " style="position:relative;">
            <?php if($check_join_project_status == 1 || $check_team_project_status == 1 || isset($user->roles[3]) || $user->uid == $node->uid ){?>
            <!-- <a href="#join"  aria-controls="join" role="tab" data-toggle="tab" aria-expanded="false">
              <button class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class="icon-edit-alt"></i>Edit Team Member</button>
            </a> -->
            <?php } ?>
    			
                <!-- <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__gray"><a href="#">JOIN REQUEST</a></h3>
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
                
                
			    <div class="sidebar--wrap  bottom__lightgray col-xs-12">
                    <div class="row">
                    <h3 class="headline__thaisan headline--sidebar__yellow"><a href="#">PROJECT FOLLOWS</a></h3>
				  	<div class="sidebar--line"></div>
				  	
                    <?php foreach ($user_following_project as $key => $value) { ?>
     
				    <div class="sidebar--verti--content">
                        <div class="col-xs-12 border--row">
                        
                            <a href="#" class="views-ajax-processed-processed">
            		    		<div class="col2--thumcir__1" >
                                    <div class="img--wrap__cir">
            		    			<img width="150" src="<?php print $value['picture']; ?>">
                                    </div>
            		    		</div>	
                                
            		    		<div class="col2--thumcir__2" >
            		    			<?php print $value['name'];?>
                                    <i class="glyphicon icon-profile-verify  member--verify"></i><br>
                                    <span class="detail__small txt__gray"><i class=" icon-clock txt__gray2"></i> 4 m.</span>
            		    		</div>
    	    		         </a>
                        </div>	  
			         </div>
                    <?php                  
                    } ?>   
					</div>	  
			    </div>
    		</div>     
            
    	
  	
</div>
</div>

<!-- Modal Intro-->
<div class="modal fade" id="myProjectFund" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        
        
 
        <div class="modal-content">
            <div class="modal-header">
            <h2 class="headline__thaisan ">ADD FUNDED</h2><br></div>
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

<!-- Modal Intro-->
<div class="modal fade" id="myProjectFundUpdate" role="dialog">
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-content">
            <form class="webform-client-form webform-client-form-71" enctype="multipart/form-data" action="/changemakers/update_fund" method="post" id="webform-client-form-71" accept-charset="UTF-8"><div>

            <!-- THEME DEBUG -->
            <!-- CALL: theme('webform_form') -->
            <!-- BEGIN OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->
            <div class="form-item webform-component webform-component-date webform-component--date-fund form-group">
            <label class="control-label" for="edit-submitted-date-fund">DATE </label>
            <div class="webform-container-inline webform-datepicker"><div class="form-item form-item-submitted-date-fund-day form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-day">Day </label>
            <select class="day form-control form-select" id="edit-submitted-date-fund-day" name="submitted[date_fund][day]"><option value="" selected="selected">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div><div class="form-item form-item-submitted-date-fund-month form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-month">Month </label>
            <select class="month form-control form-select" id="edit-submitted-date-fund-month" name="submitted[date_fund][month]"><option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select></div><div class="form-item form-item-submitted-date-fund-year form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-date-fund-year">Year </label>
            <select class="year form-control form-select" id="edit-submitted-date-fund-year" name="submitted[date_fund][year]"><option value="" selected="selected">Year</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option></select></div>

            <!-- THEME DEBUG -->
            <!-- CALL: theme('webform_calendar') -->
            <!-- BEGIN OUTPUT from 'sites/all/modules/webform/templates/webform-calendar.tpl.php' -->
            <input type="image" src="/sites/all/modules/webform/images/calendar.png" class="webform-calendar webform-calendar-start-2014-03-29 webform-calendar-end-2018-03-29 webform-calendar-day-0 hasDatepicker" alt="Open popup calendar" title="Open popup calendar" id="dp1459231767837">

            <!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-calendar.tpl.php' -->

            </div>
            </div>
            <div class="form-item webform-component webform-component-date webform-component--to-date-fund form-group">
              <label class="control-label" for="edit-submitted-to-date-fund">TO DATE </label>
             <div class="webform-container-inline webform-datepicker"><div class="form-item form-item-submitted-to-date-fund-day form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-day">Day </label>
            <select class="day form-control form-select" id="edit-submitted-to-date-fund-day" name="submitted[to_date_fund][day]"><option value="" selected="selected">Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select></div><div class="form-item form-item-submitted-to-date-fund-month form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-month">Month </label>
            <select class="month form-control form-select" id="edit-submitted-to-date-fund-month" name="submitted[to_date_fund][month]"><option value="" selected="selected">Month</option><option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option><option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option><option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option></select></div><div class="form-item form-item-submitted-to-date-fund-year form-type-select form-group"> <label class="control-label element-invisible" for="edit-submitted-to-date-fund-year">Year </label>
            <select class="year form-control form-select" id="edit-submitted-to-date-fund-year" name="submitted[to_date_fund][year]"><option value="" selected="selected">Year</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option></select></div>

            <!-- THEME DEBUG -->
            <!-- CALL: theme('webform_calendar') -->
            <!-- BEGIN OUTPUT from 'sites/all/modules/webform/templates/webform-calendar.tpl.php' -->
            <input type="image" src="/sites/all/modules/webform/images/calendar.png" class="webform-calendar webform-calendar-start-2016-03-29 webform-calendar-end-2018-03-29 webform-calendar-day-0 hasDatepicker" alt="Open popup calendar" title="Open popup calendar" id="dp1459231767838">

            <!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-calendar.tpl.php' -->

            </div>
            </div>
            <div class="form-item webform-component webform-component-textfield webform-component--fund-source form-group">
              <label class="control-label" for="edit-submitted-fund-source">FUND SOURCE </label>
             <input class="form-control form-text" type="text" id="edit-submitted-fund-source" name="submitted[fund_source]" value="" size="60" maxlength="128">
            </div>
            <div class="form-item webform-component webform-component-textfield webform-component--fund-type form-group">
              <label class="control-label" for="edit-submitted-fund-type">FUND TYPE </label>
             <input class="form-control form-text" type="text" id="edit-submitted-fund-type" name="submitted[fund_type]" value="" size="60" maxlength="128">
            </div>
            <div class="form-item webform-component webform-component-textfield webform-component--fund-amount form-group">
              <label class="control-label" for="edit-submitted-fund-amount">FUND AMOUNT </label>
             <input class="form-control form-text" type="text" id="edit-submitted-fund-amount" name="submitted[fund_amount]" value="" size="60" maxlength="128">
            </div>
            <div class="form-item webform-component webform-component-textfield webform-component--fund-use form-group">
              <label class="control-label" for="edit-submitted-fund-use">FUND USE </label>
             <input class="form-control form-text" type="text" id="edit-submitted-fund-use" name="submitted[fund_use]" value="" size="60" maxlength="128">
            </div>
            <div class="form-item webform-component webform-component-textfield webform-component--nid form-group">
              <label class="control-label" for="edit-submitted-nid">nid </label>
             <input class="form-control form-text" type="hidden" id="edit-submitted-nid" name="submitted[nid]"  size="60" maxlength="128" value="<?php echo $nid;?>">
            </div>
            <div class="form-actions"><button class="webform-submit button-primary btn btn-primary form-submit" type="submit" name="op" value="Submit">Submit</button>
            </div>
            <!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

            </div></form>
        </div>
      
    </div>
</div>

<script type="text/javascript">

(function($) {
    $(document).ready(function(){
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
        //alert(temp);
    });   
}(jQuery));

    
function loadComment(){
    var x = document.getElementById("filterSelect").value;
    var filterSelectComment = document.getElementById("filterSelectComment").value;
    window.location.href = 'http://changemakers.devfunction.com/project/'+filterSelectComment+'?type='+x;
    //alert(x);
}

function submitForm()        
{       
    var form_leave = document.getElementById("form_leave"); 
    form_leave.submit();       
} 

//document.getElementById("filterSelect").value = "Progress";
//document.getElementById('test').value = null;
//document.getElementById("test").value = "Progress";



</script>
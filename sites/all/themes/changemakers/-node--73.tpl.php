<?php 
global $user;
$user_data = user_load($user->uid);






// print "<pre>";
// print_r($user_data);
// print "</pre>";
if(isset($user->roles[3]) || isset($user->roles[5]) || isset($user->roles[10]) || isset($user->roles[9]) || isset($user->roles[4]) || isset($user->roles[8])){
?>

<div class="col2--viewcontent dashboard--view">
<?php // Admin
    
if(isset($user->roles[3])){?>
    <!--
    <h2 class="headline headline__alte">PROJECT</h2>
    <div class="row">
        <div class="viewmore--line row col-xs-12"></div>    
    -->
    <?php
        //$send_coach_project = changemakers_get_new_project_dashboard();	

    //    foreach ($send_coach_project as $key => $value) { ?>
    <!--	<div class="project--box">
    	<div class="thumbbox--wrap--img">
    	<a href="/node/<?php // print $value['nid'];?>/edit">
    		<img  src="<?php // print $value['picture'];?>">
    	</a>
        </div>
    	<div id="moredetail__over" class="field--content project--boxover">
            
            <div class="detail--linelimit__2">
                <h4 class="headline__thaisan">
                <?php // print $value['title'];?>
                </h4>
            </div>
    	   <div class="detail__small txt__gray">
            <span class=" icon-clock txt__gray"></span> <?php  // print $value['last_update'];?>
            <br/>
             
            </div>
            <div id="moredetail__hide" class="txt__gray">
            <div class="detail--linelimit__1"><a href="#" class="txt__gray detail__small"><span class="icon-package7 "></span>  problem....</a></div><br/>     
            
         
            <a href="#" class="txt__white"><p class="moredetail__over__content" style="margin-top:5px;">
                Sample Cotent</p></a>
            </div>
            
        </div>
        </div>-->
        
    <?php // } ?>
    
<? } ?>
    
    

<?php //Coach //Partner
if(isset($user->roles[5])){ ?>
    <!-- My Active Campaign -->
    <div class="col-xs-12 margin__top30">
        <div class="row">
            <h2 class="headline headline__alte">MY ACTIVE CAMPAIGN</h2>
            <div class="viewmore--line row col-xs-12"></div>
            <?php
            $coach_relate_campaign = changemakers_get_coach_join_campaign_dashboard();	
            	
            // print '<pre>';
            //     print_r($coach_project_join_campaign); 
            //     print '</pre>';
            $comment_nid = array();
        	foreach ($coach_relate_campaign as $key => $value) { ?>
            
                <div class="col-xs-12 margin__top15">
                    <div class="row">
                      <div class="pagebigtab--wrap--img-dash col-xs-4 ">
                          <div class="row">

                      		<a href="<?php print $value['path'];?>">
                      			<img width="150" src="<?php print $value['picture'];?>">
                      		</a>
                          </div>
                      </div>    
                      <div class="pagebigtab--detail  col-xs-8 ">
                        <a href="<?php print $value['path'];?>">
                      		<div class="pagebigtab-detail--name">
                                  <h1 class="headline__thaisan pagebigtab--name clear"><?php print $value['title'];?>
                                  </h1>
                            </div>
                        </a>
            		      <div><?php // print $value['last_update'];?></div>
            		
                      <div class="margin__top10">
                    
                        
                        <div class="pagebigtab--detail--box2 detail--icon--stage">
                            <p class="pagebigtab--detail-topic">STAGE</p>
                            <p class="pagebigtab--detail-txt"><?php print $value['stage'];  ?></p>
                        </div>
                
                        <div class="pagebigtab--detail--box2 detail--icon--update">
                            <p class="pagebigtab--detail-topic">CAMPAIGN PERIOD</p>
                            <p class="pagebigtab--detail-txt"><?php 
                                print $value['date'];
                            ?>
                            </p>
                        </div>
                        <div class="pagebigtab--detail--box2 detail--icon--stage">
                                <p class="pagebigtab--detail-topic">PROJECT JOINED</p>
                                <p class="pagebigtab--detail-txt"><?php  

                                    print $value['project_in_campaign'];


                                ?></p>
                        </div>
                

                        <div class="pagebigtab--detail--box2 detail--icon--status">
                                <p class="pagebigtab--detail-topic">FINALISTS</p>
                                <p class="pagebigtab--detail-txt"><?php print $value['final']; ?></p>
                        </div>
                
                      </div>
                    </div>
                  </div>
                </div>

            	<?php 

            	$coach_project_join_campaign = changemakers_get_project_join_campaign_dashboard($value['nid']); ?>
            	<div class="col-xs-12 margin__top20">
                <div class="row">
            		
                <h4 class="headline headline__alte">LATEST UPDATED PROJECT IN THIS CAMPAIGN</h4>
                
                <div class="viewmore--line row col-xs-12 "></div>

                <div class="col-xs-12  project--page">
                    <div class="row">
            		<?php 
                        foreach ($coach_project_join_campaign as $key => $value2) { ?>
                        <div class="col-xs-3 box__pad6" >
                            <div  class="page1-4--box2 border--buttom__yellow" >
                            
                            <div class="thumbbox--wrap--img">
                                <a href="/project/<?php print $value2['nid'];?>">
                                    <img width="150" src="<?php print $value2['picture'];?>">
                                </a>
                            </div>
                            
                                
                            <div   class="field--content boxover">    
                            <div class="detail__small d__inline-block">
                              <a href="/project/<?php print $value2['nid'];?>">
                                <div class="h4--linelimit__2"><h4 class="headline__thaisan">
                                    <?php print $value2['title'];?>
                                    </h4></div>
                                    </a>
                                 <span class="icon-clock txt__gray2"></span><?php print $value2['last_update'];?>
                                 <span class="icon-clock txt__gray2"></span><?php print $value2['username'];?>
                                </div></div></div></div>


                		<?php 
                		}
                    ?> 
                    </div><br><br>
                </div>
                
                </div></div>
            
            
            <br><br>
                
                
                
                 
                <?php
                //echo $value['nid'];
                //$comment_nid[] = $value['nid'];
                  // print "<pre>";
                  //   print_r($value['nid']);
                  //   print "</pre>";

                 $comment_nid = $value['nid'];
                 $num_of_results_p = 0;
                 $total_pages_p = array();

                 if(!empty($comment_nid)):
                
                  //print_r($comment_nid);
                    $result_cnt = db_select('comment', 'c')
                          ->fields('c')
                          ->condition('nid', $comment_nid)
                          ->execute();
                    $num_of_results_p = $result_cnt->rowCount();
                    $total_pages_p= ceil($num_of_results_p/5); 
                    // $index++;
                    ?>
                     <h4 class="headline headline__alte">CAMPAIGN UPDATE</h4> 
                    <?php
                    $comment_nid_explode_p = $comment_nid;

                    // print "<pre>";
                    // print_r($num_of_results_p);
                    // print "</pre>";

                    ?>
                        
                      
                    <?php if($num_of_results_p > 5){ ?>
                        <!-- <div class=""><p><h5>ไม่มีรายการอัพเดตล่าสุด</h5></p><br><br></div> -->
                        <div id="results-loadding-more-comment-<?php print $value['nid']; ?>"></div>
                        <?php 

                            $page_id = "results-loadding-more-comment-".$value['nid'];


                        ?>
                        <div align="center">
                        <input type="hidden" id="track_click_p_<?php print $value['nid']; ?>" value="">
             
                        <button class="btn btn-primary" id="button_<?php print $value['nid'];  ?>" onclick="loadmore_comment(<?php print $value['nid']; ?>, 1, <?php print $total_pages_p; ?>, '<?php print $page_id; ?>' )" >SEE MORE</button>
                        <div class="animation_image" style="display:none;"><img src="/sites/all/themes/changemakers/images/loading3.gif"></div>
                        </div>
                    <?php }else if($num_of_results_p<5){ ?>
                        <div id="results-loadding-more-comment-<?php print $value['nid'] ?>"></div>
                    <?php }else{ ?>
                         <div><h2>ไม่มีข้อมูลอัพเดต</h2></div>
                    <? } ?>
                <?php endif; 

                ?>
                
            
            <?php  } ?>
        </div>

        <?php echo views_embed_view('journal_block', $display_id = 'block'); ?>


        <?php echo views_embed_view('knowledge_block_dashboard', $display_id = 'block'); ?>
    </div>

    
    

    <?

    /*//Comment for Coach
    if(!empty($comment_nid)):
        
      //print_r($comment_nid);
        $result_cnt = db_select('comment', 'c')
              ->fields('c')
              ->condition('nid', $comment_nid,"in")
              ->execute();
        $num_of_results = $result_cnt->rowCount();
        $total_pages= ceil($num_of_results/5); 
        ?>
         <h4 class="headline headline__alte">CAMPAIGN UPDATE</h4> 
        <?php
        $comment_nid_explode = implode("-", $comment_nid);

        ?>
            
          
        <?php if($num_of_results>5): ?>

     <div id="results-loadding-more-comment"></div>
        <div align="center">
       <!--         <button class="btn btn-primary" id="load_more_button">Load More</button>
        <div class="animation_image" style="display:none;"> Loading...</div> -->
        </div>
        <?php endif; ?>
    <?php endif; */
} 
else if(isset($user->roles[9])){ //partner?>
    <!-- My Active Campaign -->
    <div class="col-xs-12"><div class="row">
    <h2 class="headline headline__alte">MY ACTIVE CAMPAIGN</h2>
    <div class="viewmore--line row col-xs-12"></div>
    <?php
    $partner_campaign = changemakers_get_partner_join_campaign_dashboard(); 


    ?>

    <input type="hidden" id="count_campaign_partner" value="<?php print $partner_campaign; ?>">
    <?php 

    // print '<pre>';
    //     print_r($coach_project_join_campaign); 
    //     print '</pre>';
    $comment_nid = array();
    foreach ($partner_campaign as $key => $value) { ?>
    

    
    
    <div class="col-xs-12">
        <div class="row">
        
        <div class="pagebigtab--wrap--img-dash col-xs-4 "> 
            <div class="row">
        <a href="<?php print $value['path'];?>">
            <img width="150" src="<?php print $value['picture'];?>">
        </a>
            </div>
        </div>
        
        <div class="pagebigtab--detail  col-xs-8 ">
        <a href="<?php print $value['path'];?>">    
    		<div class="pagebigtab-detail--name">
                <h1 class="headline__thaisan pagebigtab--name clear">
                    <?php print $value['title'];?>
                </h1>
            </div>
        </a>
        <?php // print $value['last_update'];?>
        
          <div class="margin__top10">
        
            
            <div class="pagebigtab--detail--box2 detail--icon--stage">
                <p class="pagebigtab--detail-topic">STAGE</p>
                <p class="pagebigtab--detail-txt"><?php print $value['stage'];  ?></p>
            </div>
    
            <div class="pagebigtab--detail--box2 detail--icon--update">
                <p class="pagebigtab--detail-topic">CAMPAIGN PERIOD</p>
                <p class="pagebigtab--detail-txt"><?php 
                    print $value['date'];
                ?>
                </p>
            </div>
            <div class="pagebigtab--detail--box2 detail--icon--stage">
                    <p class="pagebigtab--detail-topic">PROJECT JOINED</p>
                    <p class="pagebigtab--detail-txt"><?php  

                        print $value['project_in_campaign'];


                    ?></p>
            </div>
    

            <div class="pagebigtab--detail--box2 detail--icon--status">
                    <p class="pagebigtab--detail-topic">FINALISTS</p>
                    <p class="pagebigtab--detail-txt"><?php print $value['final']; ?></p>
            </div>
    
    </div>  
            </div>
        </div>
    </div>


    <?php 

    $partner_campaign_join_campaign = changemakers_get_project_join_campaign_dashboard($value['nid']); ?>
    <div class="col-xs-12 margin__top20">
    <div class="row">
    <h4 class="headline headline__alte">LATEST UPDATED PROJECT IN THIS CAMPAIGN</h4>
    
    <div class="viewmore--line row col-xs-12 "></div>
    
    <div class="col-xs-12 project--page">
        <div class="row">
        <?php 
        
        foreach ($partner_campaign_join_campaign as $key => $value2) { ?>
            
            
        <div class="col-xs-3 box__pad6" >
            <div  class="page1-4--box2 border--buttom__yellow" >
            <a href="<?php print $value2['path'];?>">     
                <div class="thumbbox--wrap--img">
                <img width="150" src="<?php print $value2['picture'];?>">
                </div>
            </a>

        <a href="<?php print $value2['path'];?>">               
        <div   class="field--content boxover">    
            <div class="detail__small d__inline-block">
            <div class="h4--linelimit__2"><h4 class="headline__thaisan">
                <?php print $value2['title'];?></h4></div>
            <span class="icon-profile-verify member--verify"></span> <?php print $value2['username'];?><br>
            <span class="icon-clock txt__gray2"></span> <?php print $value2['last_update'];?>
            <span class="icon-clock txt__gray2"></span> <?php print $value2['username'];?>
            </div>
        </div>
        </a>

        </div></div>
        

        
        <?php 
        }
        ?></div><br><br></div></div></div>
  
    
    

        <?php
         $comment_nid = $value['nid'];
         $num_of_results_p = 0;
         $total_pages_p = array();

         if(!empty($comment_nid)):
        
          //print_r($comment_nid);
            $result_cnt = db_select('comment', 'c')
                  ->fields('c')
                  ->condition('nid', $comment_nid)
                  ->execute();
            $num_of_results_p = $result_cnt->rowCount();
            $total_pages_p= ceil($num_of_results_p/5); 
            // $index++;
            ?>
             <h4 class="headline headline__alte">CAMPAIGN UPDATE</h4> 
            <?php
            $comment_nid_explode_p = implode("-", $comment_nid);

            // print "<pre>";
            // print_r($num_of_results_p);
            // print "</pre>";

            ?>
                
              
            <?php if($num_of_results_p > 5){ ?>
                <!-- <div class=""><p><h5>ไม่มีรายการอัพเดตล่าสุด</h5></p><br><br></div> -->
                <div id="results-loadding-more-comment-<?php print $value['nid']; ?>"></div>
                <?php 

                    $page_id = "results-loadding-more-comment-".$value['nid'];


                ?>
                <div align="center">
                <input type="hidden" id="track_click_p_<?php print $value['nid']; ?>" value="">
                <?php /**/?>
                <button class="btn btn-primary" id="button_<?php print $value['nid'];  ?>" onclick="loadmore_comment(<?php print $value['nid']; ?>, 1, <?php print $total_pages_p; ?>, '<?php print $page_id; ?>' )" >SEE MORE</button>
                <div class="animation_image" style="display:none;"><img src="/sites/all/themes/changemakers/images/loading3.gif"></div>
                </div>
            <?php }else if($num_of_results_p<5){ ?>
                <div id="results-loadding-more-comment-<?php print $value['nid'] ?>"></div>
            <?php }else{ ?>
                 <div id="results-loadding-more-comment-<?php print $value['nid'] ?>"></div>
            <? } ?>
        <?php endif; 

    }

    ?>
        </div>
    </div>

    <?php echo views_embed_view('journal_block', $display_id = 'block'); ?>


    <?php echo views_embed_view('knowledge_block_dashboard', $display_id = 'block'); ?>
    <?php 


    //Comment for Partner
    // print "<pre>";
    // print_r($comment_nid);
    // print "</pre>";
    


}else if(isset($user->roles[8])){ //helpdesk

    $helpdesk_project = changemakers_get_helpdesk_join_project_dashboard(2);  
    $helpdesk_join_project = changemakers_get_user_join_project_dashboard();
    // print '<pre>';
    //     print_r($helpdesk_project); 
    //     print '</pre>';

    //     print '<pre>';
    //     print_r($helpdesk_join_project); 
    //     print '</pre>'
    ?>
    
    
    <!--Project -->
    <?php if(!empty($helpdesk_project)){ ?>
    <div class="col-xs-12 margin__top30">
        <div class="row">
    
        <h2 class="headline headline__alte" style="float:left;">PROJECT </h2> 
            
           <span style="float:right;"><a href="/add-project-update"><button class="btn--border">เพิ่มความคืบหน้าโปรเจกต์</button></a></span>
        <div class="viewmore--line row col-xs-12"></div>
        <?php
        foreach ($helpdesk_project as $key => $value) { ?>

        <div class="myproject--box ">
            <div class="myproject--cate"><i class=" icon-cog"></i> Consulted Project</div>
            <a href="/node/<?php print $value['nid'];?>">
                <div class="thumbbox--wrap--img">
                    <div class="gd--cover"></div>
                    
                    <div class="detail--linelimit__2 title">
                        <h4 class="headline__thaisan"><?php print $value['title'];?></h4></div>
                    <img width="150" src="<?php print $value['picture'];?>">
                </div>
                        
                      
                <div class="field--content myproject--boxover ">
                status : <span class="green"><?php print $value['status']; ?></span><br/>
                Last Update : <?php print $value['last_update'];?>
                
                </div>
            </a>
        </div>

        <?php 
        }

        foreach ($helpdesk_join_project as $key => $value) { ?>
            
        
        
        <div class="myproject--box ">
            <a href="<?php print $value['path'];?>">
                <div class="myproject--cate"><i class=" icon-cog"></i> Join Project</div>
                <div class="thumbbox--wrap--img">
                    <div class="gd--cover"></div>
                    
                    <div class="detail--linelimit__2 title">
                        <h4 class="headline__thaisan"><?php print $value['title'];?></h4></div>
                    <img width="150" src="<?php print $value['picture'];?>">
                    </div>
                            
                          
                    <div class="field--content myproject--boxover ">
                    status : <span class="green"><?php 
                      if($value['status'] == 1){
                        print "Active";
                      }else{
                        print "Not Active";
                      }
                    ?></span><br/>
                    Last Update : <?php print $value['last_update'];?>
                    
                </div>
            </a>
        </div>

        <?php     }    ?>   
                
        </div>
    </div>
    
    <div class="col-xs-12 margin__top30">
        <h2 class="headline headline__alte">LATEST UPDATE</h2>
        <div class="viewmore--line row col-xs-12"></div>        
            
        
        <?php
        $comment_nid =array();
        foreach ($helpdesk_project as $key => $value) {

            $comment_nid[] = $value['nid'];
            $result = db_select('comment', 'c')
              ->fields('c')
              ->condition('nid', $value['nid'])
              ->execute()
              ->fetchAll();

        } 
        //Comment for Helpdesk
        if(!empty($comment_nid)):
        $result_cnt = db_select('comment', 'c')
                  ->fields('c')
                  ->condition('nid', $comment_nid,"in")
                  ->execute();
        $num_of_results = $result_cnt->rowCount();
        $total_pages= ceil($num_of_results/5); 

        $comment_nid_explode = implode("-", $comment_nid);

        ?>
        <div id="results-loadding-more-comment"></div>
        <?php if($num_of_results>5){ ?>
         
        <div align="center">
        <button class="btn btn-primary" id="load_more_button">SEE MORE</button>
        <div class="animation_image" style="display:none;"><img src="/sites/all/themes/changemakers/images/loading3.gif">
        </div>
        </div>
        <?php }else if($num_of_results == 0){ ?>
        <div><p><h5>ไม่มีรายการอัพเดต</h5></p></div>
        <? } ?>
        <?php endif; ?>
    
    </div>
    <?php } ?>
    <?php echo views_embed_view('journal_block', $display_id = 'block'); ?>


    <?php echo views_embed_view('knowledge_block_dashboard', $display_id = 'block'); ?>
<?php }
else{ // vm uvm  and admin
    $user_follow_project = changemakers_get_user_follow_project_dashboard();
    $user_join_project = changemakers_get_user_join_project_dashboard();
    $user_create_project = changemakers_get_user_create_project_dashboard();
    $check_user_createproject = changemakers_check_user_create_project_dashboard();
    $admin_get_campaign =  changemakers_get_all_campaign_for_admin();


        

        if($user->roles[10]){ ?>
        
        
            <div class="col-xs-12 margin10">
                <div class="notice--box">
                    <div class="col-xs-12 padding10">
                    <p>Your account is unverified. To change to verified member, verify your mobile phone</p>
                    </div>
                    <div class="col-xs-12">
                        <a href="/advantages-verified-member">
                            <button type="button" class="btn btn--border">อ่านข้อดีของการเป็น Verified Member</button>
                        </a>
                    
                        <a href="/verified-member"><button type="button" class="btn btn--submit">ยืนยันเบอร์โทรศัพท์</button></a>
                    </div>
                    <div class="cls"></div>
                </div>
            </div>

        <?php 
        }
        ?>

        <?php if(isset($user->roles[4])){ ?>
        <div class="txt__center">
            <a href="/coach-changemakers"><button class="btn btn--submit ">Want to become a coach? Apply here</button></a>
        </div>
        <?php } ?>
    <!--Project -->
    <div class="col-xs-12 margin__top30">
        <div class="row">
            <h2 class="headline headline__alte"  style="float:left;">PROJECT</h2> 
            <span style="float:right;">
                <a href="/node/add/project"><button class="btn--border" >เพิ่มโปรเจกต์ใหม่</button></a>
            </span>
            <span style="float:right;">
                <a href="/add-project-update"><button class="btn--border" >เพิ่มความคืบหน้าโปรเจกต์</button></a>
            </span>
            
        <div class="viewmore--line row col-xs-12"></div>
        <div class="col-xs-12">
        <div class="row">
        
            <?php //&& $user->roles[9] != "partner"
            if($check_user_createproject == 0  && !isset($user->roles['9']) ){ ?>

                <a href="/node/add/project">
                <div class="project--create--btn2" >
                <div class="headline__bold project--createword"> + CREATE</div><br> 
                YOUR PROJECT
                </div>
               </a>
                

            <?php }
            //user create project
            foreach ($user_create_project as $key => $value) { ?>
            <div class="myproject--box ">
            	<div class="myproject--cate"><i class="icon-cir-own"></i> My Project</div>
              <a href="<?php print $value['path']; ?>">
                <div class="thumbbox--wrap--img">
                    <div class="gd--cover"></div>
                    
                    <div class="detail--linelimit__2 title">
                    <h4 class="headline__thaisan">
                    <?php print $value['title'];?>
                    </h4>
                    </div>
                    
            	       <img width="150" src="<?php print $value['picture'];?>">
                </div>
              </a>
                
            	 <div class="field--content myproject--boxover ">
                    status : <span class="green">
                    <?php 
                      if($value['status'] == 1){
                        print "Active";
                      }else{
                        print "Not Active";
                      }
                    ?>
                    </span><br/>
                    Last Update : <?php print $value['last_update']; ?>
                    
                </div>
            	<div><?php// print $value['last_update'];?></div>
            	
            </div>
            <? }
            ?>
            <?php 
            //user follow project
            foreach ($user_follow_project as $key => $value) { ?>
            	
            <div class="myproject--box ">
            	<div class="myproject--cate"><i class="icon-cir-follow"></i> Followed Project</div>
                <a href="<?php print $value['path']; ?>">
                  <div class="thumbbox--wrap--img">
                      <div class="gd--cover"></div>
                      
                      <div class="detail--linelimit__2 title">
                      <h4 class="headline__thaisan">
                      <?php print $value['title'];?>
                      </h4>
                      </div>
                      
                       <img width="150" src="<?php print $value['picture'];?>">
                  </div>
                </a>
                <div class="field--content myproject--boxover ">
                    status : <span class="green">
                    <?php 
                      if($value['status'] == 1){
                        print "Active";
                      }else{
                        print "Not Active";
                      }
                    ?>
                    </span><br/>
                    Last Update : <?php print $value['last_update']; ?>
                    
                </div>
            	<div><?php // print $value['last_update'];?></div>
            </div>

            <? }
            ?>
            <?php 
            //user join project
            foreach ($user_join_project as $key => $value) { ?>
            <div class="myproject--box ">
            	<div class="myproject--cate"><i class="icon-cir-follow"></i> Join Project</div>
                <a href="<?php print $value['path']; ?>">
                  <div class="thumbbox--wrap--img">
                      <div class="gd--cover"></div>
                      
                      <div class="detail--linelimit__2 title">
                      <h4 class="headline__thaisan">
                      <?php print $value['title'];?>
                      </h4>
                      </div>
                      
                       <img width="150" src="<?php print $value['picture'];?>">
                  </div>
                </a>

                <div class="field--content myproject--boxover ">
                    status : <span class="green">
                    <?php 
                      if($value['status'] == 1){
                        print "Active";
                      }else{
                        print "Not Active";
                      }
                    ?>
                    </span><br/>
                    Last Update : <?php print $value['last_update']; ?>
                    
                </div>
                
            	<div><?php //print $value['last_update'];?></div>
            </div>	
            <? }

            ?>
               
            
        </div>
        </div>
        </div>
    </div>  
          
        
        
      
    <div class="col-xs-12 margin__top30">
        <div class="row">
            <?php if (!isset($user->roles[5])) { ?>
                <div style="margin: 30px 0 25px 0;">
                    <h2 class="headline headline__alte">
                    LATEST UPDATE PROJECT 
                    </h2>
                    <div class="viewmore--line  col-xs-12"></div>
                </div>
              <?php 
              $comment_nid =array();
              
              foreach ($user_join_project as $key => $value) {
                $comment_nid[] = $value['nid'];
              }

              foreach ($user_create_project as $key => $value) {
                  if(!in_array($value['nid'],  $comment_nid)){
                     $comment_nid[] = $value['nid'];
                  }
              }

              foreach ($user_follow_project as $key => $value) {
                  if(!in_array($value['nid'],  $comment_nid)){
                     $comment_nid[] = $value['nid'];
                  }
              }

              if(empty($comment_nid)){ ?>
                <div><h3><b>ไม่มีข้อมูลอัพเดต</b></h3></div>
              <?php }

              if(!empty($comment_nid)):
                $result_cnt = db_select('comment', 'c')
                          ->fields('c')
                          ->condition('nid', $comment_nid,"in")
                          ->condition('pid', 0 ,"=")
                          ->execute();
                $num_of_results = $result_cnt->rowCount();
                $total_pages= ceil($num_of_results/5); 

                $comment_nid_explode = implode("-", $comment_nid);

                // print "<pre>";
                // print_r($comment_nid_explode);
                // print "</pre>"

                ?>
                <div id="results-loadding-more-comment"></div>
              
                <?php if($num_of_results>5): ?>
                  <div align="center">
                    <button class="btn btn-primary" id="load_more_button">SEE MORE</button>
                    <div class="animation_image" style="display:none;"><img src="/sites/all/themes/changemakers/images/loading3.gif"></div>
                  </div>
                <?php endif; ?>
             <?php endif; ?>
            <?php } ?>

          <?php // get all campaign
          if(isset($user->roles[3])){ ?>

              <div style="margin: 30px 0 25px 0;">
                
                  <h2 class="headline headline__alte">
                  CAMPAIGN ACTIVE
                  </h2>
                  <div class="viewmore--line  col-xs-12"></div>
              </div>
              <?php echo views_embed_view('campaign_list_admin', $display_id = 'block'); ?>
              <?php 

            } 

            ?>
            <?php 
                // $string = "aaa, bbb, ccc,";
                // if (strpos($string, 'aaa') !== false) {
                //     echo 'true';
                // }
                // else{
                //     echo 'false';
                // }


            ?>


            <?php echo views_embed_view('journal_block', $display_id = 'block'); ?>


            <?php echo views_embed_view('knowledge_block_dashboard', $display_id = 'block'); ?>

        </div>
    </div>
<?php } ?>
</div>
    
    

    


<div class="col2--sidebar">
    <?php if(isset($user->roles[3]) || isset($user->roles[10]) || isset($user->roles[4])){ ?>
    <div class="txt__center">
        <a href="/how-start-project"><button class="btn btn--submit ">How to start your project</button></a>
    </div>
    <?php } ?>
    
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:0px 0;"><img src="/sites/all/themes/changemakers/images/banner.gif" ></div>
    </div>

    <?php if(isset($user->roles[3]) || isset($user->roles[10]) || isset($user->roles[4])){ ?>
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:0px 0;"><img src="/sites/all/themes/changemakers/images/002edit.gif" ></div>
    </div>
    <?php } ?>
    <?php 
    $user_skill_event = changemakers_get_project_related_event($user_data->field_profile_skill_interest['und']); 
    if(!empty($user_skill_event)){ ?>
    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
        <div class="row">
        <h3 class="headline__thaisan headline--sidebar__blue">
            <div class="float__left h-inline" ><a >Events &amp; Workshop </a></div>
            <div class="sidebox--more"><a href="/news&event/list">View all <i class="glyphicon glyphicon-play-circle"></i></a></div>
        </h3>
        
        
        <div class="sidebar--line"></div>            
    <?php

      
      foreach ($user_skill_event as $key => $value) { 
      ?>
        <div class="sidebar--verti--content ">

            <div class="col-xs-12 border--row2">

            <a href="/event/<?php print  $value['nid']; ?>" class="sample--text__small">
                  <span class="field-content"></span>
                  <span class="field-content"><?php print $value['title'];  ?></span>    
              </a>  

              <br><div class="detail__small txt__gray2"><i class="icon-location"></i> <?php print $value['facilities'];  ?></div>
              <div class="detail__small txt__gray2"><i class=" icon-calendar-empty"></i> Event Period <?php print $value['period'];  ?></div>         
                  
            </div>

        
        </div>
        
         

      <?php } ?>
    </div>
    </div>
    <?php } ?>
    <?php 
    $user_related_news = changemakers_get_project_related_news($user_data->field_profile_problem_interest['und'], $user_data->field_profile_target_group['und']); 
    if(!empty($user_related_news)){ ?>
    
    <!--Side Related News-->
        <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
        <div class="row">

            <h3 class="headline__thaisan headline--sidebar__blue">
                <div class="float__left h-inline" ><a  >Related News </a></div>
            </h3>
            <div class="sidebar--line"></div> 
        <?php

          
          foreach ($user_related_news as $key => $value) { 
          ?>
            <div class="sidebar--verti--content">

                <div class="col-xs-12 border--row2">

                  <a href="/news/<?php print  $value['nid']; ?>" class="sample--text__small">
                      <span class="field-content"></span><span class="field-content"><?php print $value['title'];  ?></span>    
                  </a>  

                  <div>News Period <?php print $value['period'];  ?></div>         
                  <div><i><?php print $value['type'];  ?></i></div>       
                </div>

           
            </div>
           

          <? } ?>

          </div>
        </div>
        <?php } ?>
        
    <!--Side Related Campaign-->
        <?php if(!isset($user->roles[8])){ ?>
            <?php 
            global $user; 
            if(!isset($user->roles[9]) && !isset($user->roles[5])){
                $user_related_campaign = changemakers_get_user_related_campaign_dashboard($user_data->field_profile_problem_interest['und'], $user_data->field_profile_target_group['und']);
            }else{
                $user_related_campaign = changemakers_get_partner_related_campaign_dashboard();
            }
             
            // print "<pre>";
            // print_r($user_data->field_profile_target_group['und']);
            // print "</pre>";

            ?>
            <?php if(!empty($user_related_campaign)){ ?>
                <div class="sidebar--wrap  bottom__lightgray col-xs-12  " >
                    <div class="row">
                    
                    <h3 class="headline__thaisan headline--sidebar__gray">
                        <div class="float__left h-inline" ><a >Currently Related Campaign</a></div>
                    </h3>
                        <div class="sidebar--line"></div> 
                        <?php
                            
                                // print "<pre>"; //field_profile_skill_interest
                                // print_r($user_data->field_profile_problem_interest['und']);
                                // print "</pre>";
                                

                                $data_campaign = array();
                                $index_campaign = 0;
                                //foreach ($user_create_project as $key => $value) { 
                                //$user_related_campaign = changemakers_get_project_related_campaign_dashboard( $value['nid']);

                                foreach ($user_related_campaign as $key => $value2) { 
                                
                                if (!in_array($value2['nid'], $data_campaign) ) {

                                    $data_campaign[$index_campaign] = $value2['nid'];
                                    $index_campaign++;
                          ?>
                            <div class="sidebar--verti--content">

                                <div class="col-xs-12 border--row2">

                                  <a href="<?php print  $value2['path']; ?>" class="sample--text__small">
                                      <span class="field-content"></span><span class="field-content"><?php print $value2['title'];  ?></span>    
                                  </a>  

                                    <div style="text-decoration: inherit;"><?php print $value2['status'];  ?></div>
                                   <div class="detail__small txt__gray2"><i class=" icon-calendar-empty"></i> Campaign Period <?php print $value2['period'];  ?></div>         
                               
                                </div>

                            <br><br>        
                            </div>
                            <?php } ?>


                          <?php } ?>
                        <? //} ?>
                        
                    </div>
                </div> 
            <?php } ?>
        <?php } ?>   
                
    <!--Side Online Course-->
        <div class="sidebar--wrap  bottom__lightgray col-xs-12 "  >
        <div class="row">
            
             <h3 class="headline__thaisan headline--sidebar__gray">
                <div class="float__left h-inline" ><a href="/online-course" >Online Course </a></div>
                <div class="sidebox--more"><a href="/online-course">View all <i class="glyphicon glyphicon-play-circle"></i></a></div>
            </h3>
            <div class="sidebar--line"></div>
            
           
            <?php echo views_embed_view('online_course', $display_id = 'block'); ?>
            
        </div>
        </div>

    <!--Side Community Post-->
    <!--<div class="sidebar--wrap  bottom__lightgray col-xs-12" >-->
    <div class="sidebar--wrap col-xs-12">
        <div class=" commu--title row" >
    	   <h4 class="headline--alte headline txt__white"><span class="headline__bold">COMMUNITY</span> POST</h4>
           <div class="sidebox--more"><a href="/community/list">View all <i class="glyphicon glyphicon-play-circle"></i></a></div>
        </div>
       <div class="commu-container commu--block">
    	<div class="row" id="index--link__gray">
            <?php echo views_embed_view('community_dashboard', $display_id = 'block'); ?>
            </div>   
            </div>
                
        </div>
</div> 



<?php } ?>
<?php
if($user->roles[6]){ // organization 
$org_join_campaign = changemakers_get_org_join_campaign_dashboard();
$count_project_in_this_campaign = $org_join_campaign[count($org_join_campaign)-1]['project_in_campaign'];
if(empty($count_project_in_this_campaign)){
    $count_project_in_this_campaign = 0;
}
?>
    <div class="col-xs-12 tab__yellow bigtopic--tab"> 
    <div class="topic ">RELATED<br> CAMPAIGNS</div>
    
    <div class="project--total"><span class="num"><?php print  $count_project_in_this_campaign; ?></span><br> Project in these campaign</div>
    <div class="campaign--total"><span class="num"><?php print count($org_join_campaign);?> </span><br>Related CAMPAIGNS</div>
    
    
</div>



   
<!--<div><h1><?php // print count($org_join_campaign);?> Related CAMPAIGNS</h1></div>-->
<!--<div><h1><?php // print $org_join_campaign[count($org_join_campaign)-1]['project_in_campaign']?> Project in these campaign</h1></div>-->
    
<?php if(!empty($org_join_campaign)){ ?>
<div class="col-xs-12 margin__top30 lightgray--box">
    <div class="row">
    <h2 class="headline headline__alte">MY ACTIVE CAMPAIGN</h2>
    <div class="viewmore--line row col-xs-12"></div>
<?php

foreach ($org_join_campaign as $key => $value) { ?>
    

    
    <div class="col-xs-3 box__pad6">
      <a href="<?php print $value['path']; ?>">
        <div class="page1-4--box">
            
        <div class="thumbbox--wrap--img">
        <img width="150" src="<?php print $value['picture'];?>">
        </div>
      
    
                
                    
    <div class="field--content ">
        <div class="h4--linelimit__2 title">
            <h4 class="headline__thaisan">
                <?php print $value['title'];?>
            </h4>
        </div>
        <div class="detail__small d__inline-block">
            <span class="txt__gray" style="font-style: italic;">กำลังรับสมัคร</span><br>
       
            <span class="txt__gray">campaign period</span><br>
            <span class="txt__black"><?php print $value['last_update'];?></span>
        </div>
        <span class="detail__medium txt__blue"><?php print $value['project_related'];?> Projects Selected</span>
        
        </div>
          </div>
        </a>
    </div>
        
<?php } ?>
    </div>
</div>
<?php } ?>
        
<?php

//$org_join_project = changemakers_get_org_join_projects_dashboard();
$data_user = user_load($user->uid);

// print "<pre>";
// print_r($data_user);
// print "</pre>";


    // $project_in_campaign_nid = array();
    // $project_in_campaign = array();
    // $campaign_id_p = array();
    // foreach ($org_join_campaign as $key => $value) { 
    //     $campaign_id_p[] = $value['nid'];
    // }
    //    = db_select('field_data_field_project_join', 'o')
    //           ->join('field_data_field_join_project', 'u', 'o.field_project_join_value = u.entity_id')
    //           ->fields('u',array('entity_id'))
    //           ->condition('o.entity_id', 13 , "=")
    //           ->execute();

        // $query = db_select('field_data_field_project_join', 'fm');
        // $query->join('field_data_field_join_project', 'fi', 'fm.field_project_join_value = fi.entity_id');
        // // $query->fields('fm', array('entity_id'));
        // $query->fields('fi', array('field_join_project_nid'));
        // $query->condition('fm.entity_id', $campaign_id_p , "in");
        // $project_in_campaign = $query->distinct()->execute();
        // foreach ($project_in_campaign as $key => $rows) {
        //     $project_in_campaign_nid[] = $rows->field_join_project_nid;
        // }
    //}


// $result_cnt = db_select('field_data_field_organization_project', 'o')
//           ->fields('o')
//           ->condition('field_organization_project_tid', $data_user->field_organization['und'][0]['tid'] )
//           ->execute();
//  $num_of_results2 = $result_cnt->rowCount();

$user_id = array();
$result_user = db_select('field_data_field_organization', 'u')
      ->fields('u')
      ->condition('field_organization_tid', $data_user->field_organization['und'][0]['tid'] )
      ->execute();
//$num_of_results2 = $result_user->rowCount();
foreach ($result_user as $key => $value) {
    $user_id[] = $value->entity_id;
}

$result_project= db_select('node', 'o')
          ->fields('o')
          ->condition('uid', $user_id, "in" )
          ->condition('type', 'project', "=" )
          ->execute();
$num_of_results2 = $result_project->rowCount();
$project_id = array();
foreach ($result_project as $key => $value) {
    $project_id[] = $value->nid;
}


$count_active_project = 0;
// foreach ($result_cnt as $key => $value) {
//     $project_id[] = $value->entity_id;
// }

 // print "<pre>";
 // print_r($project_id);
 // print "</pre>";
if(!empty($project_id)){
    $result_get_status = db_select('field_data_field_project_status', 'o')
      ->fields('o')
      ->condition('entity_id', $project_id ,"in" )
      ->execute();

}


$project_c = array();
$project_funded = array();

if(!empty($result_get_status)){
    foreach ($result_get_status as $key => $value2) {
    if($value2->field_project_status_value == 1){
        $project_c[] = $value2->entity_id;
        $count_active_project += 1;
    }
    }
}
if(!empty($project_id)){
    $query = db_select('field_data_field_join_project', 'fm');
            $query->join('field_data_field_project_status', 'fi', 'fm.field_join_project_nid = fi.entity_id');
            $query->fields('fm', array('field_join_project_nid'));
            $query->condition('fm.field_join_project_nid', $project_id ,"in" );
            $query->condition('fi.field_project_status_value', 1 ,"=" );
    $result_funded = $query->execute();   
}

// $result_funded = db_select('field_data_field_join_project', 'o')
//       ->fields('o')
//       ->condition('field_join_project_nid', $project_id ,"in" )
//       ->execute();
if(!empty($result_funded)){
    foreach ($result_funded as $key => $value) {
        if(!in_array($value->field_join_project_nid, $project_funded)){
            $project_funded[] = $value->field_join_project_nid;
        }
        // print "<pre>";
        // print_r($value);
        // print "</pre>";
        
    }
}

// print "<pre>";
// print_r($project_funded);
// print "</pre>";

?>
    
<div class="col-xs-12 tab__yellow bigtopic--tab margin__top30"> 
    <div class="topic ">PROJECTS</div>
    <select id="filter_project">
        <option value="0">All</option>
        <option value="1" selected>View Active Projects</option>
        <option value="2">View Not Active Projects</option>
    </select>


    <select  id="search_tax" name="problem">
        <option value="0">All Problems</option>
        <?php 
            $problem = changemakers_getListTaxonomy(4);
            foreach ($problem as $key => $value) {
                if($value->name != "All"){
                    $selected = !empty($problem_tid==$value->tid)?"selected='selected'":"";
                    echo "<option value='$value->tid' $selected> $value->name</option>";
                    $tid = $value->tid;
                    $parend = changemakers_getListSubTaxonomy($tid);
                    foreach ($parend as $key2 => $value2) {
                        $selected = !empty($problem_tid==$value2->tid)?"selected='selected'":"";
                        echo "<option value='$value2->tid' $selected> - $value2->name</option>";
                    }
                } 
            }
            ?>
    </select>


    <div class="gray--total"><span class="num"><?php print $count_active_project ?> </span><br>Total Active Project</div>
    <div class="project--total"><span class="num"> <?php print count($project_funded); ?> </span><br>Active Funded Project</div>
    <div class="campaign--total"><span class="num"><?php print $num_of_results2 ?></span><br>Project In Total</div>
    
</div>
<input type="hidden" id="track_click_project" value="">    
    
<div class="col-xs-12 project--page margin__top15">
    <div class="row">
<?php


if($count_active_project>0):
$total_pages_project= ceil($count_active_project/12); 


?>
<div id="results-loadding-more-project"></div>

<?php else: 
    $total_pages_project= 0; ?>
<?php endif; ?>
        
    </div></div>
    


<?php

}    
if(empty($total_pages)){
    $total_pages = 0;
}
if(empty($total_pages_project)){
    $total_pages_project=0;
}
?>   


<script>

    function load_project_dashboard(status, taxo, total){
        (function($) {
            $(this).hide(); //hide load more button on click
            $('.animation_image_project').show(); //show loading image
            $('#load_project_more_button').hide();
            var track_click_project = $("#track_click_project").val(); 
            var total_pages_project = total; //<?php echo $total_pages_project; ?>;
            //var taxo = $('#search_tax').val();
            if(track_click_project <= total_pages_project) //make sure user clicks are still less than total pages
            {
              //alert(track_click);
              //post page number and load returned data into result element
              $.post('/api/changemakers/dashboard/project/load',{'page': track_click_project,'filter_status':status, 'taxo':taxo }, function(data) {
                //alert(data);
              
                $("#load_project_more_button").show(); //bring back load more button
                
                $("#results-loadding-more-project").append(data); //append data received from server
                
                //scroll page to button element
                //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                
                //hide loading image
                $('.animation_image_project').hide(); //hide loading image once data is received
          
                track_click_project++; //user click increment on load button
                $("#track_click_project").val(track_click_project);

                if(track_click_project >= total_pages_project-1)
                {
                    //reached end of the page yet? disable load button
                    $("#load_project_more_button").hide();
                }
              
              }).fail(function(xhr, ajaxOptions, thrownError) { 
                alert(thrownError); //alert any HTTP error
                //$("#load_project_more_button").show(); //bring back load more button
                $('.animation_image_project').hide(); //hide loading image once data is received
              });
              
              //track_click_project = $("#track_click_project").val();
              
             }
        }(jQuery));
    }
    function user_like_comment(element){ 
        var cid = element.getAttribute('data-cid');
        var uid = element.getAttribute('data-uid');
        var child = element.childNodes;  

        (function($){
        $.ajax({
            url: "/like/comment/"+cid+"/"+uid,
            type: "POST",
            dataType: "json",
            success : function(data) { 

             console.log(data);           
               if(data['status']==1){
                  child[1].setAttribute('class',' ');
                  child[1].setAttribute('class','icon-heart');
                  child[3].innerHTML=data['value'];
                }else{
                  alert(data['msg']);
                }
            },
            error: function () {}
        });
      })(jQuery);
    }

    function loadmore_comment(node_c_id, track_click_p, total_pages_p, tag){

        (function($){

            $(this).hide(); //hide load more button on click
            $('.animation_image').show(); //show loading image
            var xxx = $("#track_click_p_"+node_c_id).val();

            if(xxx){
                track_click_p = xxx;
            }


            if(track_click_p <= total_pages_p) //make sure user clicks are still less than total pages
            {
              //alert(track_click);
              //post page number and load returned data into result element
              $.post('/api/changemakers/dashboard/comment/load',{'page': track_click_p,'nid':node_c_id}, function(data) {
                //alert(data);
              
                //$(load_more_button).show(); //bring back load more button
                
                $("#"+tag).append(data); //append data received from server
                
                //scroll page to button element
                //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                
                //hide loading image
                $('.animation_image').hide(); //hide loading image once data is received
          
                track_click_p++; //user click increment on load button
                $("#track_click_p_"+node_c_id).val(track_click_p);
                
                
              
              }).fail(function(xhr, ajaxOptions, thrownError) { 
                alert(thrownError); //alert any HTTP error
                //$(load_more_button).show(); //bring back load more button
                $('.animation_image').hide(); //hide loading image once data is received
              });

                if(track_click_p >= total_pages_p-1)
                {
                    //reached end of the page yet? disable load button
                    $("#button_"+node_c_id).attr("disabled", "disabled");
                }

              // if(track_click >= total_pages-1)
              // {
              //   //reached end of the page yet? disable load button
              //   $("#load_more_button").attr("disabled", "disabled");
              // }
              
              
              
            }
        })(jQuery);

    }
    // $(document).ready(function(){
    //     $("button").click(function(){
    //         $.ajax({url: "demo_test.txt", success: function(result){
    //             $("#div1").html(result);
    //         }});
    //     });
    // });
    (function($) {
        $(document).ready(function(){

        var count_campaign = <?php echo json_encode($partner_campaign); ?>;

        if(count_campaign){
            for (var i = 0; i < count_campaign.length; i++) {
                var track_click_c = 0;
               $('#results-loadding-more-comment-'+count_campaign[i]['nid']).load("/api/changemakers/dashboard/comment/load", {'page': track_click_c,'nid':count_campaign[i]['nid']}, function() {track_click++;}); //initial data to load 
            };
        }

        var coach_relate_campaign = <?php echo json_encode($coach_relate_campaign); ?>;
        
        if(coach_relate_campaign){
            for (var i = 0; i < coach_relate_campaign.length; i++) {
                var track_click_c = 0;
               $('#results-loadding-more-comment-'+coach_relate_campaign[i]['nid']).load("/api/changemakers/dashboard/comment/load", {'page': track_click_c,'nid':coach_relate_campaign[i]['nid']}, function() {track_click++;}); //initial data to load 
            };
        }

        //alert(count_campaign);

          var track_click = 0; //track user click on "load more" button, righ now it is 0 click
          
          var total_pages = <?php echo $total_pages ?>;
          var nid = "<?php echo $comment_nid_explode; ?>";
          $('#results-loadding-more-comment').load("/api/changemakers/dashboard/comment/load", {'page': track_click,'nid':nid}, function() {track_click++;}); //initial data to load

            $("#load_more_button").click(function (e) { //user clicks on button
                //alert(nid);

              
                $(this).hide(); //hide load more button on click
                $('.animation_image').show(); //show loading image

                if(track_click <= total_pages) //make sure user clicks are still less than total pages
                {
                  //alert(track_click);
                  //post page number and load returned data into result element
                  $.post('/api/changemakers/dashboard/comment/load',{'page': track_click,'nid':nid}, function(data) {
                    //alert(data);
                  
                    $("#load_more_button").show(); //bring back load more button
                    
                    $("#results-loadding-more-comment").append(data); //append data received from server
                    
                    //scroll page to button element
                    //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                    
                    //hide loading image
                    $('.animation_image').hide(); //hide loading image once data is received
              
                    track_click++; //user click increment on load button
                  
                  }).fail(function(xhr, ajaxOptions, thrownError) { 
                    alert(thrownError); //alert any HTTP error
                    $("#load_more_button").show(); //bring back load more button
                    $('.animation_image').hide(); //hide loading image once data is received
                  });
                  
                  
                  if(track_click >= total_pages-1)
                  {
                    //reached end of the page yet? disable load button
                    $("#load_more_button").attr("disabled", "disabled");
                  }
                 }
              
            });

        /*if(count_campaign){
            var total_pages_pro = <?php echo json_encode($total_pages_p); ?>;
            for (var i = 0; i < count_campaign.length; i++) {
                var total_pages_p = 2;//count_campaign[i]['count_page'];
                var track_click_p = 0;
                var load_more_button = "#load_more_button_"+count_campaign[i]['nid'];
                var nid_p = count_campaign[i]['nid'];
                $(load_more_button).click(function (e) { //user clicks on button
                    //alert(nid);
                    res = load_more_button.substring(18);
                    var p_more_button = "#p_more_button_"+res;
                    var node_c_id = $(p_more_button).val();
                  
                    $(this).hide(); //hide load more button on click
                    $('.animation_image').show(); //show loading image

                    if(track_click_p <= total_pages_p) //make sure user clicks are still less than total pages
                    {
                      //alert(track_click);
                      //post page number and load returned data into result element
                      $.post('/api/changemakers/dashboard/comment/load',{'page': track_click_p,'nid':node_c_id}, function(data) {
                        //alert(data);
                      
                        $(load_more_button).show(); //bring back load more button
                        
                        $("#results-loadding-more-comment-"+nid_p).append(data); //append data received from server
                        
                        //scroll page to button element
                        //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
                        
                        //hide loading image
                        $('.animation_image').hide(); //hide loading image once data is received
                  
                        track_click_p++; //user click increment on load button
                        if(track_click_p >= total_pages_p-1)
                        {
                            //reached end of the page yet? disable load button
                            $(load_more_button).attr("disabled", "disabled");
                        }
                      
                      }).fail(function(xhr, ajaxOptions, thrownError) { 
                        alert(thrownError); //alert any HTTP error
                        $(load_more_button).show(); //bring back load more button
                        $('.animation_image').hide(); //hide loading image once data is received
                      });
                      
                      
                      
                    }
                      
                });
            }
        } */

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var track_click_project = 0; //track user click on "load more" button, righ now it is 0 click
    var total_pages_project = <?php echo $total_pages_project; ?>;

    $('#filter_project').on('change', function (e) {
        //alert($(this).val());
        var track_click_project = 0;
        var taxo = $('#search_tax').val();
        //$('#results-loadding-more-project').load("/api/changemakers/dashboard/project/load", {'page': track_click_project }, function() {track_click_project++;});
        
        $.post('/api/changemakers/dashboard/project/load',{'page': track_click_project, 'filter_status': $(this).val(), 'taxo': taxo}, function(data) {
            //alert(data);
          
            //$("#load_project_more_button").show(); //bring back load more button
            $("#results-loadding-more-project").html("");
            $("#results-loadding-more-project").append(data); //append data received from server

            
            //scroll page to button element
            //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
            
            //hide loading image
            //$('.animation_image_project').hide(); //hide loading image once data is received
      
            track_click_project++; //user click increment on load button
            $("#track_click_project").val(track_click_project);
          
          }).fail(function(xhr, ajaxOptions, thrownError) { 
            alert(thrownError); //alert any HTTP error
            $("#load_project_more_button").show(); //bring back load more button
            $('.animation_image_project').hide(); //hide loading image once data is received
          });

    });

    $('#search_tax').on('change', function (e) {
        //alert($(this).val());
        var track_click_project = 0;
        var taxo = $(this).val();
        var filter_status = $('#filter_project').val();
        //alert($(this).val()+" "+$('#filter_project').val())
        //$('#results-loadding-more-project').load("/api/changemakers/dashboard/project/load", {'page': track_click_project }, function() {track_click_project++;});
        
        $.post('/api/changemakers/dashboard/project/load',{'page': track_click_project, 'filter_status':filter_status, 'taxo': taxo }, function(data) {
            //alert(data);
          
            //$("#load_project_more_button").show(); //bring back load more button
            $("#results-loadding-more-project").html("");
            $("#results-loadding-more-project").append(data); //append data received from server

            
            //scroll page to button element
            //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
            
            //hide loading image
            //$('.animation_image_project').hide(); //hide loading image once data is received
      
            track_click_project++; //user click increment on load button
            $("#track_click_project").val(track_click_project);
      
        }).fail(function(xhr, ajaxOptions, thrownError) { 
            alert(thrownError); //alert any HTTP error
            $("#load_project_more_button").show(); //bring back load more button
            $('.animation_image_project').hide(); //hide loading image once data is received
        });  

    });


    $('#results-loadding-more-project').load("/api/changemakers/dashboard/project/load", {'page': track_click_project, 'filter_status': 1, 'taxo': 0}, function() {track_click_project++;}); //initial data to load

    /*$("#load_project_more_button").click(function (e) { //user clicks on button
        

      
        $(this).hide(); //hide load more button on click
        $('.animation_image_project').show(); //show loading image

        if(track_click_project <= total_pages_project) //make sure user clicks are still less than total pages
        {
          //alert(track_click);
          //post page number and load returned data into result element
          $.post('/api/changemakers/dashboard/project/load',{'page': track_click_project,'nid':nid}, function(data) {
            //alert(data);
          
            $("#load_project_more_button").show(); //bring back load more button
            
            $("#results-loadding-more-project").append(data); //append data received from server
            
            //scroll page to button element
            //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
            
            //hide loading image
            $('.animation_image_project').hide(); //hide loading image once data is received
      
            track_click_project++; //user click increment on load button
          
          }).fail(function(xhr, ajaxOptions, thrownError) { 
            alert(thrownError); //alert any HTTP error
            $("#load_project_more_button").show(); //bring back load more button
            $('.animation_image_project').hide(); //hide loading image once data is received
          });
          
          
          if(track_click_project >= total_pages_project-1)
          {
            //reached end of the page yet? disable load button
            $("#load_project_more_button").attr("disabled", "disabled");
          }
         }
          
    });*/

         
        });   
    }(jQuery));
</script>
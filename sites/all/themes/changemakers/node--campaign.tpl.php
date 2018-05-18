<style type="text/css">
/*    #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }*/
</style>
<?php 
global $user;
// if($user->uid!=0):
// $node = node_load($nid);
$node->field_count_views['und'][0]['value'] += 1;
node_save($node);
$select_title = changemakers_join_project_campaign($node);//changemakers_chcek_join_campaign($node);
$photo_sponsored = image_style_url("", $user->picture->uri); 
 //    print '<pre>';
    // print_r($node);
    // print '</pre>';
$user_load = user_load($node->uid);
    // print '<pre>';
    // print_r($user_load);
    // print '</pre>';
?>

<div class="col-xs-12 pad0 pagebigtab--campaign">
    <div class="thumb field-name-field-campaign-image">
        
        <img class="image-width-campaign" src="<?php print image_style_url('large',$node->field_campaign_image['und'][0]['uri']);?>">
    </div>
    
    <div class="pagebigtab--detail  ">
        <div class="detail__small__nopad txt__gray ">SPONSORED BY</div>
    <?php if(!empty($node->field_sponsored['und'])): ?>
        <?php foreach ($node->field_sponsored['und'] as $key => $value): ?>
        <div class="campaign--owner--thumb ">              
            <img class="image-width-campaign icon-sponsor" src="<?php print image_style_url('sponsored',$value[uri]);?>">
        </div>&nbsp;&nbsp;
      <?php endforeach; ?>
      <?php endif; ?>
      
        
    
    <div class="pagebigtab-detail--name col-xs-12">
        
        <h1 class="headline__thaisan pagebigtab--name clear"><?php  print $node->title; ?></h1>
        
     <div class="detail__medium clear">
              
     <div class="tag--linelimit__1">
     <?php if(!empty($node->field_campaign_problems['und'])) :?>
         <span class=" icon-tag"></span>
    <?php endif;?> 
     <?php
         $tag = array();
         if(!empty($node->field_campaign_problems['und'])) :
         foreach ($node->field_campaign_problems['und'] as $key => $value) {
            if($value['taxonomy_term']->name!="All"):
             $tag[] =  $value['taxonomy_term']->name;
            endif; 
         }
         endif;
         if(!empty($tag)): 
         print implode(",", $tag);        
         endif; 
        
     ?>
        </div>
    <div class="tag--linelimit__1">
    <?php if(!empty($node->field_campaign_target['und'])) : ?>
    <span class="icon-target"></span> 
    <?php endif;?>
    <?php
         $target = array();
         if(!empty($node->field_campaign_target['und'])) : 
         foreach ($node->field_campaign_target['und'] as $key => $value) {            
            if($value['taxonomy_term']->name!="All"):
                $target[] =  $value['taxonomy_term']->name;           
            endif; 
         }
         endif;
         if(!empty($target)): 
         print implode(",", $target);
        
         endif; 
     ?>
    </div>   
            </div></div>
   
       <!--Short Detail Box-->
        

<div class="col-xs-12 pad0">

    <div class="col-xs-7 " style="margin-top:10px; padding-rignt:10px;">
        <div class="row">
            <div class="pagebigtab--detail--box detail--icon--update">
                    <div class="pagebigtab--detail-topic">DEADLINE</div>
                    <div class="pagebigtab--detail-txt tag--linelimit__1"><?php print changemakers_get_date_thai_short($node->field_campaign_date['und'][0]['value2']); ?></div>
            </div>
            
            <div class="pagebigtab--detail--box detail--icon--grant">
                    <div class="pagebigtab--detail-topic">GRANT</div>
                    <div class="pagebigtab--detail-txt pagebigtab--detail-txt tag--linelimit__1">
                    <?php 
                        print number_format($node->field_campaign_grant['und'][0]['value'], 0, '.', ',');
                    ?></div>
            </div>
            <div class="pagebigtab--detail--box detail--icon--stage">
                    <div class="pagebigtab--detail-topic">STAGE</div>
                    <div class="pagebigtab--detail-txt  tag--linelimit__1"><?php print isset($node->field_campaign_stage['und'][0]['value'])?$node->field_campaign_stage['und'][0]['value']:'';?></div>
            </div>            

            <div class="pagebigtab--detail--box detail--icon--target">
                <div class="pagebigtab--detail-topic">TARGET TEAMS</div>
                    <div class="pagebigtab--detail-txt tag--linelimit__1"><?php print isset($node->field_campaign_project_limit['und'][0]['value'])?$node->field_campaign_project_limit['und'][0]['value']:0; ?></div>
                </div>
                <div class="pagebigtab--detail--box detail--icon--view">
                    <p class="pagebigtab--detail-topic">VIEWS</p>
                    <p class="pagebigtab--detail-txt"><?php print $node->field_count_views['und'][0]['value']?></p>
                </div>
             <div class="pagebigtab--detail--box detail--icon--status">
                    <p class="pagebigtab--detail-topic">Finalists</p>
                    <p class="pagebigtab--detail-txt"><?php  
                        $count = 0;
                        $campaign = node_load($nid);
                        if(!empty($campaign->field_project_join['und'])) {
                            foreach ($campaign->field_project_join['und'] as $key => $item) {

                                $data = field_collection_item_load($item['value']); 

                                $project_node = $data->field_join_project['und'][0]['node'];

                                $u = user_load($project_node->uid);    
                                $fund = $data->field_fund_project['und'][0]['value'];
                                // print "<pre>";
                                // print_r($project_node);              
                                // print "</pre>";
                                if($fund != 0 && !empty($fund) && !empty($project_node)){ 
                                    $count++;
                                }
                            }
                        }
                        print $count;        ?>
                    </p>
                </div>
            
        </div>
    </div>

    
        <div class="col-xs-5" style="margin-top:10px; ">
        <div class="row" style="text-align:center;">
            
         <!--Social-->
         <!--
        <div class="col-md-3 padding-header button-float-right">
            <a >
                <p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
            </a>
        </div>
        <div class="col-md-3 padding-header button-float-right">
            <a >
                <p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/twitter_icon.png"></p>
            </a>
        </div>
        -->

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
        </div> -->

            
            
        <!--Sent project--> 
        
        <div class="col-xs-12 padding-header ">
                <?php if($user->uid != 0 && count($select_title)!=0){ //&& (isset($user->roles[3]) || isset($user->roles[4]) || isset($user->roles[10]))?>
                
                <form action="/changemakers/join_campaign" method="post">
                    <select name="project_id" class="campaign--select--project" >
                        <option value="0">
                        <i class="icon-link"></i> 
                        เลือกโปรเจคที่จะส่งเข้าร่วม
                        </option>
                        <?php for ($i=0; $i < count($select_title) ; $i++) { 
                            if($select_title[$i] != 1)
                            { ?> 
                            <option value="<?php echo $select_title[$i][1]?>"><?php echo $select_title[$i][0]?></option>
                            <?php
                            }
                        }?>
                    </select>
                    <br/>

                    <input type="hidden" name="campaign_id" value="<?php echo $nid;?>"> 
                    <div class="form-actions">
                        <p>
                            <button class="btn btn--submit" style="width:100%;" type="submit" name="submit" value="Submit"><i class="icon-plus"></i> 
                            เข้าร่วม campaign</button>
                            
                        </p>
                    </div>
                    <!--
                    <button class="btn btn--disable pagebigtab__1btn" type="submit" name="op" value="Submit">ปิดรับโปรเจค</button>
                    <button class="btn btn--cancel pagebigtab__1btn " type="submit" name="op" value="Submit"><i class="icon-cancel"></i> ยกเลิกการส่งโปรเจค</button>

                    -->
                </form> 
                <?php } ?>
                 <?php if($user->roles[3]){ ?>
                <a href="/node/<?php print $nid; ?>/edit">
                    <button class="btn btn--submit pagebigtab__1btn"><i class="icon-edit-alt"></i> Edit Campaign</button>
                </a>
                <?php } ?>
        </div>

    
    </div>
        
        
        </div>
        </div></div>
    
</div>  


<div class="margin-top-header">
    <!-- Nav tabs -->
    <!--<ul class="nav nav-tabs margin-top-header" role="tablist">
        <li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">TIMELINE</a></li>
        <li role="presentation"><a href="#project" aria-controls="project" role="tab" data-toggle="tab">PROJECTS</a></li>
        <li role="presentation"><a href="#finalists" aria-controls="finalists" role="tab" data-toggle="tab">FINALISTS</a></li>
        <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">ABOUT</a></li>

    </ul>-->
    
    <ul class="pagebigtab--nav list-inline col-xs-12" role="tablist">
            <li role="presentation" class="active">
                <a href="#timeline" class="pagebigtab--nav--list nav--timeline" aria-controls="timeline" role="tab" data-toggle="tab">
                TIMELINE<div class="nav--timeline--icon"></div>
            </a>
            </li>
            <li role="presentation"><a  href="#project" aria-controls="project" role="tab" data-toggle="tab" class="pagebigtab--nav--list nav--project">
                PROJECTS 
                <div class="nav--project--icon"></div>
            </a>
            </li>          
            <li role="presentation"><a href="#about" class="pagebigtab--nav--list nav--about" aria-controls="about" role="tab" data-toggle="tab">
                ABOUT <div class="nav--about--icon"></div>
            </a>
            </li>          
            <li role="presentation" <?php if($class_active == "fund"){ print "class ='active'";} ?> >
            <a href="#fund" class="pagebigtab--nav--list nav--fund" aria-controls="fund" role="tab" data-toggle="tab">FUND 
                <div class="nav--fund--icon"></div></a>
            </li>
       
           
            
             <!-- <li role="presentation">
            <a href="#finalists" class="pagebigtab--nav--list nav--doc" aria-controls="finalists" role="tab" data-toggle="tab">
                FINALISTS 
                <div class="nav--doc--icon"></div>
            </a>   
            </li> -->
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="timeline">
        
            <?php //if($user->uid != 0){ ?>
            <div class="col2--viewcontent">                            
                <?php
                    $node_view = node_view($node);
                    $node_view['comments'] = comment_node_page_additions($node_comment);
                    print render($content['comments']);
                ?>     
            </div>
            <?php //} ?>      
            
            
            
            <div class="col2--sidebar " style="position:relative;">      
                <div class="sidebar--wrap  bottom__lightgray col-xs-12" style="margin-top:10px;" >
                    <div class="row">
                        <h3 class="headline__thaisan headline--sidebar__yellow"><a >รูปภาพ</a></h3>
                        <div class="sidebar--line"></div>
                        <?php if(!empty($node->field_sub_campaign_image)):?>
                            <div class="padding10__box col-xs-12 image-set">
                                <?php  foreach ($node->field_sub_campaign_image['und'] as $key => $value) {
                                     $gallery = image_style_url("gallery", $value['uri']);
                                     $org_image = file_create_url($value['uri']);
                                   ?>
                                    <div class="campaign--gallery"><a href="<?php print $org_image;?>" rel="lightbox[gallery]" ><img class="image-width-campaign" class="popup"  src="<?php print $gallery;?>"></a></div>  
                                   <?php
                                }?>
                             </div>
                         <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>    
            
            
            
        <!--end of Timeline-->
        <div role="tabpanel" class="tab-pane project--page" id="project">
            <?php 
            $projects = array_reverse(changemakers_get_projects_join_campaigns($nid));
            $check_empty_project =0;
             foreach ($projects as $key => $value) { 
                $project_node = node_load($value['nid']);
                $author_project = user_load($project_node->uid);

                if(!empty($project_node->title)){
                    $check_empty_project = 1;

                ?>
                <div class="col-xs-3 box__pad6" >
                    <div  class="page1-4--box" >
                        <div class="thumb">
                            <a href="/project/<?php print $value['nid'];?>">
                                <?php if($project_node->field_project_image['und'][0]['uri']!=""):?>
                                    <img src="<?php print image_style_url('large',$project_node->field_project_image['und'][0]['uri']);?>">
                                <?php else:?>
                                    <img src="/sites/all/themes/changemakers/images/project1.jpg">
                                <?php endif;?>   
              
                            </a>
         
                        </div>
                        <div  id="moredetail__over"  class="project-campaign field--content boxover">
                            
                            <a href="/project/<?php print $value['nid'];?>">
                             <div class="detail__small d__inline-block">
                    
                                <h4 class="headline__thaisan h4--linelimit__2"><?php print $value['title'];?></h4>                        
                                <div class="tag--linelimit__1 ">
                                    <span class="icon-clock txt__gray2"></span> <?php print $value['last_update'];?>
                                </div>
                                 
                                 
                                <?php print isset($fields['field_knowledge_type']->content)?$fields['field_knowledge_type']->content:"";?> 
                                <div class="tag--linelimit__1 ">
                                    <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($author_project->uid); ?>
                                </div>
                                                <div id="moredetail__hide">
                                <?php if(!empty($project_node->field_problem_topic['und'])){ ?>
                                <div class="tag--linelimit__1 ">
                                    <span class="icon-tag txt__gray2"></span> 

                                    <?php 
                                    $problem_project = array();
                                  
                                     foreach ($project_node->field_problem_topic['und'] as $key => $value) {
                                        $taxonomy = taxonomy_term_load($value['tid']);
                                        if($taxonomy->name!="All"):
                                         $problem_project[] =  $taxonomy->name;
                                        endif; 
                                     }

                                     if(!empty($problem_project)){
                                     print implode(",", $problem_project);
                                    
                                     }?>
                                </div>
                                <?php } ?>

                                <?php if(!empty($project_node->field_project_target['und'])){ ?>
                                <div class="tag--linelimit__1 ">
                                <span class="icon-target txt__gray2"></span>
                                    <?php 
                                    $target_project = array();
                                   
                                     foreach ($project_node->field_project_target['und'] as $key => $value) {
                                        $taxonomy = taxonomy_term_load($value['tid']);
                                        if($taxonomy->name!="All"):                                  
                                         $target_project[] =  $taxonomy->name;
                                        endif; 
                                     }

                                     if(!empty($target_project)){
                                     print implode(",", $target_project);
                                    
                                     }?>
                               
                                </div>
                                <?php } ?>

                               
                        
                                 </div>                     
                            <!-- </div>-->
                               
                            </div>
                            </a>
                        </div>
                    </div>
                </div>    
                <?php } ?>
    

               <!--<div class="col-xs-3 box__pad6" >
                    <div  class="page1-4--box " >                    
                        <div class="thumbbox--wrap--img">
                        <a href="/project/<?php /* print $value['nid'];?>">    
                            <?php if($project_node->field_project_image['und'][0]['uri']!=""):?>
                               <img src="<?php print image_style_url('large',$project_node->field_project_image['und'][0]['uri']);?>">
                               <?php else:?>
                               <img src="/sites/all/themes/changemakers/images/project1.jpg">
                            <?php endif;?>   
                           
                        </a>
                        </div>
                         
                        <div   class="field--content boxover"> 
                           
                            <div class="detail__small d__inline-block">   
                            <div class="linelimit__2">   <h4 class="headline__thaisan"><?php print $value['title'];?></h4></div>
                         
                            <span class="icon-clock txt__gray2"></span> <?php print $value['last_update'];*/ ?>
                              

                           <!-- </div>
                        </div>
                    </div>
                </div>-->
                    
    <?php   }

            if($check_empty_project == 0){
                print '<div class="margin__top30 txt__center col-xs-12 ">
                            <h4 class="headline__thaisan">ไม่มีโปรเจกต์ที่เข้าร่วมแคมเปญนี้</h4>
                        </div>';
            }
      ?>
        
        </div><!--end of Project-->
        
        <?php /*
        <div role="tabpanel" class="tab-pane project--page" id="finalists">
            
            <?php 
            $projects = changemakers_get_projects_join_campaigns_final($nid);
             foreach ($projects as $key => $value) { ?>
                
            <div class="col-xs-3 box__pad6" >
                <div  class="page1-4--box border--buttom__yellow" >
                
                <div class="thumbbox--wrap--img">
                <a href="/node/<?php print $value['nid'];?>/edit">
                    <img width="150" src="<?php print $value['picture'];?>">
                </a>
                </div>
                <div   class="field--content boxover">    
                <div class="detail__small d__inline-block">
                    <div class="linelimit__2"><h4 class="headline__thaisan"><?php print $value['title'];?>
                    </h4></div>
                <span class="icon-clock txt__gray2"></span> <?php print $value['last_update'];?>
                 

                    
                    
                    </div></div></div></div>
                
        <?php     }     ?>
                    
                    
            
        </div><!--end of finalist--> */ ?>
        
        <div role="tabpanel" class="tab-pane" id="about">

            <div class="col2--viewcontent ">
                <div class="col-xs-12 viewcontent--box bottom__lightgray">
                    <div class="col-xs-12  viewcontent--detail margin__top15 "> 
                        <div class="col-xs-12 pad0">
                            <div class="campaign--owner--thumb">
                                 <?php if(!empty($user_load->picture->filename)): ?>
                                  <?php $photo = image_style_url("sponsored", $user_load->picture->uri); ?>
                                    <img src="<?php echo $photo; ?>" class="image-width-campaign icon-sponsor" >
                                  <?php else: ?>
                                     <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg" class="img-responsive image-width-campaign icon-sponsor">
                                <?php endif; ?>
                            </div>
        
                            <div class="campaign--owner">
                                <div class="detail__small__nopad txt__gray">Campaign Owner</div>
                                <h2 class="headline__thaisan pagebigtab--name clear"><?php print changemakers_get_contact($user_load->uid); ?></h2>
                            </div>   
                        </div>
            
                        <div class="col-xs-12 pad0 margin__top15">
                            <?php if(!empty($node->field_campaign_problems['und'])) :?>
                            <span class="tag--linelimit__2">
                            <span class=" icon-tag"></span> 
                            <?php  endif; ?>
                            <?php
                             $tag = array();
                            if(!empty($node->field_campaign_problems['und'])) :
                                 foreach ($node->field_campaign_problems['und'] as $key => $value) {
                                    if($value['taxonomy_term']->name!="All"):
                                     $tag[] =  $value['taxonomy_term']->name;
                                    endif; 
                                 }
                            endif;
                                 if(!empty($tag)){ 

                                    print implode(",", $tag);

                                 }else{
                                    if(count($tag) == 62){
                                        print "All";
                                    }
                                 }
                                
                                ?></span>
                            <?php  if(!empty($node->field_campaign_target['und'])):?>
                            <span class="icon-target"></span> 
                            <?php  endif; ?>
                             <?php
                                 $target = array();
                                 if(!empty($node->field_campaign_target['und'])):
                                 foreach ($node->field_campaign_target['und'] as $key => $value) {
                                    if($value['taxonomy_term']->name!="All"):
                                     $target[] =  $value['taxonomy_term']->name;
                                    endif; 
                                 }
                                 endif; 
                                 if(!empty($target)): 
                                 print implode(",", $target);
                                 else:
                                    if(count($target) == 12){
                                        print "All";
                                    }
                                 endif;
                                
                             ?>
                        </div>    
        
                        <!--<div class="about-gallery col-xs-12 pad0">
                        <?php /*if(!empty($node->field_sub_campaign_image['und'])): ?>
                            <?php foreach($node->field_sub_campaign_image['und'] as $key => $sub_image):?>
                                <img  class="image-width-campaign"  src="<?php print image_style_url('large',$sub_image['uri']);?>">                       
                            <?php endforeach;?>
                        <?php endif; */?>
                        </div> -->

                        <br><br>
                        <div class="col-xs-12 pad0">
                            <p><?php print_r($node->body['und'][0]['value']); ?></p>   
                        </div>        
    
                    </div>
                </div>    
            </div>             
            
           
            <div class="col2--sidebar " style="position:relative;">      
                <div class="sidebar--wrap  bottom__lightgray col-xs-12" style="margin-top:0;" >
                    <div class="row">
                        <h3 class="headline__thaisan headline--sidebar__yellow"><a >Campaign panelist</a></h3>
                        <div class="sidebar--line"></div>
                        <div class="padding10__box col-xs-12 image-campaign-panelist">
                            <?php print $node->field_campaign_panelist['und'][0]['value'];?>
                        </div>
                        <?php /* if(!empty($node->field_sub_campaign_image)):?>
                            <div class="padding10__box col-xs-12 image-set">
                                <?php  foreach ($node->field_sub_campaign_image['und'] as $key => $value) {
                                     $gallery = image_style_url("gallery", $value['uri']);
                                     $org_image = file_create_url($value['uri']);
                                   ?>
                                    <div class="campaign--gallery"><a href="<?php print $org_image;?>" rel="lightbox[gallery]" ><img class="image-width-campaign" class="popup"  src="<?php print $gallery;?>"></a></div>  
                                   <?php
                                }?>
                             </div>
                         <?php endif;*/ ?>
                        
                    </div>
                </div>
            </div>    

        </div><!--end of about-->

    
 

    <?php 
    $project_join = array();
    if(!empty($node->field_project_join['und'])):
    foreach ($node->field_project_join['und'] as $key => $value) {
      $item = field_collection_item_load($value['value']);
      if(!empty($item->field_join_project)) :
          $field_join_project = $item->field_join_project;
          foreach ($field_join_project['und'] as $key => $project) {
            $project_join[] =$project;
          }
        endif;    
    }
    endif;
  

    $fund = changemakers_get_data_from_webform_project_fund($node->nid);
    ?>
         <div role="tabpanel" class="tab-pane" id="fund">
            <?php // if(!empty($fund) || isset($user->roles[3]) || $user->uid == $node->uid ){  ?>

            <div class="col-xs-12 pad0">
            
                <div class="col-xs-12 fund--table--total">
                    <div class="col-xs-4 total--budget">
                        <div class="txt__16">Funding Delivered</div>
    
                        <div class="margin__top5">
                            <?php if(isset($user->roles[3])):?>
                            <i class="icon-edit-alt edit_total_budget"></i>  
                            <?php endif;?>

                            <span class="total_budget margin__top10">                   
                            <?php print number_format($node->field_total_budget['und'][0]['value'], 2, '.', ',');?> 
                            Baht</span>
                           
                            <input type="text" id="total_budget" class="hidden" name="total_budget" value="<?php print intval($node->field_total_budget['und'][0]['value']);?>">
                            <input type="button" id="update_total_budget"  class="hidden" value="update" data-type="total_budget" data-nid="<?php print $nid;?>">
                          
                        </div>
                    </div>
                    <div class="col-xs-3 funding--amount">
                        <div class="txt__16">Funding Amount</div>
                        <div class="margin__top5">
                            <?php if(isset($user->roles[3])):?>
                            <i class="icon-edit-alt edit_funding_amount"></i> 
                            <?php endif;?>

                            <span class="funding_amount margin__top10">                    
                            <?php print number_format($node->field_funding_amount['und'][0]['value'], 2, '.', ',');?>
                            Baht</span>
                           
                            <input type="text" id="funding_amount" class="hidden"  name="funding_amount" value="<?php print intval($node->field_funding_amount['und'][0]['value']);?>">
                            <input type="button" id="update_funding_amount" class="hidden" value="update" data-type="funding_amount" data-nid="<?php print $nid;?>">
                        </div>
                        
                    </div>
                    <div class="col-xs-3 funding--amount--left">
                        <div class="txt__16">Funding Amount Left</div>
                        <div class="margin__top5">
                            <?php if(isset($user->roles[3])):?>
                            <i class="icon-edit-alt edit_funding_amount_left"></i> 
                            <?php endif;?>

                            <span class="funding_amount_left margin__top10">             
                             <?php print number_format($node->field_funding_amount_left['und'][0]['value'], 2, '.', ',');?>
                            Baht</span>
                           
                            <input type="text" id="funding_amount_left" class="hidden" name="funding_amount_left" value="<?php print intval($node->field_funding_amount_left['und'][0]['value']);?>"> 
                            <input type="button" id="update_funding_amount_left" class="hidden" value="update" data-type="funding_amount_left" data-nid="<?php print $nid;?>">
                        </div>
                                     
                    </div>
                    <div class="col-xs-2 funding--amount--status">
                        <div class="txt__16">Funding Status</div>
                        <div class="margin__top5">
                            <?php if(isset($user->roles[3])):?>
                            <i class="icon-edit-alt edit_funding_amount_status"></i> 
                            <?php endif;?>
                            
                            <span class="funding_amount_status margin__top10">                   
                            <?php print $node->field_funding_amount_status['und'][0]['value'];?>
                            </span>
                            <select id="funding_amount_status" class="hidden" >
                                <option value="In process" <?php print $node->field_funding_amount_status['und'][0]['value']=="In process"?'selected':'';?> >In process</option>
                                <option value="Done" <?php print $node->field_funding_amount_status['und'][0]['value']=="Done"?'selected':'';?>>Done</option>
                            </select>
                           
                            <input type="button" id="update_funding_amount_status" class="hidden" value="update" data-type="funding_amount_status" data-nid="<?php print $nid;?>">
                        </div> 
                                  
                    </div>
               
                </div>
                
            
            <?php 
            // print "<pre>";
            // print_r($fund);
            // print "</pre>";
            
            ?>
         
            <?php   
             
            $campaign = node_load($nid);
            if(!empty($campaign->field_project_join['und'])) :
            foreach ($campaign->field_project_join['und'] as $key => $item) {

                $data = field_collection_item_load($item['value']); 

                $project_node = $data->field_join_project['und'][0]['node'];

                $u = user_load($project_node->uid);    
                $fund = $data->field_fund_project['und'][0]['value'];
                // print "<pre>";
                // print_r($project_node);              
                // print "</pre>";
                if($fund != 0 && !empty($fund) && !empty($project_node)){
              
            ?>
              
                <div class="block--content--fund col-xs-6 fund--tab">
                   
                    <div class="col-xs-8 pad0">
                        <div class="col-xs-5 pad0">
                        <div class="thumb">
                        <a href="/project/<?php echo $project_node->nid;?>">
                    <?php if($project_node->field_project_image['und'][0]['uri']!=""):?>
                       <img src="<?php print image_style_url('large',$project_node->field_project_image['und'][0]['uri']);?>">
                       <?php else:?>
                       <img src="/sites/all/themes/changemakers/images/project1.jpg">
                    <?php endif;?>
                        </a>
                        </div>
                        
                    <?php $check_title =iconv_substr(strip_tags($project_node->title),35,37,"utf-8"); 
                    if($check_title!=""){
                        $title = iconv_substr(strip_tags($project_node->title),0,35,"utf-8")."...";
                    }else{
                        $title = iconv_substr(strip_tags($project_node->title),0,35,"utf-8");
                    }

                    ?>
                    </div>
                    <div class="col-xs-7 margin__top10 pad__left0">
                        <a href="/project/<?php echo $project_node->nid;?>">
                            <h4 class="headline__thaisan h4--linelimit__1"><?php print $title; ?></h4>
                        </a>
                        <!--<div class="tag--linelimit__1 detail__medium margin__top0">
                          
                            <a href="/user/1750" class="detail__mid link__blue"></a>-->
                            <?php // print changemaker_check_icon_page($u->uid)." ".changemakers_get_contact($u->uid); ?>  
                            
            
                          <!--  <br>
                            
                             <div class="detail__small"><span class=" icon-clock"></span></div> 

                        </div>-->
             
                      
                      
                    </div> 
                    </div>
                    <div class=" col-xs-4 funding--amount">
                      <div class="margin__top10">funding amount</div>
                      
                        <div class="margin__top20">
                      
                      <span class="funding_amount_project">
                      <?php  print number_format($fund, 2, '.', ',');?>
                      
                      <input type="text" id="funding_amount_project" class="hidden" name="funding_amount_project" value="<?php print number_format($fund, 2, '.', ',');?>"></span>
                      
                        </div> 
                    </div>
              
                 
                </div>      
              
               
             
           <?php }
                }
           endif; ?>
         
                                      
            
         </div>

      

           <?php /*}else{ ?>
              <p>ไม่มีข้อมูล</p>
           <?php } */?>
        </div><!--End of Fund-->

</div><!--End of margin top header-->
<?php 
// else:
// 	print "you are not authorized to access this page.";
// endif; 
?>
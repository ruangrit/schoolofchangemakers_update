<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
//user_cookie_save(array('key'=>12));
//unset($_COOKIE['Drupal_visitor_key']);


$counter_project = strip_tags($fields['counter']->content);

if(!empty($_SESSION['cnt_p'])){
    $_SESSION['cnt_p']=1;
}
if($counter_project%9==0){
    $_SESSION['cnt_p']=1;

}else{
    $_SESSION['cnt_p'] = $counter_project;
}
$box =  ($counter_project%9); 

//print $page_cookie;


//$problem = explode("All,", ));
$target  = str_replace("All,","",strip_tags($fields['field_project_target']->content));
$target  = str_replace(", อื่น ๆ (ระบุ)","",$target);

$problem = str_replace("All,","",strip_tags($fields['field_problem_topic']->content));
$problem = str_replace(", อื่น ๆ (ระบุ)","",$problem);
// print "<pre>"; 
// print_r($problem);
// print "</pre>";

//print $fields['forums']->content;


// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// print_r($node);

$node = node_load($row->nid);
$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$user = user_load($row->_field_data['nid']['entity']->uid);
//global $user;


$body = isset($row->_field_data['nid']['entity']->body['und'][0]['value'])?$row->_field_data['nid']['entity']->body['und'][0]['value']:"";

//print $user->picture;
//print $fields['counter']->content;





?>
<style type="text/css">
.project_border{
	border-color: black;
	border-style: solid;
	height: 500px;
	margin-top: 10px;
}
.project_image{
	width: 344px;
}
.project_title{
	background: #EFECEC;
    height: 50px;
}
.project_title_padding{
	padding: 10px;
}
.project_image_padding{
	padding-top: 15px;
}
</style>

<div  class="project--page" >
<?php if( $box == 1){?>

<?php 


/*if($counter_project== 1 || $counter_project== 10 || $counter_project== 19 || $counter_project== 28 
      || $counter_project== 37 || $counter_project== 46 || $counter_project== 55 || $counter_project== 64 
      || $counter_project== 73){ */

    ?>
<div  class="page1-4--hilight1--wrap" >
	<div  class="page1-4--hilight1" >
        
        <div class="thumb">
            <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
            <?php print $fields['field_project_image']->content; ?>
            <?php }else{ ?>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
            </a>
            <?php } ?>
			
		</div>
        
        
        <div class="detail__title  d__inline-block" >
            <div class="h2--linelimit__2 "><h2 class="headline__thaisan"><?php print $fields['title']->content; ?></h2></div>
        </div>
        
        <a href="<?php print strip_tags($fields['path']->content); ?>">
            
		<div class="field--content">
            <div class="detail__medium d__inline-block">
		
                <div class="tag--linelimit__1 "><i class="icon-clock"></i> 
                    <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?></div>
			
                <div class="tag--linelimit__1 ">
                    <?php print changemaker_check_icon_page($user->uid); ?> 
                    <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?></div>
                
            
                <?php if(!empty($problem)){ ?>
                <div class="tag--linelimit__1 ">
                <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                </div> 
                <?php } ?>
            
            
            
                <?php if(!empty($target)){ ?>
                <div class="tag--linelimit__1"> 
                <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                </div>
                <?php } ?>
            
                
           </div>
            
            
            <!--
            
                <div class="moredetail__over__content  margin__top5">
                    <span class="detail--linelimit__4">
                <?php 
                    // print '<pre>';
                    // print_r($row->nid);
                    // print '</pre>';
                print $fields['body']->content; ?>
                    </span>
            </div>
            
            
            -->
            
        </div>
        </a>
</div>
</div>
            
<?php } ?>
<?php if($box == 2){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
            <?php print $fields['field_project_image']->content; ?>
            <?php }else{ ?>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
            </a>
            <?php } ?>
        </div>
        
        <div  id="moredetail__over"  class="field--content boxover">
            
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2">
                        <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                    </div>
                </div>
            
                
            <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="detail__medium d__inline-block">
            
                
                <div id="moredetail__hide">
                <div class="tag--linelimit__1 ">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                </div>
                <div class="tag--linelimit__1 ">
                <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                </div>
                    
                
                    <?php if(!empty($problem)){ ?>
                    <div class="tag--linelimit__1 ">
                    <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                    </div>
                    <?php } ?>
                
                
                
                    <?php if(!empty($target)){ ?>
                    <div class="tag--linelimit__1"> 
                    <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                    </div>
                    <?php } ?>
                
                    
                    
                    <div class="moredetail__over__content"><div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                    </div>
                </div>
                </div>
            </a>
        </div> 
    </div>  
</div> 

<?php }else if($box ==3 ){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
            <?php print $fields['field_project_image']->content; ?>
            <?php }else{ ?>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
            </a>
            <?php } ?>
        </div>
        
        <div  id="moredetail__over"  class="field--content boxover">
            
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2">
                        <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                    </div>
                </div>
            
                
            <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="detail__medium d__inline-block">
            
                
                <div id="moredetail__hide">
                <div class="tag--linelimit__1 ">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                </div>
                <div class="tag--linelimit__1 ">
                <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                </div>
                    
                
                    <?php if(!empty($problem)){ ?>
                    <div class="tag--linelimit__1 ">
                    <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                    </div>
                    <?php } ?>
                
                
                
                    <?php if(!empty($target)){ ?>
                    <div class="tag--linelimit__1"> 
                    <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                    </div>
                    <?php } ?>
                
                    
                    
                    <div class="moredetail__over__content"><div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div></div>
                
                </div>
                </div>
            </a>
        </div> 
    </div>  
</div> 

<?php } ?>


<?php if($box == 4){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
            <?php print $fields['field_project_image']->content; ?>
            <?php }else{ ?>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
            </a>
            <?php } ?>
        </div>
        
        <div  id="moredetail__over"  class="field--content boxover">
            
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2">
                        <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                    </div>
                </div>
            
                
            <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="detail__medium d__inline-block">
            
                
                <div id="moredetail__hide">
                <div class="tag--linelimit__1 ">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                </div>
                <div class="tag--linelimit__1 ">
                <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                </div>
                    
                
                    <?php if(!empty($problem)){ ?>
                    <div class="tag--linelimit__1 ">
                    <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                    </div>
                    <?php } ?>
                
                
                
                    <?php if(!empty($target)){ ?>
                    <div class="tag--linelimit__1"> 
                    <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                    </div>
                    <?php } ?>
                
                    
                    
                    <div class="moredetail__over__content"><div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div></div>
                
                </div>
                </div>
            </a>
        </div> 
    </div>  
</div> 
<?php }else if($box == 5){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
            <?php print $fields['field_project_image']->content; ?>
            <?php }else{ ?>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
            </a>
            <?php } ?>
        </div>
        
        <div  id="moredetail__over"  class="field--content boxover">
            
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2">
                        <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                    </div>
                </div>
            
                
            <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="detail__medium d__inline-block">
            
                
                <div id="moredetail__hide">
                <div class="tag--linelimit__1 ">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                </div>
                <div class="tag--linelimit__1 ">
                <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                </div>
                    
                
                    <?php if(!empty($problem)){ ?>
                    <div class="tag--linelimit__1 ">
                    <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                    </div>
                    <?php } ?>
                
                
                
                    <?php if(!empty($target)){ ?>
                    <div class="tag--linelimit__1"> 
                    <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                    </div>
                    <?php } ?>
                
                    
                    
                    <div class="moredetail__over__content"><div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div></div>
                
                </div>
                </div>
            </a>
        </div> 
    </div>  
</div> 
    <div class="clear row"></div>
<?php } ?>    
<?php if($box == 6){ ?>
    <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <div class="thumb">
                <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
                <?php print $fields['field_project_image']->content; ?>
                <?php }else{ ?>
                <a href="<?php print strip_tags($fields['path']->content); ?>">
                <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
                </a>
                <?php } ?>
            </div>
            <div  id="moredetail__over"  class="field--content boxover">
                
                <!--<div class="knowledge-title" >-->
                    <div class="detail__small d__inline-block">
                    
                         <h4 class="headline__thaisan "><span class="h4--linelimit__2"><?php print $fields['title']->content; ?></span></h4>
                        
                        
                    <a href="<?php print strip_tags($fields['path']->content); ?>">   
                        
                    <div class="tag--linelimit__1 link__gray">
                        <span class="icon-clock txt__gray2"></span> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                    </div>
                        
                        <?php print isset($fields['field_knowledge_type']->content)?$fields['field_knowledge_type']->content:"";?> 
                       
                        <div class="tag--linelimit__1 link__gray">
                            <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                        </div>
                    
                    
                    
                    
                    
                    
                    <div id="moredetail__hide">
                    
                    
                    <?php if(!empty($problem)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                        </div>
                    <?php } ?>
                    
                    
                    
                    <?php if(!empty($target)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                        </div>
                    <?php } ?>
                        
                    <div class="moredetail__over__content detail__medium">
                        <div class="detail--linelimit__2">
                        <?php print $fields['body']->content; ?>
                        </div>
                        </div>
                        
                        
                           
                        
                        
                       
                    </div>
                <!--    </div>-->
                </a>
            </div>
        </div>
    </div>
    </div>  
<?php }else if($box == 7){ ?>
    <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <div class="thumb">
                <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
                <?php print $fields['field_project_image']->content; ?>
                <?php }else{ ?>
                <a href="<?php print strip_tags($fields['path']->content); ?>">
                <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
                </a>
                <?php } ?>
            </div>
            <div  id="moredetail__over"  class="field--content boxover">
                
                <!--<div class="knowledge-title" >-->
                    <div class="detail__small d__inline-block">
                    
                         <h4 class="headline__thaisan "><span class="h4--linelimit__2"><?php print $fields['title']->content; ?></span></h4>
                        
                        
                    <a href="<?php print strip_tags($fields['path']->content); ?>">   
                        
                    <div class="tag--linelimit__1 link__gray">
                        <span class="icon-clock txt__gray2"></span> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                    </div>
                        
                        <?php print isset($fields['field_knowledge_type']->content)?$fields['field_knowledge_type']->content:"";?> 
                       
                        <div class="tag--linelimit__1 link__gray">
                            <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                        </div>
                    
                    
                    
                    
                    
                    
                    <div id="moredetail__hide">
                    
                    
                    <?php if(!empty($problem)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                        </div>
                    <?php } ?>
                    
                    
                    
                    <?php if(!empty($target)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                        </div>
                    <?php } ?>
                        
                    <div class="moredetail__over__content detail__medium">
                        <div class="detail--linelimit__2">
                            <?php print $fields['body']->content; ?>
                        </div>
                        </div>
                        
                        
                           
                        
                        
                       
                    </div>
                <!--    </div>-->
                </a>
            </div>
        </div>
    </div>
    </div>  
<?php }else if($box == 8){ ?>
    <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <div class="thumb">
                <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
                <?php print $fields['field_project_image']->content; ?>
                <?php }else{ ?>
                <a href="<?php print strip_tags($fields['path']->content); ?>">
                <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
                </a>
                <?php } ?>
            </div>
            <div  id="moredetail__over"  class="field--content boxover">
                
                <!--<div class="knowledge-title" >-->
                    <div class="detail__small d__inline-block">
                    
                         <h4 class="headline__thaisan "><span class="h4--linelimit__2"><?php print $fields['title']->content; ?></span></h4>
                        
                        
                    <a href="<?php print strip_tags($fields['path']->content); ?>">   
                        
                    <div class="tag--linelimit__1 link__gray">
                        <span class="icon-clock txt__gray2"></span> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                    </div>
                        
                        <?php print isset($fields['field_knowledge_type']->content)?$fields['field_knowledge_type']->content:"";?> 
                       
                        <div class="tag--linelimit__1 link__gray">
                            <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                        </div>
                    
                    
                    
                    
                    
                    
                    <div id="moredetail__hide">
                    
                    
                    <?php if(!empty($problem)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                        </div>
                    <?php } ?>
                    
                    
                    
                    <?php if(!empty($target)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                        </div>
                    <?php } ?>
                        
                    <div class="moredetail__over__content detail__medium">
                        <div class="detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                        </div>
                        
                        
                           
                        
                        
                       
                    </div>
                <!--    </div>-->
                </a>
            </div>
        </div>
    </div>
    </div>  
<?php }else if($box == 0){ ?>
    <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <div class="thumb">
                <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
                <?php print $fields['field_project_image']->content; ?>
                <?php }else{ ?>
                <a href="<?php print strip_tags($fields['path']->content); ?>">
                <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
                </a>
                <?php } ?>
            </div>
            <div  id="moredetail__over"  class="field--content boxover">
                
                <!--<div class="knowledge-title" >-->
                    <div class="detail__small d__inline-block">
                    
                         <h4 class="headline__thaisan "><span class="h4--linelimit__2"><?php print $fields['title']->content; ?></span></h4>
                        
                        
                    <a href="<?php print strip_tags($fields['path']->content); ?>">   
                        
                    <div class="tag--linelimit__1 link__gray">
                        <span class="icon-clock txt__gray2"></span> <?php print timeAgo(strip_tags($fields['changed']->content));//print $d." ".$month[$m]." ".$y;?>
                    </div>
                        
                        <?php print isset($fields['field_knowledge_type']->content)?$fields['field_knowledge_type']->content:"";?> 
                       
                        <div class="tag--linelimit__1 link__gray">
                            <?php print changemaker_check_icon_page($user->uid); ?> <?php print changemakers_get_contact($user->uid); ?>
                        </div>
                    
                    
                    
                    
                    
                    
                    <div id="moredetail__hide">
                    
                    
                    <?php if(!empty($problem)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-tag txt__gray2"></span> <?php print $problem; ?>
                        </div>
                    <?php } ?>
                    
                    
                    
                    <?php if(!empty($target)){ ?>
                        <div class="tag--linelimit__1 ">
                        <span class="icon-target txt__gray2"></span> <?php print $target; ?>
                        </div>
                    <?php } ?>
                        
                    <div class="moredetail__over__content detail__medium">
                        <div class="detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                        </div>
                        
                        
                           
                        
                        
                       
                    </div>
                <!--    </div>-->
                </a>
            </div>
        </div>
    </div>
    </div>  
<?php } ?>
    
   
 
    
    
</div>
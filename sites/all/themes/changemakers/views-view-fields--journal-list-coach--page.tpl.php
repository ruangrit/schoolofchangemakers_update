<?php 

//user_cookie_save(array('key'=>12));
//unset($_COOKIE['Drupal_visitor_key']);

session_start();
$counter_journal = strip_tags($fields['counter']->content);
// if($counter_journal == 10){
//     $counter_journal = 1;
// }

$problem = explode("All,", strip_tags($fields['field_journal_problem']->content));
$target = explode("All,", strip_tags($fields['field_journal_target']->content));
$target =  str_replace("อื่น ๆ (ระบุ)",strip_tags($fields['field_target_other']->content) , $target);

if($row->nid){
    if(isset($_SESSION['page_project'])){
        if($_SESSION['page_project'] > 9){
            $_SESSION['page_project'] = 1;
        }
        else{
            if($_SESSION['page_project'] == 1){
                $_SESSION['page_project'] = 2;
            }
            else{
                $_SESSION['page_project'] = $_SESSION['page_project']+1;
            }
            
        }
    }
    else{
        $_SESSION['page_project'] = 0;
    }
    
    // if($_COOKIE['Drupal_visitor_key'] == 9){
    //     unset($_COOKIE['Drupal_visitor_key']);
    //     user_cookie_save(array('key'=>1));
    // }
    // else{
    //     $x = $_COOKIE['Drupal_visitor_key']+1;
    //     user_cookie_save(array('key'=>$x));
    // }
    

}

$page_cookie = $_SESSION['page_project'];

//print $page_cookie;
// print "<pre>"; 
// print_r($row);
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
// print '<pre>';
// print_r($node);
// print '</pre>';

$body = $row->_field_data['nid']['entity']->body['und'][0]['value'];

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


<?php 
if(!empty($_SESSION['cnt_j'])){
    $_SESSION['cnt_j']=1;
}
if($counter_journal%9==0){
    $_SESSION['cnt_j']=1;

}else{
    $_SESSION['cnt_j'] = $counter_journal;
}
$box =  ($counter_journal%9); 
?>
<div  class="journal--page" >
<?php if($box==1){?>
<div  class="page1-4--hilight1--wrap" >
    <div  class="page1-4--hilight1" >
        
       <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
            
        </div>
        </a>
        <a href="<?php print strip_tags($fields['path']->content); ?>">
      
        <div class="detail__title  d__inline-block" >
            <div class="h2--linelimit__1 "><h2 class="headline__thaisan"><?php print $fields['title']->content; ?></h2></div>
        </div>
        
        <div class="field--content">
            <div class="detail__medium d__inline-block">
        
            <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?><br/>
           
                <div class="tag--linelimit__1"><i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?></div>
            <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
            <div class="tag--linelimit__1 "><span class="icon-tag "></span> <?php print $problem[0]; print $problem[1]; ?>
            </div>
            <?php endif; ?>
            <?php if(!empty($target[0]) || !empty($target[1])): ?>
            <div class="tag--linelimit__1 "> 
                <span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?>
            </div>
            <?php endif; ?>
                
           </div>
            
            
            
           
            <div class="moredetail__over__content detail__medium">
                <span class=" detail--linelimit__2"><?php print $fields['body']->content; ?></span>
            </div>
            
            
            
        </div>
        </a>
</div>
</div>
            
<?php } ?>
<?php if($box==2){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
         <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
        </div>
        </a>
       
        <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div  id="moredetail__over"  class="field--content boxover">
            <div class=" d__inline-block">
                <div class=" h4--linelimit__2">
                    <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                </div>
            </div>
        
            
        
            <div class="detail__small d__inline-block">
        
            
            <div id="moredetail__hide">
                <div class="tag--linelimit__1">
                <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                </div>
            
                <div class="tag--linelimit__1">
                <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                </div>
                
            <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                <div class="tag--linelimit__1 "><span class="icon-tag txt__gray2"></span> <?php print $problem[0]; print $problem[1]; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($target[0]) || !empty($target[1])): ?>
            <div class="tag--linelimit__1 "> 
                <span class="icon-target txt__gray2"></span> <?php print $target[0]; print $target[1]; ?>
            </div>
            <?php endif; ?>
                
                
                <div class="moredetail__over__content detail__medium detail--linelimit__2"><?php print $fields['body']->content; ?></div>
            
            </div>
            </div>
        </div>
         </a> 
    </div>  
</div> 

<?php }else if($box==3){ ?>

<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
         <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
        </div>
        </a>
       
        <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div  id="moredetail__over"  class="field--content boxover">
            <div class=" d__inline-block">
                <div class=" h4--linelimit__2">
                    <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                </div>
            </div>
        
            
        
            <div class="detail__small d__inline-block">
        
            
            <div id="moredetail__hide">
                <div class="tag--linelimit__1">
                <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                </div>
            
                <div class="tag--linelimit__1">
                <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                </div>
                
            <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                <div class="tag--linelimit__1 "><span class="icon-tag txt__gray2"></span> <?php print $problem[0]; print $problem[1]; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($target[0]) || !empty($target[1])): ?>
            <div class="tag--linelimit__1 "> 
                <span class="icon-target txt__gray2"></span> <?php print $target[0]; print $target[1]; ?>
            </div>
            <?php endif; ?>
                
                
                <div class="moredetail__over__content detail__medium detail--linelimit__2"><?php print $fields['body']->content; ?></div>
        
            </div>
            </div>
        </div>
         </a> 
    </div>  
</div> 
<?php } ?>


<?php if($box==4){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
         <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
        </div>
        </a>
       
        <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div  id="moredetail__over"  class="field--content boxover">
            <div class="detail__small d__inline-block">
                <div class=" h4--linelimit__2">
                    <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                </div>
            </div>
        
            
        
            <div class="detail__small d__inline-block">
        
            
            <div id="moredetail__hide">
                <div class="tag--linelimit__1">
                <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                </div>
            
                <div class="tag--linelimit__1">
                <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                </div>
                
            <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                <div class="tag--linelimit__1 "><span class="icon-tag txt__gray2"></span> <?php print $problem[0]; print $problem[1]; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($target[0]) || !empty($target[1])): ?>
            <div class="tag--linelimit__1 "> 
                <span class="icon-target txt__gray2"></span> <?php print $target[0]; print $target[1]; ?>
            </div>
            <?php endif; ?>
                
                
                <div class="moredetail__over__content detail__medium detail--linelimit__2"><?php print $fields['body']->content; ?></div>
            
            </div>
            </div>
        </div>
         </a> 
    </div>  
</div> 
<?php }else if($box==5){ ?>
<div  class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
         <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
        </div>
        </a>
       
        <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div  id="moredetail__over"  class="field--content boxover">
            <div class=" d__inline-block">
                <div class=" h4--linelimit__2">
                    <h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4>
                </div>
            </div>
        
            
        
            <div class="detail__small d__inline-block">
        
            
            <div id="moredetail__hide">
                <div class="tag--linelimit__1">
                <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                </div>
            
                <div class="tag--linelimit__1">
                <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                </div>
                
            <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                <div class="tag--linelimit__1 "><span class="icon-tag txt__gray2"></span> <?php print $problem[0]; print $problem[1]; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($target[0]) || !empty($target[1])): ?>
            <div class="tag--linelimit__1 "> 
                <span class="icon-target txt__gray2"></span> <?php print $target[0]; print $target[1]; ?>
            </div>
            <?php endif; ?>
                
                <!--
                <div class="moredetail__over__content detail__medium detail--linelimit__3"><?php print $fields['body']->content; ?></div>
            -->
            </div>
            </div>
        </div>
         </a> 
    </div>  
</div> 
<?php } ?>    
<?php if($box==6){ ?>
    <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
            </div>
            </a>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div  id="moredetail__over"  class="field--content boxover">
            <!--<div class="knowledge-title" >-->
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4></div>
                

                <?php print $fields['field_knowledge_type']->content;?> 
                   <div class="tag--linelimit__1 margin__top5 link__gray">
                    <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                    </div>
                    
                    <div class="tag--linelimit__1 link__gray">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                    </div>
                
                
                <div id="moredetail__hide">
                    
                
                <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                    <div class="tag--linelimit__1 ">
                        <span class="icon-tag"></span> <?php print $problem[0]; print $problem[1]; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($target[0]) || !empty($target[1])): ?>
                    <div class="tag--linelimit__1 "> 
                    <span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?>
                    </div>
                <?php endif; ?>
                
                <div class="moredetail__over__content detail__medium">
                    <div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                    </div>

                   
                </div>
            <!--    </div>-->
            </div>
        </div>
        </a>
    </div>
    </div>
<?php }else if($box==7){ ?>
   <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
            </div>
            </a>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div  id="moredetail__over"  class="field--content boxover">
            <!--<div class="knowledge-title" >-->
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4></div>
                

                <?php print $fields['field_knowledge_type']->content;?> 
                   <div class="tag--linelimit__1 margin__top5 link__gray">
                    <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                    </div>
                    
                    <div class="tag--linelimit__1 link__gray">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                    </div>
                
                
                <div id="moredetail__hide">
                    
                
                <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                    <div class="tag--linelimit__1 ">
                        <span class="icon-tag"></span> <?php print $problem[0]; print $problem[1]; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($target[0]) || !empty($target[1])): ?>
                    <div class="tag--linelimit__1 "> 
                    <span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?>
                    </div>
                <?php endif; ?>
                
                <div class="moredetail__over__content detail__medium ">
                    <div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                    </div>

                   
                </div>
            <!--    </div>-->
            </div>
        </div>
        </a>
    </div>
    </div>
<?php }else if($box==8){ ?>
       <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
            </div>
            </a>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div  id="moredetail__over"  class="field--content boxover">
            <!--<div class="knowledge-title" >-->
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4></div>
                

                <?php print $fields['field_knowledge_type']->content;?> 
                   <div class="tag--linelimit__1 margin__top5  link__gray">
                    <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                    </div>
                    
                    <div class="tag--linelimit__1 link__gray">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                    </div>
                
                
                <div id="moredetail__hide">
                    
                
                <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                    <div class="tag--linelimit__1 ">
                        <span class="icon-tag"></span> <?php print $problem[0]; print $problem[1]; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($target[0]) || !empty($target[1])): ?>
                    <div class="tag--linelimit__1 "> 
                    <span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?>
                    </div>
                <?php endif; ?>
                
                <div class="moredetail__over__content detail__medium">
                    <div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                    </div>

                   
                </div>
            <!--    </div>-->
            </div>
        </div>
        </a>
    </div>
    </div>
<?php }else if($box==0){ ?>
       <div class="col-xs-3 box__pad6" >
    <div  class="page1-4--box" >
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div class="thumb">
            <?php 
            if(empty($node->field_journal_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }else{
                print $fields['field_journal_image']->content; 
            }

            ?>
            </div>
            </a>
            <a href="<?php print strip_tags($fields['path']->content); ?>">
            <div  id="moredetail__over"  class="field--content boxover">
            <!--<div class="knowledge-title" >-->
                <div class="detail__small d__inline-block">
                    <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $fields['title']->content; ?></h4></div>
                

                <?php print $fields['field_knowledge_type']->content;?> 
                   <div class="tag--linelimit__1 margin__top5 link__gray">
                    <i class="icon-profile-verify member--verify"></i> <?php print changemakers_get_contact($user->uid); //$user->field_profile_firstname['und'][0]['value']." ".$user->field_profile_lastname['und'][0]['value']; ?>
                    </div>
                    
                    <div class="tag--linelimit__1 link__gray">
                    <i class="icon-clock"></i> <?php print timeAgo(strip_tags($fields['field_journal_date']->content)); ?>
                    </div>
                
                
                <div id="moredetail__hide">
                    
                
                <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
                    <div class="tag--linelimit__1 ">
                        <span class="icon-tag"></span> <?php print $problem[0]; print $problem[1]; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($target[0]) || !empty($target[1])): ?>
                    <div class="tag--linelimit__1 "> 
                    <span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?>
                    </div>
                <?php endif; ?>
                
                <div class="moredetail__over__content detail__medium ">
                    <div class=" detail--linelimit__2"><?php print $fields['body']->content; ?></div>
                    </div>

                   
                </div>
            <!--    </div>-->
            </div>
        </div>
        </a>
    </div>
    </div>
<?php } ?>
    
   
 
    
    
</div>
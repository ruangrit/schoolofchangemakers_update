<style type="text/css">
    .field-type-number-integer.field-name-field-like-journal.field-widget-number.form-wrapper.form-group{
        display: none;
    }
    .field-type-user-reference.field-name-field-user-like-journal.field-widget-options-select.form-wrapper.form-group{
        display: none;
    }
    .ckeditor_links{
        display: none;
    }
    #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }
</style>

<?php 
global $user;
$problem = array();
$problem_tag = array();
foreach ($node->field_journal_problem['und'] as $key => $value) {
    // print "<pre>";
    // print_r($value);
    // print "</pre>";
    if($value['taxonomy_term']->name=="All"){
        $show_problem_all = 1;
    }else{
        $problem_tag[]  = $value['taxonomy_term']->name;
    }
    
    $problem[] = $value['tid'];
}
$target = array();
$target_tag = array();
foreach ($node->field_journal_target['und'] as $key => $value) {
    // print "<pre>";
    // print_r($value);
    // print "</pre>";
    if($value['taxonomy_term']->name=="All"){
        $show_target_all = 1;
    }elseif($value['tid']==109){
         $target_tag[] = $node->field_target_other['und'][0]['value'];
    }else{
        $target_tag[]   = $value['taxonomy_term']->name;
    }
    
    $target[] = $value['tid'];
}

if($_SERVER['REQUEST_URI']!='/'):

$node = node_load($nid);


$data_user = user_load($node->uid);
// echo "<pre>";
// print_r($user);
$picture = file_load($user->picture);
$user_picture = file_create_url($data_user->picture->uri); 

// $node->field_journal_type['und'][0]['value']
// print "<pre>";
//     print_r($target_tag);
//     print "</pre>";



if($node->field_journal_type['und'][0]['value']==1 && !empty($user->roles[5]) || !empty($user->roles[3])): 
?>



    <div class="col2--viewcontent ">
        <div class="viewcontent--box col-xs-12 bottom__gray">

        <h1 class="headline__thaisan viewcontent--title">
        <?php print $node->title; ?>
        </h1>
            
        
        <div class="sidebar--line "></div>
    
    
        <div class="viewcontent--detail row">
        
           <div class="col-xs-8 detail__medium">
             <div class="tag--linelimit__1">
            <i class="icon-clock"></i> <?php print changemakers_format_date_thai($node->created);?><br/>
               </div>
            <?php if(count($problem_tag)>0): ?>
           <div class="tag--linelimit__1">
            <i class="icon-tag"></i>
                <?php   
                    if($show_problem_all==1){
                    echo "All";
                 
                }else{
                   
                     echo implode(",", $problem_tag);
                }
                ?>
               </div>
    
        <?php endif; ?>
            <?php if(count($target_tag)>0): ?>
           <div class="tag--linelimit__1">
            <i class="icon-target"></i>
                
                <?php   
           
                if($show_target_all==1){
                    echo "All";
                 
                }else{
                    
                     echo implode(",", $target_tag);
                }
               
                ?>
               </div>
            <?php endif; ?>


           </div>
            <div class="col-xs-4 txt__right">
           <!--Social-->
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
            </div>
    
            <!-- <div class="col-xs-5 col-xs-offset-1" style="margin-top:15px;">
                    <div class="row">
                    <div class="socialshare--box">
                    <a target="_blank" href="https://www.facebook.com/AshokaThailand" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
                    
                    <div class="socialshare--total"><span class="txt__bold">365</span><br/>Share</div>
                    </div>
                    
                    
                    <div class="socialshare--box">
                    <a href="#twitter" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
                    
                        <div class="socialshare--total"><span class="txt__bold">365</span><br/>Tweets</div>    
                    </div>
                     
                        
                
                    <div class="socialshare--box">
        			<a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
        			
                        <div class="socialshare--total"><span class="txt__bold">25</span><br/>Share</div>    
                    </div>
                    
                        
        	        </div>
            </div -->
</div>
            
			<div class="col-xs-12 viewcontent--body">
			<div class="block--knowledge--header field-name-field-journal-image">
				
			 <?php 
             $photo = file_create_url($node->field_journal_image['und'][0]['uri']); 
             ?>

             <?php if(!empty($node->field_journal_image['und'][0]['uri'])){ ?>
                   <img class="img-responsive" src="<?php echo $photo; ?>">
                <?php } ?> 
				
			</div>
			<div class="block--knowledge--content">
				<?php print $node->body['und'][0]['value'];?>

			</div>
                
            <?php if(!empty($node->field_journal_document['und'])): ?>
                <?php $file_path = file_create_url($node->field_journal_document['und'][0]['uri']); ?>
                <a href="<?php echo $file_path; ?>" target="_blank"><?php echo $node->field_journal_document['und'][0]['filename']; ?></a>
            <?php endif; ?>
            
            </div>

		</div>
         <?php print render($content['comments']); ?>
	</div>







<div class="col2--sidebar " style="position:relative;">
    <!--<div class="sidesection-bg-out"></div>-->
	<div class="sidebar--wrap  bottom__lightgray" style="margin-top:0; padding-bottom:15px;">
        
		<h3 class="headline__thaisan headline--sidebar__yellow">AUTHOR</h3>
        <div class="sidebar--line"></div>
        
        <div class="author--box--detail">
        <div class="txt__center">
        <div class="sidebar--wrap--display">
         <?php if(empty($data_user->picture)){ ?>
            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
        <?php }else{ ?>
            <img src="<?php echo $user_picture; ?>" class="img-responsive">
        <?php } ?>
		  
        </div>
         <div class=" col-xs-12 margin__top10" style="text-align:left;">
             <div class="row margin__top5">
            <div class="col-xs-3 pad__left0 txt__gray detail__medium__nopad">Post by : </div>
            
             <div class="col-xs-9 pad0"><a href="/user/<?php print $data_user->uid; ?>">
                 <?php print changemakers_get_contact($data_user->uid); //$data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; ?></a></div>
             </div>
        <?php if(!empty($node->field_project_related['und'][0]['nid'])): ?>
         <div class="row margin__top5">
            <div class="col-xs-3 pad__left0  detail__medium__nopad txt__gray">Project : </div>
                    <?php $path_project = drupal_get_path_alias("node/".$node->field_project_related['und'][0]['nid']); ?>
             <div class="col-xs-9 pad0"><a href="/<?php print $path_project; ?>"><?php print $node->field_project_related['und'][0]['node']->title; ?></a></div></div>
                
            
        <?php endif; ?>
             </div>
        <?php 
                if(isset($user->roles[3]) || $user->uid == $node->uid){ ?>

            
            

            <div class="margin__top10 col-xs-12 pad0">
            <div class="wrap--btn col-xs-12 ">
                 <a href="/node/<?php print $nid; ?>/edit?destination=/journal/<?php print $nid; ?>" class="btn btn--submit col-xs-8 col-xs-offset-2 ">แก้ไข Journal</a>
            </div>
            <div class="wrap--btn col-xs-12 ">
                <a href="/node/<?php print $nid; ?>/delete?destination=/journal-list-coach" class="btn btn--default col-xs-8 col-xs-offset-2 ">ลบ Journal</a>
          			
            </div>
            <br>
            </div>
                
             
                        
            <!--
                <div class="margin__topbut15 txt__center">
                 
                        <a href="/node/<?php print $nid; ?>/edit?destination=/journal/<?php print $nid; ?>">
                            <button class="btn btn--submit col-xs-6 "  ><i class=" icon-plus-circled"></i> Edit Journal</button>
                        </a>
                         <a href="/node/<?php print $nid; ?>/delete?destination=/journal/list">
                            <button class="btn btn--submit col-xs-6"  ><i class=" icon-plus-circled"></i> Delete Journal</button>
                        </a>
                </div>
-->
                <?php } ?>
            </div>
    </div>
            
        </div>
           
   
        
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:0px 0;">
            <?php echo views_embed_view('banner_views', $display_id = 'block'); ?>
        </div>
    </div>
     

    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
        <div class="row">
            <h3 class="headline__thaisan headline--sidebar__blue">LATEST JOURNAL BY THIS USER</h3>
            <div class="sidebar--line"></div>
            <?php $my_journal = changemakers_get_my_journal($node->uid); ?>
            <?php foreach ($my_journal as $key => $value) { ?>
                <?php 
                // echo "<pre>";
                // print_r($value);
                // echo "</pre>";
                ?>
                <div class="sidebar--verti--content sidebar--verti--content" >
                    <div class="col-xs-12 border--row">
                    <div class="row">
                    <div class="col-xs-5">
                        <a href="<?php print $value['path']; ?>" >
                        <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                            
                                
                            <img width="50px" src="<?php  print $value['user_picture']; ?> ">
                        </div>
                        </a>
                    </div>
                    <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                  
                    <div class="col-xs-7 row">

                    <a href="<?php print $value['path']; ?>" class="sample--text__small ">
                        <span class="field-content detail--linelimit__2"><?php print $value['title']; ?></span></a>               

                    <div class="detail__small link__gray__a">

                        <div class="detail__small">
                       
                        <span class=" icon-clock "></span> <?php 

                         print $value['date'];

                            ?>   
                            </div>
                    </div>
                            
                    </div>
                    </div>
                    </div>

                </div> 
            <?php } ?>
        </div>
       
    </div>
    <?php $related_journal = changemakers_relate_journal_list($problem,$target,$node->nid); ?>
    <?php if(!empty($related_journal)): ?>
    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
     <div class="row">
                <h3 class="headline__thaisan headline--sidebar__blue">RELATED JOURNAL</h3>
         <div class="sidebar--line"></div>
                <?php foreach ($related_journal as $key => $value) { ?>
                    <?php 
                    $node_load = node_load($value);
                    $user_load = user_load($node_load->uid);
                    $path_journal = drupal_get_path_alias("node/".$value);
                    $user_journal_picture = file_create_url($user_load->picture->uri); 
                    $photo = file_create_url($node_load->field_journal_image['und'][0]['uri']); 
                    // echo "<pre>";
                    // print_r($node_load);
                    // echo "</pre>";
                    ?>
                    <div class="sidebar--verti--content" >
                        <div class="col-xs-12 border--row">
                        <div class="row">
                        <div class="col-xs-5">
                            <a href="/<?php print $path_journal; ?>" >
                            <div class="  field-type-image field-label-hidden sidebar--wrap--img">
                                 <?php if(empty($node_load->field_journal_image['und'][0]['uri'])){ ?>
                                    <img class="img-responsive" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                                <?php }else{ ?>
                                    <img src="<?php echo $photo; ?>" class="img-responsive">
                                <?php } ?>
                            </div>
                            </a>
                        </div>
                        <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                      
                        <div class="col-xs-7 row">

                        <a href="/<?php print $path_journal; ?>" class="sample--text__small detail--linelimit__2">
                            <span class="field-content"><?php print $node_load->title; ?></span></a>               

                        <div class="detail__small link__gray__a">

                            <div class="detail__small">
                           
                            <span class=" icon-clock "></span> 
                            <?php print timeAgo(date("Y-m-d H:i:s",$node_load->created)); ?>
                                </div>
                        </div>
                                
                        </div>
                        </div>
                        </div>

                    </div> 
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(!empty($user->roles[2])){ ?>
        
                <!-- <button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Comment Journal</button> -->

                <?php } ?>
        
</div><!--END Sidebar-->
    
    

<?php elseif($node->field_journal_type['und'][0]['value']==0 || empty($node->field_journal_type['und'][0]['value'])): ?>

    <div class="col2--viewcontent ">
        <div class="viewcontent--box col-xs-12 bottom__gray">

        <h1 class="headline__thaisan viewcontent--title">
        <?php print $node->title; ?>
        </h1>
            
        
        <div class="sidebar--line "></div>
    
    
        <div class="viewcontent--detail row">
        
           <div class="col-xs-8 detail__medium">
            <div class="tag--linelimit__1">
            <i class="icon-clock"></i> <?php print changemakers_format_date_thai($node->created);?><br/>
               </div>
            
          <?php if(count($problem_tag)>0): ?>
           <div class="tag--linelimit__1">
            <i class="icon-tag"></i>
                <?php   
                    if($show_problem_all==1){
                    echo "All";
                 
                }else{
                   
                     echo implode(",", $problem_tag);
                }
                ?>
               </div>
        <?php endif; ?>

               
            <?php if(count($target_tag)>0): ?>
            <div class="tag--linelimit__1">
            <i class="icon-target"></i>
                
                <?php   
           
                if($show_target_all==1){
                    echo "All";
                 
                }else{
                    
                     echo implode(",", $target_tag);
                }
               
                ?>
               </div>
            <?php endif; ?>
            

           </div>
            <div class="col-xs-4 txt__right">
           <!--Social-->
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
            </div>
    
            <!-- <div class="col-xs-5 col-xs-offset-1" style="margin-top:15px;">
                    <div class="row">
                    <div class="socialshare--box">
                    <a target="_blank" href="https://www.facebook.com/AshokaThailand" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
                    
                    <div class="socialshare--total"><span class="txt__bold">365</span><br/>Share</div>
                    </div>
                    
                    
                    <div class="socialshare--box">
                    <a href="#twitter" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
                    
                        <div class="socialshare--total"><span class="txt__bold">365</span><br/>Tweets</div>    
                    </div>
                     
                        
                
                    <div class="socialshare--box">
                    <a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
                    
                        <div class="socialshare--total"><span class="txt__bold">25</span><br/>Share</div>    
                    </div>
                    
                        
                    </div>
            </div -->
</div>
            
            <div class="col-xs-12 viewcontent--body">
            <div class="block--knowledge--header field-name-field-journal-image">
                  <?php $file_path = file_create_url($node->field_journal_image['und'][0]['uri']); ?>
                <?php if(!empty($node->field_journal_image['und'][0]['uri'])){ ?>
                    <img src="<?php print $file_path;?>">
                <?php } ?>                
                
            </div>
            <div class="block--knowledge--content">
                <?php print $node->body['und'][0]['value'];?>

            </div>
            <?php if(!empty($node->field_journal_document['und'])): ?>
                <?php $file_path = file_create_url($node->field_journal_document['und'][0]['uri']); ?>
                <a href="<?php echo $file_path; ?>" target="_blank"><?php echo $node->field_journal_document['und'][0]['filename']; ?></a>
            <?php endif; ?>
       
            </div>

        </div>
         <?php print render($content['comments']); ?>
    </div>







<div class="col2--sidebar " style="position:relative;">
    <!--<div class="sidesection-bg-out"></div>-->
    
    <div class="sidebar--wrap  bottom__lightgray" style="margin-top:0; padding-bottom:15px;">
        
        <h3 class="headline__thaisan headline--sidebar__yellow">AUTHOR</h3>
        <div class="sidebar--line"></div>
            
        <div class="author--box--detail">
        <div class="sidebar--wrap--display">
         <?php if(empty($data_user->picture)){ ?>
            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
        <?php }else{ ?>
            <img src="<?php echo $user_picture; ?>" class="img-responsive">
        <?php } ?>
          
        </div>
         <div  class="margin__top20 row" style="text-align:left;">
            <div class="col-xs-4 txt__gray detail__medium__nopad">Posted by : </div>
             <div class="col-xs-8">
           <a href="/user/<?php print $data_user->uid; ?>"><?php print changemakers_get_contact($data_user->uid); //$data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; ?></a>
             </div>
        <?php if(!empty($node->field_project_related['und'][0]['nid'])): ?>
         <div class="margin__top5 col-xs-12 pad0">
                    <div class="col-xs-4 txt__gray detail__medium__nopad">Project : </div>
             <div class="col-xs-8">
                    <?php $path_project = drupal_get_path_alias("node/".$node->field_project_related['und'][0]['nid']); ?>
                   <a href="/<?php print $path_project; ?>"><?php print $node->field_project_related['und'][0]['node']->title; ?></a>
             </div>
                </div>
            
        <?php endif; ?>
            </div>
             <?php 
        if(isset($user->roles[3]) || $user->uid == $node->uid){ ?>
             <div class="margin__top10 col-xs-12 pad0">
                <div class="wrap--btn col-xs-12 ">
            <a href="/node/<?php print $nid; ?>/edit?destination=/journal/<?php print $nid; ?>">
                <button class="btn btn--submit col-xs-8 col-xs-offset-2 ">แก้ไข Journal</button>
            </a>
                 </div>
                <div class="wrap--btn col-xs-12 ">
             <a href="/node/<?php print $nid; ?>/delete?destination=/journal/list">
                <button class="btn btn--default col-xs-8 col-xs-offset-2 " >ลบ Journal</button>
            </a>
                 </div>
                 <br>
            </div>
            
            
        <?php } ?>


            
        </div>
           
    </div>
        
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:0px 0;">
            <?php echo views_embed_view('banner_views', $display_id = 'block'); ?>
        </div>
    </div>
     

    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
        <div class="row">
            <h3 class="headline__thaisan headline--sidebar__blue">LATEST JOURNAL BY THIS USER</h3>
            <div class="sidebar--line"></div>
            <?php $my_journal = changemakers_get_my_journal($node->uid); ?>
            <?php foreach ($my_journal as $key => $value) { ?>
                <?php 
                // echo "<pre>";
                // print_r($value);
                // echo "</pre>";
                ?>
                <div class="sidebar--verti--content" >
                    <div class="col-xs-12 border--row">
                    <div class="row">
                    <div class="col-xs-5">
                        <a href="<?php print $value['path']; ?>" >
                        <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                            
                                
                            <img width="50px" src="<?php  print $value['user_picture']; ?> ">
                        </div>
                        </a>
                    </div>
                    <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                  
                    <div class="col-xs-7 row">

                    <a href="<?php print $value['path']; ?>" class="sample--text__small">
                        <div class="field-content detail--linelimit__2"><?php print $value['title']; ?></div></a>               

                    <div class="detail__small link__gray__a">

                        <div class="detail__small">
                       
                        <i class=" icon-clock "></i> <?php 

                         print $value['date'];

                            ?>
                            </div>
                    </div>


                            
                    </div>
                    </div>
                    </div>

                </div> 
            <?php } ?>
        </div>
       
    </div>
    <?php $related_journal = changemakers_relate_journal_list($problem,$target,$node->nid); ?>
    <?php if(!empty($related_journal)): ?>
    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
     <div class="row">
                <h3 class="headline__thaisan headline--sidebar__blue">RELATED JOURNAL</h3>
                <div class="sidebar--line"></div>
                <?php foreach ($related_journal as $key => $value) { ?>
                    <?php 
                    $node_load = node_load($value);
                    $user_load = user_load($node_load->uid);
                    $path_journal = drupal_get_path_alias("node/".$value);
                    $user_journal_picture = file_create_url($user_load->picture->uri); 
                     $photo = file_create_url($node_load->field_journal_image['und'][0]['uri']); 
                    // echo "<pre>";
                    // print_r($node_load);
                    // echo "</pre>";
                    ?>
                    <div class="sidebar--verti--content" >
                        <div class="col-xs-12 border--row">
                        <div class="row">
                        <div class="col-xs-5">
                            <a href="/<?php print $path_journal; ?>" >
                            <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                                 <?php if(empty($photo)){ ?>
                                    <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                                <?php }else{ ?>
                                    <img src="<?php echo $photo; ?>" class="img-responsive">
                                <?php } ?>
                            </div>
                            </a>
                        </div>
                        <!-- <img width="150" height="150" src="/sites/default/files/"> -->
                      
                        <div class="col-xs-7 row">

                        <a href="/<?php print $path_journal; ?>" class="sample--text__small detail--linelimit__2">
                            <span class="field-content"><?php print $node_load->title; ?></span></a>               

                        <div class="detail__small link__gray__a">

                            <div class="detail__small">
                           
                            <span class=" icon-clock "></span> 
                            <?php print timeAgo(date("Y-m-d H:i:s",$node_load->created)); ?>
                                </div>
                        </div>
                                
                        </div>
                        </div>
                        </div>

                    </div> 
                <?php } ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(!empty($user->roles[2])){ ?>
        
                <!-- <button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Comment Journal</button> -->

                <?php } ?>
        
</div><!--END Sidebar-->
    
    

<?php else: ?>
    You are not authorized to access this page.
<?php endif; ?>
<?php endif;?>

<script type="text/javascript">

(function($) {
    $(document).ready(function(){
       // $('.comment-form').hide();

        

        
        $( "#btn_show_comment" ).click(function() {
          $('.comment-form').show();
        });
        });
}(jQuery));
</script>
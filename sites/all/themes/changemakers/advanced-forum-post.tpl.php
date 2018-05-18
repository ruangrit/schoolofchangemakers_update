<style type="text/css">
    #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }
</style>
<?php global $user; ?>
<?php $user_post = user_load($node->uid); ?>
<?php $user_picture = file_create_url($user_post->picture->uri); 
$post_access =  changemakers_check_view_access_community($node->nid,$node->taxonomy_forums['und'][0]['tid']);
    // echo "<pre>";
    // print_r($user_post);

?>
 <!-- <pre> -->
 <?php
 $interests= array();
if(!empty($user_post->field_profile_problem_interest['und'])){
    foreach ($user_post->field_profile_problem_interest['und'] as $key => $value) {
    $taxomy_load = taxonomy_term_load($value['tid']);
    $interests[] = $taxomy_load->name;
    // echo "<pre>";
    // print_r($node);

    }
}

// print "<pre>";
// print_r($node);
// print "</pre>";


// if(!empty($user_post->roles[5]) && !empty($user->roles[5]) || !empty($user_post->roles[5]) && !empty($user->roles[3]) || empty($user_post->roles[5]) && empty($user->roles[5])){
if($post_access==1){


$alias = drupal_get_path_alias('node/'.$node->field_community_project['und'][0]['node']->nid);

$interests_name = implode(",", $interests);
?>

<?php //print_r($user); ?>

<div class="col-xs-12 pad0">

	<div class="col2--viewcontent ">

		<div class="viewcontent--box col-xs-12 bottom__gray2">

		 <!-- Print Title -->

			 <h1 class="headline__thaisan viewcontent--title">
            <?php print $node->title; ?>
            </h1>

            
        <div class="sidebar--line "></div>
            
		 <!-- End Print Title	 -->
        <?php $type = $node->field_community_forum_topic_type['und'][0]['taxonomy_term'];
        // print "<pre>";
        // print_r($type->name);
        // print "</pre>";


         ?>
            
        <div class="viewcontent--detail">
            <div class="row">
            <div class="col-xs-7">
                <?php 


                    if($type->name == "Offer")
                    {
                        ?><div class="type-offer-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Need")
                    {
                        ?><div class="type-need-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Announcement")
                    {
                        ?><div class="type-announcement-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Idea")
                    {
                        ?><div class="type-idea-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Q")
                    {
                        ?><div class="type-qa-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Others")
                    {
                        ?><div class="type-qa-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    else if($type->name == "Coach Record")
                    {
                        ?><div class="type-qa-community type-topicsview"><?php print $type->name; ?></div> <?php
                    }
                    

                ?>
                <!-- <div class="type-need-community ">
                    <?php //print $node->field_community_forum_topic_type['und']['0']['taxonomy_term']->name; ?>
                </div> -->
                <?php if(!empty($node->field_community_project['und']['0']['node']->title)){ ?>
                <span class=" detail__medium txt__gray">For Project 
                    <a href="/<?php print $alias; ?>"> <?php echo $node->field_community_project['und']['0']['node']->title; ?></a>
                </span> <br>
                <?php } ?>

                <div class="detail__medium">
                    <i class="icon-clock"></i> <?php print changemakers_format_date_thai_short($node->created); ?>
                </div>

                 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>

            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            </div>
            
            <div class="col-xs-5 txt__right" style="margin-top:15px;">
                <div class="addthis_sharing_toolbox"></div>
            </div>
            </div>

            
        </div>    
        <div class="col-xs-12 viewcontent--community-image">
        <?php 
        

        if(!empty($node->field_commuity_image['und'][0]['filename'])):?>
            <img src="<?php echo image_style_url('large',$node->field_commuity_image['und'][0]['uri']);?>" />
        <?php elseif($type->name=="Need"):?>
            <img src="/sites/all/themes/changemakers/images/default_need.jpg" />
        <?php elseif($type->name=="Others"):?>
            <img src="/sites/all/themes/changemakers/images/default_other.jpg" />
        <?php elseif($type->name=="Coach Record"):?>
            <img src="/sites/all/themes/changemakers/images/default_coach_record.jpg" />
        <?php elseif($type->name=="Offer"):?>
            <img src="/sites/all/themes/changemakers/images/default_offer.jpg" />
        <?php elseif($type->name=="Announcement"):?>
            <img src="/sites/all/themes/changemakers/images/default_announcement.jpg" />
        <?php endif;?>
        
        </div>
        <div class="col-xs-12 viewcontent--body">
            <?php print $node->body['und'][0]['value']; ?>
            <br>
            
        </div>

	</div>
        
        <div class="margin__top20">
        <?php

		    $node_comment = node_load($node->nid);
		    $node_view = node_view($node);
		    $node_view['comments'] = comment_node_page_additions($node_comment);
		    print render($content['comments']);


		?>
        </div>


	</div>
    
    
    
    <div class="col2--sidebar " style="position:relative;">
		<div class="sidebar--wrap  bottom__lightgray" style="margin-top:0; padding-bottom:0px;">
			<div class="commu--author pad__bot0">
                
                <div class="sidebar--wrap--display txt__medium">
                    <a href="/user/<?php print $node->uid;?>">
                        <?php if(empty($user_post->picture)){ ?>
                            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                        <?php }else{ ?>
                            <img src="<?php echo $user_picture; ?>" class="img-responsive">
                        <?php } ?>
                    </a>
                </div>
                
                
                
                    <div class="row margin__top20" style="text-align:left;">
                    <div class="col-xs-4 txt__gray  detail__medium__nopad">Posted by : </div>
                    <?php /* if($user->uid==0):?>
                    <div class="col-xs-8">
                         <?php print_r(changemakers_get_contact($node->uid));?>
                    </div>
                    <?php else:*/ ?>
                    <div class="col-xs-8  pad__left0">
                        <a href="/user/<?php print $node->uid;?>">
                            <?php print_r(changemakers_get_contact($node->uid));//$user->field_profile_firstname['und']['0']['value']. " ". $user->field_profile_lastname['und'][0]['value']; ?>
                        
                        </a>
                    </div>
                    <?php //endif;?>
                    </div>
                    
				    <div class="row margin__top5" style="text-align:left;">
                    <div class="col-xs-4 txt__gray  detail__medium__nopad">Interests : </div>
                        <div class="col-xs-8 pad__left0"><div class="linelimit__1"><?php echo $interests_name; ?></div></div>
                    </div>
                    
                
                 <div class="row txt__center ">
                     
            <?php if($user->uid == $node->uid || !empty($user->roles[3])):?>
            <a href="/node/<?php echo $node->nid; ?>/edit"><button  class="btn btn-primary btn--submit col-xs-8 col-xs-offset-2 margin__topbut10">แก้ไขโพสต์</button></a>
            <?php endif; ?>     
                     
                        <?php 
                if($node->field_community_status['und'][0]['value']==0){
                    echo "";
                }
				elseif($node->field_community_status['und'][0]['value']==1 && $user->uid == $node->uid || !empty($user->roles[3])){
					echo "<form action='/changemakers/community/close' method='POST' class='btn-close--topic'>";
                    echo "<input type='hidden' value='$node->nid' name='nid'>";
					echo '<button href="#" class="btn btn--default col-xs-8 col-xs-offset-2">ปิดโพสต์</button>';
                    echo "</form>";
				}
                //else{
				// 	echo "";
				// }
			
				?>
            
                </div> 
                
                    
                    <div class="row  margin__top20" style="text-align:left;">
                    <div class="sidebar--line"></div>
                    <div class="col-xs-6 pad">
                 
                    <span class="txt__gray  detail__medium__nopad">Due : </span>
                    <?php if(trim($node->field_community_due_date['und'][0]['value']) == ""){ print"-"; }else{ print changemakers_format_date_thai_short(strtotime($node->field_community_due_date['und'][0]['value'])); } ?>
                    </div>
           
                
                    <div class="col-xs-6 pad " style="border-left:2px #f2f2f2 solid;">
                 
                    <span class=" txt__gray  detail__medium__nopad">Status : </span>
                    
                    <?php        
                   // print_r($node->field_community_status['und'][0]['value']);
                    if($node->field_community_status['und'][0]['value']==1 ){
					   echo "Open";
					
				    }else{
				        echo "Close";
				    }   
                        ?>     
           
           
                        
                    </div>
                    </div>
                    <div class="row"></div>
                   

			</div>
			
		</div>
        

        <div class="sidebar--wrap  " >

            <?php echo views_embed_view('clone_of_community_post', $display_id = 'block'); ?>

	  	

        </div>

    </div>

<?php }else if(!empty($user_post->roles[5]) && empty($user->roles[5])){
 drupal_goto("/");
} ?>
    
</div>
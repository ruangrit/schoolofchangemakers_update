<?php 
$user_post = user_load(strip_tags($fields['uid']->content));

            //  print "<pre>";
            // print_r($user_post);
            // print "</pre>";
?>

<div class="commu--row col-xs-12 ">
    
    <a href="<?php print strip_tags($fields['path']->content); ?>">
	<div id="com_img" class="display--wrap">
        <div class="display">
        <?php                        
        if(!empty($user_post->picture)){
        ?>
        <!-- <a href="/user/<?php //print $user_post->uid; ?>"> -->
            <img src="<?php print file_create_url($user_post->picture->uri); ?>">
        <!--  </a> -->
        <?php }
        else{ ?>
            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
        <?php
         }   
        //print $fields['field_commuity_image']->content;?>
        
    </div>
    </div>
    
    
	<div class="detail--wrap" >
        
		<div class="topic-show sample--text__small linelimit__3"><?php print strip_tags($fields['title']->content); ?></div>
        
        
        <div class="detail__small link__gray ">
        <!--    
        <?php //if(!isset($user_post->roles[10])){ ?>
        
        <?php // print changemaker_check_icon_um($user_post->uid); ?>
        <?php //} ?>
        <?php // print strip_tags($fields['name']->content);//changemakers_get_contact(changemakers_get_name_contact(strip_tags($fields['name']->content))); ?>  <br/>
        -->
        <div class="tag--linelimit__06">
        <span class="icon-tag "></span> 

        <?php $type =  strip_tags($fields['field_community_forum_topic_type']->content); ?>
        <?php 
        if($type == "Offer")
        {
            ?><div class="type-offer-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Need")
        {
            ?><div class="type-need-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Announcement")
        {
            ?><div class="type-announcement-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Idea")
        {
            ?><div class="type-idea-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Q & A")
        {
            ?><div class="type-qa-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Others")
        {
            ?><div class="type-other-community2"><?php print $type ?></div> <?php
        }
        else if($type == "Coach Record")
        {
            ?><div class="type-coach-community2"><?php print $type ?></div> <?php
        }

        
        ?>
            </div>
            <div class="tag--linelimit__04" style="margin-left:3px;">
        <span class="icon-clock "></span> <?php print timeAgo(strip_tags($fields['field_commuity_date']->content)); ?>
            </div>
            
        </div>

            
    
    
    </div>
    </a>
</div>


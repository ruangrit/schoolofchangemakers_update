<?php 





//print $fields['forums']->content;

// print '<pre>';
// print_r($row);
// print '</pre>';
// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// print_r($node);
global $user;
$node = node_load($row->nid);
$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$user_post = user_load($row->_field_data['nid']['entity']->uid);
$duedate =strtotime(strip_tags($fields['field_community_due_date']->content));
$d_d = date('d',$duedate);
$d_m = intval(date('m',$duedate));
$d_y = date('Y',$duedate)+543;

$status_data = strip_tags($fields['field_community_status']->content);

if($status_data!=""){
	if($status_data==1){
			$status="Open";
	}else{
			$status = "Close";
	}
}else{
	$status = "-";
}
// print_r($fields['field_commuity_project']);
// echo $fields['field_community_project']->conten;
?>
<?php if(isset($user->roles[3]) || isset($user->roles[5])): ?>
		<?php if(isset($user->roles[3]) || isset($user->roles[5])): ?>
			<div class=" topic--row row">
			    
				<div class=" author col-xs-3"> 
			        <div class="row">
			        <div class="col-xs-4">
					<div class="display margin__top5">
						<?php if(!empty($user_post->picture->filename)){
					 		print '<a href="/user/'.$user_post->uid.'" ><img src="/sites/default/files/pictures/'.$user_post->picture->filename.'"></a>';
					 	}else{
					 		print '<a href="/user/'.$user_post->uid.'" ><img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg"></a>';
					 	} ?>
					</div>
			        </div>
					<div class="col-xs-8">
						<div class="commu--list--author">Posted by</div> 
						<a href="/user/<?php print $user_post->uid; ?>"><div class="text-name-community linelimit__1"><?php print changemakers_get_contact($user_post->uid); //$user->field_profile_firstname['und'][0]['value'];?></div></a>
						<br>
					    <?php if(!empty(strip_tags($fields['field_community_project']->content))){ ?>
			            <div class="commu--list--author margin__top5">For Project</div> 
                        <div class="text-name-community linelimit__1"><?php echo $fields['field_community_project']->content; ?></div>
                        <?php } ?>
					</div>
					
					</div>
				</div>
				<div class="col-xs-6 topic">

					<?php $type =  strip_tags($fields['field_community_forum_topic_type']->content); 
					$q = explode('&', $type);
					$q= trim($q[0]);
						// print "<pre>";
						// print_r($q[0]);
						// print '</pre>';

					?>
					<?php 
					if($type == "Offer")
					{
						?><div class="type-offer-community"><?php print $type ?></div> <?php
					}
					else if($type == "Need")
					{
						?><div class="type-need-community"><?php print $type ?></div> <?php
					}
					else if($type == "Announcement")
					{
						?><div class="type-announcement-community"><?php print $type ?></div> <?php
					}
					else if($type == "Idea")
					{
						?><div class="type-idea-community"><?php print $type ?></div> <?php
					}
					else if($q == "Q")
					{
						?><div class="type-qa-community"><?php print $type ?></div> <?php
					}
					else if($type == "Others")
			        {
			            ?><div class="type-qa-community"><?php print $type ?></div> <?php
			        }
			        else if($type == "Coach Record")
			        {
			            ?><div class="type-qa-community"><?php print $type ?></div> <?php
			        }
					?>

			        
			        <!-- <div class="type-need-community">Need</div>  -->
					<div class="type-padding-community h2--linelimit__2"><?php print $fields['title']->content; ?></div>
					

				</div>
				<div class="col-xs-3 detail">
					
			        <span class="txt__gray detail__small__nopad">Post Date : </span> <?php print $d." ".$month[$m]." ".$y;?><br>
			        
			        <span class="txt__gray detail__small__nopad">Due Date : </span><?php echo  $duedate!=0?$d_d." ".$month[$d_m]." ".($d_y):"-";?><br>
			        
			        <span class="txt__gray detail__small__nopad">Responses : </span><?php print  $row->_field_data['nid']['entity']->comment_count; ?><br>
						
			        <span class="txt__gray detail__small__nopad">Status : </span><?php print $status; ?> 
					
				</div>
			</div>	
		<?php endif; ?>
<?php else: ?>
<div class=" topic--row row">
   

	<div class=" author col-xs-3"> 
        <div class="row">
        <div class="col-xs-4">
		<div class="display margin__top5">
			<?php if(!empty($user_post->picture->filename)){
		 		print '<a href="/user/'.$user_post->uid.'" ><img src="/sites/default/files/pictures/'.$user_post->picture->filename.'"></a>';
		 	}else{
		 		print '<img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">';
		 	}


		 ?>	
		<?php// print $fields['field_commuity_image']->content; ?>
		</div>
        </div>
		<div class="col-xs-8">
			<span class="commu--list--author">Posted by</span> <a href="/user/<?php print $user_post->uid; ?>"><div class="text-name-community  linelimit__1"><?php print changemakers_get_contact($user_post->uid); //$user->field_profile_firstname['und'][0]['value'];?></div></a><br>
			<?php if(!empty(strip_tags($fields['field_community_project']->content))){ ?>
            <span class="commu--list--author margin__top5">For Project</span> 
            <div class="text-name-community  linelimit__1"><?php echo $fields['field_community_project']->content; ?>
            </div>
            <?php } ?>
		</div>
		
		</div>
	</div>
	<div class="col-xs-6 topic">

		<?php $type =  strip_tags($fields['field_community_forum_topic_type']->content); 
		$q = explode('&', $type);
		$q= trim($q[0]);
		// print "<pre>";
		// print_r($type);
		?>
		<?php 
		if($type == "Offer")
		{
			?><div class="type-offer-community"><?php print $type ?></div> <?php
		}
		else if($type == "Need")
		{
			?><div class="type-need-community"><?php print $type ?></div> <?php
		}
		else if($type == "Announcement")
		{
			?><div class="type-announcement-community"><?php print $type ?></div> <?php
		}
		else if($type == "Idea")
		{
			?><div class="type-idea-community"><?php print $type ?></div> <?php
		}
		else if($q == "Q")
		{
			?><div class="type-qa-community"><?php print $type ?></div> <?php
		}
		else if($type == "Others")
        {
            ?><div class="type-qa-community"><?php print $type ?></div> <?php
        }
        else if($type == "Coach Record")
        {
            ?><div class="type-qa-community"><?php print $type ?></div> <?php
        }
		?>

        
       
		<div class="type-padding-community h2--linelimit__2"><?php print $fields['title']->content; ?></div>
		

	</div>
	<div class="col-xs-3 detail">
		
        <span class="txt__gray detail__small__nopad">Post Date : </span> <?php print $d." ".$month[$m]." ".$y;?><br>
   
       	<span class="txt__gray detail__small__nopad">Due Date : </span><?php echo  $duedate!=0?$d_d." ".$month[$d_m]." ".($d_y):"-";?><br>
        
        <span class="txt__gray detail__small__nopad">Responses : </span><?php print  $row->_field_data['nid']['entity']->comment_count; ?><br>
			
        <span class="txt__gray detail__small__nopad">Status : </span><?php print $status; ?> 
                    
		
	</div>
</div>
<?php endif; ?>


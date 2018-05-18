<style type="text/css">/*
	.journals-title-animate {
	  position: relative;
	  height: 200px;
	}

	.journal-description {
	  	position: absolute;
	 	background: rgba(0, 0, 0, 0.5);
	  	color: #fff;
	  	visibility: hidden;
	  	opacity: 0;
	  	width: 266.391px;
	  	height: 150px;
	  	margin-top: -50px;
	}

	.journals-title-animate:hover .journal-description {
	 	visibility: visible;
	  	opacity: 1;
	}*/
    
</style>
<?php 

	global $user;


	$user_data = user_load($user->uid);
	$taxo_problems = array();
	$taxo_target = array();
	if(isset($user_data->field_profile_problem_interest['und'])){
		foreach ($user_data->field_profile_problem_interest['und'] as $key => $value) {
			$taxo_problems[] = $value['tid'];
		}
	}
	
	if(isset($user_data->field_profile_target_group['und'])){
		foreach ($user_data->field_profile_target_group['und'] as $key => $value) {
			$taxo_target[] = $value['tid'];
		}
	}

	$my_project = changemakers_get_user_create_project_dashboard();
	$join_project = changemakers_get_user_join_project_dashboard();
	$user_follow_project = changemakers_get_user_follow_project_dashboard();
	$join_project_id = array();
	foreach ($join_project as $key => $value) {
		$join_project_id[] = $value['nid'];
	}

	foreach ($user_follow_project as $key => $value) {
		if(!in_array($value['nid'], $join_project_id)){
			$join_project_id[] = $value['nid'];
		}
	}


	if($user->roles[9]){
		$partner_campaign = changemakers_get_partner_join_campaign_dashboard();
		if(count($partner_campaign) != 0){
			foreach ($partner_campaign as $key => $value) { 
				$partner_campaign_join_campaign = changemakers_get_project_join_campaign_dashboard($value['nid']);
				 foreach ($partner_campaign_join_campaign as $key => $value2) {
        			if(!in_array($value2['nid'], $join_project_id)){
						$join_project_id[] = $value2['nid'];
					}
        		}
			}

		}
	}
	else if($user->roles[8]){
		$helpdesk_project = changemakers_get_helpdesk_join_project_dashboard(2); 
		foreach ($helpdesk_project as $key => $value) {
			if(!in_array($value['nid'], $join_project_id)){
				$join_project_id[] = $value['nid'];
			}
		} 
	}else if($user->roles[5]){
		$coach_project =  changemakers_get_coach_project(2);
		foreach ($coach_project as $key => $value) {
			if(!in_array($value['nid'], $join_project_id)){
				$join_project_id[] = $value['nid'];
			}
		} 
	}
	$journal_in_project = array();

	
	if(count($join_project_id) > 0){
		$query_join = db_select('field_data_field_project_related', 'fm');
	    $query_join->fields('fm', array('entity_id'));
	    $query_join->condition('fm.field_project_related_nid', $join_project_id, 'in');
	    $result_join = $query_join->distinct()->execute()->fetchAll();

	    foreach ($result_join as $key => $value) {
	    	$journal_in_project[] = $value->entity_id;
	    }
	}
 //    print "<pre>";
	// print_r($journal_in_project);
	// print "</pre>";
	
    if(!isset($user->roles[5])){
		$query = db_select('node', 'fm');
	    $query->fields('fm', array('nid'));
	    $query->join('field_data_field_journal_type', 'jc', 'fm.nid = jc.entity_id');
	    
	    if(!empty($taxo_problems)){
	    	$query->leftjoin('field_data_field_journal_problem', 'fi', 'fi.entity_id = fm.nid');
	    }
	    if(!empty($taxo_target)){
		    $query->leftjoin('field_data_field_journal_target', 'fc', 'fc.entity_id = fm.nid');
		}

		$query->condition('jc.field_journal_type_value', '0' , '=');
	    $query->condition('fm.type', 'journal', '=');

	   	$db_or = db_or();
	    if(count($journal_in_project) != 0){
	    	$query->leftjoin('field_data_field_project_related', 'fj', ' fj.entity_id = fm.nid');
	    	$db_or->condition('fj.field_project_related_nid', $join_project_id, 'in');
	    }

		$db_or->condition('fm.uid', $user->uid, '=');
		if(!empty($taxo_problems)){
			$db_or->condition('fi.field_journal_problem_tid', $taxo_problems, 'in');
		}
		
		if(!empty($taxo_target)){
			$db_or->condition('fc.field_journal_target_tid', $taxo_target, 'in');
		}
		$query->condition($db_or);
		$query->range(0,3);
		$query->orderBy('fm.changed', 'DESC');

		$result = $query->distinct()->execute()->fetchAll();
	}else{
		$query = db_select('node', 'fm');
	    $query->fields('fm', array('nid'));
	    if(!empty($taxo_problems)){
	    	$query->leftjoin('field_data_field_journal_problem', 'fi', 'fi.entity_id = fm.nid');
	    }
	    if(!empty($taxo_target)){
		    $query->leftjoin('field_data_field_journal_target', 'fc', 'fc.entity_id = fm.nid');
		}

	   	$db_or = db_or();
	    if(count($journal_in_project) != 0){
	    	$query->leftjoin('field_data_field_project_related', 'fj', 'fj.entity_id = fm.nid');
	    	$db_or->condition('fj.field_project_related_nid', $join_project_id, 'in');
	    }

	    $query->condition('fm.type', 'journal', '=');

		//    $query->condition('fm.entity_id', $project_id ,"in" );
		//    $query->condition('fm.field_project_status_value', 1 ,"=" );
		//    $query->condition('fi.field_problem_topic_tid', $taxo , "=");
		//    $query->range($offset,$limit);

		// $query=db_select('users','u')->fields('u',array('uid','title','created','uid'));
		// $query->join('flag_content','fc' , 'u.uid = fc.content_id');

		
		$db_or->condition('fm.uid', $user->uid, '=');
		if(!empty($taxo_problems)){
			$db_or->condition('fi.field_journal_problem_tid', $taxo_problems, 'in');
		}
		
		if(!empty($taxo_target)){
			$db_or->condition('fc.field_journal_target_tid', $taxo_target, 'in');
		}
		$query->condition($db_or);
		$query->range(0,3);
		$query->orderBy('fm.changed', 'DESC');

		$result = $query->distinct()->execute()->fetchAll();
	}

	// print "<pre>";
	// print_r($result);
	// print "</pre>";

?>

<div class="col-xs-12">
    <div class="row">
<div class="block--latest--journals ">

	<h2 class="headline--block headline__alte txt__left">JOURNAL RELATED TO YOU</h2>
    <div class="viewmore--line  col-xs-12"></div>
    <?php if(!empty($result)){ ?>	
    <div class="row journal--box--wrap--dash">         
    
	<div class="block--latest--journals_detail col-xs-12" >


	<?php


	foreach ($result as $key => $value) {
		$node_journal = node_load($value->nid);
		$string = $node_journal->body['und'][0]['value'];
		$append="...";
	    $length=300;
	    if(strlen($string) > $length) {
	       	$string = wordwrap($string, $length);
	        $string = explode("\n", $string, 2);
	        $string = $string[0] . $append;
	    }
	    // print "<pre>";
	    // print_r($node_journal->field_journal_image);
	    // print "</pre>";
	    //print_r($node_journal->field_journal_image);
	    $image = image_style_url("cover-image", $node_journal->field_journal_image['und'][0]['uri']);
	    $path = drupal_get_path_alias("node/".$node_journal->nid);
	    if(is_numeric($path)){
	        $path = "/journal/".$path;
	    }

	?>
	
	<div class="journal--box " >
		<a href="<?php print $path; ?>">
	    <div class="journal--img">
	            <img src="<?php print $image; ?>">
	    </div>

	        
	        <div id="moredetail__over" class="field--content journal--boxover" >
	        
	            	<div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $node_journal->title;?></h4></div>

	            
	            <div id="moredetail__hide" class="detail__small">
	               
	             <!--class="txt__gray">-->
                    <?php print changemakers_get_contact($node_journal->uid); ?> <span class="icon-profile-verify member--verify"></span>
                    
	           
	            <!--<p class="moredetail__over__content"><?php print $string ?></p>-->
	            
	            </div>
	            

	        </div> 
	    </a> 
    </div>
 	<?php } ?>
	
	
    </div>


    </div>   


	<a href="/journal/list">
		<div class="viewmore--line row col-xs-12"><div class="viewmore--btn row">VIEW ALL <i class="glyphicon glyphicon-play-circle"></i></div></div> 
	</a>

	

    <?php }else{  ?>
		<div><h4>ไม่พบบทความที่เกี่ยวข้อง</h4></div>
    <?php } ?>
</div></div></div>



    
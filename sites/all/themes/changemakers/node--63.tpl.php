ACTIVE
CAMPAIGNS

<?php 

	global $user;
	if($user->roles[6] == "organization" || $user->roles[9] == "partner" ||  $user->roles[5] == "coach" ):
		module_load_include('inc','webform','includes/webform.submissions');
		$seleteions = webform_get_submissions(array('nid'=>2));
		$join_projects = array();
		$campaign_project_check = array();
		$data_campaign_result = array();

		$user_id = $user->uid;
		
		$campaigns = node_load_multiple(array(),array('type'=>'campaign'));
		foreach ($campaigns as $key => $item) {

			foreach ($item->field_project_join['und'] as $key => $item_join_campaign) {
				$campaigns_joins_project = $item_join_campaign['value'];

				$item_project = field_collection_item_load($campaigns_joins_project);
				$campaign_project = $item->nid.$item_project->field_join_project['und'][0]['nid'];
				if($item_project->field_join_by_user['und'][0]['value']==$user_id && !in_array($campaign_project,$campaign_project_check)){
					$campaign_project_check[] = $campaign_project;
					$join_projects[] = array('campaign_id'=>$item->nid,'project_id'=>$item_project->field_join_project['und'][0]['nid'],'user_id'=>$item_project->field_join_by_user['und'][0]['value']);
				}

				$project_node = node_load($item_project->field_join_project['und'][0]['value']);	
				$campaign_project = $item->nid.$project_node->nid;	
				if($project_node->uid==$user_id && !in_array($campaign_project,$campaign_project_check)){
					$campaign_project_check[] = $campaign_project;
					$join_projects[] = array('campaign_id'=>$item->nid,'project_id'=>$project_node->nid,'user_id'=>$project_node->uid);
				}

			}

		}

		foreach ($seleteions as $key => $item_joins_project) {	
			
			$join_project_item = field_collection_item_load($item_joins_project->data[2][0]);
			
			if($item_joins_project->data[1][0]==$user_id && $item_joins_project->data[3][0]==1){
				//echo $item_joins_project->data[2][0];
				//$join_projects[] = array('project'=>$item_joins_project->data[2][0],'user'=>$join_project_item->field_join_by_user['und'][0]['value']);
				$query_db = db_query("select  b.field_join_by_user_value as user_id ,a.entity_id as campaign_id, c.field_join_project_nid as project_id 
				from field_data_field_project_join a 
				INNER JOIN field_revision_field_join_by_user b ON a.field_project_join_value = b.entity_id 
				INNER JOIN field_data_field_join_project c ON a.field_project_join_value = c.entity_id
				WHERE c.field_join_project_nid = ".$item_joins_project->data[2][0]."");
				
				//$fetch_data = array();
				foreach ($query_db as $row) 
				{
					$campaign_project = $row->campaign_id.$row->project_id;	
					if(!in_array($campaign_project,$campaign_project_check)){
						$campaign_project_check[] = $campaign_project;
					    $join_projects[] = array('campaign_id'=>$row->campaign_id,'project_id'=>$row->project_id,'user_id'=>$row->user_id);
					}

				}
				

			}		
		}

		$div_campaign = array();
		$index = 0;

		foreach ($join_projects as $key => $value) 
		{
			if($div_campaign)
			{
				if (!in_array($value['campaign_id'],$div_campaign)) {
					$div_campaign[$index] = $value['campaign_id'];
					$index++;
				}
			}
			else
			{
				$div_campaign[$index] = $value['campaign_id'];
				$index++;
			}
		}
		$summary_data = array();
		$index_data = 0;
		for ($i=0; $i < count($div_campaign) ; $i++) 
		{ 
			foreach ($join_projects as $key => $value_project) 
			{
				if($value_project['campaign_id'] == $div_campaign[$i])
				{
					$summary_data[$i][] = $value_project;
				}
			}
		}
	endif;

	// print '<pre>';
	// print_r($summary_data);
	// print '</pre>';
	?>
	<div><p>Projects in this master account <?php print $count_project; ?></p></div>
		<div><p>Related campaigns <?php print $count_project; ?></p></div>

		<?php
		$check_load = 0;
		for ($i=0; $i < count($summary_data); $i++) 
		{ 

			if($check_load == 0)
			{
				$data = node_load($summary_data[$i][0]['campaign_id']);
				?>
				<div><p>Campaigns Active</p></div>
				<img width="150" src="/sites/default/files/<?php echo $data->field_campaign_image['und'][0]['filename'];?>">
				<div><p><?php print $data->title;?></p></div>
				<div><p>Campaign Period</p></div>
				<div><p><?php print changemakers_format_date_thai($data->changed);?></p></div>
				<div><p><?php //print $relate_project_user->field_profile_firstname['und'][0]['value']." ".$relate_project_user->field_profile_lastname['und'][0]['value'];?></p></div>
				<div><p><?php print "-------------------------------------------------------------------";?></p></div>
				<?php

				foreach ($summary_data[$i] as $key => $value) 
				{
					$data_load = node_load($value['project_id']);
					?>
						<div><p>Projects Active</p></div>
						<img width="150" src="/sites/default/files/<?php echo $data_load->field_project_image['und'][0]['filename'];?>">
						<div><p><?php print $data_load->title;?></p></div>
						<div><p><?php print changemakers_format_date_thai($data_load->changed);?></p></div>
						<div><p><?php //print $relate_project_user->field_profile_firstname['und'][0]['value']." ".$relate_project_user->field_profile_lastname['und'][0]['value'];?></p></div>
					
					<?php
						// print '<pre>';
						// print_r($data_load);
						// print '</pre>';	
				}
		
				
			}







			/*foreach ($summary_data[$i] as $key => $value) 
			{
				$relate_project = node_load($result[$i]->data[2][0]);
				$relate_project_user = user_load($result[$i]->data[1][0]);
				


				?> 
				<img width="150" src="/sites/default/files/<?php echo $data->field_project_image['und'][0]['filename'];?>">
				<div><p><?php print $data->title;?></p></div>
				<div><p><?php print changemakers_format_date_thai($relate_project->changed);?></p></div>
				<div><p><?php print $relate_project_user->field_profile_firstname['und'][0]['value']." ".$relate_project_user->field_profile_lastname['und'][0]['value'];?></p></div>
				<?php
				# code...
			}*/
			
			
			
		}

		
	
	

	
	/*
	
	$query_db = db_query("select b.field_join_by_user_value as user_id ,a.entity_id as campaign_id, c.field_join_project_nid as project_id 
			from field_data_field_project_join a 
			INNER JOIN field_revision_field_join_by_user b ON a.field_project_join_value = b.entity_id 
			INNER JOIN field_data_field_join_project c ON a.field_project_join_value = c.entity_id
			WHERE c.field_join_project_nid = 45");
	$fetch_data = array();
	foreach ($query_db as $row) 
	{
	    $fetch_data[] = $row;
	}

	
	$count_project = 0;


	if($user->roles[6] == "organization")
	{

		/*$query = new EntityFieldQuery();
		$query->entityCondition('entity_type', 'node')
		  ->propertyCondition('type', array('campaign'))
		  ->propertyOrderBy('created', 'DESC');
		$result = $query->execute();
		
		$nids = array_keys($result['node']);
		$join_projects = array();
		$join_by_users = array();
		$result_filter_project = node_load_multiple($nids);
		for ($i=0; $i < count($result_filter_project) ; $i++) 
		{ 
			$campaign_nid = $result_filter_project[$nids[$i]]->nid;
			
			foreach ($result_filter_project[$nids[$i]]->field_project_join['und'] as $key => $join_project) {
				$join_project_item = field_collection_item_load($join_project['value']);
				$join_projects[] = array('campaign'=>$campaign_nid,'project'=>$join_project_item->field_join_project['und'][0]['nid'],'user'=>$join_project_item->field_join_by_user['und'][0]['value']);
				//$join_by_users[$campaign_nid][] = ;
			
			}
			
		
		}*/
		// print '<pre>';
		// print_r($join_projects);
		// print '</pre>';

		
	/*	foreach ($join_projects as $key => $value) {
			if($value['user']!=""){
				$data_campaign_result[] = array('user_id'=>$value['user'],'campaign_id'=>$value['campaign'],'project_id'=>$value['project']);
				$projects_nid[] = $value['project'];
			}
				
		}

		$query_db = db_query("select b.field_join_by_user_value as user_id ,a.entity_id as campaign_id, c.field_join_project_nid as project_id 
			from field_data_field_project_join a 
			INNER JOIN field_revision_field_join_by_user b ON a.field_project_join_value = b.entity_id 
			INNER JOIN field_data_field_join_project c ON a.field_project_join_value = c.entity_id;");
		foreach ($query_db as $row) 
		{
		    $query_data[] = $row;
		}
		
		foreach ($query_data as $key => $value) {
			if($value->user_id == $user->uid && !in_array($value->project_id,$projects_nid))
			{
				//$data_campaign_result[] = $value;
				$data_campaign_result[] = array('user_id'=>$value->user_id,'campaign_id'=>$value->campaign_id,'project_id'=>$value->project_id);
			}
		}

		$data_user_join_project = array();
		foreach ($seleteions as $key => $value) {
		
			if($value->data[1][0] == $user->uid)
			{
				$data_user_join_project[] = $value;

			}
		}


				

		print '<pre>';
		print_r($data_campaign_result);
		print '</pre>';

		?>
		<div><p>Projects in this master account <?php print $count_project; ?></p></div>
		<div><p>Related campaigns <?php print $count_project; ?></p></div>

		<?php
		for ($i=0; $i < count($result); $i++) 
		{ 
			if($result[$i]->data[1][0] == $user->uid)
			{
				// print '<pre>';
				// print_r($result[$i]->data);
				// print '</pre>';
				$relate_project = node_load($result[$i]->data[2][0]);
				$relate_project_user = user_load($result[$i]->data[1][0]);
				// print '<pre>';
				// print_r($relate_project_user);
				// print '</pre>';



				?> 
				<img width="150" src="/sites/default/files/<?php echo $relate_project->field_project_image['und'][0]['filename'];?>">
				<div><p><?php print $relate_project->title;?></p></div>
				<div><p><?php print changemakers_format_date_thai($relate_project->changed);?></p></div>
				<div><p><?php print $relate_project_user->field_profile_firstname['und'][0]['value']." ".$relate_project_user->field_profile_lastname['und'][0]['value'];?></p></div>
				<?php
			}
		}
	}
*/
	
	// if($result[$i]->data[3][0] == 1 && $result[$i]->data[2][0] == $nid)
	// {
	// 	$user_join = user_load($result[$i]->data[1][0]);
	// }

?>
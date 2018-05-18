<?php
module_load_include('inc','webform','includes/webform.submissions');

function _changemakers_thai_daterange_format($start, $end) {
  	$date_start = substr($start, 0, 10);
  	$date_end = substr($end, 0, 10);
  	$time_start = str_replace(":", ".", substr($start, 11, 5));
  	$time_end = str_replace(":", ".", substr($end, 11, 5));
  	if(substr($time_start, 0, 1) == "0"):
  		$time_start = substr($time_start, 1);
  	endif;
  	if(substr($time_end, 0, 1) == "0"):
  		$time_end = substr($time_end, 1);
  	endif;
  	if($date_start == $date_end || $end == null):
		if($time_start == $time_end || $end == null):
			return changemakers_format_date_thai_short(strtotime($date_start)) . " " . $time_start . "น.";
		else:
			return changemakers_format_date_thai_short(strtotime($date_start)) . " " . $time_start . "-" . $time_end . "น.";
		endif;
  	else:
  		return changemakers_format_date_thai_short(strtotime($date_start)) . " " . $time_start . "น. - " . changemakers_format_date_thai_short(strtotime($date_end)) . " " . $time_end . "น.";
  	endif;
}

function changemakers_helper_user_get_journal($uid){

    $project = array();

    $query = db_select('node','n');
    $query->fields('n');  
    $query->condition('n.uid',$uid,'=');
    $query->condition('n.type','journal','=');
    $result = $query->execute();
    while($record = $result->fetchAssoc()) { 
        $project[] = $record['nid'];   
    } 

    return $project;
}

function changemakers_get_taxonomy_problem_parents($nid){
  $results = array();
  $node=node_load($nid);
  $entity =taxonomy_get_tree(4);
  if($node->type=="project"){
    $problems = $node->field_problem_topic['und'];
  }elseif($node->type=="knowledge"){
    $problems = $node->field_knowledge_problem['und'];
  }
  foreach($entity as $key => $item){
    if(count($problems) != 0){
      foreach($problems as $key => $knowledge_problem){

  	    if($item->tid!=171 && $knowledge_problem['tid']==$item->tid){        
          if($item->parents[0]!=0){
            $taxonomy_item =taxonomy_term_load($item->parents[0]);
            if(!in_array($taxonomy_item->name,$results)){
              $results[]= $taxonomy_item->name;
            }
            
          }else{
            if(!in_array($item->name,$results)){
              $results[]= $item->name;
            }
          }
             
  	    }
          

      }
    }

  }

  return $results;

  
}

function changemakers_count_community_reply($nid){

$node = node_load($nid);
return $node->comment_count;

}

function changemakers_check_interest($uid){
  $result = array();
  $user = user_load($uid);
  if(count($user->field_profile_join_interest['und']) != 0){
    foreach($user->field_profile_join_interest['und'] as $key => $item){
      if(strstr($item['value'],'Coach')){
        $result[] = 'Coach';
      }
      if(strstr($item['value'],"ผู้สนับสนุนโปรเจค")){
        $result[] = 'Partner';
      }  
      
    }
  }
  
  return $result;
  
}
function changemakers_check_partner_interest($uid){
  $user = user_load($uid);
  foreach($user->field_profile_join_interest['und'] as $key => $item){  
    if(strstr($item['value'],"ผู้สนับสนุนโปรเจค")){
      $result = "yes";
    }     
    
  }
  return $result;
}

function changemakers_count_join_event($nid) {

    $seleteions = webform_get_submissions(array('nid'=>3));
    $count = 0;
  
    foreach ($seleteions as $key => $value) {
      if($value->data[2][0] == $nid){
        $count++;
      }
    }

    return $count;


}

function changemakers_update_funding_campaign(){
  $type = arg(2);
  $nid = arg(3);
  $value = arg(4);

  $node = node_load($nid);
  if($type=="total_budget"){
    $node->field_total_budget['und'][0]['value'] = intval($value);
    $result = number_format($value, 2, '.', ',');
  }elseif($type=="funding_amount"){
    $node->field_funding_amount['und'][0]['value'] = intval($value);
    $result = number_format($value, 2, '.', ',');
  }elseif($type=="funding_amount_left"){
    $node->field_funding_amount_left['und'][0]['value'] = intval($value);
    $result = number_format($value, 2, '.', ',');
  }elseif($type=="funding_amount_status"){
    $node->field_funding_amount_status['und'][0]['value'] = $value;
    $result =  $value;   
  }  
  node_save($node);

  echo $result;
}

function changemakers_helper_join_event(){

  global $user;

  $status = arg(2);
  $nid =3;
  $node= node_load($nid);
  $sid = arg(3);
  $result = webform_get_submissions($nid);
  $submission = $result[$sid];
  if($status==1){
    $submission->data[8]=array(1);
  }elseif($status==0){
    $submission->data[8]=array(0);
  }

  webform_submission_update($node,$submission);  

  echo 1;

}
function changemakers_helper_campaign_join_project(){
    global $user;

    $uid= $user->uid;
    $u = user_load($uid);

    $project = array();

    //if(!isset($u->roles[6]) && !isset($u->roles[9])){  
      $user_join_project = changemakers_get_user_join_project_dashboard();
      $user_create_project = changemakers_get_user_create_project_dashboard();
    //}

    if(!empty($user_join_project)){
      foreach($user_join_project as $key => $item){
          $prject_node = node_load($item['nid']);
        //if($prject_node->field_project_status['und'][0]['value']==1){
              $project[] =$item['nid'];
        //}
      }
    }
    if(!empty($user_create_project)){
      foreach($user_create_project as $key => $item){
          $prject_node = node_load($item['nid']);
        //if($prject_node->field_project_status['und'][0]['value']==1){
              $project[] =$item['nid'];
        //}
      }
    }
      $create = db_select('node','n');
      $create->fields('n');  
      $create->condition('n.uid',$uid,'=');
      $create->condition('n.type','project','=');
      $result_create = $create->execute();
      while($record = $result_create->fetchAssoc()) { 
          $project[] = $record['entity_id'];   
      } 
   
    if(isset($u->roles[5])){ //coach
      $query2 = db_select('field_data_field_coach_project','p');
      $query2->fields('p');  
      $query2->condition('p.field_coach_project_uid',$uid,'=');
      $result2 = $query2->execute();
      while($record = $result2->fetchAssoc()) { 
          $project[] = $record['entity_id'];   
      } 

    }

    if(isset($u->roles[6])){ //Org
        $role = $u->field_organization['und'][0]['tid'];

        $query2 = db_select('field_data_field_organization_project','p');
        $query2->fields('p');  
        $query2->condition('p.field_organization_project_tid',$role,'=');
        $result2 = $query2->execute();
        while($record = $result2->fetchAssoc()) { 
            $project[] = $record['entity_id'];   
        } 

    }
    if(isset($u->roles[9])){ //partner     
       
        $query2 = db_select('field_data_field_partner_project','p');
        $query2->fields('p');  
        $query2->condition('p.field_partner_project_uid',$uid,'=');
        $result2 = $query2->execute();
        while($record = $result2->fetchAssoc()) { 
            $project[] = $record['entity_id'];   
        } 

    }

    $campaign = array();
    if(!empty($project)){    
      $join = db_select('field_data_field_project_join','p');         
      $join->join('field_data_field_join_project', 'j', 'p.field_project_join_value=j.entity_id');
      $join->fields('p'); 
      $join->condition('j.field_join_project_nid',$project,'IN');
      $result_join = $join->execute();
      while($record = $result_join->fetchAssoc()) { 
        if(!in_array($record['entity_id'],$campaign)){
          $campaign[] = $record['entity_id'];   
        }
         
      }
    }

    if(isset($u->roles[6])){ //Org
        $role = $u->field_organization['und'][0]['tid'];

        $queryOrg = db_select('field_data_field_supported_organization','p');
        $queryOrg->fields('p');  
        $queryOrg->condition('p.field_supported_organization_tid',$role,'=');
        $resultOrg = $queryOrg->execute();
        while($recordOrg = $resultOrg->fetchAssoc()) { 
            if(!in_array($recordOrg['entity_id'],$campaign)){
              $campaign[] = $recordOrg['entity_id'];  
            }
        
        }
    }

    if(isset($u->roles[9])){ //partner
     
        $querypartner = db_select('field_data_field_partner_campaign','p');
        $querypartner->fields('p');  
        $querypartner->condition('p.field_partner_campaign_uid',$uid,'=');
        $resultpartner = $querypartner->execute();
        while($recordpartner = $resultpartner->fetchAssoc()) { 
            if(!in_array($recordpartner['entity_id'],$campaign)){
              $campaign[] = $recordpartner['entity_id'];     
            }   
        }       
  
    }      

    return $campaign;
}

function changemaker_halper_campaign_in_project(){

  	$project = 0;
  	//$check_project = array();
  	$campaign = changemakers_helper_campaign_join_project();
  	foreach($campaign as $key =>$item){
	    $node = node_load($item);
	    if($node->field_campaign_active['und'][0]['value']==1){
		    foreach($node->field_project_join['und'] as $key => $project_join){		      	
	      	 	$field_item = field_collection_item_load($project_join['value']);	   
            if(isset($field_item->field_join_project['und'][0]['nid'])){
              $project++; 
            }	 	
	      	 	//if(!in_array($field_item->field_join_project['und'][0]['nid'],$check_project)){			      		   
			      // $check_project[] = $field_item->field_join_project['und'][0]['nid'];
		      	//}
			}
	   
	    }

  	}
  
  return $project;
}

function changemakers_join_project_campaign($node){
	global $user;
	$uid = $user->uid;
	$u = user_load($user->uid);
	$project = array();
	$result = array();

  if(!isset($u->roles[3])){

    $user_join_project = changemakers_get_user_join_project_dashboard();
    $user_create_project = changemakers_get_user_create_project_dashboard();

    foreach($user_join_project as $key => $item){     
        $project[] =$item['nid'];
    }
    foreach($user_create_project as $key => $item){
        $project[] =$item['nid'];
    }


    $project_in_campaign = array();
    foreach($node->field_project_join['und'] as $key => $project_join){		      	
  	 	$field_item = field_collection_item_load($project_join['value']);	      	 	
  	 	if($field_item->field_join_project['und'][0]['nid']){
	        $project_in_campaign[]=$field_item->field_join_project['und'][0]['nid'];			   
      	}
	  }
    foreach($project as $key => $item){
    	if(!in_array($item,$project_in_campaign)){
	    	$p = node_load($item);
	    	$result[] = array($p->title,$p->nid);
    	}
    }
  }
  else{
    $results = db_select('node', 'n')
          ->fields('n', array('nid','title'))
          ->condition('type', 'project','=')
          ->condition('status', 1,'=')
          ->condition('title', "",'<>')
          ->orderBy('title', 'ASC')
          ->execute();
    while($record = $results->fetchAssoc()) {
        $result[] = array($record['title'], $record['nid']);
    }
  }


    return $result;

}

function changemakers_project_edit_fund(){
 
  return 1;

}
  

    
function changemakers_helper_community_project(){

  global $user;
  $uid = 1497;
  $u = user_load($uid);
  $project = array();

    $query = db_select('node','n');
    $query->fields('n');  
    $query->condition('n.uid',$uid,'=');
    $result = $query->execute();
    while($record = $result->fetchAssoc()) {  
      if(!in_array($record['nid'],$project)){  
        $project[]=$record['nid'];
      }
    } 


    $query2 = db_select('field_data_field_user_join_project','p');
    $query2->fields('p');  
    $query2->condition('p.field_user_join_project_uid',$uid,'=');
    $result2 = $query2->execute();
    while($record = $result2->fetchAssoc()) {  
      if(!in_array($record['entity_id'],$project)){
          $project[]=$record['entity_id'];
      }
     
    } 
      print "<pre>";
      print_r($project);
      print "</pre>";
  

}
function changemaker_halper_campaign_get_project($nid){
    global $user;

    $project = array();

    $join = db_select('field_data_field_project_join','p');         
    $join->join('field_data_field_join_project', 'j', 'p.field_project_join_value=j.entity_id');
    $join->fields('j'); 
    $join->condition('p.entity_id',$nid,'=');
    $result_join = $join->execute();
    while($record = $result_join->fetchAssoc()) { 
      if(!in_array($record['field_join_project_nid'],$project)){
        $project[] = $record['field_join_project_nid'];   
      }
       
    } 
    
   
   /* $query2 = db_select('field_data_field_project_join','p');
    $query2->fields('p');  
    $query2->condition('p.entity_id',$nid,'=');
    $result2 = $query2->execute();
    while($record = $result2->fetchAssoc()) {    
      if(!in_array( $record['field_project_join_value'],$project)) {
          $item = field_collection_item_load($record['field_project_join_value']);
          $project[] = $item->field_join_project['und'][0]['nid'];           
      }
    }  */  

    return $project;

}
function changemaker_halper_campaign(){
    global $user;

    $campaign = array();
    $project = array();
    $uid= $user->uid;
    $u = user_load($uid);
    
    $user_join  = $u->uid;      

    $query_join = db_select('field_data_field_user_join_project','p');
    $query_join->fields('p',array('entity_id'));  
    $query_join->condition('p.field_user_join_project_uid',$user_join,'=');
    $result_join = $query_join->execute();
    while($record = $result_join->fetchAssoc()) {  
        $project[] = $record['entity_id'];   
    }

    if(isset($u->roles[5])){ //coach
      $query2 = db_select('field_data_field_coach_project','p');
      $query2->fields('p');  
      $query2->condition('p.field_coach_project_uid',$uid,'=');
      $result2 = $query2->execute();
      while($record = $result2->fetchAssoc()) { 
          $project[] = $record['entity_id'];   
      } 

    }
    if(isset($u->roles[6])){ //Org
        $role = $u->field_organization['und'][0]['tid'];

        $query = db_select('field_data_field_supported_organization','p');
        $query->fields('p');  
        $query->condition('p.field_supported_organization_tid',$role,'=');
        $result = $query->execute();
        while($record = $result->fetchAssoc()) { 
            $campaign[] = $record['entity_id'];   
        } 

        $query2 = db_select('field_data_field_organization_project','p');
        $query2->fields('p');  
        $query2->condition('p.field_organization_project_tid',$role,'=');
        $result2 = $query2->execute();
        while($record = $result2->fetchAssoc()) { 
            $project[] = $record['entity_id'];   
        } 

    }
    if(isset($u->roles[9])){ //partner
     
        $query = db_select('field_data_field_partner_campaign','p');
        $query->fields('p');  
        $query->condition('p.field_partner_campaign_uid',$uid,'=');
        $result = $query->execute();
        while($record = $result->fetchAssoc()) { 
            $campaign[] = $record['entity_id'];   
        }
       
        $query2 = db_select('field_data_field_partner_project','p');
        $query2->fields('p');  
        $query2->condition('p.field_partner_project_uid',$uid,'=');
        $result2 = $query2->execute();
        while($record = $result2->fetchAssoc()) { 
            $project[] = $record['entity_id'];   
        } 

    }
      
    
       $join = db_select('field_data_field_project_join','p');         
        $join->join('field_data_field_join_project', 'j', 'p.field_project_join_value=j.entity_id');
        $join->fields('p'); 
        $join->condition('j.field_join_project_nid',$project,'IN');
        $result_join = $join->execute();
        while($record = $result_join->fetchAssoc()) { 
          if(!in_array($record['entity_id'],$campaign)){
            $campaign[] = $record['entity_id'];   
          }
           
        } 
  
    if(!empty($project)){

        $query3 = db_select('field_data_field_project_join','j');
        $query3->fields('j'); 
        $query3->condition('j.field_project_join_value', $project,'IN');
        $result3 = $query3->execute();
          while($record = $result3->fetchAssoc()) { 
            if(!in_array($record['entity_id'],$campaign)){
              $campaign[] = $record['entity_id']; 
            }
          } 
    }

    return $campaign;

}


function changemakers_helper_community_close(){

  $nid = $_POST['nid'];
  $node = node_load($nid);
  print_r($node);
  $node->field_community_status['und'][0]['value'] = 0;
  node_save($node);
  drupal_goto('/community/'.$nid);

}
function changemakers_helper_project_journal(){
  global $user; 
  $data = array();
  $data[] = array('id'=>"_none",'value'=>"- None -");
  print_r($user->roles[3]);
  if(!isset($user->roles[3])){
    if(isset($user->roles[5])){
      $results = db_select('node', 'n')
            ->fields('n', array('nid','title'))
            ->condition('type', 'project','=')
            ->condition('uid', $user->uid,'=')
            ->condition('status', 0,'>')
            ->execute();
      while($record = $results->fetchAssoc()) {
          $data[] = array('id'=>$record['nid'],'value'=>$record['title']);
         
      }

      $coach_project = db_select('node', 'n');
      $coach_project->join('field_data_field_coach_project', 'c', 'n.nid = c.entity_id');
      $coach_project->fields('n', array('nid','title'));
      $coach_project->condition('field_coach_project_uid', $user->uid,'=');
      $results_coach_project = $coach_project->execute();
      while($record = $results_coach_project->fetchAssoc()) {
          $data[] = array('id'=>$record['nid'],'value'=>$record['title']);
          
      }


    }else{
      $results = db_select('node', 'n')
            ->fields('n', array('nid','title'))
            ->condition('type', 'project','=')
            ->condition('uid', $user->uid,'=')
            ->condition('status', 0,'>')
            ->execute();
      while($record = $results->fetchAssoc()) {
          $data[] = array('id'=>$record['nid'],'value'=>$record['title']);         
      }
    }   
	  $result = array('status'=>1,'data'=>$data);	  	
  }else{
		$result = array('status'=>0,'data'=>'');	
  }

  echo json_encode($result);
  
}

function changemakers_helper_journal_problem(){
  global $user; 
  $project_nid = arg(2);
  $journal_problem = array();
  $results = db_select('field_data_field_problem_topic', 'p')
            ->fields('p')
            ->condition('entity_id', $project_nid,'=')
            ->execute();
      while($record = $results->fetchAssoc()) {
          $journal_problem[] = $record['field_problem_topic_tid'];        
      }
  echo json_encode($journal_problem);
}











function get_dashboard_project_load($limit,$page,$offset,$status=1,$taxo)

{

  global $user;
  $data_user = user_load($user->uid);

  // $result = db_select('field_data_field_organization_project', 'o')
  //             ->fields('o')
  //             ->condition('field_organization_project_tid', $data_user->field_organization['und'][0]['tid'] )
  //             ->execute();

  // foreach ($result as $key => $rows) {
  //     $project_id[] = $rows->entity_id;
  // }
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
  if($status == 1){
    if($taxo != 0){

    
      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fm.field_project_status_value', 1 ,"=" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
        $query->range($offset,$limit);
      $result_get_status = $query->execute();


      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fm.field_project_status_value', 1 ,"=" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
      $result_get = $query->execute();
    }else{
      $result_get_status = db_select('field_data_field_project_status', 'o')
        ->fields('o')
        ->condition('entity_id', $project_id ,"in" )
        ->condition('field_project_status_value', 1 ,"=" )
        ->range($offset,$limit)
        ->execute();

      $result_get = db_select('field_data_field_project_status', 'o')
        ->fields('o')
        ->condition('entity_id', $project_id ,"in" )
        ->condition('field_project_status_value', 1 ,"=" )
        ->execute();
    }
    $count_active_project = $result_get->rowCount();
  }else if($status == 2){
    if($taxo != 0){
      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fm.field_project_status_value', 0 ,"=" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
        $query->range($offset,$limit);
      $result_get_status = $query->execute();


      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fm.field_project_status_value', 0 ,"=" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
      $result_get = $query->execute();
    }
    else{
      $result_get_status = db_select('field_data_field_project_status', 'o')
          ->fields('o')
          ->condition('entity_id', $project_id ,"in" )
          ->condition('field_project_status_value', 0 ,"=" )
          ->range($offset,$limit)
          ->execute();
      $result_get = db_select('field_data_field_project_status', 'o')
          ->fields('o')
          ->condition('entity_id', $project_id ,"in" )
          ->condition('field_project_status_value', 0 ,"=" )
          ->execute();
    }
    $count_active_project = $result_get->rowCount();
  }else{
    if($taxo != 0){
      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
        $query->range($offset,$limit);
      $result_get_status = $query->execute();


      $query = db_select('field_data_field_project_status', 'fm');
        $query->join('field_data_field_problem_topic', 'fi', 'fm.entity_id = fi.entity_id');
        $query->fields('fm', array('entity_id'));
        $query->condition('fm.entity_id', $project_id ,"in" );
        $query->condition('fi.field_problem_topic_tid', $taxo , "=");
      $result_get = $query->execute();
    }
    else{
      $result_get_status = db_select('field_data_field_project_status', 'o')
          ->fields('o')
          ->condition('entity_id', $project_id ,"in" )
          ->range($offset,$limit)
          ->execute();
      $result_get = db_select('field_data_field_project_status', 'o')
          ->fields('o')
          ->condition('entity_id', $project_id ,"in" )
          ->execute();
    }
    $count_active_project = $result_get->rowCount();
  }
if($count_active_project>0){
$total_pages_project= ceil($count_active_project/12); 
}
if(empty($total_pages)){
    $total_pages = 0;
}
if(empty($total_pages_project)){
    $total_pages_project=0;
}
  
  // foreach ($result_get_status as $key => $value2) {
  //     if($value2->field_project_status_value == 1){
  //         $count_active_project += 1;
  //     }
  // }

  // print "<pre>";
  // print_r($count_active_project);
  // print "</pre>";




 foreach ($result_get_status as $key => $node) {
    // print "<pre>";
    // print_r($node->entity_id);
    // print "</pre>";

    $value = node_load($node->entity_id); 

    $user_data = user_load($value->uid);

    ?>

      <div class="col-xs-3 box__pad6" >

            <div  class="page1-4--box2 border--buttom__yellow" >

        <a href="/project/<?php print $value->nid; ?>">       

          <div class="thumbbox--wrap--img">

            <?php 
                if(empty($value->field_project_image['und'][0]['fid'])){ ?>
                    <img src="/sites/all/themes/changemakers/images/project1.jpg">
              <?php }else{ ?> 
                 <img width="150" src="<?php print image_style_url('cover-image',$value->field_project_image['und'][0]['uri']); ?>">
             <?php }

              ?>

            

          </div>

        </a>              

          <div   class="field--content boxover">    

            <div class="detail__small d__inline-block">

            <a href="/project/<?php print $value->nid; ?>"> 

              <div class="linelimit__2"><h4 class="headline__thaisan"><?php print $value->title; ?></h4></div>

            </a>
            <div>
              <a href="/user/<?php print $user_data->uid; ?>">
              <p><?php print changemakers_get_contact($user_data->uid); //$user_data->name; ?></p>
              </a>
            </div>

            <span class="icon-clock txt__gray2"></span> <?php $date_c_p = date("y-m-d H:s ",$value->changed);

            print timeAgo($date_c_p); ?>

              </div>
          </div>
        </div>
      </div>

      

<?php } ?>


<?php if($count_active_project > 12 &&  $offset < $total_pages_project){ ?>
<div class="col-xs-12">
<div align="center">
  <input type="hidden" id="total_pages_project" value="<?php print $total_pages_project;  ?>">
<button onclick="load_project_dashboard(<?php print $status; ?>, <?php print $taxo; ?>, <?php print $total_pages_project; ?> )" class="btn btn-primary" id="load_project_more_button">Load More</button>
<div class="animation_image_project" style="display:none;"><img src="/sites/all/themes/changemakers/images/loading3.gif"></div>
</div>
</div>
<?php } ?>


<?php 

  



}
// function duedate_community($duedate="")
// {
//   $now = strtotime("now");
//   $duedate_convert = strtotime("$duedate");
//   if($duedate>$now){
//     return 1;
//   }else{
//     return 0;
//   }

// }

function changemakers_project_view(){
  $nid = arg(2);

  db_update('field_data_field_count_views_project')
    ->expression('field_count_views_project_value', ' field_count_views_project_value + :count', array(':count' => 1))
    ->condition('entity_id', $nid)
    ->execute();
    
  $result = db_select('field_data_field_count_views_project', 'n')
    ->fields('n')
    ->condition('entity_id', $nid,'=')
    ->execute()
    ->fetchAssoc();

  echo json_encode(array('status'=>1,'value'=>$result['field_count_views_project_value']));

}
function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y.',
        'm' => 'm.',
        'w' => 'w.',
        'd' => 'd.',
        'h' => 'h.',
        'i' => 'm.',
        's' => 's.',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string)  : 'just now';
}


?>


<?php 
print "<pre>";
print_r("hellow");
print "</pre>";
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

////////////////////// User ///////////////////////////////////////////
// $json = file_get_contents('http://innerview.devfunction.com/cmk_user.php');
// $obj = json_decode($json);
// for ($i=0; $i < count($obj) ; $i++) { 



// $profile = user_load($obj[$i]->uid);

// if(empty($profile)){

//    $fields = array(
//    'uid' => $obj[$i]->uid,
//     'name' => $obj[$i]->name,
//     'mail' => $obj[$i]->mail,
//     'pass' => $obj[$i]->pass,
//     'created' => $obj[$i]->created,
//     'signature_format' => "full_html",
//     'status' => 1,
//     'init' => $obj[$i]->mail,
//     'roles' => array(
//       DRUPAL_AUTHENTICATED_RID => 'authenticated user',
//     ),
//   );
 
//  //  //the first parameter is left blank so a new user is created
//  user_save('', $fields);

//   //user_delete_multiple(array(236));



// }
// $profile = user_load($obj[$i]->uid);
// if(!empty($obj[$i]->image)):
// $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://pictures/', TRUE);
//   if(!empty($profile)){
//   	$profile->picture->fid = $file_info->fid;
//   }
//   endif;

//   $myuserroles = $profile->roles; 
// 	$myuserroles[10]  = 'unverified'; 
//   $cnt_inter = count($obj[$i]->interest);
//   $x=0;
// for ($j=0; $j < $cnt_inter; $j++) { 
//   $result = db_select('taxonomy_term_data', 't')
//     ->fields('t')
//     ->condition('name',  $obj[$i]->interest[$j],'=')
//     ->execute()
//     ->fetchAssoc();

//     $result2 = db_select('taxonomy_term_hierarchy', 't')
//     ->fields('t')
//     ->condition('parent',  $result['tid'],'=')
//     ->execute();
//      $profile->field_profile_problem_interest['und'][$x]['tid']= $result['tid'];
//      while($record = $result2->fetchAssoc()) {
//       if(!empty($record)){
//         $x++;
//         $profile->field_profile_problem_interest['und'][$x]['tid']= $record['tid'];
//       }
//   //   print "<pre>";
//   // print_r($record);
//   // print "</pre>";
//     }
   
//   // print "<pre>";
//   // print_r($result);
//   // print "</pre>";
// }
	

//   	$profile->field_profile_title['und'][0]['value'] = $obj[$i]->title;
//   	$profile->field_profile_firstname['und'][0]['value'] = $obj[$i]->firstname;
//   	$profile->field_profile_lastname['und'][0]['value'] = $obj[$i]->lastname;
//   	$profile->field_profile_birthdate['und'][0]['value'] = $obj[$i]->birthday;
//   	$profile->field_profile_address['und'][0]['value'] = $obj[$i]->address;
//   	$profile->field_profile_social_name['und'][0]['value'] = $obj[$i]->social;
//   	$profile->field_profile_contact['und'][0]['value'] = $obj[$i]->contact;
//   	$profile->field_profile_phone['und'][0]['value'] = $obj[$i]->phone;
//   	$profile->field_profile_institution['und'][0]['value'] = $obj[$i]->education_institution;
//   	$profile->field_profile_faculty['und'][0]['value'] = $obj[$i]->education_faculty;
//   	$profile->field_profile_major['und'][0]['value'] = $obj[$i]->education_major;
//   	$profile->field_intro_self['und'][0]['value'] = $obj[$i]->intro;

// 	module_invoke('user', 'save', $profile, array('roles' => $myuserroles)); 
//    user_save($profile);
//    echo $profile->uid.". OK<br>";
// //   }
// }






// $profile = user_load(240);
//   print "<pre>";
// print_r($profile);
// print "</pre>";




// db_insert('users')
//     ->fields(array(
//       'uid' => $account->uid,
//       'name' => $obj->,
//       'pass' => $obj->,
//       'mail' => $obj->,
//       'theme' => $obj->,
//       'signature' => 1,
//       'signature_format' => $obj->,
//       'created' => $obj->,
//       'access' => $obj->,
//       'login' => $obj->,
//       'status' => $obj->,
//       'timezone' => $obj->,
//       'language' => $obj->,
//       'picture' => $obj->,
//       'init' => $obj->,
//       'init' => $obj->,
      
//     ))
//     ->execute();

// End USER /////////////////////////////////


////////////////////// Start News ///////////////
// $json = file_get_contents('http://innerview.devfunction.com/cmk_news.php');
// $obj = json_decode($json);
//  for ($i=0; $i < count($obj) ; $i++) { 
// $node = new stdClass();
//   //$node = node_load(248);

//   $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://', TRUE);

// if(empty($obj[$i]->changed)){
//   $changed = $obj[$i]->created;
// }else{
//   $changed= $obj[$i]->changed;
// }
//   $cnt_hastag = count($obj[$i]->hastag);
//   $x=0;
// for ($j=0; $j < $cnt_hastag; $j++) { 
//   $result = db_select('taxonomy_term_data', 't')
//     ->fields('t')
//     ->condition('name',  $obj[$i]->hastag[$j],'=')
//     ->condition('vid',  9,'=')
//     ->execute()
//     ->fetchAssoc();

//   if(empty($result)){
//       $term = new stdClass();
//       $term->name = $obj[$i]->hastag[$j];
//       $term->vid = 9;
//       taxonomy_term_save($term);
     
//       $node->field_hashtags['und'][$j]['tid'] = $term->tid;
//   }else{
//      $node->field_hashtags['und'][$j]['tid'] = $result['tid'];
//   }
//   //   print "<pre>";
//   // print_r($result);
//   // print "</pre>";
// }
   
//   // print "<pre>";
//   // print_r($result);
//   // print "</pre>";
  



// $node->type = "news";
// $node->title = $obj[$i]->title;
// $node->status = $obj[$i]->active;
// $node->language = "und";
// $node->promote = 0;
// $node->comment = 1;
// $node->created = $obj[$i]->created;
// $node->changed = $changed;
// $node->body['und'][0]['value']=$obj[$i]->content;
// $node->body['und'][0]['format'] = "full_html";
// $node->field_picture['und'][0]['fid'] = $file_info->fid;
// $node->uid = $obj[$i]->author_id;
// $node->field_news_event_type['und'][0]['value'] = $obj[$i]->type;
// if(!empty($obj[$i]->start_time)):
// $node->field_news_event_date['und'][0]['value']= $obj[$i]->start_time;
// endif;
// node_submit($node);
// node_save($node);
//   $result_node = db_select('node', 'n')
//     ->fields('n')
//     ->condition('title', $obj[$i]->title,'=')
//     ->execute()
//     ->fetchAssoc();

//   $num_updated = db_update('node') // Table name no longer needs {}
//   ->fields(array(
//     'changed' => $changed,
//     'created' => $obj[$i]->created,
//   ))
//   ->condition('nid', $result_node['nid'], '=')
//   ->execute();
//   echo "$i. OK<br>";
  
// // echo $changed;
// //   print_r($result_node);
// //   print_r($num_updated);


// }



// //   print "<pre>";
// // print_r($obj);
// // print "</pre>";
// $node = node_load(10);
//   print "<pre>";
// print_r($node);
// print "</pre>";
//////////////////////////// End news //////////


// ////////////////// Start Event ///////////////
// $json = file_get_contents('http://innerview.devfunction.com/cmk_event.php');
// $obj = json_decode($json);


//  for ($i=0; $i < count($obj) ; $i++) { 
// $node = new stdClass();
//   //$node = node_load(248);

//   $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://', TRUE);

// if(empty($obj[$i]->changed)){
//   $changed = $obj[$i]->created;
// }else{
//   $changed= $obj[$i]->changed;
// }
//   $cnt_hastag = count($obj[$i]->hastag);
//   $x=0;
// for ($j=0; $j < $cnt_hastag; $j++) { 
//   $result = db_select('taxonomy_term_data', 't')
//     ->fields('t')
//     ->condition('name',  $obj[$i]->hastag[$j],'=')
//     ->condition('vid',  9,'=')
//     ->execute()
//     ->fetchAssoc();

//   if(empty($result)){
//       $term = new stdClass();
//       $term->name = $obj[$i]->hastag[$j];
//       $term->vid = 9;
//       taxonomy_term_save($term);
     
//       $node->field_hashtags['und'][$j]['tid'] = $term->tid;
//   }else{
//      $node->field_hashtags['und'][$j]['tid'] = $result['tid'];
//   }
//   //   print "<pre>";
//   // print_r($result);
//   // print "</pre>";
// }
   
//   // print "<pre>";
//   // print_r($result);
//   // print "</pre>";
  



// $node->type = "event";
// $node->title = $obj[$i]->title;
// $node->status = $obj[$i]->active;
// $node->language = "und";
// $node->promote = 0;
// $node->comment = 1;
// $node->created = $obj[$i]->created;
// $node->changed = $changed;
// $node->body['und'][0]['value']=$obj[$i]->content;
// $node->body['und'][0]['format'] = "full_html";
// $node->field_picture['und'][0]['fid'] = $file_info->fid;
// $node->uid = $obj[$i]->author_id;
// $node->field_event_status['und'][0]['value'] = $obj[$i]->active;
// $node->field_event_facilities['und'][0]['value'] = $obj[$i]->location;
// $node->field_news_event_type['und'][0]['value'] = $obj[$i]->type;
// if(!empty($obj[$i]->start_time)):
// $node->field_news_event_date['und'][0]['value']= $obj[$i]->start_time;
// endif;
// if(!empty($obj[$i]->end_time)):
// $node->field_news_event_date['und'][0]['value1']= $obj[$i]->end_time;
// endif;
// if($obj[$i]->question[0]):
// $node->field_question_1['und'][0]['value']= $obj[$i]->question[0];
// endif;
// if($obj[$i]->question[1]):
// $node->field_question_2['und'][0]['value']= $obj[$i]->question[1];
// endif;
// if($obj[$i]->question[2]):
// $node->field_question_3['und'][0]['value']= $obj[$i]->question[2];
// endif;
// if($obj[$i]->question[3]):
// $node->field_question_4['und'][0]['value']= $obj[$i]->question[3];
// endif;
// if($obj[$i]->question[4]):
// $node->field_question_5['und'][0]['value']= $obj[$i]->question[4];
// endif;


// node_submit($node);
// node_save($node);

//   // $result_node = db_select('node', 'n')
//   //   ->fields('n')
//   //   ->condition('title', $obj[$i]->title,'=')
//   //   ->execute()
//   //   ->fetchAssoc();

//   $num_updated = db_update('node') // Table name no longer needs {}
//   ->fields(array(
//     'changed' => $changed,
//     'created' => $obj[$i]->created,
//   ))
//   ->condition('nid', $node->nid, '=')
//   ->execute();
  
  
// // echo $changed;
// //   print_r($result_node);
// //   print_r($num_updated);

//   foreach ($obj[$i]->comment as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//     $comment = new stdClass();
//     $comment->nid = $node->nid; // nid of a node you want to attach a comment to
//     $comment->uid = $value->author_id; // user's id, who left the comment
//     $comment->cid = 0; // leave it as is
//     $comment->pid = 0; // parent comment id, 0 if none 
//     $comment->created = $value->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
//     $comment->language = "und"; // The same as for a node
//     $comment->comment_body[$comment->language][0]['value'] = $value->content; // Everything here is pretty much like with a node
//     $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
//     // print "<pre>";
//     // print_r($comment);
//     // print "</pre>";
//     comment_submit($comment); // saving a comment
//     comment_save($comment);
//   }

//   foreach ($obj[$i]->user_join as $key => $value) {
//     module_load_include('inc','webform','includes/webform.submissions');
//       $web_form = node_load(3);
//       $data = array(
//         1 => array('0' => $value->uid),
//         2 => array('0' => $node->nid),
//         3 => array('0' => $value->ans[0]),
//         4 => array('0' => $value->ans[1]),
//         5 => array('0' => $value->ans[2]),
//         6 => array('0' => $value->ans[3]),
//         7 => array('0' => $value->ans[4]),
//         );
//       $submission = (object) array(
//         // 'nid' => 1,
//         'uid' => $value->uid,
//         'is_draft' => FALSE,
//         'data' => $data,
//       );
//       // print "<pre>";
//       // print_r($_POST['submitted']);
//       // print "</pre>";
//       $submission = webform_submission_insert($web_form,$submission);
//   }
// echo "$i. $result_node[nid]<br>";
// }



// //   print "<pre>";
// // print_r($obj);
// // print "</pre>";
// // $node = node_load(66);
// //   print "<pre>";
// // print_r($node);
// //  print "</pre>";
// ////////////////////////// End Event //////////


////////////////// Start Knowledge ///////////////
// $json = file_get_contents('http://innerview.devfunction.com/cmk_knowledge.php');
// $obj = json_decode($json);

// // foreach ($obj as $key => $value) {
// // 	echo $value->title."<BR>";
// // }
//  for ($i=0; $i < count($obj) ; $i++) { 
// $node = new stdClass();
//   //$node = node_load(248);

// $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://', TRUE);

// if(empty($obj[$i]->changed)){
//   $changed = $obj[$i]->created;
// }else{
//   $changed= $obj[$i]->changed;
// }
//   $cnt_hastag = count($obj[$i]->hastag);
//   $x=0;
// for ($j=0; $j < $cnt_hastag; $j++) { 
//   $result = db_select('taxonomy_term_data', 't')
//     ->fields('t')
//     ->condition('name',  $obj[$i]->hastag[$j],'=')
//     ->condition('vid',  1,'=')
//     ->execute()
//     ->fetchAssoc();

//   if(empty($result)){
//       // $term = new stdClass();
//       // $term->name = $obj[$i]->hastag[$j];
//       // $term->vid = 9;
//       // taxonomy_term_save($term);
     
//       // $node->field_hashtags['und'][$j]['tid'] = $term->tid;
//   }else{
//      $node->field_knowledge_type['und'][$x]['tid'] = $result['tid'];
//      $x++;
//   }
//   //   print "<pre>";
//   // print_r($result);
//   // print "</pre>";
// }
   
//   // print "<pre>";
//   // print_r($result);
//   // print "</pre>";
  



// $node->type = "knowledge";
// $node->title = $obj[$i]->title;
// $node->status = $obj[$i]->active;
// $node->language = "und";
// $node->promote = 0;
// $node->comment = 1;
// $node->created = $obj[$i]->created;
// $node->changed = $changed;
// $node->body['und'][0]['value']=$obj[$i]->content;
// $node->body['und'][0]['format'] = "full_html";
// $node->field_knowledge_image['und'][0]['fid'] = $file_info->fid;
// $node->uid = $obj[$i]->author_id;
// $z = 0;
// foreach ($obj[$i]->file as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//    $url = $value->url;
//     //I have used picture folder to store images using image field settings
//     $file_info = system_retrieve_file($url, 'public://', TRUE);

//      $file = db_update('file_managed') // Table name no longer needs {}
//     ->fields(array(
//       'filename' => $value->name,
//     ))
//     ->condition('fid', $file_info->fid, '=')
//     ->execute();

//     $node->field_knowledge_document['und'][$z]['fid']=$file_info->fid;
//     $node->field_knowledge_document['und'][$z]['display']=1;
//     $z++;
  
//   }
// $y = 0;
//   foreach ($obj[$i]->image_data as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//     $url = $value->url;
//     //I have used picture folder to store images using image field settings
//     $file_info = system_retrieve_file($url, 'public://', TRUE);
//      $file = db_update('file_managed') // Table name no longer needs {}
//     ->fields(array(
//       'filename' => $value->name,
//     ))
//     ->condition('fid', $file_info->fid, '=')
//     ->execute();
//     $node->field_other_picture['und'][$y]['fid']=$file_info->fid;
//     $node->field_other_picture['und'][$y]['display']=1;
//     $y++;
//   }

// //   print "<pre>";
// // print_r($node);
// // print "</pre>";

// node_submit($node);
// node_save($node);

//   // $result_node = db_select('node', 'n')
//   //   ->fields('n')
//   //   ->condition('title', $obj[$i]->title,'=')
//   //   ->execute()
//   //   ->fetchAssoc();

//   $num_updated = db_update('node') // Table name no longer needs {}
//   ->fields(array(
//     'changed' => $changed,
//     'created' => $obj[$i]->created,
//   ))
//   ->condition('nid', $node->nid, '=')
//   ->execute();

 
  
// // echo $changed;
// //   print_r($result_node);
// //   print_r($num_updated);

//   foreach ($obj[$i]->comment as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//     $comment = new stdClass();
//     $comment->nid = $node->nid; // nid of a node you want to attach a comment to
//     $comment->uid = $value->author_id; // user's id, who left the comment
//     $comment->cid = 0; // leave it as is
//     $comment->pid = 0; // parent comment id, 0 if none 
//     $comment->created = $value->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
//     $comment->language = "und"; // The same as for a node
//     $comment->comment_body[$comment->language][0]['value'] = $value->content; // Everything here is pretty much like with a node
//     $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
//     // print "<pre>";
//     // print_r($comment);
//     // print "</pre>";
//     comment_submit($comment); // saving a comment
//     comment_save($comment);
//   }




// echo "$i. <a href='/node/$node->nid' target='_blank'> $node->title</a><br>";
// }



//   print "<pre>";
// print_r($obj);
// print "</pre>";
//  $node = node_load(825);
//   print "<pre>";
// print_r($node);
//  print "</pre>";
////////////////////////// End Knowledge //////////


// ////////////////// Start Community ///////////////
// $json = file_get_contents('http://innerview.devfunction.com/cmk_community.php');
// $obj = json_decode($json);


//  for ($i=0; $i < count($obj) ; $i++) { 
// $node = new stdClass();
//   //$node = node_load(248);

// $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://', TRUE);

// if(empty($obj[$i]->changed)){
//   $changed = $obj[$i]->created;
// }else{
//   $changed= $obj[$i]->changed;
// }
//   $cnt_hastag = count($obj[$i]->hastag);
//   $x=0;
// for ($j=0; $j < $cnt_hastag; $j++) { 
//   $result = db_select('taxonomy_term_data', 't')
//     ->fields('t')
//     ->condition('name',  $obj[$i]->hastag[$j],'=')
//     ->condition('vid',  8,'=')
//     ->execute()
//     ->fetchAssoc();

//   if(empty($result)){
//       // $term = new stdClass();
//       // $term->name = $obj[$i]->hastag[$j];
//       // $term->vid = 9;
//       // taxonomy_term_save($term);
     
//       // $node->field_hashtags['und'][$j]['tid'] = $term->tid;
//   }else{
//      $node->field_community_forum_topic_type['und'][$x]['tid'] = $result['tid'];
//      $x++;
//   }
//   //   print "<pre>";
//   // print_r($result);
//   // print "</pre>";
// }
   
//   // print "<pre>";
//   // print_r($result);
//   // print "</pre>";
  



// $node->type = "forum";
// $node->title = $obj[$i]->title;
// $node->status = $obj[$i]->active;
// $node->language = "und";
// $node->promote = 0;
// $node->comment = 1;
// $node->created = $obj[$i]->created;
// $node->changed = $changed;
// $node->body['und'][0]['value']=$obj[$i]->content;
// $node->body['und'][0]['format'] = "full_html";
// $node->field_commuity_image['und'][0]['fid'] = $file_info->fid;
// $node->uid = $obj[$i]->author_id;
// $node->field_community_status['und'][0]['value'] = $obj[$i]->active;
// $node->taxonomy_forums['und'][0]['tid'] = 1;
// // $z = 0;
// // foreach ($obj[$i]->file as $key => $value) {
// //      // print_r($value);
// //      // echo $value->author_id;
// //    $url = $value->url;
// //     //I have used picture folder to store images using image field settings
// //     $file_info = system_retrieve_file($url, 'public://', TRUE);

// //      $file = db_update('file_managed') // Table name no longer needs {}
// //     ->fields(array(
// //       'filename' => $value->name,
// //     ))
// //     ->condition('fid', $file_info->fid, '=')
// //     ->execute();

// //     $node->field_knowledge_document['und'][$z]['fid']=$file_info->fid;
// //     $node->field_knowledge_document['und'][$z]['display']=1;
// //     $z++;
  
// //   }
// // $y = 0;
// //   foreach ($obj[$i]->image_data as $key => $value) {
// //      // print_r($value);
// //      // echo $value->author_id;
// //     $url = $value->url;
// //     //I have used picture folder to store images using image field settings
// //     $file_info = system_retrieve_file($url, 'public://', TRUE);
// //      $file = db_update('file_managed') // Table name no longer needs {}
// //     ->fields(array(
// //       'filename' => $value->name,
// //     ))
// //     ->condition('fid', $file_info->fid, '=')
// //     ->execute();
// //     $node->field_other_picture['und'][$y]['fid']=$file_info->fid;
// //     $node->field_other_picture['und'][$y]['display']=1;
// //     $y++;
// //   }

// // //   print "<pre>";
// // // print_r($node);
// // // print "</pre>";

// node_submit($node);
// node_save($node);

// //   // $result_node = db_select('node', 'n')
// //   //   ->fields('n')
// //   //   ->condition('title', $obj[$i]->title,'=')
// //   //   ->execute()
// //   //   ->fetchAssoc();

//   $num_updated = db_update('node') // Table name no longer needs {}
//   ->fields(array(
//     'changed' => $changed,
//     'created' => $obj[$i]->created,
//   ))
//   ->condition('nid', $node->nid, '=')
//   ->execute();

 
  
// // // echo $changed;
// // //   print_r($result_node);
// // //   print_r($num_updated);

//   foreach ($obj[$i]->comment as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//     $comment = new stdClass();
//     $comment->nid = $node->nid; // nid of a node you want to attach a comment to
//     $comment->uid = $value->author_id; // user's id, who left the comment
//     $comment->cid = 0; // leave it as is
//     $comment->pid = 0; // parent comment id, 0 if none 
//     $comment->created = $value->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
//     $comment->language = "und"; // The same as for a node
//     $comment->comment_body[$comment->language][0]['value'] = $value->content; // Everything here is pretty much like with a node
//     $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
//     // print "<pre>";
//     // print_r($comment);
//     // print "</pre>";
//     comment_submit($comment); // saving a comment
//     comment_save($comment);
//   }




// echo "$i. $node->nid<br>";
// }



// //   print "<pre>";
// // print_r($obj);
// // print "</pre>";
// //  $node = node_load(34);
// //   print "<pre>";
// // print_r($node);
// //  print "</pre>";
// ////////////////////////// End Community //////////


// ////////////////// Start Campaign ///////////////
// //  $user = user_load(1);
// //   print "<pre>";
// // print_r($user);
// //  print "</pre>";
// //  exit();
// $json = file_get_contents('http://innerview.devfunction.com/cmk_campaign.php');
// $obj = json_decode($json);


//   for ($i=0; $i < count($obj) ; $i++) { 
//  $node = new stdClass();
// //   //$node = node_load(248);

// $url = $obj[$i]->image;
// //I have used picture folder to store images using image field settings
// $file_info = system_retrieve_file($url, 'public://', TRUE);

// if(empty($obj[$i]->changed)){
//   $changed = $obj[$i]->created;
// }else{
//   $changed= $obj[$i]->changed;
// }
// //   $cnt_hastag = count($obj[$i]->hastag);
// //   $x=0;
// // for ($j=0; $j < $cnt_hastag; $j++) { 
// //   $result = db_select('taxonomy_term_data', 't')
// //     ->fields('t')
// //     ->condition('name',  $obj[$i]->hastag[$j],'=')
// //     ->condition('vid',  8,'=')
// //     ->execute()
// //     ->fetchAssoc();

// //   if(empty($result)){
// //       // $term = new stdClass();
// //       // $term->name = $obj[$i]->hastag[$j];
// //       // $term->vid = 9;
// //       // taxonomy_term_save($term);
     
// //       // $node->field_hashtags['und'][$j]['tid'] = $term->tid;
// //   }else{
// //      $node->field_community_forum_topic_type['und'][$x]['tid'] = $result['tid'];
// //      $x++;
// //   }
// //   //   print "<pre>";
// //   // print_r($result);
// //   // print "</pre>";
// // }
   
// //   // print "<pre>";
// //   // print_r($result);
// //   // print "</pre>";
  



// $node->type = "campaign";
// $node->title = $obj[$i]->title;
// $node->status = $obj[$i]->active;
// $node->language = "und";
// $node->promote = 0;
// $node->comment = 1;
// $node->created = $obj[$i]->created;
// $node->changed = $changed;
// $node->body['und'][0]['value']=$obj[$i]->content;
// $node->body['und'][0]['format'] = "full_html";
// $node->field_campaign_image['und'][0]['fid'] = $file_info->fid;
// $node->uid = $obj[$i]->author_id;
// $node->field_campaign_active['und'][0]['value'] = $obj[$i]->active;
// $node->taxonomy_forums['und'][0]['tid'] = 1;
// $node->field_campaign_date['und'][0]['value']= $obj[$i]->start_date;
// $node->field_campaign_stage['und'][0]['value']= $obj[$i]->status;
// $node->field_count_views['und'][0]['value']= $obj[$i]->view_count;
// // Add Project 
// $pj= 0;
// $pj_id= array();
// foreach ($obj[$i]->project_joint as $key => $value) {
// 	 	$node_project = new stdClass();

// 		$url = $value->logo;
// 		//I have used picture folder to store images using image field settings
// 		$file_info = system_retrieve_file($url, 'public://', TRUE);

// 		if(empty($value->changed)){
// 		  $changed = $value->created;
// 		}else{
// 		  $changed= $value->changed;
// 		}

// 		$node_project->type = "project";
// 		$node_project->title = $value->title;
// 		$node_project->status = $value->active;
// 		$node_project->language = "und";
// 		$node_project->promote = 0;
// 		$node_project->comment = 1;
// 		$node_project->created = $value->created;
// 		$node_project->changed = $changed;
// 		$node_project->body['und'][0]['value']=$value->content;
// 		$node_project->body['und'][0]['format'] = "full_html";
// 		$node_project->field_project_image['und'][0]['fid'] = $file_info->fid;
// 		$node_project->uid = $value->author_id;
// 		$node_project->field_project_status['und'][0]['value'] = $value->active;
// 		$node_project->taxonomy_forums['und'][0]['tid'] = 1;
// 		$node_project->field_project_date['und'][0]['value']= $value->start_date;
// 		$node_project->field_count_views_project['und'][0]['value']= $value->view_count;
// 		$node_project->field_project_progress['und'][0]['value'] = $value->status;
// 		$node_project->field_describe_problem['und'][0]['value']= $value->problem;
// 		$node_project->field_project_solutions['und'][0]['value']= $value->solution;
// 		$node_project->field_project_impact['und'][0]['value']= $value->impact;
// 		$node_project->field_project_sustainability_pla['und'][0]['value']= $value->sustainability_plan;
// 		$node_project->field_project_background['und'][0]['value']= $value->about_team;
// 		$node_project->field_target_other['und'][0]['value'] = $value->market;
// 		$node_project->field_project_website['und'][0]['value'] = $value->website;
		

// 		$z = 0;
// 			foreach ($value->file as $key => $value2) {
// 			     // print_r($value);
// 			     // echo $value->author_id;
// 			   $url = $value2->url;
// 			    //I have used picture folder to store images using image field settings
// 			    $file_info = system_retrieve_file($url, 'public://', TRUE);

// 			     $file = db_update('file_managed') // Table name no longer needs {}
// 			    ->fields(array(
// 			      'filename' => $value2->name,
// 			    ))
// 			    ->condition('fid', $file_info->fid, '=')
// 			    ->execute();

// 			    $node_project->field_other_document_project['und'][$z]['fid']=$file_info->fid;
// 			    $node_project->field_other_document_project['und'][$z]['display']=1;
// 			    $z++;
			  
// 			  }

			


// 		node_submit($node_project);
// 		node_save($node_project);
// 		$pj_id[] = $node_project->nid;
// 		foreach ($value->user_follow as $key => $value_user_follow) {
// 			$u = user_load($value_user_follow);
//       		$u->field_following_project['und'][]['nid']= $node_project->nid;
//       		user_save($u);
//       		echo "User Follow : $u->uid<br>";
// 		}
		

// 		// $node->field_project_join['und'][$pj]['value'] = $field_collection_item->item_id;
// 		 echo "PJ: $pj. $node_project->nid : $node_project->title<br>";
// 		// $pj++;

// 		  $num_updated = db_update('node') // Table name no longer needs {}
// 		  ->fields(array(
// 		    'changed' => $changed,
// 		    'created' => $value->created,
// 		  ))
// 		  ->condition('nid', $node_project->nid, '=')
// 		  ->execute();

// 		 foreach ($value->user_join as $key => $value_user) {
// 		 	 module_load_include('inc','webform','includes/webform.submissions');
// 		     $web_form = node_load(2);
// 		        $data_user_join = array(
// 		          1 => array('0' => $value_user),
// 		          2 => array('0' => $node_project->nid),
// 		          3 => array('0' => 1),
// 		          );
// 		        $submission = (object) array(
// 		          // 'nid' => 1,
// 		          'uid' => $value_user,
// 		          'submitted' => REQUEST_TIME,
// 		          'remote_addr' => ip_address(),
// 		          'is_draft' => FALSE,
// 		          'data' => $data_user_join,
// 		        );



// 		        // print "<pre>";
// 		        // print_r($_POST['submitted']);
// 		        // print "</pre>";
// 		        $submission = webform_submission_insert($web_form,$submission);
// 		 }
		

// 		foreach ($value->feed as $key => $value3) {
// 			     // print_r($value);
// 			     // echo $value->author_id;
// 			    $comment = new stdClass();
// 			    $comment->nid = $node_project->nid; // nid of a node you want to attach a comment to
// 			    $comment->uid = $value3->author_id; // user's id, who left the comment
// 			    $comment->is_anonymous = 0; // leave it as is
// 			    $comment->subject = 'Comment Project'; 
// 			    $comment->cid = 0; // leave it as is
// 			    $comment->pid = 0; // parent comment id, 0 if none 
// 			    $comment->created = $value3->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 			    $comment->language = "und"; // The same as for a node
// 			    $comment->comment_body[$comment->language][0]['value'] = $value3->content; // Everything here is pretty much like with a node
// 			    $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 			    // print "<pre>";
// 			    // print_r($comment);
// 			    // print "</pre>";
// 			    comment_submit($comment); // saving a comment
// 			    comment_save($comment);
// 			    foreach ($value->comment as $key => $value4) {
// 			    	$comment_sub = new stdClass();
// 				    $comment_sub->nid = $node_project->nid; // nid of a node you want to attach a comment to
// 				    $comment_sub->uid = $value4->author_id; // user's id, who left the comment
// 				    $comment_sub->cid = 0; // leave it as is
// 				    $comment_sub->is_anonymous = 0; // leave it as is
// 			    	$comment_sub->subject = 'Comment Project'; 
// 				    $comment_sub->pid = $comment->cid; // parent comment id, 0 if none 
// 				    $comment_sub->created = $value4->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 				    $comment_sub->language = "und"; // The same as for a node
// 				    $comment_sub->comment_body[$comment->language][0]['value'] = $value4->content; // Everything here is pretty much like with a node
// 				    $comment_sub->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 				    // print "<pre>";
// 				    // print_r($comment);
// 				    // print "</pre>";
// 				    comment_submit($comment_sub); // saving a comment
// 				    comment_save($comment_sub);
// 			    }
			    

// 			  }
// 			  foreach ($value->community as $key => $value5) {
// 			    	 $node_com = new stdClass();
// 					  //$node = node_load(248);

// 					$url = $value5->image;
// 					//I have used picture folder to store images using image field settings
// 					$file_info = system_retrieve_file($url, 'public://', TRUE);

// 					if(empty($value5->changed)){
// 					  $changed = $value5->created;
// 					}else{
// 					  $changed= $value5->changed;
// 					}
// 					  $cnt_hastag = count($value5->hastag);
// 					  $x=0;
// 					for ($j=0; $j < $cnt_hastag; $j++) { 
// 					  $result = db_select('taxonomy_term_data', 't')
// 					    ->fields('t')
// 					    ->condition('name',  $value5->hastag[$j],'=')
// 					    ->condition('vid',  8,'=')
// 					    ->execute()
// 					    ->fetchAssoc();

// 					  if(empty($result)){
// 					      // $term = new stdClass();
// 					      // $term->name = $obj[$i]->hastag[$j];
// 					      // $term->vid = 9;
// 					      // taxonomy_term_save($term);
					     
// 					      // $node->field_hashtags['und'][$j]['tid'] = $term->tid;
// 					  }else{
// 					     $node_com->field_community_forum_topic_type['und'][$x]['tid'] = $result['tid'];
// 					     $x++;
// 					  }
// 					  //   print "<pre>";
// 					  // print_r($result);
// 					  // print "</pre>";
// 					}
					   
// 					  // print "<pre>";
// 					  // print_r($result);
// 					  // print "</pre>";
					  



// 					$node_com->type = "forum";
// 					$node_com->title = $value5->title;
// 					$node_com->status = $value5->active;
// 					$node_com->language = "und";
// 					$node_com->promote = 0;
// 					$node_com->comment = 1;
// 					$node_com->created = $value5->created;
// 					$node_com->changed = $changed;
// 					$node_com->field_community_project['und'][0]['nid']= $node_project->nid;
// 					$node_com->body['und'][0]['value']=$value5->content;
// 					$node_com->body['und'][0]['format'] = "full_html";
// 					$node_com->field_commuity_image['und'][0]['fid'] = $file_info->fid;
// 					$node_com->uid = $value5->author_id;
// 					$node_com->field_community_status['und'][0]['value'] = $value5->active;
// 					$node_com->taxonomy_forums['und'][0]['tid'] = 1;
// 					// $z = 0;
					
// 					// //   print "<pre>";
// 					// // print_r($node);
// 					// // print "</pre>";

// 					node_submit($node_com);
// 					node_save($node_com);
// 					echo "Com. $node_com->nid : $node_com->title<br>";
// 					//   // $result_node = db_select('node', 'n')
// 					//   //   ->fields('n')
// 					//   //   ->condition('title', $obj[$i]->title,'=')
// 					//   //   ->execute()
// 					//   //   ->fetchAssoc();

// 					  $num_updated = db_update('node') // Table name no longer needs {}
// 					  ->fields(array(
// 					    'changed' => $changed,
// 					    'created' => $value5->created,
// 					  ))
// 					  ->condition('nid', $node_com->nid, '=')
// 					  ->execute();

					 
					  
// 					// // echo $changed;
// 					// //   print_r($result_node);
// 					// //   print_r($num_updated);

// 					  foreach ($value5->comment as $key => $value6) {
// 					     // print_r($value);
// 					     // echo $value->author_id;
// 					    $comment = new stdClass();
// 					    $comment->nid = $node_com->nid; // nid of a node you want to attach a comment to
// 					    $comment->uid = $value6->author_id; // user's id, who left the comment
// 					    $comment->cid = 0; // leave it as is
// 					    $comment->pid = 0; // parent comment id, 0 if none 
// 					    $comment->is_anonymous = 0; // leave it as is
// 			    		$comment->subject = 'Comment Community'; 
// 					    $comment->created = $value6->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 					    $comment->language = "und"; // The same as for a node
// 					    $comment->comment_body[$comment->language][0]['value'] = $value6->content; // Everything here is pretty much like with a node
// 					    $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 					    // print "<pre>";
// 					    // print_r($comment);
// 					    // print "</pre>";
// 					    comment_submit($comment); // saving a comment
// 					    comment_save($comment);
// 					  }
// 			    }
// }



// // End Add project
// // // $z = 0;
// // // foreach ($obj[$i]->file as $key => $value) {
// // //      // print_r($value);
// // //      // echo $value->author_id;
// // //    $url = $value->url;
// // //     //I have used picture folder to store images using image field settings
// // //     $file_info = system_retrieve_file($url, 'public://', TRUE);

// // //      $file = db_update('file_managed') // Table name no longer needs {}
// // //     ->fields(array(
// // //       'filename' => $value->name,
// // //     ))
// // //     ->condition('fid', $file_info->fid, '=')
// // //     ->execute();

// // //     $node->field_knowledge_document['und'][$z]['fid']=$file_info->fid;
// // //     $node->field_knowledge_document['und'][$z]['display']=1;
// // //     $z++;
  
// // //   }
// $y = 0;
//   foreach ($obj[$i]->image_data as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//     $url = $value->url;
//     //I have used picture folder to store images using image field settings
//     $file_info = system_retrieve_file($url, 'public://', TRUE);
//      $file = db_update('file_managed') // Table name no longer needs {}
//     ->fields(array(
//       'filename' => $value->name,
//     ))
//     ->condition('fid', $file_info->fid, '=')
//     ->execute();
//     $node->field_sub_campaign_image['und'][$y]['fid']=$file_info->fid;
//     $node->field_sub_campaign_image['und'][$y]['display']=1;
//     $y++;
//   }

// // // //   print "<pre>";
// // // // print_r($node);
// // // // print "</pre>";

// node_submit($node);
// node_save($node);

// foreach ($pj_id as $key => $value) {
// 	$node = node_load($node->nid);
// 	$field_collection_item = entity_create('field_collection_item', array('field_name' => 'field_project_join'));
// 	$field_collection_item->field_join_project['und'][]['nid'] = $value;
// 	$field_collection_item->field_join_status['und'][]['value']= 1;//$item['id'];
// 	$field_collection_item->setHostEntity('node', $node);
// 	$field_collection_item->save();
// }


// // //   // $result_node = db_select('node', 'n')
// // //   //   ->fields('n')
// // //   //   ->condition('title', $obj[$i]->title,'=')
// // //   //   ->execute()
// // //   //   ->fetchAssoc();

// //   $num_updated = db_update('node') // Table name no longer needs {}
// //   ->fields(array(
// //     'changed' => $changed,
// //     'created' => $obj[$i]->created,
// //   ))
// //   ->condition('nid', $node->nid, '=')
// //   ->execute();

 
  
// // // // echo $changed;
// // // //   print_r($result_node);
// // // //   print_r($num_updated);

//   foreach ($obj[$i]->comment as $key => $value) {
//      // print_r($value);
//      // echo $value->author_id;
//       // echo $value->author_id;
// 			    $comment = new stdClass();
// 			    $comment->nid = $node->nid; // nid of a node you want to attach a comment to
// 			    $comment->uid = $value->author_id; // user's id, who left the comment
// 			    $comment->is_anonymous = 0; // leave it as is
// 			    $comment->subject = 'Comment Campaign'; 
// 			    $comment->cid = 0; // leave it as is
// 			    $comment->pid = 0; // parent comment id, 0 if none 
// 			    $comment->created = $value->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 			    $comment->language = "und"; // The same as for a node
// 			    $comment->comment_body[$comment->language][0]['value'] = $value->content; // Everything here is pretty much like with a node
// 			    $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 			    // print "<pre>";
// 			    // print_r($comment);
// 			    // print "</pre>";
// 			    comment_submit($comment); // saving a comment
// 			    comment_save($comment);
			    
// 			    foreach ($value->comment as $key => $value4) {
// 			    	$comment_sub = new stdClass();
// 				    $comment_sub->nid = $node->nid; // nid of a node you want to attach a comment to
// 				    $comment_sub->uid = $value4->author_id; // user's id, who left the comment
// 				    $comment_sub->cid = 0; // leave it as is
// 				    $comment_sub->is_anonymous = 0; // leave it as is
// 			    	$comment_sub->subject = 'Comment Campaign'; 
// 				    $comment_sub->pid = $comment->cid; // parent comment id, 0 if none 
// 				    $comment_sub->created = $value4->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 				    $comment_sub->language = "und"; // The same as for a node
// 				    $comment_sub->comment_body[$comment->language][0]['value'] = $value4->content; // Everything here is pretty much like with a node
// 				    $comment_sub->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 				    // print "<pre>";
// 				    // print_r($comment);
// 				    // print "</pre>";
// 				    comment_submit($comment_sub); // saving a comment
// 				    comment_save($comment_sub);
// 			    }
//   }




//  echo "$i. $node->nid<br><hr>";
//  }



// //   print "<pre>";
// // print_r($obj);
// // print "</pre>";

// ////////////////////////// End Community //////////

////////////////// Start Project ///////////////
//  $user = user_load(1);
//   print "<pre>";
// print_r($user);
//  print "</pre>";
//  exit();
// $json = file_get_contents('http://innerview.devfunction.com/cmk_project.php');
// $obj = json_decode($json);


// foreach ($obj as $key => $value) {
// 	 	$node_project = new stdClass();

// 		$url = $value->logo;
// 		//I have used picture folder to store images using image field settings
// 		$file_info = system_retrieve_file($url, 'public://', TRUE);

// 		if(empty($value->changed)){
// 		  $changed = $value->created;
// 		}else{
// 		  $changed= $value->changed;
// 		}

// 		$node_project->type = "project";
// 		$node_project->title = $value->title;
// 		$node_project->status = $value->active;
// 		$node_project->language = "und";
// 		$node_project->promote = 0;
// 		$node_project->comment = 1;
// 		$node_project->created = $value->created;
// 		$node_project->changed = $changed;
// 		$node_project->body['und'][0]['value']=$value->content;
// 		$node_project->body['und'][0]['format'] = "full_html";
// 		$node_project->field_project_image['und'][0]['fid'] = $file_info->fid;
// 		$node_project->uid = $value->author_id;
// 		$node_project->field_project_status['und'][0]['value'] = $value->active;
// 		$node_project->taxonomy_forums['und'][0]['tid'] = 1;
// 		$node_project->field_project_date['und'][0]['value']= $value->start_date;
// 		$node_project->field_count_views_project['und'][0]['value']= $value->view_count;
// 		$node_project->field_project_progress['und'][0]['value'] = $value->status;
// 		$node_project->field_describe_problem['und'][0]['value']= $value->problem;
// 		$node_project->field_project_solutions['und'][0]['value']= $value->solution;
// 		$node_project->field_project_impact['und'][0]['value']= $value->impact;
// 		$node_project->field_project_sustainability_pla['und'][0]['value']= $value->sustainability_plan;
// 		$node_project->field_project_background['und'][0]['value']= $value->about_team;
// 		$node_project->field_target_other['und'][0]['value'] = $value->market;
// 		$node_project->field_project_website['und'][0]['value'] = $value->website;
		

// 		$z = 0;
// 			foreach ($value->file as $key => $value2) {
// 			     // print_r($value);
// 			     // echo $value->author_id;
// 			   $url = $value2->url;
// 			    //I have used picture folder to store images using image field settings
// 			    $file_info = system_retrieve_file($url, 'public://', TRUE);

// 			     $file = db_update('file_managed') // Table name no longer needs {}
// 			    ->fields(array(
// 			      'filename' => $value2->name,
// 			    ))
// 			    ->condition('fid', $file_info->fid, '=')
// 			    ->execute();

// 			    $node_project->field_other_document_project['und'][$z]['fid']=$file_info->fid;
// 			    $node_project->field_other_document_project['und'][$z]['display']=1;
// 			    $z++;
			  
// 			  }

			


// 		node_submit($node_project);
// 		node_save($node_project);
// 		$pj_id[] = $node_project->nid;
// 		foreach ($value->user_follow as $key => $value_user_follow) {
// 			$u = user_load($value_user_follow);
//       		$u->field_following_project['und'][]['nid']= $node_project->nid;
//       		user_save($u);
//       		echo "User Follow : $u->uid<br>";
// 		}
		

// 		// $node->field_project_join['und'][$pj]['value'] = $field_collection_item->item_id;
// 		 echo "PJ:  $node_project->nid : $node_project->title<br>";
// 		// $pj++;

// 		  $num_updated = db_update('node') // Table name no longer needs {}
// 		  ->fields(array(
// 		    'changed' => $changed,
// 		    'created' => $value->created,
// 		  ))
// 		  ->condition('nid', $node_project->nid, '=')
// 		  ->execute();

// 		 foreach ($value->user_join as $key => $value_user) {
// 		 	 module_load_include('inc','webform','includes/webform.submissions');
// 		     $web_form = node_load(2);
// 		        $data_user_join = array(
// 		          1 => array('0' => $value_user),
// 		          2 => array('0' => $node_project->nid),
// 		          3 => array('0' => 1),
// 		          );
// 		        $submission = (object) array(
// 		          // 'nid' => 1,
// 		          'uid' => $value_user,
// 		          'submitted' => REQUEST_TIME,
// 		          'remote_addr' => ip_address(),
// 		          'is_draft' => FALSE,
// 		          'data' => $data_user_join,
// 		        );



// 		        // print "<pre>";
// 		        // print_r($_POST['submitted']);
// 		        // print "</pre>";
// 		        $submission = webform_submission_insert($web_form,$submission);
// 		 }
		

// 		foreach ($value->feed as $key => $value3) {
// 			     // print_r($value);
// 			     // echo $value->author_id;
// 			    $comment = new stdClass();
// 			    $comment->nid = $node_project->nid; // nid of a node you want to attach a comment to
// 			    $comment->uid = $value3->author_id; // user's id, who left the comment
// 			    $comment->is_anonymous = 0; // leave it as is
// 			    $comment->subject = 'Comment Project'; 
// 			    $comment->cid = 0; // leave it as is
// 			    $comment->pid = 0; // parent comment id, 0 if none 
// 			    $comment->created = $value3->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 			    $comment->language = "und"; // The same as for a node
// 			    $comment->comment_body[$comment->language][0]['value'] = $value3->content; // Everything here is pretty much like with a node
// 			    $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 			    // print "<pre>";
// 			    // print_r($comment);
// 			    // print "</pre>";
// 			    comment_submit($comment); // saving a comment
// 			    comment_save($comment);
// 			    foreach ($value->comment as $key => $value4) {
// 			    	$comment_sub = new stdClass();
// 				    $comment_sub->nid = $node_project->nid; // nid of a node you want to attach a comment to
// 				    $comment_sub->uid = $value4->author_id; // user's id, who left the comment
// 				    $comment_sub->cid = 0; // leave it as is
// 				    $comment_sub->is_anonymous = 0; // leave it as is
// 			    	$comment_sub->subject = 'Comment Project'; 
// 				    $comment_sub->pid = $comment->cid; // parent comment id, 0 if none 
// 				    $comment_sub->created = $value4->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 				    $comment_sub->language = "und"; // The same as for a node
// 				    $comment_sub->comment_body[$comment->language][0]['value'] = $value4->content; // Everything here is pretty much like with a node
// 				    $comment_sub->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 				    // print "<pre>";
// 				    // print_r($comment);
// 				    // print "</pre>";
// 				    comment_submit($comment_sub); // saving a comment
// 				    comment_save($comment_sub);
// 			    }
			    

// 			  }
// 			  foreach ($value->community as $key => $value5) {
// 			    	 $node_com = new stdClass();
// 					  //$node = node_load(248);

// 					$url = $value5->image;
// 					//I have used picture folder to store images using image field settings
// 					$file_info = system_retrieve_file($url, 'public://', TRUE);

// 					if(empty($value5->changed)){
// 					  $changed = $value5->created;
// 					}else{
// 					  $changed= $value5->changed;
// 					}
// 					  $cnt_hastag = count($value5->hastag);
// 					  $x=0;
// 					for ($j=0; $j < $cnt_hastag; $j++) { 
// 					  $result = db_select('taxonomy_term_data', 't')
// 					    ->fields('t')
// 					    ->condition('name',  $value5->hastag[$j],'=')
// 					    ->condition('vid',  8,'=')
// 					    ->execute()
// 					    ->fetchAssoc();

// 					  if(empty($result)){
// 					      // $term = new stdClass();
// 					      // $term->name = $obj[$i]->hastag[$j];
// 					      // $term->vid = 9;
// 					      // taxonomy_term_save($term);
					     
// 					      // $node->field_hashtags['und'][$j]['tid'] = $term->tid;
// 					  }else{
// 					     $node_com->field_community_forum_topic_type['und'][$x]['tid'] = $result['tid'];
// 					     $x++;
// 					  }
// 					  //   print "<pre>";
// 					  // print_r($result);
// 					  // print "</pre>";
// 					}
					   
// 					  // print "<pre>";
// 					  // print_r($result);
// 					  // print "</pre>";
					  



// 					$node_com->type = "forum";
// 					$node_com->title = $value5->title;
// 					$node_com->status = $value5->active;
// 					$node_com->language = "und";
// 					$node_com->promote = 0;
// 					$node_com->comment = 1;
// 					$node_com->created = $value5->created;
// 					$node_com->changed = $changed;
// 					$node_com->field_community_project['und'][0]['nid']= $node_project->nid;
// 					$node_com->body['und'][0]['value']=$value5->content;
// 					$node_com->body['und'][0]['format'] = "full_html";
// 					$node_com->field_commuity_image['und'][0]['fid'] = $file_info->fid;
// 					$node_com->uid = $value5->author_id;
// 					$node_com->field_community_status['und'][0]['value'] = $value5->active;
// 					$node_com->taxonomy_forums['und'][0]['tid'] = 1;
// 					// $z = 0;
					
// 					// //   print "<pre>";
// 					// // print_r($node);
// 					// // print "</pre>";

// 					node_submit($node_com);
// 					node_save($node_com);
// 					echo "Com. $node_com->nid : $node_com->title<br>";
// 					//   // $result_node = db_select('node', 'n')
// 					//   //   ->fields('n')
// 					//   //   ->condition('title', $obj[$i]->title,'=')
// 					//   //   ->execute()
// 					//   //   ->fetchAssoc();

// 					  $num_updated = db_update('node') // Table name no longer needs {}
// 					  ->fields(array(
// 					    'changed' => $changed,
// 					    'created' => $value5->created,
// 					  ))
// 					  ->condition('nid', $node_com->nid, '=')
// 					  ->execute();

					 
					  
// 					// // echo $changed;
// 					// //   print_r($result_node);
// 					// //   print_r($num_updated);

// 					  foreach ($value5->comment as $key => $value6) {
// 					     // print_r($value);
// 					     // echo $value->author_id;
// 					    $comment = new stdClass();
// 					    $comment->nid = $node_com->nid; // nid of a node you want to attach a comment to
// 					    $comment->uid = $value6->author_id; // user's id, who left the comment
// 					    $comment->cid = 0; // leave it as is
// 					    $comment->pid = 0; // parent comment id, 0 if none 
// 					    $comment->is_anonymous = 0; // leave it as is
// 			    		$comment->subject = 'Comment Community'; 
// 					    $comment->created = $value6->created; // OPTIONAL. You can set any time you want here. Useful for backdated comments creation.
// 					    $comment->language = "und"; // The same as for a node
// 					    $comment->comment_body[$comment->language][0]['value'] = $value6->content; // Everything here is pretty much like with a node
// 					    $comment->comment_body[$comment->language][0]['format'] = 'full_html'; 
// 					    // print "<pre>";
// 					    // print_r($comment);
// 					    // print "</pre>";
// 					    comment_submit($comment); // saving a comment
// 					    comment_save($comment);
// 					  }

// 			    }

// }



// End Add project







//   print "<pre>";
// print_r($obj);
// print "</pre>";

////////////////////////// End Project //////////

$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "หน้านี้ประมวลผล ".$totaltime." วินาที";
?>
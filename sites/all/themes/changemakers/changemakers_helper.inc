<?php
function changemakers_helper_project_journal(){
  global $user; 
  $data = '<option value="_none">- None -</option>';
  print_r($user->roles[3]);
  if(!isset($user->roles[3])){
	  	$node = node_load_multiple(array(),array('type'=>'project'));
	  	foreach($node as $key => $item){
	  
	  		if($item->uid==$user->uid || (isset($user->roles[5]) && $item->field_coach_project['und'][0]['uid']==$user->uid)){
	  			
	  			$data .= '<option value="'.$item->nid.'">'.$item->title.'</option>';
	  		}
	  	}
	  	$result = array('status'=>1,'data'=>$data);
	  	//print_r($data);
	  	
  }else{
		$result = array('status'=>0,'data'=>'');
		//print_r($result);
  }

  echo json_encode($result);
  
}

function changemakers_date_range_format(){

}

function changemakers_hepler_checkuser_like_comment($cid) {

	global $user;	

	$comment = comment_load($cid);

	$status = false;

	$type = $comment->node_type;

  	if($type=="comment_node_project"){
      $user_like = $comment->field_user_like['und'];
    }elseif($type=="comment_node_news"){
      $user_like = $comment->field_user_like_news['und'];    
    }elseif($type=="comment_node_forum"){
      $user_like = $comment->field_user_like_forum['und'];
    }elseif($type=="comment_node_campaign"){
      $user_like = $comment->field_user_like_campaign['und'];       
    }elseif($type=="comment_node_event"){
      $user_like = $comment->field_user_like_event['und'];       
    }elseif($type=="comment_node_journal"){
      $user_like = $comment->field_user_like_journal['und'];       
    }elseif($type=="comment_node_funding_record"){
      $user_like = $comment->field_user_like_funding_record['und'];       
    }elseif($type=="comment_node_knowledge"){
      $user_like = $comment->field_user_like_knowledge['und'];       
    }
	

	foreach ($user_like as $key => $value) {

		if($value['uid']==$user->uid && $user->uid!=0){

			$status = true;

		}

	}

	return  $status;

}

function get_comment_load_form_project($nid){
  if(!empty($nid)){
    print drupal_render(drupal_get_form("comment_node_project_form", (object) array('nid' => $nid)));
  }else{ ?>
    <div>คุณยังไม่มีโปรเจกต์ สามารถสร้างโปรเจกต์ได้ที่นี่ <a href="/node/add/project">สร้งโปรเจกต์</a></div>
  <?php }
}


function changemakers_infiniteload_comment(){

	

	$type = arg(2);

	$skip = arg(3);

	$count= 0;

	$results = array();

	//$total = array();



	$comments = comment_load_multiple(array(), array('status'=>1),FALSE);

	foreach ($comments as $key => $item) {

		if($item->node_type==$type ){

			if($count>=$skip && $count<$skip+5){

				$results[] = $item;

				$count++;

			}else{

				$count++;

			}

			//$total[]=$key;

		}

		

	}



	echo json_encode(array($results));



}

function get_comment_load($nid,$limit,$page,$offset,$type)

{



global $user;

$user_data= user_load($user->uid);

//drupal_get_form('comment_form', array('nid' => 66));

$node = node_load($nid);

$comment = new stdClass;

$comment->nid = $nid;

$form_data = drupal_get_form('comment_form', $comment);







    

if($form_data['node_type']['#value'] == "comment_node_event"){

  $node_type = "comment_node_event_form";

  $form = drupal_get_form("comment_node_event_form", (object) array('nid' => $node->nid));

  //print render($form);

}else if($form_data['node_type']['#value'] == "comment_node_news"){

  $node_type = "comment_node_news_form";

  $form = drupal_get_form("comment_node_news_form", (object) array('nid' => $node->nid));

  //print render($form);

}else if($form_data['node_type']['#value'] == "comment_node_project"){

  $node_type = "comment_node_project_form";

  $form = drupal_get_form("comment_node_project_form", (object) array('nid' => $node->nid));

  //print render($form);

}else if($form_data['node_type']['#value'] == "comment_node_campaign"){

  $node_type = "comment_node_campaign_form";

  $form = drupal_get_form("comment_node_campaign_form", (object) array('nid' => $node->nid));


 }
 else if($form_data['node_type']['#value'] == "comment_node_forum"){

  $node_type = "comment_node_forum_form";

  $form = drupal_get_form("comment_node_forum_form", (object) array('nid' => $node->nid));



 }



    $result = db_select('comment', 'c')

      ->fields('c')

      ->condition('nid', $nid)

      ->condition('pid', 0)

      ->range($offset,$limit)

      ->execute()

      ->fetchAll();









$cnt = count($result);

if(count($result) != 0){

  for ($i=0; $i < $cnt ; $i++) { 

    // $comment_body = db_select('field_data_comment_body', 'body')

    //   ->fields('body, ')

    //   ->condition('entity_id', $result[$i]->cid)

    //   ->execute()

    //   ->fetchAll();



    $user_comment =  user_load($result[$i]->uid);



    $comment_result = comment_load($result[$i]->cid);

    $comment_type = $comment_result->node_type;

    if($comment_type=="comment_node_project"){

        $like = $comment_result->field_like['und'][0]['value'];

    }elseif($comment_type=="comment_node_news"){

        $like = $comment_result->field_like_news['und'][0]['value'];

    }elseif($comment_type=="comment_node_forum"){

        $like = $comment_result->field_like_forum['und'][0]['value'];

    }elseif($comment_type=="comment_node_campaign"){

        $like = $comment_result->field_like_campaign['und'][0]['value'];

    }elseif($comment_type=="comment_node_event"){

        $like = $comment_result->field_like_event['und'][0]['value'];

    }elseif($comment_type=="comment_node_knowledge"){

        $like = $comment_result->field_like_knowledge['und'][0]['value'];

    }elseif($comment_type=="comment_node_journal"){

        $like = $comment_result->field_like_journal['und'][0]['value'];

    }elseif($comment_type=="comment_node_funding_record"){

        $like = $comment_result->field_like_funding_record['und'][0]['value'];

    }

   // print_r($comment_result->cid);

      // print "<pre>";

      // print_r($comment_result);

      // print "</pre>";



    $get_data_in_list = changemakers_get_data_in_list($comment_result->field_subject_commet_project['und'][0]['value']);



  ?>



  <?php 

  if(isset($type) && $type != "ALL"){

    if($type == $get_data_in_list){ ?>

      

      <div class="col-xs-12" style="margin-top:15px;  ">

            <div class="row">

            

                <div class="col-xs-4">

                    <div class="pagebigtab--update--profile--box col-xs-12 row">

                    <a href="/user/<?php print $user_comment->uid; ?>"><div class="cir--thumb__50" style="background:#333333;">
                        
                      <?php if($user_comment->picture){ ?>
                        <img src="http://changemakers.devfunction.com/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>"></div></a>
                      <?php }else{ ?>
                        <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                      <?php } ?>
                    

                    <div class="pagebigtab--update--profile--detail ">

                        <a href="/user/<?php print $user_comment->uid ?>" class="detail__mid link__blue"><?php print $user_comment->name; ?> 

                          <span class="icon-profile-verify member--verify"></span></a><br>

                        <!-- <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>

                        <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>

                        <div class="detail__small"><span class=" icon-clock"></span> 4h.</div> -->

                    </div>

                    </div>

                </div>

                <div class="col-xs-8 pagebigtab--update--comment">

                    

                <div class="pagebigtab--update--post--arrow"></div>

                    <?php print $get_data_in_list;?>

                    <?php print $comment_result->comment_body['und'][0]['value']; ?>

                    <?php 

                      if(isset($comment_result->field_image_comment_project['und'][0]['filename'])){ 

                      for ($x=0; $x < count($comment_result->field_image_comment_project['und']) ; $x++) { ?>

                         <img width="200" src="/sites/default/files/<?php print $comment_result->field_image_comment_project['und'][$x]['filename']; ?>">

                     <?php  }

                     } ?>

                    <?php if(isset($comment_result->field_file_comment_project['und'][0]['filename'])){ ?>

                    <img width="200" src="/sites/default/files/<?php print $comment_result->field_file_comment_project['und'][0]['filename']; ?>">

                    <?php } ?>

                    

                    

                    <div class="comment--usertool">

                      <?php 

                      

                        //  $sql = "select field_like_value from field_data_field_like where revision_id='".$comment_result->cid."'";

                          $sql = "select field_data_like from data_comment_like where cid='".$comment_result->cid."'";

                          $query_db = db_query($sql);

                          $row = $query_db->fetchAssoc();

                      ?>

                     

                        <input type="hidden" name="number_like" id="number" value="<?php print $comment_result->field_like['und'][0]['value'];  ?>">

                        <input type="hidden" name="cid_like" class="cid" id="cid" value="<?php print $comment_result->cid; ?>"> 

                        <div class="btn_like" data-cid="<?php echo $comment_result->cid; ?>" data-uid="<?php echo $user->uid;?>" onclick="user_like_comment(this)"> 

                            <?php if(changemakers_hepler_checkuser_like_comment($comment_result->cid)==true):?>

                            <i class="icon-heart"></i>  

                            <?php else:?>

                            <i class="icon-heart-empty"></i>  

                            <?php endif;?>
                            <?php  $like_comment = changemaker_helper_check_like_comment($comment_result->cid); ?>                           
                            <span id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></span>  

                            Like                   

                        </div>  

                      </div> 

                      <div>

                        <ul class="links list-inline">

                              <?php if($user->uid == $comment_result->uid || isset($user->roles[3])){ ?> 

                              <li class="comment-delete first">

                                <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                              </li>

                              <?php } ?>

                              <?php

                                // print "<pre>";
                                // print_r($uid);
                                // print "</pre>";

                              if($user->uid == $comment_result->uid || isset($user->roles[3])){
                               ?>
                      
                              <li class="comment-edit">

                                <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                              </li>
                              <?php } ?>

                              
                              <?php

                                // print "<pre>";
                                // print_r($user->uid);
                                // print "</pre>";


                               if($comment_result->node_type == "comment_node_project" && $user->uid != 0 ){  ?>

                              <li class="comment-reply last">

                                <a href="/comment/reply/<?php print $comment_result->nid ?>/<?php print $comment_result->cid ?>">Comment</a>

                              </li>

                              <?php } ?>

                            </ul>

                      </div> 
                    </div> 

                 

            </div>

      </div>

      <?php

      $sql= "select cid from comment where pid='".$comment_result->cid."'";

      $query_db = db_query($sql);

      foreach ($query_db as $key => $rows) {

        // print "<pre>";

        // print_r($rows->cid);

        // print "</pre>";



         $comment_sub_result = comment_load($rows->cid); ?>



          <div class="col-xs-7 col-xs-offset-5 pagebigtab--update--comment">

          <div class="comment--txt">

          <span class="detail__small txt__gray">



        <div class="pagebigtab--update--post--arrow"></div>

   

        <div class="btn_like" data-cid="<?php echo $comment_sub_result->cid; ?>" data-uid="<?php echo $user->uid;?>" onclick="user_like_comment(this)"> 

            <?php if(changemakers_hepler_checkuser_like_comment($comment_sub_result->cid)==true):?>

            <i class="icon-heart"></i>  

            <?php else:?>

            <i class="icon-heart-empty"></i>  

            <?php endif;?>
            <?php  $like_comment = changemaker_helper_check_like_comment($comment_sub_result->cid); ?>

            <p id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></p>  

            Like                    

        </div>  

       

        <?php print $get_data_in_list;?>

        <?php print $comment_sub_result->comment_body['und'][0]['value']; ?>

        <?php 

          if(isset($comment_sub_result->field_image_comment_project['und'][0]['filename'])){ 

          for ($x=0; $x < count($comment_sub_result->field_image_comment_project['und']) ; $x++) { ?>

             <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_image_comment_project['und'][$x]['filename']; ?>">

         <?php  }

         } ?>

        <?php if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>

        <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>">

        <?php } ?>

				</div>

		</div>



        <?php

      }



    }



  }else{

    if($comment_result->pid == 0){ 

      

      // print "<pre>";

      // print_r($user_comment);

      // print "</pre>";

      ?>

      

      <div class="col-xs-12" style="margin-top:15px;  ">

              <div class="row">

                  <div class="col-xs-4">

                      <div class="pagebigtab--update--profile--box col-xs-12 row">

                      <a href="#">

                        <div class="cir--thumb__50" style="background:#333333;">

                          <?php if($user_comment->picture){ ?>
                            <img src="http://changemakers.devfunction.com/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>">
                          <?php }else{ ?>
                            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                          <?php } ?>
                          
                        </div>

                      </a>

                      

                      <div class="pagebigtab--update--profile--detail ">

                          <a href="/user/<?php  print $user_comment->uid; ?>" class="detail__mid link__blue"><?php print $user_comment->name; ?> 

                            <span class="icon-profile-verify member--verify"></span></a><br>

                        <!--   <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>

                          <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div> -->

                      </div>

                      </div>

                  </div>

                  <div class="col-xs-8 pagebigtab--update--comment">

                  <div class="pagebigtab--update--post--arrow"></div>

                      <div class="comment--image">
                      	<?php if($comment_result->field_image['und'][0]['uri']!=""):?>
                        <img src="<?php  print image_style_url('medium', $comment_result->field_image['und'][0]['uri']);?>">
                    	<?php endif;?>
                      </div>

                     <div class="comment--txt">

                      <?php //print $comment_result->subject?>

                      <?php print $get_data_in_list;?>

                      <?php 

                        //if($node_type != "comment_node_event_form"){

                           print $comment_result->comment_body['und'][0]['value'];

                        //}

                      ?>

                      <?php 

                      if($node_type != "comment_node_event_form"){

                        if(isset($comment_result->field_image_comment_project['und'][0]['filename'])){ 

                        for ($x=0; $x < count($comment_result->field_image_comment_project['und']) ; $x++) { ?>

                           <img width="200" src="/sites/default/files/<?php print $comment_result->field_image_comment_project['und'][$x]['filename']; ?>">

                       <?php  }

                       } ?>

                        <?php if(isset($comment_result->field_file_comment_project['und'][0]['filename'])){ ?>
                          <a href="/sites/default/files/<?php echo $comment_result->field_file_comment_project['und'][0]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                  <div class="btn btn--dowload--file">
                                      <i class="icon-download"></i>
                                      <?php print $comment_result->field_file_comment_project['und'][0]['filename']; ?>
                                      <?php echo "(".round(($comment_result->field_file_comment_project['und'][0]['filesize'] / 1024), 0)." Kb )"; ?>
                              </div>
                          </a>

                        <?php } 

                      }else if($node_type == "comment_node_event_form"){

                        // print "<pre>";

                        // print_r($comment_result);

                        // print "</pre>";

                        if(isset($comment_result->field_image_comment_event['und'][0]['filename'])){ 

                        for ($x=0; $x < count($comment_result->field_image_comment_event['und']) ; $x++) { ?>

                           <img width="200" src="/sites/default/files/<?php print $comment_result->field_image_comment_event['und'][$x]['filename']; ?>">

                       <?php  }
                        ?>
                          <br>
    
                        <?php 
                       for ($x=0; $x < count($comment_result->field_file_event['und']) ; $x++) { ?>
                          <a href="/sites/default/files/<?php echo $comment_result->field_file_event['und'][$x]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                  <div class="btn btn--dowload--file">
                                      <i class="icon-download"></i>
                                      <?php print $comment_result->field_file_event['und'][$x]['filename']; ?>
                                      <?php echo "(".round(($comment_result->field_file_event['und'][$x]['filesize'] / 1024), 0)." Kb )"; ?>
                              </div>
                          </a>


                       <?php  }

                       } 



                      }else if($node_type == "comment_node_forum_form"){



                        // print "<pre>";

                        // print_r($comment_result);

                        // print "</pre>";

                       /* if(isset($comment_result->field_image_comment_event['und'][0]['filename'])){ 

                        for ($x=0; $x < count($comment_result->field_image_comment_event['und']) ; $x++) { ?>

                           <img width="200" src="/sites/default/files/<?php print $comment_result->field_image_comment_event['und'][$x]['filename']; ?>">

                       <?php  }
                        ?>
                          <br>
    
                        <?php 
                       for ($x=0; $x < count($comment_result->field_file_event['und']) ; $x++) { ?>
                          <a href="/sites/default/files/<?php echo $comment_result->field_file_event['und'][$x]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                    
                                  <div class="btn btn--dowload--file">
                                      <i class="icon-download"></i>
                                      <?php print $comment_result->field_file_event['und'][$x]['filename']; ?>
                                      <?php echo "(".round(($comment_result->field_file_event['und'][$x]['filesize'] / 1024), 0)." Kb )"; ?>
                              </div>
                          </a>


                       <?php  }

                       }  */


                      }



                      ?>

                      </div>

                      

                      <div class="comment--usertool">

              				<?php 

              				

              					//  $sql = "select field_like_value from field_data_field_like where revision_id='".$comment_result->cid."'";

              					  $sql = "select field_data_like from data_comment_like where cid='".$comment_result->cid."'";

              					  $query_db = db_query($sql);

              					  $row = $query_db->fetchAssoc();

              				?>

                     

                        <input type="hidden" name="number_like" id="number" value="<?php print $comment_result->field_like['und'][0]['value'];  ?>">

      				          <input type="hidden" name="cid_like" class="cid" id="cid" value="<?php print $comment_result->cid; ?>"> 

                        <div class="btn_like" data-cid="<?php echo $comment_result->cid; ?>" data-uid="<?php echo $user->uid;?>" onclick="user_like_comment(this)"> 

                            <?php if(changemakers_hepler_checkuser_like_comment($comment_result->cid)==true):?>

                            <i class="icon-heart"></i>  

                            <?php else:?>

                            <i class="icon-heart-empty"></i>  

                            <?php endif;?>
                            <?php  $like_comment = changemaker_helper_check_like_comment($comment_result->cid); ?>
                            <span id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></span>  
                            
                            Like                    
                        </div>  

                      </div>

                    

                    <div class="comment--admintool">

                      <ul class="links list-inline">

                        <?php if($user->uid == $comment_result->uid || isset($user->roles[3])){ ?> 

                        <li class="comment-delete first">

                          <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                        </li>

                        <?php } ?>

                        <?php

                          // print "<pre>";
                          // print_r($uid);
                          // print "</pre>";

                        if($user->uid == $comment_result->uid || isset($user->roles[3])){
                         ?>
                
                        <li class="comment-edit">

                          <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                        </li>
                        <?php } ?>

                        
                        <?php

                          // print "<pre>";
                          // print_r($user->uid);
                          // print "</pre>";


                         if($comment_result->node_type == "comment_node_project" && $user->uid != 0 ){  ?>

                        <li class="comment-reply last">

                          <a href="/comment/reply/<?php print $comment_result->nid ?>/<?php print $comment_result->cid ?>">Comment</a>

                        </li>

                        <?php } ?>

                      </ul>

                    </div>  

                                          

                  </div>

                  
              </div>

      </div>

      <?php

      }

      if($node_type == "comment_node_project_form"){

        $sql= "select cid from comment where pid='".$comment_result->cid."'";

        $query_db = db_query($sql);



        foreach ($query_db as $key => $rows) { ?>

            <div class="col-xs-7 col-xs-offset-5 pagebigtab--update--comment">

                <div class="comment--txt">

                    <span class="detail__small txt__gray">

                  <?php 

                  //print_r($rows->cid."sub comment");

                  $comment_sub_result = comment_load($rows->cid); 

                  ?>

                

                <!--<div class="pagebigtab--update--post--arrow"></div>-->

                

                </span>

                <?php 

                    print "<div style='margin-top:10px;'>";

                    print $get_data_in_list." ";

                    print $comment_sub_result->comment_body['und'][0]['value']; 

                    print "</div>";

                

                  if(isset($comment_sub_result->field_image_comment_project['und'][0]['filename'])){ 

                    for ($x=0; $x < count($comment_sub_result->field_image_comment_project['und']) ; $x++) { ?>

                           <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_image_comment_project['und'][$x]['filename']; ?>">

                       <?php  

                    }

                  } ?>

                <?php if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>

                        <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>">

                <?php } ?>

                </div>

                <div class="btn_like" style="margin-bottom:8px;" data-cid="<?php echo $comment_sub_result->cid; ?>" data-uid="<?php echo $user->uid;?>" onclick="user_like_comment(this)"> 

                  <?php if(changemakers_hepler_checkuser_like_comment($comment_sub_result->cid)):?>

                  <i class="icon-heart"></i>  

                  <?php else:?>

                  <i class="icon-heart-empty"></i>  

                  <?php endif;?>

                  <?php  $like_comment = changemaker_helper_check_like_comment($comment_sub_result->cid); ?>
                  <p id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></p>  
                 
                  Like       

                </div> 

            </div>

        <?php

        }

      }

      

      else if($node_type == "comment_node_campaign_form"){

        $sql= "select cid from comment where pid='".$comment_result->cid."'";

        $query_db = db_query($sql);



        foreach ($query_db as $key => $rows) {

          ?>

          <div class="col-xs-7 col-xs-offset-5 pagebigtab--update--comment">

          <div class="comment--txt">

          <span class="detail__small txt__gray">

              

          <?php

          

          print_r($rows->cid."sub comment");

          $comment_sub_result = comment_load($rows->cid);

          

          ?>

          </span>
          <!--<div class="pagebigtab--update--post--arrow"></div>-->

          </div>

              

          <div class="btn_like" data-cid="<?php echo $comment_sub_result->cid; ?>" data-uid="<?php echo $user->uid;?>" onclick="user_like_comment(this)"> 

            <?php if(changemakers_hepler_checkuser_like_comment($comment_sub_result->cid)==true):?>

            <i class="icon-heart"></i>  

            <?php else:?>

            <i class="icon-heart-empty"></i>  

            <?php endif;?>
            <?php  $like_comment = changemaker_helper_check_like_comment($comment_sub_result->cid); ?>
            <p id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></p>  

            Like                

          </div> 

          <?php print $get_data_in_list;?>

          <?php print $comment_sub_result->comment_body['und'][0]['value']; ?>

          <?php 

            if(isset($comment_sub_result->field_image_comment_project['und'][0]['filename'])){ 

            for ($x=0; $x < count($comment_sub_result->field_image_comment_project['und']) ; $x++) { ?>

               <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_image_comment_project['und'][$x]['filename']; ?>">

           <?php  }

           } ?>

          <?php if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>

          <img width="200" src="/sites/default/files/<?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>">

          <?php } ?>

            

          </div>

        <?php

        } 

      } 



    }



  }

}



}

function changemaker_helper_check_like_comment($cid){

    $comment_result = comment_load($cid);

    $comment_type = $comment_result->node_type;

    if($comment_type=="comment_node_project"){

        $like = $comment_result->field_like['und'][0]['value'];

    }elseif($comment_type=="comment_node_news"){

        $like = $comment_result->field_like_news['und'][0]['value'];

    }elseif($comment_type=="comment_node_forum"){

        $like = $comment_result->field_like_forum['und'][0]['value'];

    }elseif($comment_type=="comment_node_campaign"){

        $like = $comment_result->field_like_campaign['und'][0]['value'];

    }elseif($comment_type=="comment_node_event"){

        $like = $comment_result->field_like_event['und'][0]['value'];

    }elseif($comment_type=="comment_node_knowledge"){

        $like = $comment_result->field_like_knowledge['und'][0]['value'];

    }elseif($comment_type=="comment_node_journal"){

        $like = $comment_result->field_like_journal['und'][0]['value'];

    }elseif($comment_type=="comment_node_funding_record"){

        $like = $comment_result->field_like_funding_record['und'][0]['value'];

    }
    return $like;

}

function get_dashboard_comment_load($nid,$limit,$page,$offset,$type)

{

  $nid = explode("-", $nid);

  $result = db_select('comment', 'c')

          ->fields('c')

          ->condition('nid', $nid, "IN")

          ->condition('pid', 0)

          ->orderBy('created',"DESC")

          ->range($offset,$limit)

          ->execute()

          ->fetchAll();



        for ($i=0; $i < count($result) ; $i++) { 



            $user_comment =  user_load($result[$i]->uid);



            $comment_result = comment_load($result[$i]->cid); ?>





            <div class="row margin__topbot10">

          

              <div class="col-xs-4">

                  <div class="col-xs-12 row pagebigtab--update--projectname">

                       <?php print $value['title']; ?>

                    </div>

                  <div class="pagebigtab--update--profile--box col-xs-12 row">

                   

                      

                      

                  <a href="#"><div class="cir--thumb__50" style="background:#333333;"><img src="http://changemakers.devfunction.com/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>"></div></a>

                  

                  <div class="pagebigtab--update--profile--detail ">



                      <a href="#" class="detail__mid link__blue"><?php print $user_comment->name; ?> 

                        <span class="icon-profile-verify member--verify"></span></a><br>

                      <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>

                      <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>

                      <div class="detail__small"><span class=" icon-clock"></span> 4h.</div>

                  </div>

                  </div>

              </div>

              <div class="col-xs-8 pagebigtab--update--comment ">

              <div class="pagebigtab--update--post--arrow"></div>

                  

                 <div class="comment--txt">

                  <?php print $comment_result->subject?>

                  <?php print $get_data_in_list;?>

                  <?php 

                    if($node_type != "comment_node_event_form"){

                       print $comment_result->comment_body['und'][0]['value'];

                    }

                  ?>

                  </div>

                  

                  <div class="comment--usertool">



                  <input type="hidden" name="cid_like" id="cid" value="<?php print $comment_result->cid;  ?>">

                  <input type="hidden" name="number_like" id="number" value="<?php print $comment_result->field_like['und'][0]['value'];  ?>">

                  <div><button id="btn_like" onclick="user_like_comment()"><i class="icon-heart-empty"></i>  

                      <span id="show-number"><?php echo $row['field_like_value'];?> <?php print $comment_result->field_like['und'][0]['value']; ?></span>  Like</button>

                      

                  </div>

                  

                   

                  </div>

                  

                <div class="comment--admintool">

                <ul class="links list-inline">

                  <li class="comment-delete first">

                    <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                  </li>

                  <li class="comment-edit">

                    <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                  </li>

                  <li class="comment-reply last">

                    <a href="/comment/reply/<?php print $comment_result->nid ?>/<?php print $comment_result->cid ?>">reply</a>

                  </li>

                </ul>

              </div>  

                  

              </div>

              

              

              

          </div>

          <?php



        }

}

function get_dashboard_project_load($limit,$page,$offset)

{

  global $user;
  $data_user = user_load($user->uid);

  $result = db_select('field_data_field_organization_project', 'o')

          ->fields('o')

          ->condition('field_organization_project_tid', $data_user->field_organization['und'][0]['tid'])

          ->range($offset,$limit)

          ->execute()

          ->fetchAll();



 foreach ($result as $key => $node) { 

    $value = node_load($node->entity_id); ?>

    <div class="col-xs-3 box__pad6" >

        <div  class="page1-4--box2 border--buttom__yellow" >

    <a href="/project/<?php print $value->nid; ?>">       

      <div class="thumbbox--wrap--img">

        <?php 
            if(empty($value->field_project_image['und'][0]['fid'])){ ?>
                <img src="/sites/all/themes/changemakers/images/project1.jpg">
          <?php }else{ ?> 
             <img width="150" src="<?php print "http://changemakers.devfunction.com/sites/default/files/".$value->field_project_image['und'][0]['filename']; ?>">
         <?php }

          ?>

        

      </div>

    </a>    

            

                

      <div   class="field--content boxover">    

        <div class="detail__small d__inline-block">

        <a href="/project/<?php print $value->nid; ?>"> 

          <div class="linelimit__2"><h4 class="headline__thaisan"><?php print $value->title; ?></h4></div>

        </a>

        <span class="icon-clock txt__gray2"></span> <?php print changemakers_format_date_thai_short($value->changed);?>

          </div></div></div></div>

    

    

<?php } 

  



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

?>
<?php 
function get_dashboard_comment_load($nid,$limit,$page,$offset,$type)
{
  global $user;

  // print "<pre>";
  // print_r($nid);
  // print "</pre>"; 



  // print "<pre>";
  // print_r($type);
  // print "</pre>"; 


  // print "<pre>";
  // print_r($offset);
  // print "</pre>"; 


  // print "<pre>";
  // print_r($limit);
  // print "</pre>"; 

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

            // print "<pre>";
            // print_r($result);
            // print "</pre>"; 



            $user_comment =  user_load($result[$i]->uid);

            $node_project = node_load($result[$i]->nid);

            

            $path_project = drupal_get_path_alias("node/".$result[$i]->nid);
            if(is_numeric($path_project)){
              $path_project = "/project/".$path_project;
            }

            $comment_result = comment_load($result[$i]->cid); 

            $path_node_project = drupal_get_path_alias("node/".$result[$i]->nid);
            if($node_project->type == "project"){
              if(is_numeric($path_node_project)){
                $path_node_project = "/project/".$path_node_project;
              }
            }else{
              if(is_numeric($path_node_project)){
                $path_node_project = "/campaign/".$path_node_project;
              }
            }

            $position = "Team Project";

            if($node_project->uid == $user_comment->uid){
              $position = "Project Owner";
            }
            else if(!empty($node_project->field_coach_project)){
              foreach ($node_project->field_coach_project['und'] as $key => $value) {
                if($value['uid'] == $user_comment->uid){
                  $position = "Coach Project";
                }
              }
            }
            else if(!empty($node_project->field_partner_project)){
              foreach ($node_project->field_partner_project['und'] as $key => $value) {
                if($value['uid'] == $user_comment->uid){
                  $position = "Coach Project";
                }
              }
            }

            // print "<pre>";
            // print_r($node_project);
            // print "</pre>";


            ?>




          <?php if($node_project->type == "project"){ ?>
          <div class="row margin__topbot10">

          

              <div class="col-xs-4">

                   <div class="col-xs-12 row pagebigtab--update--projectname">
                       <?php print $value['title']; ?>
                       <div><a href="<?php print $path_node_project; ?>"><p><?php print $node_project->title ?></p></a></div>
                    </div>
                  
                  <div class="pagebigtab--update--profile--box col-xs-12 row">

                   

                      

                      
                  
                  <a href="/user/<?php print $user_comment->uid; ?>"><div class="cir--thumb__50" style="background:#333333;">
                    <?php if($user_comment->picture){ ?>
                      <img src="/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>">
                    <?php }else{ ?>
                      <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                    <?php } ?>
                    
                  </div></a>

                  

                  <div class="pagebigtab--update--profile--detail ">



                      <a href="/user/<?php print $user_comment->uid; ?>" class="detail__mid link__blue"><?php print changemakers_get_contact($user_comment->uid); //$user_comment->name; ?> </a>

                      <?php print changemaker_check_icon_um($user_comment->uid); ?><br>

                      <div class="detail__small"><span class=" icon-tag"></span> <?php print $position; ?></div>
                      <!-- <div class="detail__small"><span class=" icon-clock"></span><?php //print timeAgo(format_date($comment_result->created,"date thai")); ?></div> -->

                      <!-- <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>

                      <div class="detail__small"><span class=" icon-clock"></span> 4h.</div> -->

                  </div>

                  </div>

              </div>

              <div class="col-xs-8 pagebigtab--update--comment ">

              <div class="pagebigtab--update--post--arrow"></div>

                  
                <div  class="comment-scroll-bar">
                 <div class="comment--txt">

                  <?php //print $comment_result->subject?>

                  <?php print $get_data_in_list;?>

                  <?php 

                    if($node_type != "comment_node_event_form"){

                       print $comment_result->comment_body['und'][0]['value'];

                    }

                  ?>

                  </div>
                </div>

                  

                  <div class="comment--usertool">

                      <?php 

                      

                        //  $sql = "select field_like_value from field_data_field_like where revision_id='".$comment_result->cid."'";

                          $sql = "select field_data_like from data_comment_like where cid='".$comment_result->cid."'";

                          $query_db = db_query($sql);

                          $row = $query_db->fetchAssoc();

                          $result_count_sub = db_select('comment', 'c')

                            ->fields('c')

                            ->condition('nid', $nid, "IN")

                            ->condition('pid', $result[$i]->cid)

                            ->orderBy('created',"DESC")
                            ->execute()

                            ->fetchAll();

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
                        <li>
                          <a href="<?php print $path_project; ?>"><?php print count($result_count_sub);  ?> Comments</a>
                        </li>
                         <li class="comment-delete first">

                        <?php  print timeAgo(date("y-m-d H:i:s ",$comment_result->created)); //time_ago(format_date($comment_result->created,"date thai")); ?>

                        </li>

                        <?php //$user->uid == $comment_result->uid || 
                        if(isset($user->roles[3])){ ?> 

                        <li class="comment-delete first">

                          <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                        </li>

                        <?php } ?>

                        <?php

                          // print "<pre>";
                          // print_r($uid);
                          // print "</pre>";
                        //$user->uid == $comment_result->uid || 
                        if(isset($user->roles[3])){
                         ?>
                
                        <li class="comment-edit">

                          <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                        </li>
                        <?php } ?>

                      </ul>

              </div>  

                  

              </div>
          </div>
          <?php }else{ ?>
          <div class="row margin__topbot10">

          

              <div class="col-xs-4">

                  <div class="col-xs-12 row pagebigtab--update--projectname">

                       <?php print $value['title']; ?>
					<div><a href="<?php print $path_node_project; ?>"><p><?php print $node_project->title ?></p></a></div>
                    </div>
                  
                  <div class="pagebigtab--update--profile--box col-xs-12 row">

                   

                      

                      
                  
                  <a href="/user/<?php print $user_comment->uid; ?>"><div class="cir--thumb__50" style="background:#333333;">
                    <?php if($user_comment->picture){ ?>
                      <img src="/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>">
                    <?php }else{ ?>
                      <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                    <?php } ?>
                    
                  </div></a>

                  

                  <div class="pagebigtab--update--profile--detail ">



                      <a href="/user/<?php print $user_comment->uid; ?>" class="detail__mid link__blue"><?php print changemakers_get_contact($user_comment->uid); //$user_comment->name; ?> </a>

                       <?php print changemaker_check_icon_um($user_comment->uid); ?><br>
                    <!--    <div class="detail__small"><span class=" icon-clock"></span><?php //print timeAgo(format_date($comment_result->created,"date thai")); ?></div>
 -->
                       <!-- <div class="detail__small"><span class=" icon-tag"></span> <?php //print $position; ?></div> -->

                      <!-- <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>

                       -->

                  </div>

                  </div>

              </div>

              <div class="col-xs-8 pagebigtab--update--comment ">

              <div class="pagebigtab--update--post--arrow"></div>

                  
                <div class="comment-scroll-bar" >
                 <div class="comment--txt">

                  <?php //print $comment_result->subject?>

                  <?php print $get_data_in_list;?>

                  <?php 

                    if($node_type != "comment_node_event_form"){

                       print $comment_result->comment_body['und'][0]['value'];

                    }

                  ?>

                  </div>
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
                         <li class="comment-delete first">

                        <?php print timeAgo(date("y-m-d H:i:s ",$comment_result->created)); //timeAgo(format_date($comment_result->created,"date thai"));  ?>

                        </li>

                        <?php //$user->uid == $comment_result->uid || 
                        if(isset($user->roles[3])){ ?> 

                        <li class="comment-delete first">

                          <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                        </li>

                        <?php } ?>

                        <?php

                          // print "<pre>";
                          // print_r($uid);
                          // print "</pre>";
                          //$user->uid == $comment_result->uid || 
                        if(isset($user->roles[3])){
                         ?>
                
                        <li class="comment-edit">

                          <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                        </li>
                        <?php } ?>

                      </ul>

              </div>  

                  

              </div>
          </div>
          <?php } ?>

          <?php



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
    $form['field_image_comment_event'] = array();
    $form['field_file_event']= array();  

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
        ->orderBy('created', 'DESC')//ORDER BY created
        ->range($offset,$limit)
        ->execute()
        ->fetchAll();
     $result_project = changemakers_get_data_from_webform_project($nid);
     $check_join_project_status = changemakers_check_join_project_status($result_project, $nid);
     $checkTeamAssignAdmin = changemakers_get_status_team($nid);








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
                            <img src="/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>"></div></a>
                          <?php }else{ ?>
                            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                          <?php } ?>
                        
                      
                        <div class="pagebigtab--update--profile--detail ">

                            <a href="/user/<?php print $user_comment->uid ?>" class="detail__mid link__blue"><?php print changemakers_get_contact($user_comment->uid); //$user_comment->name; ?> 

                              <?php print changemaker_check_icon_um($user_comment->uid); ?></a><br>

                            <?php
                            $problem1=taxonomy_term_load($user_comment->field_profile_problem_interest['und'][0]['tid']);
                            $problem2=taxonomy_term_load($user_comment->field_profile_problem_interest['und'][1]['tid']);
                            ?>
                            <div class="detail__small"><span class=" icon-tag"></span> <a href="#"><?php print $problem1->name.", ".$problem2->name;?></a></div>
                            <?php
                            $target1=taxonomy_term_load($user_comment->field_profile_target_group['und'][0]['tid']);
                            $target2=taxonomy_term_load($user_comment->field_profile_target_group['und'][1]['tid']);
                            ?>
                            <div class="detail__small"><span class=" icon-target"></span> <a href="#"><?php print $target1->name.", ".$target2->name;?></a></div>


                            <div class="detail__small"><span class=" icon-clock"></span><?php print time_ago(date('Y-m-d H:i:s', $comment_result->created));//timeAgo(date('d-m-Y', $comment_result->created)); ?></div>

                        </div>

                      </div>

                  </div>

                  <div class="col-xs-8 pagebigtab--update--comment">

                      

                  <div class="pagebigtab--update--post--arrow"></div>
                  <div >
                      <?php print $get_data_in_list;?>

                      <?php print $comment_result->comment_body['und'][0]['value']; ?>

                      <?php 

                        if(isset($comment_result->field_image_comment_project['und'][0]['filename'])){ 

                        for ($x=0; $x < count($comment_result->field_image_comment_project['und']) ; $x++) { ?>

                           <img width="200" src="/sites/default/files/<?php print $comment_result->field_image_comment_project['und'][$x]['filename']; ?>">

                       <?php  }

                       } ?>

                      <?php 
                      if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>
                      <br><br>
                                      <a href="/sites/default/files/<?php echo $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                                
                                          <div class="btn btn--dowload--file">
                                                  <i class="icon-download"></i>
                                                  <?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>
                                                  <?php echo "(".round(($comment_sub_result->field_file_comment_project['und'][0]['filesize'] / 1024), 0)." Kb )"; ?>
                                          </div>
                                      </a>

                      <?php } 
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
                          <?php if($user->uid == 0){ ?>
                          <div class="btn_like" data-cid="<?php echo $comment_result->cid; ?>" data-uid="<?php echo $user->uid;?>" data-toggle="modal" data-target="#myLogin"> 

                              <?php if(changemakers_hepler_checkuser_like_comment($comment_result->cid)==true):?>

                              <i class="icon-heart"></i>  

                              <?php else:?>

                              <i class="icon-heart-empty"></i>  

                              <?php endif;?>
                              <?php  $like_comment = changemaker_helper_check_like_comment($comment_result->cid); ?>                           
                              <span id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></span>  

                              Like                   

                          </div>

                          <?php }else{ ?>

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
                          <?php } ?> 

                        </div> 

                        <div>

                          <ul class="links list-inline">
                                <li class="comment-delete first">

                                 <?php print timeAgo(date("y-m-d H:i:s ",$comment_result->created));//date("y-m-d H:i:s ",$comment_result->created); //changemakers_format_date_thai_short(); ?>

                                </li>
            
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

                                  // || $check_join_project_status == 1 && $comment_result->node_type == "comment_node_project"
                                  // || isset($user->roles[3]) && $comment_result->node_type == "comment_node_project"
                                  // || $checkTeamAssignAdmin == 1 && $comment_result->node_type == "comment_node_project"
                                  // || $user->uid == $node->uid && $comment_result->node_type == "comment_node_project"
                                 if($comment_result->node_type == "comment_node_project" && $user->uid != 0 && !isset($user->roles[6])  ){  ?>

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

        $sql= "select cid from comment where pid='".$comment_result->cid."'  order by created desc";

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

          <?php if($user->uid == 0){ ?>
          <div class="btn_like" data-cid="<?php echo $comment_sub_result->cid; ?>" data-uid="<?php echo $user->uid;?>" data-toggle="modal" data-target="#myLogin"> 

              <?php if(changemakers_hepler_checkuser_like_comment($comment_sub_result->cid)==true):?>

              <i class="icon-heart"></i>  

              <?php else:?>

              <i class="icon-heart-empty"></i>  

              <?php endif;?>
              <?php  $like_comment = changemaker_helper_check_like_comment($comment_sub_result->cid); ?>

              <p id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></p>  

              Like                    

          </div>
          <?php }else{ ?>
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
          <?php } ?> 
           <ul class="links list-inline">
              <li class="comment-delete first">

               <?php print timeAgo(date("y-m-d H:i:s ",$comment_sub_result->created)); //changemakers_format_date_thai_short($comment_sub_result->created); ?>

              </li>
           </ul>

         

          <?php print $get_data_in_list;?>

          <?php print $comment_sub_result->comment_body['und'][0]['value']; ?>

          <?php 

            if(isset($comment_sub_result->field_image_comment_project['und'][0]['filename'])){ 

            for ($x=0; $x < count($comment_sub_result->field_image_comment_project['und']) ; $x++) { ?>

               <img width="200" src="<?php print image_style_url("cover-image", $comment_sub_result->field_image_comment_project['und'][$x]['uri']);  ?>">

           <?php  }

           } ?>

          <?php 
            if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>
            <br><br>
                            <a href="/sites/default/files/<?php echo $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                      
                                    <div class="btn btn--dowload--file">
                                        <i class="icon-download"></i>
                                        <?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>
                                        <?php echo "(".round(($comment_sub_result->field_file_comment_project['und'][0]['filesize'] / 1024), 0)." Kb )"; ?>
                                </div>
                            </a>

            <?php } 
              ?>

  				</div>

  		</div>



          <?php

        }



      }



    }else{

      if($comment_result->pid == 0){ 

        

        // print "<pre>";

        // print_r($comment_result);

        // print "</pre>";

        ?>

        

        <div class="col-xs-12" style="margin-top:15px;  ">

                <div class="row">

                    <div class="col-xs-4">

                        <div class="pagebigtab--update--profile--box col-xs-12 row">

                        <a href="/user/<?php print $user_comment->uid; ?>">

                          <div class="cir--thumb__50" style="background:#333333;">

                            <?php if($user_comment->picture){ ?>
                              <img src="/sites/default/files/pictures/<?php print $user_comment->picture->filename; ?>">
                            <?php }else{ ?>
                              <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                            <?php } ?>
                            
                          </div>

                        </a>

                       

                        <div class="pagebigtab--update--profile--detail ">
                          
                            <a href="/user/<?php  print $user_comment->uid; ?>" class="detail__mid link__blue"><?php print changemakers_get_contact($user_comment->uid); ?> 

                              <?php print changemaker_check_icon_um($user_comment->uid); ?>
                            </a>
                
                              <br>
                          <?php if($comment_result->node_type=="comment_node_event"):?>

                            <?php
                            $problem1=taxonomy_term_load($user_comment->field_profile_problem_interest['und'][0]['tid']);
                            $problem2=taxonomy_term_load($user_comment->field_profile_problem_interest['und'][1]['tid']);
                            ?>
                            <div class="detail__small"><span class=" icon-tag"></span> <a href="#"><?php print $problem1->name.", ".$problem2->name;?></a></div>
                            <?php
                            $target1=taxonomy_term_load($user_comment->field_profile_target_group['und'][0]['tid']);
                            $target2=taxonomy_term_load($user_comment->field_profile_target_group['und'][1]['tid']);
                            ?>
                            <div class="detail__small"><span class=" icon-target"></span> <a href="#"><?php print $target1->name.", ".$target2->name;?></a></div>
                             <?php endif;?>  
                            <!-- <div class="detail__small"><span class=" icon-clock"></span><?php //print time_ago(format_date($comment_result->created,"date thai"));//timeAgo(date('d-m-Y', $comment_result->created)); ?></div> -->

                        </div>

                        </div>

                    </div>

                    <div class="col-xs-8 pagebigtab--update--comment">

                    <div class="pagebigtab--update--post--arrow"></div>
                    
                    <div >
                        <div class="comment--image">
                        	<?php if($comment_result->field_image['und'][0]['uri']!=""):?>
                          <img src="<?php  print image_style_url('medium', $comment_result->field_image['und'][0]['uri']);?>">
                      	<?php endif;?>
                        </div>

                       <div class="comment--txt">

                        <?php  //print $comment_result->subject?>

                        <?php print $get_data_in_list;?>

                        <?php 

                          //if($node_type != "comment_node_event_form"){
                            if($comment_result->subject ==  "comment_project" || $comment_result->subject == "comment_node_campaign_form"){
                              echo nl2br($comment_result->comment_body['und'][0]['value']);
                            }else{
                              echo nl2br(strip_tags($comment_result->comment_body['und'][0]['value']));
                            }

                          //}

                        ?>

                        <?php 

                        if($node_type != "comment_node_event_form"){

                          if(isset($comment_result->field_image_comment_project['und'][0]['filename'])){ 

                          for ($x=0; $x < count($comment_result->field_image_comment_project['und']) ; $x++) { ?>

                             <img width="200" src="<?php print image_style_url("cover-image", $comment_result->field_image_comment_project['und'][$x]['uri']); ?>">

                         <?php  }

                         } ?>

                          <?php if(isset($comment_result->field_file_comment_project['und'][0]['filename'])){ ?>
                            <br><br>
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
                          <?php if($user->uid == 0){ ?>
                          <div class="btn_like" data-cid="<?php echo $comment_result->cid; ?>" data-uid="<?php echo $user->uid;?>" data-toggle="modal" data-target="#myLogin"> 

                              <?php if(changemakers_hepler_checkuser_like_comment($comment_result->cid)==true):?>

                              <i class="icon-heart"></i>  

                              <?php else:?>

                              <i class="icon-heart-empty"></i>  

                              <?php endif;?>
                              <?php  $like_comment = changemaker_helper_check_like_comment($comment_result->cid); ?>
                              <span id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></span>  
                              
                              Like                    
                          </div> 

                          <?php }else{ ?> 
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

                          <?php } ?>

                        </div>

                      

                      <div class="comment--admintool">

                        <ul class="links list-inline">
                           <li class="comment-delete first">

                                 <?php  print timeAgo(date("y-m-d H:i:s ",$comment_result->created)); //time_ago(format_date($comment_result->created,"date thai")); ?>

                          </li>

                          <?php if(isset($user->roles[3])){ ?> 

                          <li class="comment-delete first">

                            <a href="/comment/<?php print $comment_result->cid ?>/delete">delete</a>

                          </li>

                          <?php } ?>

                          <?php

                            // print "<pre>";
                            // print_r($uid);
                            // print "</pre>";

                          if($user->uid == $node->uid || $user->uid == $comment_result->uid || isset($user->roles[3])){
                           ?>
                  
                          <li class="comment-edit">

                            <a href="/comment/<?php print $comment_result->cid ?>/edit">edit</a>

                          </li>
                          <?php } ?>

                          
                          <?php

                            // print "<pre>";
                            // print_r($checkTeamAssignAdmin);
                            // print "</pre>";

                            // check_join_project_status == 1 
                            // || isset($user->roles[3]) && $comment_result->node_type == "comment_node_project" 
                            // || $checkTeamAssignAdmin == 1 && $comment_result->node_type == "comment_node_project" 
                            // || $user->uid == $node->uid && $comment_result->node_type == "comment_node_project"
                           if($comment_result->node_type == "comment_node_project" && $user->uid != 0 && !isset($user->roles[6])){  ?>

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

          $sql= "select cid, uid from comment where pid='".$comment_result->cid."' order by created desc";

          $query_db = db_query($sql);





          foreach ($query_db as $key => $rows) { 



            ?>

              <div class="col-xs-7 col-xs-offset-5 pagebigtab--update--comment sub-comment--design">
                   <!--  <div class="col-xs-4"> -->
                    <div class="col-xs-4 sub-comment--head">
                      <span class="detail__small txt__gray">

                          <?php 

                          $user_sub_comment =  user_load($rows->uid);

                          //print_r($rows->cid."sub comment");

                          // print "<pre>";
                          // print_r($rows);
                          // print "</pre>"; /sites/default/files/pictures/<?php print $user_sub_comment->picture->filename; 
                          $comment_sub_result = comment_load($rows->cid); 
                          // print "<pre>";
                          // print_r($comment_sub_result);
                          // print "</pre>";

                          ?>

                        </span>

                        <div class="col-xs-12 row">
                           <!--<a href="/user/">
                            <div class="cir--thumb__50" style="background:#333333;">
                            <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg"> -->
                    
                            <a href="/user/<?php print $user_sub_comment->uid; ?>">

                              <div class="cir--thumb__50" style="background:#333333;">

                                <?php if($user_sub_comment->picture){ ?>
                                  <img src="<?php print image_style_url('thumbnail',$user_sub_comment->picture->uri) ?>">
                                <?php }else{ ?>
                                  <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                                <?php } ?>
                                
                              </div>

                            </a>

                       
	
	                        <div class="sub-comment--name" style="width: 100px;float: right;">
		                        
		                            <a href="/user/<?php  print $user_sub_comment->uid; ?>" class="detail__mid link__blue"><?php print changemakers_get_contact($user_sub_comment->uid); //$user_sub_comment->name; ?> 

		                              <?php print changemaker_check_icon_um($user_sub_comment->uid); ?>
                                </a><br>
		           
		                            <?php /*
		                            $problem1=taxonomy_term_load($user_sub_comment->field_profile_problem_interest['und'][0]['tid']);
		                            $problem2=taxonomy_term_load($user_sub_comment->field_profile_problem_interest['und'][1]['tid']);
		                            ?>
		                            <div class="detail__small"><span class=" icon-tag"></span> <a href="#"><?php print $problem1->name.", ".$problem2->name;?></a></div>
		                            <?php
		                            $target1=taxonomy_term_load($user_sub_comment->field_profile_target_group['und'][0]['tid']);
		                            $target2=taxonomy_term_load($user_sub_comment->field_profile_target_group['und'][1]['tid']);
		                            ?>
		                            <div class="detail__small"><span class=" icon-target"></span> <a href="#"><?php print $target1->name.", ".$target2->name;?></a></div>
		                            <?php */ ?>

		                            <!-- <div class="detail__small"><span class=" icon-clock"></span><?php //print time_ago(format_date($comment_result->created,"date thai"));//timeAgo(date('d-m-Y', $comment_result->created)); ?></div> -->

	                        </div>
	       

                        </div>

                    </div>
                   	<div class="sub-comment--body-text sub-comment-hr">
                    	<div   stype="width: 100%;
        							    margin-bottom: 5px;
        							    padding-bottom: 10px;
        							    position: relative;">


        	                  	<?php 

        	                      	print "<div style='margin-top:10px;'>";

        	                      	print $get_data_in_list." ";

        	                      	print $comment_sub_result->comment_body['und'][0]['value']; 

        	                      	print "</div>";

        	                  

        	                    	if(isset($comment_sub_result->field_image_comment_project['und'][0]['filename'])){ 

        	                      		for ($x=0; $x < count($comment_sub_result->field_image_comment_project['und']) ; $x++) { ?>

        	                             <img width="200" src="<?php print image_style_url("cover-image", $comment_sub_result->field_image_comment_project['und'][$x]['uri']); ?>">

        	                         	<?php  

        	                      		}

        	                    	} ?>

        	                  	<?php	if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>
                                    <br><br>
                                    <a href="/sites/default/files/<?php echo $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                              
                                            <div class="btn btn--dowload--file">
                                                <i class="icon-download"></i>
                                                <?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>
                                                <?php echo "(".round(($comment_sub_result->field_file_comment_project['und'][0]['filesize'] / 1024), 0)." Kb )"; ?>
                                        </div>
                                    </a>

                            <?php }  ?>

                      </div>
                    </div>
                  <?php


                  if($user->uid == 0){ ?>
                    <div class="btn_like" style="margin-bottom:8px;" data-cid="<?php echo $comment_sub_result->cid; ?>" data-uid="<?php echo $user->uid;?>" data-toggle="modal" data-target="#myLogin"> 

                      <?php if(changemakers_hepler_checkuser_like_comment($comment_sub_result->cid)):?>

                      <i class="icon-heart"></i>  

                      <?php else:?>

                      <i class="icon-heart-empty"></i>  

                      <?php endif;?>

                      <?php  $like_comment = changemaker_helper_check_like_comment($comment_sub_result->cid); ?>
                      <p id="show-number"><?php print !empty($like_comment)?$like_comment:0; ?></p>  
                     
                      Like       

                    </div> 
                    <ul class="links list-inline">
                      <li class="comment-delete first">

                       <?php  print  timeAgo(date("y-m-d H:i:s ",$comment_sub_result->created));// time_ago(format_date(,"date thai")); ?>

                      </li>
                    </ul>

                  <?php }else{  ?>
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
                    <ul class="links list-inline">
                      <li class="comment-delete first">

                       <?php print changemakers_format_date_thai_short($comment_sub_result->created); ?>

                      </li>
  
                    

                        
           
                      <?php if(isset($user->roles[3])){ ?> 

                      <li class="comment-delete first">

                        <a href="/comment/<?php print $comment_sub_result->cid ?>/delete">delete</a>

                      </li>

                      <?php } ?>

                      <?php

                        // print "<pre>";
                        // print_r($uid);
                        // print "</pre>";

                      if($user->uid == $node->uid || $user->uid == $comment_sub_result->uid || isset($user->roles[3])){
                       ?>
              
                      <li class="comment-edit">

                        <a href="/comment/<?php print $comment_sub_result->cid ?>/edit">edit</a>

                      </li>
                      <?php } ?>

                    </ul>

                   
                  <?php } ?>
				        	
              </div>

          <?php

          }

        }

        

        else if($node_type == "comment_node_campaign_form"){

          $sql= "select cid from comment where pid='".$comment_result->cid."'  order by created desc";

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

                 <img width="200" src="<?php print image_style_url("cover-image", $comment_sub_result->field_image_comment_project['und'][$x]['uri']); ?>">

             <?php  }

             } ?>

            <?php 
            if(isset($comment_sub_result->field_file_comment_project['und'][0]['filename'])){ ?>
            <br><br>
                            <a href="/sites/default/files/<?php echo $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>" type="application/msword; length=101888" target="_blank">
                                      
                                    <div class="btn btn--dowload--file">
                                        <i class="icon-download"></i>
                                        <?php print $comment_sub_result->field_file_comment_project['und'][0]['filename']; ?>
                                        <?php echo "(".round(($comment_sub_result->field_file_comment_project['und'][0]['filesize'] / 1024), 0)." Kb )"; ?>
                                </div>
                            </a>

            <?php } 
              ?>

              

            </div>

          <?php

          } 

        } 



      }



    }                       

  }



}

function get_comment_load_form_project($nid){
  if(!empty($nid)){
    //print drupal_render(drupal_get_form("comment_node_project_form", (object) array('nid' => $nid)));
    $node_comment = node_load($nid);
    $node_view = node_view($nid);
    $node_view['comments'] = comment_node_page_additions($nid);
    print render($content['comments']);
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


?>
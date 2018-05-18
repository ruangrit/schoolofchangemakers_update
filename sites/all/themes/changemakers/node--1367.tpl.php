<div class="col-xs-12 margin__top25 "> 
    <div class="row">
    

  <?php if (!empty($title)): ?>
        <div class="knowledge--page">
   <!--  <h3><?php //print $title; ?></h3> -->
  <?php endif; ?>

      <?php 
      
      $text  = strip_tags($_GET['search']);
      $problem_tid = explode(",",!empty($_GET['tax_problem'])?$_GET['tax_problem']:"");
      $target_id = explode(",",!empty($_GET['tax_target'])?$_GET['tax_target']:"");
      $sort = !empty($_GET['sort'])?$_GET['sort']:"DESC";

      if($problem_tid[0] == ""){
          unset($problem_tid[0]);
      }
      if($target_id[0] == ""){
          unset($target_id[0]);
      }


    $text_link  = strip_tags($_GET['search']);
    $problem_tid_link = $_GET['tax_problem'];
    $target_id_link = $_GET['tax_target'];
    $sort_link = !empty($_GET['sort'])?$_GET['sort']:"";
    $type = !empty($_GET['type'])?$_GET['type']:"";
    $search_page = !empty($_GET['page'])?$_GET['page']:"1";


    if($problem_tid_link != "All"){
        if (strpos($problem_tid_link, ',') !== false) {
            $problem_tid_link = explode(',', $problem_tid_link);
        }
    }
    else if(count($problem_tid_link) > 1){

    }
    else{
        $problem_tid_link = "All";
    }

    if($target_id_link != "All"){

        if (strpos($target_id_link, ',') !== false) {
            $target_id_link = explode(',', $target_id_link);
        }
        
    }
    else{
         $problem_tid_link = "All";
    }

    if($problem_tid_link == "All" && $target_id_link == "All" ){
        $link =  $text_link."&sort=".$sort_link."&tax_problem=".$problem_tid_link."&tax_target=".$target_id_link;
    }
    else if($problem_tid_link != "All" && $target_id_link == "All" ){
        $link =  $text_link."&sort=".$sort_link."&tax_problem=".implode(',', $problem_tid_link)."&tax_target=".$target_id_link;
    }
    else if($problem_tid_link == "All" && $target_id_link != "All" ){
        $link =  $text_link."&sort=".$sort_link."&tax_problem=".$problem_tid_link."&tax_target=".implode(',', $target_id_link);
    }
    else if($problem_tid_link != "All" && $target_id_link != "All" ){
        if(count($problem_tid_link) > 1){
            $text_prob = implode(',', $problem_tid_link);
        }
        else{
            $text_prob = $problem_tid_link;
        }

        if(count($target_id_link) > 1){
            $text_tar = implode(',', $target_id_link);
        }
        else{
            $text_tar = $target_id_link;
        }
        $link =  $text_link."&sort=".$sort_link."&tax_problem=".$text_prob."&tax_target=".$text_tar;
    }
    else{
        $link =  $text_link."&sort=".$sort_link;
    }
      
      // if($problem_tid[0] != "All"){
      //   unset($problem_tid[0]);
      // }else if(count($problem_tid) == 1){
      //   $problem_tid = $problem_tid[0];
      // }

      // if($target_id[0] != "All"){
      //   unset($target_id[0]);
      // }
      // else if(count($target_id) == 1){
      //   $target_id = $target_id[0];
      // }

      // print "<pre>";
      // print_r($problem_tid);
      // print "</pre>";

      // print "<pre>";
      // print_r($target_id);
      // print "</pre>";

      // print "<pre>";
      // print_r($link);
      // print "</pre>";



      //print_r($type);

      if($type == "knowledge"){ ?>
        <h2 class="headline headline__alte">Related Knowledge of <?php print $text;  ?></h2> 
        <?php 
        // print_r($problem_tid);
        $knowledge= changemakers_get_search_konwledge_result($text,$problem_tid,$target_id,$sort,$search_page);
        $page = ceil(count($knowledge)/8);

        // $node = node_load($row->nid);

        // $date_event = changemakers_get_date_start_and_end($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
        // $d = date('d',$node->created);
        // $m = intval(date('m',$node->created));
        // $y = date('Y',$node->created)+543;
        // $h = date('H',$node->created);
        // $i = date('i',$node->created);
        // $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

        // $user = user_load($row->_field_data['nid']['entity']->uid);

        // // print '<pre>';
        // // print_r($node);
        // // print '</pre>';

        // $img = $node->field_picture['und'][0]['filename'];
        $target = $search_page*8; // 3*4 = 12 -4
        if($target > 8){
          $count = ($search_page*8)-8;
        }else{
          $count = 0;
        }

        // print "<pre>";
        // print_r($target);
        // print "<pre>";
        
        for ($i=$count; $i < count($knowledge) ; $i++) { 

          if($count < $target){
            $count++;
          ?>
          <div class="col-xs-3 box__pad6" >
          <div  class="page1-4--box" >
            <a href="<?php print $knowledge[$i]['path']; ?>">
              <div class="thumb">
                <img  src="<?php print $knowledge[$i]['picture']; ?>">
              </div>
            
                  <div  id="moredetail__over"  class="field--content boxover">
              <!--<div class="knowledge-title" >-->
                      <div class=" d__inline-block">
                          <h4 class="headline__thaisan h4--linelimit__2"><?php print $knowledge[$i]['title']; ?></h4>
                
                                      
                
                          <?php // print $fields['field_knowledge_type']->content; ?><!-- <br />-->
                          
                          <div class="detail__small link__gray">
                              
                              <i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $knowledge[$i]['date']; ?></span>
                              
                          </div>
                          <!--
                          <div class="detail--linelimit__1-2">
                          <span class=" icon-target txt__gray2"></span>
                          <?php // print $target[0]; print $target[1]; ?></div> <br />
                -->
                
                <div id="moredetail__hide">
                          <div class="detail__medium">
                          <!--<a href="#" ><?php // print $fields['field_profile_firstname']->content; ?> <span class="icon-profile-verify member--verify"></span></a><br/>-->
                              <div class="detail--linelimit__4">

                              <?php print $knowledge[$i]['body']; ?>
                              </div>
                          </div>
                          
                          
                         
                      </div>
                  <!--    </div>-->
              </div>
            </div>
            </a>
          </div>
          </div>

          

          <?php 
          }
          } ?>
          <ul class="pagination">
            <?php

           
           // print "<pre>";
           // print_r($page);
           // print "</pre>";
            for ($i=1; $i < $page+1 ; $i++) { 
            
             ?>
            <li <?php if($search_page == $i){ echo 'class="active"'; } ?>>
              <a href="/search-result?search=<?php echo $link; ?>&type=knowledge&page=<?php echo $i; ?>" ><?php print $i; ?></a>
            </li>
            <?php   # code...
            } 
            ?>
          </ul>
    </div>
        
         <?php
      }else if($type == "news-event"){?>
        
        <div class="newsevent--page">
        
        <?php
        $news_event = changemakers_get_search_result_news_events($text,$problem_tid,$target_id,$sort);
        $page = ceil(count($news_event)/8);
        $target = $search_page*8; // 3*4 = 12 -4
        if($target > 8){
          $count = ($search_page*8)-8;
        }else{
          $count = 0;
        }
        ?>
         <h2 class="headline headline__alte">Related News & Events of <?php print $text;  ?></h2> 
        <?php 
        
       

        // foreach ($news_event as $key => $value) {
        for ($i=$count; $i < count($news_event) ; $i++) { 

          // print "<pre>";
          // print_r($value['path']);
          // print "</pre>";
            if($count < $target){
            $count++;
        ?>
        <div class="col-xs-3 box__pad6 newsevent--page">
                <a href="<?php print $news_event[$i]['path']; ?>">
                <div class="page1-4--box">    
                  <div class="thumbbox--wrap--img">
                       <img width="150" src="<?php print $news_event[$i]['picture']; ?>">
                  </div>
                
                    
                <div id="moredetail__over"  class="field--content boxover">
                    <div class="h4--linelimit__2 title">
                      <h4 class="headline__thaisan">
                      <?php print $news_event[$i]['title']; ?>
                      </h4>
                     </div>
                    
                   <div class="detail__small d__inline-block link__gray">
                         
                    <span class=" icon-newspaper txt__gray2"></span> <?php print $news_event[$i]['type']; ?> <br>     
                    <span class="icon-clock txt__gray2"></span> 
                    <?php                 
                        print $news_event[$i]['date'];     
                    ?>
                    </div>
                    
                    
                    <div id="moredetail__hide">
                        <div class="detail__medium">
                            <div class="detail--linelimit__4">
                        <?php print $news_event[$i]['body'] ?>
                            </div>
                        </div>
                        
                    </div>
                 </div>
                    </div>
                
                </a>
        </div>


        <?php }
         }
         ?>

          <ul class="pagination">
            <?php

            

           
           // print "<pre>";
           // print_r($page);
           // print "</pre>";
            for ($i=1; $i < $page+1 ; $i++) { 
            
             ?>
            <li <?php if($search_page == $i){ echo 'class="active"'; } ?>>
                <a href="/search-result?search=<?php echo $link; ?>&type=news-event&page=<?php echo $i; ?>" ><?php print $i; ?></a>
            </li>
            <?php   # code...
            } 
            ?>
          </ul>
         <?php
         /*
         foreach ($event as $key => $value) {

        ?>
        <div class="col-xs-3 box__pad6 newsevent--page">
                <a href="/news/<?php print $value['nid']; ?>">
                <div class="page1-4--box">    
                  <div class="thumbbox--wrap--img">
                       <img width="150" src="<?php print $value['picture']; ?>">
                  </div>
                
                    
                <div id="moredetail__over"  class="field--content boxover">
                    <div class="h4--linelimit__2 title">
                      <h4 class="headline__thaisan">
                      <?php print $value['title']; ?>
                      </h4>
                     </div>
                    
                   <div class="detail__small d__inline-block">
                         
                    <span class="icon-book-open txt__gray2"></span> <?php print $value['type']; ?> <br>     
                    <span class="icon-clock txt__gray2"></span> 
                    <?php                 
                        print $value['date'];     
                    ?>
                    </div>
                    
                    <br>
                    <div id="moredetail__hide"><?php print $value['body'] ?></div>
                 </div>
                    </div>
                
                </a>
        </div>

        <?php 
         } */
                                      ?>
        </div>
            <?php

      }else if($type == "user-community"){ ?>
        <div class="commu--searchpage">
        <h2 class="headline headline__alte">Related User Community about <?php print $text;  ?></h2> 
        <?php 
        // print_r($problem_tid);
        $community= changemakers_get_search_user($text,$problem_tid,$target_id,$sort,$search_page);
        $page = ceil(count($community)/8);
        $target = $search_page*8; // 3*4 = 12 -4
        if($target > 8){
          $count = ($search_page*8)-8;
        }else{
          $count = 0;
        }

        // print "<pre>";
        // print_r($target);
        // print "<pre>";
        
        for ($i=$count; $i < count($community) ; $i++) { 

          if($count < $target){
            $count++;
          ?>
          <div class="col-xs-3 box__pad6">
          
          <a href="/user/<?php print $community[$i]['uid']; ?>">
            <div class="page1-4--box">   
                <div class="thumb">
                    <div class="cir--thumb__50">
                         <img  src="<?php print $community[$i]['picture']; ?>">
                    </div>
                        </div>    
                        
                        <div class="detail">
                          
                            <div class="tag--linelimit__1">
                        <?php print $community[$i]['name']; ?> <?php print changemaker_check_icon_um($community[$i]['uid']);  ?>
                      </div>
                            
                            <?php if(!empty($community[$i]['project'])){ ?>
                                <span class="txt__gray detail__small">Project</span>
                                <div class="detail--linelimit__1">
                              <?php               
                                  print $community[$i]['project'][0]['title'];        
                              ?>
                                </div>
                            <?php } ?>
                            
                            <span class="txt__gray detail__small">Interest</span>
                            <div class="detail--linelimit__1">
                          <?php               
                              print $community[$i]['interest'];     
                          ?>
                            </div>
                  
                  </div>    
                </div>   
            </a>
            </div>

      <?php
        }
      }

      ?>

      <ul class="pagination">
          <?php

         
         // print "<pre>";
         // print_r($page);
         // print "</pre>";
          for ($i=1; $i < $page+1 ; $i++) { 
          
           ?>
          <li <?php if($search_page == $i){ echo 'class="active"'; } ?>>
                <a href="/search-result?search=<?php echo $link; ?>&type=user-community&page=<?php echo $i; ?>" ><?php print $i; ?></a>
          </li>
          <?php   # code...
          } 
          ?>
        </ul>
        </div>
    <?php } ?>  

    

</div>
</div>
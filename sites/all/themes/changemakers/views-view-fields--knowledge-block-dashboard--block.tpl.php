<?php
// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// $d = date('d',$node->created);
// $m = intval(date('m',$node->created));
// $y = date('Y',$node->created)+543;
// $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
// //print_r();
$title =strip_tags($fields['title']->content);
// $date_journal = field_journal_date
$data_user = user_load(strip_tags($fields['uid']->content));

$problem = explode("All,", strip_tags($fields['field_knowledge_problem']->content));
$target = explode("All,", strip_tags($fields['field_knowledge_target']->content));
?>
<div class="knowledge--box" >
   <div class="thumb">
            <?php print $fields['field_knowledge_image']->content;?> 
    </div>
        <a href="<?php print strip_tags($fields['path']->content);   ?>">
        <div  id="moredetail__over"  class="field--content boxover">
            <div class="detail__small d__inline-block">
        
            <div class="h4--linelimit__2">
                <h4 class="headline__thaisan"><?php print $title;?></h4></div>
                <span class=" icon-clock txt__gray2"> <?php print timeAgo(strip_tags($fields['field_knowledge_date']->content)); ?></span>
                
            <div id="moredetail__hide">    
            
                
                <div  class="detail__medium">
                    
                
                <div class="moredetail__over__content linelimit__3">
                    <?php print strip_tags($fields['body']->content); ?>
                </div>   
                   <!--  <a href="/user/<?php //print $data_user->uid;  ?>"  class="txt__gray"><?php //print $data_user->name;  ?> <span class="icon-profile-verify member--verify"></span></a><br/>   -->
                    <!-- <div class="taglinelimit__1"><span class=" icon-tag txt__gray"></span><a  class="txt__gray"> <?php //print $problem[0]; print $problem[1]; ?></a></div><br/>
                    <div class="taglinelimit__1"><span class="icon-target txt__gray"></span><a  class="txt__gray"><?php//print $target[0]; print $target[1]; ?></a></div> -->
                </div><br>
                
                
                
            
            <!-- <div id="moredetail__hide" class="detail__small">
            <a href="<?php //print print strip_tags($fields['path']->content);  ?>" class="txt__white">
            <p class="moredetail__over__content"><?php //print strip_tags($fields['body']->content);?></p>
            </a>
            </div> -->
                </div>
        </div>  
    </div>
    </a>
</div>
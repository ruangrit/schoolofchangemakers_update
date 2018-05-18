
<?php
// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// $d = date('d',$node->created);
// $m = intval(date('m',$node->created));
// $y = date('Y',$node->created)+543;
// $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
// //print_r();
$title =strip_tags($fields['title']->content);
$counter_latest_journal = strip_tags($fields['counter']->content);
global $user;

//$data_user = user_load(strip_tags($fields['uid']->content));
$problems = strip_tags($fields['field_journal_problem']->content);
$targets = strip_tags($fields['field_journal_target']->content);
$problem = explode("All,", strip_tags($fields['field_journal_problem']->content));
$target = explode("All,", strip_tags($fields['field_journal_target']->content));
// $date_journal = field_journal_date
$check_problem = 0;
$check_target = 0;
// $string = "aaa, bbb, ccc,";
$user_data = user_load($user->uid);

// print "<pre>";
// print_r($user_data);
// print "</pre>";
if(isset($user_data->field_profile_problem_interest['und'])){
   foreach ($user_data->field_profile_problem_interest['und']  as $key => $value) {
        $problem_tax = taxonomy_term_load($value['tid']);
        if (strpos($problems, $problem_tax->name) !== false) {
            $check_problem = 1;
        }
    } 
}

if(isset($user_data->field_profile_skill_interest['und'])){
    foreach ($user_data->field_profile_skill_interest['und']  as $key => $value) {
        $target_tax = taxonomy_term_load($value['tid']);
        if (strpos($targets, $target_tax->name) !== false) {
            $check_target = 1;
        }
    }
}



if(strip_tags($fields['uid']->content) == $user->uid || $check_problem == 1 || $check_target == 1){
?>
<div class="journal--box " >
   <div class="journal--img">
            <?php print $fields['field_journal_image']->content;?> 
    </div>
        
        <div id="moredetail__over" class="field--content journal--boxover" >
        
            <div class="h4--linelimit__2">
                <h4 class="headline__thaisan">---<?php print $title;?></h4>
            </div>
            <div  class="detail__small">
             
            
            </div>
            
            <div id="moredetail__hide" class="detail__small">
                   

                <?php //print changemakers_get_contact(strip_tags($fields['uid']->content)); ?> <span class="icon-profile-verify member--verify"></span>
            <br/> 
                
            <div class="taglinelimit__1">
                <span class=" icon-tag txt__gray"></span>
                <?php print $problem[0]; print $problem[1]; ?>
            </div><br/>
                
            <div class="taglinelimit__1">
                <span class="icon-target txt__gray"></span>
               <?php  print $target[0]; print $target[1];  ?>
            </div>
                
            
            <p class="moredetail__over__content"><?php print strip_tags($fields['body']->content);?></p>
         
            </div>

        </div>  

</div>
<?php } ?>
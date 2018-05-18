
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
$problem = explode("All,", strip_tags($fields['field_journal_problem']->content));
$target = explode("All,", strip_tags($fields['field_journal_target']->content));



// print "<pre>";
// print_r($problem);
// print "</pre>";
// $date_journal = field_journal_date
?>




    <div class="journal--box  journal--box<?php echo $counter_latest_journal ?> " >
    <div class="thumb">
            <?php 

            if(empty($fields['field_journal_image']->content)){ ?>
                <img width="200" src="/sites/all/themes/changemakers/images/journal1.jpg">
            <?php }
            else{
                print $fields['field_journal_image']->content;
            }

            ?>
            
        </div>
        <a href="<?php print strip_tags($fields['path']->content); ?>">
        <div id="moredetail__over" class="field--content journal--boxover" >
        
            <div class="h4--linelimit__2">
                <h4 class="headline__thaisan"><?php print $title;?></h4>
            </div>
            
            <div class="content--hoverhide detail--linelimit__4 margin__top5"><?php print strip_tags($fields['body']->content);?></div>
            
            
                <div id="moredetail__hide" class="detail__small">
                <div  class="detail__small" >
                  
                    <div class="tag--linelimit__1"><?php print changemaker_check_icon_um(user_load(strip_tags($fields['uid']->content))->uid) ?> <?php print changemakers_get_contact(user_load(strip_tags($fields['uid']->content))->uid); ?>
                        <?php if(!empty($problem[0]) || !empty($problem[1])): ?></div>
                    <div class="tag--linelimit__1 "><span class=" icon-tag "></span> <?php print $problem[0]; print $problem[1]; ?></div>
                    <?php endif; ?>
                     <?php if(!empty($target[0]) || !empty($target[1])): ?>
                    <div class="tag--linelimit__1 "><span class="icon-target "></span> <?php print $target[0]; print $target[1]; ?></div>
                    <?php endif; ?>
                </div>
                    
                
                
                <div class="moredetail__over__content detail--linelimit__3 detail__medium"><?php print strip_tags($fields['body']->content);?></div>



            
                <span  class="hidecontent--readmore">READ MORE   <i class="glyphicon glyphicon-play-circle"></i></span>
                </div>
                

        </div>  
        </a>
        
    </div>


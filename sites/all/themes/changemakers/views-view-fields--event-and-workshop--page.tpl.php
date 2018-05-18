
<style type="text/css">


</style>
<?php 

$node = node_load($row->nid);

$date_event = _changemakers_thai_daterange_format($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$h = date('H',$node->created);
$i = date('i',$node->created);
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$user = user_load($row->_field_data['nid']['entity']->uid);

// print '<pre>';
// print_r($node);
// print '</pre>';

$img = $node->field_picture['und'][0]['filename'];

/*if(strip_tags($fields['counter']->content) == 1)
{
	?>


        <div class="news--box__big col-xs-12">
                
				<div class="col-xs-7 pad0">
					<div class=" thumbbox--wrap--img">
						<?php
						if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{?>
							<img src="/sites/all/themes/changemakers/images/event_default.jpg">
						<?php }  ?>
					</div>
				</div>
				<div class="col-xs-5 pad0  bottom__blue fixheight">
                    <div class="eventnew--field--blue">
                    <div class="field__pad15 h2--linelimit__3">
					<h2 class="headline__thaisan"><?php print $fields['title']->content; ?></h2>
                    </div>
                    </div>
                    
                    <div class="field__pad15">
                    <div class="detail__medium" style="line-height:11pt">
                        <span class="linelimit__1"><i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $d." ".$month[$m]." ".$y;?></span></span>
                        
                        <span class="linelimit__1 margin__top2"  ><i class="icon-tag txt_gray2"></i> <a href="#"><?php print strip_tags($fields['field_news_event_type']->content); ?></a></span>
                        
                        
                    </div>
                    
                        
                    <div class="bigbody--linelimit__03 margin__top2">
                        <p class="para--link__gray"><a href="#">นิตยสารสำหรับทุกคนที่อยากสร้างการเปลี่ยนแปลง Know - Think - Connect - Change  Issue 0 : You and Aging issue เนื้อหาภาพ..
                        </a></p></div>
                    </div>
				</div>
                
			</div>

	<?php
}
else 
{*/
 	
?>
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php
						if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{ ?>
							<a href="/event/<?php print $row->nid;?>"><img src="/sites/all/themes/changemakers/images/event_default.jpg"></a>
						<?php }  ?>
		</div>
        <div  id="moredetail__over"  class="field--content boxover">
		<!--<div class="knowledge-title" >-->
            <div class=" d__inline-block">
                <h4 class="headline__thaisan h4--linelimit__2"><?php print $fields['title']->content; ?></h4>
			
                            
			
                <?php // print $fields['field_knowledge_type']->content;?><!-- <br />-->
                
                <div class="detail__small">
                    
                    <i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $date_event; ?></span>
                    
                </div>
                <!--
                <div class="detail--linelimit__1-2">
                <span class=" icon-target txt__gray2"></span>
                <?php // print $target[0]; print $target[1]; ?></div> <br />
			-->
			
			<div id="moredetail__hide">
                <div class="detail__medium margin__top10">
                <!--<a href="#" ><?php // print $fields['field_profile_firstname']->content;?> <span class="icon-profile-verify member--verify"></span></a><br/>-->
                
                <a href="/news/<?php print strip_tags($fields['nid']->content); ?>">
                    <div class="moredetail__over__content detail--linelimit__4"><?php print $fields['body']->content;?></div>
                </a>
                </div>
                
                
               
            </div>
        <!--    </div>-->
		</div>
	</div>
</div>
</div>
<!--

	<div class="news--box__small col-xs-6">
        
                <div class="col-xs-5 pad0">
					<div class="news-image-top-event-page thumbbox--wrap--img ">
						<?php
						/*if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{?>
							<img src="/sites/all/themes/changemakers/images/event_default.jpg">
						<?php }  ?>
					</div>
				</div>
				<div class="col-xs-7 pad">
					<div class="para--link__gray  linelimit__2"><?php print $fields['title']->content; ?></div>
                <div class="detail__small">
                    <span class="taglinelimit__06 "><i class="icon-tag txt_gray2"></i> <a href="#"><?php print strip_tags($fields['field_news_event_type']->content); ?></a></span>
                    <span><i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $date_event[0]; ?> - <?php print $date_event[1]; */?></span></span>
                </div>
				</div>
                
	</div>
-->
<?php	
//}

?>
    

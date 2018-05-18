<?php
// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// $d = date('d',$node->created);
// $m = intval(date('m',$node->created));
// $y = date('Y',$node->created)+543;
// $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
// //print_r();
// $title =strip_tags($fields['title']->content);
// $body = strip_tags($fields['body']->content);
// $img =  $fields['field_picture']->content;
// $uid = strip_tags($fields['uid']->content);
// $user = user_load($uid);

//$date_event = changemakers_get_date_start_and_end($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);

// print '<pre>';
// print_r($node);
// print '</pre>';
$date_news = strip_tags($fields['field_news_event_date']->content);
$date_campaign = strip_tags($fields['field_campaign_date']->content);
$node =  strip_tags($fields['nid']->content);
$date = changemakers_get_date_thai_block($date_news);
$date_c = changemakers_get_date_start_date_campaign_list($date_campaign);
list($d1,$m1,$y1) = explode(" ", $date[0]);
$y1= $y1-2500;
list($d2,$m2,$y2) = explode(" ", $date[1]);
$y2= $y2-2500;

list($d_c1,$m_c1,$y_c1) = explode(" ", $date_c[0]);
$y_c1= $y_c1-2500;
list($d_c2,$m_c2,$y_c2) = explode(" ", $date_c[1]);
$y_c2= $y_c2-2500;
// print '<pre>';
//      print_r($date_c); 
//      print '</pre>';
?>


<div class="block-project-detail">
		
	<div class="imgWrap" >
	<a href='<?php print strip_tags($fields['path']->content); ?>'>
		<div class="imgWrap-img"><?php print $fields['field_picture']->content; print $fields['field_campaign_image']->content; ?></div>	
		</a>
		<a href='<?php print strip_tags($fields['path']->content); ?>'>
		<div class="imgDescription">
				
                <h2 class="headline__thaisan ">
				<span class="h2--linelimit__1"><?php print $fields['title']->content; ?></span>
                </h2>
            
				<div class="detail__medium" style="margin-top:0; padding-top:0px;">
				<i class="glyphicon glyphicon-calendar"></i> 
				<?php 
				if(strip_tags($fields['field_news_event_date']->content)){
					$date_ne = explode(" to ", strip_tags($fields['field_news_event_date']->content)); 

					print _changemakers_thai_daterange_format($date_ne[0], $date_ne[1]);
				}
				else{

					$date_cp = explode(" to ", strip_tags($fields['field_campaign_date']->content)); 

					print _changemakers_thai_daterange_format($date_cp[0], $date_cp[1]);
				}
				 
				?>
            </div>
			
				<span class="slide-btn">READ MORE &nbsp; <i class="glyphicon glyphicon-play-circle"></i> </span>
			
		</div>
		</a>
	</div>
	

</div>


<?php 

$node = node_load($row->nid);

$date_event = _changemakers_thai_daterange_format($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$user = user_load($row->_field_data['nid']['entity']->uid);

// print '<pre>';
// print_r($node);
// print '</pre>';

$img = isset($node->field_picture['und'][0]['filename'])?$node->field_picture['und'][0]['filename']:"";

// print $row->nid;
if(arg(0) == "node" )
{
	if($node->type == "event"  && arg(1) !== $row->nid )
	{
		?>

            <div class="col-xs-12 border--row">
                <div class="row">
                    
                <div class="col-xs-12">
					<div class="">
						<div class="thumb">
						<?php if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{?>
							<a href="/event/<?php print $row->nid;?>"><img src="/sites/all/themes/changemakers/images/event_default.jpg"></a>
						<?php }  ?>
							
						</div>
					   <p style="margin:10px 0 3px 0;">
                        <a class="sample--text__small" >
                            <?php print $fields['title']->content; ?>
                        </a>
                        </p>
                        <div class="detail__small link__gray">
                        <!--<i class="icon-tag txt_gray2"></i> <a class="link__blue"><?//php print  $fields['field_news_event_type']->content; ?></a>-->
                        <i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $date_event; ?></span>
                        
                        </div>
			
					</div>
                    
                </div>
                </div>
            </div>


		<?php
	}
}
else
{

	if($node->type == "event" && strip_tags($fields['counter']->content) == 1)
	{
		?>
		<div class="event--box__big  col-xs-12 ">
			<a href="/event/<?php print $row->nid;?>">
				<div class="thumb">
				<?php
				if(strstr($fields['field_picture']->content,'img')){
					print $fields['field_picture']->content;
				}else{?>
					<a href="/event/<?php print $row->nid;?>"><img src="/sites/all/themes/changemakers/images/event_default.jpg"></a>
				<?php }  ?>

				</div>
			  	<div id="moredetail__over"  class="block--event--more eventnew--field--boxover eventnew--field--blue">
				  	<a href="/event/<?php print $row->nid;?>">
				  		<div class="h3--linelimit__3"><h3 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h3></div>
                    
						<div id="moredetail__hide" class="detail__medium">             
                        	<i class="icon-calendar "></i> <?php print $date_event; ?>
                        </div>
				  	</a>

			  	</div>

			</a>

		</div>

		<?php
	}
	else if($node->type == "event")
	{
		?>
			
		<div class="col-xs-12 event--box__small ">
			<a href="/event/<?php print $row->nid;?>">
				<div class="col-xs-5 pad0">
					<div class="thumb">
                        <?php
						if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{?>
							<a href="/event/<?php print $row->nid;?>"><img src="/sites/all/themes/changemakers/images/event_default.jpg"></a>
						<?php }  ?>
                    </div>
				</div>

				<div class="col-xs-7 pad">
					<a href="/event/<?php print $row->nid;?>">
						<div class="event-detial-width para--link__gray linelimit__2 "><?php print strip_tags($fields['title']->content); ?></div>
						<div class=" detail__small link__gray">
							<!-- class="hide__time" -->
                            <div ><i class="icon-clock"></i> <?php print $date_event;; ?></div>
						</div>
					</a>
				</div>
			</a>
		</div>
	<?php 	
	}
}

?>

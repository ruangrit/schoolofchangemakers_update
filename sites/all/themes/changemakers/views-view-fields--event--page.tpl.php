
<style type="text/css">


</style>
<?php 

$node = node_load($row->nid);

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

if($node->type == "news" && strip_tags($fields['counter']->content) == 1)
{
	?>


    <div class="news--box__big col-xs-12">
	    <a href="/news/<?php print $row->nid;?>">
		    <div class="col-xs-7 pad0">
		    	<div class=" thumb">
				<?php
					if(strstr($fields['field_picture']->content,'img')){
						print $fields['field_picture']->content;
					}else{?>
						<a href="<?php print strip_tags($fields['path']->content); ?>"><img src="/sites/all/themes/changemakers/images/news_default.jpg"></a>
					<?php }  ?>
				</div>
		    </div>

			<div class="col-xs-5 pad0  bottom__blue fixheight detail_event">
				<a href="<?php print strip_tags($fields['path']->content); ?>">
					<div class="eventnew--field--blue">
	                    <div class="field__pad15 h2--linelimit__2">
							<h2 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h2>
	                    </div>
	                </div>
	                <div class="field--detail_event">
	                 	<div class="detail__medium" >
	                 		<div class="tag--linelimit__1 link__gray">
		                        <i class="icon-clock txt_gray2"></i> 
		                        <span class="txt_gray"><?php print $d." ".$month[$m]." ".$y;?></span>
	                        </div>
	                        <?php if(strip_tags($fields['field_news_event_type']->content)!=""):?>
	                        <div class="tag--linelimit__1 margin__top2 link__gray"  >
		                        <i class="icon-tag txt_gray2"></i> 
		                        <?php print strip_tags($fields['field_news_event_type']->content); ?>
	                        </div>
	                        <?php endif;?>
	                 	</div>
		               
	                    <div class="para--link__gray detail--linelimit__3">
	                    	<?php print strip_tags($fields['body']->content);  ?>
	                    </div>
	                   
	                </div>

	            </a>
			</div> 
		</a>  
	</div>

	<?php
}
else if($node->type == "news")
{

?>

	<div class="news--box__small col-xs-6">
        
        <div class="col-xs-5 pad0">
			<div class="news-image-top-event-page thumb ">
				<?php
				if(strstr($fields['field_picture']->content,'img')){
					print $fields['field_picture']->content;
				}else{?>
					<a href="<?php print strip_tags($fields['path']->content); ?>"><img src="/sites/all/themes/changemakers/images/news_default.jpg"></a>
				<?php }  ?>
			</div>
		</div>
		<div class="col-xs-7 detail_news">
			<a href="<?php print strip_tags($fields['path']->content); ?>">
				<div class="detail--linelimit__2"><?php print strip_tags($fields['title']->content); ?></div>
	         
		        <div class="detail__small link__gray" >
		        <?php if(strip_tags($fields['field_news_event_type']->content)!=""):?>
		            <span class="tag--linelimit__1 "><i class="icon-tag txt_gray2"></i> <?php print strip_tags($fields['field_news_event_type']->content); ?></span>
		        <?php endif;?>
                    <div class="tag--linelimit__1">
                    <span class=" icon-clock "></span> <?php print $d." ".$month[$m]." ".$y;?>
                    </div>
		       
		        </div>
	        </a>
         
		</div>
                
	</div>
	<?php 
	}
	else{ ?>

	<div class="news--box__small col-xs-6 " style="float:right;">
        
        
        <div class="col-xs-5 pad0">
			<div class="news-image-top-event-page thumb ">
				<?php
				if(strstr($fields['field_picture']->content,'img')){
					print $fields['field_picture']->content;
				}else{?>
					<a href="<?php print strip_tags($fields['path']->content); ?>"><img src="/sites/all/themes/changemakers/images/news_default.jpg"></a>
				<?php }  ?>
			</div>
		</div>
		<div class="col-xs-7 detail_news">
			<a href="<?php print strip_tags($fields['path']->content); ?>">
				<div class="detail--linelimit__2"><?php print strip_tags($fields['title']->content); ?></div>
	         
		        <div class="detail__small link__gray">
		        <?php if(strip_tags($fields['field_news_event_type']->content)!=""):?>
		            <span class="tag--linelimit__1 "><i class="icon-tag txt_gray2"></i> <?php print strip_tags($fields['field_news_event_type']->content); ?></span>
		        <?php endif;?>
                    
                    <div class="tag--linelimit__1">
                    <span class=" icon-clock "></span> <?php print $d." ".$month[$m]." ".$y;?>
                    </div>
		       
		        </div>
	        </a>
         
		</div>
        
	</div>
	<?php 
}

?>
    

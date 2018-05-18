
<style type="text/css">


</style>
<?php 

$node = node_load($row->nid);

$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

$user = user_load($row->_field_data['nid']['entity']->uid);

// print '<pre>';
// print_r($node);
// print '</pre>';

$img = $node->field_picture['und'][0]['filename'];

?>
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php
						if(strstr($fields['field_picture']->content,'img')){
							print $fields['field_picture']->content;
						}else{?>
							<a href="/news/<?php print $row->nid;?>"><img src="/sites/all/themes/changemakers/images/news_default.jpg"></a>
						<?php }  ?>
		</div>
        <div  id="moredetail__over"  class="field--content boxover">
		<!--<div class="knowledge-title" >-->
            <div class=" d__inline-block">
                <h4 class="headline__thaisan h4--linelimit__2"><?php print $fields['title']->content; ?></h4>
			
                <div class="detail__small__nopad">
                    
			     <div class="tag--linelimit__1">
                <span class="icon-clock txt__gray2"></span> <?php print $d." ".$month[$m]." ".$y;?>
                </div>
                <?php // print $fields['field_knowledge_type']->content;?><!-- <br />-->
                
                 <div class="tag--linelimit__1">
                <?php if(strip_tags($fields['field_news_event_type']->content)!=""):?>
                <span class=" icon-tag txt__gray2"></span> <?php print strip_tags($fields['field_news_event_type']->content); ?></div> 
                <?php endif;?>
                <!--
                <div class="detail--linelimit__1-2">
                <span class=" icon-target txt__gray2"></span>
                <?php // print $target[0]; print $target[1]; ?></div> <br />
			-->
                </div>
			<div id="moredetail__hide">
                <div class="detail__medium">
                <!--<a href="#" ><?php // print $fields['field_profile_firstname']->content;?> <span class="icon-profile-verify member--verify"></span></a><br/>-->
                
                <a href="/news/<?php print strip_tags($fields['nid']->content); ?>">
                    <div class="moredetail__over__content detail--linelimit__3"><?php print $fields['body']->content;?></div>
                </a>
                   
                </div>
                
               
            </div>
        <!--    </div>-->
		</div>
	</div>
</div>
</div>


    

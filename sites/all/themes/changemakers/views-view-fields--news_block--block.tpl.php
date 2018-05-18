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

// print $row->nid;
if(arg(0) == "node" )
{
	if($node->type == "news"  && arg(1) !== $row->nid )
	{
		?>



			<div class="col-xs-12 border--row">
                <div class="row">
				<div class="col-xs-5">
					<div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                        <div class="field-items">
                        <div class="field-item even">
                    
						<?php if(strstr($fields['field_picture']->content,'img')){
                            print $fields['field_picture']->content;
                        }else{?>
                            <img src="/sites/all/themes/changemakers/images/news_default.jpg">
                        <?php }  ?>
                    
                        </div>
                        </div>
					</div>
					<!-- <img width="150" height="150" src="/sites/default/files/<?php //echo $img; ?>"> -->
                </div>
                <div class="col-xs-7 row">
                <div class="detail--linelimit__2">
                
					<?php  print $fields['title']->content; ?>
                
                </div>
                    
                <div class="detail__small link__gray__a">
                
                    <?php 
                     $date_project = strip_tags($fields['field_project_date']->content);
                     $date = changemakers_get_date_thai_block_knowledge($date_project);
                    ?>
                    <div class="detail__small">
                        
                    <?php if(strip_tags($fields['field_news_event_type']->content)!=""):?>
                    <div class="tag--linelimit__06">
                    <i class="icon-tag "></i> <?php print strip_tags($fields['field_news_event_type']->content);  ?>
                    </div> 
                    
                    <?php endif;?>
                    <div class="tag--linelimit__04" style="margin-left:3px;">
                    <span class=" icon-clock "></span> <?php print $d." ".$month[$m]." ".$y;?>
                    </div>
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

	if($node->type == "news" && $node->sticky == 1)
	{
		?>

            <div class="col-xs-12 border--row">
                <div class="row">
                    
                <div class="col-xs-12">
					<div class="">
						<div class="thumbbox--wrap--img--wide">
                        <?php if(strstr($fields['field_picture']->content,'img')){
                            print $fields['field_picture']->content;
                        }else{?>
                            <img src="/sites/all/themes/changemakers/images/news_default.jpg">
                        <?php }  ?>
                        </div>
					   <p style="margin:5px 0 3px 0;">
                        <a href="#" class="sample--text__small" >
                            <?php print $fields['title']->content; ?>
                        </a>
                        </p>
                        <div class="detail__small">
                        <i class="icon-tag txt_gray2"></i> <a href="#" class="link__blue">Opptunity</a>
                        <i class="icon-clock txt_gray2"></i> <span class="txt_gray"><?php print $d." ".$month[$m]." ".$y;?></span></div>
			
					</div>
                    
                </div>
                </div>
            </div>


		<?php
	}
	else if($node->type == "news")
	{
		?>
			
	
			<div class="col-xs-12 border--row">
                <div class="row">
				<div class="col-xs-5">
					<div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                        <div class="field-items">
                        <div class="field-item even">
                        <a href="#">
						<?php if(strstr($fields['field_picture']->content,'img')){
                            print $fields['field_picture']->content;
                        }else{?>
                            <img src="/sites/all/themes/changemakers/images/news_default.jpg">
                        <?php }  ?>
                        </a>
                        </div>
                        </div>
					</div>
					<!-- <img width="150" height="150" src="/sites/default/files/<?php //echo $img; ?>"> -->
                </div>
                <div class="col-xs-7 row">
                
                <a href="#" class="sample--text__small" >
					<?php  print $fields['title']->content; ?>
                </a>
                    
                <div class="detail__small link__gray__a">
                
                    <?php 
                     $date_project = strip_tags($fields['field_project_date']->content);
                     $date = changemakers_get_date_thai_block_knowledge($date_project);
                    ?>
                    <div class="detail__small">
                    <i class="icon-tag txt_gray2"></i> <a href="#" class="link__blue">Opptunity</a>
                    <span class="txt__gray"><span class=" icon-clock txt__gray2"></span> <?php print $d." ".$month[$m]." ".$y;?><br/></span>    
                    </div>
                </div>
                    
                </div>
                </div>
             </div>
	<?php 	
	}
}

?>
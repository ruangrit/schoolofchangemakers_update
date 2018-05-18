<?php 

$node = node_load($row->nid);

$start = $node->field_campaign_date['und'][0]['value'];
$end = $node->field_campaign_date['und'][0]['value2'];

$startd = date('d',strtotime($start));
$startm = intval(date('m',strtotime($start)));
$starty = date('Y',strtotime($start))+543;
$start_date= $startd." ".$month[$startm]." ".$starty;

$endd = date('d',strtotime($end));
$endm = intval(date('m',strtotime($end)));
$endy = date('Y',strtotime($end))+543;
$month = array('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');
$end_date = isset($end)?" - ".$endd." ".$month[$endm]." ".$endy:"";
?>
<div class="col-xs-3 box__pad6">
      
        <div class="page1-4--box">
            
        <div class="thumb">
        <?php print $fields['field_campaign_image']->content ?>
        </div>
      
    
                
                    
    <div class="field--content ">
        <div class="h4--linelimit__2 title">
            <h4 class="headline__thaisan">
              <?php print $fields['title']->content ?></h4>
        </div>
        <div class="detail__small__nopad d__inline-block">
            <div class="txt__gray" style="font-style: italic;">ปิดรับสมัคร</div>
        
            
       
            <div class="txt__gray margin__top5">campaign period</div>
            <div class="txt__black"><?php print $start_date.$end_date;?></div>
        </div>
        <div class="detail__medium txt__blue margin__top5">3 Projects Selected</div>
        
        </div>
          </div>
        
    </div>






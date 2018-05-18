<div class="col-xs-12 border--row">
    <div class="row">
    <div class='col-xs-5' >
        <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
            <div class="field-items">
                <div class="field-item even">
                    <?php print $fields['field_knowledge_image']->content; ?>
                </div>
            </div>
         </div>
    </div>

    <div class="col-xs-7 row">
        
            <div class="detail--linelimit__2"><?php print $fields['title']->content; ?></div>
        
        <div class="detail__small">
            <?php 
                $date_project = strip_tags($fields['field_knowledge_date']->content);
                $d = date('d',strtotime($date_project));
                $m = intval(date('m',strtotime($date_project)));
                $y = date('Y',strtotime($date_project))+543;
                $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
                $date = changemakers_get_date_thai_block_knowledge($date_project);
            ?>
            <span class=" icon-clock  txt__gray2"></span> <?php print $d." ".$month[$m]." ".$y;?><br/> 
        </div> 
    </div>
</div>
</div>
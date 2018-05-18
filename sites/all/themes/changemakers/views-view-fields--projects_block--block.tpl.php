<?php 

    $node = node_load($row->nid);
    if($node->nid != 0){

        // print_r($node->nid);

?>
<div class="col-xs-12 border--row">
    <div class="row">
    <div class='col-xs-5' >
        <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
            <div class="field-items">
                <div class="field-item even">

                    <?php if(!empty($node->field_project_image['und'][0]['fid'])){ ?>
                    <?php print $fields['field_project_image']->content; ?>
                    <?php }else{ ?>
                    <a href="<?php print strip_tags($fields['path']->content); ?>">
                    <img class="image-width-project" src="/sites/all/themes/changemakers/images/project1.jpg">
                    </a>
                    <?php } ?>
                   
                   
                </div>
            </div>
         </div>
    </div>

    <div class="col-xs-7 row">
        
           <span class="detail--linelimit__1"><?php print $fields['title']->content; ?></span>
        
        
        <div class="detail__small__nopad link__gray__a margin__0">
            <a href="/user/<?php print strip_tags($fields['uid']->content); ?>"><span class="icon-profile-verify member--verify"></span> <?php print $fields['name']->content;?> </a> 
            <br />
            <?php 
                $date_project = strip_tags($fields['field_project_date']->content);
                $d = date('d',strtotime($date_project));
                $m = intval(date('m',strtotime($date_project)));
                $y = date('Y',strtotime($date_project))+543;
                $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
                $date = changemakers_get_date_thai_block_knowledge($date_project);
            ?>
            <span class=" icon-clock txt__gray2"></span> <?php print $d." ".$month[$m]." ".$y;?><br/>
        </div> 
    </div>
</div>
</div>

<?php } ?>

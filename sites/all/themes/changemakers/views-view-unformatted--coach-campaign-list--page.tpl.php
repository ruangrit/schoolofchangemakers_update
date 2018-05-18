
<?php 
global $user;

$sql =  "select entity_id from field_data_field_coach_campaign where field_coach_campaign_uid='".$user->uid."'";
$query_db = db_query($sql);
foreach ($query_db as $key => $rows) {
$node = node_load($rows->entity_id);

print "<pre>";
print_r($node);
print "</pre>";
?>

<div class="col-xs-12 margin__top20 pagebigtab--campaign ">

<div class="thumb">
        <div class="row">
        <?php //print $fields['field_campaign_image']->content ?>
        <img src="/sites/default/files/<?php print $node->field_campaign_image['und'][0]['filename']; ?> ">
        </div>
</div>

<div class="pagebigtab--detail  col-xs-8 ">
    <div class="detail__small txt__gray">SPONSORED BY</div>
    
    <?php ?>
    
    <div class="pagebigtab-detail--name">
            <h1 class="headline__thaisan pagebigtab--name clear"><?php //print $fields['title']->content ?></h1>
    </div>
    
        <?php // print $fields['body']->content ?>
    
        <div class="margin__top10">
        
        <div class="pagebigtab--detail--box2 detail--icon--stage">
                    <p class="pagebigtab--detail-topic">STAGE</p>
                    <p class="pagebigtab--detail-txt"><?php //print $fields['field_campaign_stage']->content;  ?></p>
            </div>
            
            <div class="pagebigtab--detail--box2 detail--icon--update">
                    <p class="pagebigtab--detail-topic">CAMPAIGN PERIOD</p>
                    <p class="pagebigtab--detail-txt"><?php 
                     //$date_campaign = strip_tags($fields['field_campaign_date']->content);

                    // if(!empty($date_campaign)){

                       
                    //    // $date_ca = //changemakers_get_date_start_date_campaign_list($date_campaign);

                    //     print $date_ca[0]."- ".$date_ca[1]; 
                    //     // print '<pre>';
                    //     //  print_r($date_ca); 
                    //     //  print '</pre>';
                    // }
                    ?>
                    </p>
            </div>
            <div class="pagebigtab--detail--box2 detail--icon--stage">
                    <p class="pagebigtab--detail-topic">PROJECT JOINED</p>
                    <p class="pagebigtab--detail-txt"><?php  

                    //  // print '<pre>';
                    //  // print_r($fields['field_project_join']->content); 
                    //  // print '</pre>';
                    // $data = node_load(strip_tags($fields['nid']->content));
                    // print count($data->field_project_join['und']);
                    // // print '<pre>';
                    // //  print_r($data); 
                    // //  print '</pre>';


                    ?></p>
            </div>
			

			<div class="pagebigtab--detail--box2 detail--icon--status">
                    <p class="pagebigtab--detail-topic">FINALISTS</p>
                    <p class="pagebigtab--detail-txt"><?php //print changemakers_get_projects_in_final(strip_tags($fields['nid']->content)); ?></p>
            </div>
    
    </div>
    
</div> 
</div>


<?php } ?>
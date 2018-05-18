<?php 
$project = changemaker_halper_campaign_get_project(strip_tags($fields['nid']->content));
$project = changemakers_sort_date_update_project($project);

//$sponsor = user_load(strip_tags($fields['field_partner_campaign']->content)); ?>

<div class="col-xs-12 margin__top20 pad0 pagebigtab--campaign related_campaign">

    <div class="thumb">
            
            <?php print $fields['field_campaign_image']->content ?>
            
    </div>

    <div class="pagebigtab--detail  col-xs-8 pad0 ">
        <div class="detail__small__nopad txt__gray">SPONSORED BY</div>
        
        <?php if(!empty($fields['field_sponsored']->content)){ ?>
        <!-- <div class="pagebigtab-thumb  col-xs-12 "> -->
          <?php print $fields['field_sponsored']->content; ?>
        <!-- </div> -->
        <?php } ?>
        
        <div class="pagebigtab-detail--name">
            <h1 class="headline__thaisan pagebigtab--name clear"><?php print $fields['title']->content ?></h1>
        </div>
        
            <?php // print $fields['body']->content ?>
        
            <div class="margin__top10">
            
            <div class="pagebigtab--detail--box2 detail--icon--stage">
                        <div class="pagebigtab--detail-topic">STAGE</div>
                        <div class="pagebigtab--detail-txt"><?php print $fields['field_campaign_stage']->content;  ?></div>
                </div>
                
                <div class="pagebigtab--detail--box2 detail--icon--update">
                        <p class="pagebigtab--detail-topic">CAMPAIGN PERIOD</p>
                        <p class="pagebigtab--detail-txt"><?php 
                         $date_campaign = explode(" to ", strip_tags($fields['field_campaign_date']->content));

                        if(!empty($date_campaign)){

                           
                            print _changemakers_thai_daterange_format($date_campaign[0] , $date_campaign[1] );

                            //print $date_ca[0]."- ".$date_ca[1]; 
                            // print '<pre>';
                            //  print_r($date_ca); 
                            //  print '</pre>';
                        }
                        ?>
                        </p>
                </div>
                <div class="pagebigtab--detail--box2 detail--icon--stage">
                        <p class="pagebigtab--detail-topic">PROJECT JOINED</p>
                        <p class="pagebigtab--detail-txt"><?php  

                         // print '<pre>';
                         // print_r($fields['field_project_join']->content); 
                         // print '</pre>';
                        $data = node_load(strip_tags($fields['nid']->content));
                        print count($data->field_project_join['und']);
                        // print '<pre>';
                        //  print_r($data); 
                        //  print '</pre>';


                        ?></p>
                </div>
    			

    			<div class="pagebigtab--detail--box2 detail--icon--status">
                        <p class="pagebigtab--detail-topic">FINALISTS</p>
                        <p class="pagebigtab--detail-txt"><?php print changemakers_get_projects_in_final(strip_tags($fields['nid']->content)); ?></p>
                </div>
        
        </div>
        
    </div> 


</div>
<div class="col-xs-12 margin__top20 campaign_latest_project">
    <div class="latest_project ">
        <h3 >LATEST UPDATED PROJECTS</h3>
        <div class="row">
        <?php 
        $count=0;
        foreach($project as $key =>$item):
        $p = node_load($item['nid']);
        // print "<pre>";
        // print_r($p);
        // print "</pre>";
        if(!empty($p) && $count<4){
        ?>
        <div class="col-xs-3 box__pad6">
            <div class="page1-4--box ">
                
                <div class="thum">
                <a href="/project/<?php print $item['nid'];?>">
                <?php if($p->field_project_image['und'][0]['uri']!=""):?>
                   <img src="<?php print image_style_url('large',$p->field_project_image['und'][0]['uri']);?>">
                   <?php else:?>
                   <img src="/sites/all/themes/changemakers/images/project1.jpg">
                <?php endif;?>
                </a>
                </div>
                 
                <div class="field--content boxover">    
                    <div class="detail__small__nopad d__inline-block">
                         <a href="/project/<?php print $item['nid'];?>"><h4 class="headline__thaisan h4--linelimit__2"><?php print $p->title; ?></h4></a>
                        <span class="icon-clock txt__gray2"></span> <?php print changemakers_format_date_thai_short($item['last_update']); ?>                 

                    </div>
                </div>
            </div>
        </div>
            
        <?php $count++;
        }
        endforeach;?>
        <?php if($count == 0){
            print '<div class="margin__top30 txt__center col-xs-12 ">
                    <h4 class="headline__thaisan">ไม่มีโปรเจกต์ที่เข้าร่วมแคมเปญนี้</h4>
                </div>';
        } ?>
        </div>

    </div>
</div>






    <div class="sidebar--verti--content" >
 
        <div class="col-xs-12 border--row">
        <div class="row">
        <div class="col-xs-5">
            <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                    <?php 
                    $type = strip_tags($fields['field_community_forum_topic_type']->content);
                  // print_r($type);
                    if(strstr($fields['field_commuity_image']->content,'img')):?>
                        <?php  print $fields['field_commuity_image']->content; ?> 
                    <?php elseif($type=='Need'): ?>                        
                        <img src="/sites/all/themes/changemakers/images/default_need.jpg" />
                    <?php elseif($type=="Others"):?>
                        <img src="/sites/all/themes/changemakers/images/default_other.jpg" />
                    <?php elseif($type=="Coach Record"): ?>
                        <img src="/sites/all/themes/changemakers/images/default_coach_record.jpg" />
                    <?php elseif($type=="Offer"): ?>
                        <img src="/sites/all/themes/changemakers/images/default_offer.jpg" />
                    <?php elseif($type=="Announcement"): ?>
                        <img src="/sites/all/themes/changemakers/images/default_announcement.jpg" />
                    <?php endif;?>
                
                    <?//php  print $fields['field_commuity_image']->content; ?> 
            
                </div>
            </div>
            <!-- <img width="150" height="150" src="/sites/default/files/"> -->
      
        <div class="col-xs-7 row">

        <a href="#" class="sample--text__small">
            <span class="field-content"><?php print $fields['title']->content; ?></span></a>               

        <div class="detail__small link__gray__a">

            <div class="detail__small">
           
            <span class="txt__gray"><span class=" icon-clock txt__gray2"></span><?php 
            $date_campaign = strip_tags($fields['field_commuity_date']->content);
            $date_for_campaign = changemakers_get_date_start_date($date_campaign);
             print $date_for_campaign[0];

      //         print "<pre>";
      // print_r($date_for_campaign);
      // print "</pre>";
            ?><br></span>    
            </div>
        </div>
            
        </div>
            </div>
    </div>
            
            <p><?php  //print $fields['body']->content; ?> </p>
            
            <!--<div style="text-align:center;">
            <button class="btn btn--submit " type="submit" name="op" value="Submit">Join Project</button>
            </div>
        -->

     </div>   

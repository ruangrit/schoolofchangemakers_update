
        
<div class="col-xs-12 margin__top30">
  <div class="row">

    <div class="thumb-dash col-xs-4 ">
        
          <?php print$fields['field_campaign_image']->content;?>
        
    </div>


    <div class="pagebigtab--detail  col-xs-8 ">

      <div class="pagebigtab-detail--name">

          <h1 class="headline__thaisan pagebigtab--name clear">
            <?php print $fields['title']->content;?>
          </h1>

      </div>
        
    
      <?php $date_campaign = changemakers_get_date_start_date_campaign(strip_tags($fields['field_campaign_date']->content)); ?>
    
   
    <div class="margin__top10 campaign--admin--dashboard">
      <span class="icon-clock txt__gray"></span> <?php print $date_campaign[0]." - ".$date_campaign[1]; ?><br>
    </div>
        <!--
    <div class="margin__top10 clear">
      <?php print $fields['body']->content ?>
      
    </div>
    <div class="margin__top10 clear">
        <a href="/node/<?php print strip_tags($fields['nid']->content); ?>/edit?destination=admin/content">
        <button class="btn btn--default">Update This Campaign</button>
      </a>
        </div>-->
    </div>
  </div>
</div>
<br>
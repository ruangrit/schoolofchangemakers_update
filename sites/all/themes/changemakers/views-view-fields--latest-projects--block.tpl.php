<style type="text/css">
	/*.project-image-height img{
		width: 273.5px;
		height: 150px !important;
	}*/
	.color-text-link a{
		color: #FFFFFF;
		font-size: 20px;
	}
	.text-padding-project{
		padding-left:10px; 
    }
    .block-project-detail{
        margin:0 auto;
    }
</style>

<?php 
$problem = explode("All,", strip_tags($fields['field_problem_topic']->content));
// $target = explode("All,", strip_tags($fields['field_journal_target']->content));

?>



    <div class=" project--box ">
	<div class="thumb">
		<?php print $fields['field_project_image']->content; ?>	<?php //print $fields['']->content;?>
	</div>
     <a href="<?php print strip_tags($fields['path']->content); ?>" >  
    <div id="moredetail__over" class="field--content project--boxover">
        
    <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $fields['title']->content;?></h4></div>
    
	<div class="detail__small__nopad  margin__top5 link__gray">
        <div class="tag--linelimit__1">
        	<?php print changemaker_check_icon_um(changemakers_get_name_contact(strip_tags($fields['name_1']->content))); ?>
            <?php print changemakers_get_contact(changemakers_get_name_contact(strip_tags($fields['name_1']->content)));?> 
        </div>
        <div class="tag--linelimit__1"><span class=" icon-clock "></span> <?php print timeAgo(strip_tags($fields['last_comment_timestamp']->content)); ?></div>
        
     </div>   
        
     
    <div id="moredetail__hide">
        
        <div class="detail__small__nopad">
         <?php if(!empty($problem[0]) || !empty($problem[1])): ?>
        <div class="tag--linelimit__1"><span class="icon-tag "></span> <?php print $problem[0]; print $problem[1]; ?></div>
    	<?php endif; ?>
    	<?php if(!empty(strip_tags($fields['field_project_target']->content))): ?>
        <div class="tag--linelimit__1"><span class='icon-target'></span> <?php print strip_tags($fields['field_project_target']->content) ?></div>
    	<?php endif; ?>
        </div>
        
        <div class=" detail__medium">
            <div class="moredetail__over__content" > <span class="detail--linelimit__2"><?php print strip_tags($fields['body']->content);?></span></div>
        </div>
         <span class="hidecontent--readmore">READ MORE <i class="glyphicon glyphicon-play-circle"></i></span>
    </div>
    
	
        
    </div>
    </a>

    
    </div>


<!--
<div class="projects-title-animate">
	<div class="project-image-height">
		<div><?php //print $fields['field_project_image']->content; ?></div>	<?php //print $fields['']->content;?>
	</div>
	<div class="text-padding-project">
		<?php //print $fields['title']->content;?>
	</div>
	<p class="text-padding-project">
		<?php //print $fields['name']->content;?>
	</p>
	<div class="project-description">
		<p class="text-padding-project color-text-link"><?php //print $fields['title']->content;?></p>
		<p class="text-padding-project"><?php //print strip_tags($fields['field_problem_topic']->content);?></p>
		<p class="text-padding-project"><?php //print strip_tags($fields['body']->content);?></p>
	</div>
    
    
    
    
</div>

-->
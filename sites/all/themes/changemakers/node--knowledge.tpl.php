<style type="text/css">
        #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }
</style>
<?php 
global $user;
$node = node_load($nid);
$data_user = user_load($node->uid);
$date_thai = changemakers_get_date_thai($node->field_knowledge_date['und'][0]['value']);

//$date = changemakers_format_date_thai();

// module_load_include('inc','webform','includes/webform.submissions');
// $seleteions = webform_get_submissions(array('nid'=>2));

// $result = array();
// foreach ($seleteions as $key => $value) {
// 	$result[] = $value;
// }
// $checkJoinProject = 0;
// for ($i=0; $i < count($result); $i++) 
// { 
// 	if($result[$i]->data[1][0] == $user->uid && $result[$i]->data[2][0] == $nid)
// 	{
// 		$checkJoinProject  = 1;
// 	}
// }
/*************get form_build_id***************/
// $form_build_id = 'form-' . md5(uniqid(mt_rand(), TRUE));

// $form_token =  drupal_get_token('webform_client_form_3');

// $user_fields = user_load($node->uid);

// // $firstname = $user_fields->field_firstname['und']['0']['value'];
// // $lastname = $user_fields->field_lastname['und']['0']['value'];
// $user_picture =  $node->picture->filename;


// print '<pre>';
// print_r($node->field_knowledge_problem['und']);
// print '</pre>';


?>

<?php //var_dump(user_load($user->uid)); ?>






<div class="col2--viewcontent ">
<div class="viewcontent--box col-xs-12 bottom__red">

        <h1 class="headline__thaisan viewcontent--title">
        <?php print $node->title; ?>
        </h1>

<div class="sidebar--line "></div>
    
    
    <div class="viewcontent--detail row ">
        
	<div class="col-xs-8 detail__medium" >
        <div class="margin__top5" >
        <?php if($node->field_knowledge_date['und'][0]['value']!=""):?>
            <i class="icon-clock"></i> <?php print $date_thai; ?>
        <?php endif;?>
        </div>
		<div class=" tagpage--linelimit__3 margin__top5" >
        <?php if($node->field_knowledge_problem['und']!=""): ?>
            <i class="icon-tag"></i> 
			<?php 
            $i = 0;			
			foreach ($node->field_knowledge_problem['und'] as $key => $field_knowledge_problem) :	
            if(taxonomy_term_load($node->field_knowledge_problem['und'][$i]['tid'])->name != "All" && taxonomy_term_load($node->field_knowledge_problem['und'][$i]['tid'])->name != "อื่น ๆ (ระบุ)"){			
				if($i==0){
                    print taxonomy_term_load($node->field_knowledge_problem['und'][$key]['tid'])->name;
                }else{
					 print taxonomy_term_load($node->field_knowledge_problem['und'][$key]['tid'])->name.", ";
				}
                $i++;
            }
			endforeach;

            if($i == 0){
                print "All";
            }
			?>
        <?php endif; ?>
        </div>
        <br/>

		<div class="margin__top5" >
        <?php if($node->field_knowledge_target['und']!=""): ?>
        <i class="icon-target"></i> 
		
			<?php 	
            $i = 0;		
			foreach ($node->field_knowledge_target['und'] as $key => $field_knowledge_target) :
                if(taxonomy_term_load($node->field_knowledge_target['und'][$i]['tid'])->name != "All" && taxonomy_term_load($node->field_knowledge_target['und'][$i]['tid'])->name != "อื่น ๆ (ระบุ)"){           
            
    				if($i==0):
    					 print taxonomy_term_load($node->field_knowledge_target['und'][$i]['tid'])->name;
    				else:
    					 print taxonomy_term_load($node->field_knowledge_target['und'][$i]['tid'])->name.", ";
    				endif;
                    $i++;
                }
			endforeach;
            if($i == 0){
                print "All";
            }
        ?>
        <?php endif; ?>
        </div>
		<br/>
  
	
	</div>
    
    <div class="col-xs-4 txt__right" style="margin-top:15px;">
    	<!-- Go to www.addthis.com/dashboard to customize your tools -->
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
            <!-- <div class="row">
              <div class="socialshare--box">
            <a onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=changemakers.devfunction.com/knowledge/<?php echo $nid; ?>" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
			<div class="socialshare--total"><span id="fb_count" class="txt__bold"> 0</span><br/>Share</div>
            </div>
            
            
             <div class="socialshare--box">
            <a onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://twitter.com/share?url=http://changemakers.devfunction.com/knowledge/<?php echo $nid; ?>&text=<?php print $node->title?>" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
             <div class="socialshare--total"><span class="txt__bold"> 365</span><br/>Tweets</div>    
		
            </div>
             
                
        
             <div class="socialshare--box">
			<a onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://plus.google.com/share?url=changemakers.devfunction.com/knowledge/<?php echo $nid; ?>" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
			
                <div class="socialshare--total"><span id="g_count" class="txt__bold"> 0</span><br/>Share</div>    
            </div>
            
                
	        </div> -->
        </div>
    </div>
    
    <div class="col-xs-12 viewcontent--body ">
     <?php if($node->field_knowledge_image['und'][0]['filename']!=""):?>
        <div class="field field-name-field-knowledge-image field-type-image field-label-hidden">
            <div class="field-items">
                <div class="field-item even">
                    <?php if($node->field_knowledge_image['und'][0]['uri']!=""):?>
                    <?php  $org_image = file_create_url($node->field_knowledge_image['und'][0]['uri']); ?>
                    <?php $url_imag_style= image_style_url('large',$node->field_knowledge_image['und'][0]['uri']); ?>
                    <a href="<?php print $org_image;?>" rel="lightbox" ><img src="<?php print $org_image;  ?>" class="img-responsive"></a>
                    <?php else:?>
                    <!-- 
                    <a href="/sites/all/themes/changemakers/images/news_default.jpg" rel="lightbox" ><img src="/sites/all/themes/changemakers/images/news_default.jpg" width="480"></a>
                     -->
                    <?php endif;?>
                   <!--  <img class="img-responsive" src="/sites/default/files/<?php // print $node->field_knowledge_image['und'][0]['filename'];?>"> -->
                </div>
            </div>
        </div>
    <?php endif;?>
        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
            <div class="field-items">
                <?php print $node->body['und'][0]['value']; ?>
            </div>
        </div>
        <div class="field field-name-field-hashtags field-type-taxonomy-term-reference field-label-above">
            <div class="field-label">Hashtags:&nbsp;</div>
            <div class="field-items">
                <div class="field-item even">
                    <!--<a href="/hashtags/coach">-->
                    <?php
                    $hashtags = array();
                    foreach ($node->field_hashtags['und'] as $key => $value) {
                        $hashtags[] = $value['taxonomy_term']->name;
                        
                    }
                    print_r(implode(', ',$hashtags));
                    // print $node->field_hashtags['und'][0]['tid'];?>
                        
                    <!--</a>-->
                </div>
            </div>
        </div>
        <div>
            <?php if(!empty($node->field_knowledge_document['und'])){ ?>
           <h1 class="headline__thaisan viewcontent--title">Knowledge Document </h1>
           <?php } ?>
            <?php
                // print "<pre>";
                // print_r($node->field_knowledge_document['und']);
                // print "</pre>";

            foreach ($node->field_knowledge_document['und'] as $key => $value) {
               $file_know_ledge = $value['filename'];
               $field_path =  file_create_url($value['uri']);
               $field_file_size =  "(".round(($value['filesize'] / 1024), 0)." Kb )";

               ?>
                <div  class="knowledge-document">
                    <a href="<?php echo $field_path; ?>" type="application/msword; length=101888" target="_blank">
                                        
                            <div class="btn btn--dowload--file">
                                <i class="icon-download"></i>
                                <?php echo $file_know_ledge ?>
                                <?php echo $field_file_size;?>
                            <!-- <input type="submit" id="edit-field-root-cause-analysis-und-0-remove-button" name="field_root_cause_analysis_und_0_remove_button" value="Remove" class="form-submit ajax-processed"> -->
                            <!-- <input type="hidden" name="field_root_cause_analysis[und][0][fid]" value="78">
                            <input type="hidden" name="field_root_cause_analysis[und][0][display]" value="1"> -->
                        </div>
                    </a>
                    <?php //echo $field_path;?>
                </div>

               <?php
            }

               
                
            ?>
        </div>
        <!--<p>
			<?php // print render($content); ?>
		</p>-->
    </div>
    <div class="col-xs-12">
    	<?php if(!empty($node->field_vdo_youtube['und'])): ?>
    	<div class="field-label">Vdo Youtube:&nbsp;</div>
    	<?php foreach ($node->field_vdo_youtube['und'] as $key => $value) : ?>
    	<?php //$source = str_replace("watch?v=", "embed/", $value['value']);
    	$source=  preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$value['value']); ?>

    	<?php print $source ; ?>

    		
    	<?php endforeach; ?>
		<?php endif; ?>
    </div>


                      
    

    
</div>
<div class="margin__top20">
    <?php

        $node_comment = node_load($node->nid);
        $node_view = node_view($node);
        $node_view['comments'] = comment_node_page_additions($node_comment);
        print render($content['comments']);


    ?>
    </div>     
<!--    
	<div class="col-md-1 padding-header button-float-right">
		<a >
			<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
		</a>
	</div>
	<div class="col-md-1 padding-header button-float-right">
		<a >
			<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/twitter_icon.png"></p>
		</a>
	</div>
-->
    

</div>


<div class="col2--sidebar " style="position:relative;">
    <!--<div class="sidesection-bg-out"></div>-->
	<div class="sidebar--wrap  bottom__lightgray" style="margin-top:0;">
        
        
		<h3 class="headline__thaisan headline--sidebar__yellow">AUTHOR</h3>
        <div class="sidebar--line"></div>
		    
        <div class="txt__center">
    
            <a href="/user/<?php print $data_user->uid; ?>">
   
                <div class="sidebar--wrap--display">
                <?php 
                //echo str_replace("public://","/sites/default/files/",$data_user->picture->uri);
                if($data_user->picture->uri!=""):?>
        		    <img width="300" src="<?php print str_replace("public://","/sites/default/files/",$data_user->picture->uri);?>">
                <?php else:?>
                    <img width="300" src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
                <?php endif;?>
                </div>
                
                <p class="sidebar--username">

                <?php //print $data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; 
                    print changemakers_get_contact($data_user->uid); ?>                 
                </p>
     
            </a>
  
        </div>
            <p class="content">
                <?php if(!empty($data_user->field_intro_self['und'][0]['value']) && $data_user->field_intro_self['und'][0]['value']!= "" )
                { print $data_user->field_intro_self['und'][0]['value']; } ?></p>
        
        <div class="col-xs-12 txt__center padding__box">
        <?php if(isset($user->roles[3]) || $user->uid == $node->uid){ ?>
        <a href="/node/<?php print $nid;?>/edit">
            <button class="btn btn--submit " type="button" name="op" value="Submit">แก้ไข Knowledge</button>
        </a>
        <?php } ?>
    </div>
    </div>
        
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:0px 0;">
            <?php echo views_embed_view('banner_views', $display_id = 'block'); ?>
        </div>
    </div>
        
		<div class="sidebar--wrap bottom__lightgray col-xs-12">
        
        <div class="row">    
		<h3 class="headline__thaisan headline--sidebar__red">RELATED KNOWLEDGE</h3>
          <div class="sidebar--line"></div>            
        <div class=" sidebar--verti--content" >
            <?php echo views_embed_view('knowledge_block', $display_id = 'block'); ?>
            <!-- <div class="row">
                <div class='col-xs-5' >

                    <div class="field  field-type-image field-label-hidden sidebar--wrap--img">
                        <div class="field-items">
                            <div class="field-item even">
                                <a href="/content/csr-%E0%B8%81%E0%B8%B1%E0%B8%9A-csv-%E0%B8%95%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B8%81%E0%B8%B1%E0%B8%99%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%84%E0%B8%A3"><img typeof="foaf:Image" class="img-responsive" src="http://changemakers.devfunction.com/sites/default/files/be4ec3d3c21a6e8e092bc82e42713845.jpg"  class="knowledge-last-thumb"/></a></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-7 row">
                    
                   <a class="sample--text__small">กลับมาที่บทความข้างต้นครับ ทางผู้เขียนบทความได้แนะนำ..</a>
                
                    <div class="detail__small">
                        <span class="txt__gray"><span class=" icon-clock"></span> 30 ก.พ.<br/></span>
                    </div> 
                </div>
            </div> -->
        </div></div>
            
        </div><!--End Related knowledge-->
        
        <?php //print $data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; ?>
        <?php //print $data_user->field_intro_self['und'][0]['value'];?>
		      

    
    
    
    
  
    
    <div class="sidebar--wrap bottom__lightgray col-xs-12">
        <div class="row">
		  <h3 class="headline__thaisan headline--sidebar__yellow">RELATED PROJECT</h3>
            <div class=" sidebar--verti--content" >
                <?php echo views_embed_view('projects_block', $display_id = 'block'); ?>
            </div>
            <div class="sidebar--line"></div>
        </div>
            
    </div>
        
<!--End Related Project-->
<!--
		    <tbody>
		      <tr>
		        <td>
		        	
		        </td>
		      </tr>
		      <tr>
		        <td><?php //print $data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; ?></td>
		      </tr>
		      <tr>
		        <td><?php //print $data_user->field_intro_self['und'][0]['value'];?></td>
		      </tr>
		    </tbody>
		  </table>
		<?php //echo views_embed_view('knowledge_block', $display_id = 'block'); ?>
	-->
</div><!--END Sidebar-->
<script>
// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6&appId=1044418628957648";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
</script>
<script>
 //  	$.ajax({
	// type: 'GET',
	// url: 'http://graph.facebook.com/http://changemakers.devfunction.com/news/<?php echo $nid; ?>',
	// success: function(data) {
	// 	$('#fb_count').text(data.shares);	
	// }
	// });
	// $.ajax({
	// type: 'GET',
	// dataType: "JSONP",
	// url:'http://count.donreach.com/?url=http://changemakers.devfunction.com/news/<?php echo $nid; ?>',
	//   }).done(function ( data ) {
	// 	$('#g_count').text(data.shares.google);	
	// });
</script>
    

 <?php //print render($content['comments']); ?>
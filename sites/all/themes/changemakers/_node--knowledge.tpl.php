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
// print_r($data_user);
// print '</pre>';


?>

<?php //var_dump(user_load($user->uid)); ?>






<div class="col2--viewcontent ">
<div class="viewcontent--box col-xs-12 bottom__red">

        <h1 class="headline__thaisan viewcontent--title">
        <?php print $node->title; ?>
        </h1>

<div class="sidebar--line "></div>
    
    
<div class="viewcontent--detail row">
        
	<div class="col-xs-6 ">
        <i class="icon-clock"></i> <?php print $date_thai; ?><br/>
		<i class=" icon-location"></i> ห้องประชุมใหญ่ มหาวัทยาลัยนอร์ทอีสเทิร์น<br/>
		<i class="icon-tag"></i><a href="#">Tag
			<?php 			
			foreach ($node->field_knowledge_problem['und'] as $key => $field_knowledge_problem) :				
				if($key==0):
					//print $field_knowledge_problem['taxonomy_term']->name;
				else:
					//print ', '.$field_knowledge_problem['taxonomy_term']->name;
				endif;
			endforeach;
			?>
        </a>
        <br/>

		<i class="icon-target"></i>
		<a href="#">Target
			<?php 			
			foreach ($node->field_knowledge_target['und'] as $key => $field_knowledge_target) :
				if($key==0):
					//print $field_knowledge_target['taxonomy_term']->name;
				else:
					//print ', '.$field_knowledge_target['taxonomy_term']->name;
				endif;
			endforeach;
			?>
		</a><br/>
  
	
	</div>
    
    <div class="col-xs-5 col-xs-offset-1" style="margin-top:15px;">
            <div class="row">
            <div class="socialshare--box">
            <a target="_blank" href="https://www.facebook.com/AshokaThailand" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
            
            <div class="socialshare--total"><span class="txt__bold">365</span><br/>Share</div>
            </div>
            
            
            <div class="socialshare--box">
            <a href="#twitter" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
            
                <div class="socialshare--total"><span class="txt__bold">365</span><br/>Tweets</div>    
            </div>
             
                
        
            <div class="socialshare--box">
			<a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
			
                <div class="socialshare--total"><span class="txt__bold">25</span><br/>Share</div>    
            </div>
            
                
	        </div>
        </div>
    </div>
    
    <div class="col-xs-12 viewcontent--body">
		<p>
			<?php  print render($content); ?>
		</p>
    </div>
    
</div>

<!--    
	<div class="col-md-1 padding-header button-float-right">
		<a href="#">
			<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
		</a>
	</div>
	<div class="col-md-1 padding-header button-float-right">
		<a href="#">
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
        <div class="sidebar--wrap--display">
		    <img width="300" src="/sites/default/files/pictures/<?php print $data_user->picture->filename;?>">
        </div>
        
            <a href="#"><p class="sidebar--username"><?php print $data_user->field_profile_firstname['und'][0]['value']." ".$data_user->field_profile_lastname['und'][0]['value']; ?></p></a>
        </div>
            <p class="content"><?php print $data_user->field_intro_self['und'][0]['value'];?></p>
    </div>
        
    <div class="txt__center">
        <div style="width:300px; height:250px; background:#f4f4f4; color:#cccccc; margin:20px auto;  text-align:center; padding:115px 0;"> 300 x 250 </div>
    </div>
        
		<div class="sidebar--wrap  bottom__red col-xs-12"><div class="row">
		<h3 class="headline__thaisan headline--sidebar__tabred"><a href="#" class="link__allwhite">RELATED KNOWLEDGE</a></h3>
                      
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
		      

    
    
    
    
  
    
    <div class="sidebar--wrap  bottom__yellow col-xs-12">
        <div class="row">
		  <h3 class="headline__thaisan headline--sidebar__tabyellow"><a href="#" class="link__allwhite">RELATED PROJECT</a></h3>
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

    
	
 <?php //print render($content['comments']); ?>
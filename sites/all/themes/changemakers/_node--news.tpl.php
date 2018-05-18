
<?php 
$node = node_load($nid);
global $user;
$date_news = changemakers_get_date_start_and_end($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);

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

// $firstname = $user_fields->field_firstname['und']['0']['value'];
// $lastname = $user_fields->field_lastname['und']['0']['value'];
// $user_picture =  $node->picture->filename;


// print '<pre>';
// print_r($node);
// print '</pre>';


?>

<?php //var_dump(user_load($user->uid)); ?>

<!--<div class="col2--viewcontent content_news_padding">-->
<div class="col2--viewcontent">
    <div class="viewcontent--box col-xs-12 bottom__blue">

        <h1 class="headline__thaisan viewcontent--title">
        <?php print $node->title; ?>
        </h1>
        
        <div class="sidebar--line "></div>
        
        
        
    <div class="viewcontent--detail row">
	<div class="col-xs-6 ">
		<i class="icon-clock"></i> <?php print $date_news[0];?><br />
        <i class="icon-tag"></i> <a href="#">Tag <?php

            for ($i=0; $i < count($node->field_target_interest['und']) ; $i++) { 
                if($i == count($node->field_target_interest['und'])-1){
                   print taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name;
                }
                else{
                    print taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name.", "; 
                }
                
            }
            

         ?></a><br />
        <i class="icon-target"></i> <a href="#"><?php

            for ($i=0; $i < count($node->field_problem_interest['und']) ; $i++) { 
                if($i == count($node->field_problem_interest['und'])-1){
                   print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name;
                }
                else{
                    print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name.", "; 
                }
                
            }
            

         ?></a>
		<!--<p>
			<?php // print render($content); ?>
		</p>-->
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
              <!--   <a  class=" social-button2 "><div class="g-plus" data-action="share" data-annotation="none" ></div></a>-->
			<a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
		         
                <div class="socialshare--total"><span class="txt__bold">25</span><br/>Share</div>    
            </div>
            
                
	        </div>
        </div>
    </div>
        
    <div class="col-xs-12 viewcontent--body">
		<p>
			<?php  
        $comment = $content['comments'];
        unset($content['comments']);
        print render($content);
        print render($comment);

    ?>
		</p>
        <div class="pagebigtab--update--content col-xs-8 float__right margin__top15">
            <?php 

            //print render($content['comments']); 
            //ide($content['comments']);

            ?>    
        </div> 

    </div>     
        
    </div>

    
    

    
</div>
    
    

<div class="col2--sidebar " style="position:relative; ">
    <div class="sidebar--wrap  bottom__lightgray col-xs-12" style=" margin-top:0;">
            <div class="row">

            <h3 class="headline__thaisan headline--sidebar__blue"><a href="#">กิจกรรมอื่น ๆ</a></h3>
            <div class="sidebar--line"></div>
            <div class=" sidebar--verti--content" >
            <?php echo views_embed_view('news_block', $display_id = 'block'); ?>
            </div>
        </div>
    </div>
</div>

 <?php //print render($content['comments']); ?>    


<script>
  window.___gcfg = {
    lang: 'en-US',
    parsetags: 'onload'
  };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<?php 
$node = node_load($nid);
global $user;


$d = date('d',$node->created);
$m = intval(date('m',$node->created));
$y = date('Y',$node->created)+543;
$h = date('H',$node->created);
$i = date('i',$node->created);
$month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

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
// print_r($node->field_target_interest['und']);
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
  	        <div class="col-xs-8 detail__medium">
              <div class="tag--linelimit__1">
      		      <i class="icon-clock"></i> <?php print $d." ".$month[$m]." ".$y;?>
              </div>
             
              <div class="tag--linelimit__1">
              <?php if(!empty($node->field_problem_interest['und'])){ ?>
              <i class="icon-tag"></i> 
              <?php } 
              	$count_problem =  count($node->field_problem_interest['und']);
                  for ($i=0; $i < count($node->field_problem_interest['und']) ; $i++) { 
                    if(taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name != "All" && taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name != "อื่น ๆ (ระบุ)"){
                      if($i == ($count_problem-1)){
                         print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name;
                      }
                      else{
                          print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name.", "; 
                      }
                    }
                  }?>
              </div>
             
              <div class="tag--linelimit__1">
               <?php if(!empty($node->field_target_interest['und'])){ ?>
                    <i class="icon-target"></i> 
               <?php }         
              
               	$count_target = count($node->field_target_interest['und']);
                  for ($i=0; $i < $count_target ; $i++) { 
                    if(taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name != "All" ){
      	           // print_r($node->field_target_interest['und'][$i]['tid']);
      	            if($node->field_target_interest['und'][$i]['tid']==109){
      	            	$target_interest = $node->field_target_interest_other['und'][0]['value'];
      	            }else{
      	            	$target_interest = taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name;
      	            }
                      if($i == ($count_target-1)){
                         	print $target_interest;
                      }
                      else{
                          print $target_interest.", "; 
                      }
                    }
                      
                  }?>
              </div>
            </div>  
                 
          
  	        <div class="col-xs-4" style="margin-top:15px; padding:0;">
            <!--Social-->
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_sharing_toolbox"></div>          
            </div>
        
        
            <div class="col-xs-12 viewcontent--body">

              <div class="field-name-field-news-image">
        	
            		<?php if($node->field_picture['und'][0]['uri']!=""):?>
                <?php  $org_image = file_create_url($node->field_picture['und'][0]['uri']); ?>
                <?php $url_imag_style= image_style_url('large',$node->field_picture['und'][0]['uri']); ?>
            		<a href="<?php print $org_image;?>" rel="lightbox" ><img src="<?php print $org_image;  ?>" class="img-responsive"></a>
            		<?php else:?>
            		<a href="/sites/all/themes/changemakers/images/news_default.jpg" rel="lightbox" ><img src="/sites/all/themes/changemakers/images/news_default.jpg" width="480"></a>
            		<?php endif;?>

            		
              </div>
              <div><?php  print render($node->body['und'][0]['value']); ?></div>

            </div> 
        </div>    
        
    </div><!--End of Content-->
    
   
</div>

<div class="col2--sidebar " style="position:relative; ">
    <div class="sidebar--wrap  bottom__lightgray col-xs-12" style=" margin-top:0;">
            <div class="row">

            <h3 class="headline__thaisan headline--sidebar__blue">ข่าวสารอื่น ๆ</h3>
            <div class="sidebar--line"></div>
            <div class=" sidebar--verti--content" >
            <?php echo views_embed_view('news_block', $display_id = 'block'); ?>
            </div>
        </div>
    </div>
</div>

 <?php //print render($content['comments']); ?>    

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6&appId=1044418628957648";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
  window.___gcfg = {
    lang: 'en-US',
    parsetags: 'onload'
  };
  	$.ajax({
	type: 'GET',
	url: 'http://graph.facebook.com/https://www.schoolofchangemakers.com/news/<?php echo $nid; ?>',
	success: function(data) {
		$('#fb_count').text(data.shares);	
	}
	});
	$.ajax({
	type: 'GET',
	dataType: "JSONP",
	url:'http://count.donreach.com/?url=https://www.schoolofchangemakers.com/news/<?php echo $nid; ?>',
	  }).done(function ( data ) {
		$('#g_count').text(data.shares.google);	
	});
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
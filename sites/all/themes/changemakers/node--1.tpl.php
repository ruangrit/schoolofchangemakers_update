
<?php 

//$users_load = entity_load('user'); 1799
    // print "<pre>";
    // print_r("test7");
    // print "</pre>";

// for ($i=1640; $i <= 1680 ; $i++) { 
//     $users_load = user_load($i);


        
//     if($users_load->uid != 0 && !empty($users_load->uid)){
        
//         // if(empty($users_load->field_profile_zipcode)){
//         //     $users_load->field_profile_zipcode['und'][0]['value'] = "n/a";     
//         // }
//         if(empty($users_load->field_profile_firstname) || trim($users_load->field_profile_firstname['und'][0]['value']) == "" ){
//             $users_load->field_profile_firstname['und'][0]['value'] = "n/a";
//         }
//         if(empty($users_load->field_profile_lastname) || trim($users_load->field_profile_lastname['und'][0]['value']) == "" ){
//             $users_load->field_profile_lastname['und'][0]['value'] = "n/a";
//         }
//         if(empty($users_load->field_profile_address) || trim($users_load->field_profile_address['und'][0]['value']) == ""){
//             $users_load->field_profile_address['und'][0]['value'] = "n/a";
//         }

//         if(empty($users_load->field_profile_phone) || trim($users_load->field_profile_phone['und'][0]['value']) == ""){
//             $users_load->field_profile_phone['und'][0]['value'] = "n/a";
//         }

//         if($users_load->field_profile_birthdate['und'][0]['value'] == "0000-00-00"){
//             $users_load->field_profile_birthdate['und'][0]['value'] == "1990-01-01";
//         }

        

//         // print "<pre>";
//         // print_r($users_load->field_profile_zipcode);
//         // print "</pre>";

//         // print "<pre>";
//         // print_r($users_load->field_profile_birthdate);
//         // print "</pre>";


        
//         user_save($users_load);
//     }
    
//     # code...
// }


// $check = changemakers_check_related_knowledge("2573");
//  print "<pre>";
// print_r($check);
// print "</pre>";
// $strMessage = "สวัสดีค่ะ คุณ";

//     $strMessage .= "คุณสามารถตั้งค่ารหัสผ่านใหม่สำหรับเข้าสู่เว็บไซต์<br>";
//     $strMessage .= "<a href='http://www.schoolofchangemakers.com/'>www.schoolofchangemakers.com</a><br>ได้ตามลิงค์ด้านล่างนี้<br><br>";
//     $strMessage .= "ขอบคุณค่ะ<br>";
//     $strMessage .= "ทีมงาน School of Changemakers<br>";
//     $from = "khunakorn.konai@gmail.com";
//     $to = "puripat@diversition.co.th";  
         
//               $strTo = "soc@schoolofchangemakers.com";
//               $strSubject = "Changemakers send mail";
          
//               $strHeader= "From:  ".$from."\r\n".
//                           "Reply-To: ".$strTo."\r\n".
//                           "MIME-Version: 1.0\r\n".
//                           "Content-Type: text/html; charset=UTF-8";  
            
            
//                @mail($strTo,$strSubject,$strMessage,$strHeader);
//                print "<pre>";
//                print_r("tong 1");
//                print "</pre>";
?>
<script type="text/javascript">
function initMap() {
  var myLatLng = {lat: 13.720610, lng: 100.498124};

  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    scrollwheel: false,
    zoom: 15
  });

  // Create a marker and set its position.
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng,
    title: 'Change Makers'
  });
}

</script>
<style type="text/css">


</style>


<h2 class="headline headline__alte">CONTACT</h2>
<?php  
    // $link = mysql_connect('localhost', 'change_db', 'lQ4CyvKQ');
    // if (!$link) {
    //     die('Could not connect: ' . mysql_error());
    // }
    // printf("MySQL server version: %s\n", mysql_get_server_info());

?>
 


<div class="margin__top40 row" >
    <div class="col-xs-8 margin__top20">
        
    <h3 class="headline headline__alte headline--sidebar__yellow">CONTACT FORM</h3>    
        
<div class="margin__top20">
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?> >
		  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
		  <header>
		    <?php print render($title_prefix); ?>
		    <?php if (!$page && !empty($title)): ?>
              
		    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		    <?php endif; ?>
		    <?php print render($title_suffix); ?>
		    <?php if ($display_submitted): ?>
		    <span class="submitted">
		      <?php print $user_picture; ?>
		      <?php print $submitted; ?>
		    </span>
		    <?php endif; ?>
		  </header>
		  <?php endif; ?>
		  <?php
		    // Hide comments, tags, and links now so that we can render them later.
		    hide($content['comments']);
		    hide($content['links']);
		    hide($content['field_tags']);
		    print render($content);
		 	//print '<pre>';
			// print_r($content);
			// print '</pre>';
		  ?>
		  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
		  <footer>
		    <?php print render($content['field_tags']); ?>
		    <?php print render($content['links']); ?>
		  </footer>
		  <?php endif; ?>
		  <?php print render($content['comments']); ?>
		</article>    
    
    
    
    </div>
    
    
    </div>
    
    
    <div class="col-xs-4 margin__top20">
        <h3 class="headline headline__alte headline--sidebar__yellow">CONNECT WITH US</h3> 
        
        
        <div class="contact--social margin__top20 tab__left30">
        
            <a target="_blank" href="https://www.facebook.com/schoolofchangemakers/" id="facebook" class="social-button facebook social--logo"><i class="icon-facebook"></i></a>
            <a href="https://www.facebook.com/schoolofchangemakers/" target="_blank" ><p class="social--idname">schoolofchangemakers</p></a>

            <a  target="_blank" href="https://twitter.com/changemakerTH" id="twitter" class="social-button twitter social--logo"><i class="icon-twitter "></i></a>
            <a href="https://twitter.com/changemakerTH"  target="_blank"><p class="social--idname">@changemakerTH</p></a>
            
            <a target="_blank" href="https://plus.google.com/u/0/+Schoolofchangemakers/posts" id="googleplus" class="social-button gplus social--logo"><i class="icon-gplus"></i></a>
            <a href="https://plus.google.com/u/0/+Schoolofchangemakers/posts"  target="_blank"><p class="social--idname">School of Changemakers</p></a>
            
            <a target="_blank" href="https://www.youtube.com/channel/UCDbS1XCE2s3k7Z7duLhkb1A" id="youtube" class="social-button youtube social--logo"><i class="icon-youtube"></i></a>
            <a href="https://www.youtube.com/channel/UCDbS1XCE2s3k7Z7duLhkb1A"  target="_blank"><p class="social--idname">School of Changemakers</p></a>
            
            <a target="_blank" href="https://www.instagram.com/schoolofchangemakers/" id="instagram" class="social-button ig social--logo"><i class="icon-instagram"></i></a>
            <a href="https://www.instagram.com/schoolofchangemakers/"  target="_blank"><p class="social--idname">@SOCThailand</p></a>


            <a target="_blank" href="mailto:admin@schoolofchangemakers.com" id="email" class="social-button facebook social--logo"><i class="icon-mail"></i></a>
            <a href="mailto:admin@schoolofchangemakers.com"  target="_blank"><p class="social--idname">admin@schoolofchangemakers.com</p></a>

         </div>
		
<!--
	<ul id="social_icon">
		<li><a href="https://www.facebook.com/schoolofchangemakers"><img class="img-responsive" src="/sites/all/themes/changemakers/images/social-facebook.png"></a></li>
		<li><a href="https://www.facebook.com/schoolofchangemakers"><img class="img-responsive" src="/sites/all/themes/changemakers/images/social-twitter.png"></a></li>
		<li><a href="https://www.facebook.com/schoolofchangemakers"><img class="img-responsive" src="/sites/all/themes/changemakers/images/social-googleplus.png"></a></li>
		<li><a href="https://www.facebook.com/schoolofchangemakers"><img class="img-responsive" src="/sites/all/themes/changemakers/images/social-youtube.png"></a></li>
		<li><a href="https://www.facebook.com/schoolofchangemakers"><img class="img-responsive" src="/sites/all/themes/changemakers/images/social-instagram.png"></a></li>
	</ul>
-->
</div>

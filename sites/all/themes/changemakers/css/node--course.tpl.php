<?php 
global $user;
// echo "<pre>";
// print_r($user);
// echo "</pre>";
if(!empty($user->roles['2'])):
$photo_cover = image_style_url("online-course",$node->field_course_picture['und'][0]['uri']); 
 $problem_tax =array();
for ($i=0; $i < count($node->field_course_problems['und']) ; $i++) { 
    if($node->field_course_problems['und'][$i]['taxonomy_term']->name!= "All"):
      $problem_tax_all = 1;
    else:
      if($i<5){
       $problem_tax[] =$node->field_course_problems['und'][$i]['taxonomy_term']->name;
     }
    endif;
} 
 $target_tax = array();
for ($i=0; $i < count($node->field_course_target['und']) ; $i++) {   
     if($node->field_course_target['und'][$i]['taxonomy_term']->name== "All"):
      $target_tax_all = 1;
    else :
       if($i<5){
        $target_tax[] =$node->field_course_target['und'][$i]['taxonomy_term']->name;
      }
    endif;
}
$skill_interest = array();
for ($i=0; $i < count($node->field_course_interest['und']) ; $i++) {   
     if($node->field_course_interest['und'][$i]['taxonomy_term']->name== "All"):
      $skill_interest_all = 1;
     else: 
        if($i<5){
          $skill_interest[] =$node->field_course_interest['und'][$i]['taxonomy_term']->name;
        }
        
      endif;
}
$worksheet = file_create_url($node->field_worksheet['und'][0]['uri']);
$lession_course = changemakers_get_online_lession($node->field_online_lession['und']);
// echo "<pre>";
// print_r($node);
// echo "</pre>";

?>
<div class="col-xs-12 pagebigtab">
	<div class="thumb ">
        
		<img class="image-width img-responsive"  src="<?php echo $photo_cover; ?>">
	</div>
    
    <div class="pagebigtab--detail  col-xs-12">
      
       
      
      
        
    
	<div class="pagebigtab-detail--name row">
    <h2 class="headline__thaisan pagebigtab--name clear col-xs-8"><?php  print $node->title; ?></h2>
    
        <div class="col-xs-4 txt__right pad0"><a href="/online-course"><button class="btn--border">ย้อนกลับสู่รายการคอร์ส</button></a></div>
    </div>   
   
	   <!--Short Detail Box-->
        



        <div class="col-xs-7 pagebigtab--detail--course" style="margin-top:15px; padding-rignt:10px;">
		<div class="row">
            <div class="pagebigtab--detail--box detail--icon--update">
                    <div class="pagebigtab--detail-topic">สำหรับ</div>
                    <div class="pagebigtab--detail-txt tag--linelimit__2"><?php echo $node->field_for_course['und'][0]['taxonomy_term']->name; ?></div>
            </div>
            
            <div class="pagebigtab--detail--box detail--icon--grant">
                    <div class="pagebigtab--detail-topic">ทักษะ</div>
                    <div class="pagebigtab--detail-txt tag--linelimit__2">
                    	<?php if(empty($skill_interest_all)): ?>
						    <a  class="link__blue"><?php print implode(",", $skill_interest)?><?php echo count($skill_interest)>4?"...":""; ?></a>
						<?php else: ?>
						     <a  class="link__blue">All</a>
						<?php endif; ?>
                    </div>
            </div>
          
			

			<div class="pagebigtab--detail--box detail--icon--status">
                    <div class="pagebigtab--detail-topic">ปัญหา</div>
                    <div class="pagebigtab--detail-txt tag--linelimit__2">
                    	<?php if(empty($problem_tax_all)): ?>
						    <a  class="link__blue"><?php print implode(",", $problem_tax)?><?php echo count($problem_tax)>4?"...":""; ?></a>
						<?php else: ?>
						     <a  class="link__blue">All</a>
						<?php endif; ?>
                    </div>
                </div>
                <div class="pagebigtab--detail--box detail--icon--view">
                    <p class="pagebigtab--detail-topic">เป้าหมาย</p>
                    <p class="pagebigtab--detail-txt">
                    	<?php if(empty($target_tax_all)): ?>
						    <a  class="link__blue"><?php print implode(",", $target_tax)?><?php echo count($target_tax)>4?"...":""; ?></a>
						<?php else: ?>
						     <a  class="link__blue">All</a>
						<?php endif; ?>
                    </p>
                </div>
			
        </div>
		</div>
			
        
		
        
        
        <!---->
	
	
    
    
    
        <div class="col-xs-5" style="margin-top:15px; ">
        <div class="row" style="text-align:center;">
            
         <!--Social-->
         <!--
		<div class="col-md-3 padding-header button-float-right">
			<a >
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/facebook_icon.png"></p>
			</a>
		</div>
		<div class="col-md-3 padding-header button-float-right">
			<a >
				<p><img class="image-width-icon" src="/sites/all/themes/changemakers/images/twitter_icon.png"></p>
			</a>
		</div>
		-->

        <!--Social-->
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_sharing_toolbox"></div>
        <!-- 
            <div class="socialshare--box">
            <a target="_blank" href="https://www.facebook.com/AshokaThailand" id="facebook" class=" social-button2  facebook"><span class="icon-facebook"></span></a>
            
            <div class="socialshare--total"><span class="txt__bold">365</span><br/>Share</div>
        </div>
            
        
        <div class="socialshare--box">
            
            <a target="_blank" href="https://plus.google.com/u/0/communities/114940128723511572574" id="googleplus" class=" social-button2 gplus"><span class="icon-gplus"></span></a>
            <div class="socialshare--total">365<br/>Share</div>    
        </div>
         
                
        
        <div class="socialshare--box">
			
			<a href="#twitter" id="twitter" class="social-button2 twitter"><span class=" icon-twitter"></span></a>
            <div class="socialshare--total">25<br/>Tweets</div>    
        </div> -->

            
            
		<!--Sent project-->	
        
        <div class="col-xs-12 padding-header ">
                <?php if(!empty($node->field_worksheet['und'][0]['uri'])): ?>
            <a href="<?php echo $worksheet; ?>" traget="_blank"><button class="btn btn--submit"><i class="icon-file-pdf"></i> Download Worksheet</button></a>
            <?php endif; ?>
		</div>

	
	</div>
        
        
        </div>
        </div>
</div>	


<div class="margin-top-header col-xs-12">
  	<!-- Nav tabs -->
  	<!--<ul class="nav nav-tabs margin-top-header" role="tablist">
    	<li role="presentation" class="active"><a href="#timeline" aria-controls="timeline" role="tab" data-toggle="tab">TIMELINE</a></li>
    	<li role="presentation"><a href="#project" aria-controls="project" role="tab" data-toggle="tab">PROJECTS</a></li>
    	<li role="presentation"><a href="#finalists" aria-controls="finalists" role="tab" data-toggle="tab">FINALISTS</a></li>
    	<li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">ABOUT</a></li>

  	</ul>-->
    
    <ul class="pagebigtab--nav list-inline col-xs-12" role="tablist">
            <li role="presentation" class="active">
                <a href="#introduction" class="pagebigtab--nav--list nav--timeline" aria-controls="introduction" role="tab" data-toggle="tab">
                INTRODUCTION
            </a>
            </li>
            <li role="presentation"><a  href="#learn" aria-controls="project" role="tab" data-toggle="tab" class="pagebigtab--nav--list nav--project">
                LEARN 
                
            </a>
            </li>

    </ul>

  	<!-- Tab panes -->
  	<div class="tab-content col-xs-12 ">
    	<div role="tabpanel" class="tab-pane active" id="introduction">
        
      	<div class="row"> 
            
      		<div class="col2--sidebar bg__white ">
            <div class="course--name"><h4 class="headline headline__thaisan"><i class=" icon-book-open txt__20"></i> <a href="#" id="cmk"> In this Course you will</a></h4></div>
                <div class=" padding__box">
      			<?php echo $node->field_course_will['und'][0]['value']; ?>
                
                </div></div>
            
      		<div class="col2--viewcontent pagebigtab--bg">
      			<?php echo $node->body['und'][0]['value']; ?>
      		</div>
      	</div>
    	</div>    
            
            
            
    	<!--end of Introduction-->
    	<div role="tabpanel" class="tab-pane project--page" id="learn">
           <div class="col-xs-12 pad0">
               <div class="col-xs-3 course--select">
                <div class="row">
                  <!--<ul class="nav nav-tabs tabs-left course--lesson">-->
                    <ul class="course--lesson">
                       <div class="course--name"><h4 class="headline headline__thaisan"> <i class=" icon-book-open txt__20"></i> <a href="#" id="coach" ><?php  print $node->title; ?></a></h4></div>
                    
                    <?php 
                    $i=1;
                    foreach ($lession_course as $key => $value) {
                        if($value['count']==0){
                            echo "<li class='lesson--row active'><a href='#$value[title]' data-toggle='tab'>$i. $value[title]</a></li>";
                        }else{
                             echo "<li class='lesson--row'><a href='#$value[title]' data-toggle='tab'>$i. $value[title]</a></li>";
                        }
                        $i++;
                    }
                    ?>
                    
                  </ul>
                   </div>
                </div>
                <div class="col2--viewcontent pagebigtab--bg">
                    <!-- Tab panes -->
                    <div class="tab-content">
                         <?php 
                    foreach ($lession_course as $key => $value) {
                        if($value['count']==0){
                             echo "<div class='tab-pane active' id='$value[title]'>$value[body]</div>";
                        }else{
                             echo "<div class='tab-pane' id='$value[title]'>$value[body]</div>";
                        }
                    }
                    ?>
                    </div>
                </div>
           </div>
        </div><!--end of Learn-->
     

    
  	</div>

   
</div><!--End of margin top header-->
<?php else:
echo "You are not authorized to access this page. ";
endif;
?>
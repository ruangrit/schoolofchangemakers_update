<style type="text/css">

</style>
<?php 

global $user;
$date_event = changemakers_get_date_start_and_end($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
$check_user_join_event = changemakers_check_user_join_event($user->uid, $nid);
$get_user_join_event = changemakers_get_user_join_event($nid);


// print "<pre>";
// print_r($node);
// print "</pre>";

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
$form_build_id = 'form-' . md5(uniqid(mt_rand(), TRUE));
$form_token =  drupal_get_token('webform_client_form_3');
$user_fields = user_load($node->uid);



// print '<pre>';
// print_r($check_user_join_event);
// print '</pre>';


// print '<pre>';
// print_r($node->field_news_event_date['und'][0]['value2']);
// print '</pre>';

?>

<?php //var_dump(user_load($user->uid)); ?>

<div class="col2--viewcontent">
<div role="tabpanel" id="detail_event" class="viewcontent--box col-xs-12 bottom__blue">
    <h1 class="headline__thaisan viewcontent--title">
        
    <?php print $node->title; ?>
    </h1>
    
    <div class="sidebar--line "></div>

    <div class="viewcontent--detail row">
	<div class="col-xs-6 ">
		<i class="icon-clock"></i> <?php print $date_event[0]; ?> - <?php print $date_event[1]; ?><br />
        <i class="icon-location"></i> <a href="#"><?php print $node->field_event_facilities['und'][0]['value'];?></a><br />
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
            <div class="fb-share-button" data-href="http://changemakers.devfunction.com/event/<?php echo $nid; ?>" data-layout="button_count" data-mobile-iframe="true"></div>
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
    <?php  
        $comment = $content['comments'];
        unset($content['comments']);
        print render($content);
        print render($comment);
         //print "tong";

        // $node_view = node_view($node);
        // $node_view['comments'] = comment_node_page_additions($node_comment);
        // print render($content['comments']);

    ?>
    <?php //print render($content['comments']); ?>    
    </p>
    </div>
    
</div>
<div role="tabpanel" class="tab-pane " id="user_join_event">
    <div class="table--content col-xs-12">
        <div class="row">
            <div class="col-xs-12 fund--table--total">
                <?php if($user->uid && !isset($user->roles[5]) && !isset($user->roles[3])){ ?>    
                <button id="back_show_detail" class="btn btn--submit float__right col-xs-3" style="margin-top:0;" data-toggle="modal" data-target="#myProjectFund">Back</button>    
                <?php } ?>
            </div>
        </div>
    </div>
        
    <div class="col-xs-12 fund--table--head">
        <div class="col-xs-12">
        name
        </div>    
        <?php foreach ($get_user_join_event as $key => $value) { ?>
        <div class="table--content--row col-xs-12">
            <div class="col-xs-12">
            <?php print $value['name']?>
            </div>
        </div>
        <?php } ?> 
    </div>                            
               
</div>





<!-- Comment -->
<!-- <div class="pagebigtab--update--post  col-xs-12" style="margin-top:20px;">
        
    <div class="col-xs-1 pagebigtab--update--userimg">
        <a href="#"><div class="cir--thumb__50"  style="background:#333333;"></div></a>
    </div>
    <div class="col-xs-11 pagebigtab--update--side">
        
        <a href="#" class="detail__mid pagebigtab--update--username link__blue">David_a esfdsdf</a><br/>
        <textarea class="pagebigtab--update--input"></textarea>
                
        <div class="pagebigtab--group--btn">
            <button class="btn btn--default"><i class=" icon-folder-open"></i> Browse</button>
            <span>.jpg, .gif, .png ไม่เกิน 200 kb</span>
            <button  class="btn btn--submit" style="float:right;">Submit</button>
        </div>
    </div>
</div>
    
      
    <div class="col-xs-12" style="margin-top:15px;  " >
        <div class="row">
        
            <div class="col-xs-4">
                <div class="pagebigtab--update--profile--box col-xs-12 row">
                <a href="#"><div class="cir--thumb__50" style="background:#333333;"></div></a>
                
                <div class="pagebigtab--update--profile--detail ">
                    <a href="#" class="detail__mid link__blue">David_a <span class="icon-profile-verify member--verify"></span></a><br/>
                    <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>
                    <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>
                    <div class="detail__small"><span class=" icon-clock"></span> 4h.</div>
                </div>
                </div>
            </div>
            <div class="col-xs-8 pagebigtab--update--content">
            <div class="pagebigtab--update--post--arrow"></div>
                ละอ่อนดีมานด์บาร์บีคิว ธุหร่ำโบว์ แคร์เวเฟอร์รีทัชป๊อป สเปก ความหมายเฮอร์ริเคนครัวซอง ไฟลท์แช่แข็ง โนติส หลวงพี่มาร์ชทอมคอนเฟิร์ม เย้วมาร์คแซ็กโซโฟน ทัวริสต์ บอมบ์งั้นรากหญ้า วอฟเฟิลทอมสะกอมเทป ไลท์ จูนเดบิตแรงดูดวันเวย์ กฤษณ์บลูเบอร์รี บ๊วยฟรุตแฟล็ต
            </div>
        </div>
    </div>
       
    <div  class="col-xs-12" style="margin-top:15px;" >
        <div class="row">
            <div class="col-xs-4">
                <div class="pagebigtab--update--profile--box col-xs-12 row">
                <a href="#"><div class="cir--thumb__50" style="background:#333333;"></div></a>
                
                <div class="pagebigtab--update--profile--detail ">
                    <a href="#" class="detail__mid link__blue">David_a <span class="icon-profile-verify member--verify"></span></a><br/>
                    <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>
                    <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div>
                    <div class="detail__small"><span class=" icon-clock"></span> 4h.</div>
                </div>
                </div>
            </div>
            <div class="col-xs-8 pagebigtab--update--content">
            <div class="pagebigtab--update--post--arrow"></div>
                
               วานิลลามาร์เก็ตอีสเตอร์ยังไงมายองเนส สเกตช์ เฟอร์นิเจอร์แพ็ค แซ็กโซโฟนสะบึมส์นางแบบแบนเนอร์ วิลเลจสงบสุข กษัตริยาธิราชรันเวย์ แฟรนไชส์แบดเทคโนเบญจมบพิตรฟลุต สโตร์ทัวร์นาเมนท์ แซลมอนว้าวโฮลวีตแฟ้บสามช่า เยอบีร่ารุสโซเทเลกราฟเทคโนแครต วาริชศาสตร์แจ๊กพอตโอยัวะเป่ายิ้งฉุบเจได หม่านโถวเจไดบัตเตอร์ พุทธศตวรรษงี้แกงค์ การันตีทีวีอุปสงค์โอเวอร์ เดบิตคอมเมนต์วาริชศาสตร์มาร์ค สโลว์วันเวย์หลวงปู่
            </div>
        </div>
    </div>  -->      
       


</div>




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      	<!-- Modal content-->
      	<div class="modal-content">
        	<div class="modal-header">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h4 class="modal-title">แบบสอบถามการเข้าร่วม</h4>
	        </div>
	        <div class="modal-body modal-question">
	        	<form class="webform-client-form webform-client-form-3" enctype="multipart/form-data" action="/changemakers/join-event" method="post" id="webform-client-form-3" accept-charset="UTF-8">
					<div>

					<!-- THEME DEBUG -->
					<!-- CALL: theme('webform_form') -->
					<!-- BEGIN OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->
					<div class="form-item webform-component webform-component-number webform-component--uid form-group">

					 <input class="form-control form-text form-number"   type="hidden" id="edit-submitted-uid" name="submitted[uid]" value="<?php print $user->uid; ?>" step="any">
					</div>
					<div class="form-item webform-component webform-component-number webform-component--nid form-group">

					 <input class="form-control form-text form-number" value="<?php echo $nid; ?>" type="hidden" id="edit-submitted-nid" name="submitted[nid]" step="any">
					</div>
					<!-- <div class="form-item webform-component webform-component-number webform-component--status form-group">

					 <input class="form-control form-text form-number" type="hidden" id="edit-submitted-status" name="submitted[status]" value="0" step="any">
					</div> -->
					<input type="hidden" name="details[sid]">
					<input type="hidden" name="details[page_num]" value="1">
					<input type="hidden" name="details[page_count]" value="1">
					<input type="hidden" name="details[finished]" value="0">
					<input type="hidden" name="form_build_id" value="<?php echo $form_build_id; ?>">
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
					<input type="hidden" name="form_id" value="webform_client_form_3">
		          	<p>
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_1['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_1['und'][0]['value']; ?>
						  	</label>
                            
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-1" name="submitted[answer_1]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
                        </div>
                    </p>
		          	<p>
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_2['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_2['und'][0]['value']; ?>
						  	</label>
						  	<textarea required class="form-control form-textarea" id="edit-submitted-answer-2" name="submitted[answer_2]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_2" id="question_2"></textarea> -->
						</div>
		          	</p>
		          	<p>
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_3['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_3['und'][0]['value']; ?>
						  	</label>
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-3" name="submitted[answer_3]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_3" id="question_3"></textarea> -->
						</div>
		          	</p>
		          	<p>
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_4['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_4['und'][0]['value'];  ?>
						  	</label>
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-4" name="submitted[answer_4]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_4" id="question_4"></textarea> -->
						</div>
		          	</p>
		          	<p>
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_5['und'][0]['value'])): ?>
						  	<label for="comment">
						  		 <?php print $node->field_question_5['und'][0]['value']; ?>
						  	</label>
						  	<textarea required class="form-control form-textarea" id="edit-submitted-answer-5" name="submitted[answer_5]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_5" id="question_5"></textarea> -->
						</div>
		          	</p>
		          	<div class="form-actions">
						<button class="col-xs-12 webform-submit button-primary btn btn-primary form-submit" type="submit" name="op" value="Submit">เข้าร่วมกิจกรรม</button>
					</div>
					<!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

					</div>
				</form>
  
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    </div>
      
    </div>
</div>



<div class="col2--sidebar " style="position:relative;">

    <div class="sidebar--wrap  bottom__lightgray col-xs-12" style="margin-top:0;">
        <div class="row side--event--detail">
        
            
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
            <i class=" icon-cir-author"></i>
        </div>
		<div class="label--col">
            ผู้สร้างกิจกรรม
        </div>
		<div class="detail--col">
            <a href="#"><?php echo $user_fields->field_profile_firstname['und'][0]['value']." ".$user_fields->field_profile_lastname['und'][0]['value'];?></a>
        </div>
        </div>
            
            
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
           <i class="icon-cir-project"></i>
        </div>
		<div class="label--col">
            โปรเจค
        </div>
		<div class="detail--col">
            -
        </div>
        </div>
            
            
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
            <i class="icon-cir-pagebigtab"></i>
        </div>
		<div class="label--col">
            แคมเปญ
        </div>
		<div class="detail--col">
           -
        </div>
        </div>
            
            
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
            <i class="icon-cir-ativity-status"></i>
        </div>
		<div class="label--col">
            สถานะกิจกรรม
        </div>
		<div class="detail--col">
            <a href="#">เปิดให้ลงชื่อ</a>
        </div>
        </div>
            
        
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
            <i class="icon-cir-join-status"></i>
        </div>
		<div class="label--col">
            สถานะการเข้าร่วม
        </div>
		<div class="detail--col">
            <?php if($check_user_join_event == 0){
                echo "ยังไม่เข้าร่วมกิจกรรม";
            }else{
                echo "เข้าร่วมกิจกรรม";
            } ?>
        </div>
        </div>
            

		<div class="col-xs-12" style="margin-top:10px;">
			<?php
			if($user->uid && !isset($user->roles[5]) && !isset($user->roles[3])): ?>
				<?php if($check_user_join_event == 0):?>
					<!-- Trigger the modal with a button -->
  					<button type="submit" class="btn btn--submit">เข้าร่วมกิจกรรม</button>
				<?php endif; ?>
			<?php elseif (isset($user->roles[5]) || isset($user->roles[3])):?>
				    
                <?php if(isset($user->roles[3]) || $user->uid == $node->uid ){?>
                <div class="wrap--btn col-xs-12 ">
                    <a href="/node/<?php echo arg(1);?>/edit" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" class="btn btn--submit">แก้ไขกิจกรรม</button>
					</a>					
				</div>
				
				<div class="wrap--btn col-xs-12 ">
						<a href="#" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" class="btn btn--default ">ปิดกิจกรรม</button>
						</a>					
				</div>
            
				<div class="wrap--btn col-xs-12 ">
						<a href="#" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" class="btn btn--cancel">ยกเลิกกิจกรรม</button>
						</a>					
					</div>
				
				
				 <div class="wrap--btn col-xs-12 ">
						<a href="#"  aria-controls="fund" role="tab" data-toggle="tab" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
						<button id="show_event" type="submit" class="btn btn--border ">ดูผู้เข้าร่วมกิจกรรม</button>
						</a>					
				</div>
                <?php } ?> 
				
			<?php else: ?>
            
            
                <div class="wrap--btn col-xs-12 " >
                    <a href="http://changemakers.devfunction.com/modal_forms/nojs/login" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
                    <button type="submit" class="btn btn--submit">ล็อกอินเพื่อเข้าร่วมอีเวนท์นี้</button>
                    </a>
                </div>
				
			<?php endif;?>
		</div>
        </div>

    </div>
    
    
	    <div class="sidebar--wrap  bottom__lightgray col-xs-12" >
            <div class="row">


                
          <h3 class="headline__thaisan headline--sidebar__blue"><a href="#">กิจกรรมอื่น ๆ</a></h3>
		  <div class="sidebar--line"></div>
          <div class=" sidebar--verti--content" >
        
		
		<?php echo views_embed_view('event_block', $display_id = 'block'); ?>
	
    </div>
    
            
        </div>
    </div>


</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6&appId=1044418628957648";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
(function ($) {  

  Drupal.behaviors.themename = {

    attach: function (context, settings) {            

     // All our js code here
    $('#user_join_event').hide();
    $("#show_event").click(function() {
      $('#user_join_event').show();
      $('#detail_event').hide();
    });
    $("#back_show_detail").click(function() {
      $('#user_join_event').hide();
      $('#detail_event').show();
    });

   }

 };})(jQuery);
</script>
	

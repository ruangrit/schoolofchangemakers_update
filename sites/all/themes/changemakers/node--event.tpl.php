
<style type="text/css">
     #edit-comment-body-und-0-format--2{
        display: none;
     }
     .comment_forbidden .first .last{
        display: none !important;
     }

    #cke_1_top{
        display: none;
    }
    #cke_1_bottom{
        display: none;
    }
       
</style>
<?php 

global $user;


$date_event = changemakers_get_date_start_and_end($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
$check_user_join_event = changemakers_check_user_join_event($user->uid, $nid);
$get_user_join_event = changemakers_get_user_join_event($nid);
$get_event_status = changemakers_get_event_status($nid);

// print "<pre>";
// print_r($get_user_join_event);
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

$path = drupal_get_path_alias(NULL, NULL);



// print '<pre>';
// print_r($check_user_join_event);
// print '</pre>';


// print '<pre>';
// print_r();
// print '</pre>';

?>

<?php //var_dump(user_load($user->uid)); ?>

<div class="col2--viewcontent">
<div role="tabpanel" id="detail_event" >
<div class="viewcontent--box col-xs-12 bottom__blue">
    <h1 class="headline__thaisan viewcontent--title">
        
    <?php print $node->title; ?>
    </h1>
    
    <div class="sidebar--line "></div>

    <div class="viewcontent--detail row">
	<div class="col-xs-8 detail__medium block--detail--event">
        <div class="taglinelimit__1">
		<i class="icon-clock"></i>
				<?php /*print $date_event[0]; ?> - <?php print $date_event[1]; */
					echo _changemakers_thai_daterange_format($node->field_news_event_date['und'][0]['value'], $node->field_news_event_date['und'][0]['value2']);
            ?>
        </div>
        
        <?php if(!empty($node->field_event_facilities['und'][0]['value'])){ ?>
        <div class="taglinelimit__1">
            <i class="icon-location"></i> <?php print $node->field_event_facilities['und'][0]['value']; ?>
        </div>
        <?php }  ?> 
        
        <?php if(!empty($node->field_problem_interest)){ ?>
        <div class="taglinelimit__1"><i class="icon-target"></i> <?php

            for ($i=0; $i < count($node->field_problem_interest['und']) ; $i++) { 
                if(taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name != "All" && taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name != "อื่น ๆ (ระบุ)"){
              
                    if($i == count($node->field_problem_interest['und'])-1){
                       print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name;
                    }
                    else{
                        print taxonomy_term_load($node->field_problem_interest['und'][$i]['tid'])->name.", "; 
                    }
                }
                
            }
            

         ?>
		<!--<p>
			<?php // print render($content); ?>
		</p>-->
        </div>
        <?php } ?>
        <?php if(!empty($node->field_target_interest)):?>
        <div class="taglinelimit__1"><i class="icon-tag"></i> <?php
            for ($i=0; $i < count($node->field_target_interest['und']) ; $i++) { 
                if(taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name != "All" && taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name != "อื่น ๆ (ระบุ)"){
              
                    if($i == count($node->field_target_interest['und'])-1){
                       print taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name;
                    }
                    else{
                        print taxonomy_term_load($node->field_target_interest['und'][$i]['tid'])->name.", "; 
                    }
                }
                
            }
            

            ?>
        </div>
        <?php endif;?>
        <br/>
	</div>
    <div class="col-xs-4">
        <!--Social-->
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5640218cf1d9fce1"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_sharing_toolbox">
            <meta property="og:image" content="/sites/default/files/79389_full.jpg"/>
        </div>  
    </div>
    </div>
    <div class="col-xs-12 viewcontent--body">
	<p> 
        <div class="field-name-field-event-image">   
            <?php
                $comment = $content['comments'];
                // echo "<pre>";
                // print_r($content);
                //$content['links']['comment']['#link']['comment-add']['title']= '';
                
                unset($content['comments']);
                if(!empty($node->field_picture['und'][0]['uri'])){         
                 $image = image_style_url("large", $node->field_picture['und'][0]['uri']); 
                 $org_image = file_create_url($node->field_picture['und'][0]['uri']);
                ?> 
                    <a href="<?php print $org_image;?>" rel="lightbox" ><img src="<?php print $org_image; ?>"></a>
                <?php 
                      
                }else{ ?>
                    <a href="/sites/all/themes/changemakers/images/news_default.jpg" rel="lightbox" >
                        <img src="/sites/all/themes/changemakers/images/event_default.jpg">
                    </a>
               <?php }

                

            ?>
            <?php //print render($content['comments']); ?>   
        </div> 
        <div>
            <?php print $node->body['und'][0]['value']; ?>
        </div>
    </p>
    </div>
    
</div>
    
<div class="col-xs-12 margin__top20">
    <div class="row">
        <h1 class=" headline--sidebar__blue">UPDATE</h1>
    <?php
   
	    print render($comment);
	
    ?>
    </div>
</div>    
</div>
 
<?php if(isset($user->roles[3])){?>
<div role="tabpanel" class="tab-pane " id="user_join_event">
    
    <div class="table--content col-xs-12">
        
            
            <h1 class="headline__thaisan viewcontent--title"><?php print $node->title; ?></h1>
            <div class="sidebar--line "></div>
            
            <div class="col-xs-12">
                <br>
                <div class="col-xs-12 block--total--joinevent">
                    <p>ดูรายชื่อผู้ลงชื่อเข้าร่วมอีเว้นท์</p>
                    
                    <h3 class="headline__thaisan txt__bold margin__top5 "><?php print $node->title; ?></h3>
                    
                    <ul class="list-inline event--join--total">
                        <li>จำนวนผู้เข้าร่วมแรก <span class="txt__bold">--</span> คน</li>
                        <li>ผู้สมัครที่ได้รับการคัดเลือก <span class="txt__bold"><?php echo  changemakers_count_join_event($node->nid);?></span> คน</li>
                        <li>เหลือที่นั่งจริง <span class="txt__bold">--</span> ที่</li>
                        <li>เหลือที่นั่งสำรอง <span class="txt__bold">--</span> ที่</li>
                    </ul>
                </div>

    	   </div>           
            
            
            <div class="col-xs-12" style="margin:10px 0 20px 0;">
                <?php if($user->uid  || isset($user->roles[3]) || isset($user->roles[8]) ){ ?>    
                <button id="back_show_detail" class="btn btn--submit float__right col-xs-3" style="margin-top:0;" data-toggle="modal" data-target="#myProjectFund"><i class="glyphicon glyphicon-chevron-left"></i> Back</button>    
                <?php } ?>
            </div>
        
    </div>
    
    <div class="row">
    <div class="col-xs-12  margin__top20">

    <div class="col-xs-12 joinevent--filter">
        <div class="col-xs-4">
       <select class="form-control form-select">
           <option>รายชื่อทั้งหมด</option>
        </select>
    </div>
        
        
        
    <div class="col-xs-5 col-xs-offset-3 txt__right margin__top10">
    <a hrev=""><i class="icon-print"></i></a> | 
    <?php  
        //header('Content-Type: application/octet-stream');
        $filName = "user-join-event.csv";

         ?>
    <a href="/changemakers/download-event-file?file=<?php print utf8_encode($filName); ?>&nid=<?php print $nid; ?> " ><i class="icon-export-outline"></i></a>
    <?php
    // $file = $_GET['file'];
    // header('content-type: application/octet-stream');
    // header('content-Disposition: attachment; filename='.$file);
    // header('Pragma: no-cache');
    // header('Expires: 0');
    // readfile($file);
    ?>

    </div>
    </div>
        
    <div style="width:100%;">
        <?php $count  = 1; ?>
    
        <?php foreach ($get_user_join_event as $key => $value) { ?>
        <?php if($count % 2 == 0){ ?>
        <div class="joinevent--wrap  ">
        <?php }else{ ?>
        <div class="joinevent--wrap2 ">
        <?php } ?>
            
            
            
        <div class=" col-xs-12  joinevent " >

        
            
            <div class="joinevent--top--padding row">
                <div class="col-xs-6 "><?php print $count<=9?'0'.$count:$count; $count++; ?></div>
                
            <?php /* if($value['status']==0){?>
            	<div class="col-xs-6 float__right txt__red txt__right">ไม่ได้เข้าร่วมกิจกรรม <i class="icon-flow-cross"></i></div>             
            <?php }else{*/?>  
            	<div class="col-xs-6 float__right txt__blue txt__right">เข้าร่วมกิจกรรม <i class="icon-flow-cross"></i></div>  
           	
           	<?php // } ?>
            </div>
            
        <div class="sidebar--line "></div>    
            <div class="joinevent--padding row">
            <div class="col-xs-3">
            <div class="display--wrap"><img width="90" src="<?php print $value['picture']; ?>"></div>
            </div>
            
            <div class="col-xs-9 pad__left0 ">
                <span class="detail--linelimit__2">
            <?php //print $value['name'] ?><br>
                <a href="/user/<?php print $value['uid']; ?>"><?php print $value['username']; ?></a>
                </span>
            </div>

            <div class="col-xs-1 joineven-tool">
            <?php /* if($value['status']==""){?>
            <div class="join-tool-<?php print $value['sid'];?>">
	            <button class="join-ok" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-ok"></span></button>
	            <button class="join-remove" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
             <div class="join-repeat-<?php print $value['sid'];?>" style="display:none;">
            	<button class="repeat" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-repeat"></span></button>
            </div>
            <?php }else{?>
           	<div class="join-tool-<?php print $value['sid'];?>" style="display:none;">
	            <button class="join-ok" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-ok"></span></button>
	            <button class="join-remove" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-remove"></span></button>
            </div>
            <div class="join-repeat-<?php print $value['sid'];?>">
            	<button class="repeat" data-sid="<?php print $value['sid'];?>"><span class="glyphicon glyphicon-repeat"></span></button>
            </div>
            <?php }*/ ?>
           <!--  <button class="btn btn--submit"><i class="icon-ok"></i></button>
            <button class="btn btn--delete"><i class="icon-cancel"></i></button> -->
                
            <!-- RENEW
            <button class="btn btn--submit"><i class="icon-arrows-cw"></i></button>
            -->
            </div>  
                </div>
            </div>
        </div>
        
        
        <?php } ?> 
            
        </div>
    </div>                            
    </div>           
</div>


<?php }?>


<!-- Comment -->
<!-- <div class="pagebigtab--update--post  col-xs-12" style="margin-top:20px;">
        
    <div class="col-xs-1 pagebigtab--update--userimg">
        <a ><div class="cir--thumb__50"  style="background:#333333;"></div></a>
    </div>
    <div class="col-xs-11 pagebigtab--update--side">
        
        <a  class="detail__mid pagebigtab--update--username link__blue">David_a esfdsdf</a><br/>
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
                <a ><div class="cir--thumb__50" style="background:#333333;"></div></a>
                
                <div class="pagebigtab--update--profile--detail ">
                    <a  class="detail__mid link__blue">David_a <span class="icon-profile-verify member--verify"></span></a><br/>
                    <div class="detail__small"><span class=" icon-tag"></span> <a >tag</a></div>
                    <div class="detail__small"><span class=" icon-target"></span> <a >target</a></div>
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
                <a ><div class="cir--thumb__50" style="background:#333333;"></div></a>
                
                <div class="pagebigtab--update--profile--detail ">
                    <a  class="detail__mid link__blue">David_a <span class="icon-profile-verify member--verify"></span></a><br/>
                    <div class="detail__small"><span class=" icon-tag"></span> <a >tag</a></div>
                    <div class="detail__small"><span class=" icon-target"></span> <a >target</a></div>
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
            <form  class="webform-client-form webform-client-form-3" enctype="multipart/form-data" action="/changemakers/join-event" method="post" id="webform-client-form-3" accept-charset="UTF-8">
        	<div class="modal-header">
	          	<button type="button" class="close" data-dismiss="modal">&times;</button>
	          	<h2 class="headline__thaisan headline--alte">แบบสอบถามการเข้าร่วม</h2>
	        </div>
	        <div class="modal-body modal-question scrollbar_style1">
	        
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
                    <input type="hidden" name="path" value="<?php  print $path; ?>">
					<input type="hidden" name="details[sid]">
					<input type="hidden" name="details[page_num]" value="1">
					<input type="hidden" name="details[page_count]" value="1">
					<input type="hidden" name="details[finished]" value="0">
					<input type="hidden" name="form_build_id" value="<?php echo $form_build_id; ?>">
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
					<input type="hidden" name="form_id" value="webform_client_form_3">
		          	
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_1['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_1['und'][0]['value']; ?>
						  	</label>
                            
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-1" name="submitted[answer_1]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
                        </div>
                   
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_2['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_2['und'][0]['value']; ?>
						  	</label>
						  	<textarea required class="form-control form-textarea" id="edit-submitted-answer-2" name="submitted[answer_2]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_2" id="question_2"></textarea> -->
						</div>
		          	
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_3['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_3['und'][0]['value']; ?>
						  	</label>
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-3" name="submitted[answer_3]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_3" id="question_3"></textarea> -->
						</div>
		          	
                        <div class="form-group">
			          		<?php if(isset($node->field_question_4['und'][0]['value'])): ?>
						  	<label for="comment"> 
						  		<?php print $node->field_question_4['und'][0]['value'];  ?>
						  	</label>
						  	<textarea required  class="form-control form-textarea" id="edit-submitted-answer-4" name="submitted[answer_4]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_4" id="question_4"></textarea> -->
						</div>
		          	
			          	<div class="form-group">
			          		<?php if(isset($node->field_question_5['und'][0]['value'])): ?>
						  	<label for="comment">
						  		 <?php print $node->field_question_5['und'][0]['value']; ?>
						  	</label>
						  	<textarea required class="form-control form-textarea" id="edit-submitted-answer-5" name="submitted[answer_5]" cols="60" rows="5"></textarea>
						  	<?php endif; ?>
						  	<!-- <textarea class="form-control" rows="5" name="question_5" id="question_5"></textarea> -->
						</div>
		          	
		          
					<!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

					</div>
				
  
	        </div>
	        <div class="modal-footer txt__center">
                <!--<div id="hide_button" class="form-actions">   </div>-->
                <button class="webform-submit button-primary btn  btn--submit" type="submit" id="event_submit" name="op" value="Submit" style="margin-left:-15px; margin-top:0px;">เข้าร่วมกิจกรรม</button>
               
	        </div>
            </form>
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
         
            <?php if($user->uid != 0 ){?>
            <a href="/user/<?php echo $user_fields->uid!=0?$user_fields->uid:1;?>" ><?php echo changemakers_get_contact($user_fields->uid); ?></a>
            <?php }else{?>
            <a>    <?php echo changemakers_get_contact($user_fields->uid);?></a>
            <?php }?>
        </div>
        </div>
            
            
        <div class="side--event--detail--row col-xs-12">
        <div class="icon--col">
           <i class="icon-cir-project"></i>
        </div>
		<div class="label--col">
            โปรเจกต์
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
		<div class="detail--col ">
           <?php print $get_event_status; ?>
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
                echo "<span class='txt__green'>เข้าร่วมกิจกรรม</span>";
            } ?>
        </div>
        </div>
            
		<div class="col-xs-12" style="margin-top:10px; text-align:center;">
		
			<?php
            $check_question = changemakers_check_questions($node);

            // print "<pre>";
            // print_r($check_question);
            // print "</pre>";
			if($user->uid != 0 && !isset($user->roles[6])){ ?>
				<?php if($check_user_join_event == 0 && $node->field_event_status['und'][0]['value']==1 && $check_question > 0){ ?>
					<!-- Trigger the modal with a button -->
                    <div class="wrap--btn col-xs-12 ">
          				<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn--submit col-xs-8 col-xs-offset-2 ">เข้าร่วมกิจกรรม</button>
                    </div>
				<?php  }else if($check_user_join_event == 0 && $node->field_event_status['und'][0]['value']==1){ ?>
                    <div class="wrap--btn col-xs-12 ">
                        <form  class="webform-client-form webform-client-form-3" enctype="multipart/form-data" action="/changemakers/join-event" method="post" id="webform-client-form-3" accept-charset="UTF-8">

                            <div class="modal-body modal-question scrollbar_style1">
                        
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
                                <input type="hidden" name="path" value="<?php  print $path; ?>">
                                <input type="hidden" name="details[sid]">
                                <input type="hidden" name="details[page_num]" value="1">
                                <input type="hidden" name="details[page_count]" value="1">
                                <input type="hidden" name="details[finished]" value="0">
                                <input type="hidden" name="form_build_id" value="<?php echo $form_build_id; ?>">
                                <input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
                                <input type="hidden" name="form_id" value="webform_client_form_3">
                              
                                <!-- END OUTPUT from 'sites/all/modules/webform/templates/webform-form.tpl.php' -->

                                </div>
                            
              
                            </div>
                            <div class="modal-footer txt__center">
                                <!--<div id="hide_button" class="form-actions">   </div>-->
                                <button class="webform-submit button-primary btn  btn--submit" type="submit" id="event_submit" name="op" value="Submit" style="margin-left:-15px; margin-top:0px;">เข้าร่วมกิจกรรม</button>
                               
                            </div>
                        </form>
                    </div>
                <?php } ?>
			<?php }
            if (isset($user->roles[3]) || $user->uid == $node->uid || isset($user->roles[8]) || isset($user->roles[5]) ){ ?>
				    
                <?php if($user->uid!=0 && (isset($user->roles[3]) || $user->uid == $node->uid )){?>
                <div class="wrap--btn col-xs-12 ">
                    <a href="/node/<?php echo arg(1);?>/edit" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" class="btn btn--submit col-xs-8 col-xs-offset-2 ">แก้ไขกิจกรรม</button>
					</a>					
				</div>
				
				<div class="wrap--btn col-xs-12 ">
                    <form action="/changemakers/close_event" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="nid" value="<?php  print $nid; ?>">
                        <input type="hidden" name="path" value="<?php  print $path; ?>">
						<div class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" name="submit" value="Submit" class="btn btn--default col-xs-8 col-xs-offset-2 ">ปิดกิจกรรม</button>
						</div>		
                    </form>			
				</div>
            
				<div class="wrap--btn col-xs-12 ">
                    <form action="/changemakers/cancelled_event" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        <input type="hidden" name="nid" value="<?php  print $nid; ?>">
                        <input type="hidden" name="path" value="<?php  print $path; ?>">
						<div class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
							<button type="submit" class="btn btn--cancel col-xs-8 col-xs-offset-2 ">ยกเลิกกิจกรรม</button>
						</div>
                    </form>					
				</div>
				<?php } ?> 
				<?php 
                //print_r($user->roles);

                if( isset($user->roles[3])){ ?>
				 <div class="wrap--btn col-xs-12 "  style="margin-top:10px; text-align:center;">
						<a   aria-controls="fund" role="tab" data-toggle="tab" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
						<button id="show_event" type="submit" class="btn btn--border col-xs-8 col-xs-offset-2 ">ดูผู้เข้าร่วมกิจกรรม</button>
						</a>					
				</div>
                <?php }

            } ?> 
				
			<?php if($user->uid == 0){ ?>
            

            
                <div class="wrap--btn col-xs-12 " >
                    <a href="" data-toggle="modal" data-target="#myLogin" class="init-modal-forms-login-processed ctools-use-modal ctools-modal-modal-popup-small ctools-use-modal-processed">
                    <button type="button" class="btn btn--submit col-xs-10 col-xs-offset-1 ">ล็อกอินเพื่อเข้าร่วมอีเวนท์นี้</button>
                    </a>
                </div>
				
			<?php }?>
		</div>
        </div>

    </div>
    
    
	    <div class="sidebar--wrap  bottom__lightgray col-xs-12 sidewrap__bigimg" >
            <div class="row">


                
          <h3 class="headline__thaisan headline--sidebar__blue">กิจกรรมอื่น ๆ</h3>
		  <div class="sidebar--line"></div>
          <div class=" sidebar--verti--content" >
        
		
		<?php echo views_embed_view('event_block', $display_id = 'block'); ?>
	
    </div>
    
            
        </div>
    </div>


</div>
<div id="fb-root"></div>
<?php /*
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6&appId=1044418628957648";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
*/?>
<script type="text/javascript">
jQuery(function($){
    function userAnswerJoinEvent(){
        //$('#event_submit').hide();
        $('#hide_button').hide();
        return false;
    }

    $( "form" ).submit(function( event ) {
      if ( $( "#edit-submitted-answer-1" ).val() != "" && $( "#edit-submitted-answer-2" ).val() != "" && $( "#edit-submitted-answer-3" ).val() != "" && $( "#edit-submitted-answer-4" ).val() != "" && $( "#edit-submitted-answer-5" ).val() != "") {
        $('#event_submit').hide();
        return;
      }
     
      alert("กรุณากรอกข้อมูลให้ครบ");
      event.preventDefault();
    });
  //   $('.join-ok').click(function(){
  //   	var sid = $(this).attr('data-sid');
  //   	console.log(sid);
		// $.ajax({
		// 	url: "/changemakers/user-join-event/1/"+sid,
	 //        type: "POST",
	 //        success : function(data) {	
	 //        console.log(data);			
	 //        	if(data==1){
	 //        		$('.join-tool-'+sid).css('display','none');	        		
	 //        		$('.join-repeat-'+sid).css('display','block');
	 //        		$('.join-repeat-'+sid+' .repeat').css('display','block');
	 //        	}	        			        	
	 //        } 

		// });
  //   });
  //   $('.join-remove').click(function(){
  //   	var sid = $(this).attr('data-sid');
  //   	console.log(sid);
		// $.ajax({
		// 	url: "/changemakers/user-join-event/0/"+sid,
	 //        type: "POST",
	 //        success : function(data) {	
	 //        console.log(data);			
	 //        	if(data==1){
	 //        		$('.join-tool-'+sid).css('display','none');
	 //        		$('.join-repeat-'+sid).css('display','block');
	 //        		$('.join-repeat-'+sid+' .repeat').css('display','block');
	 //        	}	        			        	
	 //        } 

		// });
  //   });
  //   $('.repeat').click(function(){
  //   	var sid = $(this).attr('data-sid');
  //   	console.log(sid);
  //   	$('.join-tool-'+sid).css('display','block');
	 //    $('.join-repeat-'+sid).css('display','none');
		
  //   });

    $("#webform-client-form-3").submit(function(){
        $('#hide_button').hide();
        //alert("Submitted");
    });

    $('#user_join_event').hide();
    $("#show_event").click(function() {
      $('#user_join_event').show();
      $('#detail_event').hide();

    });
    $("#back_show_detail").click(function() {
      $('#user_join_event').hide();
      $('#detail_event').show();
    });
});
/*(function ($) {  

  /*Drupal.behaviors.themename = {

    attach: function (context, settings) {            

     // All our js code here
   

   }

 };})(jQuery);

	$.ajax({
	type: 'GET',
	url: 'http://graph.facebook.com/http://changemakers.devfunction.com/event/<?php echo $nid; ?>',
	success: function(data) {
		$('#fb_count').text(data.shares);	
	}
	});
	$.ajax({
	type: 'GET',
	dataType: "JSONP",
	url:'http://count.donreach.com/?url=http://changemakers.devfunction.com/event/<?php echo $nid; ?>',
	  }).done(function ( data ) {
		$('#g_count').text(data.shares.google);	
	}); */
</script>


	

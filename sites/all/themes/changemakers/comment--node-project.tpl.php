<?php 

$user_data = user_load($content['comment_body']['#object']->uid);

?>
<!-- <div>คุณต้องการตอบกลับโพสต์ไปยังโพสต์ของ : </div> -->





<div class="col-xs-9" style="margin-top:15px;  ">
              <!--
                  <div class="col-xs-4">
                      <div class="pagebigtab--update--profile--box col-xs-12 row">
                      <a href="#">
                        <div class="cir--thumb__50" style="background:#333333;">
							<?php if(!empty($user_data->picture->filename)): ?>
							<img style="width:100px" src="<?php  print file_create_url($user_data->picture->uri);?>">
							<?php else: ?>
							<img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
							<?php endif; ?>                      
                        </div>
                      </a>

                      

                      <div class="pagebigtab--update--profile--detail ">

                          <a href="/user/<?php print $user_data->uid; ?>" class="detail__mid link__blue"><?php print $user_data->name?> 

                            <span class="icon-profile-verify member--verify"></span></a><br>
-->

                        <!--   <div class="detail__small"><span class=" icon-tag"></span> <a href="#">tag</a></div>

                          <div class="detail__small"><span class=" icon-target"></span> <a href="#">target</a></div> -->
<!--
                      </div>

                      </div>

                  </div>
                  <div class="col-xs-8 pagebigtab--update--comment">

                  	<div class="pagebigtab--update--post--arrow"></div>
                     <div class="comment--image"></div>
	                     <div class="comment--txt">
	                   		<?php print render($content['comment_body']['#object']->comment_body['und'][0]['value']); ?>
	                     </div>
                      <div class="comment--usertool">      </div>  
                    </div>
                  
              </div>
-->
    <div class="row">
    <div class="bg__white col-xs-12 padding15__box">
            
            <span class="txt__gray clear">Reply this update :</span>
        
        <!--<div class="viewmore--line row col-xs-12"></div>-->
        
        <div  class="reply--origi--update margin__top10" >
            <div class="cir--thumb__24 " style="background:#333333;">
							<?php if(!empty($user_data->picture->filename)): ?>
							<img src="<?php  print file_create_url($user_data->picture->uri);?>">
							<?php else: ?>
							<img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
							<?php endif; ?>                      
            </div>
        
            <a href="/user/<?php print $user_data->uid; ?>" class="detail__mid link__blue margin__left10">
                <?php print $user_data->name?> 
            </a>
        
        <div class="col-xs-12 sidebar--line2 margin__topbut10"></div>
           
        <div class="reply--comment"><?php print render($content['comment_body']['#object']->comment_body['und'][0]['value']); ?></div>
            
        </div>    
</div>
</div>
    </div>
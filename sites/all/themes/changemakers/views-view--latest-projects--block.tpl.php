<?php
global $user;      		
	// print '<pre>';
	// print_r($rows); 
	// print '</pre>';
?>


		<div class="block--latest--projects">
			
        <h1 class="headline--block headline--alte">UPDATED <span class="headline__bold"> PROJECTS </span></h1>			

            <div class="block--latest--projects_detail">
                
                
                <div class="project--box--btn">
                <?php if($user->uid && (!empty($user->roles[10]) || !empty($user->roles[4]) || !empty($user->roles[3]))){ ?>
                <a href="/node/add/project"  >
                <div class="project--create--btn">
                    <div class="headline__bold project--createword"> + CREATE</div><br> 
                    YOUR PROJECT
                    </div>
                </a>
                    
                <?php }else if(empty($user->uid)) { ?>
                    
                <a data-toggle="modal" data-target="#myLogin"  >
                <div class="project--create--btn">
                    <div class="headline__bold project--createword"> + CREATE</div><br> 
                    YOUR PROJECT
                    </div>
                </a>
                <?php } else { ?>
                    

                <div class="project--create--btn">
                    <div class="headline__bold project--createword"> + CREATE</div><br> 
                    YOUR PROJECT
                    </div>
           
                <?php } ?>
                </div>
   
         
            	<?php // print $rows; 

                $new_project = changemaker_grt_new_project();
                $last_comment_project  = changemaker_get_last_comment_project();


                foreach ($last_comment_project as $key => $value) {
          
                ?>
                <div class=" project--box">
                    <a href="<?php print $value['path']; ?>" >  
                        <div class="thumb">
                            <img src="<?php print $value['image']; ?>">
                        </div>
                    </a>
                    <a href="<?php print $value['path']; ?>" >  
                        <div id="moredetail__over" class="field--content project--boxover">
                            
                        <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print $value['title'];?></h4></div>
                        
                        <div class="detail__small__nopad  margin__top5 link__gray">
                            <div class="tag--linelimit__1">
                                <?php print $value['icon']; ?>
                                <?php print $value['name']; ?> 
                            </div>
                            <div class="tag--linelimit__1"><span class=" icon-clock "></span> <?php print $value['date_project']; ?></div>
                            
                        </div>   
                            
                         
                        <div id="moredetail__hide">
                            
                            <div class="detail__small__nopad">
                             <?php if(!empty($value['problem'])): ?>
                            <div class="tag--linelimit__1"><span class="icon-tag "></span> <?php print $value['problem']; ?></div>
                            <?php endif; ?>
                            <?php if(!empty($value['target'])): ?>
                            <div class="tag--linelimit__1"><span class='icon-target'></span> <?php print $value['target']; ?></div>
                            <?php endif; ?>
                            </div>
                            
                            <div class=" detail__medium">
                                <div class="moredetail__over__content " >
                                    <span class="detail--linelimit__2"><?php print $value['body'];?></span>
                                </div>
                            </div>
                             <span class="hidecontent--readmore">READ MORE <i class="glyphicon glyphicon-play-circle"></i></span>
                        </div>
                        
                        
                            
                        </div>
                    </a>

                    
                </div>
                <?php           # code...
                }
                ?>
                
			</div>
        
	
            <a href="/projects/list">
                
				   <div class="viewmore--line row  col-xs-12"><div href="#" class="viewmore--btn row">VIEW ALL <i class="glyphicon glyphicon-play-circle"></i></div></div> 
                
			</a>
    </div>

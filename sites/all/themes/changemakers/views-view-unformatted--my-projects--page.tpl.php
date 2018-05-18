<?php
global $user;
if(user_access('can_access_my_projects')){

	/**
	 * @file
	 * Default simple view template to display a list of rows.
	 *
	 * @ingroup views_templates
	 */
	?>
	<?php if (!empty($title)): ?>
	  <h3><?php print $title; ?></h3>

	<?php endif; ?>

	<?php foreach ($rows as $id => $row): ?>
	  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
	    <?php print $row; ?>
	  </div>
	<?php endforeach; ?>
	<br>

	<?php 

	module_load_include('inc','webform','includes/webform.submissions');
	$selections = webform_get_submissions(array('nid'=>2));
	$fetch_join_project = array();
	$get_data_join_project = array();
	foreach ($selections as $key => $value) {
		$fetch_join_project[] = $value;
	}

	if (!empty($_GET['filter-project'])) {
		$filter_status = $_GET['filter-project'];
		if($filter_status == "all"){
			$filter_status = 2;
		}
		else if($filter_status == "active"){
			$filter_status = 1;
		}
		else{
			$filter_status = 0;
		}
	}
	else{
		$filter_status = 2;
	}


		

	?>

	<div class="row ">
		<div class="view-filters clearfix">
	        <form class="ctools-auto-submit-full-form ctools-auto-submit-processed filter--myproject" action="/my-projects" method="get"  accept-charset="UTF-8">
	            <div class="views-exposed-form col-xs-12">
	                <div class="views-exposed-widgets ">
	                    <div id="edit-field-knowledge-type-tid-wrapper" class="views-exposed-widget views-widget-filter-field_knowledge_type_tid">
	                        <label for="edit-field-knowledge-type-tid">
	                            Views </label>
		                    <div class="views-widget">
		                        <div  class="form-item form-item-field-knowledge-type-tid form-type-select form-group">
		                            <select class="form-control form-select" title=""  id="filter_project" name="filter-project">
		                                <option <?php echo $filter_status=="2"?"selected='selected'":""; ?> value="all">All</option>
		                                <option <?php echo $filter_status=="1"?"selected='selected'":""; ?> value="active">Active Project</option>
		                                <option <?php echo $filter_status=="0"?"selected='selected'":""; ?> value="not-active">Not Active Project</option>
		                            </select>
		                        </div>	
		                    </div>
		                </div>
	                    <!--
		                <?php if(isset($user->roles[4]) || isset($user->roles[3]) || isset($user->roles[10])){ ?>    
		                <div style="float: right;">
		                	<a href="/how-start-project">
		                	<div>How To Create a Project</div>
		                	</a>
		                </div>
		                <?php } ?>
	-->
		            </div>	
	            </div>
	        </form>    
	    </div>	<br>
	<!--<h1 class="page-header">JOINED PROJECT</h1>-->
	<!--<div>
		<p>ไปหน้าสร้างโครงการ</p>
		<a href="/node/add/project"><button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Create New Project</button></a>
		<br>
	</div>

	<div>
		<p>ไปหน้าสร้าง Journal</p>
		<a href="/node/add/journal"><button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Create New Journal</button></a>
	</div>
	--><?php
	if(user_access('can_create_project')){ ?>    
	    
	        
	                <a href="/node/add/project">
	                <div class="project--create--btn3">
	                    <div class="headline__bold project--createword"> + CREATE</div><br> 
	                    YOUR PROJECT
	                    </div>
	                </a>
	<?php } ?>
	     
	<?php if(user_access('my_project_helpdesk')){ ?>
	<?php 
	$helpdesk_project = changemakers_get_helpdesk_join_project_dashboard($filter_status); 
	foreach ($helpdesk_project as $key => $value) {

			$data = node_load($value['nid']);
			// print '<pre>';
			// print_r($data);
			// print '</pre>';
			$get_data_join_project[] = $data; ?>
<a href="/project/<?php print $data->nid; ?>">
	    <div class="myproject--box ">

	    <div class="myproject--cate"><i class="icon-cir-link"></i> Consulted Project</div>
	    
		    <div class="thumb">
		        <div class="gd--cover"></div>
			        <div class="h4--linelimit__2 title">
			        <h4 class="headline__thaisan">
			        <?php  print $data->title;  ?>
			        </h4>
			        </div>

			        <?php if(empty($data->field_project_image['und'][0]['filename'])){ ?>
						<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
		            <?php }else{ 
		            	$img = explode( '://', $data->field_project_image['und'][0]['uri'] ); 
	        			$image = image_style_url("large", $data->field_project_image['und'][0]['uri']); 
		            	?>
						<img width="480px" src="<?php print $image; ?>" > 
		            <?php } ?>
			        
					
				
		        
		    </div>
	    
			<?php
			
			//print '<br/>';
			$string = strip_tags($data->body['und'][0]['value']);

			if (strlen($string) > 500) {

			    // truncate string
			    $stringCut = substr($string, 0, 500);

			    // make sure it ends in a word so assassinate doesn't become ass...
			    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
			}
			//print $string;
			//print '<br/>';
			// print '<br/>';
			// print changemakers_format_date_thai($data->created);
			// print '<br/>';
			$user_load = user_load($data->uid);
			?>
			<!--<img width="220px" src="/sites/default/files/pictures/<?php print $user_load->picture->filename; ?>" > <br/>-->
			<?php
			//print '<br/>';
			//print $data?>
	    
	     <div class="field--content myproject--boxover ">
	        status : <span class="green"><?php 
	        if($data->field_project_status['und'][0]['value'] == 1){
		        print "Active";
		      }else{
		        print "Not Active";
		      }
	        ?></span><br/>
	        Last Update : <?php print changemakers_format_date_thai_short($data->changed); ?>
	        
	    </div>
	</div>
	</a>
	     <?php
	}

	?>
	<?php } ?>


	<?php 
	// print "<pre>";
	// print_r($filter_status);
	// print "</pre>";
	$my_project = changemakers_get_own_project($filter_status);
	if(user_access('can_create_project')){ ?>

		
			<?php
			foreach ($my_project as $key => $value) { ?>
			<a href="/project/<?php print $value['nid']; ?>">	
	        <div class="myproject--box ">
	            
	            <div class="myproject--cate"><i class="icon-cir-author"></i> My Project</div>
	            
				    
				      <div class="thumb">
				          <div class="gd--cover"></div>
				          
				          <div class="h4--linelimit__2 title">
				          <h4 class="headline__thaisan">
				          <?php print $value['title'];?>
				          </h4>
				          </div>
				     		

				     			<?php
				     			 //print $value['picture'];


				     			 if(empty($value['picture'])){ ?>
									<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
					            <?php }else{ ?>
									<img width="150" src="<?php print $value['picture'];?>">
					            <?php } ?>
				           		
				          
				      </div>
				    

				    <div class="field--content myproject--boxover ">
				            
	                status : <span class="green"><?php print $value['status'];   ?></span><br/>
	                Last Update : 
	                    <span>
				        <?php 		          
				            print $value['last_update'];        
				        ?>
				        </span><br/>

				 
				        
				        
				    </div>
				    
					<div><?php //print $value['last_update'];?></div>
				</div>	
				</a>
			<?php } ?>
		
		     <?php

	}
	?>
	<?php if(user_access('my_project_partner')){
	  	$partner_project =  changemakers_get_partner_project($filter_status);
	  	// print "<pre>";
	  	// print_r($partner_project);
	  	// print "</pre>";
	  	//$coach_own_project = changemakers_get_own_project($filter_status);

		?>
	  	
			<?php
			foreach ($partner_project as $key => $value) { ?>
			<a href="/project/<?php print $value['nid']; ?>">
				<div class="myproject--box ">
	                <div class="myproject--cate"><i class=" icon-cir-join-status"></i> Partner Project</div>
				    
				      <div class="thumb">
				          <div class="gd--cover"></div>
				          
				          <div class="h4--linelimit__2 title">
				          <h4 class="headline__thaisan">
				          <?php print $value['title'];?>
				          </h4>
				          </div>
				     		
				           <img width="150" src="<?php print $value['picture'];?>">

				      </div>
				    

				    <div class="field--content myproject--boxover ">
				            
	                status : <span class="green"><?php 		          
				            print $value['status'];        
				        ?></span><br/>
	                Last Update : 
	                    <span>
				        <?php 		          
				            print $value['last_update'];        
				        ?>
				        </span><br/>

				 
				        
				        
				    </div>
				    
					<div><?php //print $value['last_update'];?></div>
				</div>	
				</a>
			<?php } ?>
		

		
			<?php
			if(!empty($coach_own_project)){
			foreach ($coach_own_project as $key => $value) { ?>
			 <a href="/project/<?php print $value['nid']; ?>">	
	        <div class="myproject--box ">
	            <div class="myproject--cate"><i class="icon-cir-author"></i> My Project</div>
				   
				      <div class="thumb">
				          <div class="gd--cover"></div>
				          
				          <div class="h4--linelimit__2 title">
				          <h4 class="headline__thaisan">
				          <?php print $value['title'];?>
				          </h4>
				          </div>
				     		
				           		<img width="150" src="<?php print $value['picture'];?>">
			
				      </div>
				    

				    <div class="field--content myproject--boxover ">
	                    
	                status : <span class="green"><?php 		          
				            print $value['status'];        
				        ?></span><br/>
	                Last Update : 
	        
	    
				        <span >
				        <?php 		          
				            print $value['last_update'];        
				        ?>
				        </span><br/>

				 
				        
				        
				    </div>
				    
					<div><?php //print $value['last_update'];?></div>
				</div>
				</a>	
			<?php }} ?>

		<?php 
	}
	?>

	<?php if(user_access('my_project_coach')){
	  	$coach_project =  changemakers_get_coach_project($filter_status);
	  	$coach_own_project = changemakers_get_own_project($filter_status);

		?>
	  	
			<?php
			foreach ($coach_project as $key => $value) { ?>
			<a href="/project/<?php print $value['nid']; ?>">
				<div class="myproject--box ">
	                <div class="myproject--cate"><i class=" icon-cir-join-status"></i> Coach Project</div>
				    
				      <div class="thumb">
				          <div class="gd--cover"></div>
				          
				          <div class="h4--linelimit__2 title">
				          <h4 class="headline__thaisan">
				          <?php print $value['title'];?>
				          </h4>
				          </div>
				     		
				           <img width="150" src="<?php print $value['picture'];?>">
				      
				      </div>
				    
				    <div class="field--content myproject--boxover ">
				            
	                status : <span class="green"><?php 		          
				            print $value['status'];        
				        ?></span><br/>
	                Last Update : 
	                    <span>
				        <?php 		          
				            print $value['last_update'];        
				        ?>
				        </span><br/>

				 
				        
				        
				    </div>
				    
					<div><?php //print $value['last_update'];?></div>
				</div>
				</a>
	
			<?php } ?>
		

		
			<?php
			foreach ($coach_own_project as $key => $value) { ?>
			 <a href="/project/<?php print $value['nid']; ?>">	
	        <div class="myproject--box ">
	            <div class="myproject--cate"><i class="icon-cir-author"></i> My Project</div>
				   
				      <div class="thumb">
				          <div class="gd--cover"></div>
				          
				          <div class="h4--linelimit__2 title">
				          <h4 class="headline__thaisan">
				          <?php print $value['title'];?>
				          </h4>
				          </div>
				     		
				           		<img width="150" src="<?php print $value['picture'];?>">
				      
				      </div>
				    

				    <div class="field--content myproject--boxover ">
	                    
	                status : <span class="green"><?php 		          
				            print $value['status'];        
				        ?></span><br/>
	                Last Update : 
	        
	    
				        <span >
				        <?php 		          
				            print $value['last_update'];        
				        ?>
				        </span><br/>

				 
				        
				        
				    </div>
				    
					<div><?php //print $value['last_update'];?></div>
				</div>
				</a>	
			<?php } ?>

		<?php 
	}
	?>

	<?php 



    function compareByDate($a, $b)
	{
	    $t1 = strtotime($a->changed);
	    $t2 = strtotime($b->changed);
	    return $t1-$t2;
	}    

 //    print '<pre>';
	// print_r($get_data_join_projects);
	// print '</pre>';

	foreach ($fetch_join_project as $key => $value) {
		if($user->uid == $value->data[1][0] && $value->data[3][0] == 1)
		{
			//$data = node_load($value->data[2][0]);
			//if(!empty($data->name)){
			if(empty($get_data_join_projects)){
				$get_data_join_projects = $value->data[2][0]; 
			}else{
				$get_data_join_projects = $get_data_join_projects.",".$value->data[2][0]; 
			}
			
			//}
			
		}	
	}

	// print '<pre>';
	// print_r($get_data_join_projects);
	// print '</pre>';

	
	if(!empty($get_data_join_projects)){
		 $sql= "select * from node 
		 where type='project' 
		 and nid in (".$get_data_join_projects.") 
		 ORDER BY changed DESC ";
		 $query_db = db_query($sql);
		 // foreach ($query_db as $key => $value) {
		 // 	# code...
		 // }
	}
	


	// usort($get_data_join_project, 'compareByDate');


	// print '<pre>';
	// print_r($get_data_join_project);
	// print '</pre>';

	foreach ($query_db as $key => $value) {

		$data = node_load($value->nid);
		if($filter_status == 2){

			

			?><a href="/project/<?php print $data->nid; ?>">
		    <div class="myproject--box ">

		    	<div class="myproject--cate"><i class="icon-cir-link"></i> Joined Project</div>
			    
				    <div class="thumb">
				        <div class="gd--cover"></div>
					        <div class="h4--linelimit__2 title">
					        <h4 class="headline__thaisan">
					        <?php  print $data->title;  ?>
					        </h4>
					        </div>

					        <?php if(empty($data->field_project_image['und'][0]['filename'])){ ?>
								<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
				            <?php }else{ ?>
								<img width="480px" src="<?php print image_style_url("cover-image", $data->field_project_image['und'][0]['uri']) ; ?>" > 
				            <?php } ?>
					        
							
						
				        
				    </div>
			    
				<?php
				
				//print '<br/>';
				$string = strip_tags($data->body['und'][0]['value']);

				if (strlen($string) > 500) {

				    // truncate string
				    $stringCut = substr($string, 0, 500);

				    // make sure it ends in a word so assassinate doesn't become ass...
				    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
				}
				//print $string;
				//print '<br/>';
				// print '<br/>';
				// print changemakers_format_date_thai($data->created);
				// print '<br/>';
				$user_load = user_load($data->uid);
				?>
				<!--<img width="220px" src="/sites/default/files/pictures/<?php print $user_load->picture->filename; ?>" > <br/>-->
				<?php
				//print '<br/>';
				//print $data?>
		    
			    <div class="field--content myproject--boxover ">
			        status : <span class="green"><?php 
			        if($data->field_project_status['und'][0]['value'] == 1){
				        print "Active";
				      }else{
				        print "Not Active";
				      }
			        ?></span><br/>
			        Last Update : <?php print changemakers_format_date_thai_short($data->changed); ?>
			        
			    </div>
			</div>
			</a>
	     <?php
	 	}else{
	 	 
	 	    if($filter_status == $data->field_project_status['und'][0]['value'] ){
	 	    ?>
	 	    <a href="/project/<?php print $data->nid; ?>">
			<div class="myproject--box ">

		    	<div class="myproject--cate"><i class="icon-cir-link"></i> Joined Project</div>
			    
				    <div class="thumb">
				        <div class="gd--cover"></div>
					        <div class="h4--linelimit__2 title">
					        <h4 class="headline__thaisan">
					        <?php  print $data->title;  ?>
					        </h4>
					        </div>

					        <?php if(empty($data->field_project_image['und'][0]['filename'])){ ?>
								<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
				            <?php }else{ ?>
								<img width="480px" src="<?php print image_style_url("cover-image", $data->field_project_image['und'][0]['uri']) ; ?>" >
				            <?php } ?>
					        
							
						
				        
				    </div>
			    
				<?php
				
				//print '<br/>';
				$string = strip_tags($data->body['und'][0]['value']);

				if (strlen($string) > 500) {

				    // truncate string
				    $stringCut = substr($string, 0, 500);

				    // make sure it ends in a word so assassinate doesn't become ass...
				    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
				}
				//print $string;
				//print '<br/>';
				// print '<br/>';
				// print changemakers_format_date_thai($data->created);
				// print '<br/>';
				$user_load = user_load($data->uid);
				?>
				<!--<img width="220px" src="/sites/default/files/pictures/<?php print $user_load->picture->filename; ?>" > <br/>-->
				<?php
				//print '<br/>';
				//print $data?>
		    
			    <div class="field--content myproject--boxover ">
			        status : <span class="green"><?php 
			        if($data->field_project_status['und'][0]['value'] == 1){
				        print "Active";
				      }else{
				        print "Not Active";
				      }
			        ?></span><br/>
			        Last Update : <?php print changemakers_format_date_thai_short($data->changed); ?>
			        
			    </div>
			</div>
			</a>
	 	<?php  }
	 	}
	}

	?>

	<!--<h1 class="page-header">FOLLOWED PROJECT</h1>-->


	<?php   $sql= "select f.field_following_project_nid from field_data_field_following_project f
				   inner join node n
				   on f.field_following_project_nid = n.nid  
				   where f.entity_id ='".$user->uid."'
				   order by n.changed DESC";
			$query_db = db_query($sql);
			$following_project = array();
			foreach ($query_db as $row) 
			{
				$following_project = node_load($row->field_following_project_nid);

				$coach = array();
				$partner = array();
				$hd = array();


				foreach ($following_project->field_coach_project['und'] as $key => $value) {
					$coach[] = $value['uid'];
				}

				foreach ($following_project->field_partner_project['und'] as $key => $value) {
					$partner[] = $value['uid'];
				}

				foreach ($following_project->field_helpdesk_project['und'] as $key => $value) {
					$hd[] = $value['uid'];
				}

				// print '<pre>';
				// print_r($following_project->field_coach_project);# changemakers_format_date_thai($data->created);
				// print '</pre>';

				if(!in_array($user->uid, $coach) && !in_array($user->uid, $partner) && !in_array($user->uid, $hd)){
				?>
					<?php if($filter_status == 2){ ?>
					<a href="/project/<?php print $following_project->nid; ?>">
					<div class="myproject--box ">
					    <div class="myproject--cate"><i class="icon-cir-follow"></i> Followed Project</div>
					     
					    	<div class="thumb">

					        <div class="gd--cover"></div>
					       
						        <div class="h4--linelimit__2 title">
						        <h4 class="headline__thaisan">
						            <?php print $following_project->title; ?>
						         </h4>
						         </div>
						            <?php if(empty($following_project->field_project_image['und'][0]['filename'])){ ?>
										<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
						            <?php }else{ $image = image_style_url("large", $following_project->field_project_image['und'][0]['uri']);  ?> 
										<img width="480px" src="<?php print $image; //image_style_url('cover-image',$following_project->field_project_image['und'][0]['uri']); ?>" >
						            <?php } ?>
						            
						            
						        </div>
					        

								<?php
								
								//print '<br/>';
								$string = strip_tags($following_project->body['und'][0]['value']);

								if (strlen($string) > 500) {

								    // truncate string
								    $stringCut = substr($string, 0, 500);

								    // make sure it ends in a word so assassinate doesn't become ass...
								    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
								}
								//print $string;
								//print '<br/>';
								// print '<br/>';
								// print changemakers_format_date_thai($data->created);
								// print '<br/>';
								//$user_load_follow_project = user_load($data->uid);
								?>
								<!--<img width="220px" src="/sites/default/files/pictures/<?php print $user_load_follow_project->picture->filename; ?>" > <br/>-->
					           
					     <div class="field--content myproject--boxover ">
					        status : <span class="green"><?php 
					        if($following_project->field_project_status['und'][0]['value'] == 1){
						        print "Active";
						      }else{
						        print "Not Active";
						      }
					        ?></span><br/>
					        Last Update : <?php print changemakers_format_date_thai_short($following_project->changed); ?>
					        
					    </div>
					</div>
					</a>
					<?php }else{
						if($filter_status == $following_project->field_project_status['und'][0]['value'] ){ ?>
						<a href="/project/<?php print $following_project->nid; ?>">
						<div class="myproject--box ">
						    <div class="myproject--cate"><i class="icon-cir-follow"></i> Followed Project</div>
						     
						    	<div class="thumb">

						        <div class="gd--cover"></div>
						       
							        <div class="h4--linelimit__2 title">
							        <h4 class="headline__thaisan">
							            <?php print $following_project->title; ?>
							         </h4>
							         </div>
							            <?php if(empty($following_project->field_project_image['und'][0]['filename'])){ ?>
											<img width="480px" src="/sites/all/themes/changemakers/images/project1.jpg" >
							            <?php }else{  $image = image_style_url("large", $following_project->field_project_image['und'][0]['uri']);  ?> 
											<img width="480px" src="<?php print $image; //image_style_url('cover-image',$following_project->field_project_image['und'][0]['uri']); ?>" >
							            <?php } ?>
							            
							            
							        </div>
						        

									<?php
									
									//print '<br/>';
									$string = strip_tags($following_project->body['und'][0]['value']);

									if (strlen($string) > 500) {

									    // truncate string
									    $stringCut = substr($string, 0, 500);

									    // make sure it ends in a word so assassinate doesn't become ass...
									    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
									}
									//print $string;
									//print '<br/>';
									// print '<br/>';
									// print changemakers_format_date_thai($data->created);
									// print '<br/>';
									//$user_load_follow_project = user_load($data->uid);
									?>
									<!--<img width="220px" src="/sites/default/files/pictures/<?php print $user_load_follow_project->picture->filename; ?>" > <br/>-->
						           
						     <div class="field--content myproject--boxover ">
						        status : <span class="green"><?php 
						        if($following_project->field_project_status['und'][0]['value'] == 1){
							        print "Active";
							      }else{
							        print "Not Active";
							      }
						        ?></span><br/>
						        Last Update : <?php print changemakers_format_date_thai_short($following_project->changed); ?>
						        
						    </div>
						</div>
						</a>
					<?php	}
					} 



				}?>


	            
	            <?php
			}
			//print '<br/>';
			

		
		// $user_load = user_load($data->uid);
		// print '<pre>';
		// print_r($project_id);# changemakers_format_date_thai($data->created);
		// print '</pre>';

	?>

	</div>
	<br>


<?php }else{
	drupal_goto("/");
} ?>



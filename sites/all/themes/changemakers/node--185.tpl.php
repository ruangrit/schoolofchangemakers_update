
<?php

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
global $user;
module_load_include('inc','webform','includes/webform.submissions');
$selections = webform_get_submissions(array('nid'=>2));
$fetch_join_project = array();
$get_data_join_project = array();
foreach ($selections as $key => $value) {
	$fetch_join_project[] = $value;
}


	

?>
<div class="row">
<!--<h1 class="page-header">JOINED PROJECT</h1>-->
<div>
	<p>ไปหน้าสร้างโครงการ</p>
	<a href="/node/add/project"><button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Create New Project</button></a>
	<br>
</div>

<div>
	<p>ไปหน้าสร้าง Journal</p>
	<a href="/node/add/project"><button id="btn_show_comment" class="btn btn--submit pagebigtab__1btn" style="margin-top:0;"><i class=" icon-plus-circled"></i> Create New Journal</button></a>
</div>

<?php 

$my_project = changemakers_get_own_project();
if(!empty($user->roles[3]) || !empty($user->roles[4]) || !empty($user->roles[10])){ ?>

	<div class="col-xs-12 row col-xs-12 margin__top15">
		<h2 class="headline headline__alte">My Project</h2>
		<?php
		foreach ($my_project as $key => $value) { ?>
			
        <div class="myproject--box ">
			    <a href="/project/<?php print $value['nid']; ?>">
			      <div class="thumbbox--wrap--img">
			          <div class="gd--cover"></div>
			          
			          <div class="detail--linelimit__2 title">
			          <h4 class="headline__thaisan">
			          <?php print $value['title'];?>
			          </h4>
			          </div>
			     		<a href="/project/<?php print $value['nid'];?>">
			           		<img width="150" src="<?php print $value['picture'];?>">
			           </a>
			      </div>
			    </a>

			    <div class="field--content myproject--boxover ">
			        <span class="green">
			        <?php 		          
			            print $value['last_update'];        
			        ?>
			        </span><br/>

			 
			        
			        
			    </div>
			    
				<div><?php //print $value['last_update'];?></div>
			</div>	
		<? } ?>
	</div>
	     <?php

}
?>


<h2 class="headline headline__alte">Other Project</h2>
<?php 

foreach ($fetch_join_project as $key => $value) {
	if($user->uid == $value->data[1][0])
	{
		$data = node_load($value->data[2][0]);
		// print '<pre>';
		// print_r($data);
		// print '</pre>';
		$get_data_join_project[] = $data; ?>

    <div class="myproject--box ">

    <div class="myproject--cate"><i class="icon-cir-link"></i> Joined Project</div>
    <a href="/project/<?php print $data->nid; ?>">
	    <div class="thumbbox--wrap--img">
	        <div class="gd--cover"></div>
		        <div class="detail--linelimit__2 title">
		        <h4 class="headline__thaisan">
		        <?php  print $data->title;  ?>
		        </h4>
		        </div>
		        
				<img width="480px" src="/sites/default/files/<?php print $data->field_project_image['und'][0]['filename']; ?>" > 
			
	        
	    </div>
    </a>
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
        status : <span class="green">Active</span><br/>
        Last Update : 16 เม.ย. 59 55
        
    </div>
</div>
     <?php
	}
}

?>

<!--<h1 class="page-header">FOLLOWED PROJECT</h1>-->


<?php   $sql= "select field_following_project_nid from field_data_field_following_project where entity_id ='".$user->uid."'";
		$query_db = db_query($sql);
		$following_project = array();
		foreach ($query_db as $row) 
		{
			$following_project = node_load($row->field_following_project_nid);
			?>
<div class="myproject--box ">
    <div class="myproject--cate"><i class="icon-cir-follow"></i> Followed Project</div>
     <a href="/project/<?php print $following_project->nid; ?>">
    	<div class="thumbbox--wrap--img">

        <div class="gd--cover"></div>
       
	        <div class="detail--linelimit__2 title">
	        <h4 class="headline__thaisan">
	            <?php print $following_project->title; ?>
	         </h4>
	         </div>
	            <img width="480px" src="/sites/default/files/<?php print $following_project->field_project_image['und'][0]['filename']; ?>" >
	            
	        </div>
        </a>

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
        status : <span class="green">Active</span><br/>
        Last Update : <?php print changemakers_format_date_thai_short($following_project->changed); ?>
        
    </div>
</div>

            
            <?
		}
		//print '<br/>';
		

	
	// $user_load = user_load($data->uid);
	// print '<pre>';
	// print_r($project_id);# changemakers_format_date_thai($data->created);
	// print '</pre>';

?>
<?php if(isset($user->roles[5])){
  	$coach_project =  changemakers_get_coach_project();
  	$coach_own_project = changemakers_get_own_project();

?>
  	<div class="col-xs-12 row margin__top15">
		<div><h2 class="headline headline__alte">Coach Project</h2></div>
		<?php
		foreach ($coach_project as $key => $value) { ?>
			<div class="myproject--box ">
			    <a href="/project/<?php print $value['nid']; ?>">
			      <div class="thumbbox--wrap--img">
			          <div class="gd--cover"></div>
			          
			          <div class="detail--linelimit__2 title">
			          <h4 class="headline__thaisan">
			          <?php print $value['title'];?>
			          </h4>
			          </div>
			     		<a href="/project/<?php print $value['nid']; ?>">
			           <img width="150" src="<?php print $value['picture'];?>">
			           </a>
			      </div>
			    </a>

			    <div class="field--content myproject--boxover ">
			        <span class="green">
			        <?php 		          
			            print $value['last_update'];        
			        ?>
			        </span><br/>

			 
			        
			        
			    </div>
			    
				<div><?php //print $value['last_update'];?></div>
			</div>	
		<? } ?>
	</div>

	<div class="col-xs-12 row col-xs-12 margin__top15">
		<h2 class="headline headline__alte">My Project</h2>
		<?php
		foreach ($coach_own_project as $key => $value) { ?>
			
        <div class="myproject--box ">
			    <a href="/project/<?php print $value['nid']; ?>">
			      <div class="thumbbox--wrap--img">
			          <div class="gd--cover"></div>
			          
			          <div class="detail--linelimit__2 title">
			          <h4 class="headline__thaisan">
			          <?php print $value['title'];?>
			          </h4>
			          </div>
			     		<a href="/project/<?php print $value['nid'];?>">
			           		<img width="150" src="<?php print $value['picture'];?>">
			           </a>
			      </div>
			    </a>

			    <div class="field--content myproject--boxover ">
			        <span class="green">
			        <?php 		          
			            print $value['last_update'];        
			        ?>
			        </span><br/>

			 
			        
			        
			    </div>
			    
				<div><?php //print $value['last_update'];?></div>
			</div>	
		<? } ?>
	</div>
	<?php 
}
?>
</div>
<br>

<?php if($user->roles[3]){ ?>
<?php echo views_embed_view('show_all_projects', $display_id = 'block'); ?>

<?php } ?>


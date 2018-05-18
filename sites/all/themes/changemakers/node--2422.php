<?php 
		

		// $node_comment = node_load($node->nid);
  //       $node_view = node_view($node);
  //       $node_view['comments'] = comment_node_page_additions($node_comment);
  //       print render($content['comments']);
	global $user;
		
  	//$select_project = changemakers_get_create_update_project();
  	global $user;
    $sql= "select nid from node where type='project' and uid=".$user->uid;
    $query_db = db_query($sql);
    $project_id = array();
    foreach ($query_db as $row){
      $project_id[] = $row->nid;
      // $data = node_load($row->nid);
      // $get_own_project[$i]['title'] = $data->title;
      // $i++;
    }
    module_load_include('inc','webform','includes/webform.submissions');
    $seleteions = webform_get_submissions(array('nid'=>2));

    $result = array();
    $i = 0;
    foreach ($seleteions as $key => $value) {
    	if($value->data[3][0] == 1 && $value->data[1][0] == $user->uid){
    		$project_id[] = $value->data[2][0];
    	}
    }

    $query_hd = db_select('field_data_field_helpdesk_project', 'fm');
             $query_hd->fields('fm', array('entity_id'));
             $query_hd->condition('fm.field_helpdesk_project_uid', $user->uid, '=');
    $result_get_hd = $query_hd->distinct()->execute();
    foreach ($result_get_hd as $key => $value) {
      if(!in_array($value->entity_id, $project_id)){
        $project_id[] = $value->entity_id;
      }
    }

    $query_ch = db_select('field_data_field_coach_project', 'fm');
             $query_ch->fields('fm', array('entity_id'));
             $query_ch->condition('fm.field_coach_project_uid', $user->uid, '=');
    $result_get_ch = $query_ch->distinct()->execute();
    foreach ($result_get_ch as $key => $value) {
      if(!in_array($value->entity_id, $project_id)){
        $project_id[] = $value->entity_id;
      }
    }
    $get_own_project = array();
    $i = 0;
    foreach ($project_id as $key => $value) {
    	if(!empty($value)){
    		$data = node_load($value);
    		if(!empty($data->title)){
    			$get_own_project[$i]['title'] = $data->title;
		      	$get_own_project[$i]['nid'] = $data->nid;
		      	$i++;
    		}
    	}
    }



    $select_project = $get_own_project;	

  	print "<pre>";
  	print_r($select_project);
  	print "</pre>";		

    // $node_comment = node_load($select_project[0]['nid']);
    // $node_view = node_view($node_comment);
    // $node_view['comments'] = comment_node_page_additions($node_comment);
    // print render($content['comments']);
    if(!empty($_GET['node-id'])){
      $node_select = $_GET['node-id'];
    }else{
      $node_select = $select_project[0]['nid'];
    }



if(!empty($select_project)){

	?>
	<div class="update--project--form">
        
		<h1 class="font__thaisan">เลือกโปรเจกต์ที่ต้องการอัพเดต</h1>
		<select id="update_project" name="update_project" class="campaign--select--project" >
			<?php for ($i=0; $i < count($select_project) ; $i++) {  ?>
				
				<option value="<?php echo $select_project[$i]['nid']?>" <?php if($node_select==$select_project[$i]['nid']) echo "selected=\"selected\""; ?>><?php echo $select_project[$i]['title'];?></option>
				<?php 
			} ?>
		</select>
	</div>
  <?php print drupal_render(drupal_get_form("comment_node_project_form", (object) array('nid' => $node_select))); ?>
	<!-- <div id="results-comment-form-project-update"></div> -->
<?php 		
}
else{ 
	if($user->roles[10] || $user->roles[4]){ ?>
	 <h2 class="font__thaisan">คุณยังไม่มีโปรเจกต์ สามารถสร้างโปรเจกต์ได้ที่นี่ <a href="/node/add/project">สร้างโปรเจกต์</a></h2>
<?php 
}
else{ ?>
	<h2 class="font__thaisan">คุณยังไม่มีโปรเจกต์ใดๆ ที่สามารถอัพเดตได้</h2>
<?php }
}		
?>

<script type="text/javascript">
(function($) {
	var nid = <?php echo $select_project[0]['nid'] ?>;
	if(nid){
		//$('#results-comment-form-project-update').load("/api/changemakers/project_update_view", {'nid':nid }, function() {});
    // $("form[name=comment_project_form]").attr("action", "/comment/reply/"+nid);
	}else{
		//$('#results-comment-form').appen();
	}
	
    $(document).ready(function(){
    	$('#update_project').on('change', function() {
        //alert(window.location.href);
        // if(window.location.hostname == "www.myweb.com"){
        window.location.href = "/add-project-update?node-id="+$('#update_project').val();
        // }
        //$("form[name=comment_project_form]").attr("action", "/comment/reply/"+$('#update_project').val());

    		// $( '#results-comment-form-project-update' ).empty();
  		  // //alert( this.value ); // or $(this).val()
  		  // var nid_change = this.value;
  		  // $.get('/api/changemakers/project_update_view',{'nid':nid_change }, function(data) {
	     //    //alert(nid_change);
	     //    $("#results-comment-form-project-update").append(data); //append data received from server
	        
	      
	     //  }).fail(function(xhr, ajaxOptions, thrownError) { 
	     //    alert(thrownError); //alert any HTTP error
	     //    // $("#load_more_button").show(); //bring back load more button
	     //    // $('.animation_image').hide(); //hide loading image once data is received
	     //  });
		});

        
      
    });  
}(jQuery));
</script>

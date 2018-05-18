<?php 
// print '<pre>';
// print_r($rows);
// print '</pre>';


?>
<style type="text/css">
/*    
.header_filter{
	background: #EFECEC;
    height: 70px;
}
.filter_padding_top{
	padding-top: 10px;
}
.create_post_float{
	float: right;
}
.image_width_icon{
	width:25px;
}*/
</style>

<div class="container">
  <div class="col-md-12 header_filter">
    <div class="preview-section">
    	<form class="ctools-auto-submit-full-form ctools-auto-submit-processed" action="/projects/list/page" method="get" id="views-exposed-form-project-page" accept-charset="UTF-8">

			<!-- THEME DEBUG -->
			<!-- CALL: theme('views_exposed_form') -->
			<!-- BEGIN OUTPUT from 'sites/all/modules/views/theme/views-exposed-form.tpl.php' -->
			<div class="views-exposed-form filter_padding_top">
			  	<div class="views-exposed-widgets clearfix">
			        <div id="edit-field-problem-topic-tid--7-wrapper" onchange="submitFunction()" class="col-xs-4 views-exposed-widget views-widget-filter-field_problem_topic_tid">
	                  	<div class="col-xs-5">
	            			FILTER PROJECT BY PROBLEM          
	        			</div>
             
          					<div class="form-item form-type-select form-item-field-problem-topic-tid">
 								<select id="edit-field-problem-topic-tid--7" name="field_problem_topic_tid" class="form-select">
 									<option value="All">All Interests</option>
 									<option value="1">สิ่งแวดล้อม</option>
 									<option value="2">สุขภาพ</option>
 									<option value="3">เศรษฐกิจ/ความยากจน</option>
 								</select>
							</div>
        			
              		</div>
	          		<div id="edit-field-project-target-tid--7-wrapper" class="col-xs-4 views-exposed-widget views-widget-filter-field_project_target_tid">
                  		<div class="col-xs-5">
        					FILTER PROJECT BY TARGET          
       					</div>
   
          					<div class="form-item form-type-select form-item-field-project-target-tid">
 								<select id="edit-field-project-target-tid--7" onchange="submitFunction()" name="field_project_target_tid" class="form-select">
 									<option value="All">All Targets</option>
 									<option value="1">ครอบครัว</option>
 									<option value="2">ชุมชน</option>
 									<option value="3">ผู้ด้อยโอกาส</option>
 									<option value="4">ผู้พิการ</option>
 									<option value="5">ผู้สูงอายุ</option>
 									<option value="6">ผู้หญิง</option>
 									<option value="7">สัตว์</option>
 									<option value="8">เด็ก</option>
 									<option value="9">เยาวชน</option>
 								</select>
							</div> 
				
					</div>
                    <div class="views-exposed-widget views-submit-button">
					    <input class="ctools-use-ajax ctools-auto-submit-click js-hide form-submit views-ajax-processed-processed" type="submit" id="edit-submit-project--7" name="" value="Apply">    
					</div>
				</div>
			</div>
			<!-- END OUTPUT from 'sites/all/modules/views/theme/views-exposed-form.tpl.php' -->
		</form>
	</div>
  </div>
  <br/><br/> <br/><br/> 
        
  <table class="table table-hover">
   <!--  <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead> -->
    <tbody>
      
       <?php echo $rows; ?>
    </tbody>
  </table>
</div>
<script>
	var val_prob = getParameterByName('field_problem_topic_tid');
	if(val_prob)
	{
		document.getElementById("edit-field-problem-topic-tid--7").value = val_prob;
	}
	else
	{
		document.getElementById("edit-field-problem-topic-tid--7").value = "All";
	}

	var val_target = getParameterByName('field_project_target_tid');
	if(val_prob)
	{
		document.getElementById("edit-field-project-target-tid--7").value = val_target;
	}
	else
	{
		document.getElementById("edit-field-project-target-tid--7").value = "All";
	}
	//alert(val);

	function submitFunction() {
	    document.getElementById("views-exposed-form-project-page").submit();
	}
	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
</script>


<?php
global $user;

	/**
	 * @file
	 * Default simple view template to all the fields as a row.
	 *
	 * - $view: The view in use.
	 * - $fields: an array of $field objects. Each one contains:
	 *   - $field->content: The output of the field.
	 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
	 *   - $field->class: The safe class id to use.
	 *   - $field->handler: The Views field handler object controlling this field. Do not use
	 *     var_export to dump this object, as it can't handle the recursion.
	 *   - $field->inline: Whether or not the field should be inline.
	 *   - $field->inline_html: either div or span based on the above flag.
	 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
	 *   - $field->wrapper_suffix: The closing tag for the wrapper.
	 *   - $field->separator: an optional separator that may appear before a field.
	 *   - $field->label: The wrap label text to use.
	 *   - $field->label_html: The full HTML of the label to use including
	 *     configured element type.
	 * - $row: The raw result object from the query, with all data it fetched.
	 *
	 * @ingroup views_templates
	 */
	
	// print "<pre>";
	// print_r($row);
	// print "/<pre>";
	// print $user->uid;
	// print $user->uid ;
	/*if($row->node_uid == $user->uid):
		

		//print $fields['field_project_date']->content;
		$get_array = explode('/', $fields['field_project_date']->content);

		$day = $get_array[0];
		$m = $get_array[1];
		$y = $get_array[2];
		$time_Stamp = mktime(0,0,0,$month,$day,$year);

		$year = $y+543;
		$month = array('','ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.');

		$date_create_project = $day.' '.$month[$m].' '.$year;

	   ?>

		<div class="myproject--box ">
		    <div class="myproject--cate"><i class="icon-cir-link"></i> My Project</div>
		    <a href="/project/<?php print $row->nid; ?>">
			    <div class="thumbbox--wrap--img">
			        <div class="gd--cover"></div>
				        <div class="detail--linelimit__2 title">
				        <h4 class="headline__thaisan">
				        <?php  print $fields['title']->content;  ?>
				        </h4>
				        </div>
				        
						<?php print $fields['field_project_image']->content; ?>
					
			        
			    </div>
		    </a>
				<?php
				
				//print '<br/>';
				//print $fields['body']->content;
				//print $string;
				//print '<br/>';
				// print '<br/>';
				// print changemakers_format_date_thai($data->created);
				// print '<br/>';
				$user_load = user_load($user->uid);
				?>
				<!--<img width="220px" src="/sites/default/files/pictures/<?php //print $user_load->picture->filename; ?>" > <br/>-->
				<?php
				//print '<br/>';
				//print $data?>
		    
		     <div class="field--content myproject--boxover ">
		        status : <span class="green">Active</span><br/>
		        Last Update : <span><?php print $date_create_project; ?></span>
		        
		    </div>
		</div>




		<?php





		// $m = explode('/', $input);
		// $new = mktime(0,0,0,$m[1],$m[0],$m[2]);
		// echo "$new\n";

		// $new = str_replace("/", "-", $input);
		// $new = strtotime($new);
		// echo "$new\n";

		// preg_match('~^(\d+)/(\d+)/(\d+)$~', $input, $m);
		// $new = strtotime("$m[3]-$m[2]-$m[1]");
		// echo "$new\n";

		// $m = sscanf($input, '%d/%d/%d');
		// $new = strtotime("$m[2]-$m[1]-$m[0]");
		// echo "$new\n";

		//print "-------------------------end----------------------------";

		//$date_create_project = strtotime($fields['field_project_date']->content);
		//print $timestamp;//$fields['field_project_date']->content;
		//print //changemakers_format_date_thai($timestamp);
	endif; */
?>



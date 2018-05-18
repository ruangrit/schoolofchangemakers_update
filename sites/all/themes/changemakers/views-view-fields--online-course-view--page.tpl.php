<?php
if(empty($_SESSION['course_lesstion'])){
	$_SESSION['course_lesstion']=1;
	$lession_title = "Module 1 : Idea evelopment";
}else{
	if($_SESSION['course_lesstion']==1){
		$lession_title = "Module 1 : Idea evelopment";
	}elseif($_SESSION['course_lesstion']==2){
		$lession_title = "Module 2 : Model and Plan";
	}elseif($_SESSION['course_lesstion']==3){
		$lession_title = "Module 3 : Take action";
	}elseif($_SESSION['course_lesstion']==4){
		$lession_title = "Module 4 : Stepping to the next";
	}elseif($_SESSION['course_lesstion']==5){
		$lession_title = "Hello!";
	}elseif($_SESSION['course_lesstion']==6){
		$lession_title = "Are you ready?";
	}elseif($_SESSION['course_lesstion']==7){
		$lession_title = "You better be prepared!";
	}elseif($_SESSION['course_lesstion']==8){
		$lession_title = "Let's go (coaching)!";
	}elseif($_SESSION['course_lesstion']==9){
		$lession_title = "Hoorah!";
	}elseif($_SESSION['course_lesstion']==10){
		$lession_title = "More?";
	}else{
		$lession_title = "";
	}
}
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
?>

<?php
	if($_SESSION['course_lesstion']!=strip_tags($fields['field_course_lession']->content)): 
		if(strip_tags($fields['field_course_lession']->content)==1){
			$_SESSION['course_lesstion']=1;
			$lession_title = "Module 1 : Idea development";
		}elseif(strip_tags($fields['field_course_lession']->content)==2){
			$_SESSION['course_lesstion']=2;
			$lession_title = "Module 2 : Model and Plan";
		}elseif(strip_tags($fields['field_course_lession']->content)==3){
			$_SESSION['course_lesstion']=3;
			$lession_title = "Module 3 : Take action";
		}elseif(strip_tags($fields['field_course_lession']->content)==4){
			$_SESSION['course_lesstion']=4;
			$lession_title = "Module 4 : Stepping to the next";
		}elseif(strip_tags($fields['field_course_lession']->content)==5){
			$_SESSION['course_lesstion']=5;
			$lession_title = "Hello!";
		}elseif(strip_tags($fields['field_course_lession']->content)==6){
			$_SESSION['course_lesstion']=6;
			$lession_title = "Are you ready?";
		}elseif(strip_tags($fields['field_course_lession']->content)==7){
			$_SESSION['course_lesstion']=7;
			$lession_title = "You better be prepared!";
		}elseif(strip_tags($fields['field_course_lession']->content)==8){
			$_SESSION['course_lesstion']=8;
			$lession_title = "Let's go (coaching)!";
		}elseif(strip_tags($fields['field_course_lession']->content)==9){
			$_SESSION['course_lesstion']=9;
			$lession_title = "Hoorah!";
		}elseif(strip_tags($fields['field_course_lession']->content)==10){
			$_SESSION['course_lesstion']=10;
			$lession_title = "More?";
		}else{
			$lession_title = "";
		}
	else :
		if(strip_tags($fields['counter']->content)==1){
			if(strip_tags($fields['field_course_lession']->content)==1){
				$_SESSION['course_lesstion']=1;
				$lession_title = "Module 1 : Idea development";
			}elseif(strip_tags($fields['field_course_lession']->content)==2){
				$_SESSION['course_lesstion']=2;
				$lession_title = "Module 2 : Model and Plan";
			}elseif(strip_tags($fields['field_course_lession']->content)==3){
				$_SESSION['course_lesstion']=3;
				$lession_title = "Module 3 : Take action";
			}elseif(strip_tags($fields['field_course_lession']->content)==4){
				$_SESSION['course_lesstion']=4;
				$lession_title = "Module 4 : Stepping to the next";
			}elseif(strip_tags($fields['field_course_lession']->content)==5){
				$_SESSION['course_lesstion']=5;
				$lession_title = "Hello!";
			}elseif(strip_tags($fields['field_course_lession']->content)==6){
				$_SESSION['course_lesstion']=6;
				$lession_title = "Are you ready?";
			}elseif(strip_tags($fields['field_course_lession']->content)==7){
				$_SESSION['course_lesstion']=7;
				$lession_title = "You better be prepared!";
			}elseif(strip_tags($fields['field_course_lession']->content)==8){
				$_SESSION['course_lesstion']=8;
				$lession_title = "Let's go (coaching)!";
			}elseif(strip_tags($fields['field_course_lession']->content)==9){
				$_SESSION['course_lesstion']=9;
				$lession_title = "Hoorah!";
			}elseif(strip_tags($fields['field_course_lession']->content)==10){
				$_SESSION['course_lesstion']=10;
				$lession_title = "More?";
			}else{
				$lession_title = "";
			}
		}else{
			$lession_title = "";
		}
	
		
	endif;
	if(!empty($lession_title)):
	print "<div class='course--content--headline'><h3 class='headline headline--thaisan'>".$lession_title."</h3></div>";
endif; 
?>

    <div class="course--content--row">
	<a href="<?php print strip_tags($fields['path']->content); ?>">
        <div class="col-xs-3"><div class="thumb "><?php print $fields['field_course_picture']->content; ?></div></div>
        
        <div class="col-xs-9">
        <h3 class='headline__thaisan'><?php print $fields['title']->content; ?></h3>
        <div class="sample--text__small detail--linelimit__3"><?php print $fields['body']->content; ?></div>
        </div>
	</a>
</div>

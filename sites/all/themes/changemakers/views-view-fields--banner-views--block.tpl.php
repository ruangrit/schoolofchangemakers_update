<?php 

	if(strip_tags($fields['field_banner_link']->content)){
		?>
		<a href="http://<?php print strip_tags($fields['field_banner_link']->content); ?>" target="_blank">
			<?php print $fields['field_banner_file']->content; ?>
		</a>
		<?php
	}else{
		print $fields['field_banner_file']->content;
	}
?>
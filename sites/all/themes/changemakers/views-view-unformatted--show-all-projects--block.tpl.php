<table class="views-table cols-5">
	<thead>
  		<tr>
  			<th class="views-field views-field-title" scope="col" >หัวข้อ</th>
			<th class="views-field views-field-title" scope="col" >รูปภาพ</th>
			<th class="views-field views-field-title" scope="col" >เนื้อหา</th>
			<th class="views-field views-field-title" scope="col" >วันที่</th>
			<th class="views-field views-field-title" scope="col" >การแก้ไข</th>
        </tr>
    </thead>
    <tbody>
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
    	
    </tbody>
</table>




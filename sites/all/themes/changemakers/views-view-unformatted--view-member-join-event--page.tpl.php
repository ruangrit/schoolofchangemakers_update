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
<table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($rows as $id => $row): ?>
		  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
			   <tr>
			    <?php print $row; ?>
			  </div>
		  </tr>
		<?php endforeach; ?>
    </tbody>
  </table>
	

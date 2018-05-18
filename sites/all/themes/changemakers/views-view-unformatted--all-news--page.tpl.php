<?php //var_dump(user_load($user->uid)); ?>
<!-- <div class="col-md-12 header_filter">
  	<div class="col-md-4 filter_padding_top">
  		FILTER BY TYPE
  		<span>
  			<select  class="selectpicker">
  				<option>All Problems</option>
  			</select>
  		</span>
  	</div>
  	
</div> -->

<div class="col-xs-12 news--page margin__top25 "> 
    <div class="row">

<h2 class="headline headline__alte">NEWS</h2>	
  <?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php foreach ($rows as $id => $row): ?>
    
    <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    
        
      <?php print $row; ?>
    
    </div>
  <?php endforeach; ?>
</div>
</div>
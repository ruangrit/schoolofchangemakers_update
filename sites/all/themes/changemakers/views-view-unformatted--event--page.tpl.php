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

<div class="col-xs-8 padding__topbot25 pad__left0"> 

<h3 class="headline headline__alte float__left">NEWS</h3>	<div class="sidebox--more"><a href="/news">View all <i class="glyphicon glyphicon-play-circle"></i></a></div>
  <?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php foreach ($rows as $id => $row): ?>
    
    <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    
        
      <?php print $row; ?>
    
    </div>
  <?php endforeach; ?>
</div>
<div class="col-xs-4 padding--news__topbot bg__gray2" >
    
    <h3 class="headline headline__alte float__left">EVENTS &amp; WORKSHOP</h3><div class="sidebox--more"><a href="/event-and-workshop">View all <i class="glyphicon glyphicon-play-circle"></i></a></div>
	<?php echo views_embed_view('event_block', $display_id = 'block'); ?>
    
</div>



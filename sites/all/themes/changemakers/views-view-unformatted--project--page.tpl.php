
        
  <table class="table table-hover">
   <!--  <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead> -->
    <tbody>
      
       <?php

      /**
       * @file
       * Default simple view template to display a list of rows.
       *
       * @ingroup views_templates
       */
      ?>
<div class=" page__topmargin"  >
<h2 class="headline headline__alte">PUBLIC PROJECTS <!-- : <span class="headline__small">All Interests</span> --></h2>
</div>
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
    

<!--<div class="wrap--btn--viewmore col-xs-12" style="margin:20px;">
    <button type="submit"  class="btn btn--submit">VIEW MORE <i class="glyphicon glyphicon-play-circle"></i></button>
</div>
    -->
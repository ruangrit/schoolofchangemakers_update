<?php 

    


    //print drupal_render(drupal_get_form('user_register')); 
    //$form = drupal_get_form('user_register_form');
    $elements = drupal_get_form("user_register_form"); 
	//$form = drupal_render($elements);
	//echo $form;

    //print "tong";
   
?>

<p><?php print render($intro_text); ?></p>
<div class="yourtheme-user-login-form-wrapper">
  <?php print drupal_render_children($elements); ?>
</div>


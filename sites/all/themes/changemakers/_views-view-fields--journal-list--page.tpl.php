<?php

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

<div class="journal--page">


<?php foreach ($fields as $id => $field): ?>

    
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
    <?php endif; ?>
    
    
    
<div  class="page1-4--hilight1--wrap" >
    <div  class="page1-4--hilight1" >
    <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
        
    <?php print $field->content; ?>
        
    <?php print $field->wrapper_suffix; ?>
    </div>
</div>
    
<div class="page1-4--hilight2--wrap" >
	<div  class="page1-4--hilight2" >
		<div class="thumbbox--wrap--img">
			-BANNER-
		</div>
        <div  id="moredetail__over"  class="field--content boxover">
		<!--<div class="knowledge-title" >-->
            <div class="detail__small d__inline-block">
                <a href="#" ><h4 class="headline__thaisan">Title</h4></a>
			
                
			
			<div id="moredetail__hide">
                
                
                   
                <span class="icon-clock txt__gray2"></span> 1 w.
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                <span class=" icon-tag txt__gray2"></span>  <a href="#" >Case Study</a>
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                
                 <span class=" icon-target txt__gray2"></span> <a href="#">Target</a>
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                 <a href="#"><p class="moredetail__over__content">- Sample Content -</p></a>
               
            </div>
        
		</div>
	</div>
    </div>
    
    <div  class="page1-4--hilight2" >
		<div class="thumbbox--wrap--img">
			-BANNER-
		</div>
        <div  id="moredetail__over"  class="field--content boxover">
		<!--<div class="knowledge-title" >-->
            <div class="detail__small d__inline-block">
                <a href="#" ><h4 class="headline__thaisan">Title</h4></a>
			
                
			
			<div id="moredetail__hide">
                
                
                   
                <span class="icon-clock txt__gray2"></span> 1 w.
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                <span class=" icon-tag txt__gray2"></span>  <a href="#" >Case Study</a>
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                
                 <span class=" icon-target txt__gray2"></span> <a href="#">Target</a>
                <?php print $fields['field_knowledge_type']->content;?> <br/>
                
                 <a href="#"><p class="moredetail__over__content">- Sample Content -</p></a>
               
            </div>
        
		</div>
	</div>
    </div>
    
</div>
    
<?php endforeach; ?>
    
</div>
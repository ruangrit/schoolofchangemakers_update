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






//print $fields['forums']->content;


// $nid = strip_tags($fields['nid']->content);
// $node = node_load($nid);
// print_r($node);

//$node = node_load($row->nid);
// $d = date('d',$node->created);
// $m = intval(date('m',$node->created));
// $y = date('Y',$node->created)+543;
// $month = array('','มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');

// $user = user_load($row->_field_data['nid']['entity']->uid);
//global $user;
// print '<pre>';
// print_r( $row);
// print '</pre>';

// $body = $row->_field_data['nid']['entity']->body['und'][0]['value'];

// //print $user->picture;
// if($node->field_knowledge_problem!=null){
// 	foreach ($node->field_knowledge_problem['und'] as $key => $item) {
// 		if($key==0){
// 			$problem = taxonomy_term_load($item['tid'])->name;
			
// 		}else{
// 			$problem .= ', '.taxonomy_term_load($item['tid'])->name;
// 		}
		
// 	}
// }
// if($node->field_knowledge_target!=null){
// 	foreach ($node->field_knowledge_target['und'] as $key => $item) {
// 		if($key==0){
// 			$target = taxonomy_term_load($item['tid'])->name;
			
// 		}else{
// 			$target .= ', '.taxonomy_term_load($item['tid'])->name;
// 		}
		
// 	}
// }
session_start();


if($row->nid){
    if(isset($_SESSION['page_knowledge'])){
        if($_SESSION['page_knowledge'] > 8){
            $_SESSION['page_knowledge'] = 1;
        }
        else{
            $_SESSION['page_knowledge'] = $_SESSION['page_knowledge']+1;
        }
    }
    else{
        $_SESSION['page_knowledge'] = 1;
    }
}
$problem = explode("All,", strip_tags($fields['field_knowledge_problem']->content));
$target = explode("All,", strip_tags($fields['field_knowledge_target']->content));



//$counter_knowledge = $_SESSION['page_knowledge'];

$counter_knowledge = strip_tags($fields['counter']->content);

$box =  ($counter_knowledge%9); 
?>

<div class="knowledge--page">
<?php if($box == 1){?>   
<div  class="page1-4--hilight1--wrap" >
	<div  class="page1-4--hilight1" >
		<div class="thumb">
			<?php print $fields['field_knowledge_image']->content; ?>
		</div>
       
		<!--<div class="knowledge-title" >-->
        <div class="detail__title d__inline-block" >
            <a class="knowledge--title-top" href="<?php print strip_tags($fields['path']->content); ?>">

                <div class="h2--linelimit__2">
                    <h2 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h2>
                </div>
            </a>
        </div>

       
        
            <a class="knowledge--title-top " href="<?php print strip_tags($fields['path']->content); ?>">
            <div class="field--content">
            <div class="block--knowledge--more field--content">           
                <div class="detail__medium d__inline-block">
                    
                    <div class="tag--linelimit__1 ">
                    <?php if(strip_tags($fields['field_knowledge_date']->content)!=""): ?>
                    <span class="icon-clock txt__gray2"></span>                    
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                    <?php endif; ?>
                    </div>

                <?php // print $fields['field_knowledge_type']->content; ?><!-- <br />-->
                 <?php  if($problem[0]) :?>
               
                    <div class="tag--linelimit__1 ">
                    <span class=" icon-tag txt__gray2"></span>
                    <?php print $problem[0]; print $probelm[1]; ?>
                    </div>
                
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                    <div class="tag--linelimit__1 ">
                    <span class=" icon-target txt__gray2"></span> 
                    <?php print $target[0]; print $target[1]; ?>                        
                    </div>
                
                <?php endif; ?>
                </div>
                <div class="moredetail__over__content detail--linelimit__2" ><?php print $fields['body']->content; ?></div>
                </div>
                </div>
                
            </a>
		
        
  
    </div>
</div>
<?php } ?>
<?php if($box == 2){ ?>    
<div class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php print $fields['field_knowledge_image']->content; ?>
        </div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            <a class="knowledge--title-top" href="<?php print strip_tags($fields['path']->content); ?>">
               
                <div class=" d__inline-block">
                        <h4 class="headline__thaisan h4--linelimit__2">
                        <?php print strip_tags($fields['title']->content); ?>
                        </h4>
                </div>
                <div class="detail__medium d__inline-block">          
                <div id="moredetail__hide">
                    
                <?php if(strip_tags($fields['field_knowledge_date']->content)!=""): ?>
                     <div class="tag--linelimit__1 ">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                    </div>
                <?php endif; ?>
                    
                <?php  if($problem[0]): ?>
                <div class="tag--linelimit__1 ">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                    
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                    
                <div class="tag--linelimit__1 ">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                    </div>
                    
                <?php endif; ?>
                
                <div class="moredetail__over__content ">
                    <div class="detail--linelimit__2">
                    <?php echo $fields['body']->content; ?>
                    </div>
                </div>
                </div></div>
            </a>

        </div>
    </div>
</div>
<?php }else if($box == 3){ ?>
<div class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php print $fields['field_knowledge_image']->content; ?>
        </div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            <a class="knowledge--title-top" href="<?php print strip_tags($fields['path']->content); ?>">
               
                <div class=" d__inline-block">
                        <h4 class="headline__thaisan h4--linelimit__2">
                        <?php print strip_tags($fields['title']->content); ?>
                        </h4>
                </div>
                <div class="detail__medium d__inline-block">          
                <div id="moredetail__hide">
                    
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 ">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                    </div>
                <?php endif; ?>
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 ">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                    
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                    
                <div class="tag--linelimit__1 ">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                    </div>
                    
                <?php endif; ?>
                
                <div class="moredetail__over__content">
                    <div class="detail--linelimit__2">
                    <?php print $fields['body']->content; ?>
                    </div>
                </div>
                </div></div>
            </a>

        </div>
    </div>
</div>

<?php } ?>


<?php if($box == 4){ ?>
<div class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php print $fields['field_knowledge_image']->content; ?>
        </div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            <a class="knowledge--title-top" href="<?php print strip_tags($fields['path']->content); ?>">
               
                <div class=" d__inline-block">
                        <h4 class="headline__thaisan h4--linelimit__2">
                        <?php print strip_tags($fields['title']->content); ?>
                        </h4>
                </div>
                <div class="detail__medium d__inline-block">          
                <div id="moredetail__hide">
                    
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 ">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                    </div>
                <?php endif; ?>
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 ">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                    
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                    
                <div class="tag--linelimit__1 ">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                    </div>
                    
                <?php endif; ?>
                
                <div class="moredetail__over__content "><div class="detail--linelimit__2">
                    <?php print $fields['body']->content; ?>
                    </div>
                </div>
                </div></div>
            </a>

        </div>
    </div>
</div>

<?php }else if($box == 5){ ?>
<div class="page1-4--hilight2--wrap" >
    <div  class="page1-4--hilight2" >
        <div class="thumb">
            <?php print $fields['field_knowledge_image']->content; ?>
        </div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            <a class="knowledge--title-top" href="<?php print strip_tags($fields['path']->content); ?>">
               
                <div class=" d__inline-block">
                        <h4 class="headline__thaisan h4--linelimit__2">
                        <?php print strip_tags($fields['title']->content); ?>
                        </h4>
                </div>
                <div class="detail__medium d__inline-block">          
                <div id="moredetail__hide">
                    
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 ">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                    </div>
                <?php endif; ?>
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 ">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                    
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                    
                <div class="tag--linelimit__1 ">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                    </div>
                    
                <?php endif; ?>
                
                <div class="moredetail__over__content">
                    <div class="detail--linelimit__2">
                    <?php print $fields['body']->content; ?>
                    </div>
                </div>
                </div></div>
            </a>

        </div>
    </div>
</div>

    <div class="clear row"></div>
<?php } ?>   
    
    
<?php if($box == 6){ ?>
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php print $fields['field_knowledge_image']->content; ?>
		</div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            
            <div class="detail__small__nopad d__inline-block">
            
		    <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h4></div>
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 margin__top5 link__gray">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                </div>
                <?php endif; ?>
                
                
                <div id="moredetail__hide">
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 link__gray">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                <div class="tag--linelimit__1  link__gray">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                </div>
                <?php endif; ?>
                <div class="moredetail__over__content detail__medium detail--linelimit__4"><?php print $fields['body']->content; ?></div>
                </div>
                
            </a>    
                          
       </div>
	    </div>

</div>

</div>
    
<?php }else if($box == 7){ ?>
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php print $fields['field_knowledge_image']->content; ?>
		</div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            
            <div class="detail__small__nopad d__inline-block">
            
		    <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h4></div>
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 margin__top5 link__gray">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                </div>
                <?php endif; ?>
                
                
                <div id="moredetail__hide">
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 link__gray">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                <div class="tag--linelimit__1  link__gray">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                </div>
                <?php endif; ?>
                <div class="moredetail__over__content detail__medium detail--linelimit__4"><?php print $fields['body']->content; ?></div>
                </div>
                
            </a>    
                          
       </div>
	    </div>

</div>

</div>
    
<?php }else if($box == 8){ ?>   
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php print $fields['field_knowledge_image']->content; ?>
		</div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            
            <div class="detail__small__nopad d__inline-block">
            
		    <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h4></div>
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 margin__top5 link__gray">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                </div>
                <?php endif; ?>
                
                
                <div id="moredetail__hide">
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 link__gray">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                <div class="tag--linelimit__1  link__gray">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                </div>
                <?php endif; ?>
                <div class="moredetail__over__content detail__medium detail--linelimit__4"><?php print $fields['body']->content; ?></div>
                </div>
                
            </a>    
                          
       </div>
	    </div>

</div>

</div>
    
<?php }else if($box == 0){ ?>    
<div class="col-xs-3 box__pad6" >
<div  class="page1-4--box" >
		<div class="thumb">
			<?php print $fields['field_knowledge_image']->content; ?>
		</div>
        <div  id="moredetail__over"  class="block--knowledge--more field--content boxover">
            
            <div class="detail__small__nopad d__inline-block">
            
		    <a href="<?php print strip_tags($fields['path']->content); ?>">
                <div class="h4--linelimit__2"><h4 class="headline__thaisan"><?php print strip_tags($fields['title']->content); ?></h4></div>
                <?php if(strip_tags($fields['field_knowledge_date']->content)!="") :?>
                     <div class="tag--linelimit__1 margin__top5 link__gray">
                    <span class="icon-clock"></span> 
                    <?php print timeAgo(strip_tags(str_replace("(All day)", "", $fields['field_knowledge_date']->content))); ?>
                </div>
                <?php endif; ?>
                
                
                <div id="moredetail__hide">
                    
                <?php  if($problem[0]) :?>
                <div class="tag--linelimit__1 link__gray">
                    <span class="icon-tag"></span> 
                    <?php print $problem[0]; print $probelm[1]; ?>
                </div>
                <?php endif; ?>
                
                <?php  if($target[0]) :?>
                <div class="tag--linelimit__1  link__gray">
                    <span class="icon-target"></span>
                    <?php print $target[0]; print $target[1]; ?>
                </div>
                <?php endif; ?>
                <div class="moredetail__over__content detail__medium detail--linelimit__4"><?php print $fields['body']->content; ?></div>
                </div>
                
            </a>    
                          
       </div>
	    </div>

</div>

</div>
        
 <?php } ?>   
  </div>  

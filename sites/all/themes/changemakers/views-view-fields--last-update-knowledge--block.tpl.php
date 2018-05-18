
	<?php

    $problem = explode("All,", strip_tags($fields['field_knowledge_problem']->content));
     

		//dpm($fields);
		//echo $fields['nid'];
		//print print_r(array_keys($fields));
		//print $output;
		$nid = strip_tags($fields['nid']->content);
		// print $fields['nid']->content;
		// print $fields['field_knowledge_image']->content;
		// print $fields['title']->content;
		// print $fields['body']->content;
		//$node= node_load($nid);
		//$promote = $node->promote;
    
	if(strip_tags($fields['counter']->content) =="1"){
		//print_r($node);

		$aff_link =$fields['view_node']->content;
		$s = preg_match('%<a ([^>]+)?href="(.*)"([^>]+)?>(.*)</a>%', $aff_link, $matches);
		$url = $matches[2];
        echo "<a href='".strip_tags($fields['path']->content)."'>";
		echo "<div class='col-xs-5 '><div class='knowledge--promote col-xs-12'>
        <div id='promothightlight'>
        <div class='field  field-type-image field-label-hidden'>
        
        <div class='field-items'><div class='field-item even '>
        <div class='thumb'>";
        print $fields['field_knowledge_image']->content;
        
        
        echo " </div></div> </div></div></div>";
          
		echo  "<div class='field--content col-xs-12'>
        <div class='margin__top5'>
        <h2 class='headline__thaisan'><div class='h2--linelimit__3'>".$fields['title']->content."</div></h2>
        </div>";
        
        //echo "<p class='sample--text__mid linelimit__3'>";
		//print $fields['body']->content;
        //echo "</p>";
        
        echo "<div class='detail__small link__gray__a'>
            <div class='tag--linelimit__1'>";
            if(!empty($problem[0]) || !empty($problem[1])): 
            echo " <span class='icon-tag txt__gray2'></span> ";
        
        print " <span  class='link__blue'>".strip_tags($problem[0])."".strip_tags($problem[1])."</span></div>";
        endif; 
        
       echo "<span class='icon-clock txt__gray2'></span> ";
        print "<span>".timeAgo(strip_tags($fields['created']->content))."</span>";
        echo "</div>";
        echo "</div></div></div>";
        echo "</a>";
        
        

       

	}else{
        echo "<a href='".strip_tags($fields['path']->content)."'>";
        echo "<div class='knowledge--subbox' >";
		echo "<div id='lastnewssub' class='knowledge--last col-xs-12' >";
        
		echo "<div class='col-xs-5 ' >

            <div class='field field-type-image field-label-hidden '>
                <div class='field-items'>
                    <div class='field-item even '>
                    <div class='thumb'>";
        
					print $fields['field_knowledge_image']->content;
                    
		echo " </div></div></div></div></div>";
        
		echo "<div class='col-xs-7 field--knowledge'><h4 class='headline__thaisan'><div class='h4--linelimit__2'>";
		echo $fields['title']->content;
        echo "</div></h4>";
        
        //echo "<div><a href='/knowledge/".strip_tags($fields['nid']->content)."'>";   
        //echo " <p class='sample--text__small'>";
        //echo $fields['body']->content;
       	//echo "</p>";  
          
        echo    "<div class='detail__small link__gray__a'><div class='tag--linelimit__1 '>";
        if(!empty($problem[0]) || !empty($problem[1])): 
        echo    "<span class='icon-tag txt__gray2'></span>  <span   class='link__blue'>";
        print   $problem[0]."".$problem[1]."</span></div>";
       echo    "<div class='tag--linelimit__1'> ";
       endif; 

        // $d1 = new DateTime();
        // $t1 = $d1->getTimestamp();
        // echo date_timestamp_get($t1);
       print   "<span class='icon-clock txt__gray2'> ".timeAgo(strip_tags($fields['created']->content))."</span>";
        echo "</div>";
        
        //echo "</div>";
        echo    "</div>";
        			
        echo    "</div>";
        
		echo    "</div>";
        echo "</div>";
        echo "</a>";
        
  
        
        
	} 


?>


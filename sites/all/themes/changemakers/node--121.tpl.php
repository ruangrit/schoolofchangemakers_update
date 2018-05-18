<?php 
$text  = strip_tags($_GET['search']);
$problem_tid = explode(",",!empty($_GET['tax_problem'])?$_GET['tax_problem']:"");
$target_id = explode(",",!empty($_GET['tax_target'])?$_GET['tax_target']:"");
$sort = !empty($_GET['sort'])?$_GET['sort']:"DESC";

if($problem_tid[0] == ""){
    unset($problem_tid[0]);
}
if($target_id[0] == ""){
    unset($target_id[0]);
}

    // echo "<pre>";
    // print_r($text);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($problem_tid);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($target_id);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($sort);
    // echo "</pre>";

if(isset($_GET['search'])){
	//search knowledge
	$knowledge= changemakers_get_search_konwledge($text,$problem_tid,$target_id,$sort);
	$projects = changemakers_get_search_project($text,$problem_tid,$target_id,$sort);
	$news = changemakers_get_search_news($text,$problem_tid,$target_id,$sort);
	$event = changemakers_get_search_event($text,$problem_tid,$target_id,$sort);
      // echo "<pre>";
      //   print_r($news);
      //   echo "</pre>";
    //  echo "<pre>";
    // print_r($news);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($event);
    // echo "</pre>";
    $news_event = array();
    if(count($news) > 2 && count($event) > 2){
        $news_event[0] = $news[0];
        $news_event[1] = $news[1];
        $news_event[2] = $event[0];
        $news_event[3] = $event[1];
    }
    else if(empty($news) && !empty($event) && count($event) == 2){
        $news_event[0] = $event[0];
        $news_event[1] = $event[1];
    }
    else if(empty($news) && !empty($event) && count($event) == 1){
        $news_event[0] = $event[0];
    }
    else if(count($news) == 1 && !empty($event) && count($event) == 1){
        $news_event[0] = $news[0];
        $news_event[1] = $event[0];
    }
    else if(count($news) == 1 && !empty($event) && count($event) == 2){
        $news_event[0] = $news[0];
        $news_event[1] = $event[0];
        $news_event[2] = $event[1];
    }
    else if(count($news) == 1 && !empty($event) && count($event) > 2){
        $news_event[0] = $news[0];
        $news_event[1] = $event[0];
        $news_event[2] = $event[1];
        $news_event[3] = $event[2];
        
    }
    else if(count($news) == 2 && !empty($event) && count($event) > 2){
        $news_event[0] = $news[0];
        $news_event[1] = $news[1];
        $news_event[2] = $event[0];
        $news_event[3] = $event[1];
    }
    else if(count($news) == 2 && !empty($event) && count($event) == 2){
        $news_event[0] = $news[0];
        $news_event[1] = $news[1];
        $news_event[2] = $event[0];
    }
    else if(count($news) == 2 && !empty($event) && count($event) == 1){
        $news_event[0] = $news[0];
        $news_event[1] = $news[1];
    }
    else if(count($news) == 0 &&  count($event) > 3){
        $news_event[0] = $event[0];
        $news_event[1] = $event[1];
        $news_event[2] = $event[2];
        $news_event[3] = $event[3];
    }

	$user_community = changemakers_get_search_user($text,$problem_tid,$target_id,$sort);
	$problem = changemakers_getListTaxonomy(4);
	$target = changemakers_getListTaxonomy(5);

  

     // echo "<pre>";
     //    print_r($user_community);
     //    echo "</pre>";

    

	?>
    <div class="view-filters clearfix">
        <form ffpdm="xl8dtlnzqfg76uqkg0iid" class="ctools-auto-submit-full-form ctools-auto-submit-processed" action="/search" method="get" id="views-exposed-form-project-page" accept-charset="UTF-8">
            <div>
                <!-- THEME DEBUG -->
                <!-- CALL: theme('views_exposed_form') -->
                <!-- BEGIN OUTPUT from 'sites/all/themes/changemakers/views-exposed-form.tpl.php' -->
                <input type="hidden" name="search" value="<?php echo !empty($_GET['search'])?$_GET['search']:""; ?>">
                <input type="hidden" name="tax_problem" value="<?php echo !empty($_GET['tax_problem'])?$_GET['tax_problem']:""; ?>">
                <input type="hidden" name="tax_target" value="<?php echo !empty($_GET['tax_target'])?$_GET['tax_target']:""; ?>">
                <div class="views-exposed-form col-xs-12">
                    <div class="views-exposed-widgets ">
                        <div id="edit-field-knowledge-type-tid-wrapper" class="views-exposed-widget views-widget-filter-field_knowledge_type_tid">
                            <label for="edit-field-knowledge-type-tid">
                                SORT BY </label>
                            <div class="views-widget">
                                <div class="form-item form-item-field-knowledge-type-tid form-type-select form-group">
                                    <select data-original-title="Leave blank for all. Otherwise, the first selected term will be the default instead of &quot;Any&quot;." ffpdm="r93yb6f1v4chbo9ogvgrr" class="form-control form-select" title="" data-toggle="tooltip" id="search-sort" name="sort">
                                        <option value="DESC" <?php echo $sort=="DESC"?"selected='selected'":""; ?> >Newest First</option>
                                        <option value="ASC" <?php echo $sort=="ASC"?"selected='selected'":""; ?>>Oldest First</option>
                                    </select>
                                </div>
                            </div>	
                        </div>
                        <div id="edit-field-knowledge-problem-tid-wrapper" class="views-exposed-widget views-widget-filter-field_knowledge_problem_tid">
                            <label for="edit-field-knowledge-problem-tid">
                                FILTER BY PROBLEM </label>
                            <div class="views-widget">
                                <div class="form-item form-item-field-knowledge-problem-tid form-type-select form-group">
                                    <select multiple="multiple"  class="form-control form-select" title="" id="search-edit-field-knowledge-target-tid">
                                        
                                        <?php 
                                    		foreach ($problem as $key => $value) {
                                                if($value->name != "All" ){
                                        			$selected = !empty(in_array($value->tid, $problem_tid))?"selected='selected'":"";
                                        			echo "<option class='bold--text--search' value='$value->tid' $selected> $value->name </option>";
        											$tid = $value->tid;
        											$parend = changemakers_getListSubTaxonomy($tid);
        											foreach ($parend as $key2 => $value2) {
                                                    
        												$selected = !empty(in_array($value2->tid, $problem_tid))?"selected='selected'":"";
        												echo "<option value='$value2->tid' $selected>  $value2->name</option>";
                                                    }
    											}
    										}
    										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="edit-field-knowledge-target-tid-wrapper" class="views-exposed-widget views-widget-filter-field_knowledge_target_tid">
                            <label for="edit-field-knowledge-target-tid">
                                FILTER BY TARGET </label>
                            <div class="views-widget">
                                <div class="form-item form-item-field-knowledge-target-tid form-type-select form-group">
                                    <select multiple="multiple" data-original-title="Leave blank for all. Otherwise, the first selected term will be the default instead of &quot;Any&quot;." ffpdm="dyeqofwcqcmg88ty0upfq" class="form-control form-select" title="" data-toggle="tooltip" id="search-edit-field-knowledge-problem-tid">
                                        
                                       <?php 
                                    		foreach ($target as $key => $value) {
                                                if($value->name != "All" && $value->tid != 109){
                                                    $selected = !empty(in_array($value->tid, $target_id))?"selected='selected'":"";
                                                    echo "<option value='$value->tid' $selected> $value->name </option>";
                                                    $tid = $value->tid;
                                                    $parend = changemakers_getListSubTaxonomy($tid);
                                                    foreach ($parend as $key2 => $value2) {
                                                    
                                                        $selected = !empty(in_array($value2->tid, $target_id))?"selected='selected'":"";
                                                        echo "<option value='$value2->tid' $selected>  $value2->name</option>";
                                                    }
                                                }
    										}
    										?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="views-exposed-widget views-submit-button">
                            <button class="ctools-use-ajax ctools-auto-submit-click js-hide btn btn-info form-submit" type="submit" id="edit-submit-knowledge" name="" value="Apply">Apply</button>
                        </div>
                    </div>
                </div>
                <!-- END OUTPUT from 'sites/all/themes/changemakers/views-exposed-form.tpl.php' -->


            </div>
        </form>    
    </div>

    <div class="page__topmargin col-xs-12 pad0 search--page">
	<h2 class="headline headline__alte  ">SEARCH RESULT</h2>
<div class="margin__top5">
	<div class="col-xs-4 total--left pad0">
        <span class="hilight txt__black"><?php print count($knowledge)+count($projects)+count($news)+count($event)+count($user_community); ?> </span> <?php if(count($knowledge)+count($projects)+count($news)+count($event)+count($user_community) < 1){ print "Result for";}else{ print "Results for";} ?> <span class="hilight txt__black">'<?php print $_GET['search']; ?>'</span> in website
    </div>
        
	<div class="col-xs-8 total--right pad0">
        ผลการค้นหา : <span class="hilight"><a href="#knowledge"><?php print count($knowledge); ?></a> Knowledge </span> | <span class="hilight"><a href="#project"><?php print count($projects); ?></a> <?php if(count($projects) < 2){print "Project";}else{print "Projects";} ?> </span> | <span class="hilight"><a href="#news"><?php print count($news)+count($event); ?></a> <?php if(count($news)+count($event) < 2){ ?> News&amp;Event <?php }else{  ?> News&amp;Events <?php } ?></span> |  <span class="hilight"><a href="#commu"><?php print count($user_community); ?></a> People</span>
    </div>
    
    <div class="viewmore--line row col-xs-12"></div>
    </div>     
</div>


    <div class="row margin__top15 ">
     
        
   
        
	
   
    

    <div class="col-xs-12 margin__top10 knowledge--page">    
		<h2 class="headline headline__alte" id="knowledge">KNOWLEDGE</h2>
        <?php if(count($knowledge)==0) : ?>
            <p>ไม่พบคำค้นหาที่เกี่ยวข้องในหมวด 'Knowledge'</p>
        <?php endif; ?>
        <?php if(count($knowledge)>0) : ?>
		<?php
        $count = 0;
		foreach ($knowledge as $key => $value) {
            $count++ ;
            if($count <= 4){ ?>
			<div class="col-xs-3 box__pad6">
                <a href="/knowledge/<?php print $value['nid']; ?>">
                <div class="page1-4--box">
			    
			      <div class="thumb">
                      <img  src="<?php print $value['picture'];?>">
			      </div>
                    
                <div id="moredetail__over"  class="field--content boxover">
                    <div class="h4--linelimit__2 title">
			          <h4 class="headline__thaisan">
			          <?php print $value['title'];?>
			          </h4>
			         </div>
			         <div class="detail__small d__inline-block">
                    <span class="icon-clock txt__gray2"></span> <?php print $value['date'];?> 
                   <!--  <span class=" icon-tag txt__gray2"></span> <?php //print $value['problems']; ?> <br>
                    <span class=" icon-target txt__gray2"></span> <?php //print $value['targets']; ?> -->
                    </div>
                    
                
                <div id="moredetail__hide" class=" detail__medium">
                    <div class="detail--linelimit__4"><?php print $value['body'];?></div>
                </div>
                </div> 
                
			    </div> 
                </a>
			</div>	
        
        
		<? } }  ?>
<!--         $text  = strip_tags($_GET['search']);
$problem_tid = !empty($_GET['problem'])?$_GET['problem']:"";
$target_id = !empty($_GET['target'])?$_GET['target']:"";
$sort = !empty($_GET['sort'])?$_GET['sort']:""; -->
        <?php if(count($knowledge)>4){ ?>
            <div class="viewmore--line row col-xs-12">
                <a href="/search-result?search=<?php echo $text; 
                if(count($problem_tid) != 0){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid) .'&tax_target=All'; }
                else if(count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem=All&tax_target='.implode(',', $target_id); }
                else if(count($problem_tid) != 0 && count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid).'&tax_target='.implode(',', $target_id); } ?>&type=knowledge" class="viewmore--btn row">VIEW ALL RELATED ARTICLES <i class="glyphicon glyphicon-play-circle"></i>
                </a>
            </div>
        <?php } ?>
        <?php endif; ?>
	</div>

    
    <div class="col-xs-12 margin__top30 project--searchpage" >
		<h2 class="headline headline__alte " id="project">PROJECT</h2>
        <?php if(count($projects) == 0) : ?>
            <p>ไม่พบคำค้นหาที่เกี่ยวข้องในหมวด 'Project'</p>
        <?php endif; ?>
        <?php if(count($projects)>0) : ?>
		<?php
		foreach ($projects as $key => $value) { ?>
			<div class="col-xs-3 box__pad6">
			    <a href="/project/<?php print $value['nid']; ?>">
                <div class="page1-4--box">
			      <div class="thumb">
			           <img src="<?php print $value['picture'];?>">
			      </div>
			    
                <div id="moredetail__over"  class="field--content boxover">
                    <div class="h4--linelimit__2 title">
			          <h4 class="headline__thaisan">
			          <?php print $value['title'];?>
			          </h4>
			         </div>
                    
			         <div class="detail__small d__inline-block">
                         <div class="tag--linelimit__1"><span class="icon-clock txt__gray2"></span> <?php print $value['date'];?> </div>
                         <div class="tag--linelimit__1"><span class="icon-profile-verify member--verify"></span> <?php print $value['username'];?> </div>
                    <!-- <span class=" icon-tag txt__gray2"></span> <?php //print $value['problems']; ?> <br>
                    <span class=" icon-target txt__gray2"></span> <?php //print $value['targets']; ?> -->
                    </div>
                    
                    
                    <div id="moredetail__hide" class=" detail__medium">
                        <div class="detail--linelimit__4">
                        <?php print $value['body']; ?>
                        </div>
                    </div>
			        
			    </div>
                    
                </div>
                </a>
			</div>
        
        
        
		<? } ?>
        <?php endif; ?>
        <!-- <div class="viewmore--line row col-xs-12"><a href="/projects/list" class="viewmore--btn row">VIEW ALL RELATED ARTICLES <i class="glyphicon glyphicon-play-circle"></i></a></div> -->
	</div>
	

	
    <div class="col-xs-12 margin__top30">
		<h2 class="headline headline__alte " id="news">NEWS&amp;EVENT</h2>

        <?php 
        if(count($news_event) == 0 ){
            print "<p>ไม่พบคำค้นหาที่เกี่ยวข้องในหมวด 'News&Event'</p>";
        }
        // print_r(count($news));
        // print_r(count($event));
        if(count($news_event) > 0 ){ ?>
    		<?php
    		foreach ($news_event as $key => $value) { ?>
            
            <div class="col-xs-3 box__pad6 newsevent--page">
                    <a href="<?php print $value['path']; ?>">
                    <div class="page1-4--box">    
                      <div class="thumb">
                           <img  src="<?php print $value['picture'];?>">
                      </div>
                    
                        
                    <div id="moredetail__over"  class="field--content boxover">
                        <div class="h4--linelimit__2 title">
                          <h4 class="headline__thaisan">
                          <?php print $value['title'];?>
                          </h4>
                         </div>
                        
                       <div class="detail__small d__inline-block">
                             
                           <div class="tag--linelimit__1"><span class="icon-book-open txt__gray2"></span> <?php print $value['type']; ?> </div>
                           <div class="tag--linelimit__1"><span class="icon-clock txt__gray2"></span> 
                        <?php                 
                            print $value['date'];     
                        ?></div>
                        </div>
                        
                        
                        <div id="moredetail__hide" >
                            <div class="detail--linelimit__4 detail__medium">
                            <?php print $value['body'] ?>
                            </div>
                        </div>
                     </div>
                        </div>
                    
                    </a>
            </div>
            
    		<? } /*
    		foreach ($event as $key => $value) { ?>
    			<div class="col-xs-3 box__pad6 newsevent--page">
    			    <a href="/event/<?php print $value['nid']; ?>">
                    <div class="page1-4--box">    
    			      <div class="thumbbox--wrap--img">
    			           <img width="150" src="<?php print $value['picture'];?>">
    			      </div>
                    
                        
    			    <div id="moredetail__over"  class="field--content boxover">
                        <div class="h4--linelimit__2 title">
    			          <h4 class="headline__thaisan">
    			          <?php print $value['title'];?>
    			          </h4>
    			         </div>
                        
    			       <div class="detail__small d__inline-block">
                             
                        <span class="icon-book-open txt__gray2"></span> Event <br>     
                        <span class="icon-clock txt__gray2"></span> 
    			        <?php 		          
    			            print $value['date'];     
    			        ?>
                        </div>
                        
                        <br>
                        <div id="moredetail__hide"><?php print $value['body'] ?></div>
    			     </div>
                        </div>
                    
    				</a>
    			</div>
            
    		<? } */?>
            <?php if(count($news_event) >= 4){ ?>
            <div class="viewmore--line row col-xs-12">
                <a href="/search-result?search=<?php echo $text; 
                if(count($problem_tid) != 0){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid).'&tax_target=All'; }
                else if(count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem=All&tax_target='.implode(',', $target_id); }
                else if(count($problem_tid) != 0 && count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid).'&tax_target='.implode(',', $target_id); } ?>&type=news-event" class="viewmore--btn row">VIEW ALL RELATED NEWS EVENTS <i class="glyphicon glyphicon-play-circle"></i>
                </a>
            </div>
            <?php } ?>
        <?php } ?>
	</div>
	
	
	<div class="col-xs-12 margin__top30 commu--searchpage">
		<div><h2 class="headline headline__alte " id="commu">COMMUNITY</h2></div>
        <?php if(count($user_community) == 0) : ?>
            <p>ไม่พบคำค้นหาที่เกี่ยวข้องในหมวด 'People'</p>
        <?php endif; ?>
        <?php if(count($user_community)>0) : ?>
		<?php
        $count_user = 0;
		foreach ($user_community as $key => $value) {
            if($count_user < 4){ ?>
            <div class="col-xs-3 box__pad6">
    			
    			<a href="/user/<?php print $value['uid']; ?>">
                    <div class="page1-4--box">   
                        <div class="thumb">
        			      <div class="cir--thumb__50">
        			           <img  src="<?php print $value['picture'];?>">
        			      </div>
                        </div>    
                        
                        <div class="detail">
                          
                            <div class="tag--linelimit__q">
        			          <?php print $value['name'];?> <?php print changemaker_check_icon_um($value['uid']);  ?>
        			        </div>
                            
                            <?php if(!empty($value['project'])){ ?>
                                <span class="txt__gray detail__small">Project</span>
                                <div class="tag--linelimit__1">
                			        <?php 		          
                			            print $value['project'][0]['title'];        
                			        ?>
                                </div>
                            <?php } ?>
                            
                            <span class="txt__gray detail__small">Interest</span>
                            <div class="tag--linelimit__1">
            			        <?php 		          
            			            print $value['interest'];     
            			        ?>
                            </div>
        			    
        			    </div>    
                    </div>   
    		    </a>
            </div>	
    		<? }
            $count_user++;
        } 
        // print "<pre>";
        // print_r($problem_tid);
        // print "</pre>";


        ?>
        <?php if(count($user_community) >= 4){ ?>
            <div class="viewmore--line row col-xs-12">
                <a href="/search-result?search=<?php echo $text; 
                if(count($problem_tid) != 0 && $problem_tid[0] != "" ){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid).'&tax_target=All'; }
                else if(count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem=All&tax_target='.implode(',', $target_id); }
                else if(count($problem_tid) != 0 && count($target_id) != 0){ echo '&sort='.$sort.'&tax_problem='.implode(',', $problem_tid).'&tax_target='.implode(',', $target_id); } ?>&type=user-community" class="viewmore--btn row">VIEW ALL RELATED COMMUNITY <i class="glyphicon glyphicon-play-circle"></i>
                </a>
            </div>
        <?php } ?>
        <?php endif; ?>
    </div>

</div>
<?php 

}
//print $text;

?>
<script >
(function($) {
    $(document).ready(function(){
        var taxonomy_forums_tid = '<?php echo $taxonomy_forums_tid; ?>';        
        if(taxonomy_forums_tid!=""){
            $('.txt__gray2').attr('href','/node/add/forum?taxonomy-forums-tid='+taxonomy_forums_tid);
        }
     // $('#edit-field-target-interest-tid').multiselect();
      $('[multiple="multiple"]').multiselect();
      //var role = $('#check_role').val();
      //console.log("role=",role);
      // if(role == 1){
      //    $('#edit-taxonomy-forums-tid-wrapper').css('display','block');
      // }
      // else{
      //    $('#edit-taxonomy-forums-tid-wrapper').css('display','none');
      // }
      
       //$('#edit-taxonomy-forums-tid-wrapper').css({"display": "none !important"});
       //$('[multiple="multiple"]').multiselect();
       //$('#edit-field-knowledge-target-tid').multiselect();
    });   

}(jQuery));
</script>



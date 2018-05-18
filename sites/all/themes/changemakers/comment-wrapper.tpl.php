
<style type="text/css">
  #edit-comment-body-und-0-format--3{
    display: none;
  }
  #edit-comment-body-und-0-format--5{
    display: none;
  }

  .filter-wrapper .form-inline .panel .panel-default .form-wrapper{
    display: none;
  }
  .filter-list .input-sm .form-control .form-select .filter-list-processed{
    display: none;
  }
  .grippie{
    display: none;
  }
</style>
<?php global $user;
$user_data= user_load($user->uid);
//drupal_get_form('comment_form', array('nid' => 66));

$comment = new stdClass;
$comment->nid = $node->nid;
$form_data = drupal_get_form('comment_form', $comment);


if($user->uid!=0 && !isset($user_data->roles[6])){
  if($form_data['node_type']['#value'] == "comment_node_event"){
    $node_type = "comment_node_event_form";
    $form = drupal_get_form("comment_node_event_form", (object) array('nid' => $node->nid));
    $form['field_image_comment_event'] = array();
    $form['field_file_event']= array();  
    print render($form);
  }else if($form_data['node_type']['#value'] == "comment_node_news"){
    $node_type = "comment_node_news_form";
    $form = drupal_get_form("comment_node_news_form", (object) array('nid' => $node->nid));
    //print render($form);
  }else if($form_data['node_type']['#value'] == "comment_node_project"){
    $node_type = "comment_node_project_form";
    $form = drupal_get_form("comment_node_project_form", (object) array('nid' => $node->nid));
    $form['field_image_comment_project']=array();
    $form['field_file_comment_project'] = array();

    print render($form);
  }else if($form_data['node_type']['#value'] == "comment_node_campaign"){
    $node_type = "comment_node_campaign_form";
    $form = drupal_get_form("comment_node_campaign_form", (object) array('nid' => $node->nid));

    print render($form);
  }else if($form_data['node_type']['#value'] == "comment_node_journal"){
    $node_type = "comment_node_journal_form";
    $form = drupal_get_form("comment_node_journal_form", (object) array('nid' => $node->nid));
    print render($form);
  }else if($form_data['node_type']['#value'] == "comment_node_forum"){
    $node_type = "comment_node_forum_form";
    $form = drupal_get_form("comment_node_forum_form", (object) array('nid' => $node->nid));
  }
  else if($form_data['node_type']['#value'] == "comment_node_knowledge"){
    $node_type = "comment_node_knowledge_form";
    $form = drupal_get_form("comment_node_knowledge_form", (object) array('nid' => $node->nid));
    print render($form);
  }
}



// print "<pre>";
//   print_r($form_data);
//   print "</pre>";
//$form_build_id = 'form-' . md5(uniqid(mt_rand(), TRUE));



//$form_token =  drupal_get_token('webform_client_form_2');
?>
<style type="text/css">
  #edit-comment-body-und-0-format--7{
    display: none;
  }
  
</style>

<?php 

// print "<pre>";
//       print_r($node->nid);
//       print "</pre>";
    $limit =5;
    $result = db_select('comment', 'c')
      ->fields('c')
      ->condition('nid', $node->nid)
      ->condition('pid', 0)
      //->range(0,0)
      ->execute()
      ->fetchAll();

    $result_cnt = db_select('comment', 'c')
      ->fields('c')
      ->condition('nid', $node->nid)
      ->execute();
    $num_of_results = $result_cnt->rowCount();  

      $type = !empty($_GET['type'])?$_GET['type']:"ALL";
      $total_pages= ceil($num_of_results/5);




  

?>
<div id="results-loadding-more-comment"></div>
<?php if(count($result)>5): ?>
<div align="center">
  <?php /// print ?>
<button class="btn btn-primary" id="load_more_button">Load More</button>
<div class="animation_image" style="display:none;"> <img src="/sites/all/themes/changemakers/images/loading3.gif"></div>
</div>
<?php endif; ?>

<!-- Load More-->
<!-- <div class="col-xs-12 infinite-loading" style="margin-top:15px;  ">
  <div class="row">
    <div class="list-infinite-loading" data-skip="5" onclick="list_infinite_loading(this)" data-api="/changemakers/infiniteload/<?php echo $comment_result->node_type;?>">Load more</div>
  </div>
</div> -->
<script>
(function($) {
    $(document).ready(function(){
      
      //   $("textarea[name*='comment_body[und][0][value]']").summernote({
      //   height: 300,                 // set editor height
      //   minHeight: null,             // set minimum height of editor
      //   maxHeight: null,             // set maximum height of editor
      //   //focus: true                  // set focus to editable area after initializing summernote
      // });


  var track_click = 0; //track user click on "load more" button, righ now it is 0 click
  
  var total_pages = <?php echo $total_pages; ?>;
  var nid = <?php echo $node->nid; ?>;
  var type = "<?php echo $type; ?>";
  $('#results-loadding-more-comment').load("/api/changemakers/comment/load", {'page': track_click,'nid':nid,'type':type}, function() {track_click++;}); //initial data to load

  $("#load_more_button").click(function (e) { //user clicks on button
    //alert(1);
  
    $(this).hide(); //hide load more button on click
    $('.animation_image').show(); //show loading image

    if(track_click <= total_pages) //make sure user clicks are still less than total pages
    {
      //alert(track_click);
      //post page number and load returned data into result element
      $.post('/api/changemakers/comment/load',{'page': track_click,'nid':nid,'type':type}, function(data) {
        //alert(data);
      
        $("#load_more_button").show(); //bring back load more button
        
        $("#results-loadding-more-comment").append(data); //append data received from server
        
        //scroll page to button element
        //$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
        
        //hide loading image
        $('.animation_image').hide(); //hide loading image once data is received
  
        track_click++; //user click increment on load button
      
      }).fail(function(xhr, ajaxOptions, thrownError) { 
        alert(thrownError); //alert any HTTP error
        $("#load_more_button").show(); //bring back load more button
        $('.animation_image').hide(); //hide loading image once data is received
      });
      
      
      if(track_click >= total_pages-1)
      {
        //reached end of the page yet? disable load button
        $("#load_more_button").attr("disabled", "disabled");
      }
     }
      
    });


        $('.required').prop("required", true);
        $('#edit-subject--4').prop("required", true);
        // $('#edit-comment-body-und-0-value--4').prop("required", true);
        // $('#edit-comment-body-und-0-value--3').prop("required", true);
        // $('#edit-field-subject-commet-project-und--4').prop("required", true);
        //$('#edit-comment-body-und-0-value--3').prop("required", true);
        //$('#edit-comment-body-und-0-value--3').prop("required", true);

        

        

        
        // $('#edit-submitted-to-date-fund-project-day').prop("required", true);
        // $('#edit-submitted-to-date-fund-project-month').prop("required", true);
        // $('#edit-submitted-to-date-fund-project-year').prop("required", true);
        // $('#edit-submitted-fund-type-project').prop("required", true);
        // $('#edit-submitted-fund-amount-project').prop("required", true);
        // $('#edit-submitted-fund-use-project').prop("required", true);
        // $("#edit-submitted-fund-source-project").prop("required", true);

    });   
}(jQuery));
function user_like_comment(element){ 
    var cid = element.getAttribute('data-cid');
    var uid = element.getAttribute('data-uid');
    var child = element.childNodes;  

    (function($){
    $.ajax({
        url: "/like/comment/"+cid+"/"+uid,
        type: "POST",
        dataType: "json",
        success : function(data) { 

         console.log(data);           
           if(data['status']==1){
              child[1].setAttribute('class',' ');
              child[1].setAttribute('class','icon-heart');
              child[3].innerHTML=data['value'];
            }else{
              alert(data['msg']);
            }
        },
        error: function () {}
    });
  })(jQuery);
}

  //$(document).ready(function(){
  function list_infinite_loading(element) 
  { 

  // Infinite Loading
  //if ($('.list-infinite-loading').length>0) {
    (function($){
    //console.log($('.list-infinite-loading').length);
        var skip = element.getAttribute('data-skip');
        var api_url = element.getAttribute('data-api');
        api_url = api_url+"/"+skip;
        console.log(api_url,skip);  
        // var $listInfiniteLoading = event;
        // var api_url = $listInfiniteLoading.("data-api");
       
        $.ajax(
        {
          url: api_url,
          dataType: 'json',
          cache: false,
          beforeSend: function() 
          {
            //$listInfiniteLoading.addClass('active');
          },
          success: function(resp) 
          {
            //console.log(resp);
            if(resp){
             // $('.col2--viewcontent').append('<div class="col-xs-12" style="margin-top:15px;"><div class="row"></div></div>')
            }
            
          },
          error: function() 
          {
              //alert('Error!, Please try again later.');
          },
          complete: function() 
          {
            //list_infinite_load_busy = false;
            setTimeout(function() 
            {
              //$listInfiniteLoading.removeClass('active');
            }, 
            1000);
          }
        });
  //});
  // }
    })(jQuery);
  }
</script>


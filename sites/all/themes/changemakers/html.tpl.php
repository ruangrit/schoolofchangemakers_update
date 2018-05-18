<?php
$arg0 = arg(0);
$arg1 = arg(1);
$arg2= arg(2);
if($arg0=="home" && $arg1 == "knowledge" && !empty($_GET['knowledge_id'])){
   $knowledge_id = $_GET['knowledge_id'];
      $type = "knowledge";
      $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :knowledge_id AND bundle = :type", array(":knowledge_id"=> $knowledge_id, ":type"=> $type));  
     $nid = $result->fetchField();
      //$node = node_load($nid);
      $alias = drupal_get_path_alias('node/'.$nid);
      if(!empty($nid)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header( "Location: https://www.schoolofchangemakers.com/$alias" );
        exit(0);
      }else{
        $type = "journal";
        $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :knowledge_id AND bundle = :type", array(":knowledge_id"=> $knowledge_id, ":type"=> $type));  
        $nid = $result->fetchField();
         $alias = drupal_get_path_alias('node/'.$nid);
         if(!empty($nid)){
          header("HTTP/1.1 301 Moved Permanently"); 
          header( "Location: https://www.schoolofchangemakers.com/$alias" );
          exit(0);
        }
      }
}
if($arg0=="home" && $arg1 == "activity" && !empty($_GET['activity_id'])){
   $activity_id = $_GET['activity_id'];
      $type = "news";
      $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :activity_id AND bundle = :type", array(":activity_id"=> $activity_id, ":type"=> $type));  
     $nid = $result->fetchField();
      //$node = node_load($nid);
      $alias = drupal_get_path_alias('node/'.$nid);
      if(!empty($nid)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header( "Location: https://www.schoolofchangemakers.com/$alias" );
        exit(0);
      }else{
        $type = "event";
        $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :activity_id AND bundle = :type", array(":activity_id"=> $activity_id, ":type"=> $type));  
        $nid = $result->fetchField();
         $alias = drupal_get_path_alias('node/'.$nid);
         if(!empty($nid)){
          header("HTTP/1.1 301 Moved Permanently"); 
          header( "Location: https://www.schoolofchangemakers.com/$alias" );
          exit(0);
        }
      }
}
if($arg0=="home" && $arg1 == "post" && !empty($_GET['post_id'])){
   $post_id = $_GET['post_id'];
      $type = "forum";
      $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :post_id AND bundle = :type", array(":post_id"=> $post_id, ":type"=> $type));  
     $nid = $result->fetchField();
      //$node = node_load($nid);
      $alias = drupal_get_path_alias('node/'.$nid);
      if(!empty($nid)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header( "Location: https://www.schoolofchangemakers.com/$alias" );
        exit(0);
      }
}
if($arg0=="project" && !empty($arg1)){
   $project_id = $arg1;
      $type = "project";
      $result = db_query("SELECT entity_id FROM field_data_field_id_old_content WHERE field_id_old_content_value = :project_id AND bundle = :type", array(":project_id"=> $project_id, ":type"=> $type));  
     $nid = $result->fetchField();
      //$node = node_load($nid);
      $alias = drupal_get_path_alias('node/'.$nid);
      if(!empty($nid)){
        header("HTTP/1.1 301 Moved Permanently"); 
        header( "Location: https://www.schoolofchangemakers.com/$alias" );
        exit(0);
      }
}
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $html_attributes:  String of attributes for the html element. It can be
 *   manipulated through the variable $html_attributes_array from preprocess
 *   functions.
 * - $html_attributes_array: An array of attribute values for the HTML element.
 *   It is flattened into a string within the variable $html_attributes.
 * - $body_attributes:  String of attributes for the BODY element. It can be
 *   manipulated through the variable $body_attributes_array from preprocess
 *   functions.
 * - $body_attributes_array: An array of attribute values for the BODY element.
 *   It is flattened into a string within the variable $body_attributes.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup templates
 */
?><!DOCTYPE html>
<html<?php print $html_attributes;?><?php print $rdf_namespaces;?> xmlns:fb="http://ogp.me/ns/fb#">
<head>
  <link rel="profile" href="<?php print $grddl_profile; ?>" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="N_LNY6QoGakcV7QnSU-YiZGGYSpqNKqvBu4KkHebff0" />
 <!--  <meta property="og:image" content="http://changemakers.devfunction.com/sites/default/files/79389_full.jpg"/> -->
  <meta property="fb:app_id" content="1044418628957648" />
  <!-- <meta property="og:image" content="http://i2.ytimg.com/vi/1F7DKyFt5pY/default.jpg" /> -->

  
  <?php global $user;

  $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $path_args = explode('/', current_path());
  

  changemakers_checK_node_add();

  $get_path = explode("/", $actual_link);

  // print "<pre>";
  // print_r($actual_link);
  // print "</pre>";


    if(!empty($path_args[1])){
      $node_data =  node_load($path_args[1]);

      
      // print "<pre>";
      // print_r($node_data);
      // print "</pre>";

      if($node_data->type == "project" && $node_data->status != 0){

        if(!empty($node_data)){ ?>
          <title><?php print $node_data->title;  ?></title>
          <?php 
            $image = image_style_url('content_image', $node_data->field_project_image['und'][0]['uri']);

          ?>
         <!--  <img src="<?php// print  $image; ?>"> -->
          <meta property="og:title" content="<?php print $node_data->title;  ?>" /> 
          <meta property="og:image" content="<?php print $image; ?>" />
          <meta property="og:description" content="<?php echo iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
          
         

        <?php

        }

      }
      else if($node_data->type == "forum" && $node_data->status != 0){

        if(!empty($node_data)){ ?>
          <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
        <?php $type = $node_data->type;
        $community_forum_topic_type = $node_data->field_community_forum_topic_type['und'][0]['tid'];
        if(isset($node_data->field_commuity_image['und'][0]['filename'])){
          $commuity_image = image_style_url("large", $node_data->field_commuity_image['und'][0]['uri']); 
        //   print "<pre>";
        // print_r($commuity_image);
        // print "</pre>";
          ?>         
            <meta property="og:image" content="<?php print_r($commuity_image);?>"/> 
        <?php
        }else{
           if($community_forum_topic_type==111){
              $image_default = "http://".$_SERVER[HTTP_HOST]."/sites/all/themes/changemakers/images/default_need.jpg";
            }elseif($community_forum_topic_type==112){
              $image_default = "http://".$_SERVER[HTTP_HOST]."/sites/all/themes/changemakers/images/default_offer.jpg";
            }elseif($community_forum_topic_type==117){ 
              $image_default = "http://".$_SERVER[HTTP_HOST]."/sites/all/themes/changemakers/images/default_other.jpg";
            }elseif($community_forum_topic_type==115){
              $image_default = "http://".$_SERVER[HTTP_HOST]."/sites/all/themes/changemakers/images/default_announcement.jpg";
            } ?>
            <meta property="og:image" content="<?php print $image_default;?>"/>    
        <?php 
        } ?>    
         
        <?php
        }
        
      }
      else if($node_data->type == "knowledge" && $node_data->status != 0){
        // print "<pre>";
        // print_r($node_data->field_knowledge_image['und'][0]['filename']);
        // print "</pre>";

        $image = image_style_url('content_image', $node_data->field_knowledge_image['und'][0]['uri']);
        
        if(!empty($node_data)){
         ?>

          <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
          <meta property="og:image" content="<?php print $image; ?>"/>
          <meta property="og:image:secure_url" content="<?php print "https://$_SERVER[HTTP_HOST]" ?>/sites/default/files/<?php print $node_data->field_knowledge_image['und'][0]['filename'];?>" />
         
        <?php

        }
        
      }
      else if($node_data->type == "event" && $node_data->status != 0){

        //print "tong";
        if(!empty($node_data)){

         ?>

           <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo  iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> 
        
          <meta property="og:image" content="<?php print "https://$_SERVER[HTTP_HOST]" ?>/sites/default/files/<?php print $node_data->field_picture['und'][0]['filename'];?>"/>
         
          <!--<meta property="og:url" content="<?php //print image_style_url('Card Thumbnail',$node_share->field_picture['und'][0]['uri']);?>"/> -->
          
        <?php

        }
        
      } else if($node_data->type == "news" && $node_data->status != 0 ){

        //     print '<pre>';
        // print_r($node_project_share); 
        // print '</pre>';
        $image = image_style_url('content_image', $node_data->field_picture['und'][0]['uri']);
        if(!empty($node_data)){ ?>
          <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo  iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
          <meta property="og:image" content="<?php print $image; ?>"/>
         
        <?php

        }
        
      }
      else if($node_data->type == "campaign" && $node_data->status != 0 ){
      
        //     print '<pre>';
        // print_r($node_project_share); 
        // print '</pre>';
        if(!empty($node_data)){ ?>
          <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo  iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
          <meta property="og:image" content="<?php print "https://$_SERVER[HTTP_HOST]" ?>/sites/default/files/<?php print $node_data->field_campaign_image['und'][0]['filename'];?>"/>
         
        <?php

        }
        
      }else if($node_data->type == "journal" && $node_data->status != 0 ){

        //     print '<pre>';
        // print_r($node_project_share); 
        // print '</pre>';
        if(!empty($node_data)){ 

          $image = image_style_url('content_image', $node_data->field_journal_image['und'][0]['uri']); ?>
          <title><?php print $node_data->title;  ?></title>
          <meta property="og:title" content="<?php print $node_data->title;  ?>" />
          <meta property="og:description" content="<?php echo  iconv_substr(strip_tags($node_data->body['und'][0]['value']),0,200,"utf-8"); ?>" /> <!--   -->
          <meta property="og:image" content="<?php print $image; ?>" />
         
        <?php

        }
        
      }

    }else if($actual_link == "http://soc.devfunction.com/" || $actual_link == "https://www.schoolofchangemakers.com/" || 
     $actual_link == "http://www.schoolofchangemakers.com/"){
      ?>
      <meta property="og:image" content="<?php print "https://$_SERVER[HTTP_HOST]" ?>/sites/all/themes/changemakers/images/schoolofchangemakers.jpg" />
      <?php 
    }


    



  ?>

  <?php print $head; ?>

  <script src="/sites/all/themes/changemakers/js/project_script.js"></script>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php print $scripts; ?>


  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-79215371-1', 'auto');
    ga('send', 'pageview');

  </script>
  
  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '953651714743771');
  fbq('track', "PageView");
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"  src="https://www.facebook.com/tr?id=953651714743771&ev=PageView&noscript=1" />
  </noscript>
  <!-- End Facebook Pixel Code -->

  <script type="text/javascript">
    (function($) {
      var fbxhr = new XMLHttpRequest();
        fbxhr.open("POST", "https://graph.facebook.com", true);
        fbxhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        fbxhr.send("id=<?php echo $actual_link; ?>&scrape=true");
      $(document).ready(function(){
        
        $("#webform_client_form_92_reset").click(function(){

            //$("input[name*='submitted[nid]']").val("");
            $("#edit-submitted-date-fund-project-day").prop('selectedIndex', 0);
            $("#edit-submitted-date-fund-project-month").prop('selectedIndex', 0);
            $("#edit-submitted-date-fund-project-year").prop('selectedIndex', 0);
            $("input[name*='submitted[fund_amount_project]']").val("");
            $("input[name*='submitted[fund_source_project]']").val("");
            $("textarea[name*='submitted[fund_use]']").val("");
            
        });
      });   
    }(jQuery));
  </script>

 <style type="text/css">
  .webform-submission-navigation{
      display: none;
  }
 </style>
  <style src="/sites/all/themes/changemakers/css/bootstrap-multiselect.css"></style>
  <script src="/sites/all/themes/changemakers/js/bootstrap-multiselect.js"></script>
    <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','https://connect.facebook.net/en_US/fbevents.js');

  fbq('init', '953651714743771');
  fbq('track', "PageView");</script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=953651714743771&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->
</head>
<body<?php print $body_attributes; ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>

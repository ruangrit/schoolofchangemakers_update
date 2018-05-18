<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<div class="bg-gray" >
    <header class="header clearfix">
    
        
    <div style="background:#ffffff;">
    <div class="<?php print $container_class; ?>" style="padding-top:10px;">
    <div class="col-xs-8">
        
    <!--logo-->
      <?php if ($logo): ?>
        
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="main-logo col-xs-12 clearfix"/>
        </a>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
        
      </div>
        
        
        
        
        <div class="col-xs-4 text-right">

            <?php if (!empty($secondary_nav)){ ?>
            <?php 
              print render($secondary_nav); 
            ?>
            <?php }else{ ?>
              <ul class="list-inline">
                <li class="leaf"><a href="/user/login" class=""><span class="glyphicon glyphicon-lock"></span> Log in</a></li>
                <li class="leaf"><a href="/user/register" class=""><span class="glyphicon glyphicon-user"></span> Register</a></li>
              </ul>
            <?php } ?>
            
            
            
            
        </div>
    </div>    
    </div>
      
      <div class="col-xs-12 nav navbar">
      <div class="container">  
      <div class="row">
      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <nav role="navigation" class="col-xs-8">
        <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($secondary_nav)): ?>
            <?php //print render($secondary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
        <?php endif; ?>
        </nav>
      
        <div class="search-top form col-xs-3 col-xs-offset-1 text-right">
            <div class="input-group row">
            <input type="text" class="form-control" placeholder="Search ...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
            </span>
            </div>
        </div>
          
          </div>
    <?php endif; ?>
        </div>
        
          </div>
        
      

           
    </header><!-- End of Header-->       
        
  

<div class="main-container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->
  <div class="row">

    
    <section class="col-sm-12">
        
        
              
        
      <ol class="breadcrumb"><li><a href="/node/add">Add content</a></li>
<li class="active">Create Session Offer</li>
</ol>      <a id="main-content"></a>
                    <h1 class="page-header">Create Session Offer</h1>
              
 <?php
 $form_build_id = 'form-' . md5(uniqid(mt_rand(), TRUE));

 $form_token =  drupal_get_token('session_offer_node_form');

?>                                      
              
              
<form ffpdm="vujx3iedfbj0bl1gfmkm11m" class="node-form node-session_offer-form" action="/node/add/session-offer" method="post" id="session-offer-node-form" accept-charset="UTF-8">
    <div>
        <div class="form-item form-item-title form-type-textfield form-group">
            <label class="control-label" for="edit-title">Session Offer and Available Time <span class="form-required" title="This field is required.">*</span></label>
            <input ffpdm="o5mafkfg9llcghxgbfnggu" class="form-control form-text required" id="edit-title" name="title" value="" size="60" maxlength="255" type="text">
        </div>
        <input name="changed" value="" type="hidden">
        <input name="form_build_id" value="<?php echo $form_build_id ?>" type="hidden">
        <input name="form_token" value="<?php echo $form_token ?>" type="hidden">
        <input name="form_id" value="session_offer_node_form" type="hidden">
        <div class="field-type-list-text field-name-field-session field-widget-options-buttons form-wrapper form-group" id="edit-field-session">
            <div class="form-item form-item-field-session-und form-type-checkboxes form-group">
                <label class="control-label" for="edit-field-session-und">session <span class="form-required" title="This field is required.">*</span></label>
                <div id="edit-field-session-und" class="form-checkboxes">
                    <div class="form-item form-item-field-session-und-1 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-1">
                            <input ffpdm="y2lspx39h6n08whvxovduzr" id="edit-field-session-und-1" name="field_session[und][1]" value="1" class="form-checkbox" type="checkbox">Branding </label>
                    </div>
                    <div class="form-item form-item-field-session-und-2 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-2">
                            <input ffpdm="8etnrqqxnn8afww6no1n1s" id="edit-field-session-und-2" name="field_session[und][2]" value="2" class="form-checkbox" type="checkbox">Marketing </label>
                    </div>
                    <div class="form-item form-item-field-session-und-3 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-3">
                            <input ffpdm="lkx1p9vk7xjari72ympuyj" id="edit-field-session-und-3" name="field_session[und][3]" value="3" class="form-checkbox" type="checkbox">IT </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field-type-text field-name-field-session-other field-widget-text-textfield form-wrapper form-group" id="edit-field-session-other">
            <div id="field-session-other-add-more-wrapper">
                <div class="form-item form-item-field-session-other-und-0-value form-type-textfield form-group">
                    <label class="control-label" for="edit-field-session-other-und-0-value">Session Other </label>
                    <input ffpdm="ww2wf8usgrhm4ujv6hbfy" class="text-full form-control form-text" id="edit-field-session-other-und-0-value" name="field_session_other[und][0][value]" value="" size="60" maxlength="255" type="text">
                </div>
            </div>
        </div>
        <div class="field-type-datetime field-name-field-available-time field-widget-date-select form-wrapper form-group" id="edit-field-available-time">
            <div id="field-available-time-add-more-wrapper">
                <div class="form-item">
                    <div class="table-responsive">
                        <div class="tabledrag-toggle-weight-wrapper"><a title="Re-order rows by numerical weight instead of dragging." href="#" class="tabledrag-toggle-weight">Show row weights</a></div>
                        <table style="position: fixed; top: 0px; left: 381.5px; visibility: hidden;" class="sticky-header">
                            <thead style="">
                                <tr>
                                    <th colspan="2" class="field-label">
                                        <label>Available Time <span class="form-required" title="This field is required.">*</span></label>
                                    </th>
                                    <th style="display: none;" class="tabledrag-hide">Order</th>
                                </tr>
                            </thead>
                        </table>
                        <table id="field-available-time-values" class="field-multiple-table table table-hover table-striped sticky-enabled tabledrag-processed tableheader-processed sticky-table">
                            <thead>
                                <tr>
                                    <th colspan="2" class="field-label">
                                        <label>Available Time <span class="form-required" title="This field is required.">*</span></label>
                                    </th>
                                    <th style="display: none;" class="tabledrag-hide">Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="draggable">
                                    <td class="field-multiple-drag">
                                        <a title="Drag to re-order" href="#" class="tabledrag-handle">
                                            <div class="handle">&nbsp;</div>
                                        </a>
                                    </td>
                                    <td>
                                        <!-- THEME DEBUG -->
                                        <!-- CALL: theme('bootstrap_panel') -->
                                        <!-- BEGIN OUTPUT from 'sites/all/themes/bootstrap/templates/bootstrap/bootstrap-panel.tpl.php' -->
                                        <div id="field-available-time-add-more-wrapper">
    <div class="form-item">
        <div class="tabledrag-toggle-weight-wrapper"><a title="Re-order rows by numerical weight instead of dragging." href="#" class="tabledrag-toggle-weight">Show row weights</a></div>
        <table style="position: fixed; top: 29px; left: 40px; visibility: hidden;" class="sticky-header">
            <thead style="">
                <tr>
                    <th colspan="2" class="field-label">
                        <label>Available Time <span class="form-required" title="This field is required.">*</span></label>
                    </th>
                    <th style="display: none;" class="tabledrag-hide">Order</th>
                </tr>
            </thead>
        </table>
        <table id="field-available-time-values" class="field-multiple-table sticky-enabled tabledrag-processed tableheader-processed sticky-table">
            <thead>
                <tr>
                    <th colspan="2" class="field-label">
                        <label>Available Time <span class="form-required" title="This field is required.">*</span></label>
                    </th>
                    <th style="display: none;" class="tabledrag-hide">Order</th>
                </tr>
            </thead>
            <tbody>
                <tr class="draggable odd">
                    <td class="field-multiple-drag">
                        <a title="Drag to re-order" href="#" class="tabledrag-handle">
                            <div class="handle">&nbsp;</div>
                        </a>
                    </td>
                    <td>
                        <fieldset class="date-combo form-wrapper date-processed">
                            <legend><span class="fieldset-legend">Available Time  <span class="form-required" title="This field is required.">*</span></span>
                            </legend>
                            <div class="fieldset-wrapper">
                                <div class="fieldset-description"><span class="js-hide"> Empty 'End date' values will use the 'Start date' values.</span></div>
                                <div class="date-no-float start-date-wrapper container-inline-date">
                                    <div class="form-item form-type-date-select form-item-field-available-time-und-0-value">
                                        <div id="edit-field-available-time-und-0-value" class="date-padding clearfix">
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value-year">
                                                <label for="edit-field-available-time-und-0-value-year">Year <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-year">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value-year" name="field_available_time[und][0][value][year]">
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015" selected="selected">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value-day">
                                                <label for="edit-field-available-time-und-0-value-day">Day <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-day">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value-day" name="field_available_time[und][0][value][day]">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value-hour">
                                                <label for="edit-field-available-time-und-0-value-hour">Hour <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-hour">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value-hour" name="field_available_time[und][0][value][hour]">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16" selected="selected">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value-minute">
                                                <label for="edit-field-available-time-und-0-value-minute">Minute <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-minute">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value-minute" name="field_available_time[und][0][value][minute]">
                                                        <option value="00">00</option>
                                                        <option value="05">05</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                        <option value="35">35</option>
                                                        <option value="40">40</option>
                                                        <option value="45">45</option>
                                                        <option value="50">50</option>
                                                        <option value="55">55</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="date-no-float end-date-wrapper container-inline-date">
                                    <div class="form-item form-type-date-select form-item-field-available-time-und-0-value2">
                                        <label for="edit-field-available-time-und-0-value2">to: <span class="form-required" title="This field is required.">*</span></label>
                                        <div id="edit-field-available-time-und-0-value2" class="date-padding clearfix">
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value2-year">
                                                <label for="edit-field-available-time-und-0-value2-year">Year <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-year">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value2-year" name="field_available_time[und][0][value2][year]">
                                                        <option value="2012">2012</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015" selected="selected">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value2-day">
                                                <label for="edit-field-available-time-und-0-value2-day">Day <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-day">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value2-day" name="field_available_time[und][0][value2][day]">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value2-hour">
                                                <label for="edit-field-available-time-und-0-value2-hour">Hour <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-hour">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value2-hour" name="field_available_time[und][0][value2][hour]">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16" selected="selected">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-value2-minute">
                                                <label for="edit-field-available-time-und-0-value2-minute">Minute <span class="form-required" title="This field is required.">*</span></label>
                                                <div class="date-minute">
                                                    <select class="date-clear form-select required" id="edit-field-available-time-und-0-value2-minute" name="field_available_time[und][0][value2][minute]">
                                                        <option value="00">00</option>
                                                        <option value="05">05</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                        <option value="20">20</option>
                                                        <option value="25">25</option>
                                                        <option value="30">30</option>
                                                        <option value="35">35</option>
                                                        <option value="40">40</option>
                                                        <option value="45">45</option>
                                                        <option value="50">50</option>
                                                        <option value="55">55</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="date-no-float">
                                    <div class="form-item form-type-date-timezone form-item-field-available-time-und-0-timezone">
                                        <div id="edit-field-available-time-und-0-timezone">
                                            <div class="form-item form-type-select form-item-field-available-time-und-0-timezone-timezone">
                                               
                                               
                                                <div class="date-timezone">
                                                    <input type="hidden"  id="edit-field-available-time-und-0-timezone-timezone" name="field_available_time[und][0][timezone][timezone]" value = "Asia/Bangkok"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </td>
                    <td style="display: none;" class="delta-order tabledrag-hide">
                        <div class="form-item form-type-select form-item-field-available-time-und-0--weight">
                            <label class="element-invisible" for="edit-field-available-time-und-0-weight">Weight for row 1 </label>
                            <select class="field_available_time-delta-order form-select" id="edit-field-available-time-und-0-weight" name="field_available_time[und][0][_weight]">
                                <option value="0" selected="selected">0</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="clearfix">
          <!--   <input class="field-add-more-submit form-submit ajax-processed" id="edit-field-available-time-und-add-more" name="field_available_time_add_more" value="Add another item" type="submit"> -->
        </div>
    </div>
</div>

                                        <!-- END OUTPUT from 'sites/all/themes/bootstrap/templates/bootstrap/bootstrap-panel.tpl.php' -->
                                    </td>
                                    <td style="display: none;" class="delta-order tabledrag-hide">
                                        <div class="form-item form-item-field-available-time-und-0--weight form-type-select form-group">
                                            <label class="control-label element-invisible" for="edit-field-available-time-und-0-weight">Weight for row 1 </label>
                                            <select class="field_available_time-delta-order form-control form-select" id="edit-field-available-time-und-0-weight" name="field_available_time[und][0][_weight]">
                                                <option value="0" selected="selected">0</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <button class="field-add-more-submit btn btn-info form-submit ajax-processed" type="submit" id="edit-field-available-time-und-add-more" name="field_available_time_add_more" value="Add another item">Add another item</button>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="element-invisible">Vertical Tabs</h2>
        <div class="vertical-tabs-panes vertical-tabs-processed tab-content">
            <input class="vertical-tabs-active-tab" name="additional_settings__active_tab" value="" type="hidden">
        </div>
        <div class="form-actions form-wrapper form-group" id="edit-actions">
            <button type="submit" id="edit-submit" name="op" value="Save" class="btn btn-success form-submit"><span class="icon glyphicon glyphicon-ok" aria-hidden="true"></span> Save</button>
            <button type="submit" id="edit-preview" name="op" value="Preview" class="btn btn-default form-submit">Preview</button>
        </div>
    </div>
</form>
</section>
</div>

 
    
    
</div>

</div><!-- End of Gray BG-->

<?php if (!empty($page['footer'])): ?>

<div class="footer ">

<?php print render($page['footer']); ?>
      
 </div>     
      








<?php endif; ?>

      
<footer class="footer-box  col-xs-12">
    
        <div class="container">
        
        <div class="footer-logo col-xs-2 bw"></div>
            
        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="footer-nav col-xs-6 col-xs-offset-4 list-inline text-right" >
            
        <?php if (!empty($primary_nav)): ?>
            <?php print render($primary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($secondary_nav)): ?>
            <?php //print render($secondary_nav); ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
        <?php endif; ?>
        </div>    
        
        <?php endif; ?>
                  
        

        <p class="col-xs-12 row">@2015 Ashoka - School of Change makers | <a href="#">Term of Use</p>
        </div>
</footer>  


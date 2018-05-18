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
              
              
<form ffpdm="3ldndx2j9m19rm8dna75u" class="node-form node-session_offer-form" action="/node/53/edit" method="post" id="session-offer-node-form" accept-charset="UTF-8">
    <div>
        <div class="form-item form-item-title form-type-textfield form-group">
            <label class="control-label" for="edit-title">Session Offer and Available Time <span class="form-required" title="This field is required.">*</span></label>
            <input ffpdm="x7x4vavl00cc24liafhrsj" class="form-control form-text required" id="edit-title" name="title" value="ฟหกฟหก" size="60" maxlength="255" type="text">
        </div>
        <input name="changed" value="1449227362" type="hidden">
        <input name="form_build_id" value="<?php echo $form_build_id ?>" type="hidden">
        <input name="form_token" value="<?php echo $form_token ?>" type="hidden">
        <input name="form_id" value="session_offer_node_form" type="hidden">
        <div class="field-type-list-text field-name-field-session field-widget-options-buttons form-wrapper form-group" id="edit-field-session">
            <div class="form-item form-item-field-session-und form-type-checkboxes form-group">
                <label class="control-label" for="edit-field-session-und">session <span class="form-required" title="This field is required.">*</span></label>
                <div id="edit-field-session-und" class="form-checkboxes">
                    <div class="form-item form-item-field-session-und-1 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-1">
                            <input ffpdm="2iovhzbl3zgywc0y9113t" id="edit-field-session-und-1" name="field_session[und][1]" value="1" checked="checked" class="form-checkbox" type="checkbox">Branding </label>
                    </div>
                    <div class="form-item form-item-field-session-und-2 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-2">
                            <input ffpdm="w3rf1j0w2im684d7oin1f2" id="edit-field-session-und-2" name="field_session[und][2]" value="2" checked="checked" class="form-checkbox" type="checkbox">Marketing </label>
                    </div>
                    <div class="form-item form-item-field-session-und-3 form-type-checkbox checkbox">
                        <label class="control-label" for="edit-field-session-und-3">
                            <input ffpdm="s84vgauh0ll6vu0ti9rqfi" id="edit-field-session-und-3" name="field_session[und][3]" value="3" checked="checked" class="form-checkbox" type="checkbox">IT </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field-type-text field-name-field-session-other field-widget-text-textfield form-wrapper form-group" id="edit-field-session-other">
            <div id="field-session-other-add-more-wrapper">
                <div class="form-item form-item-field-session-other-und-0-value form-type-textfield form-group">
                    <label class="control-label" for="edit-field-session-other-und-0-value">Session Other </label>
                    <input ffpdm="yasrnpp1mw8ky3yf63fw" class="text-full form-control form-text" id="edit-field-session-other-und-0-value" name="field_session_other[und][0][value]" value="" size="60" maxlength="255" type="text">
                </div>
            </div>
        </div>
        <div class="field-type-field-collection field-name-field--available-time field-widget-field-collection-table form-wrapper form-group" id="edit-field-available-time">
            <div id="field-available-time-add-more-wrapper">
                <div class="form-item">
                    <div class="table-responsive">
                        <div class="tabledrag-toggle-weight-wrapper"><a title="Re-order rows by numerical weight instead of dragging." href="#" class="tabledrag-toggle-weight">Show row weights</a></div>
                        <table style="position: fixed; top: 0px; left: 390px; visibility: hidden;" class="sticky-header">
                            <thead style="">
                                <tr>
                                    <th class="field-label">
                                        <label> Available Time: </label>
                                    </th>
                                    <th class="field-label">
                                        <label>day</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Start Hour</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Start Minute</label>
                                    </th>
                                    <th class="field-label">
                                        <label>End Hour</label>
                                    </th>
                                    <th class="field-label">
                                        <label>End Minute</label>
                                    </th>
                                    <th style="display: none;" class="field-label tabledrag-hide">
                                        <label>Order</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Remove</label>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table id="field-available-time-values" class="field-multiple-table table table-hover table-striped sticky-enabled tabledrag-processed tableheader-processed sticky-table">
                            <thead>
                                <tr>
                                    <th class="field-label">
                                        <label> Available Time: </label>
                                    </th>
                                    <th class="field-label">
                                        <label>day</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Start Hour</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Start Minute</label>
                                    </th>
                                    <th class="field-label">
                                        <label>End Hour</label>
                                    </th>
                                    <th class="field-label">
                                        <label>End Minute</label>
                                    </th>
                                    <th style="display: none;" class="field-label tabledrag-hide">
                                        <label>Order</label>
                                    </th>
                                    <th class="field-label">
                                        <label>Remove</label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="draggable">
                                    <td class="field-multiple-drag field_body">
                                        <a title="Drag to re-order" href="#" class="tabledrag-handle">
                                            <div class="handle">&nbsp;</div>
                                        </a>
                                    </td>
                                    <td class="field-body">
                                        <div class="field-type-list-text field-name-field-day field-widget-options-select form-wrapper form-group" id="edit-field-available-time-und-0-field-day">
                                            <div class="form-item form-item-field--available-time-und-0-field-day-und form-type-select form-group">
                                                <label class="control-label element-invisible" for="edit-field-available-time-und-0-field-day-und">day <span class="form-required" title="This field is required.">*</span></label>
                                                <select class="form-control form-select required" id="edit-field-available-time-und-0-field-day-und" name="field__available_time[und][0][field_day][und]">
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday" selected="selected">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="field-body">
                                        <div class="field-type-list-text field-name-field-start-hr field-widget-options-select form-wrapper form-group" id="edit-field-available-time-und-0-field-start-hr">
                                            <div class="form-item form-item-field--available-time-und-0-field-start-hr-und form-type-select form-group">
                                                <label class="control-label element-invisible" for="edit-field-available-time-und-0-field-start-hr-und">Start Hour </label>
                                                <select class="form-control form-select" id="edit-field-available-time-und-0-field-start-hr-und" name="field__available_time[und][0][field_start_hr][und]">
                                                    <option value="_none">- None -</option>
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
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="field-body">
                                        <div class="field-type-list-text field-name-field-start-min field-widget-options-select form-wrapper form-group" id="edit-field-available-time-und-0-field-start-min">
                                            <div class="form-item form-item-field--available-time-und-0-field-start-min-und form-type-select form-group">
                                                <label class="control-label element-invisible" for="edit-field-available-time-und-0-field-start-min-und">Start Minute </label>
                                                <select class="form-control form-select" id="edit-field-available-time-und-0-field-start-min-und" name="field__available_time[und][0][field_start_min][und]">
                                                    <option value="_none">- None -</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="field-body">
                                        <div class="field-type-list-text field-name-field-end-hr field-widget-options-select form-wrapper form-group" id="edit-field-available-time-und-0-field-end-hr">
                                            <div class="form-item form-item-field--available-time-und-0-field-end-hr-und form-type-select form-group">
                                                <label class="control-label element-invisible" for="edit-field-available-time-und-0-field-end-hr-und">End Hour </label>
                                                <select class="form-control form-select" id="edit-field-available-time-und-0-field-end-hr-und" name="field__available_time[und][0][field_end_hr][und]">
                                                    <option value="_none">- None -</option>
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
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="field-body">
                                        <div class="field-type-list-text field-name-field-end-min field-widget-options-select form-wrapper form-group" id="edit-field-available-time-und-0-field-end-min">
                                            <div class="form-item form-item-field--available-time-und-0-field-end-min-und form-type-select form-group">
                                                <label class="control-label element-invisible" for="edit-field-available-time-und-0-field-end-min-und">End Minute </label>
                                                <select class="form-control form-select" id="edit-field-available-time-und-0-field-end-min-und" name="field__available_time[und][0][field_end_min][und]">
                                                    <option value="_none">- None -</option>
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
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="41">41</option>
                                                    <option value="42">42</option>
                                                    <option value="43">43</option>
                                                    <option value="44">44</option>
                                                    <option value="45">45</option>
                                                    <option value="46">46</option>
                                                    <option value="47">47</option>
                                                    <option value="48">48</option>
                                                    <option value="49">49</option>
                                                    <option value="50">50</option>
                                                    <option value="51">51</option>
                                                    <option value="52">52</option>
                                                    <option value="53">53</option>
                                                    <option value="54">54</option>
                                                    <option value="55">55</option>
                                                    <option value="56">56</option>
                                                    <option value="57">57</option>
                                                    <option value="58">58</option>
                                                    <option value="59">59</option>
                                                    <option value="60">60</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="display: none;" class="field-body tabledrag-hide">
                                        <div class="form-item form-item-field--available-time-und-0--weight form-type-select form-group">
                                            <label class="control-label element-invisible" for="edit-field-available-time-und-0-weight">Weight for row 1 </label>
                                            <select class="field__available_time-delta-order form-control form-select" id="edit-field-available-time-und-0-weight" name="field__available_time[und][0][_weight]">
                                                <option value="-1">-1</option>
                                                <option value="0" selected="selected">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="field-body">
                                        <button type="submit" id="edit-field-available-time-und-0-remove-button" name="field__available_time_und_0_remove_button" value="Remove" class="btn btn-danger form-submit ajax-processed">Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix">
                        <button class="field-add-more-submit btn btn-info form-submit ajax-processed" type="submit" id="edit-field-available-time-und-add-more" name="field__available_time_add_more" value="Add another item">Add another item</button>
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
            <button type="submit" id="edit-delete" name="op" value="Delete" class="btn btn-danger form-submit"><span class="icon glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
        </div>
    </div>
</form>


 
    
    
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


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
  global $user;
  $my_profile = user_load($user->uid);
  // print "<pre>";
  // print_r($_GET['q']);
  // print "</pre>";



?>

<style type="text/css">
  .tooltip .fade .left .in{
    display: none;
  }
</style>


<script type="text/javascript">

    function check_user_login()
    {
      var check = false;
      (function($) {
        $(document).ready(function(){

       
        var username_user = document.getElementById("username_login").value;
        var password_user = document.getElementById("pass_login").value;
        $.ajax({
            url: "http://changemakers.devfunction.com/changemakers/check_login",
            type: "POST",
            data: {username:username_user,password:password_user},
            context: this,
            dataType: 'json',
            success : function (response) {
                //$(this).removeClass('disabled');
                //$(this).data("row",response.row);
                if(response == 1)
                {
                  check = false;
                  document.getElementById('show-error').innerHTML = "รหัสผ่านไม่ถูกต้อง";
                }
                else if(response == 0)
                {
                  check =  true;
                  document.getElementById('show-error').innerHTML = "";
                  $('#user-login').submit();
                }
                else if(response == 3)
                {
                  document.getElementById('show-error').innerHTML = "อีเมล์นี้ไม่มีอยู่ในระบบ <a href='/contact'> ท่านสามารถติดต่อผู้ดูแลระบบ</a>";
                  check =  false;
                }
                else
                {
                  check =  false;
                }
                
                //alert(response);
            },
            error: function () {}
        });
       });
      }(jQuery));
      
      return check;
    }


    function check_forgot_password()
    {
      var check = false;
      (function($) {
        $(document).ready(function(){

       
        var email_user = document.getElementById("edit-name2").value;

        if(email_user!=""){
               
            $.ajax({
                url: "/changemakers/check_forgot",
                type: "POST",
                data: {email:email_user},
                context: this,
                dataType: 'json',
                success : function (response) {
                  //  console.log(response);
                    //$(this).removeClass('disabled');
                    //$(this).data("row",response.row);
                    if(response == 0)
                    {
                        check = false;
                        $('#myForgot .error-massage').css('display','block');
                        $('#myForgot .error-massage').html('อีเมล์นี้ไม่มีอยู่ในระบบ ท่านสามารถติดต่อผู้ดูแลระบบ <a href="/contact">ติดต่อ</a>');
                        //document.getElementById("show-error-email").value = "อีเมล์นี้ไม่มีอยู่ในระบบ";
                        //document.getElementById('show-error-email').innerHTML = "อีเมล์นี้ไม่มีอยู่ในระบบ ท่านสามารถติดต่อผู้ดูแลระบบ <a href='/contact'>ติดต่อ</a>";
                    }
                    else if(response == 1)
                    {
                        check =  true;

                      //document.getElementById("show-error-email").value = "ผ่านได้";
                      //document.getElementById('show-error-email').innerHTML = comment;
                        $('#user-forget-pass').submit();
                    }
                    else
                    {
                      check =  false;
                    }
                    
                    //alert(response);
                },
                error: function () {}
            });
        }else{
            $('#myForgot .error-massage').css('display','block');
            $('#myForgot .error-massage').html('กรุณาใส่อีเมล์');
        }

       });
      }(jQuery));
      
      return check;
    }


</script>

    <header class="header clearfix">

    
        
    <div style="background:#ffffff;">
    <div class="<?php print $container_class; ?>" style="padding-top:15px; padding-bottom:15px; ">
    
    <div class="row">
    <div class="col-xs-3" style="padding-right:0px;"> 
        
    <!--logo-->
      <?php if ($logo): ?>
   
        <a class="logo pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="main-logo col-xs-12 clearfix header--logo"/>
        </a>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
          <span class="icon-bar">zs</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <?php endif; ?>
        
      </div>
        
        
        
        
        <div class="col-xs-9 text-right">

            <?php if (!empty($secondary_nav)){ ?>
            <?php 
              //print render($secondary_nav);
            ?>
              <!-- secondary menu-->
    <div class="row nav2" >
    <div class="col-xs-7 " style="padding-left:0px;">
    <ul class="list-inline nav--second" >
       
        
        <?php  if(isset($user->roles[3])){ ?>
        <li>
        <a href="/manage/menu" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Content <br/> Management</div>
        </a>
        </li> 
        <li>
        <?php
        }        

        // print "<pre>";
        // print_r($user->roles);
        // print "</pre>";
        if(isset($user->roles[9]) ){ ?>

        <!-- <li>
        <a href="/node/add/journal" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Journal</div>
        </a>
        </li>  -->
          <li>
            <a href="/my-projects" class="nav2--list">
            <div class="nav2--myproject"></div>
            <div class="nav2--name">My Project</div>
            </a>
            </li> 
        <li>
        <a href="/campaign/list" class="nav2--list">
        <div class="nav2--campaign"></div>
        <div class="nav2--name">Campaign</div>
        </a>
        </li> 
        <li>
        <a href="/journal/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Journal</div>
        </a>
        </li> 


         <li>
        <a href="/dashboard" class="nav2--list">
        <div class="nav2--dashboard"></div>
        <div class="nav2--name">Dashboard</div></a>
        </li> 
        <?php }elseif(isset($user->roles[6])){?>
            
        <li>
        <a href="/journal/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Journal</div>
        </a>
        </li>

        <li>
        <a href="/campaign/list" class="nav2--list">
        <div class="nav2--campaign"></div>
        <div class="nav2--name">Campaign</div>
        </a>
        </li> 

         <li>
        <a href="/dashboard" class="nav2--list">
        <div class="nav2--dashboard"></div>
        <div class="nav2--name">Dashboard</div></a>
        </li> 
       <?php }
        elseif(isset($user->roles[8])){ ?>   
        <!-- <li>
        <a href="/node/add/journal" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Journal</div>
        </a>
        </li>       -->
        <li>
        <a href="/my-projects" class="nav2--list">
        <div class="nav2--myproject"></div>
        <div class="nav2--name">My Project</div>
        </a>
        </li>
        <li>
        <a href="/journal/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Journal</div>
        </a>
        </li> 

        <li>
        <a href="/dashboard" class="nav2--list">
        <div class="nav2--dashboard"></div>
        <div class="nav2--name">Dashboard</div></a>
        </li>

        <?php }elseif(isset($user->roles[5])){ ?>

        
       <!--  <li>
        <a href="/node/add/journal" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Journal</div>
        </a>
        </li>  -->
        <li>
        <a href="/campaign/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Campaign</div>
        </a>
        </li> 
        <li>
        <a href="/journal/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Journal</div>
        </a>
        </li> 
        
        <li>
        <a href="/my-projects" class="nav2--list">
        <div class="nav2--myproject"></div>
        <div class="nav2--name">My Project</div>
        </a>
        </li>
         <li>
        <a href="/coach-community/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Coach Community</div>
        </a>
        </li>
        <li>
        <a href="/journal-list-coach" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Coach Journals</div>
        </a>
        </li>

        <li>
        <a href="/dashboard" class="nav2--list">
        <div class="nav2--dashboard"></div>
        <div class="nav2--name">Dashboard</div></a>
        </li> 


        <?php }
        else{ ?>
       <!--  <li>
        <a href="/node/add/journal" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Journal</div>
        </a>
        </li>  -->
        <li>
        <a href="/add-project-update" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Project <br/>Update</div>
        </a>
        </li> 
 
                
        <li>
        <a href="/my-projects" class="nav2--list">
        <div class="nav2--myproject"></div>
        <div class="nav2--name">My Project</div>
        </a>
        </li> 
        
        <li>
        <a href="/journal/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Journal</div>
        </a>
        </li> 
        <?php if(!isset($user->roles[3]) && !isset($user->roles[8])){?>
        <li>
        <a href="/campaign/list" class="nav2--list">
        <div class="nav2--campaign"></div>
        <div class="nav2--name">Campaign</div>
        </a>
        </li> 
        <?php }?>
        <?php if(isset($user->roles[3])){ ?>
        <li>
        <a href="/coach-community/list" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Coach Community</div>
        </a>
        </li>
        <li>
        <a href="/journal-list-coach" class="nav2--list">
        <div class="nav2--journal"></div>
        <div class="nav2--name">Coach Journals</div>
        </a>
        </li>
  
        <li>
        <a href="/node/add/campaign" class="nav2--list">
        <div class="nav2--addcampaign"></div>
        <div class="nav2--name">Add Campaign</div>
        </a>
        </li>


        <li>
        <a href="/node/add/event" class="nav2--list">
        <div class="nav2--addproject"></div>
        <div class="nav2--name">Add Event</div>
        </a>
        </li> 
        <?php } ?>

        <li>
        <a href="/dashboard" class="nav2--list">
        <div class="nav2--dashboard"></div>
        <div class="nav2--name">Dashboard</div></a>
        </li> 

        
        <?php } ?>
        
        
    </ul>    
    </div>
    
    <div class="col-xs-5 profilebox" >
    <div class="profilebox--wrap--img">
        <?php $data_user = user_load($user->uid); 

        if(!empty($data_user->picture)){ ?>
          <img src="/sites/default/files/pictures/<?php print $data_user->picture->filename; ?>">
        <?php 
        }
        else{ ?>

          <img src="/sites/all/themes/changemakers/images/soc-userdisplay-default.jpg">
        <?php
        }
        ?>
        
        
        <!--
        <img typeof="foaf:Image" class="img-responsive" src="http://changemakers.devfunction.com/sites/default/files/%E0%B8%95%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%99%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%84%E0%B8%B4%E0%B8%94-12.jpg" />
        -->
    </div>    
        
    
    <div class="profilebox--detail">
        <div class="profilebox--detaiL--arrow"></div>
    <a href="/user">
    <p class="profilebox--detail--username"><?php print $user->name;?></p>    
    <p class="profilebox--detail--name"><?php  print $my_profile->field_profile_firstname['und'][0]['value']." ".$my_profile->field_profile_lastname['und'][0]['value']; ?></p>
    </a>
    
    <ul class="list-inline profilebox--detail--link">
    <li><a href="/user/" class=""><i class="icon-profile-verify member--verify"></i> Profile</a></li>
    <li><a href="/changemakers/logout" class=""><i class="icon-lock-open-alt"></i> Logout</a></li>
    </ul>
    
    </div>    
        
    </div>    
    </div>  
    <!--          <ul class="list-inline" id="index--link__gray">
                <li class="leaf"><a href="/user/" class=""><i class="icon-profile"></i> My Account</a></li>
                <li class="leaf"><a href="/user/logout" class=""><i class="icon-lock-open-alt"></i> logout</a></li>
              </ul>
    -->
            <?php }else{ ?>
              <ul class="list-inline" id="index--link__gray">
                  <li class="leaf"><a href="/user/register" class=""><i class="icon-profile"></i> Register</a></li>
                <li class="leaf"><a href="" data-toggle="modal" data-target="#myLogin" class=""><i class="icon-lock"></i> Log in</a></li>
              </ul>
            <?php } ?>
            
            
            
            
        </div>
        
        </div><!--row-->
    </div>    
    </div>
        
        
        
      
      <div class="col-xs-12 nav navbar">
        <div class="container">  
        <div class="row">
              <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
                <nav role="navigation" class="col-xs-8">
                <?php if (!empty($primary_nav)): 
                    
                    print render($primary_nav); ?>
                <?php endif; ?>
                <?php if (!empty($secondary_nav)): ?>
                    <?php //print render($secondary_nav); ?>
                <?php endif; ?>
                <?php if (!empty($page['navigation'])): ?>
                    <?php print render($page['navigation']); ?>
                <?php endif; ?>
                </nav>
                  
                  
                  
                  
          
              
                <div class="search-top form col-xs-3 col-xs-offset-1 text-right">
                    <form method="get" id="search" enctype="multipart/form-data" action="/search"  accept-charset="UTF-8" >
                      <div class="input-group row"  style="padding-top:5px;">
                      <input type="text" name="search" class="form-control search--field " required="required" placeholder="Search ...">
                      <span class="input-group-btn">
                      <button class="btn btn--default" type="submit" style=" padding: 5px 20px!important;"><span class="icon-search"></span></button>
                      </span>
                      </div>
                    </form>
                </div>
          
        </div>
    <?php endif; ?>
        </div>
      </div>
        
      

           
</header><!-- End of Header-->       
    
 
<div class="main--container <?php print $container_class; ?>">

  <header role="banner" id="page-header">
    <?php print render($page['header']); ?>
  </header> <!-- /#page-header -->
<style type="text/css">
   /* .navbar{
        box-shadow: 0 2px 1px #e2e2e2!important;*/
    
    }
    
</style>    
    
</div><!--END Container-->   
        
      <?php if (!empty($breadcrumb)): ?>
      <div class="breadcrumb--wrap">
      <div class="main--container <?php print $container_class; ?>">
      <?php print $breadcrumb; ?>
      </div></div>
      <?php endif; ?>
      <a id="main-content"></a>

    
 <div class="main--container  <?php print $container_class; ?>">   
  <div class="row sidesection-bg" >

    <?php if (!empty($page['sidebar_first'])): ?>
      
      <aside class="col-xs-3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
      
    <?php endif; ?>
    
      
      
    <section <?php print $content_column_class; ?>>
        
    
      <?php if (!empty($page['highlighted'])): ?>
        
        <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
        
      <?php endif; ?>
    
        
      <?//php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
        
          <!--<a id="main-content"></a>-->
        
      <?php print render($title_prefix); ?>
      <?php if (!empty($title)): ?>
      
        <!-- <h1 class="page-header"><?php print $title; ?></h1>-->
      <?php endif; ?>
        
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
        
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
        
      <?php if (!empty($action_links)): ?>
       
            <ul class="action-links"><?php print render($action_links); ?></ul>
       
      <?php endif; ?>
        
      <?php print render($page['content']); ?>
    </section>

    <?php if (!empty($page['sidebar_second'])): ?>
      
        <aside class="col-xs-3 page__topmargin" role="complementary">
        <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
      
    <?php endif; ?>

  </div>
    
    



<?php if (!empty($page['footer'])): ?>


<?php print render($page['footer']); ?>
   
      



     
<div class="col-xs-12  participate--box ">
    <h1 class="headline--block headline__alte"> LET'S <span class="headline__bold">PARTICIPATE</span></h1>
    <div class="row">
    <div class="col-xs-12 ">
        <div class="row">
        <div class="col-xs-3" >
        <a href="/participate-university-partner" class="para--link">
        <div class="row">
        <div class="participate--block1 ">
        <h3 class="participate--headline font__thaisan">TAKE A CLASS</h3>
        <br><br>
        <p>อยากลงมือสร้างความเปลี่ยนแปลง เริ่มต้นด้วยการดาวน์โหลดเครื่องมือพัฒนา<br>ไอเดีย หรือเข้าชั้นเรียนกับเราได้ที่นี่
        </p>
        <a href="/participate-university-partner" class="participate--btn">Learn more <span class="glyphicon glyphicon-play-circle"></span></a>
        </div></div>
        </a>
        </div>

        <div class="col-xs-3">
        <a href="/participate-helpdesk" class="para--link">
        <div class="row">    
        <div class="participate--block2 ">
        <h3 class="participate--headline font__thaisan">CHANGE STARTS HERE</h3>
        <br><br>
        <p>พร้อมเริ่มต้นโครงการ/กิจการเพื่อสังคม สร้างโปรเจกต์กับเราได้ที่นี่
        </p>
        <a href="/participate-helpdesk" class="participate--btn">Learn more <span class="glyphicon glyphicon-play-circle"></span></a>
        </div></div>
        </a>
        </div>

        <div class="col-xs-3">
        <a href="/participate-coach" class="para--link">
        <div class="row">
        <div class="participate--block3 ">
        <h3 class="participate--headline font__thaisan">BECOME A COACH</h3>
        <br><br>    
        <p>การสนับสนุนที่สำคัญที่สุดสำหรับ Social Startups คือ พี่เลี้ยง สมัครเป็นโค้ชได้ที่นี่
        </p>
        <a href="/participate-coach" class="participate--btn">Learn more <span class="glyphicon glyphicon-play-circle"></span></a>
        </div></div>
        </a>
        </div>

        <div class="col-xs-3">
        <a href="/participate-changemaker" class="para--link">
        <div class="row">
        <div class="participate--block4 ">
        <h3 class="participate--headline font__thaisan">INVEST IN CHANGEMAKERS</h3>
        <br><br>
        <p>สนับสนุนคนรุ่นใหม่ในการแก้ปัญหาสังคมกับเราได้ที่นี่</p>
        <a href="/participate-changemaker" class="participate--btn">Learn more <span class="glyphicon glyphicon-play-circle"></span></a>
            </div></div>
        </a>
        </div>
    </div></div>
</div>
</div><!--Participate-->



    
<div class="about col-xs-12 ">
    
<div class="row">
    
    <div class="col-xs-10 ">
    <h1 class="headline--alte">ABOUT US</h1>
     <p class="about--txt">School of Changemakers พื้นที่แลกเปลี่ยนเรียนรู้ของเหล่านักเปลี่ยนแปลงสังคมหรือคนที่สนใจแก้ไขปัญหาด้วยความคิดริเริ่มสร้างสรรค์และนวัตกรรม 
(Creativity &amp; Innovation) เว็บไซต์นี้ได้รวบรวมข่าวคราวความเคลื่อนไหวทั้งในและต่างประเทศ ความรู้ เครื่องมือและกิจกรรมต่างๆ รวมถึงเครือข่ายของ
เหล่านักเปลี่ยนแปลงสังคม (Changemakers) ที่จะช่วยส่งเสริมและสนับสนุนให้คนได้ป้องกันหรือแก้ไขปัญหาสังคมด้วยนวัตกรรม (Social Innovation) 
หรือ ร่วมเป็นส่วนหนึ่งของการสร้างการเปลี่ยนแปลงสังคมได้ (Everyone A Changemaker)</p>
        
        <a href="/about-us">
				  <div class="viewmore--line row col-xs-12"><div  class="viewmore--btn row">READ MORE <i class="glyphicon glyphicon-play-circle"></i></div></div> 
		    </a>
        
        
    </div>
    

    
    
      <div class="col-xs-2  logo--sponsor--box">
        
        <!--  
        <div class="logo--sponsor--block" style="border-right: 1px solid #565655;"><img class="logo--sponsor--foot" src="http://changemakers.devfunction.com/sites/all/themes/changemakers/images/logo-ashoka.png"></div>
          
        <div class="logo--sponsor--block" ><a href="#"><img class="logo-sponsor-foot" src="http://changemakers.devfunction.com/sites/all/themes/changemakers/images/logo-sorsorsor.png"></a></div>
        -->
    </div>


</div>             
</div>      



<?php endif; ?>
</div> <!--END CONTAINER-->

<!--<div class="index--footer--bg__white"></div>-->
<footer class="footer--box  col-xs-12" >
    
   
        <div class="container">
        
        <div class="footer--logo col-xs-2 bw"></div>
            
        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="footer--nav col-xs-6 col-xs-offset-4 list-inline text-right" >
            
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
                  
        

        <p class="col-xs-12 row">@2015 Ashoka - School of Change makers | <a href="#">Term of Use</a></p>
        </div>
    
</footer> 


<?php 
// print "<pre>";
// print_r($form);
// print "</pre>";

 ?>

<!-- Modal Intro-->
<div class="modal fade" id="myLogin" role="dialog" >
    <div class="modal-dialog modal-lg">
    
        <!-- Modal content-->
        <div class="modal-dialog modal-dialog-center">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Login</h2>
            </div>
            <div class="modal-body">
              <?php //$elements = drupal_get_form("user_login"); 
                    //$form = drupal_render($elements);
                    //print "<pre>";
                    //print_r($elements);
                    //print "</pre>";
              //onsubmit="return check_user_login()"
              //action="/changemakers/check_login"
                    ?>
              <form method="post" id="user-login" enctype="multipart/form-data" action="/user/login"   accept-charset="UTF-8" >
              <!-- <form enctype="multipart/form-data" action="/changemakers/update-profile" onsubmit="return check_user_login()" method="post" id="user-profile-form" accept-charset="UTF-8"> -->
                <div>
                  <div class="form-item form-item-name form-type-textfield form-group"> 
                    <!-- <label class="control-label" for="username_login"> </label> -->
                    <input placeholder="username or email" class="form-control form-text" type="text" id="username_login" name="name" value="" size="60" maxlength="60">
                  </div>
                  <div class="form-item form-item-pass form-type-password form-group"> 
                    <!-- <label class="control-label" for="pass_login"> </label> -->
                    <input placeholder="Password" class="form-control form-text" type="password" id="pass_login" name="pass" size="60" maxlength="60">
                  </div>
                  <input type="hidden" name="form_build_id" value="<?php print isset($elements['form_build_id']['#value'])?$elements['form_build_id']['#value']:''; ?>">
                  <input type="hidden" name="form_id" value="user_login">
                  <p id="show-error"></p>
                  <div class="form-actions form-wrapper form-group" id="edit-actions">
                     <button type="submit" id="edit-submit" name="op" value="Log in" onclick="return check_user_login()"  class="btn btn--submit">Log in</button>
                  </div>

                  <div id="forgot_password" class="margin__top10">
                    <a href="" data-toggle="modal" data-dismiss="modal" data-target="#myForgot" title="Forgot your password">Forgot your password</a>
                  </div>
                  <div id="forgot_password" class="margin__top10">
                    <a href="/user/register">Register</a>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      
    </div>
</div> 

<!-- Modal Intro-->
<div class="modal fade" id="myForgot" role="dialog">
    <div class="modal-dialog modal-lg">    
        <!-- Modal content-->
        <div class="modal-dialog modal-dialog-center">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Forgot Password</h4>
            </div>
            <div class="modal-body">
            <div class="alert alert-danger error-massage"></div>
              <?php //$elements_pass = drupal_get_form("user_pass"); 
                // print "<pre>";
                // print_r($elements_pass);
                // print "</pre>";
              ?>
              <form method="post" id="user-forget-pass" enctype="multipart/form-data" action="/user/password"  accept-charset="UTF-8" >
                <div>
                  <div class="form-item form-item-name form-type-textfield form-group"> 
                    <label class="control-label" for="edit-name">
                      <span class="form-required" title="This field is required."></span>
                    </label>
                    <input class="form-control form-text required" id="edit-name2" name="name" placeholder="E-mail" value="" size="60" maxlength="254" type="text">
                  </div>
                  <div id="show-error-email"> </div>
                  <input name="form_build_id" value="<?php  print isset($elements_pass['form_build_id']['#value'])?$elements_pass['form_build_id']['#value']:''; ?>" type="hidden">
                  <input name="form_id" value="user_pass" type="hidden">
                  <div class="form-actions form-wrapper form-group" id="edit-actions">
                      
                    <button type="submit" i id="edit-submit" name="op" value="E-mail new password" onclick="return check_forgot_password()" class="btn btn--submit">Request new password</button>
                  </div>
                </div>
             </form>

            </div>
          </div>

        </div>
      
    </div>
</div> 

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1044418628957648',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>






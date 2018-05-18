<?php
global $user;

if(user_is_logged_in() && isset($user->roles[3])){
?>
<div class="col-xs-12 ">
    <div class="row">
        <div class=" page__topmargin">
            <h2 class="headline headline__alte"> Content Managemant </h2>
        </div>
       
        <ul class="block--admin-manage">
            <li class="admin-manage-btn">
                <span><a href="/manage/banner" target="_blank"><div class="icon-manage-banner"></div> Manage Banner</a></span>
                <ul>  
                    <li class="admin-submanage-btn"><a href="/node/add/banner?destination=manage/banner" target="_blank"><i class=" icon-plus-circled"></i> Add Banner</a></li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/campaign" target="_blank"><div class="icon-manage-campaign"></div> Manage Campaign</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/campaign" target="_blank"><i class=" icon-plus-circled"></i> Add Campaign</a>
                    </li>
                </ul>
            </li>
           <li class="admin-manage-btn">
                <span><a href="/manage/community" target="_blank"><div class="icon-manage-commu"></div> Manage Community Post</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/forum" target="_blank"><i class=" icon-plus-circled"></i> Add Community Post</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/event" target="_blank"><div class="icon-manage-event"></div> Manage Event</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/event" target="_blank"><i class=" icon-plus-circled"></i> Add Event</a>
                    </li>
                </ul>
            </li>
           
            <li class="admin-manage-btn">
                <span><a href="/manage/journal" target="_blank"><div class="icon-manage-journal"></div> Manage Journal</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/journal" target="_blank"><i class=" icon-plus-circled"></i> Add Journal</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/knowledge" target="_blank"><div class="icon-manage-knowledge"></div> Manage Knowledge</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/knowledge" target="_blank"><i class=" icon-plus-circled"></i> Add Knowledge</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/news" target="_blank"><div class="icon-manage-news"></div> Manage News</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/news" target="_blank"><i class=" icon-plus-circled"></i> Add News</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/online-course" target="_blank"><div class="icon-manage-course"></div> Manage Online Course</a></span>
                <ul>  
                    <li class="admin-submanage-btn">
                        <a href="/node/add/course" target="_blank"><i class=" icon-plus-circled"></i> Add Online Course</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/project" target="_blank"><div class="icon-manage-project"></div> Manage Project</a></span>
                <ul>  
                    <li class="admin-submanage-btn"><a href="/node/add/project" target="_blank"><i class=" icon-plus-circled"></i> Add Project</a>
                    </li>
                </ul>
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/taxonomy" target="_blank"><div class="icon-manage-tax"></div> Manage Taxonomy</a></span>                
            </li>
            <li class="admin-manage-btn">
                <span><a href="/manage/user" target="_blank"><div class="icon-manage-user"></div> Manage User</a></span>
                <ul>  
                    <li class="admin-submanage-btn"><a href="/admin/people/create" target="_blank"><i class=" icon-plus-circled"></i> Add User</a></li>
                </ul>
            </li>
            
            
        </ul>
    </div>
</div>
<?php
}else{
  echo "you are not authorized to access this page";
}
?>

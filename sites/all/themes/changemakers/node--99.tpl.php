<div class="col2--sidebar2 nav-blue ">
    <div class="participate-nav ">
        <a href="/participate-take-a-class"><div class="red--tap">Take a class
            <div class="arrow"></div>
        </div></a>
        <a href="/participate-change-starts-here"><div class="blue--tap">Change Starts Here
            <div class="arrow"></div>
        </div></a>
        <a href="/participate-become-a-coach"><div class="yellow--tap">Become a coach
            <div class="arrow"></div>
        </div></a>
        <a href="/participate-invest-in-changemakers"><div class="gray--tap">Invest in changemakers
            <div class="arrow"></div>
        </div></a>
    </div>
</div>




<div class="col2--viewcontent2 ">
<div class="col-xs-12 viewcontent--box bottom__blue">
    <h1 class="headline__thaisan viewcontent--title">Change Starts Here</h1>
    
    <div class="sidebar--line "></div>

    <div class="col-xs-12  viewcontent--detail "> 
        <ul class="margin__top10">
            <li>หากคุณทนเห็นปัญหาอะไรสักอย่างต่อไป โดยไม่ทําอะไรไม่ได้แล้ว หรือมีไอเดียดีๆ ที่คิดว่าน่าจะช่วยประเทศหรือชุมชนของเราได้ </li>
            <li>หากคุณเห็นตัวอย่างโครงการ/กิจการเพื่อสังคมเจ๋งๆ จากต่างประเทศ และคิดว่าน่าจะมีใครทำแบบเดียวกันในเมืองไทย</li>
            <li>หากคุณอยากเป็นเจ้าของกิจการในอนาคต เลยคิดอยากลองริเร่ิมอะไรสักอย่างตั้งแต่ตอนนี้</li>
            <li>หรือคุณอยากทํางานกับเพื่อน หรือคนที่คุณจะเร่ิมโครงการด้วยอย่างที่สุด</li>
        </ul>


        

<div style="margin-left:25px;">
        <h4 class="margin__top30">เพื่ออะไร?</h4>
        <p class="margin__top10">
เพื่อดึงเอาด้านดีของคุณ ของเพื่อนคุณ และทุกคนๆ ที่คุณทำโครงการด้วยออกมา คุณจะมีความหวัง และสร้างความหวังให้คนรอบข้าง<br>
เพื่อทำให้คุณเข้าใจว่าในทุกความท้าทาย หรือวิกฤต คือโอกาส  <br>
เพื่อให้คุณได้เจอคนน่าสนใจ และเจอคนที่คนคิดว่า “แบบนี้ก็มีในโลก” และรู้ว่าคุณจะอยู่ร่วมกับเขาเหล่านั้นอย่างไร<br>
เพื่อหาที่ยืนของคุณบนโลกใบนี้ ว่าคุณทำประโยชน์อะไรได้ อย่างไร<br>
เพื่อเรียนรู้ว่าคุณทำอะไรได้ดี ทำอะไรแล้วมีความสุข <br>
เพื่อเปลี่ยนแปลงชีวิตคุณตลอดไป
        </p>
        </div>
    </div>
                   
        <div class=" txt__center margin__topbut15 col-xs-12">
        <?php 
        global $user;

        if($user->uid == 0){ ?>
            <a href="" data-toggle="modal" data-target="#myLogin" >
                <button id="back_show_detail" class="btn btn--default " style="margin-top:0;">สร้างโครงการหรือกิจการเพื่อสังคม กับ School of Changemakers วันนี้ ที่นี่ </button>
            </a>
        <?php }else if(isset($user->roles[10]) || isset($user->roles[4])){ ?>
            <a href="/node/add/project">
                <button id="back_show_detail" class="btn btn--default " style="margin-top:0;">สร้างโครงการหรือกิจการเพื่อสังคม กับ School of Changemakers วันนี้ ที่นี่ </button>
            </a>
        <?php } ?>
        
       
    </div>
    
</div>
</div>    
    

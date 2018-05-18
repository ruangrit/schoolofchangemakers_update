
<style type="text/css">
.checkbox_height{
  height: 280px !important;
}
.checkbox_height_center{
  height: 240px !important;
}
.checkbox_height_footer{
  height: 300px !important;
}
.checkbox_margin_buttom{
  margin-bottom: 5px !important;
}
</style>





<section class="col-sm-12">

<?php

// ob_start();    //    This buffer stores any output , if your page does have.
// header("Cache-Control: no-cache, must-revalidate");
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");


drupal_set_title('REGISTER');

// print "tong";





    //print drupal_render(drupal_get_form('user_register'));

    $form = drupal_get_form('user_register_form');

    //print drupal_render_children($form);







    // if(isset($_POST['field_profile_social'])){

    //     print '<pre>';

    //     print_r($_POST['field_profile_social']);

    //     print '</pre>';

    // }







?>

    <?php if($form['administer_users']['#value'] == 1): ?>

    <div class="col-xs-12">

      <?php //print drupal_render_children($form) ?>

    </div>

    <?php endif; ?>

    <?php if($form['administer_users']['#value'] == 0): ?>

    <div>

        <?php //print drupal_render_children($form) ?>



    </div>

    <form  class="user-info-from-cookie"  action="/user/register" autocomplete="off" method="post" name="register_changemaakers" id="user-register-form" accept-charset="UTF-8">
        <div>

            <div class="field-group-multipage-group-wrapper group-register-profile field-group-multipage-group row">

                <h2 class="element-invisible">Multipage</h2>
                
                <div class="col-xs-12" style=" text-align:center;  margin-top:20px;">

                    <div class="progress-bar">

                        <span class="active" id="step1">

                          <div class="cir small"></div>

                          <div class="progress-line"></div>

                          <div class="cir step">1</div>

                        </span>

                        <span id="step2">

                          <div class="progress-line"></div>

                          <div class="cir step">2</div>

                        </span>

                        <span id="step3">

                          <div class="progress-line"></div>

                          <div class="cir step">3</div>

                        </span>

                        <div class="progress-line"></div>

                        <div class="cir small"></div>

                    </div>

                </div>





                <div class="col-xs-12 register--wrap" >

                <div class="white--arr__up register--wrap--arrow--up"></div>



                <div class="multipage-panes multipage-processed">

                    <div id="page_one" class="field-group-multipage required-fields group-register-group1 multipage-closed form-wrapper multipage-pane">

                            <div class="col-xs-12">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">ชื่อจริง <span class="txt__red"></span></label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="field-type-list-text field-name-field-profile-title field-widget-options-select form-wrapper form-group" id="edit-field-profile-title">

                                        <div class="form-item form-item-field-profile-title-und form-type-select form-group">

                                            <div class="col-xs-3">

                                               <select class="form-control form-select" id="edit-field-profile-title-und" name="field_profile_title[und]">

                                                    <option value="_none" selected="selected">คำนำหน้า</option>

                                                    <option value="1" <?php echo isset($_POST['field_profile_title'])&&$_POST['field_profile_title']['und']==1?'selected="selected"':'';?>>นาย</option>

                                                    <option value="2" <?php echo isset($_POST['field_profile_title'])&&$_POST['field_profile_title']['und']==2?'selected="selected"':'';?>>นาง</option>

                                                    <option value="3" <?php echo isset($_POST['field_profile_title'])&&$_POST['field_profile_title']['und']==3?'selected="selected"':'';?>>นางสาว</option>

                                                    <?php

                                                       /* if(isset($_POST['field_profile_title'])){

                                                            if($_POST['field_profile_title']['und'] == 1){ ?>

                                                                <option value="_none" >None</option>

                                                                <option value="1" selected="selected">นาย</option>

                                                                <option value="2">นาง</option>

                                                                <option value="3">นางสาว</option>

                                                            <?php }

                                                            else if($_POST['field_profile_title']['und'] == 2){ ?>

                                                                <option value="_none" >None</option>

                                                                <option value="1">นาย</option>

                                                                <option value="2" selected="selected" >นาง</option>

                                                                <option value="3">นางสาว</option>

                                                            <?php }

                                                            else{ ?>

                                                                <option value="_none">None</option>

                                                                <option value="1">นาย</option>

                                                                <option value="2">นาง</option>

                                                                <option value="3" selected="selected">นางสาว</option>

                                                            <?php }

                                                        }*/

                                                    ?>

                                                </select>

                                            </div>

                                            <div class="col-xs-4">

                                            <span class="alert--field--name">กรุณากรอกชื่อ</span>



                                               <input class="text-full form-control required" placeholder="ชื่อ" type="text" id="edit-field-profile-firstname-und-0-value" name="field_profile_firstname[und][0][value]" value="<?php if(isset($_POST['field_profile_firstname'])) echo $_POST['field_profile_firstname']['und'][0]['value'];  ?>" size="60" maxlength="255">

                                            </div>

                                             <div class="col-xs-4">

                                                 <span class="alert--field--surname">กรุณากรอกนามสกุล</span>

                                               <input class="text-full form-control required" placeholder="นามสกุล" type="text" id="edit-field-profile-lastname-und-0-value" name="field_profile_lastname[und][0][value]" value="<?php if(isset($_POST['field_profile_lastname'])) echo $_POST['field_profile_lastname']['und'][0]['value'];  ?>" size="60" maxlength="255">

                                            </div>

                                        </div>

                                    </div>





                                    <div class="field-type-text field-name-field-profile-firstname field-widget-text-textfield form-wrapper form-group" id="edit-field-profile-firstname">

                                        <div id="field-profile-firstname-add-more-wrapper">

                                            <div class="form-item form-item-field-profile-firstname-und-0-value form-type-textfield form-group">



                                            </div>

                                        </div>

                                    </div>

                                    <div class="field-type-text field-name-field-profile-lastname field-widget-text-textfield form-wrapper form-group" id="edit-field-profile-lastname">

                                        <div id="field-profile-lastname-add-more-wrapper">

                                            <div class="form-item form-item-field-profile-lastname-und-0-value form-type-textfield form-group">



                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top20">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">Username <span class="txt__red">*</span></label><br>

                                    <span class="detail__small">(กรุณาใช้ตัวอักษรภาษาอังกฤษหรือตัวเลข ขนาดไม่เกิน 15 ตัวอักษรและชื่อนี้จะไม่สามารถเปลี่ยนแปลงภายหลังได้)</span>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-6">

                                        <div class="form-item form-item-name form-type-textfield form-group">

                                            <span class="alert--field--username">กรุณาใส่ Username</span>

                                            <span class="alert--field--username-check-error">ไม่สามารถใช้ Username นี้ได้</span>

                                            <span class="alert--field--username-check-success">สามารถ Username นี้ได้</span>

                                            <input  type="text" autocomplete="off" id="edit-name" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" size="60" maxlength="15" placeholder="ใส่ชื่อที่ต้องการใช้ในระบบ" class="form-control form-text">

                                            <input type="hidden" name="checkusername" id="checkusername">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top10">

                                <div class="form-item form-item-pass form-type-password-confirm form-group">





                                        <div class="col-xs-3">

                                            <br>


                                            <label class="topic">

                                                Password <span class="txt__red">*</span>

                                            </label>

                                            <span class="detail__small">(กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร)</span>



                                            <div class="label" aria-live="assertive"></div>

                                    </div>

                                        <div class="col-xs-9">

                                        <div class="has-error form-item form-item-pass-pass1 form-type-password form-group col-xs-6 has-feedback">

                                            <br>

                                            <span class="alert--field--password">กรุณากรอกรหัสผ่านให้มากกว่า 6 ตัวอักษร</span>

                                            <input autocomplete="off" class="password-field form-control form-text required password-processed" type="password" id="edit-pass-pass1--2" name="pass[pass1]" size="25" maxlength="128">

                                            <span class="glyphicon form-control-feedback"></span>

                                            <div class="progress">

                                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

                                            </div>

                                        </div>

                                        </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top10">



                                        <div class="col-xs-3">

                                            <br>



                                            <label class="control-label topic" for="edit-pass-pass2--2">Confirm password <span class="form-required txt__red" title="This field is required.">*</span></label></div>

                                        <div class="col-xs-9">

                                        <div class="has-error form-item form-item-pass-pass2 form-type-password form-group col-xs-6 has-feedback">

                                            <br>

                                            <span class="alert--field--repassword">คุณใส่รหัสผ่านไม่ตรงกัน</span>

                                            <span class="alert--field--passwordmatch">คุณใส่รหัสผ่านไม่ตรงกัน</span>

                                            <input autocomplete="off" class="password-confirm form-control form-text required" type="password" id="edit-pass-pass2--2" name="pass[pass2]" size="25" maxlength="128">

                                        </div>

                                            </div>

                                        <div class="help-block password-help"></div>

                            </div>

                            <div class="col-xs-12 margin__top20">

                                <div class="col-xs-3">

                                    <br/>



                                    <label class="topic">วัน เดือน ปีเกิด <span class="txt__red">*</span></label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-6">

                                        <div id="edit-field-profile-birthdate-und-0-value" class="date-padding">

                                            <div class="form-item form-item-field-profile-birthdate-und-0-value-date form-type-textfield form-group">

                                                <span class="alert--field--birthday">กรุณาระบุวันเดือนปีเกิด</span>



                                                <input class="date-clear form-control form-text form-text required" type="text" id="edit-field-profile-birthdate-und-0-value-datepicker-popup-0"  name="field_profile_birthdate[und][0][value][date]" value="<?php if(isset($_POST['field_profile_birthdate'])) echo $_POST['field_profile_birthdate']['und'][0]['value']['date']; ?>" size="20" maxlength="30">

                                                <div class="help-block"> E.g., 25/11/2015</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top5">

                                <div class="col-xs-3">

                                    <br/>



                                    <label class="topic">ที่อยู่ที่ติดต่อได้ <span class="txt__red">*</span></label>

                                    <br><span class="detail__small">(ข้อมูลส่วนนี้จะไม่แสดงเป็นสาธารณะ)</span>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-10">

                                        <span class="alert--field--address">กรุณาใส่ที่อยู่</span>

                                        <div class="">

                                            <textarea class="required" id="field_profile_address" name="field_profile_address[und][0][value]" cols="60" rows="5" ><?php if(isset($_POST['field_profile_address'])) echo $_POST['field_profile_address']['und'][0]['value']; ?></textarea>

                                            <div class="grippie"></div>

                                        </div>



                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top5">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">จังหวัด <span class="txt__red">*</span></label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>



                                    <div class="col-xs-6">

                                        <span class="alert--field--province">กรุณาระบุจังหวัด</span>

                                        <select class="form-control form-select required" id="edit-field-profile-province-und" name="field_profile_province[und]">

                                            <?php

                                                if(!isset($_POST['field_profile_province']['und'])){ ?>

                                                    <option value="กรุงเทพมหานคร" <?php if($_POST['field_profile_province']['und']=="กรุงเทพมหานคร") echo "selected=\"selected\""; ?> >กรุงเทพมหานคร</option>

                                                <?php }

                                                else { ?>

                                                    <option value="กรุงเทพมหานคร" selected="selected">กรุงเทพมหานคร</option>

                                                <?php  }





                                            ?>

                                            <option value="กระบี่" <?php if($_POST['field_profile_province']['und']=="กระบี่") echo "selected=\"selected\""; ?> >กระบี่ </option>

                                            <option value="กาญจนบุรี" <?php if($_POST['field_profile_province']['und']=="กาญจนบุรี") echo "selected=\"selected\""; ?> >กาญจนบุรี </option>

                                            <option value="กาฬสินธุ์" <?php if($_POST['field_profile_province']['und']=="กาฬสินธุ์") echo "selected=\"selected\""; ?> >กาฬสินธุ์ </option>

                                            <option value="กำแพงเพชร" <?php if($_POST['field_profile_province']['und']=="กำแพงเพชร") echo "selected=\"selected\""; ?> >กำแพงเพชร </option>

                                            <option value="ขอนแก่น" <?php if($_POST['field_profile_province']['und']=="ขอนแก่น") echo "selected=\"selected\""; ?> >ขอนแก่น</option>

                                            <option value="จันทบุรี" <?php if($_POST['field_profile_province']['und']=="จันทบุรี") echo "selected=\"selected\""; ?> >จันทบุรี</option>

                                            <option value="ฉะเชิงเทรา" <?php if($_POST['field_profile_province']['und']=="ฉะเชิงเทรา") echo "selected=\"selected\""; ?> >ฉะเชิงเทรา </option>

                                            <option value="ชัยนาท" <?php if($_POST['field_profile_province']['und']=="ชัยนาท") echo "selected=\"selected\""; ?> >ชัยนาท </option>

                                            <option value="ชัยภูมิ" <?php if($_POST['field_profile_province']['und']=="ชัยภูมิ") echo "selected=\"selected\""; ?> >ชัยภูมิ </option>

                                            <option value="ชุมพร" <?php if($_POST['field_profile_province']['und']=="ชุมพร") echo "selected=\"selected\""; ?> >ชุมพร </option>

                                            <option value="ชลบุรี" <?php if($_POST['field_profile_province']['und']=="ชลบุรี") echo "selected=\"selected\""; ?> >ชลบุรี </option>

                                            <option value="เชียงใหม่" <?php if($_POST['field_profile_province']['und']=="เชียงใหม่") echo "selected=\"selected\""; ?> >เชียงใหม่ </option>

                                            <option value="เชียงราย" <?php if($_POST['field_profile_province']['und']=="เชียงราย") echo "selected=\"selected\""; ?> >เชียงราย </option>

                                            <option value="ตรัง" <?php if($_POST['field_profile_province']['und']=="ตรัง") echo "selected=\"selected\""; ?> >ตรัง </option>

                                            <option value="ตราด" <?php if($_POST['field_profile_province']['und']=="ตราด") echo "selected=\"selected\""; ?> >ตราด </option>

                                            <option value="ตาก"<?php if($_POST['field_profile_province']['und']=="ตาก") echo "selected=\"selected\""; ?> >ตาก </option>

                                            <option value="นครนายก" <?php if($_POST['field_profile_province']['und']=="นครนายก") echo "selected=\"selected\""; ?> >นครนายก </option>

                                            <option value="นครปฐม" <?php if($_POST['field_profile_province']['und']=="นครปฐม") echo "selected=\"selected\""; ?> >นครปฐม </option>

                                            <option value="นครพนม" <?php if($_POST['field_profile_province']['und']=="นครพนม") echo "selected=\"selected\""; ?> >นครพนม </option>

                                            <option value="นครราชสีมา" <?php if($_POST['field_profile_province']['und']=="นครราชสีมา") echo "selected=\"selected\""; ?> >นครราชสีมา </option>

                                            <option value="นครศรีธรรมราช" <?php if($_POST['field_profile_province']['und']=="นครศรีธรรมราช") echo "selected=\"selected\""; ?> >นครศรีธรรมราช </option>

                                            <option value="นครสวรรค์" <?php if($_POST['field_profile_province']['und']=="นครสวรรค์") echo "selected=\"selected\""; ?> >นครสวรรค์ </option>

                                            <option value="นราธิวาส" <?php if($_POST['field_profile_province']['und']=="นราธิวาส") echo "selected=\"selected\""; ?> >นราธิวาส </option>

                                            <option value="น่าน" <?php if($_POST['field_profile_province']['und']=="น่าน") echo "selected=\"selected\""; ?> >น่าน </option>

                                            <option value="นนทบุรี" <?php if($_POST['field_profile_province']['und']=="นนทบุรี") echo "selected=\"selected\""; ?> >นนทบุรี </option>

                                            <option value="บึงกาฬ" <?php if($_POST['field_profile_province']['und']=="บึงกาฬ") echo "selected=\"selected\""; ?> >บึงกาฬ</option>

                                            <option value="บุรีรัมย์" <?php if($_POST['field_profile_province']['und']=="บุรีรัมย์") echo "selected=\"selected\""; ?> >บุรีรัมย์</option>

                                            <option value="ประจวบคีรีขันธ์" <?php if($_POST['field_profile_province']['und']=="ประจวบคีรีขันธ์") echo "selected=\"selected\""; ?> >ประจวบคีรีขันธ์ </option>

                                            <option value="ปทุมธานี" <?php if($_POST['field_profile_province']['und']=="ปทุมธานี") echo "selected=\"selected\""; ?> >ปทุมธานี </option>

                                            <option value="ปราจีนบุรี" <?php if($_POST['field_profile_province']['und']=="ปราจีนบุรี") echo "selected=\"selected\""; ?> >ปราจีนบุรี </option>

                                            <option value="ปัตตานี" <?php if($_POST['field_profile_province']['und']=="ปัตตานี") echo "selected=\"selected\""; ?> >ปัตตานี </option>

                                            <option value="พะเยา" <?php if($_POST['field_profile_province']['und']=="พะเยา") echo "selected=\"selected\""; ?> >พะเยา </option>

                                            <option value="พระนครศรีอยุธยา" <?php if($_POST['field_profile_province']['und']=="พระนครศรีอยุธยา") echo "selected=\"selected\""; ?> >พระนครศรีอยุธยา </option>

                                            <option value="พังงา" <?php if($_POST['field_profile_province']['und']=="พังงา") echo "selected=\"selected\""; ?> >พังงา </option>

                                            <option value="พิจิตร" <?php if($_POST['field_profile_province']['und']=="พิจิตร") echo "selected=\"selected\""; ?> >พิจิตร </option>

                                            <option value="พิษณุโลก" <?php if($_POST['field_profile_province']['und']=="พิษณุโลก") echo "selected=\"selected\""; ?> >พิษณุโลก </option>

                                            <option value="เพชรบุรี" <?php if($_POST['field_profile_province']['und']=="เพชรบุรี") echo "selected=\"selected\""; ?> >เพชรบุรี </option>

                                            <option value="เพชรบูรณ์" <?php if($_POST['field_profile_province']['und']=="เพชรบูรณ์") echo "selected=\"selected\""; ?> >เพชรบูรณ์ </option>

                                            <option value="แพร่" <?php if($_POST['field_profile_province']['und']=="แพร่") echo "selected=\"selected\""; ?> >แพร่ </option>

                                            <option value="พัทลุง" <?php if($_POST['field_profile_province']['und']=="พัทลุง") echo "selected=\"selected\""; ?> >พัทลุง </option>

                                            <option value="ภูเก็ต" <?php if($_POST['field_profile_province']['und']=="ภูเก็ต") echo "selected=\"selected\""; ?> >ภูเก็ต </option>

                                            <option value="มหาสารคาม" <?php if($_POST['field_profile_province']['und']=="มหาสารคาม") echo "selected=\"selected\""; ?> >มหาสารคาม </option>

                                            <option value="มุกดาหาร" <?php if($_POST['field_profile_province']['und']=="มุกดาหาร") echo "selected=\"selected\""; ?> >มุกดาหาร </option>

                                            <option value="แม่ฮ่องสอน" <?php if($_POST['field_profile_province']['und']=="แม่ฮ่องสอน") echo "selected=\"selected\""; ?> >แม่ฮ่องสอน </option>

                                            <option value="ยโสธร" <?php if($_POST['field_profile_province']['und']=="ยโสธร") echo "selected=\"selected\""; ?> >ยโสธร </option>

                                            <option value="ยะลา" <?php if($_POST['field_profile_province']['und']=="ยะลา") echo "selected=\"selected\""; ?> >ยะลา </option>

                                            <option value="ร้อยเอ็ด" <?php if($_POST['field_profile_province']['und']=="ร้อยเอ็ด") echo "selected=\"selected\""; ?> >ร้อยเอ็ด </option>

                                            <option value="ระนอง" <?php if($_POST['field_profile_province']['und']=="ระนอง") echo "selected=\"selected\""; ?> >ระนอง </option>

                                            <option value="ระยอง" <?php if($_POST['field_profile_province']['und']=="ระยอง") echo "selected=\"selected\""; ?> >ระยอง </option>

                                            <option value="ราชบุรี" <?php if($_POST['field_profile_province']['und']=="ราชบุรี") echo "selected=\"selected\""; ?> >ราชบุรี</option>

                                            <option value="ลพบุรี" <?php if($_POST['field_profile_province']['und']=="ลพบุรี") echo "selected=\"selected\""; ?> >ลพบุรี </option>

                                            <option value="ลำปาง" <?php if($_POST['field_profile_province']['und']=="ลำปาง") echo "selected=\"selected\""; ?> >ลำปาง </option>

                                            <option value="ลำพูน" <?php if($_POST['field_profile_province']['und']=="ลำพูน") echo "selected=\"selected\""; ?> >ลำพูน </option>

                                            <option value="เลย" <?php if($_POST['field_profile_province']['und']=="เลย") echo "selected=\"selected\""; ?> >เลย </option>

                                            <option value="ศรีสะเกษ" <?php if($_POST['field_profile_province']['und']=="ศรีสะเกษ") echo "selected=\"selected\""; ?> >ศรีสะเกษ</option>

                                            <option value="สกลนคร" <?php if($_POST['field_profile_province']['und']=="สกลนคร") echo "selected=\"selected\""; ?> >สกลนคร</option>

                                            <option value="สงขลา" <?php if($_POST['field_profile_province']['und']=="สงขลา") echo "selected=\"selected\""; ?> >สงขลา </option>

                                            <option value="สมุทรสาคร" <?php if($_POST['field_profile_province']['und']=="สมุทรสาคร") echo "selected=\"selected\""; ?> >สมุทรสาคร </option>

                                            <option value="สมุทรปราการ" <?php if($_POST['field_profile_province']['und']=="สมุทรปราการ") echo "selected=\"selected\""; ?> >สมุทรปราการ </option>

                                            <option value="สมุทรสงคราม" <?php if($_POST['field_profile_province']['und']=="สมุทรสงคราม") echo "selected=\"selected\""; ?> >สมุทรสงคราม </option>

                                            <option value="สระแก้ว" <?php if($_POST['field_profile_province']['und']=="สระแก้ว") echo "selected=\"selected\""; ?> >สระแก้ว </option>

                                            <option value="สระบุรี" <?php if($_POST['field_profile_province']['und']=="สระบุรี") echo "selected=\"selected\""; ?> >สระบุรี </option>

                                            <option value="สิงห์บุรี" <?php if($_POST['field_profile_province']['und']=="สิงห์บุรี") echo "selected=\"selected\""; ?> >สิงห์บุรี </option>

                                            <option value="สุโขทัย" <?php if($_POST['field_profile_province']['und']=="สุโขทัย") echo "selected=\"selected\""; ?> >สุโขทัย </option>

                                            <option value="สุพรรณบุรี" <?php if($_POST['field_profile_province']['und']=="สุพรรณบุรี") echo "selected=\"selected\""; ?> >สุพรรณบุรี </option>

                                            <option value="สุราษฎร์ธานี" <?php if($_POST['field_profile_province']['und']=="สุราษฎร์ธานี") echo "selected=\"selected\""; ?> >สุราษฎร์ธานี </option>

                                            <option value="สุรินทร์" <?php if($_POST['field_profile_province']['und']=="สุรินทร์") echo "selected=\"selected\""; ?> >สุรินทร์ </option>

                                            <option value="สตูล" <?php if($_POST['field_profile_province']['und']=="สตูล") echo "selected=\"selected\""; ?> >สตูล </option>

                                            <option value="หนองคาย" <?php if($_POST['field_profile_province']['und']=="หนองคาย") echo "selected=\"selected\""; ?> >หนองคาย </option>

                                            <option value="หนองบัวลำภู" <?php if($_POST['field_profile_province']['und']=="หนองบัวลำภู") echo "selected=\"selected\""; ?> >หนองบัวลำภู </option>

                                            <option value="อำนาจเจริญ" <?php if($_POST['field_profile_province']['und']=="อำนาจเจริญ") echo "selected=\"selected\""; ?> >อำนาจเจริญ </option>

                                            <option value="อุดรธานี" <?php if($_POST['field_profile_province']['und']=="อุดรธานี") echo "selected=\"selected\""; ?> >อุดรธานี </option>

                                            <option value="อุตรดิตถ์" <?php if($_POST['field_profile_province']['und']=="อุตรดิตถ์") echo "selected=\"selected\""; ?> >อุตรดิตถ์ </option>

                                            <option value="อุทัยธานี" <?php if($_POST['field_profile_province']['und']=="อุทัยธานี") echo "selected=\"selected\""; ?> >อุทัยธานี </option>

                                            <option value="อุบลราชธานี" <?php if($_POST['field_profile_province']['und']=="อุบลราชธานี") echo "selected=\"selected\""; ?> >อุบลราชธานี</option>

                                            <option value="อ่างทอง" <?php if($_POST['field_profile_province']['und']=="อ่างทอง") echo "selected=\"selected\""; ?> >อ่างทอง </option>

                                            <option value="อื่นๆ" <?php if($_POST['field_profile_province']['und']=="อื่นๆ") echo "selected=\"selected\""; ?> >อื่นๆ</option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top5">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">รหัสไปรษณีย์ <span class="txt__red">*</span></label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-6">

                                        <span class="alert--field--zipcode">กรุณาใส่รหัสไปรษณีย์</span>

                                        <input maxlength="5" class="text-full form-control form-text required" type="text" id="edit-field-profile-zipcode-und-0-value" name="field_profile_zipcode[und][0][value]" value="<?php if(isset($_POST['field_profile_zipcode'])) echo $_POST['field_profile_zipcode']['und'][0]['value'];?>" size="60" maxlength="5">

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top20">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">Social Network ที่ใช้ประจำ </label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-4">

                                        <select class="form-control form-select" id="edit-field-profile-social-und" name="field_profile_social[und]">

                                            <?php if (isset($_POST['field_profile_social'])) { ?>



                                                <option value="เลือก"    <?php if($_POST['field_profile_social']['und']=="เลือก") echo "selected=\"selected\""; ?> > เลือก </option>

                                                <option value="facebook" <?php if($_POST['field_profile_social']['und']=="facebook") echo "selected=\"selected\""; ?> >Facebook</option>

                                                <option value="twitter"  <?php if($_POST['field_profile_social']['und']=="twitter") echo "selected=\"selected\""; ?> >Twitter</option>

                                                <option value="line"     <?php if($_POST['field_profile_social']['und']=="line") echo "selected=\"selected\""; ?> >Line ID</option>

                                            <?php }else { ?>

                                                <option value="เลือก" selected="selected">เลือก</option>

                                                <option value="facebook">Facebook</option>

                                                <option value="twitter">Twitter</option>

                                                <option value="line">Line ID</option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                    <div class="col-xs-6">

                                        <input class="text-full form-control form-text" placeholder="ชื่อที่ใช้" type="text" id="edit-field-profile-social-name-und-0-value" name="field_profile_social_name[und][0][value]" value="<?php if(isset($_POST['field_profile_social_name'])) echo $_POST['field_profile_social_name']['und'][0]['value']; ?>" size="60" maxlength="255">

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top20">

                                <div class="col-xs-3">

                                    <br/>

                                    <label class="topic">ช่องทางการติดต่อ</label>

                                </div>

                                <div class="col-xs-9">

                                    <br/>

                                    <div class="col-xs-10">

                                        <div class="form-item form-item-mail form-type-textfield form-group">

                                            <div class="col-xs-3">

                                                <label>โทรศัพท์มือถือ <span class="txt__red">*</span> </label>

                                            </div>

                                            <div class="col-xs-9">

                                                <span class="alert--field--tel">กรุณาใส่เบอร์โทรศัพท์ จำนวน 10 หลัก</span>

                                                <input maxlength="10"  class="text-full form-control form-text required" pattern="[0-9]{10}" title="เบอร์โทรศัพท์ 10 หลัก" type="text" id="edit-field-profile-phone-und-0-value" name="field_profile_phone[und][0][value]" value="<?php if(isset($_POST['field_profile_phone'])) echo $_POST['field_profile_phone']['und'][0]['value']; ?>" size="60" maxlength="255">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-10">

                                        <div class="form-item form-item-mail form-type-textfield form-group">

                                            <div class="col-xs-3">

                                                <br/>

                                                <label>อีเมล <span class="txt__red">*</span></label>

                                            </div>

                                            <div class="col-xs-9">

                                                <br/>

                                                <span class="alert--field--email">กรุณาใส่อีเมล</span>

                                                <span class="alert--field--email-check-error">ไม่สามารถใช้อีเมลนี้ได้ เนื่องจากมีอยู่ในระบบแล้ว</span>

                                                <input class="form-control form-text required" type="text" id="edit-mail" name="mail" value="<?php if(isset($_POST['mail'])) echo $_POST['mail']; ?>" size="60" maxlength="254">

                                                <input type="hidden" name="checkemail" id="checkemail">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xs-10">

                                        <div class="form-item form-item-mail form-type-textfield form-group">

                                            <div class="col-xs-10">

                                                <br/>

                                                <div id="edit-field-profile-contact-und" class="form-checkboxes">

                                                    <div class="form-item form-item-field-profile-contact-und-1 form-type-checkbox checkbox">

                                                        <label class="control-label" for="edit-field-profile-contact-und-1">

                                                            <input type="checkbox" id="edit-field-profile-contact-und-1"  name="field_profile_contact[und][1]" <?php if(isset($_POST['field_profile_contact']['und'][1])) echo "checked" ?> value="1" class="form-checkbox">สะดวกให้ติดต่อทางโทรศัพท์ได้

                                                        </label>

                                                    </div>

                                                    <div class="form-item form-item-field-profile-contact-und-2 form-type-checkbox checkbox">

                                                        <label class="control-label" for="edit-field-profile-contact-und-2">

                                                            <input type="checkbox" id="edit-field-profile-contact-und-2" name="field_profile_contact[und][2]" <?php if(isset($_POST['field_profile_contact']['und'][2])) echo "checked" ?> value="2" class="form-checkbox">สะดวกให้ติดต่อทาง email ได้

                                                        </label>

                                                    </div>

                                                    <div class="form-item form-item-field-profile-contact-und-3 form-type-checkbox checkbox">

                                                        <label class="control-label" for="edit-field-profile-contact-und-3">

                                                            <input type="checkbox" id="edit-field-profile-contact-und-3" name="field_profile_contact[und][3]" <?php if(isset($_POST['field_profile_contact']['und'][3])) echo "checked" ?> value="3" class="form-checkbox">ยินดีรับ e-newsletter จาก School of Changemakers

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 margin__top20">

                                    <div class="col-xs-3">

                                        <br/>

                                        <label class="topic">อาชีพปัจจุบัน</label>

                                    </div>

                                    <div class="col-xs-9">

                                        <br/>

                                        <div class="col-xs-4">

                                            <div id="edit-field-profile-to-study-und" class="form-checkboxes">

                                                <div class="form-item form-item-field-profile-to-study-und-1 form-type-checkbox checkbox">



                                                    <label class="control-label" for="edit-field-profile-to-study-und-1">

                                                        <input type="checkbox" id="edit-field-profile-to-study-und-1" name="field_profile_to_study[und][1]" <?php if(isset($_POST['field_profile_to_study']['und']['1'])) echo "checked" ?> value="1" class="form-checkbox check-learn"> ยังศึกษาอยู่

                                                     </label>



                                                </div>

                                            </div>

                                        </div>

                                        <div id="learn-opt" class="col-xs-offset-1" style="display: none">

                                        <div class="col-xs-10 ">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    ระดับการศึกษา

                                                </div>

                                                <div class="col-xs-5">

                                                    <br/>

                                                    <select class="form-control form-select" id="edit-field-profile-education-level-und" name="field_profile_education_level[und]">

                                                        <?php

                                                        if (isset($_POST['field_profile_education_level'])) { ?>

                                                             <option value="_none" <?php if($_POST['field_profile_education_level']['und']=="1") echo "selected=\"selected\""; ?>>เลือก</option>

                                                            <option value="1" <?php if($_POST['field_profile_education_level']['und']=="1") echo "selected=\"selected\""; ?>>มัธยมศึกษา(หรือเทียบเท่า)</option>

                                                            <option value="2" <?php if($_POST['field_profile_education_level']['und']=="2") echo "selected=\"selected\""; ?>>ปริญญาตรี (หรือเทียบเท่า)</option>

                                                            <option value="3" <?php if($_POST['field_profile_education_level']['und']=="3") echo "selected=\"selected\""; ?>>ปริญญาโท</option>

                                                            <option value="4" <?php if($_POST['field_profile_education_level']['und']=="4") echo "selected=\"selected\""; ?>>ปริญญาเอก</option>



                                                         <?php



                                                         }

                                                         else{ ?>



                                                            <option value="_none" selected="selected">เลือก</option>

                                                            <option value="1">มัธยมศึกษา(หรือเทียบเท่า)</option>

                                                            <option value="2">ปริญญาตรี (หรือเทียบเท่า)</option>

                                                            <option value="3">ปริญญาโท</option>

                                                            <option value="4">ปริญญาเอก</option>



                                                        <?php



                                                         }

                                                        ?>



                                                    </select>

                                                </div>

                                                <div class="col-xs-4">

                                                   <!-- <br/>

                                                    <select class="form-control form-select" id="edit-field-profile-education-year-und" name="field_profile_education_year[und]">

                                                        <option value="1" selected="selected">ชั้นปี</option>

                                                        <option value="2">ปี 1</option><option value="2">ปี 2</option>

                                                        <option value="3">ปี 3</option><option value="4">ปี 4</option>

                                                    </select>-->



                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    สถาบัน<br>
                                                    <small>(กรุณาใส่ชื่อเต็มสถาบันหรือสถานศึกษาให้ถูกต้อง)</small>

                                                </div>

                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input type="hidden" id="organization_tax" name="field_organization[und]" value="<?php if(isset($_POST['field_profile_institution'])) echo $_POST['field_profile_institution']['und'][0]['value']; ?>" size="60" maxlength="1024" class="form-text form-autocomplete">

                                                    <input class="text-full form-control form-text" type="text" id="edit-field-profile-institution-und-0-value" name="field_profile_institution[und][0][value]" value="<?php if(isset($_POST['field_profile_institution'])) echo $_POST['field_profile_institution']['und'][0]['value']; ?>" size="60" maxlength="255">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    คณะ / หลักสูตร

                                                </div>

                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input class="text-full form-control form-text" type="text" id="edit-field-profile-faculty-und-0-value" name="field_profile_faculty[und][0][value]" value="<?php if(isset($_POST['field_profile_faculty'])) echo $_POST['field_profile_faculty']['und'][0]['value']; ?>" size="60" maxlength="255">

                                                </div>

                                            </div>

                                        </div>

                                        <br><br>

                                        <div class="row"> </div>

                                        </div>

                                       <!-- <div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    สาขาเอก

                                                </div>

                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input class="text-full form-control form-text" type="text" id="edit-field-profile-major-und-0-value" name="field_profile_major[und][0][value]" value="" size="60" maxlength="255">

                                                </div>

                                            </div>

                                        </div>-->





                                        <div class="row"> </div>

                                        <div class="col-xs-4 margin__top10 " >

                                            <div id="edit-field-profile-working-und" class="form-checkboxes">

                                                <div class="form-item form-item-field-profile-working-und-1 form-type-checkbox checkbox">

                                                    <label class="control-label" for="edit-field-profile-working-und-1">

                                                        <input type="checkbox" id="edit-field-profile-working-und-1" name="field_profile_working[und][1]" <?php if(isset($_POST['field_profile_working']['und'][1])) echo "checked" ?> value="1" class="form-checkbox check-work">ทำงานแล้ว

                                                    </label>

                                                </div>

                                            </div>

                                        </div>



                                        <div id="work-opt" style="display: none;" class="col-xs-offset-1">

                                        <div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    อาชีพ

                                                </div>



                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input class="text-full form-control form-text" type="text" id="" name="" value="" size="60" maxlength="255">

                                                    <!--

                                                    <select class="form-control form-select" id="edit-field-profile-job-line-und" name="field_profile_job_line[und]">

                                                        <option value="เลือก">เลือก</option>

                                                        <option value="เกษตรกร">เกษตรกร</option>

                                                        <option value="โปรแกรมเมอร์">โปรแกรมเมอร์</option>

                                                    </select>

                                                    -->

                                                </div>

                                            </div>

                                        </div>

                                        <!--<div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    ตำแหน่งงาน

                                                </div>

                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input class="text-full form-control form-text" type="text" id="edit-field-profile-job-position-und-0-value" name="field_profile_job_position[und][0][value]" value="" size="60" maxlength="255">

                                                </div>

                                            </div>

                                        </div>-->

                                        <div class="col-xs-10">

                                            <div class="form-item form-item-mail form-type-textfield form-group">

                                                <div class="col-xs-3">

                                                    <br/>

                                                    สถานที่ทำงาน

                                                </div>

                                                <div class="col-xs-9">

                                                    <br/>

                                                    <input class="text-full form-control form-text" type="text" id="edit-field-profile-workplace-und-0-value" name="field_profile_workplace[und][0][value]" value="" size="60" maxlength="255">

                                                </div>

                                            </div>

                                        </div>

                                        <br><br>

                                        </div>





                                    </div>
                                <span class="multipage-counter">
                                    <em class="placeholder"></em><em class="placeholder"></em>
                                </span>
                            </div>

                            <div class="clearfix">

                                <!--<div class="multipage-controls-list  clearfix">-->

                                <div class="form-actions form-wrapper form-group" id="edit-actions">

                                    <input type="hidden" name="form_build_id" value="<?php echo $form['form_build_id']['#value'];?>">

                                    <!--  <input type="text" name="form_token" value="vB6sXp1Xcg_4jkfeDiJlbMYxRelHcQKl-RpgEEPWeTc"> -->

                                    <input type="hidden" name="form_id" value="user_register_form">

                                    <!-- <button type="submit" id="edit-submit" name="op" value="Confirm Registration" class="btn btn-primary form-submit">

                                        Confirm Registration

                                    </button> -->

                                </div>

                                <div class="row "></div><br><br>

                                <span class="multipage-button  margin__top20">

                                    <input type="button" class="form-submit multipage-link-previous" value="Previous page" style="display: none;">

                                    <center><button type="button" id="next_page" class="btn btn--submit" value="Next Section">Next Section <i class="glyphicon glyphicon-play-circle"></i></button></center>

                                    <span id="active-multipage-control" class="element-invisible">(active page)</span>

                                </span>

                            </div>





                    </div>

                </div>









                <!--Page Two-->




                    <div id="page_two" class="field-group-multipage required-fields group-register-group2 multipage-closed form-wrapper multipage-pane" style="display:none" > <!--style="display: none;" -->
                      <div class="fieldset-wrapper multipage-pane-wrapper">

                        <div class="col-xs-12">

                          <div class="col-xs-3">
                            <br/>
                            <label class="topic">บทบาทที่สนใจ</label>
                          </div>

                          <div class="col-xs-9">
                            <div class="col-xs-12">
                              <div class="field-type-list-text field-name-field-profile-join field-widget-options-buttons form-wrapper form-group" id="edit-field-profile-join">
                                <div class="form-item form-item-field-profile-join-und form-type-checkboxes form-group">
                                  <label class="control-label" for="edit-field-profile-join-und"> </label>
                                  <div id="edit-field-profile-join-interest-und" class="form-checkboxes">

                                    <div class="form-item form-item-field-profile-join-interest-und-เป็น-changemaker-หรือเข้าร่วมโปรเจค form-type-checkbox checkbox">
                                      <label class="control-label" for="edit-field-profile-join-interest-und-changemaker-">
                                        <input type="checkbox"
                                          id="edit-field-profile-join-interest-und-changemaker-" name="field_profile_join_interest[und][เป็น Changemaker หรือเข้าร่วมโปรเจค]"
                                          <?php if(isset($_POST['field_profile_join_interest']['und']['เป็น Changemaker หรือเข้าร่วมโปรเจค'])) echo "checked" ?>
                                          value="เป็น Changemaker หรือเข้าร่วมโปรเจค"
                                          class="form-checkbox">
                                        Changemakers (ผู้สนใจทำโปรเจกต์หรือกิจการเพื่อสังคม)
                                      </label>
                                    </div>

                                    <div class="form-item form-item-field-profile-join-interest-und-เป็น-coach form-type-checkbox checkbox">
                                      <label class="control-label" for="edit-field-profile-join-interest-und-coach">
                                        <input type="checkbox" id="edit-field-profile-join-interest-und-coach" name="field_profile_join_interest[und][เป็น Coach]" <?php if(isset($_POST['field_profile_join_interest']['und']['เป็น Coach'])) echo "checked" ?>  value="เป็น Coach" class="form-checkbox">Coach (ผู้สนใจเป็นโค้ชให้กับ Changemakers ในระบบบ่มเพาะ)
                                      </label>
                                    </div>

                                    <div class="form-item form-item-field-profile-join-interest-und-เป็นผู้สนับสนุนโปรเจค form-type-checkbox checkbox">
                                      <label class="control-label" for="edit-field-profile-join-interest-und-">
                                        <input type="checkbox" id="edit-field-profile-join-interest-und-" name="field_profile_join_interest[und][เป็นผู้สนับสนุนโปรเจค]" <?php if(isset($_POST['field_profile_join_interest']['und']['เป็นผู้สนับสนุนโปรเจค'])) echo "checked" ?> value="เป็นผู้สนับสนุนโปรเจค" class="form-checkbox">Partner &amp; Supporter (ผู้สนับสนุน องค์กรเครือข่าย มหาวิทยาลัย หน่วยงานรัฐ และเอกชน)
                                      </label>
                                    </div>

                                    <div class="form-item form-item-field-profile-join-interest-und-เป็นผู้สังเกตการณ์ form-type-checkbox checkbox">
                                      <label class="control-label" for="edit-field-profile-join-interest-und---2">
                                        <input type="checkbox" id="edit-field-profile-join-interest-und---2" name="field_profile_join_interest[und][เป็นผู้สังเกตการณ์]" <?php if(isset($_POST['field_profile_join_interest']['und']['เป็นผู้สังเกตการณ์'])) echo "checked" ?> value="เป็นผู้สังเกตการณ์" class="form-checkbox">เป็น Observer (ผู้สังเกตการณ์)
                                      </label>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-12 margin__top20">

                          <div class="col-xs-3">
                            <br />
                            <label class="topic">ทักษะและความสนใจของคุณ<br><span class="detail__small">(มีอยู่แล้วหรือต้องการพัฒนา)</span></label>
                          </div>
<?php
$term1 = taxonomy_get_tree(3);
?>
                          <div class="col-xs-9" id="edit-field-profile-target-group">

                            <div class="form-item form-item-field-profile-skill-interest-und form-type-checkboxes form-group" id="all-interest" >
                              <div id="edit-field-profile-skill-interest-und" class="form-checkboxes">

                                <div class="col-xs-12">
                                  <div class="checkbox_margin_buttom form-item form-item-field-profile-join-und form-type-checkboxes form-group">
                                    <div class="form-item form-item-field-profile-skill-interest-und-26 form-type-checkbox checkbox">
                                      <br>
                                      <label class="control-label font__bold" for="edit-field-profile-skill-interest-all">
                                        <input type="checkbox" id="edit-field-profile-skill-interest-all" <?php if(isset($_POST['field_profile_skill_interest_all'])) echo "checked" ?> name="field_profile_skill_interest_all"  value="26" class="form-checkbox"> All
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                <!-- Start : Computer IT -->
                            <?php
                            $run_parent_no = 0;
                            foreach($term1 as $key=>$value){

                                if ($value->name == "All") {
                                    continue;
                                }

                                $is_parent = false;
                                if( $value->depth === 0) {
                                    $is_parent = true;
                                    $run_parent_no++;
                                    $parent_id = $value->tid;
                                }

                                if($is_parent) {

                                    if($run_parent_no != 1) {
                                        print '</div>';
                                    }
                                    ?>
                                <div class="col-xs-12 checkbox_margin_buttom">

                                  <div class="checkbox_margin_buttom form-item form-item-field-profile-join-und form-type-checkboxes form-group">
                                    <div class="form-item form-item-field-profile-skill-interest-und-<?php print $value->tid;?> form-type-checkbox checkbox">
                                      <br/>
                                      <label class="control-label font__bold" for="edit-field-profile-skill-interest-und-<?php print $value->tid;?>">
                                        <input type="checkbox" id="edit-field-profile-skill-interest-und-<?php print $value->tid;?>" 
                                        name="field_profile_skill_interest[und][<?php print $value->tid;?>]" <?php if(isset($_POST['field_profile_skill_interest']['und']['<?php print $value->tid;?>'])) echo "checked" ?>  
                                        value="<?php print $value->tid;?>" class="form-checkbox parent_checkbox parent_checkbox_<?php print $value->tid;?>">
                                        <?php print $value->name;?>
                                      </label>
                                    </div>
                                  </div>

                                <?php
                                            
                                }
                                else {

                                    ?>
                                  <div class="col-xs-4">
                                    <?php // Todo Remove hard code
                                        if ($value->tid == 39) {
                                        ?>
                                    <div class="form-item form-item-field-profile-skill-interest-und-39 form-type-checkbox checkbox">

                                        <label class="control-label" for="edit-field-profile-skill-interest-und-39">
                                            <input type="checkbox" id="edit-field-profile-skill-interest-und-39" name="field_profile_skill_interest[und][39]" <?php if(isset($_POST['field_profile_skill_interest']['und']['39'])) echo "checked" ?> value="39"
                                             class="form-checkbox check-commu child_checkbox child_checkbox_<?php print $parent_id;?>" parentid="<?php print $parent_id;?>">ภาษาต่างประเทศ (ระบุภาษา)
                                        </label>

                                        <div id="commu-opt" style="display:none;">
                                            <div class="field-type-text field-name-field-proflie-language field-widget-text-textfield form-wrapper margin__top5" id="edit-field-proflie-language--2">
                                                <div id="field-proflie-language-add-more-wrapper--2 ">
                                                    <div class="form-item form-type-textfield form-item-field-proflie-language-und-0-value">
                                                        <input class="text-full form-text" type="text" placeholder="ระบุภาษา" id="edit-field-proflie-language-und-0-value--2" 
                                                        name="field_proflie_language[und][0][value]" value="<?php if(isset($_POST['field_proflie_language'])) echo $_POST['field_proflie_language']['und'][0]['value']; ?>" size="60" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                    </div>
                                        
                                        <?php 
                                        }
                                        else {
                                    ?>
                                    <div class="form-item form-item-field-profile-skill-interest-und-<?php print $value->tid;?> form-type-checkbox checkbox">
                                      <label class="control-label" for="edit-field-profile-skill-interest-und-<?php print $value->tid;?>">
                                        <input type="checkbox" id="edit-field-profile-skill-interest-und-<?php print $value->tid;?>" 
                                        name="field_profile_skill_interest[und][<?php print $value->tid;?>]" <?php if(isset($_POST['field_profile_skill_interest']['und']['33'])) echo "checked" ?>  
                                        value="<?php print $value->tid;?>" class="form-checkbox child_checkbox child_checkbox_<?php print $parent_id;?>" parentid="<?php print $parent_id;?>">
                                        <?php print $value->name; ?>
                                      </label>
                                    </div>
                                    <?php } ?>
                                  </div>

                                <?php

                                }

                            }


                            ?>
                            </div>
                        </div>
                        </div>
                        </div>

<?php
$term2 = taxonomy_get_tree(4);
?>
                          <!-- Start : Problem interest -->
                          <div class="col-xs-12 margin__top20">

                            <div class="col-xs-3">
                              <br>
                              <label class="topic">ปัญหาที่สนใจ</label>
                            </div>

                            <div class="col-xs-9">

                              <div class="form-item form-item-field-profile-problem-interest-und form-type-checkboxes form-group" id="all-problem">

                                <div id="edit-field-profile-problem-interest-und" class="form-checkboxes">

                                  <!-- Start : All option in problem -->
                                  <div class="form-item form-item-field-profile-problem-interest-und-8 form-type-checkbox checkbox">
                                    <br>
                                    <label class="control-label font__bold" for="edit-field-profile-problem-interest-und-all">
                                      <input type="checkbox" id="edit-field-profile-problem-interest-und-all" name="field_profile_problem_interest-all" <?php if(isset($_POST['field_profile_problem_interest-all'])) echo "checked" ?>  class="form-checkbox">All
                                    </label>
                                  </div>
                                  <!-- End : All option in problem -->

                            <?php
                            $run_parent_no = 0;
                            foreach($term2 as $key=>$value){

                                if ($value->name == "All") {
                                    continue;
                                }

                                $is_parent = false;
                                if( $value->depth === 0) {
                                    $is_parent = true;
                                    $run_parent_no++;
                                    $parent_id = $value->tid;
                                }

                                if($is_parent) {

                                    if($run_parent_no != 1) {
                                        print '</div></div></div>';
                                    }
                                    ?>
                                  <div class="col-xs-12 ">

                                    <div class="form-item form-item-field-profile-join-und form-type-checkboxes form-group">

                                        <div class="form-item form-item-field-profile-problem-interest-und-<?php print $value->tid;?> form-type-checkbox checkbox">
                                            <label class="control-label font__bold" for="edit-field-profile-problem-interest-und-<?php print $value->tid;?>">
                                                <br/>
                                                <input type="checkbox" id="edit-field-profile-problem-interest-und-<?php print $value->tid;?>" name="field_profile_problem_interest[und][<?php print $value->tid;?>]" <?php if(isset($_POST['field_profile_problem_interest']['und']['<?php print $value->tid;?>'])) echo "checked" ?> value="<?php print $value->tid;?>" class="form-checkbox parent_checkbox parent_checkbox_<?php print $value->tid;?>">
                                                <?php print $value->name; ?>
                                            </label>
                                        </div>
                                        <div class="col-xs-12 checkbox_margin_buttom">

                                <?php
                                            
                                }
                                else {

                                    ?>
                                        <div class="col-xs-4">
                                            <div class="form-item form-item-field-profile-problem-interest-und-<?php print $value->tid;?> form-type-checkbox checkbox ">
                                                <label class="control-label" for="edit-field-profile-problem-interest-und-<?php print $value->tid;?>">
                                                    <input type="checkbox" id="edit-field-profile-problem-interest-und-<?php print $value->tid;?>" name="field_profile_problem_interest[und][<?php print $value->tid;?>]" <?php if(isset($_POST['field_profile_problem_interest']['und']['<?php print $value->tid;?>'])) echo "checked" ?> value="<?php print $value->tid;?>" 
                                                    class="form-checkbox child_checkbox child_checkbox_<?php print $parent_id;?>" parentid="<?php print $parent_id;?>">
                                                    <?php print $value->name; ?>
                                                </label>
                                            </div>    
                                        </div>
                                <?php
                                }

                            }


                            ?>
                            </div>
                            </div>
                            </div>
                            </div>

                        </div>
                        </div>

 <!---  //  Start Target -->                       
<?php
$term3 = taxonomy_get_tree(5);
?>
                        <div class="row"></div>

                        <div class="col-xs-12 margin__top20" id="all-target">

                          <div class="col-xs-3">
                            <br/>
                            <label class="topic">กลุ่มเป้าหมายที่สนใจ</label>
                          </div>

                          <div class="col-xs-9" id="edit-field-profile-target-group-checkbox">

                            <div class="form-item form-item-field-profile-target-group-und-16 form-type-checkbox checkbox">

                              <div class="col-xs-12">
                                <br />
                                <label class="control-label font__bold" for="edit-field-profile-target-group-und-all">
                                    <input type="checkbox" id="edit-field-profile-target-group-und-all"  name="field_profile_target_group_all" <?php if(isset($_POST['field_profile_target_group_all'])) echo "checked" ?>  value="" class="form-checkbox">All
                                </label>

                                <div class="form-item form-item-field-profile-target-group-und form-type-checkboxes form-group">

                                  <div id="edit-field-profile-target-group-und" class="form-checkboxes">

                                    <div class="col-xs-12">

                                        <?php 
                                            foreach($term3 as $key=>$value){
                                                // Todo remove hardcode
                                                if ($value->name != "All" && $value->tid != 109) {
                                                ?>

                                              <div class="col-xs-4">
                                                <div class="form-item form-item-field-profile-target-group-und-<?php print $value->tid;?> form-type-checkbox checkbox">
                                                  <label class="control-label" for="edit-field-profile-target-group-und-<?php print $value->tid;?>">
                                                    <input type="checkbox" id="edit-field-profile-target-group-und-<?php print $value->tid;?>"  name="field_profile_target_group[und][<?php print $value->tid;?>]" <?php if(isset($_POST['field_profile_target_group']['und']['<?php print $value->tid;?>'])) echo "checked" ?> value="<?php print $value->tid;?>" class="form-checkbox target_child_checkbox">
                                                    <?php print $value->name; ?>
                                                  </label>
                                                </div>
                                              </div>
                                                <?php
                                                }
                                            }
                                        ?>
                                        <div class="col-xs-6">
                                            <div class="form-item form-item-field-profile-target-group-und-109 form-type-checkbox checkbox">
                                              <label class="control-label" for="edit-field-profile-target-group-und-109--2">
                                                <input id="edit-field-profile-target-group-und-109--2" name="field_profile_target_group[und][109]" <?php if(isset($_POST['field_profile_target_group']['und']['16'])) echo "checked" ?> value="109" class="form-checkbox check-target" type="checkbox">อื่นๆ (ระบุ)
                                              </label>
                                              <div id="target-select" style="display:none;">
                                                <input class="text-full form-control form-text margin__top5" id="edit-field-profile-target-group-other-und-0-value--2 " name="field_profile_target_group_other[und][0][value]" value="<?php if(isset($_POST['field_profile_target_group_other'])) echo $_POST['field_profile_target_group_other']['und'][0]['value']; ?>" size="60" maxlength="255" type="text"  placeholder="">
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                  </div>
                                </div>  

                                    

                                  </div>

                                </div>

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="row"></div>

                        <br><br>
                        <span class="multipage-counter">
                          <em class="placeholder"></em>  <em class="placeholder"></em>
                        </span>

                      </div>

                      <div class="multipage-controls-list clearfix" >




                        <div class="form-actions form-wrapper form-group" id="edit-actions">
                          <input type="hidden" name="form_id" value="user_register_form">
                          <center><br>
                          <div style="width:30%">
                            ยืนยันตัวตนว่าคุณไม่ใช่สแปม
                            <?php
                            print render($form['captcha']);
                            ?>
                          </div>
                            <br />
                            <button type="submit" id="edit-submit" name="op" value="Confirm Registration"   class="btn btn--submit" > Confirm Registration </button>
                          </center>
                        </div>

                        <span class="multipage-button">
                          <button type="submit" id="back_page"  class="btn btn--border " value="Previous page"> Previous page </button>
                          <!-- <button type="submit"   class="btn btn--submit" value="Next page" > Next page </button>-->
                        </span>

                      </div>

                    </div>

                  </div>

                  <?php  //print render($form['form_build_id']);?>
                  <?php //print_r($form['form_build_id']); ?>

                </div>









        </div>

    </form>

    <?php endif; ?>

</section>





<!-- <script   src="/sites/all/themes/changemakers/js/jquery-3.1.0.js"  ></script> -->

<script>
// document.getElementById("edit-name").setAttribute("autocomplete","off");
(function($) {

    $(document).ready(function(){


        $('#edit-name').attr('autocomplete','off');

	    	var dateToday = new Date();

            var lastyear = (dateToday.getFullYear() + -15);

			var yrRange = "1901:" + (dateToday.getFullYear());

        $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").datepicker(



        {

        	defaultDate: '01/01/'+lastyear,

        	dateFormat: 'dd/mm/yy',

		    changeYear:true,

		    changeMonth:true,

		    yearRange: yrRange



		 });

                    // store original so we can call it inside our overriding method

            $.datepicker._generateMonthYearHeader_original = $.datepicker._generateMonthYearHeader;



            $.datepicker._generateMonthYearHeader = function(inst, dm, dy, mnd, mxd, s, mn, mns) {

              var header = $($.datepicker._generateMonthYearHeader_original(inst, dm, dy, mnd, mxd, s, mn, mns)),

                  years = header.find('.ui-datepicker-year');



              // reverse the years

              years.html(Array.prototype.reverse.apply(years.children()));



              // return our new html

              return $('<div />').append(header).html();

            }

            $( "#edit-field-profile-birthdate-und-0-value-datepicker-popup-0" ).change(function() {
              $(".alert--field--birthday").css('display','none');
              $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").removeClass('error');
            });
        // $( "#edit-field-profile-birthdate-und-0-value-datepicker-popup-0" ).blur(function() {
        //   $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").removeClass('error');
        //   $(".alert--field--birthday").css('display','none');
        // });
    });

}(jQuery));

    // function isNumberKey(evt) {

    //     var charCode = (evt.which) ? evt.which : evt.keyCode;

    //     // Added to allow decimal, period, or delete

    //     if (charCode == 110 || charCode == 190 || charCode == 46)

    //         return true;

    //     if (charCode > 31 && (charCode < 48 || charCode > 57))

    //         return false;

    //     return true;

    // } // isNumberKey

    jQuery(function($){



        var dateToday = new Date();

        var day = dateToday.getDate();

        var month = dateToday.getMonth()+1;

        var year = dateToday.getFullYear();


        $('#user-register-form').attr('autocomplete', 'off');
        // var e = document.getElementById('edit-name');
        //$('#edit-name').attr("value","");
        // if ($.browser.webkit) {
        //     $('#edit-name').val(' ').val('');
        // }


        // e.autocomplete = 'off'; // Maybe should be false

        // $('#edit-field-profile-birthdate-und-0-value-datepicker-popup-0').change(function(){

        //     var value = $(this).val();

        //     var date = value.split("/");



        //     if(year<parseInt(date[2])){

        //         var d = day+'/'+month.toString()+'/'+year;

        //         $(this).val(d);

        //         alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');



        //     }else if(year==parseInt(date[2]) && month<parseInt(date[1])){

        //         var d = day+'/'+month.toString()+'/'+year;

        //         $(this).val(d);

        //         alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');



        //     }else if(year==parseInt(date[2]) && month==parseInt(date[1]) && day<parseInt(date[0])){

        //         var d = day+'/'+month.toString()+'/'+year;

        //         $(this).val(d);

        //         alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');



        //     }



        // });



    $("#edit-submit-login").click(function () {



                        var username_user = document.getElementById("username_login").value;

                        var password_user = document.getElementById("pass_login").value;

                        var base_url = window.location.origin;

                        $.ajax({

                            url: base_url+"/changemakers/check_login",

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

      $("#edit-submit-forgot-password").click(function () {



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



    $("#edit-name").keyup(function (e) {

        var username = document.getElementById("edit-name").value;

        var patt = /^[a-z|0-9]+$/i;

        if(patt.test(username)==false){

                $(".alert--field--username").html('กรุณาใส่ username เฉพาะภาษาอังกฤษหรือตัวเลข ให้ถูกต้อง ');

                $(".alert--field--username").css('display','block');

                $(".alert--field--username-check-error").css('display','none');

                checkempty("edit-name");

        }else{

                $(".alert--field--username").css('display','none');

                var url = "/api/changemakers/check/username";

                 var username = $("#edit-name").val();

                    $.ajax({

                      url: url,

                      type: "POST",

                      dataType: "text",

                      url: url,

                      data: { action:"checkusername",username: username},

                        success : function(data) {

                           if(data==1){

                                $("#edit-name").addClass('error');

                                $(".alert--field--username-check-success").css('display','none');

                                $(".alert--field--username-check-error").css('display','block');

                                $("#checkusername").val("1");

                           }else{

                                $("#edit-name").removeClass('error');

                                $(".alert--field--username-check-error").css('display','none');

                                $(".alert--field--username-check-success").css('display','none');

                                 $("#checkusername").val("0");

                           }

                        },

                        error: function (xhr, ajaxOptions, thrownError) {

                             $(".alert--field--username").html('ไม่สามารถเชื่อมต่อกับ Server ได้');

                            $(".alert--field--username").css('display','block');

                            $(".alert--field--username-check-error").css('display','none');



                        }

                    });

        }



    });

    $("#edit-mail").keyup(function (e) {

       var email = document.getElementById("edit-mail").value;

      var val_email = validateEmail(email);

      if(val_email==false){

            $(".alert--field--email").css('display','block');

            $(".alert--field--email-check-error").css('display','block');

            $(".alert--field--email").html("กรุณากรอกอีเมลให้ถูกต้อง");

            $(".alert--field--email-check-error").css('display','none');

            checkempty("edit-mail");

            // $("html, body").animate({ scrollTop: 0 }, 600);

        }else{

        	$(".alert--field--email").css('display','none');

            var url = "/api/changemakers/check/email";

            var email = $("#edit-mail").val();

            $.ajax({

              url: url,

              type: "POST",

              dataType: "text",

              url: url,

              data: { action:"checkmail",email: email},

                success : function(data) {

                   if(data==1){

                        $("#edit-mail").addClass('error');

                        $(".alert--field--email-check-error").html("ไม่สามารถใช้อีเมลนี้ได้ เนื่องจากมีอยู่ในระบบแล้ว");

                        $(".alert--field--email-check-success").css('display','none');

                        $(".alert--field--email-check-error").css('display','block');

                        $("#checkemail").val("1");

                   }else{

                        $("#edit-name").removeClass('error');

                        $(".alert--field--email-check-error").css('display','none');

                        $(".alert--field--email-check-success").css('display','none');

                        $("#checkemail").val("0");

                   }

                },

                error: function (xhr, ajaxOptions, thrownError) {

                    alert(ajaxOptions);

                   alert(thrownError);

                }

            });

        }



    });

    $("#edit-field-profile-phone-und-0-value").on('change keypress', function(e){


        var theEvent = e || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|[\b]/;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
        var length_text = $(this).val().length;
        if(length_text > 8){
                $(".alert--field--tel").css('display','none');
        }
        if (/\D/g.test(this.value))
        {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
        }


    });

    $("#field_profile_address").on('keyup', function(e){

        var length_text = $(this).val().length;
        if(length_text > 0){
            $(".alert--field--address").css('display','none');
        }else{
            $(".alert--field--address").css('display','block');
        }



    });

    $("#edit-field-profile-zipcode-und-0-value").on('keyup', function(e){

        var length_text = $(this).val().length;
        if(length_text == 5 || $(this).val() !=""){
            $(".alert--field--zipcode").css('display','none');
        }else{
            $(".alert--field--zipcode").css('display','block');
        }

    });

    $("#edit-field-profile-firstname-und-0-value").on('keyup', function(e){

        var length_text = $(this).val().length;
        if(length_text > 0){
            $(".alert--field--name").css('display','none');
        }else{
            $(".alert--field--name").css('display','block');
        }

    });

    $("#edit-field-profile-lastname-und-0-value").on('keyup', function(e){

        var length_text = $(this).val().length;
        if(length_text > 0){
            $(".alert--field--surname").css('display','none');
        }else{
            $(".alert--field--surname").css('display','block');
        }

    });

    $("#edit-pass-pass2--2").on('keyup', function(e){
        var pass = $("#edit-pass-pass1--2").val();
        var length_text = $(this).val();
        if(pass == length_text){
            $(".alert--field--repassword").css('display','none');
        }else{
            $(".alert--field--repassword").css('display','block');
        }

    });

        $("#next_page").click(function(){

            $(".alert--field--email").css('display','none');

            $(".alert--field--tel").css('display','none');

            $(".alert--field--zipcode").css('display','none');

            $(".alert--field--province").css('display','none');

            $(".alert--field--address").css('display','none');

            $(".alert--field--birthday").css('display','none');

            $(".alert--field--passwordmatch").css('display','none');

            $(".alert--field--repassword").css('display','none');

            $(".alert--field--password").css('display','none');

            $(".alert--field--username").css('display','none');

            $(".alert--field--surname").css('display','none');

            $(".alert--field--name").css('display','none');

            var firstname = document.getElementById("edit-field-profile-firstname-und-0-value").value;

            var lastname = document.getElementById("edit-field-profile-lastname-und-0-value").value;

            var username = document.getElementById("edit-name").value;

            var password = document.getElementById("edit-pass-pass1--2").value;

            var password2 = document.getElementById("edit-pass-pass2--2").value;

            var bday = document.getElementById("edit-field-profile-birthdate-und-0-value-datepicker-popup-0").value;

            var address = document.getElementById("field_profile_address").value;

            var province = document.getElementById("edit-field-profile-province-und").value;

            var zipcode = document.getElementById("edit-field-profile-zipcode-und-0-value").value;

            var phone = document.getElementById("edit-field-profile-phone-und-0-value").value;

            var email = document.getElementById("edit-mail").value;

            var institution = document.getElementById("edit-field-profile-institution-und-0-value").value;

            var checkusername = document.getElementById("checkusername").value;

            var checkemail = document.getElementById("checkemail").value;

            var str = /^\s*$/;


            var patt = /^[a-z|0-9]+$/i;


                    var url = "/api/changemakers/check/username";

                     var username = $("#edit-name").val();

                        $.ajax({

                          url: url,

                          type: "POST",

                          dataType: "text",

                          url: url,

                          data: { action:"checkusername",username: username},

                            success : function(data) {

                               if(data==1){

                                    $("#edit-name").addClass('error');

                                    $(".alert--field--username-check-success").css('display','none');

                                    $(".alert--field--username-check-error").css('display','block');

                                    $("#checkusername").val("1");

                                    if(checkusername==1){

                                        $(".alert--field--username-check-error").css('display','block');

                                        checkempty("edit-name");

                                    }



                                    var val_email = validateEmail(email);

                                    var check_have_email=0;

                                    // alert(patt.test(username));



                                    $('#organization_tax').val(institution);









                                    if(bday){

                                      $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").removeClass('error');

                                    }



                                    if(!email || str.test(email) ){

                                        $(".alert--field--email").css('display','block');

                                        $(".alert--field--email-check-error").css('display','none');

                                        checkempty("edit-mail");

                                    }

                                    if(val_email==false){

                                        $(".alert--field--email").html("กรุณากรอกอีเมลให้ถูกต้อง");

                                         $(".alert--field--email").css('display','block');

                                        $(".alert--field--email-check-error").css('display','block');

                                        $(".alert--field--email-check-error").css('display','none');

                                        checkempty("edit-mail");

                                        // $("html, body").animate({ scrollTop: 0 }, 600);

                                    }else{

                                         var url = "/api/changemakers/check/email";

                                    $.ajax({

                                          url: url,

                                          type: "POST",

                                          dataType: "text",

                                          url: url,

                                          data: { action:"checkmail",email: email},

                                            success : function(data) {

                                               if(data==1){

                                                    $("#edit-mail").addClass('error');

                                                    $(".alert--field--email-check-error").html("ไม่สามารถใช้อีเมลนี้ได้ เนื่องจากมีอยู่ในระบบแล้ว");

                                                    $(".alert--field--email-check-success").css('display','none');

                                                    $(".alert--field--email-check-error").css('display','block');



                                                    $("#checkemail").val("1");

                                                    check_have_email=1;

                                               }else{

                                                    $("#edit-name").removeClass('error');

                                                    $(".alert--field--email-check-error").css('display','none');

                                                    $(".alert--field--email-check-success").css('display','none');

                                                    $("#checkemail").val("0");

                                               }

                                            },

                                            error: function (xhr, ajaxOptions, thrownError) {

                                                alert(ajaxOptions);

                                               alert(thrownError);

                                            }

                                        });

                                    }

                                    if(checkemail==1 || check_have_email==1){

                                        $(".alert--field--email-check-error").css('display','block');

                                        checkempty("edit-mail");

                                    }

                                    if(!phone || (phone.length!=10) || str.test(phone)){

                                         $(".alert--field--tel").css('display','block');

                                         checkempty("edit-field-profile-phone-und-0-value");

                                     }

                                    if(!zipcode || str.test(zipcode)){

                                        $(".alert--field--zipcode").css('display','block');

                                        checkempty("edit-field-profile-zipcode-und-0-value")

                                    }

                                    if(!province || str.test(province)){

                                        $(".alert--field--province").css('display','block');

                                        checkempty("edit-field-profile-province-und");

                                    }

                                    if(!address || str.test(address)){

                                        $(".alert--field--address").css('display','block');

                                        checkempty("field_profile_address");

                                    }

                                    if(!bday || str.test(bday)){

                                        $(".alert--field--birthday").css('display','block');

                                        checkempty("edit-field-profile-birthdate-und-0-value-datepicker-popup-0");

                                    }



                                    if(!password2 || (password2.length<6) || str.test(password2)){

                                        $(".alert--field--passwordmatch").css('display','none');

                                        $("#edit-pass-pass2--2").addClass('error');

                                        $(".alert--field--repassword").css('display','block');

                                        checkempty("edit-pass-pass2--2");

                                    }

                                    if(!password || (password.length<6) || str.test(password)){

                                        $(".alert--field--passwordmatch").css('display','none');

                                        $("#edit-pass-pass1--2").addClass('error');

                                        $(".alert--field--password").css('display','block');

                                        checkempty("edit-pass-pass1--2");

                                    }
                                     if(password!=password2){

                                        $(".alert--field--repassword").css('display','none');

                                        $(".alert--field--password").css('display','none');

                                        $("#edit-pass-pass2--2").addClass('error');

                                        $("#edit-pass-pass1--2").addClass('error');

                                        $(".alert--field--passwordmatch").css('display','block');

                                        $("#edit-pass-pass2--2").focus();



                                    }



                                    if(!username  ){

                                        $(".alert--field--username").html('กรุณาใส่ username ');

                                        $(".alert--field--username").css('display','block');

                                        $(".alert--field--username-check-error").css('display','none');

                                        checkempty("edit-name");

                                    }

                                    if(patt.test(username)==false){

                                        $(".alert--field--username").html('กรุณาใส่ username เฉพาะภาษาอังกฤษหรือตัวเลข ให้ถูกต้อง ');

                                        $(".alert--field--username").css('display','block');

                                        $(".alert--field--username-check-error").css('display','none');

                                        checkempty("edit-name");

                                    }

                                    if(!lastname || str.test(lastname)){

                                        $(".alert--field--surname").css('display','block');

                                        checkempty("edit-field-profile-lastname-und-0-value");

                                    }

                                    if(!firstname || str.test(firstname)){

                                          $(".alert--field--name").css('display','block');

                                          checkempty("edit-field-profile-firstname-und-0-value");

                                    }







                                    //var myLength = $("#myTextbox").val().length;



                                    // if(firstname == ""){

                                    //     $("#edit-field-profile-firstname-und-0-value").addClass('error');

                                    //     $(".alert--field--name").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(lastname == ""){

                                    //     $("#edit-field-profile-lastname-und-0-value").addClass('error');

                                    //     $(".alert--field--surname").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(username == ""){

                                    //     $("#edit-name").addClass('error');

                                    //     $(".alert--field--username").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(password == "" || (password.length<6)){

                                    //     $(".alert--field--passwordmatch").css('display','none');

                                    //     $("#edit-pass-pass1--2").addClass('error');

                                    //     $(".alert--field--password").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(password2 == "" || (password2.length<6)){

                                    //     $(".alert--field--passwordmatch").css('display','none');

                                    //     $("#edit-pass-pass2--2").addClass('error');

                                    //     $(".alert--field--repassword").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }



                                    // if(bday == ""){

                                    //     $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").addClass('error');

                                    //     $(".alert--field--birthday").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(address == ""){

                                    //     $("#field_profile_address").addClass('error');

                                    //     $(".alert--field--address").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(province == ""){

                                    //     $("#edit-field-profile-province-und").addClass('error');

                                    //     $(".alert--field--address").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(zipcode == ""){

                                    //     $("#edit-field-profile-zipcode-und-0-value").addClass('error');

                                    //     $(".alert--field--zipcode").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }

                                    // if(phone == "" || (phone.length!=10)){

                                    //     $("#edit-field-profile-phone-und-0-value").addClass('error');

                                    //     $(".alert--field--tel").css('display','block');

                                    //     $("html, body").animate({ scrollTop: 0 }, 600);

                                    // }



                                    /*

                                    if(password.length < 6){

                                        alert("กรุณากรอกรหัสผ่านให้มากกว่า 6 ตัวอักษร");

                                    }*/

                                    // alert(phone.length);

                                    if(firstname && lastname && username && password && password.length >= 6 && password2 && bday && address && zipcode && phone && email && val_email==true && phone.length==10 && (password==password2) && checkusername==0 && checkemail==0 && check_have_email==0 && str.test(firstname)==false && str.test(lastname)==false && str.test(password)==false && str.test(password2)==false && str.test(bday)==false && str.test(address)==false && str.test(zipcode)==false && str.test(phone)==false && patt.test(username)==true){

                                        $("#edit-name").removeClass('error');

                                         $("#page_two").show();

                                        $("#page_one").hide();

                                        $("#step2" ).last().addClass( "active" );

                                        $(".register--wrap--arrow--up").attr('style', 'left: 550px');

                                         $("html, body").animate({ scrollTop: 0 }, 600);

                                    }

                               }else{

                                    $("#edit-name").removeClass('error');

                                    $(".alert--field--username-check-error").css('display','none');

                                    $(".alert--field--username-check-success").css('display','none');

                                    $("#checkusername").val("0");

                                    var val_email = validateEmail(email);

                                    var check_have_email=0;

                                    // alert(patt.test(username));



                                    $('#organization_tax').val(institution);









                                    if(bday){

                                      $("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0").removeClass('error');

                                    }



                                    if(!email || str.test(email) ){

                                        $(".alert--field--email").css('display','block');

                                        $(".alert--field--email-check-error").css('display','none');

                                        checkempty("edit-mail");

                                    }

                                    if(val_email==false){

                                        $(".alert--field--email").html("กรุณากรอกอีเมลให้ถูกต้อง");

                                         $(".alert--field--email").css('display','block');

                                        $(".alert--field--email-check-error").css('display','block');

                                        $(".alert--field--email-check-error").css('display','none');

                                        checkempty("edit-mail");

                                        // $("html, body").animate({ scrollTop: 0 }, 600);

                                    }else{

                                         var url = "/api/changemakers/check/email";

                                    $.ajax({

                                          url: url,

                                          type: "POST",

                                          dataType: "text",

                                          url: url,

                                          data: { action:"checkmail",email: email},

                                            success : function(data) {

                                               if(data==1){

                                                    $("#edit-mail").addClass('error');

                                                    $(".alert--field--email-check-error").html("ไม่สามารถใช้อีเมลนี้ได้ เนื่องจากมีอยู่ในระบบแล้ว");

                                                    $(".alert--field--email-check-success").css('display','none');

                                                    $(".alert--field--email-check-error").css('display','block');



                                                    $("#checkemail").val("1");

                                                    check_have_email=1;

                                               }else{

                                                    $("#edit-name").removeClass('error');

                                                    $(".alert--field--email-check-error").css('display','none');

                                                    $(".alert--field--email-check-success").css('display','none');

                                                    $("#checkemail").val("0");

                                               }

                                            },

                                            error: function (xhr, ajaxOptions, thrownError) {

                                                alert(ajaxOptions);

                                               alert(thrownError);

                                            }

                                        });

                                    }

                                    if(checkemail==1 || check_have_email==1){

                                        $(".alert--field--email-check-error").css('display','block');

                                        checkempty("edit-mail");

                                    }

                                    if(!phone || (phone.length!=10) || str.test(phone)){

                                         $(".alert--field--tel").css('display','block');

                                         checkempty("edit-field-profile-phone-und-0-value");

                                     }

                                    if(!zipcode || str.test(zipcode)){

                                        $(".alert--field--zipcode").css('display','block');

                                        checkempty("edit-field-profile-zipcode-und-0-value")

                                    }

                                    if(!province || str.test(province)){

                                        $(".alert--field--province").css('display','block');

                                        checkempty("edit-field-profile-province-und");

                                    }

                                    if(!address || str.test(address)){

                                        $(".alert--field--address").css('display','block');

                                        checkempty("field_profile_address");

                                    }

                                    if(!bday || str.test(bday)){

                                        $(".alert--field--birthday").css('display','block');

                                        checkempty("edit-field-profile-birthdate-und-0-value-datepicker-popup-0");

                                    }



                                    if(!password2 || (password2.length<6) || str.test(password2)){

                                        $(".alert--field--passwordmatch").css('display','none');

                                        $("#edit-pass-pass2--2").addClass('error');

                                        $(".alert--field--repassword").css('display','block');

                                        checkempty("edit-pass-pass2--2");

                                    }

                                    if(!password || (password.length<6) || str.test(password)){

                                        $(".alert--field--passwordmatch").css('display','none');

                                        $("#edit-pass-pass1--2").addClass('error');

                                        $(".alert--field--password").css('display','block');

                                        checkempty("edit-pass-pass1--2");

                                    }
                                     if(password!=password2){

                                        $(".alert--field--repassword").css('display','none');

                                        $(".alert--field--password").css('display','none');

                                        $("#edit-pass-pass2--2").addClass('error');

                                        $("#edit-pass-pass1--2").addClass('error');

                                        $(".alert--field--passwordmatch").css('display','block');

                                        $("#edit-pass-pass2--2").focus();



                                    }


                                    if(!username  ){

                                        $(".alert--field--username").html('กรุณาใส่ username ');

                                        $(".alert--field--username").css('display','block');

                                        $(".alert--field--username-check-error").css('display','none');

                                        checkempty("edit-name");

                                    }

                                    if(patt.test(username)==false){

                                        $(".alert--field--username").html('กรุณาใส่ username เฉพาะภาษาอังกฤษหรือตัวเลข ให้ถูกต้อง ');

                                        $(".alert--field--username").css('display','block');

                                        $(".alert--field--username-check-error").css('display','none');

                                        checkempty("edit-name");

                                    }

                                    if(!lastname || str.test(lastname)){

                                        $(".alert--field--surname").css('display','block');

                                        checkempty("edit-field-profile-lastname-und-0-value");

                                    }

                                    if(!firstname || str.test(firstname)){

                                          $(".alert--field--name").css('display','block');

                                          checkempty("edit-field-profile-firstname-und-0-value");

                                    }

                                    if(firstname && lastname && username && password && password.length >= 6 && password2 && bday && address && zipcode && phone && email && val_email==true && phone.length==10 && (password==password2) && checkusername==0 && checkemail==0 && check_have_email==0 && str.test(firstname)==false && str.test(lastname)==false && str.test(password)==false && str.test(password2)==false && str.test(bday)==false && str.test(address)==false && str.test(zipcode)==false && str.test(phone)==false && patt.test(username)==true){

                                        $("#edit-name").removeClass('error');

                                         $("#page_two").show();

                                        $("#page_one").hide();

                                        $("#step2" ).last().addClass( "active" );

                                        $(".register--wrap--arrow--up").attr('style', 'left: 550px');

                                         $("html, body").animate({ scrollTop: 0 }, 600);

                                    }

                               }

                            },

                            error: function (xhr, ajaxOptions, thrownError) {

                                $(".alert--field--username").html('ไม่สามารถเชื่อมต่อกับ Server ได้');

                                $(".alert--field--username").css('display','block');

                                $(".alert--field--username-check-error").css('display','none');



                            }

                        });














            return false;

        });

        $("#back_page").click(function(){

            $("#page_two").hide();

            $("#page_one").show();

            $("html, body").animate({ scrollTop: 0 }, 600);



            $("#step2").removeClass("active");

            $(".register--wrap--arrow--up").attr('style', 'left: 270px');

            return false;

        });

        $("#more--opt").hide();



  $(function () {

    $(".check-learn").click(function () {
      if ($(this).is(":checked")) {
        $("#learn-opt").show();
      } else {
        $("#learn-opt").hide();
      }
    });

  });







        $(function () {

        $(".check-commu").click(function () {

            if ($(this).is(":checked")) {

                $("#commu-opt").show();

                } else {

                 $("#commu-opt").hide();

                }

            });

        });









        $(function () {

        $(".check-target").click(function () {

            if ($(this).is(":checked")) {

                $("#target-select").show();

                } else {

                 $("#target-select").hide();

                }

            });

        });

        $("#edit-field-profile-skill-interest-und-26").click(function(){

            $('#computer-it input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

        });



        $("#edit-field-profile-skill-interest-und-27").click(function(){

            $('#industry input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

        });

        $("#edit-field-profile-skill-interest-und-28").click(function(){

            $('#communication input:checkbox').not(this).prop('checked', this.checked);

            if ($("#edit-field-profile-skill-interest-und-39").is(":checked")) {

                $("#edit-field-profile-skill-interest-und-39").prop('checked', true);

             } else {

                $("#edit-field-profile-skill-interest-und-39").prop('checked', false);

            }

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

                if ($("#edit-field-profile-skill-interest-und-39").is(":checked")) {

                    $("#commu-opt").show();

                } else {

                    $("#commu-opt").hide();

                }

        });

        $("#edit-field-profile-skill-interest-und-31").click(function(){

            $('#project-social input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

        });

        $("#edit-field-profile-skill-interest-und-30").click(function(){

            $('#sport input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

        });

        $("#edit-field-profile-skill-interest-und-29").click(function(){

            $('#article input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-skill-interest-all").prop('checked', false);

        });



        $("#edit-field-profile-problem-interest-und-8").click(function(){

            $('#education input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-11").click(function(){

            $('#environment input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-86").click(function(){

            $('#healty input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-12").click(function(){

            $('#economy input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-9").click(function(){

            $('#claim input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-15").click(function(){

            $('#participation input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-10").click(function(){

            $('#peace input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-problem-interest-und-13").click(function(){

            $('#business input:checkbox').not(this).prop('checked', this.checked);

            $("#edit-field-profile-problem-interest-und-all").prop('checked', false);

        });

        $("#edit-field-profile-skill-interest-all").click(function(){

            $('#all-interest input:checkbox').not(this).prop('checked', this.checked);

             if ($("#edit-field-profile-skill-interest-und-39").is(":checked")) {

                    $("#commu-opt").show();

                } else {

                    $("#commu-opt").hide();

                }

            // if ($("#edit-field-profile-skill-interest-und-28").is(":checked")) {

            //         $("#commu-opt").show();

            //  } else {

            //     $("#commu-opt").hide();

            // }

        });

        $("#edit-field-profile-problem-interest-und-all").click(function(){

            $('#all-problem input:checkbox').not(this).prop('checked', this.checked);



        });

        $("#edit-field-profile-target-group-und-all").click(function(){

             $("input[name*='field_profile_target_group[und][16]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][19]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][22]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][20]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][24]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][17]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][23]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][25]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][18]']").not(this).prop('checked', this.checked);

             $("input[name*='field_profile_target_group[und][21]']").not(this).prop('checked', this.checked);

             $(".target_child_checkbox").not(this).prop('checked', this.checked);



            //$('#all-target input:checkbox').not(this).prop('checked', this.checked);

            // if ($(this).is(":checked")) {

            //     $("#target-select").show();

            //     } else {

            //      $("#target-select").hide();

            //     }

        });


        $("#education input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#education input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 8 && checkedValue < 9 ){
                var check_value= $('#edit-field-profile-problem-interest-und-8')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-8').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-8').prop("checked", true );
                }

            }else if(checkedValue == 9){
                $('#edit-field-profile-problem-interest-und-8').prop("checked", true );
            }

        });

        $("#project-social input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#project-social input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 4 && checkedValue < 5 ){
                var check_value= $('#edit-field-profile-skill-interest-und-31')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-31').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-31').prop("checked", true );
                }

            }else if(checkedValue == 5){
                $('#edit-field-profile-skill-interest-und-31').prop("checked", true );
            }


        });

        $("#sport input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#sport input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }


            if(checkedValue >= 7 && checkedValue < 8 ){
                var check_value= $('#edit-field-profile-skill-interest-und-30')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-30').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-30').prop("checked", true );
                }

            }else if(checkedValue == 8){
                $('#edit-field-profile-skill-interest-und-30').prop("checked", true );
            }


        });

        $("#article input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#article input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 6 && checkedValue < 7 ){
                var check_value= $('#edit-field-profile-skill-interest-und-29')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-29').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-29').prop("checked", true );
                }

            }else if(checkedValue == 7){
                $('#edit-field-profile-skill-interest-und-29').prop("checked", true );
            }

        });

        $("#environment input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#environment input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 8 && checkedValue < 9 ){
                var check_value= $('#edit-field-profile-problem-interest-und-11')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-11').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-11').prop("checked", true );
                }

            }else if(checkedValue == 9){
                $('#edit-field-profile-problem-interest-und-11').prop("checked", true );
            }


        });

        $("#healty input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#healty input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }


            if(checkedValue >= 7 && checkedValue < 8 ){
                var check_value= $('#edit-field-profile-problem-interest-und-86')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-86').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-86').prop("checked", true );
                }

            }else if(checkedValue == 8){
                $('#edit-field-profile-problem-interest-und-86').prop("checked", true );
            }

        });


        $("#economy input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#economy input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 6 && checkedValue < 7 ){
                var check_value= $('#edit-field-profile-problem-interest-und-12')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-12').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-12').prop("checked", true );
                }

            }else if(checkedValue == 7){
                $('#edit-field-profile-problem-interest-und-12').prop("checked", true );
            }

        });

        $("#claim input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#claim input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }


            if(checkedValue >= 8 && checkedValue < 9 ){
                var check_value= $('#edit-field-profile-problem-interest-und-9')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-9').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-9').prop("checked", true );
                }

            }else if(checkedValue == 9){
                $('#edit-field-profile-problem-interest-und-9').prop("checked", true );
            }

        });

        $("#participation input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#participation input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                if(inputElements[i].checked){
                     checkedValue++;
                }
            }
            if(checkedValue >= 6 && checkedValue < 7 ){
                var check_value= $('#edit-field-profile-problem-interest-und-15')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-15').prop("checked", false);
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-15').prop("checked", true);
                }

            } else if(checkedValue == 7){
                $('#profile_problem_interest_und_15').prop("checked", true);
            }
        });

        $("#peace input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#peace input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 3 && checkedValue < 4 ){
                var check_value= $('#edit-field-profile-problem-interest-und-10')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-10').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-10').prop("checked", true );
                }

            }else if(checkedValue == 4){
                $('#edit-field-profile-problem-interest-und-10').prop("checked", true );
            }


        });


        $("#business input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#business input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }
            if(checkedValue >= 6 && checkedValue < 7 ){
                var check_value= $('#edit-field-profile-problem-interest-und-13')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-problem-interest-und-13').prop("checked", false );
                    $("#edit-field-profile-problem-interest-und-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-problem-interest-und-13').prop("checked", true );
                }

            }else if(checkedValue == 7){
                $('#edit-field-profile-problem-interest-und-13').prop("checked", true );
            }

        });

        $("#computer-it input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#computer-it input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 5 && checkedValue < 6 ){
                var check_value= $('#edit-field-profile-skill-interest-und-26')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-26').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-26').prop("checked", true );
                }

            }else if(checkedValue == 6){
                $('#edit-field-profile-skill-interest-und-26').prop("checked", true );
            }
        });


        $("#industry input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#industry input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 14 && checkedValue < 15 ){
                var check_value= $('#edit-field-profile-skill-interest-und-27')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-27').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-27').prop("checked", true );
                }

            }else if(checkedValue == 15){
                $('#edit-field-profile-skill-interest-und-27').prop("checked", true );
            }

        });

        $("#communication input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#communication input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }
            if(checkedValue >= 5 && checkedValue < 6 ){
                var check_value= $('#edit-field-profile-skill-interest-und-28')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-28').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-28').prop("checked", true );
                }

            }else if(checkedValue == 6){
                $('#edit-field-profile-skill-interest-und-28').prop("checked", true );
            }

        });


        $("#project-social input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#project-social input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }

            if(checkedValue >= 4 && checkedValue < 5 ){
                var check_value= $('#edit-field-profile-skill-interest-und-31')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-31').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-31').prop("checked", true );
                }

            }else if(checkedValue == 5){
                $('#edit-field-profile-skill-interest-und-31').prop("checked", true );
            }


        });

        $("#sport input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#sport input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }


            if(checkedValue >= 7 && checkedValue < 8 ){
                var check_value= $('#edit-field-profile-skill-interest-und-30')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-skill-interest-und-30').prop("checked", false );
                    $("#edit-field-profile-skill-interest-all").prop('checked', false);
                }else{
                    $('#edit-field-profile-skill-interest-und-30').prop("checked", true );
                }

            }else if(checkedValue == 8){
                $('#profile_skill_interest_und_30').prop("checked", true );
            }


        });


        $("#edit-field-profile-target-group-checkbox input:checkbox").click(function(){
            //$('#education input:checkbox').not(this).prop('checked', this.checked);
            var inputElements = $("#edit-field-profile-target-group-checkbox  input:checkbox");
            checkedValue = 0;
            for(var i=0; inputElements[i]; ++i){
                  if(inputElements[i].checked){
                       checkedValue++;
                  }
            }
            if(checkedValue >= 10 && checkedValue < 11 ){
                var check_value= $('#edit-field-profile-target-group-und-all')[0].checked;
                if(check_value == true){
                    $('#edit-field-profile-target-group-und-all').prop("checked", false );
                    $('target_child_checkbox').prop("checked", false );
                }else{
                    $('#edit-field-profile-target-group-und-all').prop("checked", true );
                    $('target_child_checkbox').prop("checked", true);
                }

            }else if(checkedValue == 11){
                $('#edit-field-profile-target-group-und-all').prop("checked", true );
            }

        });




        $( "input[type=text]" ).keyup(function() {

                //Removeclassform("#edit-field-polishing-und-0-value");

                var id = $(this).attr('id');

                // alert(id);

                $("#"+id).removeClass('error');

        });

         $( "input[type=password]" ).keyup(function() {

                //Removeclassform("#edit-field-polishing-und-0-value");

                var id = $(this).attr('id');

                // alert(id);

                $("#"+id).removeClass('error');

        });

          $( "textarea" ).keyup(function() {

                //Removeclassform("#edit-field-polishing-und-0-value");

                var id = $(this).attr('id');

                // alert(id);

                $("#"+id).removeClass('error');

        });
           $("#edit-pass-pass1--2").on('keypress', function(e){
             var password = document.getElementById("edit-pass-pass1--2").value;
            if(password.length<6){

                $(".alert--field--passwordmatch").css('display','none');

                $("#edit-pass-pass1--2").addClass('error');

                $(".alert--field--password").css('display','block');
            }else{

                $(".alert--field--password").css('display','none');
                 $("#edit-pass-pass1--2").removeClass('error');
            }
        });

















    });


    function checkempty(element){

        // alert(element);

        var e = document.getElementById(element);

        e.className += " error";

        e.focus();

       // $(element).addClass('error');

       // $(element).focus();



    }



    function validateEmail(email) {

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(email);

    }

    // Rit script
    $ = jQuery;
    $(document).ready(function () {
        $('.parent_checkbox').click(function () {
            if(this.checked) {
                $('.child_checkbox_'+this.value).prop("checked", true );
            }
            else {
                $('.child_checkbox_'+this.value).prop("checked", false);
            }

            // todo remove hardcode
            if ($("#edit-field-profile-skill-interest-und-39").is(":checked")) {

                $("#commu-opt").show();

            } else {

                $("#commu-opt").hide();

            }

        });

        $('.child_checkbox').click(function () {

            if(!this.checked) {
                var parentId = $(this).attr('parentid');
                $('.parent_checkbox_'+parentId).prop("checked", false);
            }
        });

    });




</script>

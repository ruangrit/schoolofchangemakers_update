<?php //print_r(changemakers_test()); 
	global $user;

	  $user_data = user_load($user->uid);
	  // print '<pre>';
	  // print_r($user_data->roles);
	  // print '</pre>';
	  if(!empty($user_data->roles[10])):
	//print $mobile;
	$otp_phone = $user_data->field_profile_password_otp['und'][0]['value'];  
	//print $otp_phone;

?>

<style type="text/css">
	.self_comfirm_button{
		background-color: darkgray;
    	border-radius: 25px;
    	width:200px;
	}
	.self_confirm_center{
		text-align: -webkit-center;
	}
</style>

<div>
		<div class="col-xs-8 col-xs-offset-2 self_confirm_center">
            <div  class="col-xs-10 txt__center" style="background:#FFFFFF; padding-top:30px; padding-bottom:30px">
			<p>ยืนยันด้วยรหัสผ่านทางโทรศัพท์มือถือ</p>
			<p>สามารถทำในภายหลังได้ เพื่อเปลี่ยนสถานะเป็น Verified Member</p>
                <p><a href="http://changemakers.devfunction.com/advantages-verified-member" target="_blank">(คลิกเพื่อดูข้อดีของการเป็น Verified Member)</a></p>
			<form action="/changemakers/save_otp" method="POST">
				<button type="submit" name="submit" class="btn  self_comfirm_button btn--submit"><?php if($_GET['send-sms'] == 1 ){ print "กดรับรหัสผ่านอีกครั้ง"; }else{ print "กดรับรหัสผ่าน"; } ?></button>
				<br/>
			</form>
			

			<form action="/changemakers/verified-otp" method="POST">
				<br/>
				<p>ใส่รหัสผ่านที่ได้รับ:</p><input name="otp" required type="text" placeholder="OTP">
				<br/><br/>
				
				<button type="submit" name="verified" class="btn  self_comfirm_button btn--submit">ยืนยันรหัส</button>
				<?php 
					if(arg(2) == "incorrect")
					{
						echo "รหัสยืนยันไม่ถูกต้อง";
					}

				?>
			</form>
            </div>
            <div class="row"></div>
			<br>
			<a href="/user">
				<button class="btn  self_comfirm_button link__blueunder" style="float:left;">ย้อนกลับ</button>
			</a>
			
		</div>
	
</div>
<?php else: ?>
	<?php if(empty($user->uid)): ?>
			You are not authorized to access this page.
	<?php elseif(!empty($user->roles[4])) : ?>
		คุณได้ยืนยันตัวตนด้วยเบอร์โทรศัพท์เรียบร้อยแล้ว 
	<?php else : ?>
		คุณได้ยืนยันตัวตนเรียบร้อยแล้ว
	<?php endif; ?>

<?php endif; ?>
<?php //print_r(changemakers_test()); 
 
 // print '<pre>';
 // print_r(user_load($user->uid));
 // print '</pre>';

?>
<style type="text/css">
	
</style>
<div class="col-xs-12" style=" text-align:center; ">
                        <div class="progress-bar">
                            <span class="active">
                            <div class="cir small"></div>x
                            <div class="progress-line"></div>
                            <div class="cir step">1</div>
            
                            <div class="progress-line"></div>
                            <div class="cir step">2</div>
                            </span>
                            <div class="progress-line"></div>
                            <div class="cir step">3</div>
                            <div class="progress-line"></div>
                            <div class="cir small"></div>
                        </div>
</div>
<div calss="col-md-12">
	<form action="/changemakers/confirm" method="POST">
		<div class="col-md-12 confirm_text_align">
			<p>ระบบได้ทำการส่งรหัสยืนยันไปที่อีเมลของคุณ กรุณา</p>
			<p>นำรหัสยืนยันนั้นใส่ในช่องด้านล่างแล้วยืนยัน</p>
		</div>
		<div class="col-md-12 confirm_text_align">
			<input name="activekey" required type="text" placeholder="ใส่รหัสยืนยันที่ได้รับ" class="confirm_text_align">
			<br/><br/>
			<div>
				<input class="confirm_button_style" type="submit" value="ยืนยันรหัส" >
				<?php 

					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					//$xxx = explode("?", $actual_link);
					$xxx = $_GET['incorrect'];
					//print_r($xxx);

					if($xxx == 1)
					{
						echo "รหัสยืนยันไม่ถูกต้อง";
					}

				?>
			</div>
		</div>
	</form>
	<div class="col-md-12 confirm_text_align">
		<br/>
		<div>
			<!-- <input class="confirm_button_style" type="submit" value="ส่งรหัสยืนยันอีกครั้ง" > -->
		</div>
		<br/>
	</div>
</div>
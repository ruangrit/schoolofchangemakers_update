jQuery(function($){

	

	function isEmpty( text ){

	      return !$.trim(text);

	  }

	$('#submit_forum[type="submit"]').click(function () {

		$(this).prop( "disabled", true );

	}); 

	$("#field-project-target-other-add-more-wrapper").hide();





	$('#edit-field-project-image-und-0-upload-button').hide();	

	$('[name=field_journal_image_und_0_upload_button]').hide();

	$(".page-user-edit .multipage-pane-title").html("Change Password");

	$(".page-user-edit  label[for*='edit-pass-pass1']").html(" New Password");





	$("#edit-field-project-image-und-0-upload").bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  

	    if (typeof f === "undefined") {
	    	alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");
			this.value = null;
	    }
 		else{


		    if(!re.exec(f.name))
			{
				alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");
				this.value = null;
			}
			else if (f.size > 1048576   || f.fileSize > 1048576  )
	        {
	           alert("สามารถอัพโหลดรูปภาพ โดยอาจเป็นโลโก้ / รูปทีมงาน หรือรูปภาพที่เกี่ยวข้อง ขนาดที่แนะนำ กว้างยาว 650 x 370 pixel  , ขนาดไฟล์ไม่เกิน 1 MB")
	           this.value = null;
	        }
	    }







	});



	$("#edit-field-commuity-image-und-0-upload").bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];

	  if(f){

	  if (f.size > 1048576   || f.fileSize > 1048576  )



	        {



	           //show an alert to the user



	           alert("สามารถอัพโหลดรูปภาพ โดยอาจเป็นโลโก้ / รูปทีมงาน หรือรูปภาพที่เกี่ยวข้อง ขนาดที่แนะนำ กว้างยาว 650 x 370 pixel  , ขนาดไฟล์ไม่เกิน 1 MB")







	           //reset file upload control



	           this.value = null;



	        }

	    }else{



	    	if(f){



		    	if(!re.exec(f.name))



				{



					alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");



					this.value = null;



				}

			}else{

				alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");



					this.value = null;

			}

	    }



	   







	});

	 

	// $('[type="submit"]').click(function () {

	// 	$(this).prop( "disabled", true );	

		



	//     // if(ck_value == ""){

	//     // 	alert('กรุณาเพิ่มข้อความ')

	//     // 	$(this).prop( "disabled", false );

	//     // }

		

	// });
	$("#edit-submitted-fund-amount-project").on('change keypress', function(e){
            

            var theEvent = e || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|[\b]/;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
            }
            if($(this).val().length <= 7){
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            }else{
                theEvent.preventDefault();
            }

        });

	$('.page-user-edit #user-profile-form #edit-actions #edit-submit').click(function (e) {

		var password = document.getElementById("edit-pass-pass1").value;

           var password2 = document.getElementById("edit-pass-pass2").value;

           var str = /^\s*$/; 

           if(!password || (password.length<6) || str.test(password)){

                $("#edit-pass-pass1").addClass('error');

                alert("รหัสผ่านน้อยกว่า 6 ตัวอักษร");

               return false;

                

            }

            if(!password2 || (password2.length<6) || str.test(password2)){

                $("#edit-pass-pass2").addClass('error');

                alert("รหัสผ่านน้อยกว่า 6 ตัวอักษร");

                return false;

      

            }

            if(password!=password2){



                $("#edit-pass-pass1").addClass('error');

                $("#edit-pass-pass2").addClass('error');

                $("#edit-pass-pass2").focus();

                

                alert("รหัสผ่านไม่ตรงกัน");

               return false;

 

            }

            

            

            if(password!=password2 || !password2 || (password2.length<6) || str.test(password2) || !password || (password.length<6) || str.test(password) ){

            	return false;

            }else{

            	return true;

            }

            

	});



	$('#icon_down_load_event').click(function () {

		$('form[name=event_download_file]').submit();

	});



	

	



	$('#project_comment').click(function (e) {

		
		var text = $("textarea[name*='comment_body[und][0][value]']").val();

		var ck_value = "1";

		var keep_val = "";

		// if($.trim(text) != ""){

	 //    	$(this).prop( "disabled", true );

	 //    	//alert(keep_val);

	 //    	//$("form").unbind('submit').submit();

	 //    	$('form[name=comment_project_form]').submit();

	 //    }

	 //    else{

	 //    	alert("กรุณาเพิ่มข้อความ");

	 //    	$(this).prop( "disabled", false );

	 //    	e.preventDefault();

	 //    }

		if(CKEDITOR.instances){

			for ( instance in CKEDITOR.instances ){

		        //CKEDITOR.instances[instance].updateElement();

		        ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
		        var text_ck = CKEDITOR.instances[instance].getData();
		        var text_media = $.trim(text_ck).toLowerCase().indexOf("http");
		        if(keep_val == ""){
			        if($.trim(ck_value) == "" && text_media == -1){
			        	keep_val = "";
			        }else{

				        if(!isEmpty(ck_value)){

				        	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

				        }else if(!isEmpty(text_ck)){
				        	keep_val = text_ck;
				        }
				    }
				}

		    }



		    if($.trim(keep_val) != ""){

		    	$(this).prop( "disabled", true );

		    	//alert(keep_val);

		    	//$("form").unbind('submit').submit();

		    	$('form[name=comment_project_form]').submit();

		    }

		    else{

		    	alert("กรุณาเพิ่มข้อความ");

		    	$(this).prop( "disabled", false );

		    	e.preventDefault();

		    }



		}

	});

	$('#knowledge_comment').click(function (e) {

			
		var text = $("textarea[name*='comment_body[und][0][value]']").val();

		var ck_value = "1";

		var keep_val = "";

		
		if($.trim(text) != ""){

	    	$(this).prop( "disabled", true );

	    	//alert(keep_val);

	    	//$("form").unbind('submit').submit();

	    	$('form[name=comment_knowledge_form]').submit();

	    }

	    else{

	    	alert("กรุณาเพิ่มข้อความ");

	    	$(this).prop( "disabled", false );

	    	e.preventDefault();

	    }

	});

	





	$('#event_comment').click(function (e) {

		var text = $("textarea[name*='comment_body[und][0][value]']").val();

		var ck_value = "1";

		var keep_val = "";

		/*if(CKEDITOR.instances){

			for ( instance in CKEDITOR.instances ){

	        //CKEDITOR.instances[instance].updateElement();

	        ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
	        var text_ck = CKEDITOR.instances[instance].getData();

	        if(!isEmpty(ck_value)){

	        	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

	        }
	        // else if(!isEmpty(text_ck)){
	        // 	keep_val = text_ck;
	        // }

		    }



		    if($.trim(keep_val) != ""){

		    	$(this).prop( "disabled", true );

		    	//alert(keep_val);

		    	//$("form").unbind('submit').submit();

		    	$('form[name=comment_community_form]').submit();

		    }

		    else{

		    	alert("กรุณาเพิ่มข้อความ");

		    	$(this).prop( "disabled", false );

		    	e.preventDefault();

		    }



		}*/
		if($.trim(text) != ""){

	    	$(this).prop( "disabled", true );

	    	//alert(keep_val);

	    	//$("form").unbind('submit').submit();

	    	$('form[name=comment_event_form]').submit();

	    }

	    else{

	    	alert("กรุณาเพิ่มข้อความ");

	    	$(this).prop( "disabled", false );

	    	e.preventDefault();

	    }

	});





	$('#community_comment').click(function (e) {

		var text = $("textarea[name*='comment_body[und][0][value]']").val();

		var ck_value = "1";

		var keep_val = "";

		/*if(CKEDITOR.instances){

			for ( instance in CKEDITOR.instances ){

	        //CKEDITOR.instances[instance].updateElement();

	        ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
	        var text_ck = CKEDITOR.instances[instance].getData();

	        if(!isEmpty(ck_value)){

	        	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

	        }
	        // else if(!isEmpty(text_ck)){
	        // 	keep_val = text_ck;
	        // }

		    }



		    if($.trim(keep_val) != ""){

		    	$(this).prop( "disabled", true );

		    	//alert(keep_val);

		    	//$("form").unbind('submit').submit();

		    	$('form[name=comment_community_form]').submit();

		    }

		    else{

		    	alert("กรุณาเพิ่มข้อความ");

		    	$(this).prop( "disabled", false );

		    	e.preventDefault();

		    }



		}*/
		if($.trim(text) != ""){

	    	$(this).prop( "disabled", true );

	    	//alert(keep_val);

	    	//$("form").unbind('submit').submit();

	    	$('form[name=comment_community_form]').submit();

	    }

	    else{

	    	alert("กรุณาเพิ่มข้อความ");

	    	$(this).prop( "disabled", false );

	    	e.preventDefault();

	    }

	});



	// $('#community_comment').click(function (e) {

		

	// 	var ck_value = "1";

	// 	var keep_val = "";

	// 	if(CKEDITOR.instances){

	// 		for ( instance in CKEDITOR.instances ){

	//         //CKEDITOR.instances[instance].updateElement();

	//         ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
	//         var text_ck = CKEDITOR.instances[instance].getData();

	//         if(!isEmpty(ck_value)){

	//         	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

	//         }else if(!isEmpty(text_ck)){
	//         	keep_val = text_ck;
	//         }

	// 	    }



	// 	    if($.trim(keep_val) != ""){

	// 	    	$(this).prop( "disabled", true );

	// 	    	//alert(keep_val);

	// 	    	//$("form").unbind('submit').submit();

	// 	    	$('form[name=comment_project_form]').submit();

	// 	    }

	// 	    else{

	// 	    	alert("กรุณาเพิ่มข้อความ");

	// 	    	$(this).prop( "disabled", false );

	// 	    	e.preventDefault();

	// 	    }



	// 	}

	// });



	$('#campaign_comment').click(function (e) {

		

		var ck_value = "1";

		var keep_val = "";

		if(CKEDITOR.instances){

			for ( instance in CKEDITOR.instances ){

		        //CKEDITOR.instances[instance].updateElement();

		        ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
		        var text_ck = CKEDITOR.instances[instance].getData();
		        var text_media = $.trim(text_ck).toLowerCase().indexOf("http");
		        if(keep_val == ""){
			        if($.trim(ck_value) == "" && text_media == -1){
			        	keep_val = "";
			        }else{

				        if(!isEmpty(ck_value)){

				        	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

				        }else if(!isEmpty(text_ck)){
				        	keep_val = text_ck;
				        }
				    }
				}

		   	}



		    if($.trim(keep_val) != ""){

		    	$(this).prop( "disabled", true );

		    	//alert(keep_val);

		    	//$("form").unbind('submit').submit();

		    	$('form[name=comment_campaign_form]').submit();

		    }

		    else{

		    	alert("กรุณาเพิ่มข้อความ");

		    	$(this).prop( "disabled", false );

		    	e.preventDefault();

		    }



		}

	});



	$('#journal_comment').click(function (e) {

		var text = $("textarea[name*='comment_body[und][0][value]']").val();

		var ck_value = "1";

		var keep_val = "";

		/*if(CKEDITOR.instances){

			for ( instance in CKEDITOR.instances ){

	        //CKEDITOR.instances[instance].updateElement();

	        ck_value = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();
	        var text_ck = CKEDITOR.instances[instance].getData();

	        if(!isEmpty(ck_value)){

	        	keep_val = CKEDITOR.instances[instance].document.getBody().getChild(0).getText();

	        }
	        // else if(!isEmpty(text_ck)){
	        // 	keep_val = text_ck;
	        // }

		    }



		    if($.trim(keep_val) != ""){

		    	$(this).prop( "disabled", true );

		    	//alert(keep_val);

		    	//$("form").unbind('submit').submit();

		    	$('form[name=comment_journal_form]').submit();

		    }

		    else{

		    	alert("กรุณาเพิ่มข้อความ");

		    	$(this).prop( "disabled", false );

		    	e.preventDefault();

		    }



		}*/

		if($.trim(text) != ""){

	    	$(this).prop( "disabled", true );

	    	//var text = $("textarea[name*='comment_body[und][0][value]']").val();

	    	//alert(keep_val);

	    	//$("form").unbind('submit').submit();

	    	$('form[name=comment_journal_form]').submit();

	    }

	    else{

	    	alert("กรุณาเพิ่มข้อความ");

	    	$(this).prop( "disabled", false );

	    	e.preventDefault();

	    }

	});

	$( "#project-node-form #edit-submit" ).click(function( ) {

		$(this).hide();

	});



	$( "#forum-node-form #edit-actions .form-submit" ).click(function( ) {

		//alert($("#edit-field-community-forum-topic-type-und-111").val());

		if($("#edit-field-community-forum-topic-type-und-111").val()){

			if($('#edit-title').val()){

				$(this).hide();

			}

		}else if($("#edit-field-community-forum-topic-type-und-112").val()){

			if($('#edit-title').val()){

				$(this).hide();

			}



		}else if($("#edit-field-community-forum-topic-type-und-115").val()){

			if($('#edit-title').val()){

				$(this).hide();

			}



		}else if($("#edit-field-community-forum-topic-type-und-117").val()){

			if($('#edit-title').val()){

				$(this).hide();

			}



		}

		// if($('#edit-field-community-forum-topic-type-und').val()){



		// }

		//$(this).prop( "disabled", true );

		

	});


	$("#journal-node-form").on('submit', function(e) {

	  	  var picture = $('#edit-field-journal-image-und-0-upload').val();
	  	  var title = $('#edit-title').val();

		  if(picture == "" && $.trim(title) == "" ){
		  	$("#edit-title").focus();
		  	$("#edit-title").addClass("error");
		  	$("#edit-field-journal-image-und-0-upload").addClass("error");

		  	//alert("กรุณากรอกหัวข้อบทความและเพิ่มรูปภาพหลัก");
		  	e.preventDefault();
		  }else if(picture == "" && $.trim(title) != ""){
		  	//alert("กรุณาเพิ่มรูปภาพหลัก");
		  	$("#edit-field-journal-image-und-0-upload").focus();
		  	$("#edit-field-journal-image-und-0-upload").addClass("error");
		  	e.preventDefault();
		  }else if(picture != "" && $.trim(title) == ""){
		  	$("#edit-title").focus();
		  	$("#edit-title").addClass("error");
		  	//alert("กรุณากรอกหัวข้อบทความ");
		  	e.preventDefault();
		  }
	 });


	$("#changemakers-form-document1").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document1 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document1 input[type=file]').focus();
		  	$('#changemakers-form-document1 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });

	$("#changemakers-form-document2").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document2 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document2 input[type=file]').focus();
		  	$('#changemakers-form-document2 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });

	$("#changemakers-form-document3").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document3 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document3 input[type=file]').focus();
		  	$('#changemakers-form-document3 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });


$("#changemakers-form-document4").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document4 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document4 input[type=file]').focus();
		  	$('#changemakers-form-document4 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document5").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document5 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document5 input[type=file]').focus();
		  	$('#changemakers-form-document5 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document6").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document6 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document6 input[type=file]').focus();
		  	$('#changemakers-form-document6 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document7").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document7 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document7 input[type=file]').focus();
		  	$('#changemakers-form-document7 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });




$("#changemakers-form-document8").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document8 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document8 input[type=file]').focus();
		  	$('#changemakers-form-document8 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });




$("#changemakers-form-document9").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document9 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document9 input[type=file]').focus();
		  	$('#changemakers-form-document9 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document10").on('submit', function(e) {


	  	 var file = $('#changemakers-form-document10 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document10 input[type=file]').focus();
		  	$('#changemakers-form-document10 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document11").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document11 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document11 input[type=file]').focus();
		  	$('#changemakers-form-document11 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document12").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document12 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document12 input[type=file]').focus();
		  	$('#changemakers-form-document12 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document13").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document13 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document13 input[type=file]').focus();
		  	$('#changemakers-form-document13 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document14").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document14 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document14 input[type=file]').focus();
		  	$('#changemakers-form-document14 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document15").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document15 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document15 input[type=file]').focus();
		  	$('#changemakers-form-document15 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document16").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document16 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document16 input[type=file]').focus();
		  	$('#changemakers-form-document16 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });




$("#changemakers-form-document17").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document17 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document17 input[type=file]').focus();
		  	$('#changemakers-form-document17 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });




$("#changemakers-form-document18").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document18 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document18 input[type=file]').focus();
		  	$('#changemakers-form-document18 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document19").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document19 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document19 input[type=file]').focus();
		  	$('#changemakers-form-document19 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document20").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document20 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document20 input[type=file]').focus();
		  	$('#changemakers-form-document20 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document21").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document21 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document21 input[type=file]').focus();
		  	$('#changemakers-form-document21 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



$("#changemakers-form-document22").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document22 input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document22 input[type=file]').focus();
		  	$('#changemakers-form-document22 input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });

     $("#changemakers-form-document-other").on('submit', function(e) {


	  	  var file = $('#changemakers-form-document-other input[type=file]').val();

		  if(file == "" ){
		  	$('#changemakers-form-document-other input[type=file]').focus();
		  	$('#changemakers-form-document-other input[type=file]').addClass('error');
		  	e.preventDefault();
		  }
	 });



    $("#webform-client-form-92").on('submit', function(e) {


	  	var day = $('#edit-submitted-date-fund-project-day').val();
	  	var month = $('#edit-submitted-date-fund-project-month').val();
	  	var year = $('#edit-submitted-date-fund-project-year').val();
	  	var source = $('#edit-submitted-fund-source-project').val();
	  	var amount = $('#edit-submitted-fund-amount-project').val();
	  	var use = $('#edit-submitted-fund-use').val();

		if(day == "" ){
		  	$('#edit-submitted-date-fund-project-day').focus();
		  	$('#edit-submitted-date-fund-project-day').addClass('error');
		 	e.preventDefault();
		}

		if(month == "" ){
		  	$('#edit-submitted-date-fund-project-month').focus();
		  	$('#edit-submitted-date-fund-project-month').addClass('error');
		 	e.preventDefault();
		}


		if(year == "" ){
		  	$('#edit-submitted-date-fund-project-year').focus();
		  	$('#edit-submitted-date-fund-project-year').addClass('error');
		 	e.preventDefault();
		}


		if(source == "" ){
		  	$('#edit-submitted-fund-source-project').focus();
		  	$('#edit-submitted-fund-source-project').addClass('error');
		 	e.preventDefault();
		}


		if(amount == "" ){
		  	$('#edit-submitted-fund-amount-project').focus();
		  	$('#edit-submitted-fund-amount-project').addClass('error');
		 	e.preventDefault();
		}

		if(use == "" ){
		  	$('#edit-submitted-fund-use').focus();
		  	$('#edit-submitted-fund-use').addClass('error');
		 	e.preventDefault();
		}

	});






	

	// $( "#journal-node-form" ).submit(function( event ) {
	//   alert( "Handler for .submit() called." );
	//   var picture = $('#edit-field-journal-image-und-0-upload').val();
	//   if(picture != ""){

	//   }else{
	//   	event.preventDefault();
	//   }
	  
	// });


	$( "#journal-node-form #edit-submit" ).click(function( ) {

		//alert("tong");

		if($( "#journal-node-form #edit-title" ).val() != "" ){

			if($("#edit-field-journal-image-und-0-upload").val()){

				$(this).hide();

			}

		}

	});











	$( ".page-node-add-project .group-project-group1 .multipage-controls-list .multipage-link-next" ).click(function( ) {

		// alert(1);

		//alert($("#edit-title").val());

		var tong = $("#edit-title").val();

		if(tong != ""){

			$("#edit-title").removeClass("error");

		}else{

			$(".group-project-group2").css({display : 'none'});

			$(".group-project-group1").css({display : 'block'});

			

			$("#edit-title").addClass("error");

			$("#edit-title").focus();



		}



		if($("#edit-field-project-image-und-0-upload").val()){

			$("#edit-field-project-image-und-0-upload").removeClass("error");

		}

		else{

			$(".group-project-group2").css({display : 'none'});

			$(".group-project-group1").css({display : 'block'});

			

			$("#edit-field-project-image-und-0-upload").addClass("error");

			$("#edit-field-project-image-und-0-upload").focus();

		}





		// $('input.multipage-link-next').click(function(){

		  //   		var val = $('.form-required').parent().attr('for');

		  //   		var required = $('.required');

		  //   		for (var i = 0; i < $('.required').length; i++) {

		  //   			if(required[i].value==""){

		  //   				var id = required[i].id;

		  //   				$('#'+id).parent().append('<span>error</span>');

		  //   				console.log($('label[for="'+id+'"]').text());   

		  //   			}

		    			

		  //   		}

		  //   		var file_id = $('input[type="file"]').attr('id');

		  //   		var file_html = $('label[for="'+file_id+'"').children();

		  //   		var file_text = $('label[for="'+file_id+'"').text();

		  //   		if(file_html[0].className=="form-required"){

		  //   			$('#'+file_id).parent().append('<span>error</span>');

		  //   			console.log(file_text);

		  //   		}

		    		

		    		 		





		  //   	});

		// if($("#edit-title").val() == ""){

		// 	alert("กรุณากรอกชื่อโปรเจกต์");

		// 	break;

		// }else{

		// 	continue;

		// }

	});

	$( ".node-type-project .group-project-group1 .multipage-controls-list .multipage-link-next" ).click(function( ) {

		// alert(1);

		//alert($("#edit-title").val());

		var tong = $("#edit-title").val();

		if(tong != ""){

			$("#edit-title").removeClass("error");

		}else{

			$(".group-project-group2").css({display : 'none'});

			$(".group-project-group1").css({display : 'block'});

			

			$("#edit-title").addClass("error");

			$("#edit-title").focus();



		}



		if($("#edit-field-project-image-und-0-upload").val()){

			$("#edit-field-project-image-und-0-upload").removeClass("error");

		}

		else if($("input[name='field_project_image[und][0][fid]").val() != 0){

			var xxx= $("input[name='field_project_image[und][0][fid]").val();

		}

		else{

			$(".group-project-group2").css({display : 'none'});

			$(".group-project-group1").css({display : 'block'});

			

			$("#edit-field-project-image-und-0-upload").addClass("error");

			$("#edit-field-project-image-und-0-upload").focus();

		}



	});





	  $("#user-login-modal").on('submit', function(e) {

	  	var check = false;

	  	e.preventDefault();

                        var username_user = document.getElementById("username_login").value;

                        var password_user = document.getElementById("pass_login").value;

                        $.ajax({

                            url: "/changemakers/check_login",

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

                                  // $('#user-login').submit();

                                  // return true;

                                   this.submit();



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

	  $("#user-forget-pass-modal").on('submit', function(e) {



                        var email_user = document.getElementById("edit-name2").value;

                        e.preventDefault();

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

                        // $('#myForgot .error-massage').css('display','none');

                        // $('#myForgot .success-massage').css('display','block');

                        // $('#myForgot .success-massage').html('ระบบได้ส่งลิงก์ไปยังอีเมลของคุณแล้ว คุณสามารถรับ one-time log in ได้ที่อีเมลของคุณ');



                      //document.getElementById("show-error-email").value = "ผ่านได้";

                      //document.getElementById('show-error-email').innerHTML = comment;

                        // $('#user-forget-pass').submit();

                        this.submit();

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





	// $('#edit-taxonomy-forums-tid').attr('data-original-title', "");

	// $('#edit-field-community-forum-topic-type-tid').attr('data-original-title', "");

	// $('#edit-field-problem-interest-tid').attr('data-original-title', "");

	// $('#edit-field-target-interest-tid').attr('data-original-title', "");

	// $('#edit-field-problem-topic-tid').attr('data-original-title', "");

	// $('#edit-field-project-target-tid').attr('data-original-title', "");

	// $('#edit-field-knowledge-problem-tid').attr('data-original-title', "");

	// $('#edit-field-knowledge-target-tid').attr('data-original-title', "");

	// $('#edit-field-knowledge-type-tid').attr('data-original-title', "");

	// $('#edit-field-journal-problem-tid').attr('data-original-title', "");

	// $('#edit-field-journal-target-tid').attr('data-original-title', "");

	$("#edit-field-journal-image-und-0-upload").addClass("required");



	$( "#webform-client-form-1" ).submit(function( event ) {

	  var email = document.getElementById("edit-submitted-email").value;

	  var val_email = validateEmail(email);

	   if(val_email==false){

	   		$("#edit-submitted-email").addClass("error");

             event.preventDefault();

        }

	 

	})



	function validateEmail(email) {

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(email);

    }

	



	function isNumberKey(evt) {

        var charCode = (evt.which) ? evt.which : evt.keyCode;

        // Added to allow decimal, period, or delete

        if (charCode == 110 || charCode == 190 || charCode == 46) 

            return true;

        

        if (charCode > 31 && (charCode < 48 || charCode > 57)) 

            return false;

        

        return true;

    } // isNumberKey





    $("#edit-submitted-fund-amount-project").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .

        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||

             // Allow: Ctrl+A, Command+A

            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 

             // Allow: home, end, left, right, down, up

            (e.keyCode >= 35 && e.keyCode <= 40)) {

                 // let it happen, don't do anything

                 return;

        }

        // Ensure that it is a number and stop the keypress

        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

            e.preventDefault();

        }

    });



	//$("input[name*='comment_body[und][0][value]']").prop("required", true);



	function userAnswerJoinEvent(){

		//$('#event_submit').hide();

		$('#hide_button').hide();

		return false;

	}

//khunakorn@changemakers.devfunction.com@changemakers.devfunction.com/public_html/sites/all/themes/changemakers/js/script.js

	$("#btn-reset").click(function(){ 

		for ( instance in CKEDITOR.instances ){

	        CKEDITOR.instances[instance].updateElement();

	        CKEDITOR.instances[instance].setData('');

	    }

	});



	// $("#project_comment").click(function( ){ 

	// 	$("#project_comment").hide();

	// 	 //alert("test");

	// 	// event.preventDefault();

	// });





	

	$("#journal_reset").click(function(){ 

        //alert('tong'); edit-field-project-related-und

        //alert($('#edit-field-project-related-und').val());

        document.getElementById("edit-field-project-related-und").selectedIndex = 0;

        if($('#node_id').val()){

        	// $('#edit-field-project-related-und').val('');

        }else{

        	//



        	for (var x = 0; x < 150; x++) {



				$("input[name*='field_journal_problem[und]["+x+"]']").not(this).prop('checked', false);



			};

        	var project = $('#edit-field-project-related-und').val();    		

    		var problem = $('#edit-field-journal-problem-und input[type="checkbox"]');

    		$('#edit-field-journal-problem-und input:checkbox').prop('checked',false);

    		$('#edit-field-journal-target-und input:checkbox').prop('checked',false);

    		// $('#edit-field-journal-problem-und input[type=checkbox]').each(function(i,k){

                  

      //             //$(k).prop('checked',false);

      //         });



			// for (var i = 0; i < problem.length; i++) {

			// 	$('#edit-field-journal-problem-und-'+problem[i]).prop('checked', false);

			// }

			// var target = $('#edit-field-journal-target-und input[type="checkbox"]');

    		

			// for (var i = 0; i < target.length; i++) {



			// 	$('#edit-field-journal-target-und-'+target[i]).prop('checked', false);

			// }



        }

        



        $('#edit-field-journal-image-und-0-upload').val('');

        $('#edit-title').val('');



        for ( instance in CKEDITOR.instances ){

	        CKEDITOR.instances[instance].updateElement();

	        CKEDITOR.instances[instance].setData('');

	    }





        $('#cke_edit-body-und-0-value').contents().find('body').empty();





        $("input[name*='tax_problem_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {



				$("input[name*='field_journal_problem[und]["+x+"]']").not(this).prop('checked', false);

				

			};

		});



		$("input[name*='tax_target_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {



				$("input[name*='field_journal_target[und]["+x+"]']").not(this).prop('checked', false);



			};

		});



		for (var x = 0; x < 174; x++) {



			$("input[name*='field_journal_interest[und]["+x+"]'").not(this).prop('checked', false);



		};







		$("input[name*='tax_problem_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {

				if($(this).val() == x){

					 $("input[name*='field_journal_problem[und]["+x+"]']").not(this).prop('checked', true);

				}

			};

		});



		$("input[name*='tax_target_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {

				if($(this).val() == x){

					 $("input[name*='field_journal_target[und]["+x+"]']").not(this).prop('checked', true);

				}

				else if($(this).val() == 172){

					$("input[name*='field_journal_target[und][172]']").not(this).prop('checked', true);

				}



				$("input[name*='field_journal_target[und][109]']").not(this).prop('checked', false);

			};

		});



		

    });





	$( "#event_comment_form_id" ).submit(function( event ) {

	  

	 	// var name = $('iframe[name=select_frame]').contents().find('#select_name').val();

	  //   event.preventDefault();

	});



	// alert(1);

	if($('#tax_problem').val() == "project"){



		$("input[name*='tax_problem_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {

				if($(this).val() == x){

					 $("input[name*='field_journal_problem[und]["+x+"]']").not(this).prop('checked', true);

				}

			};

		});



		$("input[name*='tax_target_value']").each(function (index)

		{

			for (var x = 0; x < 150; x++) {

				if($(this).val() == x){

					 $("input[name*='field_journal_target[und]["+x+"]']").not(this).prop('checked', true);

				}

				else if($(this).val() == 172){

					$("input[name*='field_journal_target[und][172]']").not(this).prop('checked', true);

				}



				$("input[name*='field_journal_target[und][109]']").not(this).prop('checked', false);

			};

		});



	}

	$('.required').prop("required", true);

	$('#edit-file').bind('change', function() {



	    var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}



	});



	$('#edit-file--2').bind('change', function() {



	    var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}

	});



	$('#edit-file--3').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}



	});



	$('#edit-file--4').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});



	$('#edit-file--5').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});



	$('#edit-file--6').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}



	});



	$('#edit-file--7').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}



	});



	$('#edit-file--8').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}

	});



	$('#edit-file--9').bind('change', function() {



	  	var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}



	});



	$('#edit-file--10').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});



	



	$('#edit-file--11').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--12').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--13').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--14').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--15').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--16').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--17').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--18').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--19').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--20').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--21').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});

	$('#edit-file--22').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});



	$('#edit-file--23').bind('change', function() {



	  var re = /(\.pdf|\.jpg)$/i;



	    //this.files[0].size gets the size of your file.



	    var f = this.files[0];



	  	if (f.size > 2048576   || f.fileSize > 2048576  )

        {

           //show an alert to the user

           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 2 MB ต่อไฟล์)");



           //reset file upload control

           this.value = null;

        }



	   	if(!re.exec(f.name))

		{



			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;



		}







	});



	$('#search-edit-field-knowledge-problem-tid').change(



    function(){



    	if($('#search-edit-field-knowledge-problem-tid').val() == ""){

    		$('[name=tax_target]').val("All");

    	}else{

    		$('[name=tax_target]').val($('#search-edit-field-knowledge-problem-tid').val());

    	}

    	



         $(this).closest('form').trigger('submit');



         /* or:



         $('#formElementId').trigger('submit');



            or:



         $('#formElementId').submit();



         */



    });

    $('#search-edit-field-knowledge-target-tid').change(



    function(){



    	//$('[name=problem]').val("11");

    	if($('#search-edit-field-knowledge-target-tid').val() == ""){

    		$('[name=tax_problem]').val("All");

    	}else{

    		$('[name=tax_problem]').val($('#search-edit-field-knowledge-target-tid').val());

    	}

    	

    	//alert($('#search-edit-field-knowledge-target-tid').val());

        $(this).closest('form').trigger('submit');





         /* or:



         $('#formElementId').trigger('submit');



            or:



         $('#formElementId').submit();



         */



    });



    // 12/9/59
    $('#filter-my-journal').change( function(){
    	var selected = $('#filter-my-journal').val();
    	if(selected == 0){ 
    		window.location.href = window.location.origin+"/journal/list";
    	}else{
    		window.location.href = window.location.origin+"/journal/my-journal";
    	}
    	//window.location.href = "http://stackoverflow.com";
	    

	});

	$('#filter-my-coach-journal').change( function(){
    	var selected = $('#filter-my-coach-journal').val();
    	if(selected == 0){
    		window.location.href = window.location.origin+"/journal-list-coach";
    	}else{
    		window.location.href = window.location.origin+"/my-coach-journal";
    	}
    	//window.location.href = "http://stackoverflow.com";
	    

	});

    $('#filter_project').change(



    function(){





         $(this).closest('form').trigger('submit');



         /* or:



         $('#formElementId').trigger('submit');



            or:



         $('#formElementId').submit();



         */



    });



     $('#search-sort').change(



    function(){





         $(this).closest('form').trigger('submit');



         /* or:



         $('#formElementId').trigger('submit');



            or:



         $('#formElementId').submit();



         */



    });



    $( "input[name*='files[field_image_comment_project_und_0]']" ).bind('change', function() {

    	//alert(1);



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});

	$( "input[name*='files[field_file_comment_project_und_0]']" ).bind('change', function() {



	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});









	$("input[name*='files[field_image_comment_event_und_0]']").bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});







	$("input[name*='files[field_file_event_und_0]']").bind('change', function() {



	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});







	$('#profile-picture').bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});



	/*$('#edit-field-journal-image-und-0-upload').bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	    if (typeof f === "undefined") {
	    	alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");
			this.value = null;
	    }
 		else{


		    if(!re.exec(f.name))
			{
				alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");
				this.value = null;
			}
			else if (f.size > 1048576   || f.fileSize > 1048576  )
	        {
	           alert("สามารถอัพโหลดรูปภาพ โดยอาจเป็นโลโก้ / รูปทีมงาน หรือรูปภาพที่เกี่ยวข้อง ขนาดที่แนะนำ กว้างยาว 650 x 370 pixel  , ขนาดไฟล์ไม่เกิน 1 MB")
	           this.value = null;
	        }
	    }







	});*/





	$('#edit-field-journal-image-other-und-0-upload').bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});



	

	$('input[name*="files[field_journal_image_und_0]"]').bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}



	});



	$('input[name*="files[field_image_und_0]"]').bind('change', function() {



	  var re = /(\.jpeg|\.jpg|\.png|\.gif|\.psd)$/i;



	  //this.files[0].size gets the size of your file.



	  	var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});



	$('#edit-field-journal-document-und-0-upload').bind('change', function() {



	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls)$/i;



	  //this.files[0].size gets the size of your file.



	  var f = this.files[0];



	  	if(typeof f === "undefined"){
	  		alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;
	  	}else{

		  	if (f.size > 1048576   || f.fileSize > 1048576  )
			{


		           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")

		           //reset file upload control

		           this.value = null;



		    }



		    if(!re.exec(f.name))
			{

				alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

				this.value = null;

			}
		}







	});



	$('#close-become').bind('click', function() {

		$('#become').hide();

	});



	$('#goto_become').bind('click', function() {
		var host = window.location.origin+"/participate-become-a-coach";

		window.location.replace(host);



		// similar behavior as clicking on a link

		window.location.href = host;
	});











	// $( "input[name*='field_problem_topic[und][11]']" ).click(function(){

	// 	alert("tong");

	// });



	// $( "input[name*='field_problem_topic[und][11]']" ).toggle(function() {

	// 	$("'input[name*='field_problem_topic[und][99']").prop('checked', checked);

	// }, function() {

	//     $("'input[name*='field_problem_topic[und][99']").prop('checked', checked);

	// });



	// project





	$("input[name*='field_problem_topic[und][11]']").click(function(){

        $("input[name*='field_problem_topic[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_topic[und][86]']").click(function(){

        $("input[name*='field_problem_topic[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_topic[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_problem_topic[und][12]']").click(function(){

        $("input[name*='field_problem_topic[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_topic[und][8]']").click(function(){

        $("input[name*='field_problem_topic[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_topic[und][15]']").click(function(){

        $("input[name*='field_problem_topic[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_topic[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_topic[und][9]']").click(function(){

        $("input[name*='field_problem_topic[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_topic[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_topic[und][10]']").click(function(){

        $("input[name*='field_problem_topic[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_problem_topic[und][13]']").click(function(){

        $("input[name*='field_problem_topic[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_topic[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_topic[und][98']").not(this).prop('checked', this.checked);

    });



    // knowledge

    $("input[name*='field_knowledge_problem[und][11]']").click(function(){

        $("input[name*='field_knowledge_problem[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_knowledge_problem[und][86]']").click(function(){

        $("input[name*='field_knowledge_problem[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_knowledge_problem[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_knowledge_problem[und][12]']").click(function(){

        $("input[name*='field_knowledge_problem[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_knowledge_problem[und][8]']").click(function(){

        $("input[name*='field_knowledge_problem[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_knowledge_problem[und][15]']").click(function(){

        $("input[name*='field_knowledge_problem[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_knowledge_problem[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_knowledge_problem[und][9]']").click(function(){

        $("input[name*='field_knowledge_problem[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_knowledge_problem[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_knowledge_problem[und][10]']").click(function(){

        $("input[name*='field_knowledge_problem[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_knowledge_problem[und][13]']").click(function(){

        $("input[name*='field_knowledge_problem[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_knowledge_problem[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_knowledge_problem[und][98']").not(this).prop('checked', this.checked);

    });



    //campaign

    $("input[name*='field_campaign_problems[und][11]']").click(function(){

        $("input[name*='field_campaign_problems[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_campaign_problems[und][86]']").click(function(){

        $("input[name*='field_campaign_problems[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_campaign_problems[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_campaign_problems[und][12]']").click(function(){

        $("input[name*='field_campaign_problems[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_campaign_problems[und][8]']").click(function(){

        $("input[name*='field_campaign_problems[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_campaign_problems[und][15]']").click(function(){

        $("input[name*='field_campaign_problems[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_campaign_problems[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_campaign_problems[und][9]']").click(function(){

        $("input[name*='field_campaign_problems[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_campaign_problems[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_campaign_problems[und][10]']").click(function(){

        $("input[name*='field_campaign_problems[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_campaign_problems[und][13]']").click(function(){

        $("input[name*='field_campaign_problems[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_campaign_problems[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_campaign_problems[und][98']").not(this).prop('checked', this.checked);

    });



    //add people



    $("input[name*='field_profile_problem_interest[und][11]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_profile_problem_interest[und][86]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_profile_problem_interest[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_profile_problem_interest[und][12]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_profile_problem_interest[und][8]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_profile_problem_interest[und][15]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_profile_problem_interest[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_profile_problem_interest[und][9]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_profile_problem_interest[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_profile_problem_interest[und][10]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_profile_problem_interest[und][13]']").click(function(){

        $("input[name*='field_profile_problem_interest[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_profile_problem_interest[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_profile_problem_interest[und][98']").not(this).prop('checked', this.checked);

    });





    //news & event



    $("input[name*='field_problem_interest[und][11]']").click(function(){

        $("input[name*='field_problem_interest[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_interest[und][86]']").click(function(){

        $("input[name*='field_problem_interest[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_interest[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_problem_interest[und][12]']").click(function(){

        $("input[name*='field_problem_interest[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_interest[und][8]']").click(function(){

        $("input[name*='field_problem_interest[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_interest[und][15]']").click(function(){

        $("input[name*='field_problem_interest[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_interest[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_interest[und][9]']").click(function(){

        $("input[name*='field_problem_interest[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_interest[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_problem_interest[und][10]']").click(function(){

        $("input[name*='field_problem_interest[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_problem_interest[und][13]']").click(function(){

        $("input[name*='field_problem_interest[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_problem_interest[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_problem_interest[und][98']").not(this).prop('checked', this.checked);

    });



    //journal

    $("input[name*='field_journal_problem[und][11]']").click(function(){

        $("input[name*='field_journal_problem[und][99']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][100']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][102']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][103']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][104']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][105']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][106']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][107']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_problem[und][86]']").click(function(){

        $("input[name*='field_journal_problem[und][85']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][87']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][88']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][89']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][90']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][91']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][92']").not(this).prop('checked', this.checked);

        //$("input[name*='field_journal_problem[und][107']").not(this).prop('checked', this.checked);

    });





    $("input[name*='field_journal_problem[und][12]']").click(function(){

        $("input[name*='field_journal_problem[und][70']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][71']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][72']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][149']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][73']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][74']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_problem[und][8]']").click(function(){

        $("input[name*='field_journal_problem[und][53']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][54']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][55']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][56']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][57']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][58']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][59']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_problem[und][15]']").click(function(){

        $("input[name*='field_journal_problem[und][61']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][62']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][63']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][64']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][65']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][66']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][150']").not(this).prop('checked', this.checked);

        //$("input[name*='field_journal_problem[und][60']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_problem[und][9]']").click(function(){

        $("input[name*='field_journal_problem[und][75']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][76']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][77']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][78']").not(this).prop('checked', this.checked);

        //$("input[name*='field_journal_problem[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][80']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][81']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][82']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][83']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][84']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_problem[und][10]']").click(function(){

        $("input[name*='field_journal_problem[und][67']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][68']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][69']").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_journal_problem[und][13]']").click(function(){

        $("input[name*='field_journal_problem[und][93']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][94']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][95']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][96']").not(this).prop('checked', this.checked);

        //$("input[name*='field_journal_problem[und][79']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][97']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_problem[und][98']").not(this).prop('checked', this.checked);

    });



    // journal interest



    $("input[name*='field_journal_interest[und][26]']").click(function(){

        $("input[name*='field_journal_interest[und][33']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][34']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][35']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][36']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][37']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_interest[und][27]']").click(function(){

        $("input[name*='field_journal_interest[und][120']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][121']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][122']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][123']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][124']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][125']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][126']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][127']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][128']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][129']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][130']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][131']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][132']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][133']").not(this).prop('checked', this.checked);

    });



	$("input[name*='field_journal_interest[und][28]']").click(function(){

        //$("input[name*='field_journal_interest[und][39']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][40']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][41']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][42']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][134']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_interest[und][28]']").click(function(){

        //$("input[name*='field_journal_interest[und][39]'").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][40']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][41']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][42']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][134']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_interest[und][29]']").click(function(){

        $("input[name*='field_journal_interest[und][135']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][136']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][137']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][138']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][139']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][140']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_interest[und][30]']").click(function(){

        $("input[name*='field_journal_interest[und][141']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][142']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][143']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][144']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][145']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][146']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][147']").not(this).prop('checked', this.checked);

    });



    $("input[name*='field_journal_interest[und][31]']").click(function(){

        $("input[name*='field_journal_interest[und][43']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][44']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][45']").not(this).prop('checked', this.checked);

        $("input[name*='field_journal_interest[und][46']").not(this).prop('checked', this.checked);

    });

    $("input[name*='field_problem_topic[und][171]']").click(function(){

        $(".field-name-field-problem-topic input:checkbox").not(this).prop('checked', this.checked);



    });

     $("input[name*='field_project_target[und][172]']").click(function(){

        $("#edit-field-project-target input:checkbox").not(this).prop('checked', this.checked);

        $("#edit-field-project-target-und-109").not(this).prop('checked', false);



    });

     //Jorunal

    $("input[name*='field_journal_problem[und][171]']").click(function(){

        $(".field-name-field-journal-problem input:checkbox").not(this).prop('checked', this.checked);



    });

    $("input[name*='field_journal_target[und][172]']").click(function(){

        $(".field-name-field-journal-target input:checkbox").not(this).prop('checked', this.checked);

        $("input[name='field_journal_target[und][109]']").not(this).prop('checked', false);



    });

    $("input[name*='field_journal_interest[und][173]']").click(function(){

        $(".field-name-field-journal-interest input:checkbox").not(this).prop('checked', this.checked);

        $("input[name='field_journal_interest[und][32]']").not(this).prop('checked', false);

        $("input[name='field_journal_interest[und][39]']").not(this).prop('checked', false);



    });

    // Event

    $("input[name*='field_problem_interest[und][171]']").click(function(){

        $(".field-name-field-problem-interest input:checkbox").not(this).prop('checked', this.checked);



    });

    $("input[name*='field_event_skill_interest[und][173]']").click(function(){

        $(".field-name-field-event-skill-interest input:checkbox").not(this).prop('checked', this.checked);



    });

    $("input[name*='field_target_interest[und][172]']").click(function(){

        $(".field-name-field-target-interest input:checkbox").not(this).prop('checked', this.checked);



    });

    //Camplain

    $("input[name*='field_campaign_problems[und][171]']").click(function(){

        $(".field-name-field-campaign-problems input:checkbox").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_profile_problem_interest[und][171]']").click(function(){

        $("#edit-field-profile-problem-interest-und input:checkbox").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_profile_target_group[und][172]']").click(function(){

        $("#edit-field-profile-target-group-und input:checkbox").not(this).prop('checked', this.checked);



    });



    $("input[name*='field_profile_skill_interest[und][173]']").click(function(){

        $("#edit-field-profile-skill-interest-und input:checkbox").not(this).prop('checked', this.checked);



    });



    



    $("input[name*='field_project_target[und][109]']").click(function () {

           if ($(this).is(":checked")) {

               $("#field-project-target-other-add-more-wrapper").show();

            } else {

               $("#field-project-target-other-add-more-wrapper").hide();

         }

	});



	$("input[name*='field_journal_target[und][109]']").click(function () {

           if ($(this).is(":checked")) {

               $("#edit-field-target-other").show();

            } else {

               $("#edit-field-target-other").hide();

         }

	});



	$("#edit-field-language-interest").hide();



	$("input[name*='field_journal_interest[und][39]']").click(function () {

           if ($(this).is(":checked")) {

               $("#edit-field-language-interest").show();

            } else {

               $("#edit-field-language-interest").hide();

         }

	});

	$("input[name*='field_journal_interest[und][32]']").click(function () {

           if ($(this).is(":checked")) {

               $("#edit-field-interest-other").show();

            } else {

               $("#edit-field-interest-other").hide();

         }

	});

	function remove_form () {

		alert(1);

	}

	$('#edit-field-project-background-und-0-value').addClass("background-help-text-project-for-design");

	$('edit-field-project-background').addClass("background-project-for-design");

	//$('#edit-field-gmlqq-und-0-value').addClass("background-help-text-project-for-design");









   











	// $("#next_page").click(function(){



 //            var firstname = document.getElementById("edit-field-profile-firstname-und-0-value").value;



 //            var lastname = document.getElementById("edit-field-profile-lastname-und-0-value").value;



 //            var username = document.getElementById("edit-name").value;



 //            var password = document.getElementById("edit-pass-pass1--2").value;



 //            var password2 = document.getElementById("edit-pass-pass2--2").value;



 //            var bday = document.getElementById("edit-field-profile-birthdate-und-0-value-datepicker-popup-0").value;



 //            var address = document.getElementById("field_profile_address").value;



 //            var zipcode = document.getElementById("edit-field-profile-zipcode-und-0-value").value;



 //            var phone = document.getElementById("edit-field-profile-phone-und-0-value").value;



 //            var email = document.getElementById("edit-mail").value;



 //            var val_email = validateEmail(email);   











 //            if(!email){checkempty("#edit-mail")}



 //            if(!phone){checkempty("#edit-field-profile-phone-und-0-value")}



 //            if(!zipcode){checkempty("#edit-field-profile-zipcode-und-0-value")}



 //            if(!address){checkempty("#field_profile_address")}



 //            if(!bday){checkempty("#edit-field-profile-birthdate-und-0-value-datepicker-popup-0")}



 //            if(!password2){checkempty("#edit-pass-pass2--2")}



 //            if(!password){checkempty("#edit-pass-pass1--2")}



 //            if(!username){checkempty("#edit-name")}



 //            if(!lastname){checkempty("#edit-field-profile-lastname-und-0-value")}



 //            if(!firstname){checkempty("#edit-field-profile-firstname-und-0-value")}



 //            if(val_email==false){



 //                $("#edit-mail").addClass('error');



 //            }



            



 //            if(firstname && lastname && username && password && password2 && bday && address && zipcode && phone && email && val_email==true  ){



 //                 $("#page_two").show();



 //                $("#page_one").hide();



 //                $("#step2" ).last().addClass( "active" );



 //                $(".register--wrap--arrow--up").attr('style', 'left: 550px');



 //                 $("html, body").animate({ scrollTop: 0 }, 600);



 //            }



 //            return false;



 //        });



 //   $("#edit-field-profile-skill-interest-und-26").click(function(){



 //        $('#computer-it input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-skill-interest-und-27").click(function(){



 //        $('#industry input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-skill-interest-und-28").click(function(){



 //        $('#communication input:checkbox').not(this).prop('checked', this.checked);



 //        if ($(this).is(":checked")) {



 //                $("#commu-opt").show();



 //         } else {



 //            $("#commu-opt").hide();



 //        }



 //    });



 //    $("#edit-field-profile-skill-interest-und-29").click(function(){



 //        $('#article input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-8").click(function(){



 //        $('#education input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-11").click(function(){



 //        $('#environment input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-86").click(function(){



 //        $('#healty input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-12").click(function(){



 //        $('#economy input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-9").click(function(){



 //        $('#claim input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-15").click(function(){



 //        $('#participation input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-10").click(function(){



 //        $('#peace input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $("#edit-field-profile-problem-interest-und-13").click(function(){



 //        $('#business input:checkbox').not(this).prop('checked', this.checked);



 //    });



 //    $( "input[type=text]" ).keyup(function() {



 //            //Removeclassform("#edit-field-polishing-und-0-value");



 //            var id = $(this).attr('id');



 //            // alert(id);



 //            $("#"+id).removeClass('error');



 //    });



 //     $( "input[type=password]" ).keyup(function() {



 //            //Removeclassform("#edit-field-polishing-und-0-value");



 //            var id = $(this).attr('id');



 //            // alert(id);



 //            $("#"+id).removeClass('error');



 //    });



 //      $( "textarea" ).keyup(function() {



 //            //Removeclassform("#edit-field-polishing-und-0-value");



 //            var id = $(this).attr('id');



 //            // alert(id);



 //            $("#"+id).removeClass('error');



 //    });



 //    function checkempty(e){



 //        $(e).focus();



 //       $(e).addClass('error');



 //    }



 //    function validateEmail(email) {



 //    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;



 //    return re.test(email);



 //    }



   







});



(function($) {

    $(document).ready(function(){
    	
    	$('#event_comment_form_id [type="submit"]').click(function(){

	    	console.log($('.edit-comment-body-und-0-value--3').val());

	    	console.log($('.cke_browser_webkit .cke_editable').text());

	    	//break;

	    });

    	

    	var date_community = $('#edit-field-community-due-date-und-0-value-datepicker-popup-0');

    	//alert(date_community);

    	if(date_community){

    		$("#edit-field-community-due-date-und-0-value-datepicker-popup-0").attr('readonly', true);

			$("#edit-field-community-due-date-und-0-value-datepicker-popup-0").datepicker({

			dateFormat: 'dd/mm/yy',

			minDate: new Date(new Date()),

			});

    	}

    	  

    	var windowHeight = $(window).height();

    	

    	if(windowHeight>262){

    		var height = windowHeight-262;

    		height2= height/2;

    		$('#myForgot .modal-dialog-center').css('margin-top',height2);

    	}else{

    		$('#myForgot .modal-dialog-center').css('margin-top','5px');

    	}



    	$('#webform-client-form-92 .webform-component--nid').css('display','none');

    	$('#edit-field-project-related-und').change(function(){

    		// alert(1);

    		var project = $(this).val();    		

    		var problem = $('#edit-field-journal-problem-und');

    		//var problem = $('#edit-field-journal-problem-und input:checkbox').not(this).prop('checked', this.checked);

    		// var target = $('#edit-field-journal-target-und input[checked="checked"]');

    		$('#edit-field-journal-problem-und input:checkbox').prop('checked',false);

    		$('#edit-field-journal-target-und input:checkbox').prop('checked',false);

    		

    		

			// for (var i = 0; i < problem.length; i++) {

			// 	$('#edit-field-journal-problem-und-'+problem[i]).prop('checked', false);

			// }

			// for (var i = 0; i < target.length; i++) {

			// 	alert(target[i]);

			// 	$('#edit-field-journal-target-und-'+target[i]).prop('checked', false);

			// }

    		$.ajax({

    			url: "/changemakers/journal_problem/"+project,

		        type: "POST",

		        dataType: "json",

		        success : function(data) {

		        	if(data){

		        		for (var i = 0; i < data.length; i++) {

		        		

		        			$('#edit-field-journal-problem-und-'+data[i]).prop('checked',true);

				        }

		        	}

		        			        	

		        } 



    		});

    		$.ajax({

    			url: "/changemakers/journal_target/"+project,

		        type: "POST",

		        dataType: "json",

		        success : function(data) {

		        	if(data){

		        		for (var i = 0; i < data.length; i++) {

		        		

		        			$('#edit-field-journal-target-und-'+data[i]).prop('checked',true);

				        }

		        	}

		        			        	

		        } 



    		});

    	});



    	// console.log($('form#forum-node-form div.form-group label').next());

    	// var length = $('[data-toggle="tooltip"]').length;  

    	// var tooltip =$('[data-toggle="tooltip"]');

    	// for (var i =0; i<length; i++) {

    	// var id = tooltip[i].id;    		

    	// var title = $('#'+id).attr('data-original-title');



    	// $('#'+id).parent().append('<div class="help-block">'+title+'</div>')

     	// }

       	

    	// $('[data-toggle="tooltip"]').removeAttr('data-original-title'); 



    	// var role = $('#check_role').val();

    	// alert(role);



    	// if(role == 1){



    	//  	var taxonomy_forums_tid = $('#edit-taxonomy-forums-tid').val();

    	//  	if(taxonomy_forums_tid!=""){

		//   	$('.edit_community').attr('href','/node/add/forum?taxonomy-forums-tid='+taxonomy_forums_tid);

		// }

			

	  	// }else{

	  	// 	 //$('#edit-taxonomy-forums-tid-wrapper').css('display','none');

	  	// }

  	    var x = window.location.search;

  	    var res = x.split("?taxonomy-forums-tid=");

  	    if(res[1] && res[1]!="All"){

  	    	var index = parseInt(res[1]);

  	    	$('#edit-taxonomy-forums-und option').removeAttr('selected');

  	    	

  	    	//var el =$('#edit-taxonomy-forums-und option[value='+res[1]+']').attr('selected','selected');

  	    	//$('#edit-taxonomy-forums-und').val(el[index].value);

  	    	var el =$('#edit-taxonomy-forums-und').val(res[1]);

	    	//console.log(res[1]);

  	    } 



		// user register

	  	var dateToday = new Date();

        var day = dateToday.getDate();

        var month = dateToday.getMonth()+1;

        var year = dateToday.getFullYear();

        $('#edit-field-profile-birthdate-und-0-value-datepicker-popup-0').change(function(){

            var value = $(this).val();

            var date = value.split("/");            



            if(year<parseInt(date[2])){

                var d = day+'/'+month.toString()+'/'+year;

                $(this).val(d);

                alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');

               

            }else if(year==parseInt(date[2]) && month<parseInt(date[1])){

                var d = day+'/'+month.toString()+'/'+year;

                $(this).val(d);

                alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');

                

            }else if(year==parseInt(date[2]) && month==parseInt(date[1]) && day<parseInt(date[0])){

                var d = day+'/'+month.toString()+'/'+year;

                $(this).val(d);

                alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');      



            }else if(date.length < 3 || date[2] == "" || date[2].length < 4){

            	var d = day+'/'+month.toString()+'/'+year;

                $(this).val(d);
                
            	alert('กรุณากรอก วัน เดือน ปีเกิด ให้ถูกต้อง');
            }

           

        });

      	$('.edit_total_budget,.edit_funding_amount,.edit_funding_amount_left,.edit_funding_amount_status').click(function(){

        	//console.log($(this));

        	$(this).addClass('hidden');

        	$(this).next().addClass('hidden');

        	$(this).next().next().removeClass('hidden');

        	$(this).next().next().next().removeClass('hidden');

        });



        $('#update_total_budget,#update_funding_amount,#update_funding_amount_left,#update_funding_amount_status').click(function(){

        	var type = $(this).attr('data-type');

        	var nid = $(this).attr('data-nid');

        	var amount = $('#'+type).val();

        	console.log(type,' , ',nid,' , ',amount);

     	

       		$.ajax({

    			url: "/changemakers/funding_campaign/"+type+"/"+nid+"/"+amount,

		        type: "POST",

		        data: "json",

		        success : function(res) {	

			        console.log(res);

		        	$('#update_'+type).addClass('hidden');

		        	$('#update_'+type).prev().addClass('hidden');

		        	$('#update_'+type).prev().prev().removeClass('hidden');

		        	$('#update_'+type).prev().prev().prev().removeClass('hidden');



		        	if(type=="funding_amount_status"){

		        		res = res;

		        	}else{

		        		res = res+" Baht";

		        	}



		        	$('.'+type).html(res);		        			        	

		        } 



    		 });

        });

        $('[type="reset"]').click(function(){

        	$('#edit-body-und-0-value').html();

        	console.log($('#edit-body-und-0-value').html());

        });


   	});   

}(jQuery));


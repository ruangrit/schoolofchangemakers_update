jQuery(function($){

	// alert(1);
	$('.required').prop("required", true);
	$('#edit-file').bind('change', function() {

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls|\.jpeg|\.numbers)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



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


         $(this).closest('form').trigger('submit');

         /* or:

         $('#formElementId').trigger('submit');

            or:

         $('#formElementId').submit();

         */

    });
    $('#search-edit-field-knowledge-target-tid').change(

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

	  var re = /(\.jpg|\.png|\.gif|\.psd)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของรูปภาพ (ขนาดไฟล์ต้องไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});
	$( "input[name*='files[field_file_comment_project_und_0]']" ).bind('change', function() {

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});


	$('#edit-field-image-comment-event-und-0-upload--3').bind('change', function() {

	  var re = /(\.jpg|\.png|\.gif|\.psd)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของรูปภาพ (ขนาดไฟล์ต้องไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});

	$('#profile-picture').bind('change', function() {

	  var re = /(\.jpg|\.png|\.gif|\.psd)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของรูปภาพ (ขนาดไฟล์ต้องไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});

	$('#edit-field-journal-image-und-0-upload').bind('change', function() {

	  var re = /(\.jpg|\.png|\.gif|\.psd)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของรูปภาพ (ขนาดไฟล์ต้องไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});

	$('#edit-field-journal-image-other-und-0-upload').bind('change', function() {

	  var re = /(\.jpg|\.png|\.gif|\.psd)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของรูปภาพ (ขนาดไฟล์ต้องไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์ภาพ อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});
	$('#edit-field-journal-document-und-0-upload').bind('change', function() {

	  var re = /(\.pdf|\.doc|\.docx|\.pages|\.xlsx|\.xls)$/i;

	  //this.files[0].size gets the size of your file.

	  var f = this.files[0];

	  if (f.size > 1048576   || f.fileSize > 1048576  )

	        {

	           //show an alert to the user

	           alert("กรุณาเช็คขนาดของไฟล์เอกสาร (อัพโหลดขนาดไฟล์ไม่เกิน 1 MB ต่อไฟล์)")



	           //reset file upload control

	           this.value = null;

	        }

	   if(!re.exec(f.name))

		{

			alert("กรุณาเช็คประเภทของไฟล์เอกสาร อนุญาตให้อัพโหลดได้เฉพาะ (ประเภทไฟล์ที่อนุญาตใส่ลงไป)");

			this.value = null;

		}



	});

	// $( "input[name*='field_problem_topic[und][11]']" ).click(function(){
	// 	alert("tong");
	// });

	// $( "input[name*='field_problem_topic[und][11]']" ).toggle(function() {
	// 	$("'input[name*='field_problem_topic[und][99']").prop('checked', checked);
	// }, function() {
	//     $("'input[name*='field_problem_topic[und][99']").prop('checked', checked);
	// });

	$("input[name*='field_problem_topic[und][11]']").click(function(){
        $("input[name*='field_problem_topic[und][99']").not(this).prop('checked', this.checked);
    });

    





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
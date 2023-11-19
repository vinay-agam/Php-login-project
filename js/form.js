$(document).ready(function (){



/* variable declaration

var firstname=$('#fname').val();
var lastname=$('#lname').val();
var phone=$('#phone').val();
var email=$('#mail').val();
var dob=$('#dob').val();
var gender=$('#gender').val();
var country=$('#country').val();
var state=$('#state').val();
var district=$('#district').val();
var dep=$('#dep').val();
var des=$('#des').val();
*/


// fname validate
$("#fname").keyup(function(){
var firstname=$('#fname').val();
var emailfilter=/^[a-z A-Z]+$/i;
if(!emailfilter.test(firstname)){
$("#error_fname").css("display","block");
$("#error_fname").text("* is not a valid Name");
firstname.focus;
}else{

$("#error_fname").css("display","none");
}
});

// Lname validate
$("#lname").keyup(function(){
var lastname=$('#lname').val();
var lastnamefilter=/^[a-z A-Z]+$/i;
if(!lastnamefilter.test(lastname)){
$("#error_lname").css("display","block");
$("#error_lname").text("* is not a valid Name");
lastname.focus;
}else{

$("#error_lname").css("display","none");
}
});

// Mobile validate
$("#phone").keyup(function(){
var phone=$('#phone').val();
var phonefilter=/^[0-9]{10}$/;
if(!phonefilter.test(phone)){
$("#error_phone").css("display","block");
$("#error_phone").text("* is not a valid phone number");
phone.focus;
}else{

$("#error_phone").css("display","none");
}
});

//Email validate
$("#mail").keyup(function(){
var mail=$('#mail').val();
var mailfilter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(!mailfilter.test(mail)){
$("#error_mail").css("display","block");
$("#error_mail").text("* is not a valid Email");
mail.focus;
}else{

$("#error_mail").css("display","none");
}
});

//DOB validate
$("#dob").keyup(function(){
var dob=$('#dob').val();
var dobfilter="";
if(!dobfilter===dob){
$("#error_dob").css("display","block");
$("#error_dob").text("* is mandatory");
dob.focus;
}else{

$("#error_dob").css("display","none");
}
});


//image validate
  $("#photo").change(function () {
                // Get uploaded file extension
                var extension = $(this).val().split('.').pop().toLowerCase();
                // Create array with the files extensions that we wish to upload

                var validFileExtensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];

         //Check file extension in the array.if -1 that means the file extension is not in the list. 
                if ($.inArray(extension, validFileExtensions) == -1) {
                    $('#error_photo').text("Sorry!! Upload only jpg, jpeg, png, gif, bmp file").show();
                    // Clear fileuload control selected file
                    $(this).replaceWith($(this).val('').clone(true));
                    //Disable Submit Button
                    $('#submit').prop('disabled', true);
                }
                else {
                    // Check and restrict the file size to 2 MB.
                    if ($(this).get(0).files[0].size > (2000000)) {
                        $('#error_photo').text("Sorry!! Max allowed file size is 32 kb").show();                
                     // Clear fileuload control selected file
                        $(this).replaceWith($(this).val('').clone(true));
                        //Disable Submit Button
                        $('#submit').prop('disabled', true);
                    }
                    else {
                        //Clear and Hide message span
                        $('#error_photo').text('').hide();
                        //Enable Submit Button
                        $('#submit').prop('disabled', false);
                    }
                }
            });


//document validate

$("#doc").change(function () {
                // Get uploaded file extension
                var docextension = $(this).val().split('.').pop().toLowerCase();
                // Create array with the files extensions that we wish to upload

                var validdocExtensions = ['pdf', 'doc', 'docx'];

         //Check file extension in the array.if -1 that means the file extension is not in the list. 
                if ($.inArray(docextension, validdocExtensions) == -1) {
                    $('#error_doc').text("Sorry!! Upload only pdf, doc, docx file").show();
                    // Clear fileuload control selected file
                    $(this).replaceWith($(this).val('').clone(true));
                    //Disable Submit Button
                    $('#submit').prop('disabled', true);
                }
                else {
                    // Check and restrict the file size to 2 MB.
                    if ($(this).get(0).files[0].size > (2000000)) {
                        $('#error_doc').text("Sorry!! Max allowed file size is 32 kb").show();                
                     // Clear fileuload control selected file
                        $(this).replaceWith($(this).val('').clone(true));
                        //Disable Submit Button
                        $('#submit').prop('disabled', true);
                    }
                    else {
                        //Clear and Hide message span
                        $('#error_doc').text('').hide();
                        //Enable Submit Button
                        $('#submit').prop('disabled', false);
                    }
                }
            });

});




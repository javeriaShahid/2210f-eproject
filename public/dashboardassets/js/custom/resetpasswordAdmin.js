  // Redirected Error ends here
  $(document).ready(function(){
// URLS
 let VerificationContainer = $('#verificationContainer');
 let verificationInContainer = $("#verificationInput");
 let loginContainer           = $('#loginContainer') ;
 let submitButton          = $("#submitButton") ;
 let forgetButton          = $("#forgetPassword");
 let titleContainer        = $("#titleContainer");
 let verification_email    = $("#verification_email");
 let verification_code     = $("#verificationCode");
 let passInput             = $("#new_password");
 let confirmPass           = $('#confirm_password');
 let passContainer         = $('#passContainer')
 $(forgetButton).on('click' , function(e){
     e.preventDefault();
     $(VerificationContainer).fadeIn();
     $(loginContainer).fadeOut();
     $(submitButton).text('Send Verification');
     $(titleContainer).text('Enter Your Email To Get a Verification Code To Reset Your Password')
 });

 $(submitButton).on('click' , function(e){
 if(submitButton.text()  ==  "Send Verification" || submitButton.text()  ==  "Try Again" ){
         if($(verification_email).val() == ""){
             e.preventDefault();
             toastr['error']("Please Enter Email Address");
             return false;
         }
         else{
         e.preventDefault();
         verification_email.prop('readonly' , true);
         $(submitButton).text('Please wait.....');
         $(submitButton).prop('disabled' , true);

         $.ajax({
             url : getVerification  ,
             type: 'Post',
             data : {verification_email : verification_email.val()},
             headers:{
                 'X-CSRF-TOKEN' : $("#csrfToken").val()
             },
             success:function(response){
                 if(response.message == 'success'){
                     e.preventDefault();
                     toastr['success']("Verification Code Has been Sent Check Your Email");
                     verificationInContainer.fadeIn();
                     $(submitButton).text('Verify Code');
                     $(submitButton).prop('disabled' , false);

                     return false ;
                 }
                 else if(response.message == 'email not found'){
                     e.preventDefault();
                     toastr['error']("Email not Found in our data");
                     verification_email.prop('readonly' , false);
                     $(submitButton).prop('disabled' , false);

                     $(submitButton).text('Try Again');
                     return false ;
                 }
                 else{
                     e.preventDefault();
                     toastr['error']("An error occured Sending Verification Code");
                     $(submitButton).text('Try Again');
                     verification_email.prop('readonly' , false);
                     return false ;
                 }
             }
         })
         }
 }
 //  Sending Verification Code

 if($(submitButton).text() == "Verify Code" || $(submitButton).text() == 'Verify Again'){
          if($(verification_code).val() == ""){
             e.preventDefault();
             toastr['error']("Please Enter Verification Code");
             return false;
          }
         else{
           e.preventDefault();
           $.ajax({
             url : verifyCode  ,
             type: 'Post',
             data : {verification_email: verification_email.val(), verification_code : verification_code.val()},
             headers:{
                 'X-CSRF-TOKEN' : $("#csrfToken").val()
             },
             success:function(response){
                 if(response.message == 'success'){
                     e.preventDefault();
                     toastr['success']("Verification SuccessFull");
                     $(passContainer).fadeIn();
                     $(VerificationContainer).fadeOut();
                     $(submitButton).text('Reset Password');
                     return false ;
                 }

                 else{
                     e.preventDefault();
                     toastr['error']("Invalid Verification Code");
                     $(submitButton).text('Verify Again');
                     verification_code.val("")
                     verification_email.prop('readonly' , true);
                     return false ;
                 }
             }
         })
     }
  }
 //  Verifying Verification Code
 if($(submitButton).text() == 'Reset Password'){
     if(passInput.val() == ""){
         e.preventDefault();
         toastr['error']("Please Enter Your New Password");
         return false;
     }
     if(passInput.val() != "" && passInput.val().length < 8){
         e.preventDefault();
         toastr['error']("Password Must be Greater then 8-digits");
         return false;
     }
     if(confirmPass.val() == ""){
         e.preventDefault();
         toastr['error']("Please Confirm your new password");
         return false;
     }
     if(passInput.val() != confirmPass.val()){
         e.preventDefault();
         toastr['error']("Password must match the Confirm Password");
         return false;
     }
     else{
         e.preventDefault();
           $.ajax({
             url : resetPassword  ,
             type: 'Post',
             data : {verification_email : verification_email.val() , new_password : passInput.val()},
             headers:{
                 'X-CSRF-TOKEN' : $("#csrfToken").val()
             },
             success:function(response){
                 if(response.message == 'success'){
                     e.preventDefault();
                     toastr['success']("Password has been Reset");
                    $(loginContainer).fadeIn();
                    $(VerificationContainer).fadeOut();
                    $(passContainer).fadeOut();
                    $(submitButton).text("Login");
                 }

                 else{
                     e.preventDefault();
                     toastr['error']("Failed To Reset Your Password Try Again Later");
                     verification_email.prop('readonly' , true);

                 }
             }
         })
     }
 }
 })
})

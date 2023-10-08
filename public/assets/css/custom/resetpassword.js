$(document).ready(function(){

    let verificationEmail            =  $('input[name="verification_email"]');
    let emailContainer               =  $('#emailContainer');
    let verificationContainer        =  $('#verificationContainer');
    let passwordContainer            =  $('#passwordContainer');
    let submitBtn                    =  $('#submitButton');
    let verificationForm             =  $('#resetForm');
    let password                     =  $('input[name="new_password"]');
    let confirmpassword              =  $('input[name="confirm_password"]');
    let verificationCode             =  $('input[name="verification_code"]');
    let successContainer             =  $('#passwordResetNotify');
    let CloseBtnReset                =  $('.resetClose');
    // Getting Verification Email
   $(submitBtn).on('click',function(e){
    isValid = true ;
    if(verificationEmail.val() == "")
    {
        e.preventDefault();
        isValid = false ;
        toastr['error']("Email for verification is required");
    }

    if(isValid == true)
    {
        // To Send verification Email
        if(submitBtn.text() == "Get code" || submitBtn.text() == "Send Again" )
        {

            e.preventDefault();
            submitBtn.text("Please wait...");
            submitBtn.prop('disabled' , true);
            $.ajax({
                url : getCodeRoute ,
                type: "post",
                data : verificationForm.serialize() ,
                success:function(response){
                    e.preventDefault();

                    if(response.message == "success")
                    {
                        verificationEmail.prop('readonly' , true);
                        submitBtn.text("Verify Code");
                        verificationContainer.show();
                        submitBtn.prop('disabled' , false);
                        toastr['success']("Email has been Sent");
                    }
                    else if(response.message == "email not found")
                    {
                        e.preventDefault();
                        submitBtn.text("Send Again");
                        submitBtn.prop('disabled' , false);
                        toastr['warning']("This Email Doesn't Exist in our Data use a valid email");
                    }
                    else if(response.message == "error")
                    {
                        e.preventDefault();
                        submitBtn.text("Send Again");
                        submitBtn.prop('disabled' , false);
                        toastr['error']("Failed to send email");
                    }
                }
            });
          }
        //   Sending Email Verification Ends Here

        if(submitBtn.text() == "Verify Code" || submitBtn.text() == "Verify Again")
        {
            if(verificationCode.val() == "")
            {
                toastr['error']("Please Enter your verificatio  Code");
                return false ;
            }

            e.preventDefault();
            submitBtn.text("Please Wait..");
            submitBtn.prop("disabled" , true);
            $.ajax({
                url   : verifyRoute ,
                type  : 'Post', 
                data  : verificationForm.serialize(),
                success:function(response)
                {
                    if(response.message == "success")
                    {
                        e.preventDefault();
                        emailContainer.hide();
                        submitBtn.prop("disabled" , false);
                        verificationContainer.hide();
                        passwordContainer.show();
                        submitBtn.text('Reset Password');
                        toastr['success']("Verification successful now you can reset your password");
                    }
                    else
                    {
                        e.preventDefault();
                        submitBtn.text("Verify Again");
                        submitBtn.prop("disabled" , false);
                        toastr['error']("Invalid Verification Code");
                    }
                }
            });
        }
    // Verifying Code ends here
    // Reset Password
    if(submitBtn.text() == "Reset Password" || submitBtn.text() == "Retry")
    {
        e.preventDefault();
        DataValid = true ;
        if(password.val().length < 8)
        {
            e.preventDefault();
            DataValid = false; 
            toastr['error']('Password must be greater then 8-digits or characters');
        }
        if(password.val() == "")
        {
            e.preventDefault();
            DataValid = false;
            toastr['error']("New Password is required");
        }
        if(confirmpassword.val() == "")
        {
            e.preventDefault();
            DataValid = false; 
            toastr['error']("Confirm Password is required");
        }
        if(confirmpassword.val() != password.val() )
        {
            e.preventDefault();
            DataValid = false ;
            toastr['error']("Password must match the Confirm password");
        }
        if(DataValid == true)
        {
           e.preventDefault();
           submitBtn.text('Please Wait....');
           submitBtn.prop('disabled' , true);

           $.ajax({
            url  : resetRoute ,
            type : "Post" ,
            data : verificationForm.serialize(),
            success:function(response){
                    if(response.message == "success")
                    {
                        e.preventDefault();
                        passwordContainer.hide();
                        successContainer.show();
                        submitBtn.hide();
                        toastr['success']("Password has been Reset");
                    }
                    else
                    {
                        e.preventDefault()
                        toastr['error']("Failed to Reset Password");
                        submitBtn.text('Retry');
                        submitBtn.prop("disabled" , false);
                    }
                }   
           });

        }

    }
    // Reset Password Ended Here
    // reseting form
    $(CloseBtnReset).on('click' , function(e){
        e.preventDefault();
        submitBtn.show();
        submitBtn.text("Get code");
        emailContainer.show();
        successContainer.hide();
        $(verificationForm)[0].reset();
        submitBtn.prop('disabled' , false);
        emailContainer.prop('readonly' , false);
    })
    }



   })


});

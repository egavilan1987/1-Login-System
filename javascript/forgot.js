$(function() {

  error_email = false;

  $("#email").focusout(function() {
      check_email();
    });

    function check_email() {

     var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
     var email_length = $("#email").val().length;

     if( $.trim( $('#email').val() ) == '' ){
       $("#email_error_message").html("Input is blank!");
       $("#email_error_message").show();
       error_email = true;
       email.style.border = "1px solid red";
       }else if(!(pattern.test($("#email").val()))) {
       $("#email_error_message").html("Invalid email address");
       error_email = true;
       email.style.border = "1px solid red";
       $("#email_error_message").show();
       error_email = true;
       } else {
       $("#email_error_message").hide();
       email.style.border = "1px solid #ccc";
       }
   }
function forgotPassword(){
    error_email = false;

    check_email();

    if(error_email == false) {
        $("#alert_error_message").hide();
        $("#alert_success_message").show();
        //$('#email').val("");
        //return false;

        /*data=$('#frmForgotPassword').serialize();
        $.ajax({
          type:"POST",
          data:data,
          url:"process/regLogin/login.php",
          success:function(r){
          if(r==1){
              window.location="view/init.php";
        }else{
              $("#alert_error_message").show();
              $("#alert_success_message").hide();
            }
          }
        });*/
      }else{
            $("#alert_error_message").show();
            $("#alert_success_message").hide();
            //return false;
          }

    }
    $('#forgotPasswordBtn').click(function(){
        forgotPassword();
    });
    $(document).keypress(function(e) {
        if(e.which == 13) {
            forgotPassword();
        }
    });
});

$(function() {

  var error_email = false;
  var error_firstname = false;
  var error_lastname = false;
  var error_password = false;
  var error_retype_password = false;

    $("#firstname").focusout(function() {
      check_firstname();
    });
    $("#lastname").focusout(function() {
        check_lastname();
      });
    $("#email").focusout(function() {
      check_email();
    });
    $("#password").focusout(function() {
      check_password();
    });
    $("#password_confirmation").focusout(function() {
      check_password_confirmation();
    });

    function check_firstname() {

    var firstname_length = $("#firstname").val().length;

    if( $.trim( $('#firstname').val() ) == '' ){
      $("#firstname_error_message").html("Input is blank!");
      $("#firstname_error_message").show();
      error_firstname = true;
      firstname.style.border = "1px solid red";
      }else if(firstname_length < 5 || firstname_length > 20) {
      $("#firstname_error_message").html("Should be between 5-20 characters");
      $("#firstname_error_message").show();
      error_firstname = true;
      firstname.style.border = "1px solid red";
      $("#firstname_error_message").show();
      error_firstname = true;
      }else{
      $("#firstname_error_message").hide();
      firstname.style.border = "1px solid #ccc";
    }

  }
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
   function check_password() {

    var password_length = $("#password").val().length;

    if(password_length < 8) {
      $("#password_error_message").html("At least 8 characters!");
      $("#password_error_message").show();
      error_password = true;
      password.style.border = "1px solid red";
    } else {
      $("#password_error_message").hide();
      password.style.border = "1px solid #ccc";
    }

  }
   function check_password_confirmation() {

    var password = $("#password").val();
    var retype_password = $("#password_confirmation").val();

    if(password !=  retype_password) {
      $("#password_confirmation_error_message").html("Passwords don't match");
      $("#password_confirmation_error_message").show();
      error_retype_password = true;
      password_confirmation.style.border = "1px solid red";
      } else {
      $("#password_confirmation_error_message").hide();
      password_confirmation.style.border = "1px solid #ccc";
         }
      }
      $('#btnAddUsers').click(function(){


        error_email = false;
        error_password = false;
        error_retype_password = false;


        check_email();
        check_password();
        check_password_confirmation();


      if(error_email == false && error_password == false && error_retype_password == false) {
          $("#alert_error_message").hide();
          data=$('#frmAddUsers').serialize();
          $.ajax({
            type:"POST",
            data:data,
            url:"../process/users/registerUser.php",
            success:function(r){
            if(r==1){
              $('#frmAddUsers')[0].reset();
              alertify.success("New user successfuly added!");
          }else{
              alertify.error("Could not add the new user.");
              }
            }
          });
          return false;
        }else{

          $("#alert_error_message").show();

          return false;
        }
    });
});

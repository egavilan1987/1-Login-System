<html>
 <head>
  <title>Create New User</title>
  <?php require_once "menu.php"; ?>
 </head>
 <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="init.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="users.php">Users</a>
        </li>
        <li class="breadcrumb-item active">New Users</li>
      </ol>
      <a href="users.php" class="btn btn-success" role="button" aria-pressed="true"><span class="fa fa-fw fa-users"></span>Users</a>
      <br>
      <br>
      <!-- Example DataUsers Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user-plus"></i> User Registration Form</div>
        <div class="card-body">
          </tr>
          <div class="table-responsive">
            <div class="container">
              <form id="frmAddUsers">
                <h2>Create New User</h2>
                <hr class="colorgraph">
                <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                  <i class="fa fa-exclamation-triangle"></i>
                  <strong>Alert!</strong> Please check in on some of the fields below.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <p style="color:red"><i>*Required</i></p>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="user" id="user" class="form-control input-lg" placeholder="User*">
                      <div id="username_error_message" style="color:red"></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="email" id="email" class="form-control input-lg" placeholder="E-mail*">
                      <div id="email_error_message" style="color:red"></div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="employee" id="employee" class="form-control input-lg" placeholder="Employee Name*">
                  <div id="employee_error_message" style="color:red"></div>
                </div>
                <div class="form-group">
                  <select name="role" id="role" class="form-control">
                    <option value="" hidden>Role*</option>
                    <option>Admin</option>
                    <option>User</option>
                  </select>
                  <div id="role_error_message" style="color:red"></div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password*">
                      <div id="password_error_message" style="color:red"></div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password*">
                      <div id="password_confirmation_error_message" style="color:red"></div>
                    </div>
                  </div>
                </div>
                    <button type="button" id="btnCancel"  class="btn btn-danger">Cancel</button>
                    <button type="button" id="btnAddUsers" class="btn btn-primary">Save</button>
              </form>            
          </div>
        </div>
      </div>
    </div>
  </div>



</body>
</html>


<script>
$(function() {

  var error_username = false;
  var error_email = false;
  var error_employee = false;
  var error_role = false;
  var error_password = false;
  var error_retype_password = false;

  $("#user").focusout(function() {
      check_username();
    });
   $("#email").focusout(function() {
      check_email();
    });
   $("#employee").focusout(function() {
      check_employee();
    });
   $("#role").focusout(function() {
      check_role();
    });
    $("#password").focusout(function() {
      check_password();
    });
    $("#password_confirmation").focusout(function() {
      check_password_confirmation();
    });

    function check_username() {
    
    var username_length = $("#user").val().length;
    
    if( $.trim( $('#user').val() ) == '' ){
      $("#username_error_message").html("Input is blank!");
      $("#username_error_message").show();
      error_username = true;
      user.style.border = "1px solid red";
      }else if(username_length < 5 || username_length > 20) {
      $("#username_error_message").html("Should be between 5-20 characters");
      $("#username_error_message").show();
      error_username = true;
      user.style.border = "1px solid red";
      $("#username_error_message").show();
      error_username = true;
      }else{
      $("#username_error_message").hide();
      user.style.border = "1px solid #ccc";
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
   function check_employee() {
    
    var employee_length = $("#employee").val().length;
    
    if( $.trim( $('#employee').val() ) == '' ){
      $("#employee_error_message").html("Input is blank!");
      $("#employee_error_message").show();
      error_employee = true;
      employee.style.border = "1px solid red";
      }else if(employee_length < 5 || employee_length > 50) {
      $("#employee_error_message").html("Should be between 5-20 characters");
      $("#employee_error_message").show();
      error_employee = true;
      employee.style.border = "1px solid red";
      }else{
      $("#employee_error_message").hide();
      employee.style.border = "1px solid #ccc";
    }
  
  }
   function check_role() {


    if($.trim( $('#role').val() ) == ''){
      $("#role_error_message").html("Please choose a role!");
      role.style.border = "1px solid red";
      error_role = true;
      }else{
      $("#role_error_message").hide();
      role.style.border = "1px solid #ccc";
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

        error_username = false;
        error_email = false;
        error_employee = false;
        error_role = false;
        error_password = false;
        error_retype_password = false;

        check_username();
        check_email();
        check_employee();
        check_role();
        check_password();
        check_password_confirmation();

    
      if(error_username == false && error_email == false && error_employee == false && error_role == false && error_password == false && error_retype_password == false) {          
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

      $('#btnCancel').click(function(){

        alertify.confirm('Cancel User Registration','Do you want to cancel user registration?', function(){
          $('#frmAddUsers')[0].reset(); 
          alertify.error('Canceled!');

          $("#alert_error_message").hide();
          user.style.border = "1px solid #ccc";
          $("#email_error_message").hide();
          email.style.border = "1px solid #ccc";
          $("#employee_error_message").hide();
          employee.style.border = "1px solid #ccc";
          $("#role_error_message").hide();
          role.style.border = "1px solid #ccc";
          $("#password_error_message").hide();
          password.style.border = "1px solid #ccc";
          $("#password_confirmation_error_message").hide();
          password_confirmation.style.border = "1px solid #ccc";

          $("#username_error_message").hide();
        }, function(){ 
          alertify.success("Cancel Operation Canceled!");
        });

    });
});

</script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#alert_error_message").hide();
    });
  </script>



<html>
 <head>
  <title>Edit User</title>
  <?php require_once "menu.php";
    $id = $_SESSION['iduser'];
  ?>
 </head>
 <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="init.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User Profile</li>
      </ol>
      <br>
      <br>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">            
                <li class="active">
                  <a href="#" class="btn btn-primary btn-ms" role="button" aria-pressed="true" data-target-id="profile"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;User Information&nbsp;</a>
                </li>
                <br><br>
                <li>
                  <a href="#" class="btn btn-primary btn-ms" role="button" aria-pressed="true" data-target-id="updatePassword"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Change Passworld</a>
                </li>
                <br><br>
                <li>
                  <a href="#" class="btn btn-primary btn-ms" role="button" aria-pressed="true" data-target-id="profileImage"><i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;Profile Image&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 well admin-content" id="profile">        
          <!-- Example DataUsers Card-->
        <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-id-card-o"></i>&nbsp;User Profile</div>
        <div class="card-body">       
          <div class="table-responsive">
           <div class="container">
            <!------ Include the above in your HEAD tag ---------->
           <div class="container">
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12" >
                            <form id="frmEditUser">
                              <h2>User Information</h2>
                              <div class="row">
                              </div>
                              <input type="text" hidden="" id="idUser" name="idUser">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="updateUserName" id="updateUserName" class="form-control input-lg" placeholder="Username*" disabled="disabled">
                                <div id="username_error_message" style="color:red"></div>
                              </div>

                              <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="updateEmail" id="updateEmail" class="form-control input-lg" placeholder="E-mail*" disabled="disabled">
                                <div id="email_error_message" style="color:red"></div>
                              </div> 

                              <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="updateFullName" id="updateFullName" class="form-control input-lg" placeholder="Employee Name*" disabled="disabled">
                                <div id="employee_error_message" style="color:red"></div>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Example DataUsers Card-->
        <div class="col-md-9 well admin-content" id="updatePassword">
          <!-- Example DataUsers Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-lock"></i>  Edit User Password</div>
            <div class="card-body">       
              <div class="table-responsive">
                <div class="container">
                  <form id="frmEditUserPassword">                    
                    <div id="alert_password_error_message" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="fa fa-exclamation-triangle"></i>
                      <strong>Alert!</strong> Please check in on some of the fields below.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>                    
                    <p style="color:red"><i>*Required</i></p>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">             
                        <input type="text" hidden="" id="idUpdatePassword" name="idUpdatePassword">
                        <div class="form-group">
                          <input type="password" name="oldPassword" id="oldPassword" class="form-control input-lg" placeholder="Old Password*">
                          <div id="old_password_error_message" style="color:red"></div>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control input-lg" placeholder="New Password*">
                          <div id="password_error_message" style="color:red"></div>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password*">
                          <div id="password_confirmation_error_message" style="color:red"></div>
                        </div>
                          <button type="button" id="btnCancelPassword"  class="btn btn-danger">Cancel</button>
                          <button type="button" id="btnSavePassword" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-9 well admin-content" id="profileImage">        
          <!-- Example DataUsers Card-->
        <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-picture-o"></i>  Edit Profile Image
        </div><br>                               
           <form align="center" id="frmEditImage">
            <h2>User Profile Picture</h2>
            <br>    
            <div id="viewImage"></div>
              <div class="avatar-upload">
                <input type="text" hidden="" id="idUserImage" name="idUserImage">
                <br><br>
                <input type="file" id="image" name="image">                                         
              </div>  
              <br>                                    
            <div>
                <button type="button" id="btnSaveImage" class="btn btn-primary">Save new profile image</button>
            </div>
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
  var error_status = false;
  var error_password = false;
  var error_retype_password = false;

  $("#updateUserName").focusout(function() {
      check_username();
    });
   $("#updateEmail").focusout(function() {
      check_email();
    });
   $("#updateFullName").focusout(function() {
      check_employee();
    });
   $("#role").focusout(function() {
      check_role();
    });
    $("#status").focusout(function() {
      check_status();
    });
    $("#oldPassword").focusout(function() {
      check_old_password();
    });
    $("#password").focusout(function() {
      check_password();
    });
    $("#password_confirmation").focusout(function() {
      check_password_confirmation();
    });
    function check_username() {
    
    var username_length = $("#updateUserName").val().length;
    
    if( $.trim( $('#updateUserName').val() ) == '' ){
      $("#username_error_message").html("Input is blank!");
      $("#username_error_message").show();
      error_username = true;
      updateUserName.style.border = "1px solid red";
      }else if(username_length < 5 || username_length > 20) {
      $("#username_error_message").html("Should be between 5-20 characters");
      $("#username_error_message").show();
      error_username = true;
      updateUserName.style.border = "1px solid red";
      $("#username_error_message").show();
      error_username = true;
      }else{
      $("#username_error_message").hide();
      updateUserName.style.border = "1px solid #ccc";
    }
  
  }
   function check_email() {
    
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    var email_length = $("#updateEmail").val().length;
    
    if( $.trim( $('#updateEmail').val() ) == '' ){
      $("#email_error_message").html("Input is blank!");
      $("#email_error_message").show();
      error_email = true;
      updateEmail.style.border = "1px solid red";
      }else if(!(pattern.test($("#updateEmail").val()))) {
      $("#email_error_message").html("Invalid email address");
      error_email = true;
      updateEmail.style.border = "1px solid red";
      $("#email_error_message").show();
      error_email = true;
      } else {
      $("#email_error_message").hide();
      updateEmail.style.border = "1px solid #ccc";
      }
  
  }
   function check_employee() {
    
    var employee_length = $("#updateFullName").val().length;
    
    if( $.trim( $('#updateFullName').val() ) == '' ){
      $("#employee_error_message").html("Input is blank!");
      $("#employee_error_message").show();
      error_employee = true;
      updateFullName.style.border = "1px solid red";
      }else if(employee_length < 5 || employee_length > 50) {
      $("#employee_error_message").html("Should be between 5-20 characters");
      $("#employee_error_message").show();
      error_employee = true;
      updateFullName.style.border = "1px solid red";
      }else{
      $("#employee_error_message").hide();
      updateFullName.style.border = "1px solid #ccc";
    }
  
  }
   function check_old_password() {
    
    var password_length = $("#oldPassword").val().length;
    
    if(password_length < 8) {
      $("#old_password_error_message").html("At least 8 characters!");
      $("#old_password_error_message").show();
      error_old_password = true;
      oldPassword.style.border = "1px solid red";
        }else if(password_length > 7){ 
          $.ajax({
            type:"POST",
            data: { oldPassword : $('#oldPassword').val()},
            url:"../process/users/check_password.php",
            success:function(r){

            if(r==1){
              $("#old_password_error_message").html("Invalid password.");
              $("#old_password_error_message").show();
              error_old_password = true;
              oldPassword.style.border = "1px solid red";
            }else{
              $("#old_password_error_message").hide();
              oldPassword.style.border = "1px solid #ccc";
              }
            }
          });
    }else {
      $("#old_password_error_message").hide();
      oldPassword.style.border = "1px solid #ccc";
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

      $('#btnUpdateUser').click(function(){
        error_username = false;
        error_email = false;
        error_employee = false;
        check_username();
        check_email();
        check_employee();

      if(error_username == false && error_email == false && error_employee == false) {          
          $("#alert_error_message").hide();

          data=$('#frmEditUser').serialize();
          $.ajax({
            type:"POST",
            data:data,
            url:"../process/users/updateUser.php",
            success:function(r){
            if(r==1){
              alertify.success("User information successfully updated!");
          }else{
              alertify.error("Could not update the user information.");
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
        alertify.confirm('Cancel User Information Updating.','Do you want to cancel user information updating?', function(){
         window.location.replace("users.php");
        }, function(){ 
          alertify.success("Operation Canceled!");
        });
    });

      $('#btnSavePassword').click(function(){
        
        error_old_password = false;
        error_password = false;
        error_retype_password = false;
        
        check_old_password();
        check_password();
        check_password_confirmation();

      if(error_old_password == false && error_password == false && error_retype_password == false) {          
          $("#alert_password_error_message").hide();

          data=$('#frmEditUserPassword').serialize();
          $.ajax({
            type:"POST",
            data:data,
            url:"../process/users/profileUpdatePassword.php",
            success:function(r){
            if(r==1){
              $('#frmEditUserPassword')[0].reset();
              alertify.success("Password changed sucessfully!");

          }else{
              alertify.error("Could not update the user information.");
              }
            }
          });
          return false; 
        }else{
          $("#alert_password_error_message").show();
          return false; 
        }
    });
      $('#btnCancelPassword').click(function(){
        alertify.confirm('Cancel the Password Updating.','Do you want to cancel the password update?', function(){
          $('#frmEditUserPassword')[0].reset();
          $("#alert_password_error_message").hide();

          $("#old_password_error_message").hide();
          oldPassword.style.border = "1px solid #ccc";
          $("#password_error_message").hide();
          password.style.border = "1px solid #ccc";
          $("#password_confirmation_error_message").hide();
          password_confirmation.style.border = "1px solid #ccc"; 
          
          alertify.success("Operation Canceled!");
        }, function(){
          alertify.error('Canceled!');          
        });
    });
      $('#btnSaveImage').click(function(){

        var formData = new FormData(document.getElementById("frmEditImage"));

        $.ajax({
          url: "../process/users/updateProfile.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,

          success:function(r){
            if(r == 1){
              $('#viewImage').empty();
              $("#image").val("");
              addUser(idUser);
              alertify.success("Profile image updated successfully!");

              
            }else{
              alertify.error("Could not update the profile image");
            }
          }
        });
        
    });

});
</script>
</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#alert_error_message").hide(); 
      $("#alert_password_error_message").hide();

      var navItems = $('.admin-menu li > a');
      var navListItems = $('.admin-menu li');
      var allWells = $('.admin-content');
      var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });

    });

    var idUser ="<?php echo $id; ?>";
    addUser(idUser);



    function addUser(idUser){
      $.ajax({
        type:"POST",
        data:"idUser=" + idUser,
        url:"../process/users/getUserData.php",
        success:function(r){
          data=jQuery.parseJSON(r);
          $('#idUser').val(data['id_user']);
          $('#idUpdatePassword').val(data['id_user']);  
          $('#idUserImage').val(data['id_user']);
          $('#updateUserName').val(data['user_name']);
          $('#updateEmail').val(data['email']);
          $('#updateFullName').val(data['full_name']);
          $('#updateRole').val(data['user_role']);
          $('#viewImage').prepend('<img class="img-thumbnail" id="imgp" src="' + data['imagePath'] + '"  width="200" height="200"/>');
          $('#updateStatus').val(data['status']);              
        }
      });
    }

  </script>



<html>
 <head>
  <title>Users</title>
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
        <li class="breadcrumb-item active">Users</li>
      </ol>
      <a href="addUsers.php" class="btn btn-success" role="button" aria-pressed="true"><span class="fa fa-user-plus"></span> Add New User</a>
      <a href="http://192.168.0.106:8080/callcenter/1-Dashboard/view/fpdf/usersInf.php" target="_blank" class="btn btn-primary" role="button" aria-pressed="true"><span class="fa fa-print"></span> Print Users</a>
      <br>
      <br>
      <!-- DataUsers Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Users
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div id="loadUsersTable"></div>
          </div>
        </div>
        <div class="card-footer"> </div>
      </div>
    </div>
  </div>
  <!-- User Detail Modal -->
  <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="usersModalLabel">User Information</h5>
          <span style="padding-left:150px;"></span>
            <form action="editUser.php" method="get">
              <input type="text"  hidden="" id="idUser" name="idUser">
              <button class="btn btn-secondary btn-xs" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button>        
            </form>
            <form action="http://192.168.0.106:8080/callcenter/1-Dashboard/view/fpdf/printUser.php" target="_blank" method="get">
              <input  type="text"  hidden="" id="idPrintUser" name="idPrintUser">
              <button class="btn btn-secondary btn-xs" type="submit"><i class="fa fa-print"></i> Print</button>
            </form>
        </div>
        <div class="modal-body">
          <div class="modal-body">
            <center>
              <br>           
                <div id="viewImage"></div>   
                  <div class="media-heading">
                    <Strong ><h4>
                      <div id="viewFullName"></div></h4>
                    </Strong>
                  </div>
                    <font class="border border-danger" id="viewStatus"></font>
                    <div id="viewRole"></div>
                    <div id="viewUser"></div>
                    <div id="viewEmail"></div>
                    <hr>                    
                      <tr>
                        <Strong>
                          <td>Created by:</td>
                        </Strong>
                        <div id="viewCreatedBy"></div>
                      </tr>
                      <tr>
                        <Strong>
                          <td>Date created:</td>
                        </Strong>
                        <div id="viewDateCreated"></div>
                      </tr>
                      <tr>
                        <Strong>
                          <td>Last Update by:</td>
                        </Strong>
                        <div id="viewUpdatedBy"></div>
                      </tr>
                      <tr>
                        <Strong>
                          <td>Last update date:</td>
                        </Strong>
                        <div id="viewUpdatedDate"></div>
                      </tr>
                    <br><br>
            </center>                          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End User Detail Modal -->
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
      $('#loadUsersTable').load('users/usersTable.php');
      $('#btnAddUsers').click(function(){

      if ( $.trim( $('#user').val() ) == '' ){
          alert("Input is blank!");
          $('#frmUsers')[0].reset();
          return false;
        }              

        data=$('#frmUsers').serialize();
        $.ajax({
          type:"POST",
          data:data,
          url:"../process/users/addUsers.php",
          success:function(r){
            if(r==1){
            $('#frmUsers')[0].reset();
            $('#loadUsersTable').load('users/usersTable.php');
            alertify.success("User successfuly added.");
          }else{
            alertify.error("Could not add the user to the list.");
          }
        }
      });
      });
    });

    function addUser(idUser){
      $.ajax({
        type:"POST",
        data:"idUser=" + idUser,
        url:"../process/users/getUserData.php",
        success:function(r){
          data=jQuery.parseJSON(r); 
          $('#idUser').val(data['id_user']);
          $('#idPrintUser').val(data['id_user']);
          $('#viewFullName').text(data['full_name']);
          $('#viewUser').text(data['user_name']);
          $('#viewStatus').text(data['status']);
          $('#viewRole').text(data['user_role']);
          $('#viewImage').prepend('<img class="img-thumbnail" id="imgp" src="' + data['imagePath'] + '"  width="140" height="140"/>');
          $('#viewEmail').text(data['email']);
          $('#viewCreatedBy').text(data['created_by_user']);
          $('#viewDateCreated').text(data['created_date']);
          $('#viewUpdatedBy').text(data['updated_by_user']);
          $('#viewUpdatedDate').text(data['updated_date']);       
        }
      });
    }


    function deleteData(idUser){
      alertify.confirm('Delete Registered User','Do you want to delete the user?', function(){ 
        $.ajax({
          type:"POST",
          data:"idUser=" + idUser,
          url:"../process/users/deleteUser.php",
          success:function(r){
            if(r==1){
              $('#loadUsersTable').load("users/usersTable.php");
              alertify.success("User successfuly deleted!");
            }else{
              alertify.error("User could not be deleled.");
            }
          }
        });
      }, function(){ 
        alertify.error('Canceled!')
      });
    }

  </script>


<script type="text/javascript">
  $(document).ready(function(){


    $('#modalView').on('hidden.bs.modal', function () {

     
     $("#viewImage").empty();
});

    
  });
</script>


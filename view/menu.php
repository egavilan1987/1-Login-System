<?php 
  session_start();
  if(isset($_SESSION['user'])){    
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- datatable plugins-->
  <link rel="stylesheet" type="text/css" href="../vendor/datatable/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../vendor/datatable/dataTables.bootstrap4.min.css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/dropdown-menu.css">
  <!-- Alertify-->
  <link rel="stylesheet" type="text/css" href="../vendor/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../vendor/alertifyjs/css/themes/default.css">
  <!-- Tab Icon-->
  <link rel="icon" href="../files/EGD.JPG">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="init.php">EGDashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="init.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <?php
          if($_SESSION['role']=="Admin"):
        ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link" href="users.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link" href="addUsers.php">
            <i class="fa fa-user-plus"></i>
            <span class="nav-link-text">Add New Users</span>
          </a>
        </li>
        <?php 
          endif;
        ?>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">       
                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle mr-lg-2 " data-toggle="dropdown"><img src="<?php echo $_SESSION['imagePath']; ?>" class="rounded" width="25" height="25"> <?php echo $_SESSION['fullName']; ?>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <img src="<?php echo $_SESSION['imagePath']; ?>" class="rounded" width="90" height="90"> 
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-center"><strong><?php echo $_SESSION['user']; ?></strong></p>
                                        <p class="text-center small"><strong><?php echo $_SESSION['email']; ?></strong></p>
                                        <p class="text-left">
                                            <a href="userProfile.php" class="btn btn-primary btn-block btn-sm">Your profile</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#logoutModal">Close session</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
      </ul>
    </div>
  </nav>
  <!--End of the Navigation Var-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © EGDashboard 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../process/logout.php">Logout</a>
          </div>
        </div>
      </div>
  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <script src="../js/functions.js"></script>
    <!-- Alertify-->
    <script src="../vendor/alertifyjs/alertify.js"></script>
    <!-- Datatable plugins-->
    <script src="../vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatable/dataTables.bootstrap4.min.js"></script>
  </div>
</body>
</html>
<?php 
  }else{
    header("location:../index.php");
  }
 ?>


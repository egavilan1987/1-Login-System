
<?php 

require_once "../../model/connection.php";

      $c=new Connect();
      $connection=$c->connection();

$sql="SELECT id_user,
user_name,
full_name,
email,
created_date,
status,
image
from users";
$result=mysqli_query($connection,$sql);
?>


<div>
  <table class="table table-hover table-condensed table-bordered" id="dataTable">
    <thead style="background-color: #dc3545;color: white; font-weight: bold;">
      <tr>
        <td>User</td>
        <td>Profile Image</td>
        <td>Full Name</td>
        <td>Email</td>
        <td>Registration Date/Time</td>
        <td>Status</td>
        <td>Actions</td>
      </tr>
    </thead>
    <tfoot style="background-color: #ccc;color: white; font-weight: bold;">
      <tr>
        <td>User</td>
        <td>Profile Image</td>
        <td>Full Name</td>
        <td>Email</td>
        <td>Registration Date/Time</td>
        <td>Status</td>
        <td>Actions</td>
      </tr>
    </tfoot>
    <tbody >
      <?php 
      while ($row=mysqli_fetch_row($result)) {
        ?>
        <tr >
          <td style="text-align: center;"><?php echo $row[1] ?></td>
          <td style="text-align: center;">
            <?php 
              $showImage=explode("/", $row[6]) ; 
              $imgPath=$showImage[1]."/".$showImage[2]."/".$showImage[3]."/".$showImage[4];

            ?>
            <img class="rounded" width="45" height="45" src="<?php echo $imgPath ?>">
          </td>
          <td style="text-align: center;"><?php echo $row[2] ?></td>
          <td style="text-align: center;"><?php echo $row[3] ?></td>
          <td style="text-align: center;"><?php echo $row[4] ?></td>
          <td style="text-align: center;">
            <?php if ($row[5]=='Active'){?>
              <span class="btn btn-success btn-sm" onclick="updateStatus('<?php echo $row[0]; ?>')">
                  <h>Active</h>
              </span>
            <?php 
            }elseif ($row[5]=='Inactive'){ ?>
              <span class="btn btn-secondary btn-sm" onclick="updateStatus('<?php echo $row[0]; ?>')">
                  <h>Inactive</h>
            </span>
            <?php }else{ ?>
              <span class="btn btn-danger btn-sm" onclick="updateStatus('<?php echo $row[0]; ?>')">
                  <h>Undefined</h>
            </span>
            <?php } ?>
          </td> 
          <td style="text-align: center;">
            <span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalView" onclick="addUser('<?php echo $row[0]; ?>')">
              <span class="fa fas fa-eye"></span>
            </span>
                <a class="btn btn-success btn-xs" href="editUser.php?idUser=<?php echo $row[0]; ?>">
                  <span  class="fa fa-pencil-square-o"></span>
                </a>
            <span class="btn btn-danger btn-xs" onclick="deleteData('<?php echo $row[0]; ?>')">
              <span class="fa fa-trash"></span>
            </span>
          </td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable();
  } );
</script>


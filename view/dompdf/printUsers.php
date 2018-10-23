<?php
//index.php
//include autoloader

require_once '../../vendor/dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

//$document->loadHtml($html);


//$document->loadHtml($page);

$connect = mysqli_connect("localhost", "root", "", "administrator");

$query = "SELECT * FROM users";
$result = mysqli_query($connect, $query);

$output = "
	<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size:12px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
p {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;
    font-size:40px;
    color:blue;
}
tr:nth-child(even) {
    background-color: #dddddd;
}


</style>
    <div>
      <p>Users Information</p>
    </div> 
<table>

h2 {
    background : url(img/EGD.jpg);
}
<h2></h2>
	<tr>
		<th>User Id</th>
		<th>User name</th>
		<th>Full Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
	</tr>
";

while($row = mysqli_fetch_array($result))
{
	$output .= '
    
		<tr>
			<td>'.$row["id_user"].'</td>
			<td>'.$row["user_name"].'</td>
            <td>'.$row["full_name"].'</td>
			<td>'.$row["email"].'</td>
            <td>'.$row["user_role"].'</td>
            <td>'.$row["status"].'</td>
		</tr>
	';
}

$output .= '</table>';

//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('letter', 'portrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Users Information", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Training Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style type="text/css">
      #lnk
      {
        color:white;
      }
    </style>
  </head>

    <!-- Image and text -->
<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="#"><h2 style="color:white;">
   Training Information System</h2>
  </a>
</nav> 

<div class="container" style="background-color:#FFF;margin-top:20px;">
   <div class="card" style="width:100%;background-color:#fff;">
      <div class="card-body">
     <div><h4 class="card-title">Service History</h4><div align="right"><a href="index.php" class="btn btn-primary">Home</a> <a href="add_shistory.php" class="btn btn-primary">Add </a></div></div><hr>
<?php
$con = mysqli_connect('localhost','root','','training');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

$sql="SELECT *,customer.cust_name FROM  service_history   JOIN  customer ON service_history.sh_customer_id=customer.customer_id";

$result = mysqli_query($con,$sql);

echo "<table class='table'>
      <thead>
        <tr>
<th> History ID</th>
<th>Reserve ID</th>
<th>Time</th>
<th>Customer Name</th>
</tr></thead>";

while($row = mysqli_fetch_row($result))
{
  echo "<tr>";
  echo "<td>" . $row[0] . "</td>";
  echo "<td>" . $row[1] . "</td>";
  echo "<td>" . $row[3] . "</td>";
  echo "<td>" . $row[5] . "</td>";
  //echo "<td>" . $row[4] . "</td>";
  echo "<td><button type='submit' class='btn btn-danger btn-block'><a id='lnk' href='view_shistory.php?id=".$row[0]."'>Delete</a></button></td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>

<?php


if(isset($_GET['id']))
{

  $id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$del = mysqli_query($conn,"delete from service_history where service_history_id ='$id'"); // delete query

if($del)
{
  
    mysqli_close($conn); // Close connection
    echo "Record  Deleted Successfully";
    header("location:view_shistory.php"); // redirects to all records page
    exit; 
}
else
{
    echo "Deleting record failed"; // display error message if not delete
}

}

?>
     <script src="main.js"></script>
  </body>
</html>
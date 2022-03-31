<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Training Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    </head>

    <!-- Image and text -->
<nav class="navbar navbar-light bg-primary">
  <a class="navbar-brand" href="#"><h2 style="color:white;">
   Training Information System</h2>
  </a>
</nav> 

<div class="container" style="background-color:#FFF;margin-top:20px;">
<div class="card">
   <div class="card-body">
    <div><h4 class="card-title">Add Service</h4><div align="right"><a href="index.php" class="btn btn-primary">Home</a> <a href="view_service.php" class="btn btn-primary">View </a></div></div><hr>
  <form method="POST" action="add_service.php">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="servid" class="form-control" />
    <label class="form-label" for="form2Example1">Service ID</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="text" name="servtype" class="form-control" />
    <label class="form-label" for="form2Example2">Service Type</label>
  </div>   


  <div class="form-outline mb-4">
    <input type="text" name="servstatus" class="form-control" />
    <label class="form-label" for="form2Example2">Service Status</label>
  </div>
   <!-- Email input -->
  
  <div class="form-outline mb-4">
    <select class="form-control" name="customerid">
    <option disabled selected>-- Customer ID --</option>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "training";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn)
        {
          die("Connection failed: " . mysqli_connect_error());
        }

        $records = mysqli_query($conn, "SELECT customer_id From customer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['customer_id'] ."'>" .$data['customer_id'] ."</option>";
              // displaying data in option menu
        } 
    ?>  
  </select>
    <label class="form-label" for="form2Example2">Customer ID</label>
  </div>

   <!-- Submit button -->
 <div align="right"> <button type="submit" class="btn btn-primary btn-block">Add Service</button></div>
  
</form>

<?php
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



if (isset($_POST['servid'],$_POST['servtype'],$_POST['servstatus'],$_POST['customerid']))
{

$sql = "INSERT INTO service (service_id,service_type,service_status,ser_customer_id)
VALUES ('".$_POST['servid']."','".$_POST['servtype']."','".$_POST['servstatus']."','".$_POST['customerid']."')";

if (mysqli_query($conn, $sql))
{
 
  header("Location:view_service.php");
  echo "New record created successfully";
   

} 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
mysqli_close($conn);
?>



  </div>
</div>
</div>
</html>
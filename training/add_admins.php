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
    <div><h4 class="card-title">Create Admin</h4><div align="right"><a href="index.php" class="btn btn-primary">Home</a> <a href="view_admin.php" class="btn btn-primary">View </a></div></div><hr>
  <form method="POST" action="add_admins.php">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="adid" class="form-control" />
    <label class="form-label" for="form2Example1">Admin ID</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="text" name="uname" class="form-control" />
    <label class="form-label" for="form2Example2">User Name</label>
  </div>   
   <!-- Email input -->
  
  <div class="form-outline mb-4">
    <input type="password" name="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>  
 
   <!-- Submit button -->
 <div align="right"> <button type="submit" class="btn btn-primary btn-block">Add Admin</button></div>
  
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



if (isset($_POST['adid'],$_POST['uname'],$_POST['password']))
{

$sql = "INSERT INTO admin (admin_id,username,pswd)
VALUES ('".$_POST['adid']."','".$_POST['uname']."','".$_POST['password']."')";

if (mysqli_query($conn, $sql))
{
 
  header("Location:view_admins.php");
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
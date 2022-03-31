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
    <div><h4 class="card-title">Add Courses</h4><div align="right"><a href="index.php" class="btn btn-primary">Home</a> <a href="view_course.php" class="btn btn-primary">View </a></div></div><hr>
  <form method="POST" action="add_course.php">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="courseid" class="form-control" />
    <label class="form-label" for="form2Example1">Course ID</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="text" name="coursename" class="form-control" />
    <label class="form-label" for="form2Example2">Name</label>
  </div>
   
   <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="price" class="form-control" />
    <label class="form-label" for="form2Example1">Price</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="text" name="start" class="form-control" />
    <label class="form-label" for="form2Example2">Start Date</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" name="stop" class="form-control" />
    <label class="form-label" for="form2Example2">Stop Date</label>
  </div>  

   <div class="form-outline mb-4">
    <input type="text" name="schedule" class="form-control" />
    <label class="form-label" for="form2Example2">Schedule</label>
  </div>  
  <!-- Submit button -->
 <div align="right"> <button type="submit" class="btn btn-primary btn-block">Add Course </button></div>
  
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



if (isset($_POST['courseid'],$_POST['coursename'],$_POST['price'],$_POST['start'],$_POST['stop'],$_POST['schedule']))
{

$sql = "INSERT INTO course (course_id,course_name,price,start_date,stop_date,schedule)
        VALUES ('".$_POST['courseid']."','".$_POST['coursename']."','".$_POST['price']."','".$_POST['start']."','".$_POST['stop']."','".$_POST['schedule']."')";

if (mysqli_query($conn, $sql))
{
 
  header("Location:view_trainers.php");
  echo "New record created successfully";
   

} 
else 
{
  echo "Failed: " . $sql . "<br>" . mysqli_error($conn);
}

}
mysqli_close($conn);
?>



  </div>
</div>
</div>
</html>
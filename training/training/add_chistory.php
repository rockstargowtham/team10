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
    <div><h4 class="card-title">Add Course History</h4><div align="right"><a href="index.php" class="btn btn-primary">Home</a> <a href="view_chistory.php" class="btn btn-primary">View </a></div></div><hr>
  <form method="POST" action="add_chistory.php">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="chid" class="form-control" />
    <label class="form-label" for="form2Example1">History ID</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="text" name="rid" class="form-control" />
    <label class="form-label" for="form2Example2">Reserve ID</label>
  </div>   
   <!-- Email input -->
  
  <div class="form-outline mb-4">
    <select class="form-control" name="cid">
    <option disabled selected>-- Select Course ID --</option>
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

        $records = mysqli_query($conn, "SELECT course_id From course");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['course_id'] ."'>" .$data['course_id'] ."</option>";
              // displaying data in option menu
        } 
    ?>  
  </select>
    <label class="form-label" for="form2Example2">Course ID</label>
  </div>

   <!-- Submit button -->
 <div align="right"> <button type="submit" class="btn btn-primary btn-block">Add Course</button></div>
  
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



if (isset($_POST['chid'],$_POST['rid'],$_POST['cid']))
{

$sql = "INSERT INTO course_history (course_history_id,reserve_id,ch_course_id)
VALUES ('".$_POST['chid']."','".$_POST['rid']."','".$_POST['cid']."')";

if (mysqli_query($conn, $sql))
{
 
  header("Location:view_chistory.php");
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
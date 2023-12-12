<?php
if(isset($_POST['visit_no'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mc";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection 
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "success connecting to the db";
$visit_no=$_POST['visit_no'];
$pat_id=$_POST['pat_id'];
$doc_id=$_POST['doc_id'];
$sql="INSERT INTO `visit` (`visit_no`, `pat_id`, `doc_id`) VALUES ('$visit_no', '$pat_id', '$doc_id');";
//echo $sql;

if($conn->query($sql) == TRUE){
  //echo "successfully inserted";
}
else{
  echo "ERROR: $sql<br> $conn->error";
}

$conn->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visits</title>
    <link rel="stylesheet" href="beautify.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">

</head>
<body>
  <h1>Visits</h1>
            <script src="script.js"></script>
 <!-- Navigation links -->
<nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.html">Appointments</a></li>
      <li><a href="./patientdet.php"> Patient Details</a></li>
      <li><a href="./delivery.php">Delivery details</a></li>
      <li><a href="./visit.php">Visits</a></li>
      <li><a href="./test.php">Tests</a></li>
      <li><a href="./scans.html">Scans</a></li>
      <li><a href="./checkup.html">Check-ups</a></li>
      <li><a href="./support.html">Support</a></li>
    </ul>
  </nav>
  <div class="df">
    <hr>
    <form action="./visit.php" method="post" id="visits-form">
        <label for="visit_n0">Visit Number:</label><br>
        <input type="text" id="visit_no" name="visit_no"><br>
        <label for="pat_id">Patient ID:</label><br>
        <input type="text" id="pat_id" name="pat_id"><br>
        <label for="doc_id">Doctor ID:</label><br>
        <input type="text" id="doc_id" name="doc_id"><br>
        <button type="submit">Submit</button>
      </form> 
      
  

 </div>
 <a href="test.html">Click here to view tests</a><br>
 <a href="scans.html">Click here to view scans</a><br>
 <a href="checkup.html">Click here to view checkups</a>

      <hr>
      <br>
      <div class="footer">
        <h1>Mother & Childcare </h1>
        <h3 class="heading" >Management System</h3>
        <p>syedasraa10@gmail.com</p>
        ©2023 by Mother & Childcare Management System.
      </div>
</body>
</html>
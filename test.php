<?php
if(isset($_POST['test_id'])){
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
$test_id=$_POST['test_id'];
$test_name=$_POST['test_name'];
$test_type=$_POST['test_type'];
$purpose=$_POST['purpose'];
$test_schedule=$_POST['test_schedule'];
$test_result=$_POST['test_result'];
$visit_no=$_POST['visit_no'];
$report_no=$_POST['report_no'];
$sql="INSERT INTO `test` (`test_id`, `test_name`, `test_type`, `purpose`, `test_schedule`, `test_result`, `visit_no`, `report_no`) VALUES ('$test_id', '$test_name', '$test_type', '$purpose', '$test_schedule', '$test_result', '$visit_no', '$report_no');";

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
    <title>tests</title>
    <link rel="stylesheet" href="beautify.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">

</head>
<body>
  <h1>Tests</h1>
            <script src="script.js"></script>
 <!-- Navigation links -->
<nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.php">Appointments</a></li>
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
    <form id="test-form" action="./test.php" method="post" >

        <label for="test_id">Test ID:</label><br>
        <input type="text" id="test_id" name="test_id"><br>
        <label for="test_name">Test Name:</label><br>
        <input type="text" id="test_name" name="test_name"><br>
        <label for="test_type">Type:</label><br>
        <input type="text" id="test_type" name="test_type"><br>
        <label for="purpose">Purpose:</label><br>
        <input type="text" id="purpose" name="purpose"><br>
        <label for="test_schedule">Schedule:</label><br>
        <input type="text" id="test_schedule" name="test_schedule"><br>
        <label for="test_result">Result:</label><br>
        <input type="text" id="test_result" name="test_result"><br>
        <label for="visit_no">Visit number:</label><br>
        <input type="text" id="visit_no" name="visit_no"><br>
        <label for="report_no">report number:</label><br>
        <input type="text" id="report_no" name="report_no"><br>
        <button type="submit">Submit</button>

</form>
      <a href="visit.html">back</a>
      
 </div>

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
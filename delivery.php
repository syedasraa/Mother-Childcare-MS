<?php
if(isset($_POST['d_id'])){
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
$d_id=$_POST['d_id'];
$EDD=$_POST['EDD'];
$LDR_no=$_POST['LDR_no'];
$mode_of_delivery=$_POST['mode_of_delivery'];
$complications=$_POST['complications'];
$sql="INSERT INTO `delivery` (`d_id`, `EDD`, `LDR_no`, `mode_of_delivery`, `complications`) VALUES ('$d_id', '$EDD', '$LDR_no', '$mode_of_delivery', '$complications');";
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
    <title>Delivery</title>
    <link rel="stylesheet" href="beautify.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">

</head>
<body>
  <h1>Delivery Details</h1>
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
    <form action="./delivery.php" method="post" id="delivery-form">
        <label for="d_id">Delivery ID:</label><br>
        <input type="text" id="d_id" name="d_id"><br>
        <label for="EDD">Expected Delivery Date:</label><br>
        <input type="date" id="EDD" name="EDD"><br>
        <label for="LDR_no">Labor and Delivery Room Number:</label><br>
        <input type="text" id="LDR_no" name="LDR_no"><br>
        <label for="mode_of_delivery">Mode of Delivery:</label><br>
        <input type="text" id="mode_of_delivery" name="mode_of_delivery"><br>
        <label for="complications">Complications:</label><br>
        <input type="text" id="complications" name="complications"><br>
        <button type="submit">Submit</button>
      </form> 

      
      <a href="./visit.html">Click here to continue</a>
    </div>
<!--
      <table id="delivery-table">
        <tr>
          <td>Delivery ID:</td>
          <td id="d-id-cell"></td>
        </tr>
        <tr>
          <td>Expected Delivery Date:</td>
          <td id="edd-cell"></td>
        </tr>
        <tr>
          <td>Labor and Delivery Room Number:</td>
          <td id="ldr-no-cell"></td>
        </tr>
        <tr>
          <td>Mode of Delivery:</td>
          <td id="mode-of-delivery-cell"></td>
        </tr>
        <tr>
          <td>Complications
      </td>
      </tr>
      </table>-->
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
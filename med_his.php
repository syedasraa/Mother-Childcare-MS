<?php
if(isset($_POST['dis_id'])){
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
$dis_id=$_POST['dis_id'];
$disease_name=$_POST['disease_name'];
$medication=$_POST['medication'];
$surgery=$_POST['surgery'];
$pat_id=$_POST['pat_id'];
$sql="INSERT INTO `patient_medical_history` (`dis_id`, `disease_name`, `medication`, `surgery`, `pat_id`) VALUES ('$dis_id', '$disease_name', '$medication', '$surgery', '$pat_id');"; 
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
    <title>antenatal-card</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">
</head>
<body>
<h1>Patient Medical History</h1>

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
  <hr>
  <button id="back-button">
  <a href="./antenatalcard.php">Back</a></button>

  <div class="anntenatalcard" style="background:url()">  

  <form action="./med_his.php" method="post" class="anntenatalcard">

  <label for="dis_id">Disease_ID</label><br>
  <input type="number" id="dis_id" name="dis_id"><br>
  <br>
  <label for="disease_name">Disease_Name</label><br>
  <input type="text" id="disease_name" name="disease_name"><br>
  <br>
  <label for="medication">Medication</label><br>
  <input type="text" id="medication" name="medication"><br>
  <br>
  <label for="surgery">surgery:</label><br>
  <input type="text" id="surgery" name="surgery"><br>

  <input class="form-control" type="text" name="pat_id" placeholder="Patient ID" required>

  <button type="submit">Submit</button>
</form> 


<br>
<hr>
<?php
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

$sql = "SELECT dis_id, disease_name, medication, surgery, pat_id FROM patient_medical_history";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>Disease ID</th><th>Disease Name</th><th>Medication</th><th>Surgery</th><th>Patient ID</th><th>Actions</th></tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>" . $row["dis_id"]. "</td>
    <td>" . $row["disease_name"]. "</td>
    <td>" . $row["medication"]. "</td>
    <td>" . $row["surgery"]. "</td>
    <td>" . $row["pat_id"]. "</td>
    <td>
    <a href='view1.php?dis_id=" . $row["dis_id"] . "'>View</a> | 
    <a href='update1.php?dis_id=" . $row["dis_id"] . "'>Update</a> | 
    <a href='med_his.php?dis_id=" . $row["dis_id"] . "'>Delete</a>
    </td>
    </tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>
<hr>
<br>
<?php
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

if(isset($_GET['dis_id'])){
    $dis_id = $_GET['dis_id'];
    $sql = "DELETE FROM patient_medical_history WHERE dis_id='$dis_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<em>Record deleted successfully<em>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
else{
    echo "No data provided";
}
$conn->close();
?>

<br>



<hr>
<div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>

</body>
</html>

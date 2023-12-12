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
  
</body>
<!--
if(isset($_POST['preg_no'])){
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
$preg_no=$_POST['preg_no'];
$year=$_POST['year'];
$duration_preg=$_POST['duration_preg'];
$delivery_type=$_POST['delivery_type'];
$complications_of_mother=$_POST['complications_of_mother'];
$sex=$_POST['sex'];
$birth_wt=$_POST['birth_wt'];
$complications_of_infant=$_POST['complications_of_infant'];
$present_health=$_POST['present_health'];
$pat_id=$_POST['pat_id'];

$sql="INSERT INTO `pregnancy_history` (`preg_no`, `year`, `duration_preg`, `delivery_type`, `complications_of_mother`, `sex`, `birth_wt`, `complications_of_infant`, `present_health`, `pat_id`)VALUES ('$preg_no', '$year', '$duration_preg', '$delivery_type', '$complications_of_mother', '$sex', '$birth_wt', '$complications_of_infant', '$present_health', '$pat_id');";

if($conn->query($sql) == TRUE){
  //echo "successfully inserted";
}
else{
  echo "ERROR: $sql<br> $conn->error";
}

$conn->close(); 
}-->
</html>

<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mc";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Validate inputs
    if(empty($_POST['preg_no']) || empty($_POST['year']) || empty($_POST['duration_preg']) || empty($_POST['delivery_type']) || empty($_POST['complications_of_mother']) || empty($_POST['sex']) || empty($_POST['birth_wt']) || empty($_POST['complications_of_infant']) || empty($_POST['present_health']) || empty($_POST['pat_id'])) {
        echo "All fields are required.";
    } else {
        // Prepare and bind statement
        $stmt = mysqli_prepare($conn, "INSERT INTO preg_history (preg_no, year, duration_preg, delivery_type, complications_of_mother, sex, birth_wt, complications_of_infant, present_health, pat_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssssssssss", $preg_no, $year, $duration_preg, $delivery_type, $complications_of_mother, $sex, $birth_wt, $complications_of_infant, $present_health, $pat_id);

        // Set variables
        $preg_no = $_POST['preg_no'];
        $year = $_POST['year'];
        $duration_preg = $_POST['duration_preg'];
        $delivery_type = $_POST['delivery_type'];
        $complications_of_mother = $_POST['complications_of_mother'];
        $sex = $_POST['sex'];
        $birth_wt = $_POST['birth_wt'];
        $complications_of_infant = $_POST['complications_of_infant'];
        $present_health = $_POST['present_health'];
        $pat_id = $_POST['pat_id'];
        
        
            // Execute statement
            if(mysqli_stmt_execute($stmt)) {
                echo "Data inserted successfully.";
            } else {
                echo "Error inserting data.";
            }
        }
    }
    // Select all data from table
$query = "SELECT * FROM preg_history";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "pregnancy number: " . $row['preg_no'] . "<br>";
echo "Year: " . $row['year'] . "<br>";
echo "Duration of Pregnancy: " . $row['duration_preg'] . "<br>";
echo "Delivery Type: " . $row['delivery_type'] . "<br>";
echo "Complications of Mother: " . $row['complications_of_mother'] . ";br>";
echo "Gender of Baby: " . $row['sex'] . "<br>";
echo "Birth Weight: " . $row['birth_wt'] . "<br>";
echo "Complications of Infant: " . $row['complications_of_infant'] . "<br>";
echo "Present Health: " . $row['present_health'] . "<br>";
echo "Patient ID: " . $row['pat_id'] . "<br>";
echo "<br>";
}
} else {
echo "No data found.";
}

// Close connection
mysqli_close($conn);
?>



<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>antenatal-card</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">
</head>-->
<body>
    <h1>Pregnancy History</h1>

<!-- Navigation links -->
<nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.html">Appointments</a></li>
      <li><a href="./patientdet.php"> Patient Details</a></li>
      <li><a href="./delivery.html">Delivery details</a></li>
      <li><a href="./visit.html">Visits</a></li>
      <li><a href="./test.html">Tests</a></li>
      <li><a href="./scans.html">Scans</a></li>
      <li><a href="./checkup.html">Check-ups</a></li>
      <li><a href="./support.html">Support</a></li>    
    </ul>
  </nav> 
  <hr>
  <button id="back-button">
  <a href="./antenatalcard.php">Back</a></button>
  
<div class="anntenatalcard" style="background:url()">
  <form action="./preg_his.php" method="post" class="anntenatalcard">

  <label for="preg_no ">pregnancy number: </label><br>
  <input type="number" id="preg_no " name="preg_no "><br>
  <br>
  <label for="year">Year:</label><br>
  <input type="date" id="year" name="year"><br>
  <br>
  <label for="duration_preg">Duration Of Pregnancy:</label><br>
  <input type="text" id="duration_preg" name="duration_preg"><br>
  <br>
  <label for="delivery_type">delivery_type:</label><br>
  <input type="text" id="delivery_type" name="delivery_type"><br>
  <br>
  <label for="complications_of_mother">complications_of_mother:</label><br>
  <input type="text" id="complications_of_mother" name="complications_of_mother"><br>
  <br>
  <label for="sex">Gender of baby:</label><br>
  <input type="text" id="sex" name="sex"><br>
  <br> 
  <label for="birth_wt">birth weight:</label><br>
  <input type="text" id="birth_wt" name="birth_wt"><br>
  <br>
  <label for="complications_of_infant">complications of Infant:</label><br>
  <input type="text" id="complications_of_infant" name="complications_of_infant"><br>
  <br>
  <label for="present_health">present_health:</label><br>
  <input type="text" id="present_health" name="present_health"><br>
  <br>
  <label for="pat_id">patient Id:</label><br>
  <input class="form-control" type="text" name="pat_id" placeholder="Patient ID" required>

  <button type="submit">Submit</button>
</form> 
  <!--
<form action="./preg_his.php" method="post" class="anntenatalcard">
    <label for="preg-no">Number of Previous Pregnancies:</label><br>
    <input type="number" id="preg-no" name="preg-no"><br>
  
    <label for="year">Year of Last Pregnancy:</label><br>
    <input type="number" id="year" name="year"><br>
  
    <label for="duration">Duration of Last Pregnancy (weeks):</label><br>
    <input type="number" id="duration" name="duration"><br>
  
    <label for="delivery-type">Type of Delivery:</label><br>
    <select id="delivery-type" name="delivery-type">
      <option value="vaginal">Vaginal</option>
      <option value="cesarean">C-section</option>
    </select><br>
  
    <label for="complications-mother">Complications for Mother:</label><br>
    <input type="text" id="complications-mother" name="complications-mother"><br>
  
    <label for="sex">Sex of Baby:</label><br>
    <select id="sex" name="sex">
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select><br>
  
    <label for="birth-wt">Birth Weight (kg):</label><br>
    <input type="number" id="birth-wt" name="birth-wt"><br>
  
    <label for="complications-infant">Complications for Infant:</label><br>
    <input type="text" id="complications-infant" name="complications-infant"><br>
  
    <label for="present-health">Present Health:</label><br>
    <input type="text" id="present-health" name="present-health"><br>
  
    <button type="submit">Submit</button>
  </form> -->
<hr>

<div class="footer">
    <h1>Mother & Childcare </h1>
    <h3 class="heading" >Management System</h3>
    <p>syedasraa10@gmail.com</p>
    ©2023 by Mother & Childcare Management System.
  </div>

</body>
</html>

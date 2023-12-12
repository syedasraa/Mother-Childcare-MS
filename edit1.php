<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="beautify.css">
    <link rel="icon" href="https://img.icons8.com/external-bzzricon-flat-bzzricon-studio/512/external-mother-womens-day-bzzricon-flat-bzzricon-flat-bzzricon-studio.png">


  <title>Mother & Childcare Management System</title>
</head>
<body class="parent">
<div class="header">
    <img class="mainlogo"width="100px" height="100px" src="icons8-mother-64.png" alt="heading image">
    <h1 class="mainh1">
     Mother & Childcare 
    </h1>
    
    <h3 class="heading" >Management System</h3>
  </div>
  <!-- Navigation links -->
  <nav>
    <ul>
      <li></li>
      <li><a href="index.html">Home</a></li>
      <li><a href="./Login.html">Login</a></li>
      <li><a href="./forpatients+.html">For Patients+</a></li>
      <li><a href="./doctor.html">Find A Doctor</a></li>
      <li><a href="./appointment.php">Appointments</a></li>
      <li><a href="#For Healthcare Proffesionals">For Healthcare Proffesionals+</a></li>
      <li><a href="./support.html">Support</a></li>
    </ul>
  </nav>   


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

if(isset($_POST['submit'])){
    $pat_id = mysqli_real_escape_string($conn, $_POST['pat_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $marital_status = mysqli_real_escape_string($conn, $_POST['marital_status']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE patient SET name='$name', age='$age', marital_status='$marital_status', address='$address', email='$email' WHERE pat_id='$pat_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM patient";
$result = mysqli_query($conn, $sql);

echo "<form action='edit1.php' method='post'>";
echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Marital Status</th><th>Address</th><th>Email</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["pat_id"]. "</td><td><input type='text' name='name' value='" . $row["name"]. "'></td><td><input type='text' name='age' value='" . $row["age"]. "'></td><td><input type='text' name='marital_status' value='" . $row["marital_status"]. "'></td><td><input type='text' name='address' value='" . $row["address"]. "'></td><td><input type='text' name='email' value='" . $row["email"]. "'></td></tr>";
}
echo "</table>";
echo "<input type='hidden' name='pat_id' value='" . (isset($row["pat_id"]) ? $row["pat_id"] : ""). "'>";
echo "<input type='submit' name='submit' value='Update'>";
echo "</form>";

mysqli_close($conn);
?>

<hr>
<hr>
<nav class="van">
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

if(isset($_GET['pat_id'])){
    $pat_id = mysqli_real_escape_string($conn, $_GET['pat_id']);

    $sql = "DELETE FROM patient WHERE pat_id='$pat_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<br><em>Record deleted successfully</em></br>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM patient";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Marital Status</th><th>Address</th><th>Email</th><th>Action</th></tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["pat_id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td><td>" . $row["marital_status"]. "</td><td>" . $row["address"]. "</td><td>" . $row["email"]. "</td><td><a href='./edit1.php?pat_id=" . $row["pat_id"]. "'>Delete</a></td></tr>";
}
echo "</table>";

mysqli_close($conn);
?>
</nav>
<div class="footer">
  <h1>Mother & Childcare </h1>
  <h3 class="heading" >Management System</h3>
  <p>syedasraa10@gmail.com</p>
  ©2023 by Mother & Childcare Management System.
</div>
</body>
</html>

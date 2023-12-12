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

$sql = "SELECT * FROM patient";
$result = mysqli_query($conn, $sql);

echo "<table class='table table-striped'>";
echo "<thead>
        <tr>
            <th>Patient ID</th>
            <th>Full Name</th>
            <th>Age</th>
            <th>Marital Status</th>
            <th>Address</th>
            <th>Email Address</th>
        </tr>
    </thead>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['pat_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['marital_status'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>





<?php/*
if(isset($_POST['preg_no'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mc";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $stmt = $conn->prepare("INSERT INTO pregnancy_history (preg_no, year, duration_preg, delivery_type, complications_of_mother, sex, birth_wt, complications_of_infant, present_health, pat_id)
        VALUES (:preg_no, :year, :duration_preg, :delivery_type, :complications_of_mother, :sex, :birth_wt, :complications_of_infant, :present_health, :pat_id)");
        $stmt->bindParam(':preg_no', $preg_no);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':duration_preg', $duration_preg);
        $stmt->bindParam(':delivery_type', $delivery_type);
        $stmt->bindParam(':complications_of_mother', $complications_of_mother);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':birth_wt', $birth_wt);
        $stmt->bindParam(':complications_of_infant', $complications_of_infant);
        $stmt->bindParam(':present_health', $present_health);
        $stmt->bindParam(':pat_id', $pat_id);
        $stmt->execute();
        //echo "Record inserted successfully.";
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}*/
?>
------------------------------$_COOKIE

<?php
if(isset($_POST['submit'])) {
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

    $query = "INSERT INTO preg_history (preg_no, year, duration_preg, delivery_type, complications_of_mother, sex, birth_wt, complications_of_infant, present_health, pat_id) VALUES ('$preg_no', '$year', '$duration_preg', '$delivery_type', '$complications_of_mother', '$sex', '$birth_wt', '$complications_of_infant', '$present_health', '$pat_id')";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}

$query = "SELECT * FROM preg_history";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "pregnancy number: " . $row['preg_no'] . "<br>";
        echo "Year: " . $row['year'] . "<br>";
        echo "Duration of Pregnancy: " . $row['duration_preg'] . "<br>";
        echo "Delivery Type: " . $row['delivery_type'] . "<br>";
        echo "Complications of Mother: " . $row['complications_of_mother'] . "<br>";
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
?>

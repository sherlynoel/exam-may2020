<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$dep_id = $_POST['dep_id'];
include '../../database/config.php';
$dep_name = ucwords(mysqli_real_escape_string($conn, $_POST['dep_name']));

$sql = "SELECT * FROM tbl_departments WHERE department_id='$dep_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $dname = $row['name'];
    }
} else {

}



$sql = "UPDATE tbl_departments SET name = '$dep_name' WHERE department_id='$dep_id'";

if ($conn->query($sql) === TRUE) {
  header("location:../departments.php?rp=7823");
 
  
} else {
  header("location:../departments.php?rp=1298");
}
$sql1 = "UPDATE tbl_examinations SET department = '$dep_name' WHERE department='$dname'";
$conn->query($sql1);
        
$sql2 = "UPDATE tbl_categories SET department = '$dep_name' WHERE department='$dname'";
$conn->query($sql2);
        
$sql3 = "UPDATE tbl_users SET department = '$dep_name' WHERE department='$dname'";
$conn->query($sql3);

$conn->close();
?>
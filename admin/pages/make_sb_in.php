<?php
include '../../database/config.php';
$sbid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_categories SET status='Inactive' WHERE category_id='$sbid'";

if ($conn->query($sql) === TRUE) {
    header("location:../subject.php?rp=7823");
} else {
    header("location:../subject.php?rp=1298");
}

$conn->close();
?>

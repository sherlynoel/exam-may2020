<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$exam_id = $_POST['examid'];
$exam = ucwords(mysqli_real_escape_string($conn, $_POST['exam']));
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$passmark = mysqli_real_escape_string($conn, $_POST['passmark']);
$t_mark = mysqli_real_escape_string($conn, $_POST['t_mark']);
$t_question = mysqli_real_escape_string($conn, $_POST['t_question']);
$pre = mysqli_real_escape_string($conn, $_POST['pre']);

$category = mysqli_real_escape_string($conn, $_POST['category']);
$terms = ucfirst(mysqli_real_escape_string($conn, $_POST['instructions']));

$sql = "SELECT * FROM tbl_examinations WHERE exam_name = '$exam'  AND category = '$category' AND exam_id != '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../examinations.php?rp=1185");
    }
} else {

$sql = "UPDATE tbl_examinations SET category = '$category', exam_name = '$exam', duration = '$duration', passmark = '$passmark', t_mark = '$t_mark', t_question = '$t_question', terms = '$terms' WHERE exam_id='$exam_id'";

if ($conn->query($sql) === TRUE) {
header("location:../examinations.php?rp=7823&eid=$exam_id");
} else {
header("location:../examinations.php?rp=1298&eid=$exam_id");
}


}
$conn->close();
?>

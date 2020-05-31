<?php
include '../../database/config.php';
$id = (int)mysqli_real_escape_string($conn, $_GET['id']);
$exid = mysqli_real_escape_string($conn, $_GET['eid']);

$sql = "DELETE FROM tbl_topic WHERE t_id=$id";

if ($conn->query($sql) === TRUE) {
    header("location:../edit-topic.php?rp=7823&eid=$exid");
} else {
    header("location:../edit-topic.php?rp=1298&eid=$exid");
}

$conn->close();
?>
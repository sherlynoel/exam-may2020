<?php
include '../../database/config.php';
$tid = (int)$_POST['tid'];
$topic = $_POST['topic'];
$numq = (int)$_POST['num_q'];

$sql = "UPDATE tbl_topic SET topic = '$topic',num_q = $numq  WHERE t_id = $tid";	
if($conn->query($sql) == true){
	header('location:../examinations.php?rp=7823');
} else {
	header('location:../examinations.php?rp=1298');
}


?>
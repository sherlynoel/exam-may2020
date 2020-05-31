<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';

if(isset($_POST['topic'])){
	echo "coming to this page";
	$id = $_POST['exam'];
	$topic =  $_POST['t_name'];
	$numq = (int)$_POST['num_q'];
	$sql = "INSERT INTO tbl_topic(exam_id,topic,num_q) VALUES ('$id','$topic',$numq)";
	$result = $conn->query($sql);
	if($result){
		header('location:../examinations.php?rp=2925');
	} else {
		header('location:../examinations.php?rp=3025');
	}
}

?>
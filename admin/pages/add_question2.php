<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam']);
$question_id = 'QS-'.get_rand_numbers(6).'';
$question = mysqli_real_escape_string($conn, $_POST['question']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
//$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$posmarks = mysqli_real_escape_string($conn, $_POST['marks']);
$negmarks = 0;
if($_POST['neg_marks']){
	$negmarks = mysqli_real_escape_string($conn, $_POST['neg_marks']);
	$negmarks= -$negmarks;
}
if (isset($_GET['type'])) {
$question_type = $_GET['type'];	
if ($question_type == "mc") {	
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);


$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 header("location:../questions.php?rp=1185");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, option1, option2, option3, option4, positive_mark, negative_mark, answer)
VALUES ('$question_id', '$examid', 'MC', '$question', '$opt1', '$opt2', '$opt3', '$opt4', $posmarks, $negmarks, '$answer')";

if ($conn->query($sql) === TRUE) {
    header("location:../questions.php?rp=0357");	
} else {
 header("location:../questions.php?rp=3903");	
}

}


}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../add-questions.php?rp=1185&eid=$examid");
    }
} else {

$sql = "INSERT INTO tbl_questions (question_id, exam_id, type, question, positive_mark, negative_mark,  answer)
VALUES ('$question_id', '$examid', 'FB', '$question', $posmarks, $negmarks, '$answer')";

if ($conn->query($sql) === TRUE) {
  header("location:../questions.php?rp=0357");  	
} else {
 header("location:../questions.php?rp=3903");
}


}


}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>
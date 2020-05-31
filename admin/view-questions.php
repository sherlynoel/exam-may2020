<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';

if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);	
$topic = 1;

$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
$exam_name =$row['exam_name'];
}
if(isset($_GET['submit'])){
$topic = $_GET['topics'];
}

} else {
header("location:./");	
}

}



else {
header("location:./");	
}
?>
<!DOCTYPE html>
<html>

<head>


<title>GATE | View Exam</title>

<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta charset="UTF-8">
<meta name="description" content="Online Examination System" />
<meta name="keywords" content="Online Examination System" />
<meta name="author" content="Bwire Charles Mashauri" />

<link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
<link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
<link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
<link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
<link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
<link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
<link href="../assets/images/icon.png" rel="icon">
<link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
<link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
<script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
<script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>   class="page-header-fixed page-horizontal-bar" >
<div class="overlay"></div>
<div class="menu-wrap">
<nav class="profile-menu">
<div class="profile">
<?php 
if ($myavatar == NULL) {
print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
}else{
echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
}

?>
<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
<div class="profile-menu-list">
<a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
<a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
</div>
</nav>
<button class="close-button" id="close-button">Close Menu</button>
</div>
<form class="search-form" action="search.php" method="GET">
<div class="input-group">
<input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>
<span class="input-group-btn">
<button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
</span>
</div>
</form>
<main class="page-content content-wrap container">
<div class="navbar">
<div class="navbar-inner">
<div class="sidebar-pusher">
<a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
<i class="fa fa-bars"></i>
</a>
</div>
<div class="logo-box">
<a href="./" class="logo-text"><span><img src="gate.png" alt="" height="55" width="130"></span></a>
</div>
<div class="search-button">

<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
</div>
<div class="topmenu-outer">
<div class="top-menu">
<ul class="nav navbar-nav navbar-left">
<li>		


</ul>
<ul class="nav navbar-nav navbar-right">

<li>	
<a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
<span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i class="fa fa-angle-down"></i></span>
<?php 
if ($myavatar == NULL) {
print' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
}else{
echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>';	
}

?>
</a>
<ul class="dropdown-menu dropdown-list" role="menu">
<li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
<li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
</ul>
</li>
<li>
<a href="logout.php" class="log-out waves-effect waves-button waves-classic">
<span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
</a>
</li>
<li>

</li>
</ul>
</div>
</div>
</div>
</div>
<div class="horizontal-bar sidebar">
<div class="page-sidebar-inner slimscroll">
<div class="sidebar-header">
<div class="sidebar-profile">
<a href="javascript:void(0);" id="profile-menu-link">
<div class="sidebar-profile-image">
<?php 
if ($myavatar == NULL) {
print' <img class="img-circle img-responsive" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
}else{
echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';	
}

?>

</div>
<div class="sidebar-profile-details">
<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>GATE Administrator</small></span>
</div>
</a>
</div>
</div>
<ul class="menu accordion-menu">
<li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
<li><a href="departments.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-folder-open"></span><p>Departments</p></a></li>
<li><a href="categories.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-tags"></span><p>Subject</p></a></li>

<li><a href="students.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Students</p></a></li>
<li><a href="examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Examinations</p></a></li>
<!-- <li><a href="questions.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-question-sign"></span><p>Questions</p></a> --></li>
<li><a href="notice.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Notice</p></a></li>
<li><a href="results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>


</ul>
</div>
</div>
<div class="page-inner">
<div class="page-title">
<h3>View Examination</h3>
<div class="page-breadcrumb">
<ol class="breadcrumb">
<li><a href="./">Home</a></li>
<li><a href="examinations.php">Examinations</a></li>
<li class="active"><?php echo "$exam_name"; ?></li>
</ol>
</div>
</div>
<div id="main-wrapper">
<div class="row">
<div class="panel panel-white">
<div class="panel-body">
<div class="tabs-below" role="tabpanel">

<div class="tab-content">
<form action="view-questions.php">
<select name="topics" class="form-control col-md-8">
<option>Select Topic</option>
<?php
$query = "SELECT distinct topic from tbl_questions WHERE exam_id = '$exam_id' ";
$result = $conn->query($query);
if($result->num_rows > 0){
while($rows = $result->fetch_assoc() ){
    $top = $rows['topic'];
    $top = "'".$top."'" ;
echo "<option value=".htmlspecialchars($top).">".$rows['topic']."</option>";
}
}
?>

</select>
<input type="hidden" name="eid" value="<?=$exam_id?>">
<br>
<br><br>
<div class="text-center">
<button class="btn btn-success" type="submit" name="submit"> Choose</button>
</div>
</form><br><br><br>
<?php 
include '../database/config.php';
if($topic == 1){												
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);
} else {
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' AND topic = '$topic'";
$result = $conn->query($sql);

}



if ($result->num_rows > 0) {
$tot_q = $result->num_rows;
echo "<div><b>Total Question :</b>".$tot_q."</div>";
$qno = 1;
while($row = $result->fetch_assoc()) {
$qs = $row['question'];
$type = $row['type'];
$topic = $row['topic'];
$op1 = $row['option1'];
$op2 = $row['option2'];
$op3 = $row['option3'];
$op4 = $row['option4'];
$imgs = $row['img'];
$posmarks = $row['positive_mark'];
$neg = $row['negative_mark'];
$ans = $row['answer'];

if ($type == "FB") {
if ($qno == "1") {
//<div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
print '
<div>
<p>Topic: '.$topic.'</p>
<p>Question Number: <b>'.$qno.'.</b><br>Question: '.nl2br(htmlentities($qs), false).'</p>';
                                          if( $imgs == NULL){ }else{
print '<center><img src="data:image/jpeg;base64,'.base64_encode($imgs).'" class="img-responsive" alt="error" style="top:0px;width:300px;height:300px"/></center>';
}print '
<p><input type="text" name="'.htmlentities($qno).'"  class="form-control" placeholder="Enter your answer">
<hr>
<a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-pencil"></i></a>
<a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>

</div>
';	
}else{
//<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
print '
<div>
<p>Topic: '.$topic.'</p>
<p>Question Number: <b>'.$qno.'.</b><br>Question: '.nl2br(htmlentities($qs), false).'</p>';
                                          if( $imgs == NULL){ }else{
print '<center><img src="data:image/jpeg;base64,'.base64_encode($imgs).'" class="img-responsive" alt="error" style="top:0px;width:300px;height:300px"/></center>';
}print '
<p><input type="text" name="'.htmlentities($qno).'"  class="form-control" placeholder="Enter your answer">
<hr>
<a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-pencil"></i></a>
<a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
</div>
';		
}

$qno = $qno + 1;	
}else{

if ($qno == "1") {

print '
<div>
<p><b>Topic: </b>'.$topic.'</p>
<p><span style="font-size: 10pt;white-space:pre"><b>Positive Marks: </b>'.(htmlentities($posmarks)).'<span></p>
<p><span style="font-size: 10pt;white-space:pre"><b>Negative Marks:</b> '.(htmlentities($neg)).'<span></p>
<p><span style="font-size: 10pt;white-space:pre"><b>Answer option is : </b> '.(htmlentities($ans)).'<span></p>
<p><b>QNo:</b> '.$qno.'<br><b>Question :</b>'.nl2br(htmlentities($qs)).'</p>';
                                        if( $imgs == NULL){ }else{
print '<center><img src="data:image/jpeg;base64,'.base64_encode($imgs).'" class="img-responsive" alt="error" style="overflow:scroll"/></center>';
}print '
<p><input type="radio" name="'.$qno.'"  class="form-control" value="'.$op1.'"/><label>'.htmlentities($op1).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op2.'/><label>'.htmlentities($op2).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op3.'/><label>'.htmlentities($op3).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op4.'/><label>'.htmlentities($op4).'</label></p>
<hr>
<a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-pencil"></i></a>
<a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
</div>
';	
}else{
print '
<div>
<p><b>Topic: </b>'.$topic.'</p>
<p><span style="font-size: 10pt;white-space:pre"><b>Positive Marks: </b>'.(htmlentities($posmarks)).'<span></p>
<p><span style="font-size: 10pt;white-space:pre"><b>Negative Marks:</b> '.(htmlentities($neg)).'<span></p>
<p><span style="font-size: 10pt;white-space:pre"><b>Answer option is : </b> '.(htmlentities($ans)).'<span></p>
<p><b>QNo:</b>'.$qno.'.</b><br><b>Question :</b>  '.nl2br(htmlentities($qs)).'</p>';
                                          if( $imgs == NULL){ }else{
print '<center><img src="data:image/jpeg;base64,'.base64_encode($imgs).'" class="img-responsive" alt="error" style="overflow:scroll"/></center>';
}print '
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op1.'/><label>'.htmlentities($op1).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op2.'/><label>'.htmlentities($op2).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op3.'/><label>'.htmlentities($op3).'</label></p>
<p><input type="radio" name="'.$qno.'"  class="form-control" value='.$op4.'/><label>'.htmlentities($op4).'</label></p>
<hr>
<a  class="btn btn-twitter m-b-xs"href="edit-question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-pencil"></i></a>
<a';?> onclick = "return confirm('Drop this question ?')" <?php print 'class="btn btn-youtube m-b-xs"href="pages/drop_question.php?id='.$row['question_id'].'&eid='.$exam_id.'"><i class="fa fa-trash-o"></i></a>
</div>
';		
}

$qno = $qno + 1;	


}

}
} else {

}

?>

</div>


<!--                                            <ul class="nav nav-tabs" role="tablist">-->
<?php 
//											include '../database/config.php';
//											$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
//                                            $result = $conn->query($sql);
//
//                                            if ($result->num_rows > 0) {
//                                            $qno = 1;
//                                            while($row = $result->fetch_assoc()) {
//											if ($qno == "1") {
//											print '<li role="presentation" class="active"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';	
//											}else{
//											print '<li role="presentation"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">Q'.$qno.'</a></li>';		
//											}
//
//											$qno = $qno + 1;
//                                            }
//                                            } else {
// 
//                                            }

?>

<!--                                            </ul>-->
</div>
</div>
</div>  
</div>
</div>

</div>
</main>
<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{

}
?>
<div class="cd-overlay"></div>


<script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/pace-master/pace.min.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/switchery/switchery.min.js"></script>
<script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="../assets/plugins/waves/waves.min.js"></script>
<script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="../assets/js/modern.min.js"></script>

<script>
function myFunction() {
var x = document.getElementById("snackbar")
x.className = "show";
setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
</body>

</html>

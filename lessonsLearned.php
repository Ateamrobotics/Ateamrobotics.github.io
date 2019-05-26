<?php 
include('include/database.php'); 
?>
<?php
 if($_POST){
    $id = ($_POST['id']);
    $description = ($_POST['description']);
    $query = "UPDATE archive SET description='$description' WHERE id=$id";
    $mysqli->query($query) or $msg=1;
    header('Location: index.php?s='.$msg.'');
    exit;
 }
  if($_GET){
    $uid = $_GET['uid'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $query ="SELECT id FROM archive WHERE uid='$uid' AND date='$date' AND time='$time'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$edit = $result->fetch_assoc();
	$id = $edit['id'];
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>A-Team Robotics</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Attendance Application" content="">
    <meta name="Adam Tronchin" content="">
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#6610f2">
    <link rel="icon" href="logoSpace.png">
    <!-- Bootstrap core CSS -->
    <link href="./css/main.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/custom.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Meeting Notes</h2>
  <p>Please make make note of what you have done since you punched in. This will be used later for our lessons learned.</p>
  <style>
  div {
  margin: 10px;
}
</style>
<!-- <div class="card" style="width: 90%; padding: 10px;"> -->
<form class="rollingForm" id="addLessonLearned" role="form" method="post" action="lessonsLearned.php">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Meeting Notes/ Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>
  <?php
  echo '<button type="submit" style="margin-left:10px;" name="id" value='.$id.' class="btn btn-primary">Submit</button>';
  ?>
</form>
<!-- </div> -->
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

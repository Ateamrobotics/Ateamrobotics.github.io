<?php include('include/database.php');
include('functions/user.func.php');
include('init.php');
if(logged_in()==false){
  header('Location: index.php');
  exit;
}
date_default_timezone_set("America/Toronto");
    $finalDate = date("Y/m/d");
 $meetings2 ="SELECT * FROM meeting_dates WHERE date >= '$finalDate' ORDER by date DESC";
 $meetingsResults2 = $mysqli->query($meetings2) or die($mysqli->error.__LINE__);
$meetings ="SELECT * FROM meeting_dates WHERE date >= '$finalDate' ORDER by date ASC";
 $meetingsResults = $mysqli->query($meetings) or die($mysqli->error.__LINE__);
 $submit = false;
 if($_POST){
  if(isset($_POST['go'])){
    $title = ($_POST['title']);
    $description = ($_POST['description']);
    $date = ($_POST['date']);
    $timeStart = ($_POST['timeStart']);
    $timeEnd = ($_POST['timeEnd']);
    $link = ($_POST['link']);
    $id = ($_POST['id']);
    $meeting ="UPDATE meeting_dates SET title='$title', description='$description', timeStart='$timeStart', timeEnd='$timeEnd', date='$date', link='$link' WHERE id=$id";
    $meetingResults = $mysqli->query($meeting) or die($mysqli->error.__LINE__);
    header('Location: manage.php?s=0');
    exit;
   }else{
     $id = ($_POST['id']);
     $meeting ="SELECT * FROM meeting_dates WHERE id=$id";
     $meetingResults = $mysqli->query($meeting) or die($mysqli->error.__LINE__);
     $display = $meetingResults->fetch_assoc();
     $submit = true;
   }
}else{
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
<body onload="startTime()">
<body>
	<nav class="navbar navbar-dark fixed-top bg-light">
  <a class="navbar-brand" href="manage.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
	<a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
  </nav>
  <h2>Edit Meeting</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>

<form method="post" action="editMeeting.php">
  <?php
  if($submit==true){
   $output= '
  <form class="rollingForm" id="addMember" role="form" method="post" onsubmit="return validateForm()" action="addMember.php">
  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" value='.$display['title'].'  name="title" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <input class="form-control" type="text" name="description" value='.$display['description'].' id="description" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Link</label>
  <div class="col-10">
    <input class="form-control" type="url" value='.$display['link'].'  id="link" name="link" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" value='.$display['date'].' id="date" name="date">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Start Time (h.m)</label>
  <div class="col-10">
    <input class="form-control" type="time" value='.$display['timeStart'].' id="timeStart" name="timeStart" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">End Time (h.m)</label>
  <div class="col-10">
    <input class="form-control" type="time" value='.$display['timeEnd'].'  id="timeEnd" name="timeEnd" required>
  </div>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" name="go" value="go" id="confirmEdit" required>
<label class="form-check-label" for="confirmDelete">Confirm Edit Metting</label>
</div>
<button type="submit" name="id" value='.$display['id'].' class="btn btn-primary">Submit</button>
</form>

  ';
  echo $output;
  }else if($submit==false){
    $output =  '<select class="form-control" name="id" style="margin-bottom: 10px;">';
              if ($meetingsResults->num_rows > 0) {
                while($row = $meetingsResults->fetch_assoc()) {
                  $output .= '<option value='.$row['id'].'>'.$row['title'].", ".$row['date'].'</option>';
                }
              } else {
                echo "No results.";
              }
    $output .= '</select>';
   $output .= '<button type="submit" class="btn btn-primary">Edit This Meeting</button>';
   echo $output;
  }
  ?>
</form>
</div>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('timeClock').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>
<script>
    function myFunction() {
      document.getElementById("addMember").submit();
    }
    function validateForm() {
  var firstName = document.forms["addMember"]["firstName"].value;
  var lastName = document.forms["addMember"]["lastName"].value;
  var uid = document.forms["addMember"]["uid"].value;
  if (firstName == "" || lastName == "" || uid == "") {
    alert("Please Fill Out The Blank Fields");
    return false;
  }
}
    </script>

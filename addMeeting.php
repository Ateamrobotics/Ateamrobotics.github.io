<?php include('include/database.php'); 
$exp = time()+0;
setcookie("Time_Limit","$exp");
?>
<?php
  if($_POST){
    $msg=0;
    $title = ($_POST['title']);
    $description = ($_POST['description']);
    $link = ($_POST['link']);
    $date = ($_POST['date']);
    $timeStart = ($_POST['timeStart']);
    $timeEnd = ($_POST['timeEnd']);
    $query = "INSERT INTO meeting_dates (id, title, description, date, timeStart, timeEnd, link) VALUES ('','$title','$description','$date','$timeStart','$timeEnd', '$link')";
    $mysqli->query($query) or $msg=1;
    header('Location: index.php?s='.$msg.'');
    exit;
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
    <a class="navbar-brand" href="manage.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Add Meeting</h2>
  <style>
  div {
  margin: 10px;
}
</style>

<form class="rollingForm" id="addMeeting" role="form" method="post" onsubmit="return validateForm()" action="addMeeting.php">
  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="title" name="title" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="description" name="description" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Link</label>
  <div class="col-10">
    <input class="form-control" type="url" value="" id="link" name="link" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Date</label>
  <div class="col-10">
    <input class="form-control" type="date" value="" id="date" name="date" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Start Time (h.m)</label>
  <div class="col-10">
    <input class="form-control" type="time" value="" id="timeStart" name="timeStart" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">End Time (h.m)</label>
  <div class="col-10">
    <input class="form-control" type="time" value="" id="timeEnd" name="timeEnd" required>
  </div>
</div>
<button type="submit" class="btn btn-primary">Add</button>
</form>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
<script>
    function myFunction() {
      document.getElementById("addMeeting").submit();
    }
    function validateForm() {
  var title = document.forms["addMeeting"]["title"].value;
  var description = document.forms["addMeeting"]["description"].value;
  var link = document.forms["addMeeting"]["link"].value;
  var date = document.forms["addMeeting"]["date"].value;
  var start = document.forms["addMeeting"]["timeStart"].value;
  var end = document.forms["addMeeting"]["timeEnd"].value;
  if (title == "" || description == "" || date == "" || start == "" || end ="" || link ="") {
    alert("Please Fill Out The Blank Fields");
    return false;
  }
}
    </script>

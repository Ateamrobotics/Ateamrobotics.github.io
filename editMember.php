<?php include('include/database.php');
 $members ="SELECT * FROM members ORDER by firstName";
 $membersResults = $mysqli->query($members) or die($mysqli->error.__LINE__);
 $submit = false;
 if($_POST){
   if(isset($_POST['uidSelect'])){
     $uid = ($_POST['uidSelect']);
     $getMember ="SELECT * FROM members WHERE uid=$uid";
     $memberResults = $mysqli->query($getMember) or die($mysqli->error.__LINE__);
     $row = $memberResults->fetch_assoc();
     $submit = true;
   }else{
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $uid = ($_POST['uid']);
    $oldUID = ($_POST['oldUID']);
    echo $oldUID;
    $query = "UPDATE `members` SET `uid`=$uid,`firstName`='$firstName',`lastName`='$lastName' WHERE uid=$oldUID";
    $mysqli->query($query) or die($mysqli->error.__LINE__);
    header('Location: manage.php?s=0');
    exit;
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
  <h2>Edit Member</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>

<form method="post" action="editMember.php">
  <?php
  if($submit==true){
   $output= '<div class="card" style="width: 90%; padding: 10px;">
  <form class="rollingForm" id="addMember" role="form" method="post" onsubmit="return validateForm()" action="addMember.php">
  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">First Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" placeholder='.$row['firstName'].' id="firstName" name="firstName" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Last Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="lastName" placeholder='.$row['lastName'].' name="lastName" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">UID</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="uid" placeholder='.$row['uid'].' name="uid">
  </div>
</div>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="confirmDelete" required>
<label class="form-check-label" for="confirmDelete">Confirm Edit Member</label>
</div>
<button type="submit" name="oldUID" value='.$row['uid'].' class="btn btn-primary" style="width:50%;">Submit</button>
</form>
</div>
  ';
  echo $output;
  }else if($submit==false){
    $output =  '<select class="form-control" name="uidSelect" style="margin-bottom: 10px;">';
              if ($membersResults->num_rows > 0) {
                while($row = $membersResults->fetch_assoc()) {
                  $output .= '<option value='.$row['uid'].'>'.$row['firstName'].", ".$row['lastName'].'</option>';
                }
              } else {
                echo "No results.";
              }
    $output .= '</select>';
   $output .= '<button type="submit" class="btn btn-primary">Edit Member Information</button>';
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

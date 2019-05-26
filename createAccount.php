<?php
 include('include/database.php'); 
 include('functions/user.func.php');
 if(logged_in()){
  header('Location: manage.php?s=0');
  exit;
}
?>
<?php
if(isset($_POST['username'])){
  $firstName = ($_POST['firstName']);
  $lastName = ($_POST['lastName']);
  $username = ($_POST['username']);
  $password = ($_POST['password']);
  $workSpacePassword = ($_POST['workSpacePassword']);
  if(user_exists($username)==true){
    echo '<h3>Sorry that username already exists, try with a different username</h3>';
  }else if($workSpacePassword!='ad6544!2019'){
    echo '<h3>Invalid Workspace Password</h3>';
  }else{
    user_register($firstName, $lastName, $username, $password);
  }
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
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
  </nav>
  <h2>Create Account</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>
<div class="card" style="width: 90%; padding: 10px;">
<form method="post" action="createAccount.php">
<div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="firstName" aria-describedby="firstName" name="firstName" maxlength="255" placeholder="Enter First Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" id="lastName" aria-describedby="lastName" name="lastName" maxlength="255" placeholder="Enter First Name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="userName" aria-describedby="usernameHelp" name="username" maxlength="500" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="userPassword" name="password" maxlength="20" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Work Space Password</label>
    <input type="password" class="form-control" id="workSpacePassword" maxlength="20" name="workSpacePassword" placeholder=" Workspace Password" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
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

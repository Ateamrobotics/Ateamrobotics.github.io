<?php include('include/database.php'); 
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
  <h2>Login</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>
<div class="card" style="width: 90%; padding: 10px;">
<form method="post" action="login.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="userName" aria-describedby="usernameHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
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

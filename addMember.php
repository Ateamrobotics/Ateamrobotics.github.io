<?php include('include/database.php'); 
$exp = time()+0;
setcookie("Time_Limit","$exp");
?>
<?php
  if($_POST){
    $msg=0;
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $uid = ($_POST['uid']);
    $query = "INSERT INTO members (uid, firstName, lastName, dateAdded, hours, presence) VALUES ('$uid','$firstName','$lastName','','0.0','1')";
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
    <a class="navbar-brand" href="manageMembers.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Add Member</h2>
  <style>
  div {
  margin: 10px;
}
</style>

<form class="rollingForm" id="addMember" role="form" method="post" action="manageMembers.php">
  <div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">First Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="firstName" name="firstName">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Last Name</label>
  <div class="col-10">
    <input class="form-control" type="text" value="" id="lastName" name="lastName">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">UID</label>
  <div class="col-10">
    <input class="form-control" type="number" value="" id="uid" name="uid">
  </div>
</div>
<button type="submit" class="btn btn-primary">Add</button>
</form>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

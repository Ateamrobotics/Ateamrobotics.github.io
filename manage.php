<?php include('include/database.php'); 
$exp = time()+0;
setcookie("Time_Limit","$exp");
?>
<?php
  if($_POST){
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $uid = ($_POST['uid']);
    
    $query = "INSERT INTO members (uid, firstName, lastName, dateAdded) VALUES ('$uid','$firstName','$lastName',null)";
    $mysqli->query($query); 
    header('Location: index.php?s=0');
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
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Manage</h2>
  <table>
  <ul>
  <li>
<a href="addMember.php"><button type="button" class="btn btn-primary btn-lg" style="margin:20px;">Add Member</button></a>
</li>
<li>
<a href="deleteMember.php"><button type="button" style="margin-left:20px;"class="btn btn-danger btn-lg">Delete Member</button></a>
</li>
<li>
<a href="addMeeting.php"><button type="button" style="margin:20px;"class="btn btn-warning btn-lg">Add Meeting</button></a>
</li>
</ul>
</table>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

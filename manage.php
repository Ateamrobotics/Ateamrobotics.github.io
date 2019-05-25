<?php include('include/database.php'); 
?>
<?php
$msg="";
	if($_GET){
		$msg = ($_GET['s']);
	}
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
  <?php 
	if(strlen($msg) > 0){
		if($msg == 0){
			echo '<h4 style="color:green;">'."Success".'</h4>';
		}else{
			echo '<h4 style="color:red;">'."Failed".'</h4>';
		}
	}
	?>
  <table>
  <ul style="list-style: none;">
  <li>
<a href="addMember.html"><button type="button" style="margin-left:20px;margin-top:20px;" class="btn btn-primary btn-lg" >Add Member</button></a>
</li>
<li>
<a href="addMeeting.php"><button type="button" style="margin-left:20px;margin-top:20px;" class="btn btn-primary btn-lg">Add Meeting</button></a>
</li>
<li>
<a href="deleteMember.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-danger btn-lg">Delete Member</button></a>
</li>
<li>
<a href="deleteMeeting.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-danger btn-lg">Delete Meeting</button></a>
</li>
<li>
<a href="editRecord.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Edit Record</button></a>
</li>
<li>
<a href="editMeeting.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Edit Meeting</button></a>
</li>
<li>
<a href="editMember.php"><button type="button" style="margin-left:20px;margin-top:20px;"class="btn btn-warning btn-lg">Edit Member</button></a>
</li>
</ul>
</table>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
<?php include('include/database.php'); 
$exp = time()+1;
setcookie("Time_Limit","$exp");
    $members ="SELECT * FROM members ORDER by firstName";
	$membersResults = $mysqli->query($members) or die($mysqli->error.__LINE__);
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
<body onload="startTime()">
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
  <h2>Manual Add Record</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;"id="timeClock"></p>
<form id="addMember" role="form" method="get" action="add.php">
    <div class="form-group">
		<label style="font-size: 18px">Team Member UID</label>
    <select class="form-control" id="memberSelect" name="uid">
				<?php
					if ($membersResults->num_rows > 0) {
						while($row = $membersResults->fetch_assoc()) {
							echo '<option value='.$row['uid'].'>'.$row['firstName'].", ".$row['lastName'].'</option>';
						}
					} else {
						echo "No results.";
					}
				?>
			</select>
	</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
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

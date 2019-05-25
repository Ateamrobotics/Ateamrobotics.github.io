<?php include('include/database.php'); 
$exp = time()+1;
    $members ="SELECT * FROM members ORDER by firstName";
  $membersResults = $mysqli->query($members) or die($mysqli->error.__LINE__);
  $query ="SELECT * FROM members ";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
    <a class="nav-link" href="manage.php" style="color:rgb(111, 21, 214);">Manage</a>
	  <a class="nav-link" href="view.php" style="color:rgb(111, 21, 214);">View Logs</a>
    <a class="nav-link" href="login.php" style="color:rgb(111, 21, 214);">Login</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Presence and Report</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;"id="timeClock"></p>
<form id="addAttendace" role="form" method="get" action="add.php">
<table class="table-striped" style="width: 100%">
				<tr>
					<th style="margin:20px;">Name</th>
          <th>Mark / Presence</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
					$msg = "";
					if($row['presence']==0){
						$msg = "Present";
					}else{
						$msg = "Absent";
					}
					$output ='<tr>';
					$output .='<td style="padding-top:15px;padding-bottom:15px;">'.$row['firstName'].' '.$row['lastName'].'</td>';
					// if($row['presence']==0){
					// 	$output .='<td style="color:green;padding-left:20px;">'.$msg.'</td>';
					// }else{
					// 	$output .='<td style="color:red;padding-left:20px;">'.$msg.'</td>';
          // }
          if($row['presence']==0){
            $output .='<td style="color:green;padding-left:20px;"><button type="submit" class="btn btn-success" name="uid" value='.$row['uid'].'>'.$msg.'</button>'.'</td>';
					}else{
						$output .='<td style="color:red;padding-left:20px;"><button type="submit" class="btn btn-outline-danger" name="uid" value='.$row['uid'].' style="color:red;">'.$msg.'</button>'.'</td>';
          }
					$output .='</tr>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, team members where not found";
			}
			?>
		</table>
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

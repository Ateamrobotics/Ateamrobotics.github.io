<?php include('include/database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT * FROM members ORDER by firstName";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	//Get Number of meeting dates
	$meetingDates ="SELECT COUNT(id) as meets FROM meeting_dates";
	$meetingDatesResults = $mysqli->query($meetingDates) or die($mysqli->error.__LINE__);
	$numMeetingResults = $meetingDatesResults->fetch_assoc();
	$numMeet = $numMeetingResults['meets'];
	$msg="";
	if($_GET){
		$msg = ($_GET['s']);
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
<nav class="navbar navbar-dark fixed-top bg-light">
	<a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
	<a class="nav-link" href="manage.php" style="color:rgb(111, 21, 214);">Manage</a>
	<a class="nav-link" href="currentMembers.php" style="color:rgb(111, 21, 214);">Presence</a>
</nav>
	<h2>Attendance Logs</h2>
	<body onload="startTime()">
	<?php 
	if(strlen($msg) > 0){
		if($msg == 0){
			echo '<h4 style="color:green;">'."Success".'</h4>';
		}else{
			echo '<h4 style="color:red;">'."Failed".'</h4>';
		}
	}
	?>
<div class="row">
	
	<a class="nav-link" href="manualAdd.php" style="color:rgb(111, 21, 214);"><button class="markAttendance">Mark Attendance</button></a>
	<p style="margin-top:18px;"id="timeClock"></p>
	</div>
	<h4>Mettings Count: <?php echo $numMeet; ?></h4>
		<table class="table table-striped">
				<tr>
					<th>Name</th>
					<!-- <th>ID</th> -->
					<th style="padding-left:40px;">Hours Logged</th>
					<th>View Record</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
 			  if(($row['hours'])>0.60){
					// $h=number_format((($row['hours']*100)/60),2);
				 }else{
					 $h=number_format($row['hours'],2);
				 }
					$output ='<tr>';
					$output .='<td>'.$row['firstName'].' '.$row['lastName'].'</td>';
					// $output .='<td>'.$row['uid'].'</td>';
					$output .='<td style="padding-left:40px;">'.$row['hours'].'</td>';
					$output .='<td>'.'<a style="color:rgb(111, 21, 214)" class="btn" role="button" href="viewRecord.php?uid='.$row['uid'].'">View</a>'.'</td>';
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
			<p>h.m Time Format Hours decimal Minutes</p>
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

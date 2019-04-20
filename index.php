<?php include('include/database.php'); ?>
<?php
	//Create the select query
	$query ="SELECT * FROM members ";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	//Get Number of meeting dates
	$meetingDates ="SELECT COUNT(id) as meets FROM meeting_dates";
	$meetingDatesResults = $mysqli->query($meetingDates) or die($mysqli->error.__LINE__);
	$numMeetingResults = $meetingDatesResults->fetch_assoc();
	$numMeet = $numMeetingResults['meets'];
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
	<a class="nav-link" href="manageMembers.php" style="color:rgb(111, 21, 214);">Manage</a>
	<a class="nav-link" href="currentMembers.php" style="color:rgb(111, 21, 214);">Presence</a>
</nav>
	<h2>Attendance Report</h2>
		<table class="table table-striped">
				<tr>
					<th>Name</th>
					<th>UID</th>
					<th>Hours Logged</th>
					<th>View Record</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display customer info
					$UID = $row['uid'];
					$daysPresence ="SELECT COUNT(uid) as counting FROM present_record WHERE uid=$UID";
					$daysPresenceResults = $mysqli->query($daysPresence) or die($mysqli->error.__LINE__);
					$row2 = $daysPresenceResults->fetch_assoc();
					//fetch_assoc($daysPresenceResults);
 			 
					$output ='<tr>';
					$output .='<td>'.$row['firstName'].' '.$row['lastName'].'</td>';
					$output .='<td>'.$row['uid'].'</td>';
					$output .='<td>'.($numMeet-$row2['counting']).'</td>';
					$output .='<td>'.'<a style="color:rgb(111, 21, 214)" class="btn" role="button" href="viewRecord.php?="+"'.$row['uid'].'" >View</a>'.'</td>';
					$output .='</tr>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, team members where not found";
			}
			?>
		</table>

		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

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
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Presence Report</h2>
  <table class="table table-striped">
				<tr>
					<th>Name</th>
          <th></th>
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
					$output .='<td>'.$row['firstName'].' '.$row['lastName'].'</td>';
					if($row['presence']==0){
						$output .='<td style="color:green;">'.$msg.'</td>';
					}else{
						$output .='<td style="color:red;">'.$msg.'</td>';
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
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

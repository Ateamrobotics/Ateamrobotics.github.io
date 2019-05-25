<?php include('include/database.php'); ?>
<?php
	//Create the select query
	$uid;
	$uid = $_GET['uid'];
	if(isset($uid)&&(!empty($uid))){
		$uid = $_GET['uid'];
		$isBlank = false;
		$screenErrorMessage = "";
		$query ="SELECT `firstName`,`lastName`,`hours`,`presence` FROM `members` WHERE `uid`='$uid'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$nameDisplay = $result->fetch_assoc();
		$archive ="SELECT * FROM `archive` WHERE `uid`='$uid'  ORDER by date DESC";
			$result2 = $mysqli->query($archive) or die($mysqli->error.__LINE__);
	}else{
		$isBlank = true;
		$screenErrorMessage = "Could not retrive member information.";
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
<a class="navbar-brand" href="view.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
	<a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
</nav>
<div>
<h2>Days Absent</h2>
<style>
  div {
  margin: 5px;
}
</style>
<h5 style="color:grey;">First Name: <?php echo $nameDisplay['firstName']; ?></h5>
<h5 style="color:grey;">Last Name: <?php echo $nameDisplay['lastName']; ?></h5>
<table class="table table-striped">
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>State</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($result2->num_rows > 0) {
				//Loop through results
				while($row = $result2->fetch_assoc()){
					//Display specific member info
					$msg = "";
					if($row['state']==0){
						$msg = "Punch In";
					}else{
						$msg = "Punch Out";
					}
					$output ='<tr>';
					$output .='<td>'.$row['date'].'</td>';
					$output .='<td>'.$row['time'].'</td>';
					$output .='<td>'.$msg.'</td>';
					$output .='</tr>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, no records were found";
			}
			?>
		</table>
<h3 style="color:white; "><?php echo $screenErrorMessage ?></h3>
</div>
		<div class="footer">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

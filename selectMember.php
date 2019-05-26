<?php include('include/database.php');
 $members ="SELECT * FROM members ORDER by firstName";
 $membersResults = $mysqli->query($members) or die($mysqli->error.__LINE__);
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
  <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
  </nav>
  <h2>Select Member</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>
<form method="post" action="viewLessons.php">
  <?php 
    $output =  '<select class="form-control" name="uid" style="margin-bottom: 10px;">';
              if ($membersResults->num_rows > 0) {
                while($row = $membersResults->fetch_assoc()) {
                  $output .= '<option value='.$row['uid'].'>'.$row['firstName'].", ".$row['lastName'].'</option>';
                }
              } else {
                echo "No results.";
              }
    $output .= '</select>';
   $output .= '<button type="submit" class="btn btn-primary">Select</button>';
   echo $output;
  ?>
</form>
</div>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
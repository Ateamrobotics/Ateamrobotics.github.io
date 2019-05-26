<?php 
include('include/database.php'); 
if(isset($_POST['uid'])){
    $uid = ($_POST['uid']);
    $query = "SELECT * FROM archive WHERE uid=$uid AND state=1";
    $lessonsResults = $mysqli->query($query) or die($mysqli->error.__LINE__);
 }else{
    header('Location: selectMember.php');
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
	<nav class="navbar navbar-dark fixed-top bg-light">
    <a class="navbar-brand" href="selectMember.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
	<a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
  </nav>
  <h2>View Lessons Learned</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<p style="margin-top:18px;margin-left:15px;"id="timeClock"></p>
<?php
if ($lessonsResults->num_rows > 0) {
  while($row = $lessonsResults->fetch_assoc()) {
      if($row['description']==""){
        
      }else{
        $output = '<div class="card" style="width: 18rem;">';
        $output .= ' <div class="card-body">';
        $output .= '<h5 class="card-title">'.$row['date'].'</h5>';
        $output .= ' <h6 class="card-subtitle mb-2 text-muted">'.$row['time'].'</h6>';
        $output .= ' <p class="card-text">'.$row['description'].'</p>';
        $output .= '</div>';
        $output .= '</div>';
        echo $output;
      }
  }
} else {
  echo "No results.";
}
?>
</div>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
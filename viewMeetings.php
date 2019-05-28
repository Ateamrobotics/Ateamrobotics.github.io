<?php include('include/database.php');
date_default_timezone_set("America/Toronto");
    $finalDate = date("Y/m/d");
 $meetings2 ="SELECT * FROM meeting_dates WHERE date >= '$finalDate' ORDER by date DESC";
 $meetingsResults2 = $mysqli->query($meetings2) or die($mysqli->error.__LINE__);
$meetings ="SELECT * FROM meeting_dates WHERE date >= '$finalDate' ORDER by date ASC";
 $meetingsResults = $mysqli->query($meetings) or die($mysqli->error.__LINE__);

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
	<a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">Attendance</a>
  </nav>
  <h2>Meetings List</h2>
<p style="margin-top:10px;"id="timeClock"></p>
<?php
if ($meetingsResults->num_rows > 0) {
  echo '<div class="card-deck">';
  while($row = $meetingsResults->fetch_assoc()) {
    $output = '<div class="card bg-light mb-3" style="width: 18rem;">';
    $output .= '<h5 class="card-header">'.$row['title'].'</h5>';
    $output .= ' <div class="card-body">';
    $output .= ' <h6 class="card-subtitle mb-2 text-muted">'.$row['date'].'</h6>';
    $output .= ' <p class="card-text">'.$row['description'].'</p>';
if($row['link']==""){
$output .= '<a class="card-link-disabled">Meeting Info NA</a>';
}else{
$output .= '<a class="card-link" href='.$row['link'].'>Meeting Information</a>';
}
    
    $output .= '</div>';
    $output .= '</div>';
    echo $output;
  }
  echo '</div>';
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
<script>
    function myFunction() {
      document.getElementById("addMember").submit();
    }
    function validateForm() {
  var firstName = document.forms["addMember"]["firstName"].value;
  var lastName = document.forms["addMember"]["lastName"].value;
  var uid = document.forms["addMember"]["uid"].value;
  if (firstName == "" || lastName == "" || uid == "") {
    alert("Please Fill Out The Blank Fields");
    return false;
  }
}
    </script>

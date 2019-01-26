<?php include('database.php'); ?>
<?php
	//Get results from members table
  $query ="SELECT DISTINCT uid, firstName, lastName FROM members ORDER BY uid DESC";
	//Get Number of meeting dates
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">A-Team Attendance</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
						<a class="btn" href="index.php"style="color:rgb(111, 21, 214);">Home<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
			
  </nav>
  <h1>Manage Attendance Login</h1>
  <div class="row marketing">

  <div style="margin-left:40px;" >
  <form action="personAttendance.php" method="post" role="form">

    <label for="member">Member Name Select</label>
    <select class="form-control" id="members" name="members">
      <?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Output members
          $UID = $row['uid'];
          $output .='<option value="">'.$row['firstName'].' '.$row['lastName'].'</option>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, team members where not found";
			}
			?>
    </select>
    <input type="submit" value="Submit">

  </form>
  </div>

</div>
  <div class="footer" style="margin-top:40px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>

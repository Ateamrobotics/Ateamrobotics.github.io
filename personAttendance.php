<?php include('database.php'); ?>
<?php
	//Create the select query
	if($_POST){
	$UID = ($_POST['members']);
	echo $UID;
	$query ="SELECT date FROM datespresent WHERE uid='$UID'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
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
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
    <a class="navbar-brand" href="index.php" style="color:rgb(111, 21, 214); font-weight: bold;">A-Team Attendance</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
						<a class="btn" href="index.php"style="color:rgb(111, 21, 214);">Home<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
			<h1>Attendance Report</h1>
  </nav>
		<div style="margin-left:40px;" >
		<table class="table table-striped" >
				<tr>
					<th>Date</th>
					<th>Presence</th>
				</tr>
			<?php 
				//Check if at least one row is found
				if($result->num_rows > 0) {
				//Loop through results
				while($row = $result->fetch_assoc()){
					//Display result
					$output ='<tr>';
					$output .='<td>'.$row['date'].'</td>';
					$output .='<td>'."Present".'</td>';
					$output .='</tr>';
					//Echo output
					echo $output;
				}
			} else {
				echo "Sorry, information was not found";
			}
			?>
		</table>
		</div>
		<div class="footer"style="margin-top:40px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
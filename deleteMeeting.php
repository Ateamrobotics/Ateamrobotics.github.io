<?php include('include/database.php');
include('functions/user.func.php');
include('init.php');
$meetings ="SELECT * FROM meeting_dates ORDER by date";
$meetingsResults = $mysqli->query($meetings) or die($mysqli->error.__LINE__);
?>
<?php
if(logged_in()==false){
  header('Location: index.php');
  exit;
}
  if($_POST){
    $msg = 0;
    $id=($_POST['id']);

    $query = "DELETE FROM meeting_dates WHERE id='$id'";
    $mysqli->query($query) or $msg=1; 

    header('Location: manage.php?s='.$msg.'');
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
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
    <a class="navbar-brand" href="manage.php" style="color:rgb(111, 21, 214); font-weight: bold;"><- Back</a>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
          </li>
        </ul>
      </div>
  </nav>
  <h2>Delete Meeting</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<form id="deleteMeeting" role="form" method="post" action="deleteMeeting.php">
    <div class="form-group">
		<label style="font-size: 18px">Team Meeting</label>
    <select class="form-control" id="meetingID" name="id">
				<?php
					if ($meetingsResults->num_rows > 0) {
						while($row = $meetingsResults->fetch_assoc()) {
							echo '<option value='.$row['id'].'>'.$row['title'].", ".$row['date'].'</option>';
						}
					} else {
						echo "No results.";
					}
				?>
			</select>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="confirmDelete" required>
    <label class="form-check-label" for="confirmDelete">Confirm Delete Meeting</label>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>


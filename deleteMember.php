<?php include('include/database.php');
$members ="SELECT * FROM members ORDER by firstName";
$membersResults = $mysqli->query($members) or die($mysqli->error.__LINE__);
?>
<?php
  if($_POST){
    $msg = 0;
    $uid=$_POST['uid'];

    $check ="SELECT * FROM members where uid='$uid'";
    $membersResults = $mysqli->query($check) or die($mysqli->error.__LINE__);
    $results=$membersResults->fetch_assoc();

    $var=$results['firstName'];
    $var .=", ";
    $var .= $results['lastName'];
    echo "<script>alert(‘some message ’.”.$var.”)</script>";

    $query = "DELETE FROM members where uid='$uid'";
    $mysqli->query($query) or $msg=1; 
    $query = "DELETE FROM present_record where uid='$uid'";
    $mysqli->query($query) or $msg=1; 
    $query = "DELETE FROM archive where uid='$uid'";
    $mysqli->query($query) or $msg=1; 

    header('Location: index.php?s='.$msg.'');
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
  <h2>Delete Member</h2>
  <style>
  div {
  margin: 10px;
}
</style>
<form id="deleteMember" role="form" method="post" action="deleteMember.php">
    <div class="form-group">
		<label style="font-size: 18px">Team Member UID</label>
    <select class="form-control" id="memberSelect" name="uid">
				<?php
					if ($membersResults->num_rows > 0) {
						while($row = $membersResults->fetch_assoc()) {
							echo '<option value='.$row['uid'].'>'.$row['firstName'].", ".$row['lastName'].'</option>';
						}
					} else {
						echo "No results.";
					}
				?>
			</select>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="confirmDelete" required>
    <label class="form-check-label" for="confirmDelete">Confirm Delete Member</label>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
		<div class="footer"style="margin-top:20px;">
			<p style="color:purple;">&copy; A-Team Robotics 2019</p>
      </div>
</body>
</html>
<script>
function myFunction() {
      document.getElementById("deleteMember").submit();
}
</script>

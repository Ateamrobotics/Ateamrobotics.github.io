<?php include('include/database.php'); 
$exp = time()+0;
setcookie("Time_Limit","$exp");
?>
<?php
  if($_POST){
    $msg=0;
    $firstName = ($_POST['firstName']);
    $lastName = ($_POST['lastName']);
    $uid = ($_POST['uid']);
    $query = "INSERT INTO members (uid, firstName, lastName, dateAdded, hours, presence) VALUES ('$uid','$firstName','$lastName','','0.0','1')";
    $mysqli->query($query) or $msg=1;
    header('Location: index.php?s='.$msg.'');
    exit;
  }
?>
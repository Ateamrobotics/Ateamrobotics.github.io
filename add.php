<?php include('database.php'); ?>
<?php
error_reporting(0);

$uid='';

$uid=$_GET['uid'];

if(isset($uid)&&(!empty($uid))){
$uid = $_GET['uid'];
}
date_default_timezone_set("America/Toronto");
$finalDate = date("Y/m/d");
$query = "INSERT INTO datespresent (id, uid, date) VALUES (null,'$uid','$finalDate')";
$mysqli->query($query);
echo "0";
?>
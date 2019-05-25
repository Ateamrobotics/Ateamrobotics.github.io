<?php include('include/database.php');
function logged_in(){
    return isset($_SESSION['id']);
}
function login_check($username, $password){

}
function user_data(){

}
function user_register($firstName, $lastName, $username, $password){
    $msg=0;
    include('include/database.php');
    $query = "INSERT INTO `admin_users` (`id`, `userName`, `firstName`, `lastName`, `password`, `dateAdded`) VALUES ('','$username','$firstName','$lastName','$password','')";
    $mysqli->query($query) or $msg=1;
    header('Location: manage.php?s='.$msg.'');
    exit;
}
function user_exists($username){
    include('include/database.php');
   // $username = mysql_real_escape_string($username);
    $query = ("SELECT * FROM admin_users WHERE username='$username'");
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }
}
?>
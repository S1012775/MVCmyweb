<?php
header("content-type: text/html; charset=utf-8");
//login
class loginfun{
function login($connection,$username,$password){
$link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    
$result = mysql_query("SELECT * FROM `management` WHERE username='$username' and password='$password'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
  $_SESSION["username"] = $row['username'];
  $_SESSION["password"] = $row['password'];
  } else {
    $wrong = "Invalid Username or Password!";
          }
if(isset($_SESSION["username"])) {
  header("Location:../Manage/managemessage");
}

}

function logout(){
  session_start(); 
  unset($_SESSION["username"]);
  unset($_SESSION["password"]);  
echo "<script>alert('You have cleaned session');</script>";
header("Location: ../Home/index");

}
}
?>
<?php
session_start(); 
//登入
class loginfun extends Connect{
//資料庫連線
function login($username,$password){
  $user = $this->db->query("SELECT * FROM `management` WHERE `username`='$username' AND `password`='$password'");
  $result = $user->fetchAll(PDO::FETCH_ASSOC);
//建立SESSION
if(is_array($result[0])) {
  $_SESSION["username"] = $result[0]['username'];
  $_SESSION["password"] = $result[0]['password'];
  }
//若SESSION成立則導入會員頁
if(isset($_SESSION["username"])){
  header("Location:../Manage/managemessage");
}

}
//登出
function logout(){
  unset($_SESSION["username"]);
  unset($_SESSION["password"]);  
  header("Location: ../Home/index");
}

}
?>
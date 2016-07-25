<?php
session_start();
class LoginController extends Controller {
    
    function login() {
        
        if(isset($_SESSION["username"])) {
        header("Location:../Manage/managemessage");
         }
        else{
        $this->view("login");
        $messagelogin = $this->model("dbconnect");
        $connection= $messagelogin->dbcon();
        
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password']; 
        $loginOK = $this->model("loginfun");
        $enterlogin= $loginOK->login($connection,$username,$password);        
        }
        }
        
        
    }
    function logout() {
        $logoutOK = $this->model("loginfun");
        $enterlogin= $logoutOK->logout(); 
        
        }
}
?>

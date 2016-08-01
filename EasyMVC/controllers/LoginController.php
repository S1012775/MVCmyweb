<?php
session_start();
class LoginController extends Controller {
    
    function login() {
        //若SESSION 已存在 導入管理者頁面
        if(isset($_SESSION["username"])) {
        header("Location:../Manage/managemessage");
         }
        else{
        //不存在則進行LOGIN    
        $this->view("login");
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password']; 
        $loginOK = $this->model("loginfun");
        $enterlogin= $loginOK->login($username,$password);        
        }
        }
        
        
    }
    function logout() {
        $logoutOK = $this->model("loginfun");
        $enterlogin= $logoutOK->logout(); 
        
        }
}
?>

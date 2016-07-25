<?php

class ManageController extends Controller {
    
    function managemovie() {
        //顯示電影清單
        $movie = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$movie->findmovie($connection);
        $this->view("managemovie",$show);
        //新增修改電影
        $addmovie = $this->model("manageadd");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $showaddmovie=$addmovie->addmovie($connection);
        
        
    }
    function managemovietimes(){
        //顯示電影時刻表
        $movietimes = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$movietimes->findmovietimes($connection);
        $this->view("managemovietimes",$show);
        //新增修改電影清單
        $addmovie = $this->model("manageadd");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $showaddmovie=$addmovie->addmovie($connection);
    }
    function managemessage(){
        //顯示聯絡我們資訊
        $message = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$message->findmessage($connection);
        $this->view("managemessage",$show);
    }
    //刪除留言
    function delemessage(){
        // echo $_GET['id']."hh";
        $delmessage = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmessage->delmessage($connection,$delete_id);
        }
    }
    //刪除電影
    function delemovie(){
        // echo $_GET['id']."hh";
        $delmovie = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmovie->delmovie($connection,$delete_id);
        }
    }
    //刪除電影時刻表
    function delemovietimes(){
        // echo $_GET['id']."hh";
        $delmovietimes = $this->model("showmanage");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmovietimes->delmovietimes($connection,$delete_id);
        }
    }
}


?>

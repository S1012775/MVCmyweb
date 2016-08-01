<?php

class ManageController extends Controller {
    
    function managemovie() {
        //顯示電影清單
        $movie = $this->model("bymanage");
        $show=$movie->findmovie();
        $this->view("managemovie",$show);
        //新增修改電影
        $addmovie = $this->model("bymanage");
        $showaddmovie=$addmovie->addmovie();
        $this->view($showaddmovie);
    }
    
    function managemovietimes(){
        //顯示電影時刻表
        $movietimes = $this->model("bymanage");
        $show=$movietimes->findmovietimes();
        $this->view("managemovietimes",$show);
        //新增修改電影清單
        $addmovie = $this->model("bymanage");
        $showaddmovie=$addmovie->addmovietimes();
         $this->view($showaddmovie);
    }
    function managemessage(){
        //顯示聯絡我們資訊
        $message = $this->model("bymanage");
        $show=$message->findmessage();
        $this->view("managemessage",$show);
    }
    //刪除留言
    function delemessage(){
        // echo $_GET['id']."hh";
        $delmessage = $this->model("bymanage");
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmessage->delmessage($delete_id);
        }
    }
    //刪除電影
    function delemovie(){
        // echo $_GET['id']."hh";
        $delmovie = $this->model("bymanage");
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmovie->delmovie($delete_id);
        }
    }
    //刪除電影時刻表
    function delemovietimes(){
        // echo $_GET['id']."hh";
        $delmovietimes = $this->model("bymanage");
        if(isset($_GET['id'])){
        $delete_id = $_GET['id']; 
        $delete=$delmovietimes->delmovietimes($delete_id);
        }
    }
    
}


?>

<?php

class HomeController extends Controller {
    
    function index() {
        // 圖片顯示
        $indexslide=$this->model("index");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$indexslide->selectindex($connection);
        // $sqlshow=$indexslide->indexSlide($connection);
        $this->view("index",$show);
        $grab=$indexslide->indexSlide($connection);
        
        //聯絡我們
        $message = $this->model("index");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $message->indexMessage($connection);
        
    }
    
    function movie(){
        $moiveshow=$this->model("movie");
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$moiveshow->selectmoive($connection);
        $this->view("movie",$show);
        $grab=$moiveshow->grabmoive($connection);
        
    }
    function movietimes(){
        $moivetimeshow=$this->model("movietimes");
        
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $show=$moivetimeshow->selectmoivetimes($connection);
        
        $this->view("movietimes",$show);
        $grab=$moivetimeshow->grabmoivetimes($connection);
        
    }
    function get(){
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $showtime=$this->model("getmovie");
        $get=$showtime->showmovie($connection);
    }
}


?>

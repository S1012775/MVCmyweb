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
        $grab=$moiveshow->grabmoive($connection);
        $show=$moiveshow->selectmoive($connection);
        $this->view("movie",$show);
        
        
    }
    function movietimes(){
        $moivetimeshow=$this->model("movietimes");
        
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $grab=$moivetimeshow->grabmoivetimes($connection);
        $show=$moivetimeshow->selectmoivetimes($connection);
        $this->view("movietimes",$show);
        
        
    }
    function get(){
        $config=$this->model("dbconnect");
        $connection= $config->dbcon();
        $showtime=$this->model("movietimes");
        $get=$showtime->showmovie($connection);
    }
}


?>

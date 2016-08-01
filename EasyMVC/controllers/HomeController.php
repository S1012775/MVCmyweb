<?php

class HomeController extends Controller {
    
    function index() {
        // 圖片顯示
        $indexslide=$this->model("index");
        $show=$indexslide->selectindex();
        $this->view("index",$show);
        $grab=$indexslide->indexSlide();
        //聯絡我們
        $message = $this->model("index");
        $return=$message->indexMessage();
        $this->view("alert",$return);
    }
    
    function movie(){
        $moiveshow=$this->model("movie");
        $grab=$moiveshow->grabmoive();
        $show=$moiveshow->selectmoive();
        $this->view("movie",$show);
        
        
    }
    function movietimes(){
        $moivetimeshow=$this->model("movietimes");
        $grab=$moivetimeshow->grabmoivetimes();
        $show=$moivetimeshow->selectmoivetimes();
        $this->view("movietimes",$show);
        
    }
    function get(){
        
        $showtime=$this->model("movietimes");
        $get=$showtime->showmovie();
        //  $this->view("movietimes");
        
       
    }
}


?>

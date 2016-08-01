<?php
class bymanage extends Connect{
//顯示電影
function findmovie(){
    $select = $this->db->query("SELECT * FROM `movies`");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
    //以迴圈方式顯示
    foreach($data as $row){
        $user_id=$row['id'];
        $showpicture="<img src= '". $row['picture'] . "' style='height:200px;'/>" ;
        $showname=$row['name'];
        $showenname=$row['enname'];
        $showupdatetime=$row['updatetime'];
        $showupdatetpe=$row['updatetype'];
        $arraymoive[]=array("$user_id","$showpicture","$showname","$showenname","$showupdatetime","$showupdatetpe");
    }
    return  $arraymoive;
}
//顯示電影時刻表
function findmovietimes(){
     $select = $this->db->query("SELECT * FROM `movietimes`");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
    //以迴圈方式顯示
    foreach($data as $row){
        $user_id=$row['id'];
        $out=$row['time'];
	    $output=explode("其他戲院",$out);
        $showpicture="<img src= '". $row['picture'] . "' style='height:200px;'/>";
        $showname=$row['name'];
        $showtime=$output[0];
        $showfilmtime=$row['filmtime'];
        $showupdatetime= $row['updatetime'];
        $showupdatetype= $row['updatetype'];
        $arraymoivetimes[]=array("$user_id","$showpicture","$showname","$showtime","$showfilmtime","$showupdatetime","$showupdatetype");
    }
    return $arraymoivetimes;
}
//顯示留言板
function findmessage(){
    $select = $this->db->query("SELECT * FROM `message`");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
    //以迴圈方式顯示
    foreach($data as $row){
        $user_id=$row['id'];
        $showmesname=$row['mesname'];
        $showmesail=$row['mesemail'] ;
        $showmessubject =$row['messubject'];
        $showmescontent=$row['mescontent'] ;
        $arraymessage[]=array("$user_id","$showmesname","$showmesail","$showmessubject","$showmescontent");
    }
    return $arraymessage;
}
//刪除 留言板
function delmessage($delete_id){
    $this->db->query("DELETE FROM `message` WHERE `id`='$delete_id'");
    if($delete_id){
        header("location:managemessage");
    }  
}
//刪除電影
function delmovie($delete_id){
    $this->db->query("DELETE FROM `movies` WHERE `id`='$delete_id'");
    if($delete_id){  
        header("location:managemovie");
    }
}
//刪除電影時刻
function delmovietimes($delete_id){
    $this->db->query("DELETE FROM `movietimes` WHERE `id`='$delete_id'");
    if($select){  
        header("location:managemovietimes");
    }
}
//新增電影
function addmovie(){
    if (isset($_POST["insertmovie"])){
        $name=$_POST['name'];
        $enname=$_POST['enname'];
        $picture=$_POST['picture'];
        $updatetime=$_POST['updatetime'];
        //判斷是否為空值
        if($_POST['name']!="" && $_POST['enname']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
        //將新增的品項寫進資料庫   
            $this->db->query("INSERT INTO `movies` (`name`,`enname`,`picture`,`updatetime`,`updatetype`)VALUES('$name','$enname','$picture','$updatetime','手動更新')",$link);
            return "<script>alert('資料送出');</script>";
        }else{
            return "<script>alert('不可有空白');</script>";
        	}
    }
    if (isset($_POST["modifymovie"])){
        $modifyid=$_POST['modifyid'];
        $modifyname=$_POST['modifyname'];
        $modifyenname=$_POST['modifyenname'];
        $modifypicture=$_POST['modifypicture'];
        $modifyupdatetime=$_POST['modifyupdatetime'];
        if($_POST['modifyname']!="" ){
        $this->db->query("UPDATE `movies` SET `name`='$modifyname' ,`enname`='$modifyenname',`picture`='$modifypicture',`updatetime`='$modifyupdatetime',`updatetype`='手動修改' WHERE id='$modifyid'",$link);
        return "<script>alert('資料送出');</script>";
        }else{
 	    return "<script>alert('不可為空白');</script>";
 	    //
 		}
    }
}
//新增電影時刻表
function addmovietimes(){
    if (isset($_POST["insertmovie"])){
        $name=$_POST['name'];
        $time=$_POST['time'];
        $filmtime=$_POST['filmtime'];
        $picture=$_POST['picture'];
        $updatetime=$_POST['updatetime'];
        if($_POST['name']!="" && $_POST['time']!=""&& $_POST['filmtime']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
            //將新增的品項寫進資料庫 
            $this->db->query("INSERT INTO `movietimes` (`name`,`time`,`filmtime`,`picture`,`updatetime`,`updatetype`)VALUES('$name','$time','$filmtime','$picture','$updatetime','手動更新')",$link);
            return "<script>alert('資料送出');</script>";
        }else{
            return "<script>alert('不可有空白');</script>";
            }
    }
     if (isset($_POST["modifymovie"])){
        $modifyid=$_POST['modifyid'];
        $modifyname=$_POST['modifyname'];
        $modifytime=$_POST['modifytime'];
        $modifyfilmtime=$_POST['modifyfilmtime'];
        $modifypicture=$_POST['modifypicture'];
        $modifyupdatetime=$_POST['modifyupdatetime'];
        if($_POST['modifyid']!="" ){
            $this->db->query("UPDATE `movietimes` SET `name`='$modifyname' , `time`='$modifytime',`filmtime`='$modifyfilmtime' ,`picture`='$modifypicture', `updatetime`='$modifyupdatetime' , `updatetype`='已修改' WHERE `id`='$modifyid' ",$link);
            return "<script>alert('資料送出');</script>";
        }else{
        return "<script>alert('ID編號不可空白');</script>";
         	}
    }
}
}

?>
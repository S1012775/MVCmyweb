<?php
class bymanage{
//顯示電影
function findmovie($connection){
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $sqlselectmovie = <<<SqlQuery
    select id, name, enname, picture,updatetime,updatetype,
    (select count(*) from movies where id = movies.id) 
    from movies
SqlQuery;
    $lastresultmovie = mysql_query ( $sqlselectmovie, $link );
    while($row= mysql_fetch_assoc($lastresultmovie)){
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
function findmovietimes($connection){
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $sqlselectmovietimes = <<<SqlQuery
    select id, name, time,picture,filmtime,updatetime,updatetype,
    (select count(*) from movietimes where id = movietimes.id) 
    from movietimes
SqlQuery;
    $lastresultmovietimes = mysql_query ( $sqlselectmovietimes, $link );
    while($row= mysql_fetch_assoc($lastresultmovietimes)){
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
function findmessage($connection){
   
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $sqlselectmessage = <<<SqlQuery
    select id,mesname,mesemail,messubject,mescontent,
    (select count(*) from message where id = message.id) 
    from message
SqlQuery;
    $lastresultmessage = mysql_query ( $sqlselectmessage, $link );
    while($row= mysql_fetch_assoc($lastresultmessage)){
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
function delmessage($connection,$delete_id){
 // session_start();
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
    $result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $sql = "delete from message where id='$delete_id'";
    $resultmessage = mysql_query ( $sql, $link );
    if($resultmessage){
        header("location:managemessage");
    }  
}
//刪除電影
function delmovie($connection,$delete_id){
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
    $result = mysql_query ( "set names utf8", $link );
    mysql_selectdb ( $connection[3], $link );  
    $sql = "delete from movies where id='$delete_id'";
    $resultmovie = mysql_query ( $sql, $link );
    if($resultmovie){  
        header("location:managemovie");
    }
}
//刪除電影時刻
function delmovietimes($connection,$delete_id){
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
    $result = mysql_query ( "set names utf8", $link );
    mysql_selectdb ( $connection[3], $link );  
    $sql = "delete from movietimes where id='$delete_id'";
    $resultmovietimes = mysql_query ( $sql, $link );
    if($resultmovietimes){  
        header("location:managemovietimes");
    }
}
//新增電影
function addmovie($connection){
    //資料庫連線
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $selectmovie = <<<SqlQuery
    select id, name, enname, picture,updatetime,updatetype
    (select count(*) from movies where id = movies.id) 
    from movies 
SqlQuery;
    $resultmovie = mysql_query ( $selectmovie, $link );
    if (isset($_POST["insertmovie"])){
        $name=$_POST['name'];
        $enname=$_POST['enname'];
        $picture=$_POST['picture'];
        $updatetime=$_POST['updatetime'];
        //判斷是否為空值
        if($_POST['name']!="" && $_POST['enname']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
        //將新增的品項寫進資料庫   
            mysql_query("insert into movies (name, enname, picture,updatetime,updatetype)value('$name','$enname','$picture','$updatetime','手動更新')",$link);
            echo "<script>alert('資料送出');</script>";
        }else{
            echo "<script>alert('不可有空白');</script>";
        	}
    }
    if (isset($_POST["modifymovie"])){
        $modifyid=$_POST['modifyid'];
        $modifyname=$_POST['modifyname'];
        $modifyenname=$_POST['modifyenname'];
        $modifypicture=$_POST['modifypicture'];
        $modifyupdatetime=$_POST['modifyupdatetime'];
        if($_POST['modifyname']!="" ){
        mysql_query("UPDATE movies SET name='$modifyname' ,enname='$modifyenname',picture='$modifypicture',updatetime='$modifyupdatetime',updatetype='手動修改' WHERE id='$modifyid'",$link);
        echo "<script>alert('資料送出');</script>";
        }else{
 	    echo "<script>alert('不可為空白');</script>";
 	    //
 		}
    }
}
//新增電影時刻表
function addmovietimes($connection){
    //資料庫連線
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $selectmovietimes = <<<SqlQuery
    select id, name, time,picture,filmtime,updatetime,updatetype,
      (select count(*) from movietimes where id = movietimes.id) 
      from movietimes
SqlQuery;
    $resultmovietimes = mysql_query ( $selectmovietimes, $link );
    if (isset($_POST["insertmovie"])){
        $name=$_POST['name'];
        $time=$_POST['time'];
        $filmtime=$_POST['filmtime'];
        $picture=$_POST['picture'];
        $updatetime=$_POST['updatetime'];
        if($_POST['name']!="" && $_POST['time']!=""&& $_POST['filmtime']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
            //將新增的品項寫進資料庫 
            mysql_query("insert into movietimes (name, time,filmtime, picture,updatetime,updatetype)value('$name','$time','$filmtime','$picture','$updatetime','手動更新')",$link);
            echo "<script>alert('資料送出');</script>";
        }else{
            echo "<script>alert('不可有空白');</script>";
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
            mysql_query("UPDATE movietimes SET name='$modifyname' , time='$modifytime',filmtime='$modifyfilmtime' ,picture='$modifypicture', updatetime='$modifyupdatetime' , updatetype='已修改' WHERE id='$modifyid' ",$link);
            echo "<script>alert('資料送出');</script>";
        }else{
        echo "<script>alert('ID編號不可空白');</script>";
         	}
    }
}
}

?>
<?php
class showmanage{
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
    if($resultmovie)  
    {  
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
    if($resultmovietimes)  
    {  
        header("location:managemovietimes");
    }  

}




}

?>
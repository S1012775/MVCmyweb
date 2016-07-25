<?php
//新增修改電影
class manageadd{
function addmovie($connection){
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
if($_POST['name']!="" && $_POST['enname']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
 //將新增的品項寫進資料庫   
mysql_query("insert into movies (name, enname, picture,updatetime,updatetype)value('$name','$enname','$picture','$updatetime','手動更新')",$link);
echo "<script>alert('資料送出');</script>";
    
}
 else {
 	echo "<script>alert('不可有空白');</script>";
 		}
}
if (isset($_POST["modifymovie"])){
$modifyid=$_POST['modifyid'];
$modifyname=$_POST['modifyname'];
$modifyenname=$_POST['modifyenname'];
$modifypicture=$_POST['modifypicture'];
$modifyupdatetime=$_POST['modifyupdatetime'];
if($_POST['modifyid']!="" ){
   mysql_query("UPDATE movies SET name='$modifyname' , enname='$modifyenname', picture='$modifypicture', updatetime='$modifyupdatetime' , updatetype='已修改' WHERE id='$modifyid' ",$link);
echo "<script>alert('資料送出');</script>";
}
 else {
 	echo "<script>alert('ID編號不可空白');</script>";
 		}
}
}
//新增修改電影時刻表
function addmovietimes($connection){
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
}
 else {
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
}
 else {
 	echo "<script>alert('ID編號不可空白');</script>";
 		}
}

}



}
?>
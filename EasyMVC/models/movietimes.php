<?php
header("content-type: text/html; charset=utf-8");
class movietimes{
//從資料庫顯示
function selectmoivetimes($connection){
	$link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
	$resultmoivetimes = <<<SqlQuery
		select id, name, time,picture,filmtime,updatetime,
		(select count(*) from movietimes where id = movietimes.id) 
		 from movietimes
SqlQuery;

$selectmovietimes = mysql_query ( $resultmoivetimes, $link );
	while($row= mysql_fetch_assoc($selectmovietimes)){
		$showid=$row['id'];
		$showname=$row['name'];
		$arraymovietimes[]=array("$showid","$showname");
	}
	return $arraymovietimes;
}
//xpath網頁內容 在寫進資料庫
function grabmoivetimes($connection){
// 1. 初始設定
$link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
$ch = curl_init();
// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "http://www.atmovies.com.tw/showtime/t07704/a07/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
// 3. 執行，取回 response 結果
$pageContent = curl_exec($ch);
// 4. 關閉與釋放資源
curl_close($ch);
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($pageContent);
$getdate= date("Y-m-d");
$xpath = new DOMXPath($doc);
$entries = $xpath->query("//*[@id='theaterShowtimeTable']");

$lastdata = mysql_query ("SELECT updatetime FROM movietimes ORDER BY updatetime  desc limit 1",$link);
$showdate =mysql_fetch_assoc($lastdata);
// echo $showdate['updatetime'] ;

if($getdate== $showdate['updatetime']){
	$sql= "DELETE from movietimes WHERE updatetime !='$getdate'";
		$insert = mysql_query ( $sql, $link );
 }else{
 foreach ($entries as $entry) {
					    
		$title1 = $xpath->query("./li[1]/a", $entry)->item(0)->nodeValue;
		$title2 = $xpath->query("./li[2]/ul[2]", $entry)->item(0)->nodeValue;
		$title3 = $xpath->query("./li[2]/ul[1]/li[1]/a/img/@src", $entry)->item(0)->nodeValue;
		$title4 = $xpath->query("./li[2]/ul[1]/li[2]", $entry)->item(0)->nodeValue;
		$sql= "INSERT INTO movietimes (name,time,picture,filmtime,updatetime) VALUES ('$title1', '$title2', '$title3','$title4','$getdate')";
		$insert = mysql_query ( $sql, $link );
				}
				
 }
}
}
?>
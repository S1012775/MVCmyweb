<?php

header("content-type: text/html; charset=utf-8");
class movie{
//從資料庫顯示
function selectmoive($connection){
 $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
$resultmoive = <<<SqlQuery
select id, name, enname, picture,updatetime,updatetype,
  (select count(*) from movies where id = movies.id) 
  from movies
SqlQuery;

$selectmoive = mysql_query ( $resultmoive, $link );
    while($row= mysql_fetch_assoc($selectmoive)){
        $showpicture="<img src= '". $row['picture'] . "' style='height:400px;'/>";
        $showname=$row['name'];
        $shoeenname=$row['enname'];
        $arraymoive[]= array("$showpicture","$showname","$shoeenname") ;
    }
    return $arraymoive;
}

//xpath網頁內容 在寫進資料庫
function grabmoive($connection){
 $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
// 1. 初始設定
$ch = curl_init();

// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "http://www.u-movie.com.tw/page.php?ver=tw&page_type=series&portal=cinema&portal=cinema&ver=tw");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. 執行，取回 response 結果
$pageContent = curl_exec($ch);

// 4. 關閉與釋放資源
curl_close($ch);

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($pageContent);

$xpath = new DOMXPath($doc);
$entries = $xpath->query("//*[@id='page_wrapper']/section/div/div/div[1]/ul/li");

$getdate= date("Y-m-d");
$lastdata = mysql_query ("SELECT updatetime FROM movies ORDER BY updatetime  desc limit 1",$link);
$showdate =mysql_fetch_assoc($lastdata);


if($getdate== $showdate['updatetime']){
		$sql= "DELETE from movies WHERE updatetime !='$getdate'";
		$insert = mysql_query ( $sql, $link );
 }else{
 foreach ($entries as $entry) {
	    
		 $title1 = $xpath->query("./div/div/h3", $entry)->item(0)->nodeValue;
		 $title2 = $xpath->query("./div/div/p", $entry)->item(0)->nodeValue;
		 $title3 = $xpath->query("./div/span/a/img/@src", $entry)->item(0)->nodeValue;
		 $sql= "INSERT INTO movies (name,enname,picture,updatetime) VALUES ('$title1', '$title2', '$title3','$getdate')";
		$insert = mysql_query ( $sql, $link );
		
 }
				
 }
}

}
?>
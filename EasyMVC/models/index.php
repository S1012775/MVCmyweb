<?php
header("content-type: text/html; charset=utf-8");   
class index{
function indexMessage($connection){
    // require ("config.php");
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $selectmessage = <<<SqlQuery
    select id, mesname, mesemail,messubject,mescontent,
    (select count(*) from message where id = message.id) 
    from message
SqlQuery;
    $messageresult = mysql_query ( $selectmessage, $link );
    if (isset($_POST["submit"])){
        $mesname=$_POST['mesname'];
        $mesemail=$_POST['mesemail'];
        $messubject=$_POST['messubject'];
        $mescontent=$_POST['mescontent'];
            if($_POST['mesname']!="" && $_POST['mesname']!=""&& $_POST['mesemail']!=""&& $_POST['messubject']!=""&& $_POST['mescontent']!=""){
            $sql="insert into message (mesname,mesemail,messubject,mescontent)value('$mesname','$mesemail','$messubject','$mescontent')";
            mysql_query($sql,$link);
            echo "<script>
              alert('資料送出')
            
            </script>";
                
                }
             else {
             	echo "<script>
             	alert('不可有空格或空白')
             	</script>";
             	 }
    }
            // header ("location:../Home/index");
}
function selectindex($connection){
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
    $resultPhoto = <<<SqlQuery
            select id, photo,
            (select count(*) from indexPhoto where id = indexPhoto.id) 
            from indexPhoto
SqlQuery;
    $selectindex = mysql_query ($resultPhoto, $link );
    while($row= mysql_fetch_assoc($selectindex)){
        $arrayphoto[]= "<img src= '". $row['photo'] . "' style='height:350px;'/>";
    }return $arrayphoto;
        }
function indexSlide($connection){
    // 1. 初始設定
    $link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
	$result = mysql_query ( "set names utf8", $link );
	mysql_selectdb ( $connection[3], $link );
$ch = curl_init();
$x=
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
$lastdata = mysql_query ("SELECT updatetime FROM indexPhoto ORDER BY updatetime  desc limit 1",$link);
$showdate =mysql_fetch_assoc($lastdata);
if($getdate== $showdate['updatetime']){
	$sql= "DELETE from indexPhoto WHERE updatetime !='$getdate'";
		$insert = mysql_query ( $sql, $link );
 }else{
 foreach ($entries as $entry) {
		$title = $xpath->query("./div[1]/span/a/img/@src", $entry)->item(0)->nodeValue;
		$sql= "INSERT INTO indexPhoto (photo,updatetime) VALUES ('$title','$getdate')";
		$insert = mysql_query ( $sql, $link ); 
		}
    }
}
       
       
       
};






?>
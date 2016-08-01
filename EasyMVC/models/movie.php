<?php

header("content-type: text/html; charset=utf-8");
class movie extends Connect{
//從資料庫顯示
function selectmoive(){
$selectmovie = $this->db->query("SELECT * FROM `movies`");
    $data = $selectmovie->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $row){
        $showpicture="<img src= '". $row['picture'] . "' style='height:400px;'/>";
        $showname=$row['name'];
        $shoeenname=$row['enname'];
        $showhref=$row['site'];
        $arraymoive[]= array("$showpicture","$showname","$shoeenname","$showhref") ;
    }
    return $arraymoive;
}

//xpath網頁內容 在寫進資料庫
function grabmoive(){
    
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
$selectPhoto = $this->db->query("SELECT `updatetime` FROM `movies` ORDER BY updatetime  DESC LIMIT 1");
$data = $selectPhoto->fetchAll(PDO::FETCH_ASSOC);
// var_dump($data);
if($getdate== $data[0]['updatetime']){
    $this->db->query("DELETE FROM `movies` WHERE `updatetime` !='$getdate'");
}
else{
 foreach ($entries as $entry) {
		$title1 = $xpath->query("./div/div/h3", $entry)->item(0)->nodeValue;
		$title2 = $xpath->query("./div/div/p", $entry)->item(0)->nodeValue;
		$title3 = $xpath->query("./div/span/a/img/@src", $entry)->item(0)->nodeValue;
		$href = $xpath->query("div/span/a/@href", $entry)->item(0)->nodeValue;;
		 $this->db->query("INSERT INTO `movies`(`name`,`enname`,`picture`,`updatetime`,`site`) VALUES ('$title1', '$title2', '$title3','$getdate','$href')");
    }
				
 }
}

}
?>
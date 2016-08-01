<?php
header("content-type: text/html; charset=utf-8");
class movietimes extends Connect{
//從資料庫顯示
function selectmoivetimes(){
	$select = $this->db->query("SELECT * FROM `movietimes`");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $row){
		$showid=$row['id'];
		$showname=$row['name'];
		$arraymovietimes[]=array("$showid","$showname");
	}
	return $arraymovietimes;
}
//xpath網頁內容 在寫進資料庫
function grabmoivetimes(){
	// 1. 初始設定
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
	
	$select = $this->db->query("SELECT updatetime FROM `movietimes` ORDER BY `updatetime`  DESC LIMIT 1");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
	if($getdate== $data[0]['updatetime']){
		$this->db->query("DELETE FROM `movietimes` WHERE `updatetime` !='$getdate'");
		
	 }else{
	 foreach ($entries as $entry) {
			$title1 = $xpath->query("./li[1]/a", $entry)->item(0)->nodeValue;
			$title2 = $xpath->query("./li[2]/ul[2]", $entry)->item(0)->nodeValue;
			$title3 = $xpath->query("./li[2]/ul[1]/li[1]/a/img/@src", $entry)->item(0)->nodeValue;
			$title4 = $xpath->query("./li[2]/ul[1]/li[2]", $entry)->item(0)->nodeValue;
			$this->db->query("INSERT INTO `movietimes`(`name`,`time`,`picture`,`filmtime`,`updatetime`) VALUES ('$title1', '$title2', '$title3','$title4','$getdate')");
		}
	 }
}
//選單table
function showmovie(){
	$q=$_GET["q"];
	$select = $this->db->query("SELECT * FROM `movietimes` WHERE `id` = '".$q."'");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
	// echo "<table>
	// 	  <tr>
	// 	  <th>電影名稱</th>
	// 	  <th>電影時間 </th>
	//       </tr>";
	foreach($data as $row){
		$out=$row['time'];
		$output=explode("其他戲院",$out);
		$name=$row['name'] ;
		$picture="<img src= '". $row['picture'] . "' style='height:200px;'/>";
		$time=$output[0];
		$filmtime=$row['filmtime'];
		$arraytable[]=array("$name","$picture","$time","$arraytable");
		// echo "<td>" . $row['name'] ."<br>"."<img src= '". $row['picture'] . "' style='height:200px;'/>". "</td>";
		// echo "<td>" . $output[0] .  $row['filmtime'] . "</td>";
		}
		// echo "</table>";
		return $arraytable;
	}
}
?>
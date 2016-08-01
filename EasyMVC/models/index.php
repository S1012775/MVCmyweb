<?php
header("content-type: text/html; charset=utf-8");   
class index extends Connect{
//首頁留言板寫入資料庫
function indexMessage(){//資料庫連線
    if (isset($_POST["submit"])){
        $mesname=$_POST['mesname'];
        $mesemail=$_POST['mesemail'];
        $messubject=$_POST['messubject'];
        $mescontent=$_POST['mescontent'];
        //判斷是否為空值
        if($_POST['mesname']!="" && $_POST['mesname']!=""&& $_POST['mesemail']!=""&& $_POST['messubject']!=""&& $_POST['mescontent']!=""){
            $this->db->query("INSERT INTO `message` (`mesname`, `mesemail`, `messubject`,`mescontent`) VALUES ('$mesname','$mesemail','$messubject','$mescontent')");
            return "<script>alert('資料送出')</script>";
        }else {
            return "<script>alert('不可有空格或空白')</script>";
        }
    }
}
//選擇資料庫圖片顯示在首頁動區塊
function selectindex(){
    //資料庫連線
    $selectPhoto = $this->db->query("SELECT * FROM `indexPhoto`");
    $data = $selectPhoto->fetchAll(PDO::FETCH_ASSOC);
    //以迴圈方式顯示
    foreach($data as $row){
        $arrayphoto[]= "<img src= '". $row['photo'] . "' style='height:350px;'/>";
    }return $arrayphoto;
}
//分析網頁資料並存物資料庫
function indexSlide(){
    // 1. 初始設定
    
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
    //Xpath 解析資料
    $entries = $xpath->query("//*[@id='page_wrapper']/section/div/div/div[1]/ul/li");
    $getdate= date("Y-m-d");
    $select = $this->db->query("SELECT `updatetime` FROM `indexPhoto` ORDER BY `updatetime`  DESC LIMIT 1");
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
    //判斷是否為今天日期
    //刪除以前資料庫資料
    if($getdate== $data[0]['updatetime']){
        $this->db->query("DELETE FROM `indexPhoto` WHERE `updatetime` !='$getdate'");
    
    }else{
    //如果沒有今天資料則從網頁抓取一次(當日不重複抓取)    
        foreach ($entries as $entry) {
    		$title = $xpath->query("./div[1]/span/a/img/@src", $entry)->item(0)->nodeValue;
    		$this->db->query("INSERT INTO `indexPhoto` (`photo`,`updatetime`) VALUES ('$title','$getdate')");
    	}
    }
}
       
       
       
}






?>
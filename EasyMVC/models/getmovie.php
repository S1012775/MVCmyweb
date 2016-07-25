<?php
class getmovie{
function showmovie($connection){
$link = mysql_connect ( $connection[0],$connection[1] ,$connection[2] ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
	    mysql_selectdb ( $connection[3], $link );

$result = mysql_query ( "set names utf8", $link );
$q=$_GET["q"];
$sql="SELECT * FROM movietimes WHERE id = '".$q."'";
$result = mysql_query($sql,$link);

echo "<table>
<tr>
<th>電影名稱</th>
<th>電影時間 </th>
</tr>";
while($row = mysql_fetch_array($result)) {
    $out=$row['time'];
	$output=explode("其他戲院",$out);
    echo "<td>" . $row['name'] ."<br>"."<img src= '". $row['picture'] . "' style='height:200px;'/>". "</td>";
    echo "<td>" . $output[0] .  $row['filmtime'] . "</td>";
}
echo "</table>";
mysql_close($link);
}
}
?>





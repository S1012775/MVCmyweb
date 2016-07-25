<?php
	class dbconnect{
		function dbcon(){
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'movie';
	
	
	 return $connection =array("$dbhost","$dbuser","$dbpass","$dbname");
	}
}
?>
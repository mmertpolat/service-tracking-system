<?php 
date_default_timezone_set('Europe/Istanbul');

	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "istakip";
	
	$db = new mysqli($host, $user, $pass, $dbname);
	$db->set_charset("utf8");
	//$db->select_db('istakip');
	
	

	if ($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	} 
	//echo "Bağlantı başarılı";
	

?>
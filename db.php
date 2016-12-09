<?php
 // $db_host = "localhost";
$db_host = "localhost";
$db_name = "db__makafui_fie";
 // $db_name = "find_me";
 // $db_user = "root";
$db_user = "makafui.fie";
$db_pass = "bcde82a208262cd2";
// $db_pass = "";

try{

	$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>
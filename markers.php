<?php
include_once("setting.php");
$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($mysqli->connect_errno){
	echo "error connecting to database";
	exit();
}
$row = $mysqli->query("Select * from markers");
if($row==false){
	echo "No locations found";
	exit();
}
while($result=$row->fetch_assoc()){
	$results[]=$row;
}
echo json_encode($results);
?>
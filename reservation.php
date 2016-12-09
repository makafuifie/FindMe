<?php 
	include_once("dbConnect.php");

	class reservation extends dbConnect{
		function addReservation($name, $phone, $address, $website, $user){
			$strQuery = "insert into reservations set
			 placeName = '$name',
			 placeAddress = '$address',
			 website = '$website',
			 phoneNumber = '$phone',
			 userID = $user";
			 // echo "dsdfsfddfdgf";
			 // echo $strQuery;
			return $this->query($strQuery); 


		}

		function getReservation($filter=false){
			$strQuery = "select reservations.id, reservations.placeName, reservations.placeAddress, reservations.website, reservations.phoneNumber, reservations.userID from reservations";
		if($filter!=false){
				$strQuery=$strQuery . " where $filter";
			}
		return $this->query($strQuery);
	}
}

?>
<?php 
	include_once("dbConnect.php");

	class users extends dbConnect{
		function addNewUser($firstname, $lastname, $email, $password, $phone){
			$strQuery = "insert into Users set
			 firstname = '$firstname',
			 lastname = '$lastname',
			 email = '$email',
			 password = '$password',
			 phoneNumber = $phone";
			 //echo $strQuery;
			return $this->query($strQuery); 


		}

		function login($email, $password){
			$strQuery  ="Select * from Users where 
			password='$password' and email = '$email'";
			//echo $strQuery;
			return $this->query($strQuery); 
		}
	}

?>
<?php

if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
		getSession();
		break;
		case 2:
		sendSMS();
		break;
		case 3:
		reserve();
		break;
		case 4:
		getReservations();
		break;
		default:
		echo "wrong command";
		break;
	}
}
function reserve(){
	if(isset($_REQUEST['name'])){
		include_once("reservation.php");
		$name =$_REQUEST['name'] ;
		$address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];
		$website = $_REQUEST['website'];
		$user = $_REQUEST['user'];
		$reservation = new reservation();
		$row = $reservation-> addReservation($name, $phone, $address, $website, $user);
		if($row==false){
			echo '{"result":0,"message":"error adding location"}';
		}
		else{
			echo '{"result":1,"message":"location successfully added"}';
		}
	}
	else{
		echo "values not provided";
	}

}

function getReservations(){
	include_once("reservation.php");
	$reservation = new reservation();
	$row = $reservation<- getReservation();
	if($row==false){
		echo '{"result":0,"message":"Error retrieving reservations"}';
	}
	else{
		$result=$reservation->fetch();
		if($result==false){
			echo '{"result":0,"message":"no reservations found"}';
		}
		else{
			echo '{"result":1,"reservation":[';
			while($result){
				echo json_encode($result);

				$result=$reservation->fetch();
				if($result!=false){
					echo ",";
				}
			}
			echo "]}";
		}

	}

}
function addUser(){
	$firstName = $_REQUEST['firstName'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$phone = $_REQUEST['phone'];
	$lastName = $_REQUEST['lastName'];
	
	include_once("users.php");
	$user = new users();
	$row = $event->addNewUser($firstname, $lastname, $email, $password, $phone);
	if($row==false){
		echo '{"result":0,"message":"error adding user"}';

	}
	else{
		echo '{"result":1,"message":"user successfully added"}';
	}
}



function getSession(){
	
	session_start();
	if(!isset($_SESSION['USER'])){
		echo '{"result":0,"message":"User not logged in"}';
	}
	else{
		echo '{"result":1,"user":';
		echo json_encode($_SESSION['USER']);
		echo "}";
		//var_dump($_SESSION['USER']);
	}
}



function sendSMS(){
	
	$to = "";
	
	if(isset($_REQUEST['to'])){
		$to = $_REQUEST['to'];	
		$from ="FindMe";
		$smsc="smscMTN";
		$msg="You have successfully registered for FindMe A...";
		$msg= preg_replace('/\s+/', '%20', $msg);
		$url="http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=".$to."&from=".$from."&smsc=".$smsc."&text=".$msg."";
		 // echo $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);

        // Set so curl_exec returns the result instead of outputting it.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

        // Get the response and close the channel.
		// session_write_close();
		$response = curl_exec($ch);
		 // echo "response is ".$response;
		curl_close($ch);
		// $message="";
		// if($response===TRUE){
		// 	$message= "Yes";

		// }
		// else{
		// 	$message= "No";
		// }
        // echo "<br>";
		// echo $message;
	}

}

function sendMembersSMS(){
	include_once("joinevent.php");
	$eventID= $_REQUEST['eventid'];
	
	$joinevent = new joinevent();
	$row = $joinevent->geteventMembers($eventID);
	if($row==false){
		echo '{"result":0,"message":"event not found"}';
	}
	else{
		$result=$joinevent->fetch();

		if($result==false){
			echo '{"result":0,"message":"No event members"}';
		}
		else{
			$rows = array($result);
			
			while($result){
				array_push($rows, $result);

				$result=$joinevent->fetch();
				
			}
			//var_dump($rows);
			$i=0;
			foreach ($rows as $value) {
				


				$to = $rows[$i]["phone"];
				$time=	$rows[$i]["eventTime"];
				$amount = $rows[$i]["amount"];
				$number = $rows[$i]["numberNeeded"];
				$location = $rows[$i]["location"];
				echo $amount;
				echo $number;
				$amountToPay = $amount/$number;
				echo $amountToPay;
				$from ="Carevent";
				$smsc="smscMTN";
				$msg="Departure time for car event to".$location."is ".$time." and cost is".$amountToPay;
				$msg= preg_replace('/\s+/', '%20', $msg);
				$url="http://52.89.116.249:13013/cgi-bin/sendsms?username=mobileapp&password=foobar&to=".$to."&from=".$from."&smsc=".$smsc."&text=".$msg."";
	// echo $url;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);

        // Set so curl_exec returns the result instead of outputting it.
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

        // Get the response and close the channel.
				session_write_close();
				$response = curl_exec($ch);
				curl_close($ch);
				echo $msg;
				$message="";
				// if($response==0){
				// 	$message= "Yes";

				// }
				// else{
				// 	$message= "No";
				// }
    //     // echo "<br>";
				// echo $message;
				$i++;
			}
			

			
		}

	}
	

}





?>

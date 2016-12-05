  <?php

  include_once('users.php');
  include_once("db.php");


  //if(isset($_REQUEST['email'])&&(isset($_REQUEST['password']))){
  if($_POST){
    // $firstName = $_GET['firstName'];
    // $email = $_GET['email'];
    // $password = $_GET['password'];
    // $phone = $_GET['phone'];
    // $lastName = $_GET['lastName'];

    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $lastName = $_POST['lastName'];

    try{
     $stmt = $db_con->prepare("SELECT * FROM  users WHERE email=:email");
     $stmt->execute(array(":email"=>$email));
     $count=$stmt->rowCount();
     //echo $count;
     if($count==0){
      $user=new users();
      $row = $user->addNewUser($firstName, $lastName, $email, $password, $phone);
      //echo $row;

      if($row!=1){
        echo "Query could not execute !";
      }
      else{
        // $stmt = $db_con->prepare("SELECT * FROM  carpoolmembers WHERE email=:email");
        // $stmt->execute(array(":email"=>$email));
        // $count=$stmt->rowCount();
        //echo $count;
        echo "registered";
      }
    }
    else{
      echo "1"; //email not available;
    }

  }

  catch(PDOException $e){
   echo $e->getMessage();
 }
}
else{
  echo "doesnt work";
}



  // $result=$obj->fetch();
  // if(!$result){
  // 				//username or password must be wrong
  //   echo "username or password is wrong.";
  // }
  // error_reporting(0);
  // session_start();

  // $_SESSION['USER']=$result;














?>




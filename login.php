<?php session_start();   // session starts with the help of this function 
require_once('config/database.php');

if (isset($_SESSION['logedIn']))   // Checking whether the session is already there or not if 
{
	header("Location:index.php");
}

if (
	!empty($_POST['user'])
	&& !empty($_POST['pass'])
)   // it checks whether the user clicked login button or not 
{
	try {
		$user = trim($_POST['user']);
		$pass = trim($_POST['pass']);
		$database = new Database();
		$conn = $database->getConnection();

		$query = sprintf("select * from users where username = '%s' and password ='%s';", $user, $pass);

		$stmt = $conn->prepare($query);

		// execute query
		$stmt->execute();
		$fetch = $stmt->fetch(PDO::FETCH_ASSOC);



		if (is_array($fetch))  // username is  set to "Ank"  and Password   
		{                                   // is 1234 by default     

			$_SESSION['logedIn'] = $user;


			echo 'success';
		} else {
			echo 'no user';
			//echo '<script type="text/javascript"> console.log(`123`); document.querySelector(".message span").classList.add("activ");</script>';
			//header("Location:loginui.php");

		}
	} catch (Exception $ex) {
		echo $ex;
		
	}
}

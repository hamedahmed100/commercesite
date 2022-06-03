<?php session_start(); 
require_once('config/database.php');
if (isset($_SESSION['logedIn'])){header("Location:index.php");}
if (!empty($_POST['user']) && !empty($_POST['pass'])) 
{
	try {
		$user = trim($_POST['user']);
		$pass = trim($_POST['pass']);
		$database = new Database();
		$conn = $database->getConnection();
		$query = sprintf("select * from users where username = '%s' and password ='%s';", $user, $pass);
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$fetch = $stmt->fetch(PDO::FETCH_ASSOC);
		if (is_array($fetch))  // username is  set to "Ank"  and Password   
		{                                   // is 1234 by default     
			$_SESSION['logedIn'] = $user;
			http_response_code(200); exit;
			echo 'success';
		} else {
			http_response_code(400); exit;
			echo 'no user';
		}
	} catch (Exception $ex) {echo $ex;}
}
